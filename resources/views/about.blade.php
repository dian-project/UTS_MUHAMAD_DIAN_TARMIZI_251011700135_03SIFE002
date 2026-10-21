
@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="text-success fw-semibold">TENTANG KAMI</span>
            <h1 class="fw-bold mt-2">Mengenal FurniSpace</h1>
            <p class="text-secondary">
                Solusi furnitur untuk hunian yang nyaman dan elegan.
            </p>
        </div>

        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <img
                    src="{{ asset('assets/images/meja-tamu.jpg') }}"
                    alt="Furnitur FurniSpace"
                    class="img-fluid rounded-4 shadow"
                    style="width: 100%; height: 350px; object-fit: cover;"
                >
            </div>

            <div class="col-lg-6">
                <h2 class="fw-bold">Menciptakan Ruang yang Nyaman</h2>
                <p class="text-secondary">
                    FurniSpace merupakan website katalog furnitur yang
                    membantu pengunjung menemukan berbagai pilihan
                    furnitur untuk kebutuhan rumah maupun ruangan kerja.
                </p>
                <p class="text-secondary">
                    Kami menghadirkan pilihan desain yang menarik,
                    fungsional, dan sesuai dengan kebutuhan ruangan.
                </p>
                <a href="{{ route('furnitures.index') }}"
                   class="btn btn-success">
                    Lihat Katalog
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
