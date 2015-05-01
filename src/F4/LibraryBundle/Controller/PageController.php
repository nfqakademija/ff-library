<?php
// src/F4/LibraryBundle/Controller/PageController.php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('F4LibraryBundle:Book')->getBooks();

        return $this->render('F4LibraryBundle:Page:index.html.twig', array(
            'books' => $books
        ));
    }

    public function ajaxAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new Response('This is not ajax!', 400);
        }

        $data = json_decode($request->getContent(), true);
        $em = $this->getDoctrine()->getManager();
        sleep(1);

        switch ($data['type']) {

            case 'popular':
                $books = $em->getRepository('F4LibraryBundle:Book')->getBooks();
                break;

            case 'newest':
                $books = $em->getRepository('F4LibraryBundle:Book')->getSortedBooks();
                break;

            case 'soon':
                $books = $em->getRepository('F4LibraryBundle:Book')->getSortedBooks();
                break;

            default:
                $books = $em->getRepository('F4LibraryBundle:Book')->getBooks();
                break;
        }

        return new JsonResponse(array('message' => $data['type'],
            'list' => $this->renderView('F4LibraryBundle:Book:list.html.twig',
                array(
                    'books' => $books
                ))), 200);
    }
}