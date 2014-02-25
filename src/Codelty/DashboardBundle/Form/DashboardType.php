<?php

namespace Codelty\DashboardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class DashboardType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pageTitle')
            ->add('gameTitle')
            ->add('platform')
            ->add('arrFilters', 'collection', array(
              'type' => new FiltersType(),
              'label' => false,
              'allow_add' => true,
              'allow_delete' => true,     
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Codelty\DashboardBundle\Entity\Dashboard',
            'cascade_validation' => true,
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'codelty_dashboardbundle_dashboard';
    }
}
