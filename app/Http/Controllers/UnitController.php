<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function unit(Request $request)
    {
        $search = $request->search;

        if($search == null)
        {
            $unit = Unit::paginate(3);
        }else{
            $unit = Unit::where(function ($query) use ($search)
            {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('short_name', 'like', "%$search%");
            })
            ->paginate(5);
        }
        return view('admin_unit',['unit'=>$unit]);
        
    }

    public function showForm()
    {
        $unit = Unit::get();

        return view('addunit',['unit' => $unit ]);
    }

    public function editunit(string $id)
    {
        $unit = Unit::where('id',$id)->first();

        return view('editunit', ['data' => $unit]);
    }

    public function create(Request $request){
        Unit::create([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'created_at' => now()
        ]);
        return redirect()->route('admin.unit')->with('success', 'User Insert successfully!');
    }

    public function updateunit(Request $request){
        // dd($request->id);
     $unit = Unit::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'short_name' => $request->short_name,
            'updated_at' => now()
        ]);
    return redirect()->route('admin.unit')->with('success', 'User updated successfully!');
    }

    public function deleteunit($id){
        // dd($id);
        $unit = Unit::where('id',$id)
        ->delete();
        return redirect()->route('admin.unit')->with('success', 'User Delete successfully!');
    }
}
