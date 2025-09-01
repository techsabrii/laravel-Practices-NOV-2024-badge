<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class AboutController extends Controller
{
    public function aboutPage()
    {

        $name = $this->getRecords();
        return view('about', compact('name'));
    }

    public function userPage($id)
    {
        $name = $this->getRecords();
        $user = $name[$id] ?? null;
        return view('about_user', compact('id', 'user'));
    }
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



public function testHI()
{
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'You must be logged in to update your profile.');
        // }
    // 10 records per page
   $user = User::paginate(10);


    return view('hi', compact('user'));
}




    public function detail($id)
    {

        $user = User::get()->findOrFail($id);
        return view('hi-d', compact('user'));
    }
}
