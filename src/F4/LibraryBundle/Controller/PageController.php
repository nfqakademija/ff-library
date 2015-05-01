<?php
// src/F4/LibraryBundle/Controller/PageController.php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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
}