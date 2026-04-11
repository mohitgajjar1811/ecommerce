<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Classes;
use App\Models\Course;

class StudentController extends Controller
{
    public function student(Request $request)
    {
        $search = $request->search;
        // dd($search);
        // DB::enableQueryLog();
        if($search == null){
            $student = Student::with(['course','class'])->paginate(5);
        }else{
            $student = Student::with(['course','class'])
            ->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%")
                    ->orWhere('email_id', 'like', "%$search%")
                    ->orWhere('gender', 'like', "%$search%");
            })
            ->orWhereHas('course', function ($q) use ($search) {
                $q->where('course_name', 'like', "%$search%");
            })
            ->orWhereHas('class', function ($q) use ($search) {
                $q->where('class_name', 'like', "%$search%");
            })
            ->paginate(5);
            // dd($student);
        }
        
        return view('student',['student'=>$student]);
        
    }

    public function showForm(){
        $classes = Classes::get();
        $courses = Course::get();
        return view('addstudent',['classes' => $classes,'courses' => $courses]);
    }

    public function create(Request $request){
        Student::create([
            'first_name' => $request->first_name,
            'class_id' => $request->class_id,
            'email_id' => $request->email_id,
            'course_id' => $request->course_id,
            'gender' => $request->gender,
            'address' => $request->address,
            'created_at' => now()
        ]);
        return redirect()->route('student')->with('success', 'User Insert successfully!');
    }


    public function editstudent(string $id)
    {  
        $student = Student::where('id',$id)->first();
        $classes = Classes::get();
        $courses = Course::get();
        // dd($student);
        return view('editstudent',['data'=>$student,'classes' => $classes,'courses' => $courses]);
    }

    public function updatestudent(Request $request){
        // dd($request->id);
     $student = Student::where('id', $request->id)
        ->update([
            'first_name' => $request->first_name,
            'class_id' => $request->class_id,
            'email_id' => $request->email_id,
            'course_id' => $request->course_id,
            'gender' => $request->gender,
            'address' => $request->address,
            'updated_at' => now()
        ]);
    return redirect()->route('student')->with('success', 'User updated successfully!');
    }

    public function deletestudent($id){
        // dd($id);
        $student = Student::where('id',$id)
        ->delete();
        return redirect()->route('student')->with('success', 'User Delete successfully!');
    }
    
}