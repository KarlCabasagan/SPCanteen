@extends('layouts.admin')

@section('content1')
<div class="content">
    <h1 style="margin-bottom: 20px;">Manage Users</h1>
<div class="" style="width: 100%; padding-top: 20px;">
    <table id="example" class="display nowrap" style="width: 100%; padding-top: 20px;">
        <thead>
            <tr>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Name</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Email</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Role ID</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Order Count</th>
                <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Action</th>
            </tr>
        </thead>
        <tbody style="background-color: white;">
            @foreach ($users as $user)
            <tr>
                <td style="text-align: center;">{{$user->name}}</td>
                <td style="text-align: center;">{{$user->email}}</td>
                <td style="text-align: center;">{{$user->role_id}}</td>
                <td style="text-align: center;">{{$user->totalOrder}}</td>
                <td style="text-align: center;"><button class="open-modal6"><iconify-icon icon="bx:edit" style="color: black; font-size: 30;"></iconify-icon></button><a href="/delete"><iconify-icon icon="material-symbols-light:delete-outline" style="color: black; font-size: 30;"></iconify-icon></a></td>
            </tr>
            @endforeach
        </tbody>    
    </table>
</div>
<div class="modal_user-edit">
        <span>Amount</span>
        <div class="transactions-details">
            <span>₱135.00 PHP</span>
            <span>Processing</span>
        </div>
        <div class="transactions-date-payment">
            <div class="transactions-date">
                <span>Transaction Date</span>
                <span>02/11/24</span>
            </div>
            <div class="transactions-payment">
                <span>Payment type</span>
                <span>GCash</span>
            </div>
        </div>
        <div class="close-modal5">
            <iconify-icon icon="uil:step-backward-circle"></iconify-icon>
        </div>
    </div>
</div>
<script>
    const usermanagementModal = document.querySelector(".modal_user-edit");

    const openModal6Buttons = document.querySelectorAll(".open-modal6");
    openModal6Buttons.forEach((btn) => {
        btn.addEventListener("click", () => {
            usermanagementModal.classList.add("active");
        });
    });

    const closeModal6 = document.querySelector(".close-modal6");
    if (closeModal6) {
        closeModal6.addEventListener("click", () => {
            usermanagementModal.classList.remove("active");
        });
    }
</script>
@endsection