@extends('layouts.master')


@section('title')
    About Us
@endsection

@section('css')
@endsection

@section('content')
    <form action="{{ route('aboutUs.about.add') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">About Us</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input id="Title" type="text" name="Title"
                                                    class="form-control"placeholder="Title">
                                                @error('Title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Text</label>
                                                <input id="Paragraph" type="text" name="Paragraph" class="form-control"
                                                    placeholder="Paragraph">
                                                @error('Paragraph')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input id="Logo" type="file" name="Logo" class="form-control"
                                                    placeholder="Logo">
                                                @error('Logo')
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
