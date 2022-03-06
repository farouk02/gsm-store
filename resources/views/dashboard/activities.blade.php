@extends('layouts.trem')

@section('content')
    @foreach ($activities as $activity => $key)
        <li>{{ $key->order }} - {{ $key->activity }} - {{ $key->created_at }} -
            {{ $key->updated_at }}</li>
    @endforeach


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Responsive Table</h5>
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
                        <tbody>
                            @foreach ($activities as $activity => $key)
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $key->activity }}</td>
                                    <td>{{ $key->created_at }}</td>
                                    <td>{{ $key->updated_at }}</td>
                                    <td>{{ $key->deleted_at }}</td>
                                    <td>Cell</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="tab-content p-3">
                        <div class="tab-pane active">
                            <form>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" value="" placeholder="Street">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="text" value="" placeholder="City">
                                    </div>
                                    <div class="col-lg-3">
                                        <input class="form-control" type="text" value="" placeholder="State">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="button" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
