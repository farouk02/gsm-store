@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Track') }}</div>

                <div class="card-body">
                    <form method="GET" action="{{ route('track') }}">


                        <div class="row mb-3">
                            <label for="track_number" class="col-md-4 col-form-label text-md-end">{{ __('Track number')
                                }}</label>

                            <div class="col-md-6">
                                <input id="track_number" type="text" class="form-control @error('track_number') is-invalid @enderror"
                                    name="track_number" value="{{ old('track_number') }}" required autofocus>

                                @error('track_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Track') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
