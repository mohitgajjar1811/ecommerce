<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classes';

    protected $fillable = [
        'class_name',
    ];

    
}
