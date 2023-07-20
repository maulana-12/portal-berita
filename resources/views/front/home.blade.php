@extends('front.layouts.frontend')

@section('content')
  <div class="row">
    @forelse ($articles as $row)
      <div class="col-md-4 mt-3">
          <div class="card">
              <img src="{{ asset('uploads/'.$row->image) }}" class="card-img-top" alt="...">
              {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg> --}}
              <div class="card-body">
                <h5 class="card-title">{{ $row->title }}</h5>
                <p class="card-text">
                  {!! Str::limit($row->body, 210, '...')  !!}
                  {{-- {!! $row->body !!} --}}
                </p>
              </div>
              <div class="card-body">
                <a href="#" class="card-link">{{ $row->user->name }}</a>
                <a href="#" class="card-link">{{ $row->category->name }}</a>
              </div>
          </div>
      </div>
    @empty
      <div>
        Data artikel masih kosong
      </div>
    @endforelse
  </div>
@endsection