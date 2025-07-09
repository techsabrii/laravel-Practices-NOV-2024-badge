
<?php

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
//     return view('about', ['name' => $name, 'fathername' => $fathername]);
// });





// Route::get('contact/{usercontact?}',function (?string $usercontact = null) {
//     if ($usercontact) {
//         return '<h1>Contact Page</h1><p>Contact ID: ' . htmlspecialchars($usercontact) . '</p>';
//     } else {
//         return '<h1>Contact Page</h1><p>No contact ID provided.</p>';
//     }
// })->wherein('usercontact',['movie','basit']);



function getRecords(){
    return [
        1 => ['name' => 'John Doe', 'fathername' => 'John Smith'],
        2 => ['name' => 'Jane Doe', 'fathername' => 'Jane Smith'],
        3 => ['name' => 'Alice Johnson', 'fathername' => 'Robert Johnson'],
        4 => ['name' => 'Bob Brown', 'fathername' => 'Bob Brown Sr.'],
        5 => ['name' => 'Charlie White', 'fathername' => 'Charlie White Sr.'],
        6 => ['name' => 'Diana Green', 'fathername' => 'Diana Green Sr.'],
        7 => ['name' => 'Ethan Black', 'fathername' => 'Ethan Black Sr.'],
        8 => ['name' => 'Fiona Blue', 'fathername' => 'Fiona Blue Sr.']
    ];
}

Route::get('about', function () {
    $name = getRecords();
    return view('about', compact('name'));
})->name('about');

Route::get('about/{id}', function ($id) {
 $name = getRecords();
    $user = $name[$id] ?? null;
    return view('about_user',compact('user','id'));
})->where('id', '[0-9]+')->name('about.show');

Route::get('gallery',function(){
    return view('gallery');
})->name('gallery.index.user');
