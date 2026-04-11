<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;


class EmployeeController extends Controller
{
    public function employee(Request $request)
    {
        $search = $request->search;

        if($search == null)
        {
            $employee = Employee::with(['department'])->paginate(3);
        }else{
            $employee = Employee::with(['department']) 
            ->where(function ($query) use ($search)
            {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email_id', 'like', "%$search%");
            })
            ->orWhereHas('department', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            })
        ->paginate(3); 
        }
        // $email = DB::table('employee')->where('name', 'yogi')->value('email_id');
        // dd($department); 
        // all data get from table
        //  $user = DB::table('employee')->find(3);
        // $employee = DB::table('employee')->pluck('name');
        
        // foreach ($employee as $empl) {
        //     echo $empl;
        //     dd($empl); 
        // }

// $employee = DB::table('employee')->count();
// dd($employee);

// $price = DB::table('employee')->max('price');
        
        return view('employee',['employee'=>$employee]);
    }

    public function showForm(){
        $department = Department::get();
        return view('addemployee',['department' => $department]);
    }

    public function create(Request $request){
        Employee::create([
            'name' => $request->name,
            'email_id' => $request->email_id,
            'department_id' => $request->department_id,
            'created_at' => now()
        ]);
        return redirect()->route('employee')->with('success', 'User Insert successfully!');
    }

    public function editemployee(string $id)
    {   
        
        $employee = Employee::where('id',$id)->first();
        $department = Department::get();
        
        return view('editemployee',['data'=>$employee,'department' => $department]);
    }

    public function updateemployee(Request $request){
        // dd($request);
     Employee::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email_id' => $request->email,
            'department_id' => $request->department_id,
            'updated_at' => now()
        ]);
    return redirect()->route('employee')->with('success', 'User updated successfully!');
    }

    public function deleteemployee($id){
        // dd($id);
        Employee::where('id',$id)
        ->delete();
        return redirect()->route('employee')->with('success', 'User Delete successfully!');
    }
    
}