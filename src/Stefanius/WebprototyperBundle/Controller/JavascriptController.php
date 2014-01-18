<?php

namespace Stefanius\WebprototyperBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Stefanius\WebprototyperBundle\Entity\Javascript;
use Stefanius\WebprototyperBundle\Form\JavascriptType;

/**
 * Javascript controller.
 *
 * @Route("/javascript")
 */
class JavascriptController extends Controller
{

    /**
     * Lists all Javascript entities.
     *
     * @Route("/", name="javascript")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('StefaniusWebprototyperBundle:Javascript')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Javascript entity.
     *
     * @Route("/", name="javascript_create")
     * @Method("POST")
     * @Template("StefaniusWebprototyperBundle:Javascript:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Javascript();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('javascript_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Javascript entity.
    *
    * @param Javascript $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Javascript $entity)
    {
        $form = $this->createForm(new JavascriptType(), $entity, array(
            'action' => $this->generateUrl('javascript_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Javascript entity.
     *
     * @Route("/new", name="javascript_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Javascript();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Javascript entity.
     *
     * @Route("/{id}", name="javascript_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StefaniusWebprototyperBundle:Javascript')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Javascript entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Javascript entity.
     *
     * @Route("/{id}/edit", name="javascript_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StefaniusWebprototyperBundle:Javascript')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Javascript entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Javascript entity.
    *
    * @param Javascript $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Javascript $entity)
    {
        $form = $this->createForm(new JavascriptType(), $entity, array(
            'action' => $this->generateUrl('javascript_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Javascript entity.
     *
     * @Route("/{id}", name="javascript_update")
     * @Method("PUT")
     * @Template("StefaniusWebprototyperBundle:Javascript:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('StefaniusWebprototyperBundle:Javascript')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Javascript entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('javascript_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Javascript entity.
     *
     * @Route("/{id}", name="javascript_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('StefaniusWebprototyperBundle:Javascript')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Javascript entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('javascript'));
    }

    /**
     * Creates a form to delete a Javascript entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('javascript_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
