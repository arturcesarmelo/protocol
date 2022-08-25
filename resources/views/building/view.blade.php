@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-6">
        <h2>
            <i class="bi bi-building"></i> {{$building->name}}
            <span class="badge bg-warning text-normal text-primary"> <i class="bi bi-door-closed"></i> {{$building->tenentments->count()}}</span>
            <span class="badge bg-warning text-normal text-primary"> <i class="bi bi-people"></i> {{ $building->countOfResidents()}}</span>
        </h2>
    </div>
    <div class="col-6 text-end">
        <a href="{{route('tenentment_create', $building->id)}}" class="btn btn-primary">
            <i class="bi bi-plus"></i> {{__('tenentment.name')}}
        </a>
    </div>
</div>
<hr>
@if ($building->tenentments->count() === 0)
    <div class="alert alert-secondary text-center" role="alert">
        {{__('tenentment.none_was_found')}}
    </div>
@endif

@foreach ($building->tenentments as $tenentment)
    <a href="{{ route('tenentment_view', $tenentment->id) }}" class="text-decoration-none text-primary">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <h2><i class="bi bi-door-closed"></i></h2>
                    </div>
                    <div class="col-5">
                        <h2>{{$tenentment->identification}}</h2>
                        <p>
                            <i class="bi bi-people"></i> {{ $tenentment->residents->count() }} {{__('resident.name')}}(s) | 
                            <i class="bi bi-boxes"></i> {{ $tenentment->packages->count() }} {{__('package.name')}}(s)</p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <br>
@endforeach
@endsection