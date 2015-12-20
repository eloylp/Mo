<?php

namespace Mo\MainWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class MainWebSiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('@MoMainWebsite/index.html.twig');
    }

    public function translationTestAction()
    {
        $welcome = $this->get('translator')->trans('mo.mainwebsite.welcome');

        return new Response($welcome);

    }

    public function contactAction()
    {

    }

}
