@extends('layouts.layout')

@section('content')
    @section('css', 'css/user.css')
    <div class="content">
        <div class="user-edit-header">
            <a href="{{ route('profile') }}" class="user-edit-icon">
                <iconify-icon icon="tabler:arrow-back-up"></iconify-icon>
            </a>
            <h5>Edit Profile</h5>
        </div>
        <div class="edit-user-profile">
            <img id="edit-user-profile" src="{{ asset('images/profile/' . Auth::user()->image) }}" alt="Profile Picture">
            <div class="profile-picture">
                <label id="pfp" for="profilePicture">
                    <div class="camera-icon-bg">
                        <iconify-icon icon="entypo:camera" class="cam"></iconify-icon>
                    </div>
                </label>
            </div>
        </div>
        <div class="user-edit-inputs">
            <form action="{{ route('process.edit', ['id' => $user->id ]) }}" method="POST" enctype="multipart/form-data">
                <input type="file" id="profilePicture" name="profilePicture" accept="image/*" onchange="previewProfilePicture(this);" style="display: none;">
                @csrf
                <div class="user-edit-container">
                    <div class="user-edit-name">
                        <label for="name">Name</label>
                        <input class="edit-user-fields" id="edit-user-fields" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="user-edit-email">
                        <label for="email">Email</label>
                        <input class="edit-user-fields" id="edit-user-fields" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="user-edit-old-password">
                        <label for="oldpassword">Old Password</label>
                        <input class="edit-user-fields" id="edit-user-fields" type="password" name="oldpassword" required>
                    </div>
                    <div class="user-edit-new-password">
                        <label for="password">New Password</label>
                        <input class="edit-user-fields" id="edit-user-fields" type="password" name="password">
                    </div>
                    <div class="user-edit-confirm-password">
                        <label for="password_confirmation">Confirm New Password</label>
                        <input class="edit-user-fields" id="edit-user-fields" type="password" name="password_confirmation">
                    </div>
                    <div class="user-edit-btn">
                        <input class="edit-user-btn" type="submit" name="submit" value="Update Profile">
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

    <script>
        function previewProfilePicture(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
            document.getElementById('edit-user-profile').src = e.target.result;
            }

            reader.readAsDataURL(input.files[0]);
        }
        }
    </script>
@endsection