<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'price',
    ];
}

// $book = Book::create([
//     'title' => 'Mahabharat',
//     'author' => 'Shree Ved Vyas',
//     'price' => '3500'
//   ],
// );
 
// dd($book->id);