<?php

namespace Okto\MediaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EpisodeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,
                ['label' => 'oktolab_media.name_label']
            )

            ->add('description', TextareaType::class,
                [
                    'label' => 'oktolab_media.description_label',
                    'attr' => [
                        'class' => 'character500', 'style' => 'height:200px',
                        'placeholder' => 'oktolab_media.description_placeholder'
                    ]
                ]
            )

            ->add('isActive', CheckboxType::class,
                ['label' => 'oktolab_media.isActive_label']
            )

            ->add('onlineStart', DateTimeType::class,
                [
                    'widget' => 'single_text',
                    'html5' => false,
                    //'format' => 'd.m.Y H:i',
                    'label' => 'oktolab_media.onlineStart_label',
                    'attr' => ['placeholder' => 'oktolab_media.onlineStart_placeholder']
                ]
            )

            ->add('onlineEnd', DateTimeType::class,
                [
                    'widget' => 'single_text',
                    'html5' => false,
                    //'format' => 'd.m.Y H:i',
                    'placeholder' => 'oktolab_media.onlineEnd_placeholder',
                    'label' => 'oktolab_media.onlineEnd_label',
                    'attr' => ['placeholder' => 'oktolab_media.onlineEnd_placeholder']
                ]
            )

            ->add('uniqID', TextType::class,
                ['label' => 'oktolab_media.uniqID_label']
            )

            ->add('posterframe', 'asset',
                ['label' => 'oktolab_media.posterframe_label']
            )

            ->add('video', 'asset', ['label' => 'oktolab_media.video_label'])

            ->add('series', EntityType::class, ['class' => 'MediaBundle:Series', 'choice_label' => 'name', 'label' => 'oktolab_media.episode_series_label'])
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Okto\MediaBundle\Entity\Episode'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'oktolab_mediabundle_episode';
    }
}
