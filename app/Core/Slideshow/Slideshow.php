<?php

namespace fooCart\Core\Slideshow;

use Illuminate\Database\Eloquent\Model;

class Slideshow extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
