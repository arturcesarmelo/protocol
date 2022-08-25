@extends('layouts.app')

@section('content')
<style>
    .card {
        min-height: 150px
    }
</style>
<div class="row">
    <div class="col-6">
        <h2>
            <i class="bi bi-building"></i> {{$tenentment->identification}}
            <span class="badge bg-warning text-normal text-muted">
                <i class="bi bi-box"></i> {{$tenentment->packages->count()}} {{__('package.name')}}(s)
            </span>
            <span class="badge bg-warning text-normal text-muted">
                <i class="bi bi-people"></i> {{$tenentment->residents->count()}} {{__('resident.name')}}(s)
            </span>
        </h2>
        <p>{{$tenentment->building->name}}</p>
    </div>
</div>
<hr>

<div class="row">
    <div class="col">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 text-center" style="position: relative;">
                    <h1 style="position: absolute; margin: 40% 40%">{{ $tenentment->packages()->whereStatus('RECEIVED_BY_ADMINISTRATION')->count() }}</h1>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-captialized">{{ __('common.to_dispatch') }}</h5>
                        <p class="card-text">{{ __('common.to_dispatch_text') }}</p>
                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 text-center" style="position: relative;">
                    <h1 style="position: absolute; margin: 40% 40%">{{ $tenentment->packages()->whereStatus('DISPATCHED')->count() }}</h1>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-captialized">{{ __('common.dispatched') }}</h5>
                        <p class="card-text">{{ __('common.dispatched_text') }}</p>
                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4 text-center" style="position: relative;">
                    <h1 style="position: absolute; margin: 40% 40%">{{ $tenentment->packages()->whereStatus('DELIVERED')->whereNull('confirmed_at')->count() }}</h1>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-captialized">{{ __('common.pending_of_confirmation') }}</h5>
                        <p class="card-text">{{ __('common.pending_of_confirmation_text') }}</p>
                        {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h3><i class="bi bi-person"></i> {{__('resident.name')}}s</h3>
            </div>
            <div class="col text-end">
                <a href="{{route('resident_create', $tenentment->id)}}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> {{__('resident.name')}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('common.name')}}</th>
                            <th scope="col">{{__('common.phone')}}</th>
                            <th scope="col">{{__('common.email')}}</th>
                            <th scope="col">{{__('common.actions')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenentment->residents as $i => $resident)
                        <tr>
                            <th scope="row">{{($i+1)}}</th>
                            <td scope="col">
                                <i class="bi bi-person"></i> 
                                {{$resident->name}}
                            </td>
                            <td scope="col">
                                <i class="bi bi-phone"></i>
                                {{$resident->phone}}
                            </td>
                            <td scope="col">
                                <i class="bi bi-send"></i>
                                {{$resident->email}}
                            </td>
                            <td scope="col text-end">
                                <button class="btn btn-default btn-rounded">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <button class="btn btn-default btn-rounded">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h3><i class="bi bi-box"></i> {{__('package.name')}}s</h3>
            </div>
            <div class="col text-end">
                <a href="{{route('packages_create', $tenentment->id)}}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> {{__('package.name')}}
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('common.type')}}</th>
                            <th scope="col">status</th>
                            <th scope="col">{{__('common.delivered_at')}}</th>
                            <th scope="col">{{__('common.delivered_by')}}</th>
                            <th scope="col">{{__('common.deliver_to')}}</th>
                            <th scope="col">{{__('common.confirmed_by')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenentment->packages as $package)
                        <tr>
                            <th scope="row">
                                {{$package->identification}}
                            </th>
                            <td>
                                @if ($package->type === 'LETTER')
                                <i class="bi bi-envelope"></i> {{__('common.letter')}}
                                @else
                                <i class="bi bi-box"></i> {{__('common.package')}}
                                @endif
                            </td>
                            <td>
                                @switch($package->status)
                                    @case('RECEIVED_BY_ADMINISTRATION')
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-circle-fill"></i>
                                            Recebido
                                        </span>
                                        @break
                                    @case('DISPATCHED')
                                        <span class="badge bg-warning">
                                            <i class="bi bi-circle-fill blink text-info"></i>
                                            Dispatched
                                        </span>
                                        @break
                                    @case('DELIVERED')
                                        <span class="badge bg-info">
                                            <i class="bi bi-check-all"></i>
                                            Delivered
                                        </span>
                                        @break
                                    @case('CONFIRMED')
                                        <span class="badge bg-success">
                                            <i class="bi bi-chand-thumbs-up"></i>
                                            Confirmed
                                        </span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-circle-fill"></i>
                                            Recebido
                                        </span>
                                        @break
                                @endswitch
                            </td>
                            <td>
                                @if($package->delivered_at)
                                <i class="bi bi-calendar"></i> {{$package->delivered_at->format('d/m/Y')}} <i class="bi bi-clock"></i> {{$package->delivered_at->format('H:i:s')}}
                                @else
                                ---
                                @endif
                            </td>
                            <td>
                                <i class="bi bi-person"></i> John Doe
                            </td>
                            <td>
                                <i class="bi bi-person"></i> {{$package->resident->name}}
                            </td>
                            <td>
                                @if($package->receiver)
                                    <i class="bi bi-hand-thumbs-up"></i> 
                                    {{$package->receiver->name}}
                                @else
                                    ---
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection