@extends('layouts.main')
@section('content')
    <!-- Page section -->
    <div class="page-section gallery-page">
        <ul class="portfolio-filter">
            <li class="filter all active" data-filter="*">All</li>
            <li class="filter" data-filter=".photo">Photography</li>
            <li class="filter" data-filter=".nature">Nature</li>
            <li class="filter" data-filter=".love">Love</li>
            <li class="filter" data-filter=".animals">Animals</li>
        </ul>

        <div class="row mx-5">
            @forelse ($foto as $item)
                <div class="gallery-item animals mb-4 col-4 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('storage/images/' . $item->lokasi_file) }}" alt="kazuha.jpg">
                    <div class="hover-links">
                        <a href="{{route('detail-photo', ['id' => $item])}}" class="site-btn sb-light">Next</a>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger" role="alert">
                    Tidak ada data
                </div>
            @endforelse
        </div>
    </div>
    <!-- Page section end-->
@endsection
