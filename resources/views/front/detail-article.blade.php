@php
    use Illuminate\Support\Carbon;
@endphp

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
                <div style="font-size: 14px;
                color: #888;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);">
                    {{ Carbon::parse($article->created_at)->setTimezone('Asia/Jakarta')->isoFormat('dddd, D MMMM YYYY') }} | {{ Carbon::parse($article->created_at)->setTimezone('Asia/Jakarta')->format('H.i T') }}
                </div>
                <div style="text-align: justify;">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div>
                <h4>{{ $advertisementA->title }}</h4>
                <hr>
                <a href="{{ $advertisementA->link }}">
                    <img src="{{ asset('uploads/'.$advertisementA->image) }}" alt="" width="350">
                </a>
            </div>

            <div>
                <h4 class="mt-4">Kategori</h4>
                <hr>
                @foreach ($category as $cat)
                    <div class="d-flex flex-wrap justify-content-between">
                        <a href="" class="text-decoration-none">
                            <p>{{ $cat->name }}</p>
                        </a>                
                        <p class="text-right"><span class="badge rounded-pill text-bg-dark">{{ $cat->article->count() }}</span></p>
                    </div>
                @endforeach
            </div>

            <div>
                <h4 class="mt-4">Artikel Terbaru</h4>
                <hr>
                <div>
                    @foreach ($latestPost as $row)
                        <div class="d-flex mt-3">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('uploads/'.$row->image) }}" alt="..." width="100" height="100">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>{{ $row->title }}</h5>
                                <span class="badge rounded-pill text-bg-secondary">{{ $row->category->name }}</span>
                                <span class="badge rounded-pill text-bg-dark">
                                    {{ Carbon::parse($row->created_at)->setTimezone('Asia/Jakarta')->format('d-m-Y') }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection