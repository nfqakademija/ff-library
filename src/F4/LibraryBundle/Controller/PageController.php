<?php
// src/F4/LibraryBundle/Controller/PageController.php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use F4\LibraryBundle\Entity\Enquiry;
use F4\LibraryBundle\Form\EnquiryType;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()
            ->getManager();

        $books = $em->createQueryBuilder()
            ->select('b')
            ->from('F4LibraryBundle:Book',  'b')
            ->addOrderBy('b.releaseDate', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('F4LibraryBundle:Page:index.html.twig', array(
            'books' => $books
        ));
    }
}