<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Unit;
use App\Models\Order;
use App\Models\User;





class DashboardController extends Controller
{
    public function show()
    {
        $studentCount = Student::count();
        $employeeCount = Employee::count();
        $productCount = Product::count();
        $unitCount = Unit::count();
        $categoryCount = Category::count();
        $orderCount = Order::count();
        $cartCount = Cart::count();
        $userCount = User::count();


        // $teacherCount = Teacher::count();
        // $bookCount = Book::count();

        return view('admin_dashboard',[
            'studentCount' => $studentCount, 
            'employeeCount' => $employeeCount, 
            'productCount' => $productCount, 
            'unitCount' => $unitCount, 
            'categoryCount' => $categoryCount, 
            'orderCount' => $orderCount, 
            'cartCount' => $cartCount, 
            'userCount' => $userCount, 


            // 'teacherCount' => $teacherCount,
            // 'bookCount' => $bookCount
        ]);
    }

}
