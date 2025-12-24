@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Detail Pesanan
            </h1>
            <p class="text-sm text-gray-500">
                Nomor Pesanan: <span class="font-medium">{{ $order->order_number }}</span>
            </p>
        </div>

        <span class="px-4 py-2 rounded-full text-sm font-semibold
            @if($order->status === 'pending') bg-yellow-100 text-yellow-700
            @elseif($order->status === 'paid') bg-green-100 text-green-700
            @elseif($order->status === 'cancelled') bg-red-100 text-red-700
            @else bg-gray-100 text-gray-700
            @endif
        ">
            {{ ucfirst($order->status) }}
        </span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        {{-- LEFT: Item Pesanan --}}
        <div class="md:col-span-2 bg-white rounded-lg shadow">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800">
                    Item Pesanan
                </h2>
            </div>

            <div class="divide-y">
                @foreach($order->items as $item)
                    <div class="p-6 flex justify-between items-center">
                        <div>
                            <p class="font-medium text-gray-800">
                                {{ $item->product_name }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ number_format($item->price, 0, ',', '.') }} × {{ $item->quantity }}
                            </p>
                        </div>

                        <p class="font-semibold text-gray-800">
                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- RIGHT: Ringkasan --}}
        <div class="bg-white rounded-lg shadow sticky top-6">
            <div class="p-6 border-b">
                <h2 class="text-lg font-semibold text-gray-800">
                    Ringkasan Pesanan
                </h2>
            </div>

            <div class="p-6 space-y-4 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-600">Status Pembayaran</span>
                    <span class="font-medium">
                        {{ ucfirst($order->payment_status ?? 'unpaid') }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">Nama Penerima</span>
                    <span class="font-medium">
                        {{ $order->shipping_name }}
                    </span>
                </div>

                <div class="flex justify-between">
                    <span class="text-gray-600">No. Telepon</span>
                    <span class="font-medium">
                        {{ $order->shipping_phone }}
                    </span>
                </div>

                <div>
                    <p class="text-gray-600 mb-1">Alamat Pengiriman</p>
                    <p class="font-medium">
                        {{ $order->shipping_address }}
                    </p>
                </div>

                <hr>

                <div class="flex justify-between text-base font-bold">
                    <span>Total Pembayaran</span>
                    <span>
                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                    </span>
                </div>

                {{-- Tombol Aksi --}}
                @if($order->status === 'pending')
                    <a href="#"
                       class="block text-center mt-6 bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">
                        Lanjutkan Pembayaran
                    </a>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
