<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>detail photos</title>
    <!-- Favicon -->
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="shortcut icon" />

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<body>
    <!--Main layout-->
    <main class="mt-4 mb-5">
        <button class="my-4 mx-4" style="background:none;border:none;color:black" onclick="window.history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                <path fill="currentColor" d="m7.825 13l5.6 5.6L12 20l-8-8l8-8l1.425 1.4l-5.6 5.6H20v2z"/>
            </svg>
        </button>
        <div class="container">
            <!--Grid row-->
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 mb-4">
                    <!--Section: Post data-mdb-->
                    <section class="border-bottom mb-4">
                        <img src="{{ asset('storage/images/' . $foto->lokasi_file) }}"
                            class="img-fluid shadow-2-strong rounded mb-4"alt="" />
                        <br>

                        <form action="{{ route('like', ['id' => $foto]) }}" method="post">
                            @csrf
                            <button type="submit" style="background: none; border:none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m12 21l-1.45-1.3q-2.525-2.275-4.175-3.925T3.75 12.812Q2.775 11.5 2.388 10.4T2 8.15Q2 5.8 3.575 4.225T7.5 2.65q1.3 0 2.475.55T12 4.75q.85-1 2.025-1.55t2.475-.55q2.35 0 3.925 1.575T22 8.15q0 1.15-.387 2.25t-1.363 2.412q-.975 1.313-2.625 2.963T13.45 19.7z" />
                                </svg>
                            </button>
                            <span id="likeCount">{{ $foto->Like->count() }}</span>
                        </form>
                        <div class="row mt-4 mb-4">
                            <div class="col-lg-6 text-center text-lg-start mb-3 m-lg-0">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img (23).jpg"
                                    class="rounded shadow-1-strong me-2" height="35" alt="" loading="lazy" />

                                <span> Published <u>{{ $foto->created_at }}</u> by</span>
                                <a href="" class="text-dark">{{ $foto->user->name }}</a>

                            </div>


                        </div>
                    </section>
                    <!--Section: Post data-mdb-->

                    <!--Section: Text-->
                    <section>
                        <p>
                            {{ $foto->deskripsi }}
                        </p>
                    </section>
                    <!--Section: Text-->

                    <!--Section: Share buttons-->

                    <!--Section: Share buttons-->

                    <!--Section: Author-->

                    <!--Section: Author-->
                    <section>
                        <p class="text-center"><strong>Comment</strong></p>

                        <form action="{{ route('comments', ['id' => $foto]) }}" method="POST">
                            @csrf
                            <!-- Message input -->
                            <div class="form-outline mb-4" data-mdb-input-init>
                                <textarea class="form-control" name="isi_komentar" id="form4Example3" rows="4"></textarea>

                            </div>
                            <!-- Submit button -->
                            <button type="submit" class="btn btn-outline-secondary btn-block mb-4"
                                data-mdb-ripple-init>
                                kirim
                            </button>
                        </form>
                    </section>
                    <!--Section: Comments-->
                    <section class="border-bottom mb-3">
                        <p class="text-center"><strong>Comments:{{ $foto->Comment->count() }}</strong></p>
                        @forelse ($foto->Comment as $item)
                            <!-- Comment -->
                            <div class="row mb-4">
                                <div class="col-2">

                                    <?php $user = Auth::user(); ?>
                                    <div class="media d-flex align-items-center mb-4">
                                        @if (!empty($user->poto_profil))
                                            <img src="{{ asset('storage/images/' . $user->poto_profil) }}" alt="..."
                                                width="250" class="rounded mb-2 img-thumbnail">
                                        @else
                                            <img src="{{ asset('img/profile_default.jpg') }}" alt="..."
                                                width="250" class="rounded mb-2 img-thumbnail">
                                        @endif

                                    </div>

                                    <div class="col-10">
                                        <p class="mb-2"><strong>{{ $item->user->name }}</strong></p>
                                        <p>
                                            {{ $item->isi_komentar }}
                                        </p>
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




                    </section>
                    <!--Section: Comments-->

                    <!--Section: Reply-->

                    <!--Section: Reply-->
                </div>
                <!--Grid column-->


            </div>
            <!--Grid row-->
        </div>
    </main>
    <!--Main layout-->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>


</html>
