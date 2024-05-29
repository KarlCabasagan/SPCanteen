@extends('layouts.admin')

@section('content1')
<div class="content">
    <h1 style="margin-bottom: 20px;">Manage Users</h1>
    <div class="" style="width: 100%; padding-top: 20px;">
        <table id="example" class="display nowrap" style="width: 100%; padding-top: 20px;">
            <thead>
                <tr>
                    <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">ID</th>
                    <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Name</th>
                    <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Email</th>
                    <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Role ID</th>
                    <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Order Count</th>
                    <th style="text-align: center; background-color: maroon; color: white; padding-left: 30px;">Action</th>
                </tr>
            </thead>
            <tbody style="background-color: white;">
                @foreach ($users as $user)
                <tr id="user-row-{{$user->id}}">
                    <td style="text-align: center;">{{$user->id}}</td>
                    <td style="text-align: center;">{{$user->name}}</td>
                    <td style="text-align: center;">{{$user->email}}</td>
                    <td style="text-align: center;">{{$user->role_id}}</td>
                    <td style="text-align: center;">{{$user->totalOrder}}</td>
                    <td style="text-align: center;"><button class="open-modal6" data-user-id="{{$user->id}}"><iconify-icon icon="bx:edit" style="color: black; font-size: 30;"></iconify-icon></button><button data-user-id="{{$user->id}}" onclick="deleteUser(this.dataset.userId)"><iconify-icon icon="material-symbols-light:delete-outline" style="color: black; font-size: 30;"></iconify-icon></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal_user-edit">
        <form method="POST">
            @csrf
            <img id="profile-picture" src="images/profile/default.png" alt="Profile Picture">
            <input type="text" id="user-name" name="name" value="" placeholder="Username">
            <input type="text" id="user-email" name="email" value="" placeholder="Email">
            <div class="role" id="user-role">
                <input type="radio" name="role" value="1">Student</input>
                <input type="radio" name="role" value="2">Faculty</input>
                <input type="radio" name="role" value="3">Admin</input>
                <input type="radio" name="role" value="4">Super Admin</input>
            </div>
            <button>Save</button>
        </form>
        <div class="close-modal6">
            <iconify-icon id="close" icon="material-symbols-light:close"></iconify-icon>
        </div>
    </div>
</div>
<script>
    const usermanagementModal = document.querySelector(".modal_user-edit");
    const editForm = usermanagementModal.querySelector("form");

    const openModal6Buttons = document.querySelectorAll(".open-modal6");
    openModal6Buttons.forEach((btn) => {
        btn.addEventListener("click", async (e) => {
            e.preventDefault();

            const userId = btn.dataset.userId;

            const response = await fetch(`/user/${userId}`);
            const userData = await response.json();

            const userRoleInput = document.querySelector("#user-role input[value='" + userData.role_id + "']");

            if (userRoleInput) {
            userRoleInput.checked = true;
            }

            editForm.querySelector("#profile-picture").src = `images/profile/${userData.image}`;
            editForm.querySelector("#user-name").value = userData.name;
            editForm.querySelector("#user-email").value = userData.email;
            editForm.querySelector("#user-role").value = userData.role_id;

            editForm.action = `/user/edit/${userData.id}`;

            usermanagementModal.classList.add("active");
        });
    });

    const closeModal6 = document.querySelector(".close-modal6");
    if (closeModal6) {
        closeModal6.addEventListener("click", () => {
            usermanagementModal.classList.remove("active");
        });
    }

    async function deleteUser(userId) {
        const response = await fetch(`/user/delete/${userId}`);
        const userData = await response.json();

        document.getElementById(`user-row-${userData.id}`).style.display = 'none';
    }

        

</script>
@endsection