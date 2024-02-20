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

    @forelse ($foto as $item )
    <div class="portfolio-gallery">
        <div class="gallery-item animals">
            <img src="{{asset($item->lokasi_file)}}" alt="kazuha.jpg">
            <div class="hover-links">
                <a href="" class="site-btn sb-light">Next</a>
            </div>
        </div>

    @empty
    <div class="alert alert-danger" role="alert">
       Tidak ada data
      </div>
    @endforelse


</div>
<!-- Page section end-->
@endsection
