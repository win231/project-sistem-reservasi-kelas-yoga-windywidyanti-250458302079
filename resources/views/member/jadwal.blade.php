@extends('member.layouts')

@section('title', 'Jadwal Kelas')

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jadwal Kelas yang Tersedia</h3>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="row">

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Kelas</h4>
                    </div>
                    <div class="card-body">
                        @livewire('member.class-schedule-component')
                    </div>
                </div>
            </div>

        </div>
        <div class="row">

            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Informasi Cepat</h5>
                        <p>Kolom ini dapat digunakan untuk filter, promosi, atau informasi terbaru.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection