@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-{{ session('type') }}" role="alert">
                {{ session('msg') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif


        <div class="row">
            <div class="col-lg-12">
                <a href="{{ route('orders.create') }}" class="btn btn-info float-right">Add Order</a>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content p-3">
                            <div class="tab-pane active" id="in-progress">
                                <h5 class="mb-3">Orders</h5>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col">Track Number</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">mobile</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Updated at</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($orders as $order => $key)
                                                <tr>
                                                    <th>{{ ++$i }} </th>
                                                    <th>{{ $key->name }} </th>
                                                    <td><a
                                                            href="tel:{{ $key->phone_number }}">{{ $key->phone_number }}</a>
                                                    </td>
                                                    <td>{{ $key->track_number }}</td>
                                                    <td>{{ $key->activity->activity }}</td>
                                                    <td>{{ $key->mobile_type }}</td>
                                                    <td>{{ $key->description }}</td>
                                                    <td>{{ $key->updated_at }}</td>
                                                    <td>
                                                        <div class="row">

                                                            <form class="col-lg-3"
                                                                action="{{ route('orders.delete', $key->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button class="btn btn-danger" type="submit"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                            <form class="col-lg-3"
                                                                action="{{ route('orders.restore', $key->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button class="btn btn-primary" type="submit"><i
                                                                        class="fa-solid fa-rotate-left"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        {{-- {{ $orders->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
