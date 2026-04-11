<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;



class ProductController extends Controller
{
    public function product(Request $request)
    {
        $search = $request->search;

        if ($search == null) {
            $product = Product::with(['category', 'unit'])->paginate(5);
        } else {
            $product = Product::with(['category', 'unit'])
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->orWhere('price', 'like', "%$search%")
                        ->orWhere('stock', 'like', "%$search%");
                })
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
                ->orWhereHas('unit', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
                ->paginate(5);
        }
        //dd($product);
        return view('admin_product', ['product' => $product]);

    }

    public function showForm()
    {
        $category = Category::get();
        $unit = Unit::get();
        return view('addproduct', ['category' => $category, 'unit' => $unit]);
    }

    public function create(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|file|mimes:jpg,png,pdf"|max:2048',
        // ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // dd($file);
            // store in storage/app/public/uploads
            $path = $file->store('uploads', 'public');
        }
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $path,
            'created_at' => now()
        ]);
        return redirect()->route('admin.product')->with('success', 'User Insert successfully!');
    }

    public function editproduct(string $id)
    {
        $product = Product::where('id', $id)->first();
        $category = Category::get();
        $unit = Unit::get();

        return view('editproduct', ['data' => $product, 'category' => $category, 'unit' => $unit]);
    }

    public function updateproduct(Request $request)
    {
        // dd($request->id);
        $product = Product::where('id', $request->id)
            ->update([
                'image' => $request->image,
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'unit_id' => $request->unit_id,
                'price' => $request->price,
                'stock' => $request->stock,
                'updated_at' => now()
            ]);
        return redirect()->route('admin.product')->with('success', 'User updated successfully!');
    }

    public function deleteproduct($id)
    {
        // dd($id);
        $product = Product::where('id', $id)
            ->delete();
        return redirect()->route('admin.product')->with('success', 'Product deleted successfully!');
    }
}
