<?php
/**
 * Created by PhpStorm.
 * User: lute
 * Date: 12/12/15
 * Time: 17:39
 */

namespace Mo\AdmBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdmController extends Controller
{

    public function indexAction()
    {

        return $this->render('MoAdmBundle::index.html.twig');

    }

}