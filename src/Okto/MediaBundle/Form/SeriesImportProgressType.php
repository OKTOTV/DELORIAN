<?php

namespace Okto\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Okto\MediaBundle\Entity\Series;

class SeriesImportProgressType extends AbstractType
{
    private $trans;

    public function __construct($trans)
    {
        $this->trans = $trans;
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('importProgress', ChoiceType::class, [
                'choices' => [
                    Series::IMPORT_PROGRESS_FRESH => $this->trans->transchoice('oktolab_media.series_import_progress_choice', Series::IMPORT_PROGRESS_FRESH),
                    Series::IMPORT_PROGRESS_IN_WORK => $this->trans->transchoice('oktolab_media.series_import_progress_choice', Series::IMPORT_PROGRESS_IN_WORK),
                    Series::IMPORT_PROGRESS_FINISHED => $this->trans->transchoice('oktolab_media.series_import_progress_choice', Series::IMPORT_PROGRESS_FINISHED)
                    ],
                'label' => 'oktolab_media.series_progress_label'
                ]
            );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Okto\MediaBundle\Entity\Series'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'oktolab_mediabundle_series_import_progress';
    }
}
