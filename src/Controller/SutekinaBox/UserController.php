<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 21/11/2018
 * Time: 17:37
 */

namespace App\Controller\SutekinaBox;


use App\Entity\User;
use App\User\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/inscription", name="membre_inscription")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function inscription(Request $request)
    {
        $user = new User();

        $form = $this->createForm(UserType::class)->handleRequest($request);

        return $this->render('user/inscritpion.html.twig', [
            'form' => $form->createView()
        ]);
    }
}