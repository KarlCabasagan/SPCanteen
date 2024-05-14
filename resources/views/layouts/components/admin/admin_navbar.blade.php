<div class="admin-navbar">
  <div class="column">
    <div class="logo">
      <img id="logo" src="/images/SPCanteen.png" alt="SPCanteen.png">
    </div>
    <div class="icon-bar">
      <div class="nav-btns">
        <a class="active" href="admin">
          <i class="fa-solid fa-gauge btns"></i>
          <span id="nav-txt">Dashboard</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" href="add_product">
          <i class="fa-regular fa-square-plus btns"></i>
          <span id="nav-txt">Add Products</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" href="order_list">
          <i class="far fa-list-alt btns"></i>
          <span id="nav-txt">Order List</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" href="transaction_history">
          <i class="far fa-address-book btns"></i>
          <span id="nav-txt">Transaction History</span>
        </a>
      </div>
      <div class="nav-btns">
        <a class="active" href="order_scanner">
          <i class="fa fa-qrcode btns"></i>
          <span id="nav-txt">Order Scanner</span>
        </a>
      </div>
      <form action="/logout" method="POST">
        @csrf
        <div class="nav-btns">
          <button id="logout" type="submit">
            <a class="active">
              <span class="fa fa-sign-out btns">
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