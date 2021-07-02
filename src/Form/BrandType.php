<?php

namespace App\Form;

use App\Entity\Brand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class BrandType
 * @package App\Form
 */
class BrandType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'brand.fields.name',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'constraints' => new NotBlank(),
                ]
            )
            ->add(
                'vat',
                NumberType::class,
                [
                    'label' => 'brand.fields.vat',
                    'html5' => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'constraints' => new NotBlank(),
                ]
            );
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Brand::class,
            'translation_domain' => 'crud',
        ]);
    }
}
