<?php

namespace F4\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BooksController extends Controller
{
    public function userBooksAction($list)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();

        switch ($list) {
            case 'taken':
                $reservations = $em->getRepository('F4LibraryBundle:Reservation')->getReservedBooks($user, true);
                break;
            default:
            $reservations = $em->getRepository('F4LibraryBundle:Reservation')->getReservedBooks($user);
                break;
        }

        return $this->render('F4UserBundle:Profile:reserved_books.html.twig', array('reservations' => $reservations ));
    }

    public function adminPageAction($list)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();

        switch ($list) {
            case 'taken':
                $reservations = $em->getRepository('F4LibraryBundle:Reservation')->getReservedBooks($user, true);
                break;
            default:
                $reservations = $em->getRepository('F4LibraryBundle:Reservation')->getReservedBooks($user);
                break;
        }

        return $this->render('F4UserBundle:Admin:reserved_books.html.twig', array('reservations' => $reservations ));
    }
}
