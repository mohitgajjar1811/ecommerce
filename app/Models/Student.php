<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student';

    protected $fillable = [
        'first_name',
        'class_id',
        'email_id',
        'course_id',
        'gender',
        'address',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(Classes::class,'class_id');
    }
}

// $student = Student::create([
//     'first_name' => 'rojar',
//     'class_id' => '5',
//     'email_id' => 'rojar@gmail.com',
//     'course_id' => '3',
//     'gender' => 'male',
//     'address' => 'naroda'
//   ],
// );

// dd($student->id);
