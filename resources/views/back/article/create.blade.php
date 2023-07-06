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
                            <div class="card-title">Menambahkan Data Artikel</div>
                            <a href="{{ route('article.index') }}" class="btn btn-secondary ml-auto btn-sm">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-row">
                            <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Judul Artikel</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Judul Artikel">
                                </div> 
                                <div class="form-group">
                                    <label for="body">Keterangan Artikel</label>
                                    <textarea type="text" class="form-control" id="body" name="body" placeholder="Masukan Keterangan Artikel"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select type="text" class="form-control" id="category_id" name="category_id" placeholder="Masukan Kategori">
                                        @foreach ($categories as $category)    
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar Artikel</label>
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Masukan Gambar Artikel">
                                </div> 
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select type="file" class="form-control" id="is_active" name="is_active" placeholder="Masukan Status">
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