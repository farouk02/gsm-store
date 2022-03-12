@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add order</h5>

                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="col-lg-12 col-form-label form-control-label">Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                        value="{{ old('name') }}" placeholder="Full Name">
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-lg-12 col-form-label form-control-label">Phone number</label>
                                    <input class="form-control @error('phone_number') is-invalid @enderror" type="text"
                                        name="phone_number" value="{{ old('phone_number') }}" placeholder="phone_number">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-lg-2 col-form-label form-control-label">Mobile type</label>
                                <div class="col-lg-3">
                                    <input class="form-control @error('mobile_type') is-invalid @enderror" type="text"
                                        name="mobile_type" value="{{ old('mobile_type') }}" placeholder="mobile_type">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-lg-2 col-form-label form-control-label">Description</label>
                                <div class="col-lg-3">
                                    <textarea class="form-control @error('description') is-invalid @enderror" type="text"
                                        name="description" value="{{ old('description') }}"
                                        placeholder="Description"></textarea>
                                </div>
                            </div>

                            <div class="form-group ">
                                @if (count($errors) > 0)
                                    <div class="col-lg-4">
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        <div class="alert-message row">
                                                            <span>{{ $error }}</span>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="col-lg-4">
                                        <div class="alert alert-success alert-dismissible" role="alert">
                                            <button type="button" class="close"
                                                data-dismiss="alert">&times;</button>
                                            <div class="alert-icon">
                                                <i class="icon-info"></i>
                                            </div>
                                            <div class="alert-message">
                                                <span><strong>Success!</strong> order was added successfuly.</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-1">
                                    <input type="submit" class="btn btn-info" value="Add">

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
