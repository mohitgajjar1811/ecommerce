<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpController1;
use App\Http\Controllers\simpleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductpageController;
use App\Http\Controllers\CartpageController;
use App\Http\Controllers\CategorypageController;
use App\Http\Controllers\AdminloginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrdersummaryController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/service', function () {
    return view('service');
});
/// lecture 1 topic

// Route::get('/about', function () {
//     return '<a href="/">Home</a> Hello this is About Page';
// });

// Route::view('/service', 'service',
// [
// 'Service' => 'Service Data 123', 'Service2' => 'Service Data 456', 'Service3' => 'Service Data 789'
// ]);
// passing two arguments to view method, first is url and second is view name and third is data to pass to view

// route with parameters
// you can take any think in parameters

// Route::get('/blog/{id}', function (string $id) {
//     return '<h1>This is Blog Page and Blog Id is ' . $id . '</h1>';
// });

/// lecture 2 topics

// Route::get('/blog/{id?}', function (string $id = null) {
//     if($id){
//         return '<h1>This is Blog Page and Blog Id is ' . $id . '</h1>';
//     }else{
//         return '<h1>This is Blog Page</h1>';
//     }
// });

// conditional base routing
// ->whereNumber() -> for stick parameters is always number
// whereAlpha() -> stick with alphabate in parameters

// Route::get('/blog/{id?}/comment/{comment?}', function (string $id = null,string $comm = null) {
//     if($id || $comm){
//         return '<h1>This is Blog Page and Blog Id is ' . $id . '</h1>
//         <p>'.$comm.'</p>
//         ';
//     }else{
//         return '<h1>This is Blog Page</h1>';
//     }
// })->whereNumber('id')->whereAlpha('comm');


// Route::get('/product/{slug?}', function (string $slug = null) {
//     if($slug){
//         return '<h1>This is Product Page</h1>
//         <p>'.$slug.'</p>
//         ';
//     }else{
//         return '<h1>This is Product Page</h1>';
//     }
// })->whereAlphaNumeric('slug');


// Route::get('/item/{slug?}', function (string $slug = null) {
//     if($slug){
//         return '<h1>This is Items Page</h1>
//         <p>'.$slug.'</p>
//         ';
//     }else{
//         return '<h1>This is Items Page</h1>';
//     }
// })->whereIn('slug', ['apple', 'banana', 'mango']);


// command for route list in terminal
// php artisan route:list
// php artisan route:list -v // for more details
// php artisan route:list -vv // for even more details
// php artisan route:list -vvv // for all details

// php artisan route:list --except-vendor // to exclude vendor routes

// php artisan route:list --only-vendor // to show only vendor routes


/// lecture 3 Topics Route Grouping / Named Routes
// Route::get('/',function(){
//     return view('index');
// });
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/page_1', function () {
    $name = "Mohit";
    $age = 22;
    return view('page1', compact('name', 'age'));
});

function fruitList()
{

    return ["Apple", "Mango", "Banana", "Chiku"];
}

Route::get('/page_2', function () {
    // $data = "This is Page 2 Content";
    $fruitList = fruitList();
    $colorList = ["Black", "White", "Orange", "Blue"];

    // return view('page2',['data' => $data]);
    // return view('page2',['fruitList' => $fruitList]);
    return view('page2')
        ->with('fruitList', $fruitList)
        ->with('colors', $colorList);
});

Route::get('/page_2/{name}', function (string $name) {
    // $fruit = fruitList();
    return "<h1>This is Single Fruite Data {$name}</h1>";
})->name('singlePage');


Route::get('/about', function () {
    return view('about');
});

Route::get('/', [HomepageController::class, 'HomePage'])->name('homepage');

Route::get('/products', [ProductpageController::class, 'ProductPage']);



// Route::get('/products',function(){
//     return view('product');
// });

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/admin/layout/app', function () {
    return view('admin.app');
});

Route::get('/contact', function () {
    return view('contact');
});



// Route::get('/admin/dashboard1', function () {
//     return view('admin.dashboard1');
// });


Route::get('/exp', [ExpController1::class, 'exp']);

Route::get('/simple', [simpleController::class, 'simple']);

Route::get('/categories', [CategorypageController::class, 'category']);


// Route::controller(StudentController::class)->group(function () {
//     Route::get('/student','student')->name('student');
//     Route::get('/student/add','showForm')->name('student.add');
//     Route::POST('/student/create','create')->name('student.create');
//     Route::get('/student/{id}','editstudent')->name('student.edit');
//     Route::post('/student/update','updatestudent')->name('student.update');
//     Route::get('/student/delete/{id}','deletestudent')->name('student.delete');
// });


// Route::controller(EmployeeController::class)->group(function () {
//     Route::get('/employee','employee')->name('employee');
//     Route::get('/employee/add','showForm')->name('employee.add');
//     Route::POST('/employee/create','create')->name('employee.create');
//     Route::get('/employee/{id}','editemployee')->name('employee.edit');
//     Route::post('/employee/update','updateemployee')->name('employee.update');
//     Route::get('/employee/delete/{id}','deleteemployee')->name('employee.delete');
// });

// Route::controller(DepartmentController::class)->group(function () {
//     Route::get('/department','Department')->name('department');
//     Route::get('/department/add','showForm')->name('department.add');
//     Route::POST('/department/create','create')->name('department.create');
//     Route::get('/department/{id}','editdepartment')->name('department.edit');
//     Route::post('/department/update','updatedepartment')->name('department.update');
//     Route::get('/department/delete/{id}','deletedepartment')->name('department.delete');
// });

// Route::controller(TeacherController::class)->group(function () {
//     Route::get('/teacher','teacher')->name('teacher');
//     Route::get('/teacher/add','showForm')->name('teacher.add');
//     Route::POST('/teacher/create','create')->name('teacher.create');
//     Route::get('/teacher/{id}','editteacher')->name('teacher.edit');
//     Route::post('/teacher/update','updateteacher')->name('teacher.update');
//     Route::get('/teacher/delete/{id}','deleteteacher')->name('teacher.delete');
// });

// Route::controller(BookController::class)->group(function () {
//     Route::get('/book','book')->name('book');
//     Route::get('/book/add','showForm')->name('book.add');
//     Route::POST('/book/create','create')->name('book.create');
//     Route::get('/book/{id}','editbook')->name('book.edit');
//     Route::post('/book/update','updatebook')->name('book.update');
//     Route::get('/book/delete/{id}','deletebook')->name('book.delete');
// });

Route::middleware(['admin.employee'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'show')->name('admin.dashboard');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/product', 'product')->name('admin.product');
        Route::get('/admin/product/add', 'showForm')->name('product.add');
        Route::POST('/product/create', 'create')->name('product.create');
        Route::get('/admin/product/{id}', 'editproduct')->name('product.edit');
        Route::post('/product/update', 'updateproduct')->name('product.update');
        Route::get('/product/delete/{id}', 'deleteproduct')->name('product.delete');
    });

    Route::controller(UnitController::class)->group(function () {
        Route::get('/admin/unit', 'unit')->name('admin.unit');
        Route::get('/admin/unit/add', 'showForm')->name('unit.add');
        Route::POST('/unit/create', 'create')->name('unit.create');
        Route::get('/admin/unit/{id}', 'editunit')->name('unit.edit');
        Route::post('/unit/update', 'updateunit')->name('unit.update');
        Route::get('/unit/delete/{id}', 'deleteunit')->name('unit.delete');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/category', 'category')->name('admin.category');
        Route::get('/admin/category/add', 'showForm')->name('category.add');
        Route::POST('/category/create', 'create')->name('category.create');
        Route::get('/admin/category/{id}', 'editcategory')->name('category.edit');
        Route::post('/category/update', 'updatecategory')->name('category.update');
        Route::get('/category/delete/{id}', 'deletecategory')->name('category.delete');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/order', 'order')->name('admin.order');
        Route::get('/admin/order/add', 'showForm')->name('order.add');
        Route::POST('/order/create', 'create')->name('order.create');
        Route::get('/admin/order/{id}', 'editorder')->name('order.edit');
        Route::post('/order/update', 'updateorder')->name('order.update');
        Route::get('/order/delete/{id}', 'deleteorder')->name('order.delete');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/admin/user/add', 'showForm')->name('user.addform');
        Route::POST('/admin/user/create', 'create')->name('user.create');
        Route::get('/admin/users', 'show')->name('user.show');
        Route::get('/admin/user/{id}', 'editUser')->name('user.edit');
        Route::post('/admin/user/update', 'updateUser')->name('user.update');
        Route::get('/admin/user/delete/{id}', 'deleteUser')->name('user.delete');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/admin/customer/add', 'showForm')->name('customer.addform');
        Route::POST('/admin/customer/create', 'create')->name('customer.create');
        Route::get('/admin/customer', 'show')->name('customer.show');
        Route::get('/admin/customer/{id}', 'editUser')->name('customer.edit');
        Route::post('/admin/customer/update', 'updateUser')->name('customer.update');
        Route::get('/admin/customer/delete/{id}', 'deleteUser')->name('customer.delete');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/admin/cart', 'cart')->name('admin.cart');
        Route::get('/admin/cart/add', 'showForm')->name('cart.add');
        Route::POST('/cart/create', 'create')->name('cart.create');
        Route::get('/admin/cart/{id}', 'editcart')->name('cart.edit');
        Route::post('/cart/update', 'updatecart')->name('cart.update');
        Route::get('/cart/delete/{id}', 'deletecart')->name('cart.delete');
    });

});

Route::controller(CartController::class)->group(function () {
    Route::GET('/addcart/{id}', 'addtocart')->name('addToCart');
    Route::GET('/cart/increase/{id}', 'increaseQty')->name('cart.increase');
    Route::GET('/cart/decrease/{id}', 'decreaseQty')->name('cart.decrease');
    Route::GET('/cart/remove/{id}', 'removeFromCart')->name('cart.remove');
});

Route::controller(CartpageController::class)->group(function () {
    Route::GET('/addtocart', 'cartpage')->name('cartpage');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showloginform')->name('login.form');
    Route::get('/registration', 'showregistrationform')->name('registration.form');
    Route::POST('/create-customer', 'createcustomer')->name('create.customer');
    Route::POST('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('profile');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->middleware('auth')->name('profile.edit');
Route::POST('/profile/update', [UserController::class, 'updateProfile'])->middleware('auth')->name('profile.update');
Route::get('/profile/password', [UserController::class, 'showChangePasswordForm'])->middleware('auth')->name('profile.password.edit');
Route::POST('/profile/password/update', [UserController::class, 'updatePassword'])->middleware('auth')->name('profile.update.password');


Route::controller(AdminloginController::class)->group(function () {
    Route::get('/admin/login', 'showadminloginform')->name('admin.login.form');
    Route::POST('/admin/login/check', 'Login')->name('adminlogin');
});

Route::controller(CheckoutController::class)->group(function () {
    Route::get('/checkout', 'checkout')->name('checkout');
});

Route::controller(OrdersummaryController::class)->group(function () {
    Route::get('/ordersummary', 'ordersummary')->name('ordersummary');
});

Route::prefix('admin')->group(function () {

    // Route::get('/dashboard', function(){
    //     return view('dashboard');
    // })->name('admin.dashboard');

    Route::get('/products', function () {
        return "<h1>This is the product page.</h1>";
    })->name('products');

    // Route::get('/users',function(){
    //     return "<h1>This is the users page</h1>";
    // })->name('admin.users');

    Route::get('/blogs', function () {
        return "<h1>This is blogs page.</h1>";
    })->name('admin.blogs');
});




// migration command 
// php artisan make:migration create_product_table

// php artisan make:migration add_new_column_to_products --table=products

// php artisan make:migration change_email_student_column_to_student --table=student


// php artisan migrate:status

// php artisan migrate:rollback


// php artisan migrate:rollback


// php artisan migrate:rollback --step=1 // last migration
// php artisan migrate:rollback --step=2 // last 2 migration


// php artisan migrate:reset -> reset all migrations


// php artisan migrate:refresh  -> this command rollback all migrations and recreate all tables


// $table->dropColumn(['votes', 'avatar', 'location']); // drop multiple column

//  $table->renameColumn('from', 'to');  // rename column name using migration



// datatypes and primary key // foreign key

// student                                 foreign_key         foreign_key 
// id	created_at	updated_at	first_name	class_id	email_id course_id  
// 1                           vishal      1                      1
// 2                           Chirag      1                      1
// 3                          Vishnu       2                      1
// 4                          Mayur        2                      2 
// 5                         kiran         1                      2


// primary key 
// courses
// id course_name  created_at	updated_at
// 1  Larvel
// 2  React

// primary key 
// class
// id class_name  created_at	updated_at
// 1   A
// 2   B
// learn how to create migation for relational table 

// sql query 
// left join 
// inner join 
// right join 
// sub query 

// and 
// between 
// in 
// like 
// where condition
// multiple where condition 

// having 
// group by 
// limit 
// offset 


// ->join('classes', 'student.class_id', '=', 'classes.id')
// ->join('courses', 'student.course_id', '=', 'courses.id')
// ->select('student.*','classes.class_name','courses.course_name')


// for seeder commnd 
// php artisan make:seeder ClassesSeeder

// php artisan make:seeder CoursesSeeder   -- seeder banava mate 
//  php artisan db:seed --class=CoursesSeeder  --seeder run karva mate 

// Str::random(10), 0> for random text  
// email Str::random(10).'@example.com',
// Hash::make('password'),

// php artisan db:seed -> for seedeing comman for all from DatabaseSeeder class

// https://laravel.com/docs/12.x/queries#main-content

// $department = DB::table('department')->orderBy('id')->chunk(3, function (Collection $departments) {
//     foreach ($departments as $department) {
//         dd($department);
//     }
// });


// php artisan make:model Book

// 1. 
// category table
// unit table
// product table - ma category and unit foreign key che 

// 2. 
// cart table id ->id, foreign key from user table id
// cart_items - ma product id foreign key che , foreign_key from order table


// 3. 
// order table -> id  ,foreign key from user table id
// order_item ma product id foreign key che , foreign_key from order table


// user table -> type -> customer -> user table id