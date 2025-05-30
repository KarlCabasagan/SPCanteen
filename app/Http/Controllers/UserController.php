<?php

namespace App\Http\Controllers;

use App\Mail\VerifyEmailMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
        $errors = [];

        if (!User::where('name', $request->name)->exists()) {
            $errors['name'] = 'Incorrect username or password.';
            return redirect('/')->withErrors($errors);
        }
    
        if (!Auth::validate($incomingFields)) {
            $errors['password'] = 'Wrong Password.';
        }
    
        if (!empty($errors)) {
            return redirect('/')->withErrors($errors);
        }
    
        return redirect('/');
    }

    public function sendVerificationEmail()
    {   
        $user = User::where('id', auth()->user()->id)->first();

        $verificationCode = Str::random(60);
        $user->verification_code = $verificationCode;
        $user->save();

        $emailData = [
            'name' => $user->name,
            'verificationCode' => $user->verification_code,
            'verificationLink' => route('verification.verify', ['id' => $user->id, 'hash' => Hash::make($user->email)]),
            'imagePath' => asset('images/SPCanteen.png'),
        ];

        Mail::to($user->email)->send(new VerifyEmailMail($emailData));
        return view('verify');
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

        $this->sendVerificationEmail();

        return redirect('/verify');
    }

    public function setup(Request $request)
    {
        $userId = auth()->user()->id;
        
        $incomingFields = $request->validate([
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15000',
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
        return redirect('/')->withoutCookie('seenFirstFadeOut');
    }


    //edit controller 

    public function edit($id) {

        $userId = User::find($id);
        if ($userId) {
            return view('user.edit', ['user' => $userId]);
        }
        return view('user.profile');
    }

    public function adminEdit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $validateData = $request->validate([
            'name' => ['required', 'min:3', 'max:30',],
            'email' => ['required', 'min:3', 'max:200',],
            'school_id' => ['nullable', 'string'],
            'role' => ['required', Rule::in([1, 2, 3, 4])]
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->school_id = $request->input('school_id');
        $user->role_id = $request->input('role');

        $user->save();

        return redirect('/manage_user');
    }

    public function show(User $id)
    {
        return response()->json($id);
    }

    public function processEdit(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'profilePicture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15000',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'oldpassword' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Check if the old password matches
        if (!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->with('error', 'Invalid old password');
        }

        // Update user details
        if ($request->hasFile('profilePicture')) {
            $file = $request->file('profilePicture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profile'), $filename);
            
            $filePath = public_path('images/profile/' . $user->image);
            if (File::exists($filePath)) {
                if (basename($filePath) !== 'default.png') {
                    File::delete($filePath);
                }
            }

            $user->image = $filename;
        } else {
            $user->image = $user->image;
        }

        $user->name = $request->name;
        
        if ($user->email != $request->email) {
            $user->email = $request->email;
            $user->email_verified_at = null;
            $this->sendVerificationEmail();
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            
            $user->save();
    
            return redirect()->route('user.edit', ['id' => $id])->with('success', 'User updated successfully');
        }
        
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();

        return redirect()->route('user.edit', ['id' => $id])->with('success', 'User updated successfully');
    }

    public function showUser() 
    {
        $userId = auth()->user()->id;
        $users = User::whereNot('id', $userId)->get();

        foreach ($users as $user) {
            $user['totalOrder'] = $user->orders->whereIn('status_id', [1, 2, 3])->count();
        }

        return view('admin.manage_user', compact('users'));
    }

    public function delete(User $id)
    {
        $filePath = public_path('images/profile/' . $id->image);
        // dd($filePath);
        if (File::exists($filePath)) {
            if (basename($filePath) !== 'default.png') {
                File::delete($filePath);
            }
        }
        $id->delete();

        return response()->json($id);
    }
}