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

        $data = $request->request->get('type');

        $em = $this->getDoctrine()->getManager();
        $books = $em->getRepository('F4LibraryBundle:Book')->getSortedBooks();

        return new JsonResponse(array('message' => $data,
            'list' => $this->renderView('F4LibraryBundle:Book:list.html.twig',
                array(
                    'books' => $books
                ))), 200);
    }
}