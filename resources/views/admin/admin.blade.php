@extends('layouts.admin')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('content1')
<div class="content1">
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
                        <h3>{{$totalOrders}}</h3>
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
                        <h3>{{$completedOrders}}</h3>
                    </div>
                    <div class="total-completed">
                        <p>Completed Orders</p>
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
                        <h3>{{$cancelledOrders}}</h3>
                    </div>
                    <div class="total-completed">
                        <p>Cancelled Orders</p>
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
                        <h3>{{$totalRevenue}}</h3>
                    </div>
                    <div class="total-completed">
                        <p>Total Revenue</p>
                    </div>
                    <div class="percentage-days">
                        <img id="arrow-icon" src="images/arrow-icon.png">
                        <p id="days">4% (30 days)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="chartContainer">
        <canvas id="myChart" width="1100" height="425"></canvas>
    </div>
</div>
<script>

    fetch('/api/chart/data')
    .then(response => response.json())
    .then(data => {
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                label: 'Total Revenue',
                data: [data.Jan ?? 0, data.Feb ?? 0, data.Mar ?? 0, data.Apr ?? 0, data.May ?? 0, data.Jun ?? 0, data.Jul ?? 0, data.Aug ?? 0, data.Sep ?? 0, data.Oct ?? 0, data.Nov ?? 0, data.Dec ?? 0],
                borderWidth: 1,
                borderColor: 'maroon'
                }]
            },
            options: {
                responsive: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error fetching chart data:', error);
    });

    
</script>
@endsection