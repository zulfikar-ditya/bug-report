<?php

namespace App\Supports;

class Str extends \Illuminate\Support\Str
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Twilio WhatsApp number.
     */
    public static function twilioWhatsappNumber(string $number): string
    {

        if (self::startsWith($number, 'whatsapp:')) {
            return $number;
        }

        if (substr($number, 0, 1) === '+') {
            $number = substr($number, 1);
        }

        return "whatsapp:{$number}";
    }

    /**
     * File response
     */
    public static function fileResponse(?string $filename)
    {
        return self::replace('/', '$', $filename);
    }

    /**
     * File request
     */
    public static function fileRequest(?string $filename)
    {
        return self::replace('$', '/', $filename);
    }

    /**
     * check slug
     */
    public static function checkSlug(?string $slug, ?string $model, ?string $column = 'slug', bool $softDelete = false)
    {
        $slug = self::slug($slug);
        $model = 'App\\Models\\' . $model;
        $query = $model::where($column, $slug);

        if ($softDelete) {
            $query->withTrashed();
        }

        if ($query->exists()) {
            $slug = $slug . '-' . self::random(5);
        }

        return $slug;
    }

    /**
     * Lang
     */
    public static function lang(?string $value, ?array $replace = [], ?string $locale = null)
    {
        return __($value, $replace, $locale);
    }
}
