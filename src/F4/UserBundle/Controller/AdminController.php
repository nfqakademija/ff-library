<?php

namespace F4\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use F4\LibraryBundle\Services\BookManager;
use F4\LibraryBundle\Entity\Book;
use F4\LibraryBundle\Entity\Quantity;
use F4\LibraryBundle\Entity\Author;
use F4\LibraryBundle\Controller\ReservationController;
use Symfony\Component\Validator\Constraints\DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Admin controller.
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * Lists all reserved books.
     *
     * @Route("/reserved", name="admin_reserved_books")
     * @Method("GET")
     * @Template()
     */
    public function getReservedBooksAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reserved_books = $em->getRepository('F4LibraryBundle:Reservation')->getReservedBooks();

        return $this->render('F4UserBundle:Admin:reserved_books.html.twig', array('reservations' => $reserved_books));
    }

    /**
     * Lists all taken books.
     *
     * @Route("/taken", name="admin_taken_books")
     * @Method("GET")
     * @Template()
     */
    public function getTakenBooksAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reserved_books = $em->getRepository('F4LibraryBundle:Reservation')->getReservedBooks(null, true);

        return $this->render('F4UserBundle:Admin:taken_books.html.twig', array('reservations' => $reserved_books));
    }

    /**
     * Add books.
     *
     * @Route("/add-book", name="admin_add_book")
     * @Method("POST|GET")
     * @Template()
     */
    public function formAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('isbn', 'text', array(
                'label' => 'ISBN Kodas:'
            ))
            ->add('qnt', 'text', array(
                'label' => 'Fizinių vienetų:'
            ))            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $data = $request->request->get('form');
            $book = new BookManager($data['isbn']);

            if (false === is_null($book->getTitle())) {
                $this->createBook($book, $data['qnt']);
                $this->addFlash(
                    'notice',
                    '200'
                );
            } else {
                $this->addFlash(
                    'notice',
                    '404'
                );
            }
        }

        return $this->render('F4UserBundle:Admin:add_book.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * Give books.
     *
     * @Route("/give-book/{id}", name="admin_give_book", requirements={"id": "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function giveBookAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository('F4LibraryBundle:Reservation')->find($id);

        if ($reservation) {
            $reservation->setBookTaken(true);
            $em->flush();

            $this->addFlash(
                'notice',
                '200'
            );
        }

        return $this->redirectToRoute('admin_reserved_books');
    }

    /**
     * Return books.
     *
     * @Route("/return-book/{id}", name="admin_return_book", requirements={"id": "\d+"})
     * @Method("GET")
     * @Template()
     */
    public function returnBookAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $reservation = $em->getRepository('F4LibraryBundle:Reservation')->find($id);

        if ($reservation) {
            $book = $em->getRepository('F4LibraryBundle:Book')->find($reservation->getBook());
            $user = $em->getRepository('F4UserBundle:User')->find($reservation->getUser());
            $user->addReadBook($book);
            $em->remove($reservation);
            $em->flush();
            $this->addFlash(
                'notice',
                '200'
            );
        }

        return $this->redirectToRoute('admin_taken_books');
    }

    protected function createBook($book, $n = 1)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $bookExists = $em->getRepository('F4LibraryBundle:Book')->findOneBy(array('isbn' => $book->getIsbn()));

        if (!$bookExists) {
            $b = new Book();

            $authors = $this->createAuthors($book->getAuthors());

            foreach ($authors as $author) {
                $b->addAuthor($author);
            }

            $b->setIsbn($book->getIsbn());
            $b->setTitle($book->getTitle());
            $b->setDescription($book->getDescription());
            $b->setImage($book->getImage());
            $b->setLargeImage($book->getLargeImage());
            $b->setSmallImage($book->getSmallImage());
            $b->setReleaseDate(new \DateTime());
            for ($i = 0; $i < $n; $i++) {
                $q = new Quantity();
                $q->setSerial('1');
                $q->setBook($b);
                $em->persist($q);
            }

            $em->persist($b);
            $em->flush();
        } else {
            return false;
        }

        return true;
    }

    protected function createAuthors($authors)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $newAuthor = array();
        $n = 0;

        foreach ($authors as $author) {
            $authorExists = $em->getRepository('F4LibraryBundle:Author')->findOneBy(array('name' => $author['name']));

            if (!$authorExists) {
                $newAuthor[$n] = new Author();
                $newAuthor[$n]->setName($author['name']);
                $newAuthor[$n]->setPhoto($author['image_url']);
                $newAuthor[$n]->setHomeTown($author['hometown']);
                $newAuthor[$n]->setBornAt($author['born_at']);
                $newAuthor[$n]->setDiedAt(null);
                $em->persist($newAuthor[$n]);
                $em->flush();
            } else {
                $newAuthor[$n] = $authorExists;
            }
            $n++;
        }

        return $newAuthor;
    }
}
