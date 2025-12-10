<?php

namespace App\Utilts;

use Illuminate\Support\Str;

class StringUtilts
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public static function slugify(string $input): string
    {
        return Str::slug($input, '-');
    }
}
