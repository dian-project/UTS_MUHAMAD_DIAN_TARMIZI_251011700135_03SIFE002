
@extends('layouts.app')

@section('title', 'Katalog Furniture - FurniSpace')

@section('content')
<div class="container py-5">

    <!-- HEADER KATALOG -->
    <div class="text-center mb-5">
        <h1 class="section-heading">Katalog Furniture</h1>
        <p class="text-muted">
            Temukan furniture minimalis yang cocok untuk hunian Anda.
        </p>
    </div>

    <!-- FORM PENCARIAN DAN FILTER -->
    <div class="search-panel mb-5">
        <form action="{{ route('furnitures.index') }}" method="GET">
            <div class="row g-3 align-items-end">

                <div class="col-md-6">
                    <label for="search" class="form-label fw-semibold">
                        Cari Furniture
                    </label>
                    <input
                        type="text"
                        name="search"
                        id="search"
                        class="form-control"
                        placeholder="Masukkan nama furniture..."
                        value="{{ request('search') }}"
                    >
                </div>

                <div class="col-md-4">
                    <label for="category" class="form-label fw-semibold">
                        Kategori
                    </label>
                    <select name="category" id="category" class="form-select">
                        <option value="">Semua Kategori</option>

                        @foreach ($categories as $category)
                            <option
                                value="{{ $category }}"
                                {{ request('category') == $category ? 'selected' : '' }}
                            >
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-brand">
                        Cari
                    </button>
                </div>

            </div>
        </form>
    </div>

    <!-- DAFTAR PRODUK -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="section-heading h4 mb-0">Pilihan Furniture</h2>

        @if (request('search') || request('category'))
            <a href="{{ route('furnitures.index') }}"
               class="text-decoration-none">
                Reset filter
            </a>
        @endif
    </div>

    @if ($furnitures->count() > 0)

        <div class="row g-4">
            @foreach ($furnitures as $furniture)

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
                    <div class="card furniture-card">

                        <img
                            src="{{ $imageUrl }}"
                            class="furniture-image"
                            alt="{{ $furniture->name }}"
                            loading="lazy"
                        >

                        <div class="card-body d-flex flex-column">
                            <div class="mb-3">
                                <span class="furniture-category">
                                    {{ $furniture->category }}
                                </span>
                            </div>

                            <h3 class="h5 fw-bold">
                                {{ $furniture->name }}
                            </h3>

                            <p class="text-muted small mb-2">
                                Material: {{ $furniture->material }}
                            </p>

                            <p class="text-muted small mb-3">
                                Dimensi: {{ $furniture->dimensions }}
                            </p>

                            <div class="mt-auto">
                                <p class="furniture-price mb-3">
                                    Rp{{ number_format($furniture->price, 0, ',', '.') }}
                                </p>

                                <a
                                    href="{{ route('furnitures.show', $furniture->id) }}"
                                    class="btn btn-brand w-100"
                                >
                                    Lihat Detail
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>

        <!-- PAGINATION MANUAL: HANYA SATU TEKS SHOWING -->
        <div class="d-flex justify-content-center align-items-center flex-wrap gap-3 mt-5">

            <p class="pagination-info">
                Showing {{ $furnitures->firstItem() ?? 0 }}
                to {{ $furnitures->lastItem() ?? 0 }}
                of {{ $furnitures->total() }} results
            </p>

            @if ($furnitures->lastPage() > 1)
                <nav class="pagination-buttons" aria-label="Navigasi katalog">
                    <ul class="pagination">

                        <!-- TOMBOL SEBELUMNYA -->
                        <li class="page-item {{ $furnitures->onFirstPage() ? 'disabled' : '' }}">
                            @if ($furnitures->onFirstPage())
                                <span class="page-link">&lsaquo;</span>
                            @else
                                <a class="page-link"
                                   href="{{ $furnitures->previousPageUrl() }}"
                                   aria-label="Halaman sebelumnya">
                                    &lsaquo;
                                </a>
                            @endif
                        </li>

                        <!-- NOMOR HALAMAN -->
                        @php
                            $startPage = max(1, $furnitures->currentPage() - 1);
                            $endPage = min(
                                $furnitures->lastPage(),
                                $furnitures->currentPage() + 1
                            );
                        @endphp

                        @for ($page = $startPage; $page <= $endPage; $page++)
                            <li class="page-item {{ $furnitures->currentPage() == $page ? 'active' : '' }}">
                                @if ($furnitures->currentPage() == $page)
                                    <span class="page-link">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a class="page-link"
                                       href="{{ $furnitures->url($page) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            </li>
                        @endfor

                        <!-- TOMBOL BERIKUTNYA -->
                        <li class="page-item {{ $furnitures->hasMorePages() ? '' : 'disabled' }}">
                            @if ($furnitures->hasMorePages())
                                <a class="page-link"
                                   href="{{ $furnitures->nextPageUrl() }}"
                                   aria-label="Halaman berikutnya">
                                    &rsaquo;
                                </a>
                            @else
                                <span class="page-link">&rsaquo;</span>
                            @endif
                        </li>

                    </ul>
                </nav>
            @endif

        </div>

    @else

        <div class="text-center py-5">
            <h3 class="section-heading">Furniture tidak ditemukan</h3>
            <p class="text-muted">
                Coba gunakan kata kunci atau kategori yang berbeda.
            </p>
            <a href="{{ route('furnitures.index') }}" class="btn btn-brand">
                Lihat Semua Furniture
            </a>
        </div>

    @endif

</div>
@endsection
