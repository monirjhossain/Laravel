<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'slider_title', 'slider_subtitle', 'slider_image', 'slider_description', 'button_text', 'button_link'
    ];
}
