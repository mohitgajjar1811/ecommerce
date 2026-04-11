<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee';

    protected $fillable = [
        'name',
        'email_id',
        'department_id',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}

// $employee = Employee::create([
//     'name' => 'rojar',
//     'email_id' => 'rojar@gmail.com',
//     'department_id' => '5'
//   ],
// );

// dd($employee->id);