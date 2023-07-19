@extends('layouts.master')


@section('title')
    Edit Services
@endsection

@section('css')
@endsection

@section('content')
    <form action="{{ route('service.services.Update', $service->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> Edit Services</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input id="title" type="text" name="title"
                                                    class="form-control"placeholder="Title"
                                                    value="{{$service->title}}">
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
                                    <img src="{{ asset('assets/images/services/' . $service->banner) }}" width="50"
                                    height="50">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input id="banner" type="file" name="banner"
                                                value="{{ $service->banner }}">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Text</label>
                                                <input id="Paragraph" type="text" name="Paragraph"
                                                    value="{{ $service->Paragraph }}">
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
