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

    /** @var string DATE */
    public const DATE = 'date';

    /** @var string USES */
    public const USES = 'uses';

    /** @var string FOOTBALL */
    public const FOOTBALL = 'football'; // not serious

    /** @var string[] $choices */
    protected static $choices = [
        self::AMOUNT => self::AMOUNT,
        self::PRODUCTS => self::PRODUCTS,
        self::DATE => self::DATE,
        self::USES => self::USES,
        self::FOOTBALL => self::FOOTBALL,
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
