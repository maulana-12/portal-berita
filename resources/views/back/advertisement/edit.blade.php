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
                            <div class="card-title">Mengedit Data Iklan <strong>{{ $advertisement->title }}</strong></div>
                            <a href="{{ route('advertisement.index') }}" class="btn btn-secondary ml-auto btn-sm">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-body-row">
                            <form action="{{ route('advertisement.update',$advertisement->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">Judul Iklan</label>
                                    <input type="text" class="form-control" id="title"  name="title" value="{{ $advertisement->title }}">
                                </div> 
                                <div class="form-group">
                                    <label for="link">Link Iklan</label>
                                    <input type="text" class="form-control" id="link"  name="link" value="{{ $advertisement->link }}">
                                </div> 
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select type="file" class="form-control" id="status" name="status" value="{{ $advertisement->status }}">
                                        <option value="1" {{ $advertisement->status=='1' ? 'selected':'' }}>
                                            Publish
                                        </option>
                                        <option value="0" {{ $advertisement->status=='0' ? 'selected':'' }}>
                                            Draft
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar Iklan</label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ $advertisement->image }}">
                                    <br>
                                    <label for="imageNow">Gambar Saat Ini</label><br>
                                    @if ($advertisement->image)
                                        <img src="{{ asset('uploads/'.$advertisement->image) }}" width="100">
                                    @else
                                        Belum ada gambar
                                    @endif
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