<?php

namespace Mo\MainWebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainWebSiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('@MoMainWebsite/index.html.twig');
    }

    public function contactAction()
    {

    }

}
