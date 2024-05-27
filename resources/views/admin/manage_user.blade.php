@extends('layouts.admin')

@section('content1')
<div class="content">
    <h1 style="margin-bottom: 20px;">Manage Users</h1>
<div class="">
    <table id="example" class="display nowrap" style="width: 100%; padding-top: 20px;">
        <thead>
            <tr>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Name</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Email</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Password</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Image</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Role ID</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td style="text-align: center; background-color: white;">{{$user->name}}</td>
                <td style="text-align: center; background-color: white;">{{$user->email}}</td>
                <td style="text-align: center; background-color: white;">{{ substr($user->password, 0, 15) }}</td>
                <td style="text-align: center; background-color: white;">{{$user->image}}</td>
                <td style="text-align: center; background-color: white;">{{$user->role_id}}</td>
                <td style="text-align: center; background-color: white;"><a href="/edit"><iconify-icon icon="bx:edit" style="color: black; font-size: 30;"></iconify-icon></a><a href="/delete"><iconify-icon icon="material-symbols-light:delete-outline" style="color: black; font-size: 30;"></iconify-icon></a></td>
            </tr>
            @endforeach
        </tbody>    
    </table>
</div>
</div>
<!-- <script>
    const transactionlistModal = document.querySelector(".modal_transactions-history");

    const openModal5Buttons = document.querySelectorAll(".open-modal5");
    openModal5Buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            transactionlistModal.classList.add("active");
        });
    });

    const closeModal5 = document.querySelector(".close-modal5");
    if (closeModal5) {
        closeModal5.addEventListener("click", () => {
            transactionlistModal.classList.remove("active");
        });
    }
</script> -->
@endsection