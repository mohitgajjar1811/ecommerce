<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category(Request $request)
    {
        $search = $request->search;

        if($search == null)
        {
            $category = Category::paginate(3);
        }else{
            $category = Category::where(function ($query) use ($search)
            {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('description', 'like', "%$search%");
            })
            ->paginate(5);
        }
        
        return view('admin_category',['category'=>$category]);

    }

    public function showForm()
    {
        $category = Category::get();

        return view('addcategory', ['category' => $category]);
    }

    public function create(Request $request){
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_at' => now()
        ]);
        return redirect()->route('admin.category')->with('success', 'User Insert successfully!');
    }

    public function editcategory(string $id)
    {
        $category = Category::where('id',$id)->first();

        return view('editcategory', ['data' => $category]);
    }

    public function updatecategory(Request $request){
        // dd($request->id);
     $category = Category::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => now()
        ]);
    return redirect()->route('admin.category')->with('success', 'User updated successfully!');
    }

    public function deletecategory($id){
        // dd($id);
        $category = Category::where('id',$id)
        ->delete();
        return redirect()->route('admin.category')->with('success', 'User Delete successfully!');
    }
}
