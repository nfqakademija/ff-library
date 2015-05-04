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
        switch ($list) {
            case 'popular':
                $qArgs['addOrderBy'] = 'releaseDate';
                break;

            case 'newest':
                $qArgs['addOrderBy'] = 'title';
                break;

            case 'soon':
                $qArgs['addOrderBy'] = 'author';
                break;

            default:
                $qArgs['addOrderBy'] = 'releaseDate';
                break;
        }

        if ($limit % 3 == 0 && $limit < 100) {
            $qArgs['setMaxResults'] = $limit;
        } else {
            $qArgs['setMaxResults'] = 9;
        }

        $em = $this->getDoctrine()
                    ->getManager();

        $total = $em->getRepository('F4LibraryBundle:Book')
                    ->getBookList($qArgs, 1);

        $pages = ceil($total / $qArgs['setMaxResults']);

        if ($page < 1 || $page > $pages) {
            $page = 1;
        }

        $qArgs['setFirstResult'] = $page * $qArgs['setMaxResults'] - $qArgs['setMaxResults'];

        $books = $em->getRepository('F4LibraryBundle:Book')
                    ->getBookList($qArgs);

        return new JsonResponse(array('list' => $this->renderView('F4LibraryBundle:Book:list.html.twig',
            array(
                'books' => $books,
                'pages' => $pages
            ))), 200);
    }
}
