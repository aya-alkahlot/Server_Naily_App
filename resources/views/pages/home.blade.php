@extends('layouts.master')


@section('title')
   Home
@endsection

@section('css')
@endsection

@section('content')
    <form action="{{ route('home.content.insert') }}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Home</h4>
                            </div>
                            <div class="content">
                                <form>
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
