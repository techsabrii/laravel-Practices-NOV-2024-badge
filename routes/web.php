
<?php

    use App\Http\Controllers\AboutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    // Route::get('about/{name?}/userId/{userId?}',function(?string $name= '', ?string $userId = ''){
    //     return view('about',['name' => $name, 'userId' => $userId]);
    // });

    // Route::get('/about/{id?}', function (?string $id = null) {
    //     if ($id) {
    //         return '<h1>Hello Dear</h1><p>Welcome to the about page with ID: ' . htmlspecialchars($id) . '</p>';
    //     } else {
    //         return '<h1>About Page</h1><p>No ID provided.</p>';
    //     }
    // });

    // Route::get('about',function(){
    //     $name=  'Abdul Basit';
    //     $pro =  'developer';
    //     return view('about',compact('name','pro'));
    // });

    // Route::get('/about',function(){

    //     $name = 'John Doe';
    //     $fathername = 'John Smith';
    //     return view('about', compact('name', 'fathername'));
    // });

    // Route::get('contact/{usercontact?}',function (?string $usercontact = null) {
    //     if ($usercontact) {
    //         return '<h1>Contact Page</h1><p>Contact ID: ' . htmlspecialchars($usercontact) . '</p>';
    //     } else {
    //         return '<h1>Contact Page</h1><p>No contact ID provided.</p>';
    //     }
    // })->wherein('usercontact',['movie','basit']);

    function getRecords()
    {
        return [
            1 => ['name' => 'John Doe', 'fathername' => 'John Smith'],
            2 => ['name' => 'Jane Doe', 'fathername' => 'Jane Smith'],
            3 => ['name' => 'Alice Johnson', 'fathername' => 'Robert Johnson'],
            4 => ['name' => 'Bob Brown', 'fathername' => 'Bob Brown Sr.'],
            5 => ['name' => 'Charlie White', 'fathername' => 'Charlie White Sr.'],
            6 => ['name' => 'Diana Green', 'fathername' => 'Diana Green Sr.'],
            7 => ['name' => 'Ethan Black', 'fathername' => 'Ethan Black Sr.'],
            8 => ['name' => 'Fiona Blue', 'fathername' => 'Fiona Blue Sr.'],
        ];
    }

    Route::get('about', [AboutController::class, 'aboutPage'])->name('about');


    Route::get('about/{id}',[AboutController::class, 'userPage'])->where('id', '[0-9]+')->name('about.show');







    Route::get('gallery',function(){
        return view('gallery');
})->name('gallery.index.user');


Route::get('bladee', function () {
    return view('syntax');
})->name('bladee');
Route::get('bla', function () {
    return view('bladee');
})->name('blade');




Route::get('hi',[AboutController::class, 'testHI'])->name('user-index');
Route::get('user/{id}',[AboutController::class, 'detail'])->name('details');
Route::get('user-record',[UserController::class, 'index']);
Route::get('user-record-update/{id}',[UserController::class, 'idexUpdate'])->name('get-update');
Route::post('user-records',[UserController::class, 'store'])->name('records');
Route::post('user-records/create',[UserController::class, 'RecordCreate'])->name('records.store');


Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('delete-user');


Route::delete('/user/delete-multiple', [UserController::class, 'deleteMultiple'])->name('delete-multiple-users');
