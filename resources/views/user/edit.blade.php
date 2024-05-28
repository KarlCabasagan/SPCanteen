@extends('layouts.user')

@section('content')
    @section('css', 'css/user.css')
    <div class="content">
        <div class="user-edit-header">
            <a href="profile" class="user-edit-icon">
                <iconify-icon icon="tabler:arrow-back-up"></iconify-icon>
            </a>
            <h5>User Edit</h5>
        </div>

        <div class="user-edit-inputs">
            <form action="{{ route('process.edit', ['id' => $user->id ]) }}" method="POST">
                @csrf
                <div class="user-edit-container">
                    <div class="user-edit-name">
                        <label for="name">Name</label>
                        <input class="edit-user-fields" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="user-edit-email">
                        <label for="email">Email</label>
                        <input class="edit-user-fields" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="user-edit-role">
                        <label for="role_id">Role:</label>
                        <select name="role_id" class="user-edit-select" required>
                            <option value="1" {{ $user->role_id == 'Student' ? 'selected' : '' }}>Student</option>
                            <option value="2" {{ $user->role_id == 'Faculty' ? 'selected' : '' }}>Faculty</option>
                        </select>
                    </div>
                    <div class="user-edit-old-password">
                        <label for="oldpassword">Old Password</label>
                        <input class="edit-user-fields" type="password" name="oldpassword" required>
                    </div>
                    <div class="user-edit-new-password">
                        <label for="password">New Password</label>
                        <input class="edit-user-fields" type="password" name="password">
                    </div>
                    <div class="user-edit-confirm-password">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input class="edit-user-fields" type="password" name="password_confirmation">
                    </div>
                    <div class="user-edit-btn">
                        <input class="edit-user-btn" type="submit" name="submit" value="Submit">
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
    </div>
@endsection