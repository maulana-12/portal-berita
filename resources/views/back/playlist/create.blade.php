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
                            <div class="card-title">Menambahkan Data Playlist</div>
                            <a href="{{ route('playlist.index') }}" class="btn btn-secondary ml-auto btn-sm">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-row">
                            <form action="{{ route('playlist.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Playlist Video</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Judul Playlist">
                                </div> 
                                <div class="form-group">
                                    <label for="description">Deskripsi Playlist</label>
                                    <textarea type="text" class="form-control" id="editor1" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar Artikel</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Masukan Gambar Artikel">
                                </div> 
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select type="text" class="form-control" id="is_active" name="is_active" placeholder="Masukan Status">
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
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