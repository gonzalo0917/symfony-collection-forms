<?php

namespace Codelty\DashboardBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class thresholdType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('metricType', 'entity', array(
              'class' => 'Codelty\DashboardBundle\Entity\metric',
              'label' => 'Metric',
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Codelty\DashboardBundle\Entity\threshold'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'codelty_dashboardbundle_threshold';
    }
}
