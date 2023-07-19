@extends('layouts.master')


@section('title')
    Contact Us
@endsection

@section('css')
@endsection

@section('content')
    <form action="{{ route('admin.contact.insert') }}" method="post">
        @csrf
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Contact Us Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input id="FullName" type="text" name="FullName"
                                                    class="form-control"placeholder="Full Name">
                                                @error('FullName')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input id="Email" type="email" name="Email" class="form-control"
                                                    placeholder="Email">
                                                @error('Email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Massage</label>
                                                <textarea id="Massage" rows="5" name="Massage" class="form-control" placeholder="Here can be your description"
                                                    value="Mike">Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</textarea>
                                                @error('Massage')
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
