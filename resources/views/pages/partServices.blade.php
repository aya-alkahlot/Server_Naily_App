@extends('layouts.master')


@section('title')
   Part of Services
@endsection

@section('css')
@endsection

@section('content')
    <form action="{{ route('service.services.store') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Part Services</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input id="title" type="text" name="title"
                                                    class="form-control"placeholder="Title">
                                                @error('title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <select class="form-control" name="parent_id">
                                                    <option value="0">بدون قسم رئيسي</option>
                                                    @foreach($main_services as $main_service)
                                                        <option value="{{$main_service->id}} {{old('parent_id') == $main_service->id ? 'selected' : ''}}">{{$main_service->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>banner</label>
                                                <input id="banner" type="file" name="banner" class="form-control"
                                                    placeholder="banner">
                                                @error('banner')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Paragraph</label>
                                                <input id="Paragraph" type="text" name="Paragraph"
                                                    class="form-control"placeholder="Paragraph">
                                                @error('Paragraph')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
    </form>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
@endsection
