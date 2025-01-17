@extends('layout.admin')

@section('content')
<div class="content-wrapper">
    <div class="row m-3">
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
            <h3>{{ $activeEvents }}</h3>

            <p>Event Aktif</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
            <h3>{{ $totalTransactions }}<sup style="font-size: 20px">%</sup></h3>

            <p>Tiket Terjual</p>
            </div>
            <div class="icon">
            <i class="ion ion-stats-bars"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
            <h3>{{ $activeUsers }}</h3>

            <p>User Registrations</p>
            </div>
            <div class="icon">
            <i class="ion ion-person-add"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
            <h3>{{ $activeAdmins }}</h3>

            <p>Admin aktif</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
        </div>
        </div>
        <!-- ./col -->
    </div>
</div>

@endsection
