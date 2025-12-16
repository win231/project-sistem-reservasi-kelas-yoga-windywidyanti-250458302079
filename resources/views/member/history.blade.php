@extends('member.layouts')

@section('title', 'Booking Saya')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Riwayat Booking Saya</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                @livewire('member.booking-history')
            </div>
        </div>
    </section>
</div>

@endsection