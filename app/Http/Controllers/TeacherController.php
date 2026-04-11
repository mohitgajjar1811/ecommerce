<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function teacher(Request $request)
    {
        $search = $request->search;

        if($search == null){
            $teacher = Teacher::paginate(3);
        // $teacher = DB::table('teachers')->paginate(3);
        }else{
            $teacher = Teacher::where(function ($query) use ($search) 
        // $teacher = DB::table('teachers')
        {
            $query->where('name', 'like', "%$search%")
                ->orWhere('email_id', 'like', "%$search%")
                ->orWhere('subject', 'like', "%$search%");
        })
        ->paginate(3);
      
    }
    return view('teachers',['teacher'=>$teacher]);

    }

    public function showForm(){
        return view('addteacher');
    }

    public function create(Request $request){
        Teacher::create([
            'name' => $request->name,
            'email_id' => $request->email_id,
            'subject' => $request->subject,
            'created_at' => now()
        ]);
        return redirect()->route('teacher')->with('success', 'User Insert successfully!');
    }

    public function editteacher(string $id)
    {   
        $teacher = Teacher::where('id',$id)->first();
       
        return view('editteacher',['data'=>$teacher]);
    }

    public function updateteacher(Request $request){
        // dd($request->id);
     $teacher = Teacher::where('id', $request->id)
        ->update([
            'name' => $request->name,
            'email_id' => $request->email_id,
            'subject' => $request->subject,
            'updated_at' => now()
        ]);
    
    return redirect()->route('teacher')->with('success', 'User updated successfully!');
    }

    public function deleteteacher($id){
        // dd($id);
        $teacher = Teacher::where('id',$id)
        ->delete();
        return redirect()->route('teacher')->with('success', 'User Delete successfully!');
    }
}