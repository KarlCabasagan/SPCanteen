@extends('layouts.admin')

@section('content1')
<div class="content">
    @if(auth()->user()->role_id == 3)
        <h1>Hello Admin!</h1>
    @elseif(auth()->user()->role_id == 4)
        <h1>Hello Super Admin!</h1>
    @endif
    <div class="row1">
        <div class="box1">
            <div class="box-content">
                <div class="sales-icon">
                    <img id="box-icon" src="images/icon1.png">
                </div>
                <div class="sales-txt">
                    <div class="header">
                        <h3>75</h3>
                    </div>
                    <div class="total-completed">
                        <p>Total Orders</p>
                    </div>
                    <div class="percentage-days">
                        <img id="arrow-icon" src="images/arrow-icon.png">
                        <p id="days">4% (30 days)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box2">
            <div class="box-content">
                <div class="sales-icon">
                    <img id="box-icon" src="images/icon1.png">
                </div>
                <div class="sales-txt">
                    <div class="header">
                        <h3>75</h3>
                    </div>
                    <div class="total-completed">
                        <p>Total Orders</p>
                    </div>
                    <div class="percentage-days">
                        <img id="arrow-icon" src="images/arrow-icon.png">
                        <p id="days">4% (30 days)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box3">
            <div class="box-content">
                <div class="sales-icon">
                    <img id="box-icon" src="images/icon1.png">
                </div>
                <div class="sales-txt">
                    <div class="header">
                        <h3>75</h3>
                    </div>
                    <div class="total-completed">
                        <p>Total Orders</p>
                    </div>
                    <div class="percentage-days">
                        <img id="arrow-icon" src="images/arrow-icon.png">
                        <p id="days">4% (30 days)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="box4">
            <div class="box-content">
                <div class="sales-icon">
                    <img id="box-icon" src="images/icon1.png">
                </div>
                <div class="sales-txt">
                    <div class="header">
                        <h3>75</h3>
                    </div>
                    <div class="total-completed">
                        <p>Total Orders</p>
                    </div>
                    <div class="percentage-days">
                        <img id="arrow-icon" src="images/arrow-icon.png">
                        <p id="days">4% (30 days)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection