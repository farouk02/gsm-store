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
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Show order</h5>



                    <div class="row">
                        <div class="col-3">
                            traking number:
                        </div>
                        {{ $order->track_number }}
                    </div>
                    <div class="row">
                        <div class="col-3">
                            mobile:
                        </div>
                        {{ $order->mobile_type }}
                    </div>
                    <div class="row">
                        <div class="col-3">
                            description:
                        </div>
                        {{ $order->description }}
                    </div>
                    <div class="row">
                        <div class="col-3">

                            status:
                        </div>
                        <form class="col-5" action="{{ route('orders.upStatus', $order->id) }}" method="post">
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
                    <div class="row">
                        <div class="col-3">
                            name:
                        </div>
                        {{ $order->name }}
                    </div>
                    <div class="row">
                        <div class="col-3">
                            phone:
                        </div>
                        <div class="col-5">
                            <a href="tel:{{ $order->phone_number }}">{{ $order->phone_number }}</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
