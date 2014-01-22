<?php

namespace Stefanius\WebprototyperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;

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
	
	/**
	 * @Route("/assets/sitemap.xml")
	 */
	public function sitemapAction()
	{
		$sitemap = file_get_contents(__DIR__.'/../Resources/sitemap.xml');
		$response = new Response(
		    $sitemap,
		    Response::HTTP_OK,
		    array('content-type' => 'text/xml')
		);
		
		return $response;
	}
}
