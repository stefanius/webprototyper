<?php

namespace Stefanius\WebprototyperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
	
	/**
	 * @Route("/lullo")
	 */
	public function indexAction()
	{
		return $this->render('StefaniusWebprototyperBundle:Default:index.html.twig', array('name' => 'banaan'));
	}
	
	/**
	 * @Route("/search/{name}")
	 */
    public function testAction($name)
    {
        return $this->render('StefaniusWebprototyperBundle:Default:index.html.twig', array('name' => $name));
    }



}
