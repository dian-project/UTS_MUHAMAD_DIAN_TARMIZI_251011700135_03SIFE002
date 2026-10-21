
@extends('layouts.app')

@section('title', 'Beranda - FurniSpace')

@push('styles')
<style>
    .hero-section {
        background: #f7f5ef;
        overflow: hidden;
    }

    .hero-content {
        padding-top: 75px;
        padding-bottom: 75px;
    }

    .hero-label {
        color: #287451;
        font-size: 14px;
        letter-spacing: 1.2px;
        margin-bottom: 18px;
    }

    .hero-section h1 {
        color: #19392d;
        font-size: clamp(36px, 4.3vw, 58px);
        line-height: 1.12;
        letter-spacing: -1.5px;
    }

    .hero-description {
        color: #61716a;
        font-size: 17px;
        line-height: 1.8;
        max-width: 520px;
    }

    .btn-furniture {
        display: inline-block;
        background: #205e4e;
        color: #fff;
        border: 1px solid #205e4e;
        border-radius: 8px;
        padding: 12px 23px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    .btn-furniture:hover {
        background: #19392d;
        border-color: #19392d;
        color: #fff;
        transform: translateY(-2px);
    }

    .hero-photo {
        width: 100%;
        height: 420px;
        object-fit: cover;
        border-radius: 18px;
        box-shadow: 0 18px 45px rgba(25, 57, 45, .13);
    }

    .featured-section {
        padding-top: 65px;
        padding-bottom: 70px;
    }

    .featured-label {
        color: #287451;
        font-size: 14px;
        letter-spacing: 1px;
    }

    .featured-title {
        color: #19392d;
        font-weight: 700;
    }

    .featured-description {
        color: #6c757d;
    }

    .home-product-card {
        height: 100%;
        border: 1px solid #e8ece8;
        border-radius: 13px;
        overflow: hidden;
        background: #fff;
        transition: transform .25s, box-shadow .25s;
    }

    .home-product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(25, 57, 45, .1);
    }

    .home-product-image {
        width: 100%;
        height: 230px;
        object-fit: cover;
        background: #f7f5ef;
    }

    .home-product-card .card-body {
        padding: 20px;
    }

    .home-category {
        display: inline-block;
        color: #205e4e;
        background: #e8f1eb;
        border-radius: 20px;
        padding: 5px 11px;
        font-size: 12px;
        margin-bottom: 12px;
    }

    .home-product-name {
        color: #29352f;
        font-size: 18px;
        font-weight: 700;
    }

    .home-product-price {
        color: #287451;
        font-size: 18px;
        font-weight: 700;
    }

    .btn-outline-furniture {
        color: #205e4e;
        background: #fff;
        border: 1px solid #205e4e;
        border-radius: 8px;
        padding: 11px 22px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        transition: .2s;
    }

    .btn-outline-furniture:hover {
        color: #fff;
        background: #205e4e;
    }

    @media (max-width: 991px) {
        .hero-content {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .hero-photo {
            height: 340px;
        }
    }

    @media (max-width: 575px) {
        .hero-section h1 {
            font-size: 36px;
        }

        .hero-photo {
            height: 260px;
        }

        .featured-section {
            padding-top: 45px;
            padding-bottom: 45px;
        }

        .home-product-image {
            height: 210px;
        }
    }
</style>
@endpush

@section('content')

<!-- HERO -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-5 hero-content">

            <div class="col-lg-6">
                <p class="hero-label fw-bold">
                    SELAMAT DATANG DI FURNISPACE
                </p>

                <h1 class="fw-bold mb-4">
                    Furniture Elegan untuk Hunian Impian
                </h1>

                <p class="hero-description mb-4">
                    Temukan koleksi furniture pilihan dengan desain
                    modern untuk menciptakan rumah yang nyaman,
                    indah, dan berkarakter.
                </p>

                <a href="{{ route('furnitures.index') }}"
                   class="btn-furniture">
                    Lihat Semua Produk &rarr;
                </a>
            </div>

            <div class="col-lg-6">
                
<img
    src="{{ asset('assets/images/kursi-minimalis.jpg') }}"
    alt="Kursi minimalis FurniSpace"
    class="hero-photo"
    loading="eager"
    onerror="this.onerror=null;this.src='{{ asset('assets/images/meja-tamu.jpg') }}';"
>

            </div>

        </div>
    </div>
</section>

<!-- PRODUK UNGGULAN -->
<section class="container featured-section">

    <div class="text-center mb-5">
        <p class="featured-label fw-bold mb-2">
            PILIHAN TERBAIK
        </p>

        <h2 class="featured-title display-6 mb-3">
            Produk Unggulan
        </h2>

        <p class="featured-description mb-0">
            Beberapa pilihan furniture untuk melengkapi hunian Anda.
        </p>
    </div>

    <div class="row g-4">
        @forelse ($furnitures as $furniture)

            @php
                $imageName = $furniture->image ?? '';

                if (str_starts_with($imageName, 'http://') ||
                    str_starts_with($imageName, 'https://')) {
                    $imageUrl = $imageName;
                } else {
                    $imageUrl = asset(
                        'assets/images/' . basename($imageName)
                    );
                }
            @endphp

            <div class="col-sm-6 col-lg-4">
                <div class="card home-product-card">

                    <img
                        src="{{ $imageUrl }}"
                        alt="{{ $furniture->name }}"
                        class="home-product-image"
                        loading="lazy"
                    >

                    <div class="card-body d-flex flex-column">

                        <div>
                            <span class="home-category">
                                {{ $furniture->category }}
                            </span>
                        </div>

                        <h3 class="home-product-name mb-3">
                            {{ $furniture->name }}
                        </h3>

                        <p class="home-product-price mt-auto mb-3">
                            Rp{{ number_format($furniture->price, 0, ',', '.') }}
                        </p>

                        <a
                            href="{{ route('furnitures.show', $furniture->id) }}"
                            class="btn-furniture text-center"
                        >
                            Lihat Detail
                        </a>

                    </div>
                </div>
            </div>

        @empty
            <div class="col-12 text-center py-4">
                <p class="text-muted">
                    Belum ada produk furniture.
                </p>
            </div>
        @endforelse
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('furnitures.index') }}"
           class="btn-outline-furniture">
            Lihat Semua Katalog &rarr;
        </a>
    </div>

</section>


@endsection
