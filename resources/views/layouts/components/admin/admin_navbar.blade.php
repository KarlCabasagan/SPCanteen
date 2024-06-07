<div class="admin-navbar">
  <div class="column">
    <div class="logo">
      <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
    </div>
    <div class="icon-bar">
      <div class="nav-btns">
        <a class="active" id="admin1" href="administrator">
          <iconify-icon icon="clarity:dashboard-line" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Dashboard</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" id="admin2" href="product_list">
          <iconify-icon icon="el:list-alt" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Product List</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" id="admin3" href="order_list">
          <iconify-icon icon="ic:baseline-pending-actions" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Order List</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" id="admin4" href="transaction_history">
          <iconify-icon icon="fluent:clipboard-task-list-16-regular" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Transaction History</span>
        </a>
      </div>
      @if(Auth::user()->role_id == 4)
        <div class="nav-btns">
          <a class="active" id="admin5" href="manage_user">
            <iconify-icon icon="fluent:notepad-person-24-regular" style="font-size: 26px;"></iconify-icon>
            <span id="nav-txt">Manage Users</span>
          </a>
        </div>
      @endif
      <form action="/logout" method="POST">
        @csrf
        <div class="nav-btns">
          <button id="logout" type="submit">
            <a class="active">
              <iconify-icon icon="humbleicons:logout" style="font-size: 28px;"></iconify-icon>
              <span id="nav-txt">Logout</span>
            </a>
          </button>
        </div>
      </form>
      <div class="copyright">
        <p>
          <b>SPCANTEEN</b>
          <br>© 2024 All Rights Reserved
        </p>
      </div>
    </div>
  </div>
</div>
<script>
  // background-color: maroon;
  // color: white;
  // border-radius: 10px;
  const navContainer = document.querySelector('.admin-navbar');
  const navs = document.querySelectorAll('.active');
  var temp = "";

    if(currentUrl == 'http://127.0.0.1:8000/administrator') {
      document.getElementById('admin1').style.backgroundColor = "maroon";
      document.getElementById('admin1').style.color = "white";
      document.getElementById('admin1').style.borderRadius = "10px";
      document.getElementById('admin1').style.cursor = "default";
      temp = "admin1";
    } else if (currentUrl == 'http://127.0.0.1:8000/product_list') {
        document.getElementById('admin2').style.backgroundColor = "maroon";
        document.getElementById('admin2').style.color = "white";
        document.getElementById('admin2').style.borderRadius = "10px";
        document.getElementById('admin2').style.cursor = "default";
        temp = "admin2";
      } else if(currentUrl == 'http://127.0.0.1:8000/order_list') {
        document.getElementById('admin3').style.backgroundColor = "maroon";
        document.getElementById('admin3').style.color = "white";
        document.getElementById('admin3').style.borderRadius = "10px";
        document.getElementById('admin3').style.cursor = "default";
        temp = "admin3";
        } else if (currentUrl == 'http://127.0.0.1:8000/transaction_history') {
          document.getElementById('admin4').style.backgroundColor = "maroon";
          document.getElementById('admin4').style.color = "white";
          document.getElementById('admin4').style.borderRadius = "10px";
          document.getElementById('admin4').style.cursor = "default";
          temp = "admin4";
          } else {
            document.getElementById('admin5').style.backgroundColor = "maroon";
            document.getElementById('admin5').style.color = "white";
            document.getElementById('admin5').style.borderRadius = "10px";
            document.getElementById('admin5').style.cursor = "default";
            temp = "admin5";
          }

  navContainer.addEventListener('mouseenter', function() {
    navs.forEach((nav) => {
      nav.addEventListener('mouseenter', function() {
        document.getElementById(temp).style.backgroundColor = "maroon";
        document.getElementById(temp).style.color = "white";
        document.getElementById(temp).style.borderRadius = "";
        document.getElementById(temp).style.cursor = "default";
        if(nav.id != temp) {
          document.getElementById(temp).style.backgroundColor = "white";
          document.getElementById(temp).style.color = "black";
          document.getElementById(temp).style.borderRadius = "";
          document.getElementById(temp).style.cursor = "default";

          document.getElementById(nav.id).style.backgroundColor = "maroon";
          document.getElementById(nav.id).style.color = "white";
          document.getElementById(nav.id).style.borderRadius = "";
          document.getElementById(nav.id).style.cursor = "pointer";

          nav.addEventListener('mouseleave', function() {
            document.getElementById(nav.id).style.backgroundColor = "white";
            document.getElementById(nav.id).style.color = "black";
            document.getElementById(nav.id).style.borderRadius = "";
            document.getElementById(nav.id).style.cursor = "pointer";
          });
        }
      });
    });
  });


  navContainer.addEventListener('mouseleave', function() {
    if(currentUrl == 'http://127.0.0.1:8000/administrator') {
      document.getElementById('admin1').style.backgroundColor = "maroon";
      document.getElementById('admin1').style.color = "white";
      document.getElementById('admin1').style.borderRadius = "10px";
      document.getElementById('admin1').style.cursor = "default";
    } else if (currentUrl == 'http://127.0.0.1:8000/product_list') {
        document.getElementById('admin2').style.backgroundColor = "maroon";
        document.getElementById('admin2').style.color = "white";
        document.getElementById('admin2').style.borderRadius = "10px";
        document.getElementById('admin2').style.cursor = "default";
      } else if(currentUrl == 'http://127.0.0.1:8000/order_list') {
        document.getElementById('admin3').style.backgroundColor = "maroon";
        document.getElementById('admin3').style.color = "white";
        document.getElementById('admin3').style.borderRadius = "10px";
        document.getElementById('admin3').style.cursor = "default";
        } else if (currentUrl == 'http://127.0.0.1:8000/transaction_history') {
          document.getElementById('admin4').style.backgroundColor = "maroon";
          document.getElementById('admin4').style.color = "white";
          document.getElementById('admin4').style.borderRadius = "10px";
          document.getElementById('admin4').style.cursor = "default";
          } else {
            document.getElementById('admin5').style.backgroundColor = "maroon";
            document.getElementById('admin5').style.color = "white";
            document.getElementById('admin5').style.borderRadius = "10px";
            document.getElementById('admin5').style.cursor = "default";
          }
  });      

</script>