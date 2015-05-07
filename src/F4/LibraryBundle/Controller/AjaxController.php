<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

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

        $pagination = $this->Pagination($em->getRepository('F4LibraryBundle:Book')->$function($uid), $limit, $page);
        $books = $em->getRepository('F4LibraryBundle:Book')->$function($uid, $pagination);

        return new JsonResponse(array('list' => $this->renderView('F4LibraryBundle:Book:list.html.twig',
            array(
                'books' => $books,
                'pagination' => $pagination
            ))), 200);
    }

    public function Pagination($count, $limit, $page)
    {
        if ($limit % 3 == 0 && $limit < 100) {
            $result['limit'] = $limit;
        } else {
            $result['limit'] = 9;
        }

        $result['pages'] = ceil($count / $result['limit']);

        if ($page < 1 || $page > $result['pages']) {
            $result['page'] = 1;
        } else {
            $result['page'] = $page;
        }

        $result['to'] = $result['page'] * $result['limit'];
        $result['offset'] = $result['to'] - $result['limit'];

        if ($result['offset'] <= 0) {
            $result['from'] = 1;
        } else {
            $result['from'] = $result['offset'];
        }

        $result['total'] = $count;

        return $result;
    }
}
