<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function book(Request $request)
    {
        $search = $request->search;

        if($search == null){
            $book = Book::paginate(5); 
            // dd($book);
        }else{
            $book = Book::where(function ($query) use ($search) 
            {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('author', 'like', "%$search%")
                    ->orWhere('price', 'like', "%$search%");
            })
            ->paginate(4); 
        }
         
        return view('book',['book'=>$book]);
        
    }

    public function showForm(){
        return view('addbook');
    }

    public function create(Request $request){
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'created_at' => now()
        ]);
        return redirect()->route('book')->with('success', 'User Insert successfully!');
    }

    public function editbook(string $id)
    {   
        $book = Book::where('id',$id)->first();
      
        return view('editbook',['data'=>$book]);
    }
    public function updatebook(Request $request){
        // dd($request->id);
     $book = Book::where('id', $request->id)
        ->update([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'updated_at' => now()
        ]);
    
    return redirect()->route('book')->with('success', 'User updated successfully!');
    }

    public function deletebook($id){
        // dd($id);
        $book = Book::where('id',$id)
        ->delete();
        return redirect()->route('book')->with('success', 'User Delete successfully!');
    }
}