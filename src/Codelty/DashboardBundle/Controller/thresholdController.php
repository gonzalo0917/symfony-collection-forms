<?php

namespace Codelty\DashboardBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Codelty\DashboardBundle\Entity\threshold;
use Codelty\DashboardBundle\Form\thresholdType;

/**
 * threshold controller.
 *
 * @Route("/threshold")
 */
class thresholdController extends Controller
{

    /**
     * Lists all threshold entities.
     *
     * @Route("/", name="threshold")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CodeltyDashboardBundle:threshold')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new threshold entity.
     *
     * @Route("/", name="threshold_create")
     * @Method("POST")
     * @Template("CodeltyDashboardBundle:threshold:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new threshold();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('threshold_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a threshold entity.
    *
    * @param threshold $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(threshold $entity)
    {
        $form = $this->createForm(new thresholdType(), $entity, array(
            'action' => $this->generateUrl('threshold_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new threshold entity.
     *
     * @Route("/new", name="threshold_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new threshold();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a threshold entity.
     *
     * @Route("/{id}", name="threshold_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CodeltyDashboardBundle:threshold')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find threshold entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing threshold entity.
     *
     * @Route("/{id}/edit", name="threshold_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CodeltyDashboardBundle:threshold')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find threshold entity.');
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
    * Creates a form to edit a threshold entity.
    *
    * @param threshold $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(threshold $entity)
    {
        $form = $this->createForm(new thresholdType(), $entity, array(
            'action' => $this->generateUrl('threshold_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing threshold entity.
     *
     * @Route("/{id}", name="threshold_update")
     * @Method("PUT")
     * @Template("CodeltyDashboardBundle:threshold:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CodeltyDashboardBundle:threshold')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find threshold entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('threshold_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a threshold entity.
     *
     * @Route("/{id}", name="threshold_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CodeltyDashboardBundle:threshold')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find threshold entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('threshold'));
    }

    /**
     * Creates a form to delete a threshold entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('threshold_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
