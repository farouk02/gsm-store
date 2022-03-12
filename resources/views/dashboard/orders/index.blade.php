@extends('layouts.app')

@section('content')
    <div class="row -ml-3">
        <div class="col-lg-12">
            <a href="{{ route('orders.create') }}" class="btn btn-info float-right">Add Order</a>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#in-progress" data-toggle="pill"
                                class="nav-link active"><i class="icon-user"></i>
                                <span class="hidden-xs">In progress</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#checked-out" data-toggle="pill"
                                class="nav-link"><i class="icon-envelope-open"></i>
                                <span class="hidden-xs">Checked OUT</span></a>
                        </li>
                        @admin
                        <li class="nav-item">
                            <a href="javascript:void();" data-target="#trashed" data-toggle="pill" class="nav-link"><i
                                    class="icon-note"></i>
                                <span class="hidden-xs">Trashed</span></a>
                        </li>
                        @endAdmin
                    </ul>
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
                                                <td><a href="tel:{{ $key->phone_number }}">{{ $key->phone_number }}</a>
                                                </td>
                                                <td>{{ $key->track_number }}</td>
                                                <td>{{ $key->activity->activity }}</td>
                                                <td>{{ $key->mobile_type }}</td>
                                                <td>{{ $key->description }}</td>
                                                <td>{{ $key->updated_at }}</td>
                                                <td>
                                                    <form action="{{ route('orders.destroy', $key->id) }}" method="post">
                                                        @csrf
                                                        <input class="btn btn-danger" type="submit" value="delete">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="checked-out">
                            <h5 class="mb-3">Checked OUT</h5>

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
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($checked as $order => $key)
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
                                                    <form action="{{ route('orders.destroy', $key->id) }}" method="post">
                                                        @csrf
                                                        <input class="btn btn-danger" type="submit" value="delete">
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @admin
                        <div class="tab-pane" id="trashed">
                            <h5 class="mb-3">Trash</h5>

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
                                            <th scope="col">Deleted at</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($trashed as $order => $key)
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
                                                <td>{{ $key->deleted_at }}</td>
                                                <td>
                                                    <form action="{{ route('orders.delete', $key->id) }}" method="post">
                                                        @csrf
                                                        <input class="btn btn-danger" type="submit" value="delete">
                                                    </form>
                                                    <form action="{{ route('orders.restore', $key->id) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-success" type="submit">Restore</button>
                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endAdmin
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
