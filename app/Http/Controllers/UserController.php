<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => ['required', Rule::in([1, 2])]
        ]);

        $user = User::find($userId);

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('images/profile'), $filename);

            $user->image = $filename;
        }

        $user->role_id = $request->input('status');

        $user->save();

        return redirect('/')->with('success', 'Profile setup successful!');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}


