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
                            <div class="card-title">Mengedit Data Slide <strong>{{ $slide->title }}</strong></div>
                            <a href="{{ route('slide.index') }}" class="btn btn-secondary ml-auto btn-sm">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-row">
                            <form action="{{ route('slide.update',$slide->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Judul slide</label>
                                    <input type="text" class="form-control" id="title"  name="title" value="{{ $slide->title }}">
                                </div> 
                                <div class="form-group">
                                    <label for="link">Link slide</label>
                                    <input type="text" class="form-control" id="link"  name="link" value="{{ $slide->link }}">
                                </div> 
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select type="file" class="form-control" id="status" name="status" value="{{ $slide->status }}">
                                        <option value="1" {{ $slide->status=='1' ? 'selected':'' }}>
                                            Publish
                                        </option>
                                        <option value="0" {{ $slide->status=='0' ? 'selected':'' }}>
                                            Draft
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar slide</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ $slide->image }}">
                                    <br>
                                    <label for="imageNow">Gambar Saat Ini</label><br>
                                    <img src="{{ asset('uploads/'.$slide->image) }}" width="100">
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