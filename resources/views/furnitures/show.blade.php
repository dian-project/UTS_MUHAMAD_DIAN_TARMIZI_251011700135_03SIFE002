
@extends('layouts.app')

@section('title', $furniture->name . ' - FurniSpace')

@push('styles')
<style>
    .detail-section {
        padding-top: 45px;
        padding-bottom: 70px;
    }

    .detail-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #254f3f;
        font-weight: 600;
        text-decoration: none;
        margin-bottom: 28px;
        transition: .2s;
    }

    .detail-back:hover {
        color: #19392d;
        transform: translateX(-3px);
    }

    .detail-image-wrapper {
        background: #f7f5ef;
        border: 1px solid #ece9df;
        border-radius: 18px;
        padding: 20px;
        overflow: hidden;
    }

    .detail-image {
        display: block;
        width: 100%;
        height: 480px;
        object-fit: contain;
        border-radius: 12px;
    }

    .detail-category {
        display: inline-block;
        background: #e8f1eb;
        color: #254f3f;
        padding: 7px 14px;
        border-radius: 30px;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .detail-title {
        color: #19392d;
        font-size: clamp(28px, 3vw, 40px);
        font-weight: 700;
        line-height: 1.25;
        margin-bottom: 16px;
    }

    .detail-description {
        color: #6c757d;
        font-size: 16px;
        line-height: 1.8;
    }

    .detail-price-box {
        background: #f7f5ef;
        border-radius: 12px;
        padding: 20px;
        margin: 25px 0;
    }

    .detail-price-label {
        color: #6c757d;
        font-size: 14px;
        margin-bottom: 5px;
    }

    .detail-price {
        color: #254f3f;
        font-size: 30px;
        font-weight: 700;
        margin: 0;
    }

    .detail-info-title {
        color: #19392d;
        font-size: 19px;
        font-weight: 700;
        margin-bottom: 15px;
    }

    .detail-info-list {
        border: 1px solid #e8ece8;
        border-radius: 12px;
        overflow: hidden;
    }

    .detail-info-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 20px;
        padding: 15px 18px;
        border-bottom: 1px solid #e8ece8;
    }

    .detail-info-row:last-child {
        border-bottom: none;
    }

    .detail-info-label {
        color: #6c757d;
        flex-shrink: 0;
    }

    .detail-info-value {
        color: #29352f;
        font-weight: 600;
        text-align: right;
        overflow-wrap: anywhere;
    }

    .detail-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 25px;
    }

    .detail-outline-button {
        display: inline-block;
        padding: 12px 20px;
        border: 1px solid #254f3f;
        border-radius: 8px;
        color: #254f3f;
        text-align: center;
        text-decoration: none;
        font-weight: 600;
        transition: .2s;
    }

    .detail-outline-button:hover {
        background: #e8f1eb;
        color: #19392d;
    }

    @media (max-width: 991px) {
        .detail-image {
            height: 380px;
        }
    }

    @media (max-width: 575px) {
        .detail-section {
            padding-top: 30px;
            padding-bottom: 45px;
        }

        .detail-image {
            height: 290px;
        }

        .detail-image-wrapper {
            padding: 12px;
        }

        .detail-price {
            font-size: 26px;
        }

        .detail-info-row {
            padding: 13px;
            gap: 12px;
        }
    }
</style>
@endpush

@section('content')

<section class="container detail-section">

    <div class="row g-4 g-lg-5 align-items-start">

        <!-- FOTO PRODUK -->
        <div class="col-lg-6">
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

            <div class="detail-image-wrapper">
                <img
                    src="{{ $imageUrl }}"
                    alt="{{ $furniture->name }}"
                    class="detail-image"
                    onerror="this.onerror=null;this.src='{{ asset('assets/images/kursi-minimalis.jpg') }}';"
                >
            </div>
        </div>

        <!-- DETAIL PRODUK -->
        <div class="col-lg-6">

            <span class="detail-category">
                {{ $furniture->category }}
            </span>

            <h1 class="detail-title">
                {{ $furniture->name }}
            </h1>

            <p class="detail-description">
                Pilihan furniture untuk menambah kenyamanan dan
                memperindah ruangan Anda. Temukan perpaduan desain,
                fungsi, dan kenyamanan untuk hunian Anda.
            </p>

            <!-- HARGA -->
            <div class="detail-price-box">
                <p class="detail-price-label">Harga produk</p>

                <p class="detail-price">
                    Rp{{ number_format($furniture->price, 0, ',', '.') }}
                </p>
            </div>

            <!-- INFORMASI -->
            <h2 class="detail-info-title">
                Informasi Produk
            </h2>

            <div class="detail-info-list">

                <div class="detail-info-row">
                    <span class="detail-info-label">Nama Produk</span>
                    <span class="detail-info-value">
                        {{ $furniture->name }}
                    </span>
                </div>

                <div class="detail-info-row">
                    <span class="detail-info-label">Kategori</span>
                    <span class="detail-info-value">
                        {{ $furniture->category }}
                    </span>
                </div>

                <div class="detail-info-row">
                    <span class="detail-info-label">Material</span>
                    <span class="detail-info-value">
                        {{ $furniture->material }}
                    </span>
                </div>

                <div class="detail-info-row">
                    <span class="detail-info-label">Dimensi</span>
                    <span class="detail-info-value">
                        {{ $furniture->dimensions }}
                    </span>
                </div>

            </div>

            <!-- TOMBOL -->
            <div class="detail-actions">

                <a href="{{ route('furnitures.index') }}"
                   class="detail-outline-button">
                    Kembali
                </a>

            </div>

        </div>

    </div>

</section>

@endsection
