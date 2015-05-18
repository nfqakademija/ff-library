<?php

namespace F4\LibraryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use F4\LibraryBundle\Entity\Review;
use F4\LibraryBundle\Form\ReviewType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller
{
    public function formAction($book_id)
    {
        $book = $this->getBook($book_id);

        $review = new Review();
        $review->setBook($book);
        $form = $this->createForm(new ReviewType(), $review);

        return $this->render('F4LibraryBundle:Tools/Review:form.html.twig', array(
            'review' => $review,
            'form' => $form->createView()
        ));
    }

    public function createAction($book_id, Request $request)
    {
        $book = $this->getBook($book_id);
        $user = $this->container->get('security.context')->getToken()->getUser();

        $review = new Review();
        $review->setBook($book);
        $review->setUser($user);
        $review->setRating($this->checkRating($request->get('rating')));

        $form = $this->createForm(new ReviewType(), $review);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                ->getManager();
            $em->persist($review);
            $em->flush();

            return new JsonResponse(array('result' => 'success'), 200);
        }

        return new JsonResponse(array('result' => $this->renderView('F4LibraryBundle:Tools/Review:form.html.twig',
            array(
                'review' => $review,
                'form' => $form->createView()
            ))), 200);
    }

    protected function checkRating($rating) {
        if ($rating > 1 || $rating < 0)
            $rating = 1;

        return $rating;
    }

    protected function getBook($book_id)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $book = $em->getRepository('F4LibraryBundle:Book')->find($book_id);

        if (!$book) {
            throw $this->createNotFoundException('Unable to find a Book.');
        }

        return $book;
    }

}
