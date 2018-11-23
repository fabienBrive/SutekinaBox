<?php

namespace App\Controller;

use App\Entity\Box;
use App\Form\BoxType\InitializationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/box")
 */
class BoxController extends AbstractController
{
    /**
     * @Route("/creation-Box", name="box_create")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function new(Request $request)
    {
        $box = new Box();
        $form = $this->createForm(InitializationType::class, $box);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($box);
            $em->flush();

            return $this->redirectToRoute('box_complete');
        }

        return $this->render('box/initialization.html.twig', [
            'box' => $box,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("complete-box/{id}", name="box_complete")
     * @param $id
     */
    public function BoxComplete($id)
    {
        $box = $this->getDoctrine()->getRepository(Box::class)->find($id);
        dump($box);die;
    }
}
