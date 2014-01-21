<?php
namespace Stefanius\WebprototyperBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PageAdmin extends Admin
{
	// Fields to be shown on create/edit forms
	protected function configureFormFields(FormMapper $formMapper)
	{
		$formMapper
				->add('body', 'textarea', array('label' => 'HTML Body'))
				->add('pagetitle', 'text', array('label' => 'Pagetitle'))
				->add('description', 'textarea', array('label' => 'description'))
				->add('url', 'text', array('label' => 'url'))
				->add('csslibs', 'entity', array('class'=>'StefaniusWebprototyperBundle:CssLib','by_reference' => false, 'multiple' => true))
				->add('javascriptlibs', 'entity', array('class'=>'StefaniusWebprototyperBundle:JavascriptLib','by_reference' => false, 'multiple' => true))
		;

	}

	// Fields to be shown on filter forms
	protected function configureDatagridFilters(DatagridMapper $datagridMapper)
	{
		$datagridMapper
		->add('body')
		->add('pagetitle')
		->add('description')
		->add('url')
		;
	}

	// Fields to be shown on lists
	protected function configureListFields(ListMapper $listMapper)
	{
		$listMapper
		->addIdentifier('pagetitle')
		->add('url')
		;
	}
}