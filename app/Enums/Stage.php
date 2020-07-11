<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static BRONZE()
 * @method static static SILVER()
 * @method static static GOLD()
 * @method static static PREMIUM()
 */
final class Stage extends Enum
{
    const PREMIUM = 'Premium';
    const GOLD    = 'Gold';
    const SILVER  = 'Silver';
    const BRONZE  = 'Bronze';

    protected static $rate = [
        self::PREMIUM => 50000,
        self::GOLD    => 10000,
        self::SILVER  => 5000,
        self::BRONZE  => 0,
    ];


    /**
     * @param int $point
     * @return Stage
     */
    public static function getStage(int $point): Stage
    {
        switch ($point) {
            case $point >= self::$rate[self::PREMIUM]:
                return self::PREMIUM();

            case $point >= self::$rate[self::GOLD] && $point < self::$rate[self::PREMIUM]:
                return self::GOLD();

            case $point >= self::$rate[self::SILVER] && $point < self::$rate[self::GOLD]:
                return self::SILVER();

            default:
                return self::BRONZE();
        }
    }

    /**
     * @return string|null
     */
    public function getNextStage(): ?string
    {
        switch ($this->value) {
            case self::PREMIUM:
                return null;

            case self::GOLD:
                return self::PREMIUM;

            case self::SILVER:
                return self::GOLD;

            case self::BRONZE:
                return self::SILVER;

            default:
                return self::BRONZE;
        }
    }

    /**
     * @param int $point
     * @return int|null
     */
    public function getPointsNeededForNextStage(int $point): ?int
    {
        switch ($this->value) {
            case self::PREMIUM:
                return null;

            case self::GOLD:
                return self::$rate[self::PREMIUM] - $point;

            case self::SILVER:
                return self::$rate[self::GOLD] - $point;

            default:
                return self::$rate[self::SILVER] - $point;
        }
    }
}
