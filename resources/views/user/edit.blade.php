@extends('layouts.user')

@section('content1')
    @section('css', 'css/user.css')
    
    <h5 style="text-align:center;margin-top:16px;">User Edit</h5>

    <div style="display:flex; justify-content:center;margin-top:16px;">
        <form action="{{ route('process.edit', ['id' => $user->id ]) }}" method="POST">
            @csrf
            <div style="display:flex; flex-direction:column">
                <div style="display:flex; flex-direction:column; margin-top:16px;">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                </div>
                <div style="display:flex; flex-direction:column; margin-top:16px;">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>
                <div style="margin-top:16px;">
                    <label for="role_id">Role</label>
                    <select name="role_id" style="width:100%;padding:5px;" required>
                        <option value="1" {{ $user->role_id == 'Student' ? 'selected' : '' }}>Student</option>
                        <option value="2" {{ $user->role_id == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                    </select>
                </div>
                <div style="display:flex; flex-direction:column; margin-top:16px;">
                    <label for="password">New Password</label>
                    <input type="password" name="password">
                </div>
                <div style="display:flex; flex-direction:column; margin-top:16px;">
                    <label for="password_confirmation">Confirm New Password</label>
                    <input type="password" name="password_confirmation">
                </div>
                <div style="display:flex; flex-direction:column; margin-top:16px;">
                    <label for="oldpassword">Old Password</label>
                    <input type="password" name="oldpassword" required>
                </div>
                <div style="margin-top:16px;">
                    <input type="submit" name="submit" value="Submit" style="width:100%;background-color:green;color:white;padding:5px;">
                </div>
            </div>
        </form>
    </div>

    @if(session('error'))
        <div style="color:red; text-align:center;">{{ session('error') }}</div>
    @endif

    @if(session('success'))
        <script> alert('Successfully Modified')</script>
    @endif

    @if($errors->any())
        <div style="color:red; text-align:center;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection