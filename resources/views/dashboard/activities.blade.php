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
                <div class="card">
                    <div class="card-body">
                        <div class="card-title ">
                            <div class="">
                                <h4>Activities Table</h4>

                            </div>

                            <!-- Button trigger modal ADD ACTIVITY -->

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                                ADD ACTIVITY
                            </button>

                        </div>
                        <div class="table">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Activity</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                @csrf
                                <tbody id="activity-order">
                                    @foreach ($activities as $activity => $key)
                                        <tr id="act-{{ $key->id }}">
                                            <th>{{ $key->order }} </th>
                                            <td>
                                                <div class="show-activity" style="display:block;">
                                                    {{ $key->activity }}
                                                </div>
                                                <form class="edit-activity" style="display:none;"
                                                    action="{{ route('activities.update', $key->id) }}" method="POST"
                                                    autocomplete="off">
                                                    @csrf
                                                    <div class="form-group row">
                                                        <div class="col-lg-9">
                                                            <input class="form-control" type="text" name="activity"
                                                                value="{{ $key->activity }}" placeholder="Activity name">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td>{{ $key->created_at }}</td>
                                            <td>{{ $key->updated_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <form class="col-lg-3"
                                                        action="{{ route('activities.destroy', $key->id) }}"
                                                        method="post">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <div class="col-lg-2">
                                                        <button data="{{ $key->id }}" type="button"
                                                            class="btn btn-primary edit-btn">
                                                            <i class="fa-solid fa-pen-to-square"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="card-title flex align-items-end justify-content-end row">

                            <div class="col-2">
                                <button class="btn btn-primary" onclick="window.location.reload()">
                                    {{ __('Save') }}
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal ADD ACTIVITY -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="{{ route('activities.store') }}" method="POST" autocomplete="off">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Add Activity</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label form-control-label">Add Activity</label>
                                <div class="col-lg-9">
                                    <input class="form-control" type="text" name="activity"
                                        value="{{ old('activity') }}" placeholder="Activity name" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>

        </script>

    </div>
@endsection
