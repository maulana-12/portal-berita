@extends('front.layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-8 mt-4">
            <div>
                <img src="{{ asset('uploads/'.$article->image) }}" alt="" class="img-fluid">
            </div>
            <div class="detail-content mt-2 p-2">
                <div>
                    <a href="" class="badge text-bg-secondary text-decoration-none">
                        {{ $article->category->name }}
                    </a>
                    <a href="" class="badge text-bg-success text-decoration-none">
                        {{ $article->user->name }}
                    </a>
                </div>
                <h2>{{ $article->title }}</h2>
                <div>
                    {!! $article->body !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div>
                <h4>Iklan</h4>
                <hr>
                <a href="">
                    <img src="" alt="">
                </a>
            </div>

            <div>
                <h4 class="mt-4">Kategori</h4>
                <hr>
                <div class="d-flex flex-wrap justify-content-between">
                    <a href="" class="text-decoration-none">
                        <p>Nama Kategori</p>
                    </a>                
                    <p class="text-right"><span class="badge rounded-pill text-bg-dark">7</span></p>
                </div>
                <div class="d-flex flex-wrap justify-content-between">
                    <a href="" class="text-decoration-none">
                        <p>Nama Kategori</p>
                    </a>                
                    <p class="text-right"><span class="badge rounded-pill text-bg-dark">7</span></p>
                </div>
            </div>

            <div>
                <h4 class="mt-4">Artikel Terbaru</h4>
                <hr>
                <div>
                    <div class="d-flex mt-3">
                        <div class="flex-shrink-0">
                          {{-- <img src="..." alt="..."> --}}
                          <svg class="bd-placeholder-img" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e5e5e5"></rect><text x="50%" y="50%" fill="#999" dy=".3em">Image</text></svg>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          This is some content from a media component. You can replace this with any content and adjust it as needed.
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="flex-shrink-0">
                          {{-- <img src="..." alt="..."> --}}
                          <svg class="bd-placeholder-img" width="100" height="100" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e5e5e5"></rect><text x="50%" y="50%" fill="#999" dy=".3em">Image</text></svg>
                        </div>
                        <div class="flex-grow-1 ms-3">
                          This is some content from a media component. You can replace this with any content and adjust it as needed.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection