<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //


    public function index()
    {
        $user = Auth::user();
        return view('userrecord');
    }

    public function store(Request $request)
    {
        // Validation (acha habit hai)
        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:15',
            'email' => 'required',
        ]);

        $user = new User();
        $user->fill($request->only(['name', 'contact', 'email']));
        $user->save();


        return redirect()->back()->with('success', 'Record saved successfully!');
    }


    public function RecordCreate(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'contact' => 'nullable|string|max:15',
            'email' => 'required|unique:users,email',
        ], [
            'email.unique' => 'This email is already taken.',
            'name.required' => 'Name is required.',
            'name.string'   => 'Name must be a string.',
            'name.max'      => 'Name may not be greater than 255 characters.',
            'contact.string' => 'Contact must be a string.',
            'contact.max'   => 'Contact may not be greater than 15 characters.',
        ]);

        // Save data
        User::create([
            'name'    => $request->name,
            'contact' => $request->contact,
            'email'   => $request->email,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Record saved successfully!');
    }


    public function idexUpdate($id)
    {

        $user = DB::table('users')->where('id', $id)->first();

        return view('userrecord-update', compact('user'));
    }


    public function update(Request $request, $id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to update your profile.');
        }
        $userID = Auth::user()->id;

        $request->validate([
            'name'    => 'required|string|max:255',
            'contact' => 'nullable|string|max:25',
            'email'   => 'required|email',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:12048', // each image max 2MB
        ]);
        $user = DB::table('users')->where('id', $userID)->first();
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/users', 'public');
                $images[] = 'storage/' . $path;
            }
        }
        $oldImages = [];
        if (!empty($user->image_path)) {
            $oldImages = json_decode($user->image_path, true) ?? [];
        }
        $allImages = array_merge($oldImages, $images);
        DB::table('users')->where('id', $userID)->update([
            'name'       => $request->name,
            'contact'    => $request->contact,
            'email'      => $request->email,
            'image_path' => json_encode($allImages), // store as JSON
            'updated_at' => now(),
        ]);
        return redirect()->route('user-index')->with('success', 'User updated successfully with images!');
    }

    public function delete($id)
    {
        // user data fetch karo
        $user = DB::table('users')->where('id', $id)->first();

        if ($user && !empty($user->image_path)) {
            $images = json_decode($user->image_path, true);

            if (is_array($images)) {
                foreach ($images as $img) {
                    // remove "storage/" prefix (kyunke file "public" disk me hoti hai)
                    $path = str_replace('storage/', '', $img);

                    // delete file agar exist karti hai
                    if (Storage::disk('public')->exists($path)) {
                        Storage::disk('public')->delete($path);
                    }
                }
            }
        }
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'User and images deleted successfully!');
    }


    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;

        if ($ids && count($ids) > 0) {
            // Pehle selected users fetch karo
            $users = DB::table('users')->whereIn('id', $ids)->get();

            foreach ($users as $user) {
                if (!empty($user->image_path)) {
                    $images = json_decode($user->image_path, true);

                    if (is_array($images)) {
                        foreach ($images as $img) {
                            // Remove "storage/" prefix (DB me 'storage/uploads/...' hota hai)
                            $path = str_replace('storage/', '', $img);

                            // Agar file exist karti hai to delete kar do
                            if (Storage::disk('public')->exists($path)) {
                                Storage::disk('public')->delete($path);
                            }
                        }
                    }
                }
            }
            DB::table('users')->whereIn('id', $ids)->delete();

            return redirect()->back()->with('success', 'Selected users and their images deleted successfully!');
        }

        return redirect()->back()->with('error', 'No users selected for deletion.');
    }
}
