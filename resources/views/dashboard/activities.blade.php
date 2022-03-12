@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Activities Table</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER</th>
                                    <th scope="col">Activity</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Deleted at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            @csrf
                            <tbody id="activity-order">
                                @foreach ($activities as $activity => $key)
                                    <tr id="act-{{ $key->id }}">
                                        <th>{{ $key->order }} </th>
                                        <td>{{ $key->activity }}</td>
                                        <td>{{ $key->created_at }}</td>
                                        <td>{{ $key->updated_at }}</td>
                                        <td>{{ $key->deleted_at }}</td>
                                        <td>
                                            <form action="{{ route('activities.destroy', $key->id) }}" method="post">
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
            </div>


            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Activity</h5>

                    <form action="{{ route('activities.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label form-control-label">Add Activity</label>
                            <div class="col-lg-3">
                                <input class="form-control @error('activity') is-invalid @enderror" type="text"
                                    name="activity" value="{{ old('activity') }}" placeholder="Activity name">

                            </div>
                            <div class="col-lg-1">
                                <input type="submit" class="btn btn-info" value="Add">

                            </div>

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
                            @if (session('success'))
                                <div class="col-lg-4">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <div class="alert-icon">
                                            <i class="icon-info"></i>
                                        </div>
                                        <div class="alert-message">
                                            <span><strong>Success!</strong> Activity was added successfuly.</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
