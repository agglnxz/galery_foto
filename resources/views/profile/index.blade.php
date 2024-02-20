@extends('layouts.main')
@section('content')
    <!-- Page section -->
    <div class="row py-5 px-4">
        <div class=" col-lg-12 col-md-8 col-sm-6  mx-auto"> <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-0 pb-4 cover">
                    @if (Auth::check())
                        <?php $user = Auth::user(); ?>
                        <div class="media align-items-end profile-head">
                            <div class="profile mr-3"><img
                                    src="https://i1.sndcdn.com/artworks-qxyub3eQjxUjOND4-OzJXOA-t500x500.jpg" alt="..."
                                    width="250" class="rounded mb-2 img-thumbnail">
                                <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
                                <button type="button" class="btn btn-outline-secondary btn-sm btn-block" data-toggle="modal" data-target="#exampleModal">
                                  Add foto
                                  </button>


                            </div>
                            <div class="media-body  mb-5 mt-4 text-dark">
                                <h4 class="mt-0 mb-0">{{ $user->name }}</h4>
                                <p class="small mb-4"> <i class="fas fa-map-marker-alt mr-2"></i>{{ $user->address }}</p>
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">215</h5><small class="text-muted"> <i
                                                class="fas fa-image mr-1"></i>Photos</small>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5 class="font-weight-bold mb-0 d-block">745</h5><small class="text-muted"> <i
                                                class="fas fa-heart mr-1"></i>Likes</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                        <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                    </div>
                    <div class="row">
                        @forelse ($foto as $item)
                            <div class="col-lg-6 mb-2 pr-lg-1"><img src="{{ $item->lokasi_file }}" alt=""
                                    class="img-fluid rounded shadow-sm"></div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page section end-->

   <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Judul Modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Isi modal akan ditampilkan di sini.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn btn-primary">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>


    <script src="https://kit.fontawesome.com/52c8909dfd.js" crossorigin="anonymous"></script>
    <!-- Skrip JavaScript untuk memanggil modal -->
    <script>
        $('#exampleModal').on('shown.bs.modal', function() {
            // Aksi yang diambil ketika modal ditampilkan
        });
    </script>
@endsection
