<?php

namespace App\Form;

use App\DBAL\Types\EnumPromotionType;
use App\Entity\Promotion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class PromotionType
 * @package App\Form
 */
class PromotionType extends AbstractType
{
    /** @var TranslatorInterface$translator */
    private $translator;

    /**
     * PromotionType constructor.
     * @param TranslatorInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'amount',
                NumberType::class,
                [
                    'label' => 'promotion.fields.amount',
                    'html5' => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'reduction',
                NumberType::class,
                [
                    'label' => 'promotion.fields.reduction',
                    'html5' => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'isDeliveryFree',
                CheckboxType::class,
                [
                    'label' => 'promotion.fields.is_delivery_free',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'nbProducts',
                NumberType::class,
                [
                    'label' => 'promotion.fields.nb_products',
                    'html5' => true,
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'startDate',
                DateType::class,
                [
                    'label' => 'promotion.fields.start_date',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'endDate',
                DateType::class,
                [
                    'label' => 'promotion.fields.end_date',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]
            )
            ->add(
                'type',
                ChoiceType::class,
                [
                    'label' => 'promotion.fields.type',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                    'choices' => array_flip(EnumPromotionType::getChoicesTranslated($this->translator)),
                    'constraints' => new NotBlank(),
                ]
            )
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Promotion::class,
            'translation_domain' => 'crud',
        ]);
    }
}
