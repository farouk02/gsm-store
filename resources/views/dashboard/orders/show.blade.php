@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @if (count($errors) > 0)
            <div class="col-lg-4">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
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
        <div class="col-md-8">
            <div class="card">
                <h5 class="card-header">Show order</h5>
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-4 col-form-label text-md-end">
                            traking number:
                        </div>
                        <div class="col-md-6 col-form-label ">

                            {{ $order->track_number }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 col-form-label text-md-end">
                            mobile:
                        </div>
                        <div class="col-md-6 col-form-label ">

                            {{ $order->mobile_type }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 col-form-label text-md-end">
                            description:
                        </div>
                        <div class="col-md-6 col-form-label ">

                            {{ $order->description }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 col-form-label text-md-end">

                            status:
                        </div>
                        <form class="col-md-6 col-form-label " action="{{ route('orders.upStatus', $order->id) }}"
                            method="post">
                            @csrf
                            <select name="activity_id">
                                @foreach ($activity as $activiti)
                                    <option value="{{ $activiti->id }}"
                                        {{ $order->activity_id == $activiti->id ? 'selected' : '' }}>
                                        {{ $activiti->activity }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </form>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 col-form-label text-md-end">
                            name:
                        </div>
                        <div class="col-md-6 col-form-label ">

                            {{ $order->name }}
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4 col-form-label text-md-end">
                            phone:
                        </div>
                        <div class="col-md-6 col-form-label ">
                            <a href="tel:{{ $order->phone_number }}">{{ $order->phone_number }}</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
