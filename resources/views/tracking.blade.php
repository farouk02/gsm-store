@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Track') }}</div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">
                            {{ __('Track number') }} = {{ $track_number }}
                        </label>
                            <label class="col-md-4 col-form-label text-md-end">
                                {{ __('Status') }} = {{ $status }}
                            </label>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
