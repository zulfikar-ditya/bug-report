<?php

namespace App\Supports;

class Number extends \Illuminate\Support\Number
{
    /**
     * Create a new class instance.
     */
    public function __construct(string $locale = null, string $currency = null)
    {
        parent::setlocale($locale ?? env('APP_LOCALE'));
        // Number::setCurrency($currency ?? env('APP_CURRENCY', 'USD'));
    }

    /**
     * Format currency
     */
    public static function formatCurrency(?int $value, ?string $currency = 'Rp')
    {
        return $currency . ' ' . number_format($value, 2, '.', ',');
    }

    /**
     * Format number
     */
    public static function formatNumber(?int $value)
    {
        return number_format($value, 2, '.', ',');
    }

    /**
     * Format phone number
     */
    public static function formatPhoneNumber(?string $value)
    {
        return preg_replace('/^(\+\d{2})(\d{3})(\d{4})(\d{4})$/', '$1 $2-$3-$4', $value);
    }

    /**
     * To decimal
     */
    public static function toDecimal(?string $value)
    {
        return str_replace(',', '', $value);
    }

    /**
     * To phone number
     */
    public static function reversePhoneNumber(?string $value)
    {
        return str_replace(' ', '', $value);
    }
}
