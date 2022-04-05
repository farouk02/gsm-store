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
                <a href="{{ route('register') }}" class="btn btn-info float-right">Add User</a>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content p-3">
                            <div class="tab-pane active" id="in-progress">
                                <h5 class="mb-3">Users</h5>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">created at</th>
                                                <th scope="col">Updated at</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($users as $user => $key)
                                                <tr>
                                                    <th>{{ ++$i }} </th>
                                                    <th>{{ $key->name }} </th>
                                                    <td>{{ $key->email }}</td>
                                                    <td>{{ $key->role }}</td>
                                                    <td>{{ $key->updated_at }}</td>
                                                    <td>{{ $key->created_at }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <form class="col-lg-3"
                                                                action="{{ route('users.delete', $key->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button class="btn btn-danger" type="submit"><i
                                                                        class="fa-solid fa-trash"></i></button>
                                                            </form>
                                                            <form class="col-lg-3"
                                                                action="{{ route('users.restore', $key->id) }}"
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
