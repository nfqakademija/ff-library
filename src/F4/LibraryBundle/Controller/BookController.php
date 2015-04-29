<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BookController extends Controller
{
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $book = $em->getRepository('F4LibraryBundle:Book')->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Knyga nerasta.');
        }

        return $this->render('F4LibraryBundle:Book:details.html.twig', array(
            'book'      => $book,
        ));
    }
}