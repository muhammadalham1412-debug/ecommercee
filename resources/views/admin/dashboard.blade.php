{{-- ================================================
     FILE: resources/views/admin/dashboard.blade.php
     FUNGSI: Dashboard admin menampilkan statistik
     ================================================ --}}

@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

    {{-- Stats Cards --}}
    <div class="row g-4 mb-4">

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Pendapatan</p>
                    {{-- <h4 class="mb-0">Rp {{ number_format($stats['total_revenue'], 0, ',', '.') }}</h4> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Total Pesanan</p>
                    {{-- <h4 class="mb-0">{{ $stats['total_orders'] }}</h4> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Perlu Diproses</p>
                    {{-- <h4 class="mb-0">{{ $stats['pending_orders'] }}</h4> --}}
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-1">Stok Menipis</p>
                    {{-- <h4 class="mb-0">{{ $stats['low_stock'] }}</h4> --}}
                </div>
            </div>
        </div>

    </div>


    <div class="row g-4">

        {{-- Recent Orders --}}
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between">
                    <h5 class="mb-0">Pesanan Terbaru</h5>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>No. Order</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach($recentOrders as $order) --}}
                                    <tr>
                                        <td>
                                            {{-- <a href="{{ route('admin.orders.show', $order->id) }}">
                                                #{{ $order->order_number }}
                                            </a> --}}
                                        </td>

                                        {{-- <td>{{ $order->user->name }}</td> --}}

                                        {{-- <td>Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td> --}}

                                        <td>
                                            <span class="badge bg-secondary">
                                                {{-- {{ ucfirst($order->status) }} --}}
                                            </span>
                                        </td>

                                        {{-- <td>{{ $order->created_at->format('d M Y') }}</td> --}}
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{-- Quick Actions --}}
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Aksi Cepat</h5>
                </div>

                <div class="card-body d-grid gap-2">

                    {{-- Tambah Produk --}}
                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        + Tambah Produk
                    </a>

                    {{-- Kelola Kategori --}}
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-primary">
                        Kelola Kategori
                    </a>

                    {{-- Lihat Pesanan --}}
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-primary">
                        Lihat Semua Pesanan
                    </a>

                </div>
            </div>
        </div>

    </div>

@endsection
