<?php

namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * Class EnumPromotionType
 * @package App\DBAL\Types
 */
class EnumPromotionType extends AbstractEnumType
{
    /** @var string AMOUNT */
    public const AMOUNT = 'amount';

    /** @var string PRODUCTS */
    public const PRODUCTS = 'products';

    /** @var string USES */
    public const USES = 'uses';

    /** @var string[] $choices */
    protected static $choices = [
        self::AMOUNT => self::AMOUNT,
        self::PRODUCTS => self::PRODUCTS,
        self::USES => self::USES,
    ];

    /**
     * @param TranslatorInterface $translator
     * @return array
     */
    public static function getChoicesTranslated(TranslatorInterface $translator): array
    {
        $choicesTranslated = [];

        foreach (self::getChoices() as $choice) {
            $choicesTranslated[$choice] = $translator->trans("promotion.$choice", [], 'enum');
        }

        return $choicesTranslated;
    }
}
