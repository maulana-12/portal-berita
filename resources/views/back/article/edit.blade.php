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
                            <div class="card-title">Mengedit Data Artikel <strong>{{ $article->title }}</strong></div>
                            <a href="{{ route('article.index') }}" class="btn btn-secondary ml-auto btn-sm">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-row">
                            <form action="{{ route('article.update',$article->id) }}" method="post"
                                    enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Judul Artikel</label>
                                    <input type="text" class="form-control" id="title"  name="title" value="{{ $article->title }}">
                                </div> 
                                <div class="form-group">
                                    <label for="body">Keterangan Artikel</label>
                                    <textarea type="text" class="form-control" id="editor1" name="body" >{{ $article->body }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select type="text" class="form-control" id="category_id" name="category_id" value="{{ $article->category_id }}">
                                        @foreach ($category as $row)    
                                        @if ($row->id==$article->category_id)
                                            <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                        @else
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <select type="file" class="form-control" id="is_active" name="is_active" value="{{ $article->is_active }}">
                                        <option value="1" {{ $article->is_active=='1' ? 'selected':'' }}>
                                            Publish
                                        </option>
                                        <option value="0" {{ $article->is_active=='0' ? 'selected':'' }}>
                                            Draft
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar Artikel</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ $article->image }}">
                                    <br>
                                    <label for="imageNow">Gambar Saat Ini</label><br>
                                    <img src="{{ asset('uploads/'.$article->image) }}" width="100">
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