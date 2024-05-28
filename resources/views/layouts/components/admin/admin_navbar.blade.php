<div class="admin-navbar">
  <div class="column">
    <div class="logo">
      <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
    </div>
    <div class="icon-bar">
      <div class="nav-btns">
        <a class="active" href="administrator">
          <iconify-icon icon="clarity:dashboard-line" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Dashboard</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" href="product_list">
          <iconify-icon icon="el:list-alt" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Product List</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" href="order_list">
          <iconify-icon icon="ic:baseline-pending-actions" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Order List</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" href="transaction_history">
          <iconify-icon icon="fluent:clipboard-task-list-16-regular" style="font-size: 26px;"></iconify-icon>
          <span id="nav-txt">Transaction History</span>
        </a>
      </div>
      @if(Auth::user()->role_id == 4)
        <div class="nav-btns">
          <a class="active" href="manage_user">
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
        <p style="color: #999; font-size:13px; margin-top:45px;">
          <b>SPCANTEEN</b>
          <br>© 2024 All Rights Reserved
        </p>
      </div>
    </div>
  </div>
</div>