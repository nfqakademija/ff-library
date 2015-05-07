<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('F4LibraryBundle:Page:index.html.twig');
    }

    public function authorPageAction($id)
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

    public function tagPageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $tag = $em->getRepository('F4LibraryBundle:Tag')->find($id);

        if (!$tag) {
            throw $this->createNotFoundException('Žymė nerasta.');
        }

        return $this->render('F4LibraryBundle:Page:tag.html.twig', array(
            'tag' => $tag,
        ));
    }

    public function bookPageController($id)
    {
        $em = $this->getDoctrine()->getManager();
        $book = $em->getRepository('F4LibraryBundle:Book')->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Knyga nerasta.');
        }

        return $this->render('F4LibraryBundle:Book:book.html.twig', array(
            'book' => $book,
        ));
    }
}
