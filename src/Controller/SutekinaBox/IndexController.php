<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 21/11/2018
 * Time: 14:11
 */

namespace App\Controller\SutekinaBox;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends Controller
{
    /**
     * Developpement function fir first vue return
     * @Route({}, name="index_index")
     */
    public function index()
    {
        return $this->render('index/index.html.twig');
    }
}