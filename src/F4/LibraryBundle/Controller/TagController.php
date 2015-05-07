<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{
    public function showAction($id)
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
}
