<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required'],
            'password' => ['required']
        ]);

        if(auth()->attempt(['name' => $incomingFields['name'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function register(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:30', Rule::unique('users', 'name')],
            'email' => ['required', 'min:3', 'max:200', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:8', 'max:200']
        ]);
        
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user=User::create($incomingFields);
        auth()->login($user);
        return redirect('/register');
    }

    public function setup(Request $request)
    {
        $userId = auth()->user()->id;
        
        $incomingFields = $request->validate([
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => ['required', Rule::in([1, 2])]
        ]);

        $user = User::find($userId);

        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/profile'), $filename);

            $user->image = $filename;
        } else {
            $user->image = 'default.png';
        }

        $user->role_id = $request->input('status');

        $user->save();

        return redirect('/')->with('success', 'Profile setup successful!');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }


    //edit controller 

    public function edit($id) {

        $user = User::find($id);

        return view('user.edit', ['user' => $user]);
    }

    public function processEdit(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role_id' => 'required|in:1,2', // Ensure role_id is valid
            'oldpassword' => 'required', // Old password field
            'password' => 'nullable|confirmed|min:6', // Password confirmation and minimum length
        ]);

        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Check if the old password matches
        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Invalid old password');
        }

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;
        
        // Update password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Save the user
        $user->save();

        // Redirect back with success message
        return redirect()->route('user.edit', ['id' => $id])->with('success', 'User updated successfully');
    }
}