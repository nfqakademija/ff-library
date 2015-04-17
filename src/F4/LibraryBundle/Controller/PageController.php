<?php
// src/F4/LibraryBundle/Controller/PageController.php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('F4LibraryBundle:Page:index.html.twig');
    }
}