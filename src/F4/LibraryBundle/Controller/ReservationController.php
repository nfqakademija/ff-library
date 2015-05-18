<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use F4\LibraryBundle\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;

class ReservationController extends Controller
{
    public function formAction($book_id, Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $book = $this->getBook($book_id);

        $form = $this->createFormBuilder()->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->addFlash(
                'notice',
                $this->processReservation($user, $book)
            );
            return $this->redirectToRoute('F4LibraryBundle_book', array('id' => $book_id));
        }

        return $this->render('F4LibraryBundle:Tools:reservation.html.twig', array(
            'book_id' => $book_id,
            'reservationForm' => $form->createView(),
            'reservationStatus' => $this->getReservationStatus($user, $book)
        ));
    }

    public function processReservation($user, $book)
    {
        $status = $this->getReservationStatus($user, $book);

        switch ($status) {
            case 'reserved':
                $this->removeReservation($user, $book);
                return 'removed';
                break;

            case 'null':
                $quantity = $this->getQuantityUnit($book);
                $this->addReservation($user, $book);

                if ($quantity) {
                    return 'reserved';
                } else {
                    return 'delay';
                }
                break;

            default:
                return null;
                break;
        }
    }

    public function addReservation($user, $book)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $reservation = new Reservation();
        $reservation->setUser($user);
        $reservation->setBook($book);
        $reservation->setBookUnit($this->getQuantityUnit($book));

        $em->persist($reservation);
        $em->flush();
    }

    public function removeReservation($user, $book)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $reservation = $this->getReservation($user, $book);

        if ($reservation) {
            $em->remove($reservation);
            $em->flush();
        }
    }

    protected function getBook($id)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $book = $em->getRepository('F4LibraryBundle:Book')->find($id);

        if (!$book) {
            throw $this->createNotFoundException('Unable to find a Book.');
        }

        return $book;
    }

    protected function getQuantityUnit($book)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $quantity = $em->getRepository('F4LibraryBundle:Quantity')->getInStockQuantity($book);

        return $quantity;
    }

    protected function getReservation($user, $book)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $reservation = $em->getRepository('F4LibraryBundle:Reservation')
            ->findOneBy(array('user' => $user, 'book' => $book));

        return $reservation;
    }

    protected function getReservationStatus($user, $book)
    {
        $reservation = $this->getReservation($user, $book);

        if (!$reservation) {
            $status = 'null';
        } else if ($reservation->getBookTaken() == false) {
            $status = 'reserved';
        } else {
            $status = 'taken';
        }

        return $status;
    }

}
