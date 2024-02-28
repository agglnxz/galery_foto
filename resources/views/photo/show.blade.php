@extends('layouts.main')
@section('content')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <!--Main layout-->
    <div class="mt-5 mb-5">
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-lg-10 col-md-8 col-sm-5 mb-4">
                <!--Section: Post data-mdb-->
                <section class="border-bottom mb-4">
                    <img src="{{ asset('storage/images/' . $foto->lokasi_file) }}"
                        class="img-fluid shadow-2-strong rounded mb-4"alt="" />
                    <br>

                    @auth
                        @if ($foto->isLike(Auth::user()->id))
                            <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                                @csrf
                                <button type="submit" style="background: none; border:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="red"
                                            d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                    </svg>
                                </button>
                                <span id="likeCount">{{ $foto->Like->count() }}</span>
                            </form>
                        @else
                            <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                                @csrf
                                <button type="submit" style="background: none; border:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                    </svg>
                                </button>
                                <span id="likeCount">{{ $foto->Like->count() }}</span>
                            </form>
                        @endif
                    @else
                        <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                            @csrf
                            <button type="button" style="background: none; border:none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                </svg>
                            </button>
                            <span id="likeCount">{{ $foto->Like->count() }}</span>
                        </form>
                    @endauth

                    <div class="row mt-4 mb-4">
                        <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
                            @if ($foto->user->poto_profil != null)
                                <img src="{{ asset('storage/images/' . $foto->user->poto_profil) }}"
                                    class="rounded shadow-1-strong me-2" height="35" alt="" loading="lazy" />
                            @else
                                <img src="{{ asset('img/profile_default.jpg') }}" class="rounded shadow-1-strong me-2"
                                    height="35" alt="" loading="lazy" />
                            @endif
                            <span> Published <u>{{ $foto->created_at }}</u> by</span>
                            <a href="" class="text-dark">{{ $foto->user->name }}</a>
                        </div>
                    </div>
                </section>
                <section>
                    <h5 class=" text-center fw-bold">deskripsi</h5>
                    <p>
                        {{ $foto->deskripsi }}
                    </p>
                </section>
                <section>
                    <p class="text-center"><strong>Comment</strong></p>

                    <form action="{{ route('comments', ['id' => $foto]) }}" method="POST">
                        @csrf
                        <!-- Message input -->
                        <div class="form-outline mb-4" data-mdb-input-init>
                            <textarea class="form-control" name="isi_komentar" id="form4Example3" rows="4"></textarea>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-outline-secondary btn-block mb-4" data-mdb-ripple-init>
                            kirim
                        </button>
                    </form>
                </section>
                <!--Section: Comments-->
                <section class="border-bottom mb-3">
                    <p class="text-center"><strong>Comments:{{ $foto->Comment->count() }}</strong></p>
                    @forelse ($foto->Comment as $item)
                        <!-- Comment -->
                        <div class="d-flex justify-content-start gap-3 mb-4">
                            <div class="media d-flex align-items-center">
                                @if ($item->User->poto_profil != null)
                                    <img src="{{ asset('storage/images/' . $item->User->poto_profil) }}" alt="..."
                                        width="100" height="100" class="roundedmb-2 img-thumbnail">
                                @else
                                    <img src="{{ asset('img/profile_default.jpg') }}" alt="..." width="100"
                                        height="100" class="rounded mb-2 img-thumbnail">
                                @endif
                            </div>
                            <div>
                                <p class="mb-0"><strong>{{ $item->user->name }}</strong></p>
                                <p class="mb-0 mx-1">{{ $item->isi_komentar }}</p>
                                @auth
                                @if (Auth::user()->id == $item->user->id)
                                  <!-- Ini adalah form untuk menghapus komentar -->
                                  <form id="deleteForm{{$item->id}}" action="{{ route('delete_comments', ['id' => $item->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Tombol untuk menghapus komentar -->
                                    <button type="button" onclick="confirmDelete({{$item->id}})" style="background: none; border:none">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zM9 17h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                        </svg>
                                    </button>
                                    <!-- Tombol untuk edit komentar -->
                                    <button type="button" style="background: none; border:none" data-bs-toggle="modal"
                                        data-bs-target="#edit{{ $item->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h8.925l-2 2H5v14h14v-6.95l2-2V19q0 .825-.587 1.413T19 21zm4-6v-4.25l9.175-9.175q.3-.3.675-.45t.75-.15q.4 0 .763.15t.662.45L22.425 3q.275.3.425.663T23 4.4q0 .375-.137.738t-.438.662L13.25 15zM21.025 4.4l-1.4-1.4zM11 13h1.4l5.8-5.8l-.7-.7l-.725-.7L11 11.575zm6.5-6.5l-.725-.7zl.7.7z" />
                                        </svg>
                                    </button>
                                </form>
                                    <!-- Modal edit profile-->
                                    <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah foto</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('edit_comments', ['id' => $item]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="komen" class="form-label">Komentar</label>
                                                            <textarea type="text" id="komen" name="isi_komentar" class="form-control">{{$item->isi_komentar}}</textarea>
                                                            @error('isi_komentar')
                                                                <small style="color: red">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">tutup</button>
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                @endif

                                @endauth

                            </div>
                        </div>
                    @empty
                <div>
            <div class="alert alert-danger" role="alert">
                Tidak ada data
            </div>
        </div>
    @endforelse

    </section>
    </div>
    <!--Grid column-->
    </div>
    <!--Grid row-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk menampilkan konfirmasi sebelum menghapus komentar
        function confirmDelete(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",

                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: "Apakah anda yakin menghapus komentar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya hapus!",
                cancelButtonText: "Tidak!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengonfirmasi penghapusan, kirimkan form
                    document.getElementById("deleteForm"+id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "aksi dibatalkan",
                        text: "Komentar anda tidak terhapus :)",
                        icon: "error"
                    });
                }
            });
        }
    </script>
@endsection
