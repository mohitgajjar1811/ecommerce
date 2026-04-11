<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function Department(Request $request)
    {
        $search = $request->search;

        if($search == null){
            $department = Department::paginate(5);

            // $department = DB::table('department')->paginate(5); 
        }else
        {
            $department = Department::where(function ($query) use ($search){
                $query->where('department.name', 'like', "%$search%");
            })->paginate(5);        // all data get from table
        }
        // $department = DB::table('department')->orderBy('id')->chunk(3, function (Collection $departments) {
        //     foreach ($departments as $department) {
        //         // dd($department);
        //     }
        // });
        // dd($department);
        return view('department',['department'=>$department]);
        
    }

    public function showForm()
    {
        return view('adddepartment');
    }

    public function create(Request $request)
    {
        Department::create([
            'name' => $request->name,
            'created_at' => now()
        ]);
        return redirect()->route('department')->with('success', 'User Insert successfully!');
    }

    public function editdepartment(string $id)
    {   
        $department = Department::where('id',$id)
        ->first();
        // DB::enableQueryLog();
        // dd(DB::getQueryLog());
        // dd($department);
        return view('editdepartment',['data'=>$department]);
    }

    public function updatedepartment(Request $request)
    {
        // dd($request->id);
     Department::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'updated_at' => now()
        ]);
    
    return redirect()->route('department')->with('success', 'User updated successfully!');
    }

    public function deletedepartment($id){
        // dd($id);
        Department::where('id',$id)
        ->delete();
        return redirect()->route('department')->with('success', 'User Delete successfully!');
    }
};