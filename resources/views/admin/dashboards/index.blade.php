
@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">

    {{-- Dashboard Heading --}}
    <h1 class="mt-4">Dashboard</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <h5 class="mb-3">Welcome to KMDShop Admin Panel!</h5>

    {{-- Statistics Cards --}}
    <div class="row">

        {{-- Items --}}
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4 shadow">
                <div class="card-body">
                    <h5>Total Items</h5>
                    <h2>{{ $counts['items'] }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link"
                       href="{{ route('backend.items.index') }}">
                        View Items
                    </a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>

        {{-- Categories --}}
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4 shadow">
                <div class="card-body">
                    <h5>Total Categories</h5>
                    <h2>{{ $counts['categories'] }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link"
                       href="{{ route('backend.categories.index') }}">
                        View Categories
                    </a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>

        {{-- Orders --}}
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4 shadow">
                <div class="card-body">
                    <h5>Total Orders</h5>
                    <h2>{{ $counts['orders'] }}</h2>
                </div>
                <div class="card-footer">
                    <span class="small text-white">Order Summary</span>
                </div>
            </div>
        </div>

       {{-- Payments --}}
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4 shadow">
                <div class="card-body">
                    <h5>Total Payments</h5>
                    <h2>{{ $counts['payments'] }}</h2>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link"
                       href="{{ route('backend.payments.index') }}">
                        View Payments   
                    </a>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>

    {{-- Quick Access --}}
    <div class="card mb-4 shadow-sm">

        <div class="card-header">
            <i class="fas fa-th-large me-1"></i>
            Quick Access
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <a href="{{ route('backend.items.index') }}"
                       class="btn btn-primary w-100 py-3">
                        <i class="fas fa-box me-2"></i>
                        Manage Items
                    </a>
                </div>

                <div class="col-md-6 mb-3">
                    <a href="{{ route('backend.categories.index') }}"
                       class="btn btn-success w-100 py-3">
                        <i class="fas fa-list me-2"></i>
                        Manage Categories
                    </a>
                </div>

                <div class="col-md-6 mb-3">
                    <a href="{{ route('backend.payments.index') }}"
                       class="btn btn-danger w-100 py-3">
                        <i class="fas fa-list me-2"></i>
                        Manage Payments
                    </a>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection
