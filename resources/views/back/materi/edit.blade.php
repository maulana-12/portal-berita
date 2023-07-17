@extends('layouts.default')

@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">

        <div class="row">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Mengedit Data Materi <strong>{{ $materi->title }}</strong></div>
                            <a href="{{ route('materi.index') }}" class="btn btn-secondary ml-auto btn-sm">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-row">
                            <form action="{{ route('materi.update',$materi->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Judul Materi</label>
                                    <input type="text" class="form-control" id="title"  name="title" value="{{ $materi->title }}">
                                </div> 
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea type="text" class="form-control" id="editor1" name="description" >{{ $materi->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar materi</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ $materi->image }}">
                                    <br>
                                    <label for="imageNow">Gambar Saat Ini</label><br>
                                    <img src="{{ asset('uploads/'.$materi->image) }}" width="100">
                                </div> 
                                <div class="form-group">
                                    <label for="link">Link Materi</label>
                                    <input type="text" class="form-control" id="link"  name="link" value="{{ $materi->link }}">
                                </div> 
                                <div class="form-group">
                                    <label for="playlist_id">Playlist</label>
                                    <select type="text" class="form-control" id="playlist_id" name="playlist_id" value="{{ $materi->playlist_id }}">
                                        @foreach ($playlists as $row)    
                                        @if ($row->id==$materi->playlist_id)
                                            <option value="{{ $row->id }}" selected>{{ $row->title }}</option>
                                        @else
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select type="file" class="form-control" id="is_active" name="is_active" value="{{ $materi->is_active }}">
                                        <option value="1" {{ $materi->is_active=='1' ? 'selected':'' }}>
                                            Publish
                                        </option>
                                        <option value="0" {{ $materi->is_active=='0' ? 'selected':'' }}>
                                            Draft
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-md">Simpan</button>
                                    <button type="reset" class="btn btn-danger btn-md">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection