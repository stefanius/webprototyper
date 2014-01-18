<?php

namespace Stefanius\WebprototyperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('StefaniusWebprototyperBundle:Default:index.html.twig', array('name' => $name));
    }
}
