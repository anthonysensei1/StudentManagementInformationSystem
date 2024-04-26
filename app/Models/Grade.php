<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected static function booted()
    {
        static::saving(function ($grade) {
            if (
                !is_null($grade->quarter_1) && !is_null($grade->quarter_2) &&
                !is_null($grade->quarter_3) && !is_null($grade->quarter_4)
            ) {
                $grade->final_rating = ($grade->quarter_1 + $grade->quarter_2 +
                    $grade->quarter_3 + $grade->quarter_4) / 4;
            } else {
                $grade->final_rating = null;
            }
        });
    }
}
