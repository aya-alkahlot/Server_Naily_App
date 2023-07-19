@extends('layouts.master')


@section('title')
    Edit About Us
@endsection

@section('css')
@endsection

@section('content')
    <form action="{{ route('aboutUs.about.Update', $about->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
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
                                                    value="{{ $about->Title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Text</label>
                                                <input id="Paragraph" type="text" name="Paragraph"
                                                    value="{{ $about->Paragraph }}">
                                            </div>
                                        </div>
                                    </div>
                                    <img src="{{ asset('assets/images/offers/' . $about->Logo) }}" width="50"
                                        height="50">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Logo</label>
                                                <input id="Logo" type="file" name="Logo"
                                                    value="{{ $about->Logo }}">

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
