<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use F4\LibraryBundle\Services\Pagination;

class AjaxController extends Controller
{
    public function listBooksAction(Request $request, $list, $limit, $page, $uid)
    {
        if (!$request->isXmlHttpRequest()) {
            return new Response('This is not ajax!', 400);
        }

        switch ($list) {
            case 'newest':
                $function = 'getNewestBooks';
                break;

            case 'popular':
                $function = 'getPositiveBooks';
                break;

            case 'tag':
                $function = 'getBooksByTag';
                break;

            case 'author':
                $function = 'getBooksByAuthor';
                break;

            default:
                $function = 'getNewestBooks';
                break;
        }

        $em = $this->getDoctrine()->getManager();

        $pagination = new Pagination();

        $temp_param['uid'] = $uid;
        $params = array_merge($pagination->getPagination($em->getRepository('F4LibraryBundle:Book')->$function($temp_param), $limit, $page), $temp_param);
        $books = $em->getRepository('F4LibraryBundle:Book')->$function($params);

        return new JsonResponse(array('list' => $this->renderView('F4LibraryBundle:Book:list.html.twig',
            array(
                'books' => $books,
                'pagination' => $params
            ))), 200);
    }
}
