@extends('layouts.master')


@section('title')
    Edit Links
@endsection

@section('css')
@endsection

@section('content')
    <form action="{{ route('dashboard.link.Update', $link->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Update Link page</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input id="Title" type="text" name="Title"
                                                    value="{{ $link->Title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Text</label>
                                                <input id="Link" type="url" name="Link"
                                                    value="{{ $link->Link }}">
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/images/setting/' . $link->banner) }}" width="50"
                                        height="50">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input id="banner" type="file" name="banner"
                                                    value="{{ $link->banner }}">
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
