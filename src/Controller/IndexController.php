<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 23/11/2018
 * Time: 10:25
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * Developpement function for first vue return
     * @Route("/", name="index_index")
     */
    public function index()
    {
        return $this->render('index/index.html.twig');
    }



}