@extends('layouts.main')
@section('content')
    <!-- Page section -->
    <div class="row py-5 px-4">
        <div class="col-lg-12 col-md-8 col-sm-6 mx-auto">
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    @if (Auth::check())
                    <?php $user = Auth::user(); ?>
                    <div class="media d-flex align-items-center">
                        <img src="https://i1.sndcdn.com/artworks-qxyub3eQjxUjOND4-OzJXOA-t500x500.jpg" alt="..." width="250" class="rounded mb-2 img-thumbnail">
                        <div class="media-body ml-4 text-dark">
                            <h4 class="mt-0 mb-1">{{ $user->name }}</h4>
                            <p class="small mb-1"><i class="fas fa-map-marker-alt mx-1"></i>{{ $user->address }}</p>
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">215</h5><small class="text-muted"><i class="fas fa-image mx-1"></i>Photos</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"><i class="fas fa-heart mx-1"></i>Likes</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="#" class="btn btn-outline-dark">Edit profile</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#tambahFoto">
                            Tambah Foto
                        </button>n 
                    @endif
                </div>
                <div class="px-4 py-3">
                    <h5 class="mb-0">About</h5>
                    <div class="p-4 rounded shadow-sm bg-light">
                        <p class="font-italic mb-0">Web Developer</p>
                        <p class="font-italic mb-0">Lives in New York</p>
                        <p class="font-italic mb-0">Photographer</p>
                    </div>
                </div>
                <div class="py-4 px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="mb-0">Recent photos</h5>
                        <a href="#" class="btn btn-link text-muted">Show all</a>
                    </div>
                    <div class="row">
                        @forelse ($foto as $item)
                        <div class="col-lg-6 mb-2 pr-lg-1">
                            <img src="{{ $item->lokasi_file }}" alt="" class="img-fluid rounded shadow-sm">
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page section end-->

<!-- Modal -->
<div class="modal fade" id="tambahFoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah foto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                    <label for="input_judul" class="form-label">Judul Foto</label>
                    <input type="text" id="input_judul" class="form-control">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Lokasi File</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                    <label for="input_deskripsi" class="form-label">Deskripsi</label>
                    <textarea type="text" id="input_deskripsi" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              </div>
            </div>


    <script src="https://kit.fontawesome.com/52c8909dfd.js" crossorigin="anonymous"></script>
    <!-- Skrip JavaScript untuk memanggil modal -->
    <script>
       const myModal = document.getElementById('myModal')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
        })
      </script>

@endsection
