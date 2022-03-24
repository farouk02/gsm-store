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
                                {{ __('Name') }} : {{ $order->name }}
                            </label>
                            <label class="col-md-4 col-form-label text-md-end">
                                {{ __('Phone') }} : {{ $order->phone_number }}
                            </label>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">
                                {{ __('Track number') }} : {{ $order->track_number }}
                            </label>
                            <label class="col-md-4 col-form-label text-md-end">
                                {{ __('Status') }} : {{ $order->activity->activity }}
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="fullwidth">
                    <div class="container separator">
                        <ul
                            class="progress-tracker progress-tracker--spaced progress-tracker--text progress-tracker--center {{-- progress-tracker--theme-red --}}">
                            @foreach ($activities as $activity)
                                <li
                                    class="progress-step
                                @if ($activity->order < $order->activity->order) is-complete
                                @elseif ($activity->order == $order->activity->order)
                                is-active @endif
                                ">
                                    <div class="progress-marker"></div>
                                    <div class="progress-text">
                                        <h4
                                            class="progress-title {{ $activity->order === $order->activity->order ? 'text-bold' : '' }}">
                                            {{ $activity->activity }}</h4>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
