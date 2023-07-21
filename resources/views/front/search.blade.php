@php
    use Illuminate\Support\Carbon;
@endphp

@extends('front.layouts.frontend')

@section('content')
    <div class="row">
        <div class="col-lg-8 mt-4">

            <h2>Hasil Pencarian untuk "{{ $query }}"</h2>
            @if (count($articles) > 0)
                @foreach ($articles as $article)
                <div class="d-flex mt-3">
                    <div class="flex-shrink-0">
                        <img src="{{ asset('uploads/'.$article->image) }}" alt="..." width="100" height="100">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <a href="{{ route('detail-article',$article->slug) }}" class="text-decoration-none"><h5>{{ $article->title }}</h5></a>
                        <span class="badge rounded-pill text-bg-secondary">{{ $article->category->name }}</span>
                        <span class="badge rounded-pill text-bg-dark">
                            {{ Carbon::parse($article->created_at)->setTimezone('Asia/Jakarta')->format('d-m-Y') }}
                        </span>
                        <div style="text-align: justify;">
                            {!! Str::limit($article->body, 170, '...')  !!}
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p>Tidak ada berita yang sesuai dengan kata kunci pencarian.</p>
            @endif
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
                                <a href="{{ route('detail-article',$row->slug) }}" class="text-decoration-none">
                                    <h5>{{ $row->title }}</h5>
                                </a>
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