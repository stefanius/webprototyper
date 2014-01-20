<?php

namespace Stefanius\WebprototyperBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Stefanius\WebprototyperBundle\Entiy\Page;

class CatchallController extends Controller
{
    public function catchallAction($slug)
    {
    	$em = $this->get('doctrine')->getManager();
    	$page = $em->getRepository('StefaniusWebprototyperBundle:Page')->findOneByUrl($slug);
    	$csslibs = $page->getCssLibs();
    	$javascriptlibs = $page->getJavascriptLibs();
    	return $this->render('StefaniusWebprototyperBundle:ProtoTemplates:basic.html.twig', array('page' => $page, 'csslibs'=>$csslibs, 'javascriptlibs'=>$javascriptlibs));
    }
}