<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = [
        'ndc_code',
        'brand_name',
        'labeler_name',
        'product_type',
    ];
        //
}
