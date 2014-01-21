<?php

namespace Stefanius\WebprototyperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
	
	/**
	 * @Route("/")
	 */
	public function indexAction()
	{
		$em = $this->get('doctrine')->getManager();
		$page = $em->getRepository('StefaniusWebprototyperBundle:Page')->findOneByUrl('/');

		if(null === $page){
			return $this->render('StefaniusWebprototyperBundle:Default:index.html.twig', array('name' => 'banaan'));
		}else{
			$csslibs = $page->getCssLibs();
			$javascriptlibs = $page->getJavascriptLibs();
			 
			return $this->render('StefaniusWebprototyperBundle:ProtoTemplates:basic.html.twig', array('page' => $page, 'csslibs'=>$csslibs, 'javascriptlibs'=>$javascriptlibs));				
		}
		
	}
}
