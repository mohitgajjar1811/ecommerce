<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'email_id',
        'subject',
    ];
}

// $teacher = Teacher::create([
//     'name' => 'Mansi',
//     'email_id' => 'mansi@gmail.com',
//     'subject' => 'Social Science'
//   ],
// );

// dd($teacher->id);