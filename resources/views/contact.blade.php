
@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-success fw-semibold">KONTAK KAMI</span>
            <h1 class="fw-bold mt-2">Hubungi FurniSpace</h1>
            <p class="text-secondary">
                Kami siap membantu Anda menemukan furnitur yang sesuai.
            </p>
        </div>

        
<div class="row justify-content-center g-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4 p-md-5">
                <div class="row text-center g-4">

                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold">Website</h5>
                        <a href="https://www.furnispace.com"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-success text-decoration-none">
                            www.furnispace.com
                        </a>
                    </div>

                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold">Email</h5>
                        <a href="mailto:furnispace@gmail.com"
                           class="text-success text-decoration-none">
                            furnispace@gmail.com
                        </a>
                    </div>

                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold">WhatsApp</h5>
                        <a href="tel:081123456789"
                           class="text-success text-decoration-none">
                            081123456789
                        </a>
                    </div>

                    <div class="col-12 col-md-3">
                        <h5 class="fw-bold">Alamat</h5>
                        <a href="https://www.google.com/maps/search/?api=1&query=FurniSpace"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="text-success text-decoration-none">
                            Lihat Alamat
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
