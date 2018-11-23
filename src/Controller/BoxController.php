<?php

namespace App\Controller;

use App\Entity\Box;
use App\Form\BoxType;
use App\Repository\BoxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/box")
 */
class BoxController extends AbstractController
{
    /**
     * @Route("/", name="box_index", methods="GET")
     * @param BoxRepository $boxRepository
     * @return Response
     */
    public function index(BoxRepository $boxRepository): Response
    {
        return $this->render('box/index.html.twig', ['boxes' => $boxRepository->findAll()]);
    }

    /**
     * @Route("/new", name="box_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $box = new Box();
        $form = $this->createForm(BoxType::class, $box);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($box);
            $em->flush();

            return $this->redirectToRoute('box_index');
        }

        return $this->render('box/new.html.twig', [
            'box' => $box,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="box_show", methods="GET")
     * @param Box $box
     * @return Response
     */
    public function show(Box $box): Response
    {
        return $this->render('box/show.html.twig', ['box' => $box]);
    }

    /**
     * @Route("/{id}/edit", name="box_edit", methods="GET|POST")
     * @param Request $request
     * @param Box $box
     * @return Response
     */
    public function edit(Request $request, Box $box): Response
    {
        $form = $this->createForm(BoxType::class, $box);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('box_index', ['id' => $box->getId()]);
        }

        return $this->render('box/edit.html.twig', [
            'box' => $box,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="box_delete", methods="DELETE")
     * @param Request $request
     * @param Box $box
     * @return Response
     */
    public function delete(Request $request, Box $box): Response
    {
        if ($this->isCsrfTokenValid('delete'.$box->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($box);
            $em->flush();
        }

        return $this->redirectToRoute('box_index');
    }
}
