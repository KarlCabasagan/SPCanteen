<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Product list</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/adminmanageuser.css">
    <link rel="stylesheet" href="/css/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/assets/css/bs-theme-overrides.css">
    <link rel="stylesheet" href="/css/assets/css/styles.css">
    <link rel="stylesheet" href="{{asset('/fontawesome-free-6.5.1-web/css/all.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
</head>

<body>
    <div class="container-fluid d-flex flex-column-reverse justify-content-xl-start"
        style="height: 100vh;margin: 0;padding: 0;background: #e5e4e2;">
        <div class="text-nowrap d-flex flex-column justify-content-start align-items-center align-items-xl-center"
            style="height: 100vh;width: 18rem;color: var(--bs-body-color);background: var(--bs-body-bg);padding-top: initial;position: fixed;">
            <img src="/css/assets/img/423472445_7120341421354585_5211962867841594211_n.png" width="276"
                height="186" style="padding-top: 0;margin-top: 40px;">
            <nav class="d-flex flex-column" id="text-column">
                <a href="{{url('admindashboard')}}"><i class="fa-brands fa-windows"></i>Dashboard</a>
                <a href="{{url('adminproductlist')}}"><i class="fa-solid fa-book"></i>Product List</a>
                <a href="{{url('admintransactionhistory')}}"><i class="fa-regular fa-file"></i>Transaction History</a>
                <a href="{{url('adminmanageuser')}}"><i class="fa-regular fa-user"></i>Manage User</a>
                <a href="#"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
            </nav>
        </div>

        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search...">
            <div class="search-icon-container">
                <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
            </div>
        </div>

        <div class="table-container">
           <table id="dataTable" style="width: 100%;">
            <tr>
                <th>Name</th>
                <th>Student ID</th>
                <th>Status</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>John Karl Romarc S. Viernes</td>
                <td>2013-00001</td>
                <td>Married</td>
                <td>Sabayle St. Prk 10 Fuentes</td>
                <td><i class="fa-regular fa-pen-to-square"></i> <i class="fa-solid fa-trash"></i></td>
            </tr>
            <tr>
                <td>Jannlenn Romarc C. Cabasagan</td>
                <td>2013-00002</td>
                <td>Single</td>
                <td>Lugait</td>
                <td><i class="fa-regular fa-pen-to-square"></i> <i class="fa-solid fa-trash"></i></td>
            </tr>
            <tr>
                <td>Harley B. Bongcaron</td>
                <td>2013-00003</td>
                <td>Double</td>
                <td>Kapatagan</td>
                <td><i class="fa-regular fa-pen-to-square"></i> <i class="fa-solid fa-trash"></i></td>
            </tr>
           </table>
        </div>

        <p2>SPC CANTEEN</p2>
        <p>© 2024 All Rights Reserved</p>

        <script>
            document.getElementById('searchIcon').addEventListener('click', function() {
                var input, filter, table, tr, td, i, j, txtValue;
                input = document.getElementById('searchInput');
                filter = input.value.toUpperCase();
                table = document.getElementById('dataTable');
                tr = table.getElementsByTagName('tr');

                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName('td');
                    for (j = 0; j < td.length; j++) {
                        if (td[j]) {
                            txtValue = td[j].textContent || td[j].innerText;
                            var startIndex = txtValue.toUpperCase().indexOf(filter);
                            if (startIndex > -1) {
                                var endIndex = startIndex + filter.length;
                                var highlightedText = td[j].innerHTML.substring(0, startIndex) +
                                    '<span class="highlight">' + td[j].innerHTML.substring(startIndex, endIndex) +
                                    '</span>' + td[j].innerHTML.substring(endIndex);
                                td[j].innerHTML = highlightedText;
                                tr[i].style.display = '';
                                break;
                            } else {
                                tr[i].style.display = 'none';
                            }
                        }
                    }
                }
            });
        </script>
    </div>  

</body>

</html>
