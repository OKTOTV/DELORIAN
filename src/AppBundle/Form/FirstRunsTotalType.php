<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Series;

class FirstRunsTotalType extends AbstractType
{
    private $trans;

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('from', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'delorian.first_runs_total_from'
                ]
            )
            ->add('to', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'delorian.first_runs_total_to'
                ]
            )
            ->add('delimiter', TextType::class, [
                'label' => 'delorian.first_runs_total_delimiter'
            ]);
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CSVRange'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'delorian_first_runs_total';
    }
}
