<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'department';

    protected $fillable = [
        'name',
    ];
}

// $department = Department::create([
//     'name' => 'Manager',
//   ],
// );

// dd($department->id);