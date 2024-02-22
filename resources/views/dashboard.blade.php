@extends('layouts.main')
@section('content')
    <div class="page-section home-page">
        <div class="hero-slider owl-carousel">
            @forelse ($foto as $data)
                <div class="slider-item d-flex align-items-center set-bg"
                    data-setbg="{{ 'storage/images/'.$data->lokasi_file }}" data-hash="slide-1">
                    <div class="si-text-box">
                        <span>{{$data->user->name}}</span>
                        <h2>{{$data->judul_foto}}</h2>
                        <p>{{$data->deskripsi}}</p>
                        <a href="{{route('detail-photo', $data->id)}}" class="site-btn">Read More</a>
                    </div>
                    <div class="next-slide-show set-bg" data-setbg="{{ 'storage/images/' . $data->lokasi_file }}">
                        <a href="#slide-2" class="ns-btn">Next</a>
                    </div>
                </div>

            @empty
                <div>
                    <div class="alert alert-danger" role="alert">
                        Tidak ada data
                    </div>
                </div>
        </div>
        @endforelse
    </div>
    <div id="snh-1"></div>
    </div>
@endsection
