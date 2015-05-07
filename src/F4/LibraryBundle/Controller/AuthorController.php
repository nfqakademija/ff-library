<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthorController extends Controller
{
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $author = $em->getRepository('F4LibraryBundle:Author')->find($id);

        if (!$author) {
            throw $this->createNotFoundException('Autorius nerastas.');
        }

        return $this->render('F4LibraryBundle:Page:author.html.twig', array(
            'author' => $author,
        ));
    }
}
