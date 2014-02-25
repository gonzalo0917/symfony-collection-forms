<?php

namespace Codelty\DashboardBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Codelty\DashboardBundle\Entity\metricType;
use Codelty\DashboardBundle\Form\metricTypeType;

/**
 * metricType controller.
 *
 * @Route("/metrictype")
 */
class metricTypeController extends Controller
{

    /**
     * Lists all metricType entities.
     *
     * @Route("/", name="metrictype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CodeltyDashboardBundle:metricType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new metricType entity.
     *
     * @Route("/", name="metrictype_create")
     * @Method("POST")
     * @Template("CodeltyDashboardBundle:metricType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new metricType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('metrictype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a metricType entity.
    *
    * @param metricType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(metricType $entity)
    {
        $form = $this->createForm(new metricTypeType(), $entity, array(
            'action' => $this->generateUrl('metrictype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new metricType entity.
     *
     * @Route("/new", name="metrictype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new metricType();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a metricType entity.
     *
     * @Route("/{id}", name="metrictype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CodeltyDashboardBundle:metricType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find metricType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing metricType entity.
     *
     * @Route("/{id}/edit", name="metrictype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CodeltyDashboardBundle:metricType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find metricType entity.');
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
    * Creates a form to edit a metricType entity.
    *
    * @param metricType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(metricType $entity)
    {
        $form = $this->createForm(new metricTypeType(), $entity, array(
            'action' => $this->generateUrl('metrictype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing metricType entity.
     *
     * @Route("/{id}", name="metrictype_update")
     * @Method("PUT")
     * @Template("CodeltyDashboardBundle:metricType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CodeltyDashboardBundle:metricType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find metricType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('metrictype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a metricType entity.
     *
     * @Route("/{id}", name="metrictype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CodeltyDashboardBundle:metricType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find metricType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('metrictype'));
    }

    /**
     * Creates a form to delete a metricType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('metrictype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
