<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function listAction(Request $request, $list = 'popular', $page = 1, $limit = 9)
    {
        if (!$request->isXmlHttpRequest()) {
            return new Response('This is not ajax!', 400);
        }

        $qArgs = Array();

        // Check type of list
        switch ($list) {
            case 'popular':
                $qArgs['order'] = 'releaseDate';
                break;

            case 'newest':
                $qArgs['order'] = 'title';
                break;

            case 'soon':
                $qArgs['order'] = 'author';
                break;

            default:
                $qArgs['order'] = 'releaseDate';
                break;
        }

        // Check limit
        if ($limit % 3 == 0 && $limit < 100) {
            $qArgs['limit'] = $limit;
        } else {
            $qArgs['limit'] = 9;
        }

        // Get books quantity
        $em = $this->getDoctrine()->getManager();
        $total = $em->getRepository('F4LibraryBundle:Book')->getBookListQnt($qArgs);


        // Check pagination
        $pages = ceil($total / $qArgs['limit']);

        if ($page < 1 || $page > $pages) {
            $page = 1;
        }

        // Set first
        $qArgs['first'] = $page * $qArgs['limit'] - $qArgs['limit'];

        $books = $em->getRepository('F4LibraryBundle:Book')->getBookList($qArgs);
        return new JsonResponse(array('list' => $this->renderView('F4LibraryBundle:Book:list.html.twig',
            array(
                'books' => $books,
                'pages' => $pages
            ))), 200);
    }
}