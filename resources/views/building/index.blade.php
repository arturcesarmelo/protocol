@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1><i class="bi bi-building"></i> {{ __('building.name') }} <span class="badge bg-warning text-primary">total: {{ count($buildings) }}</span></h1>
        </div>
        <div class="col-2 text-end">
            <div class="clearfi">&nbsp;</div>
            <a href="{{route('building_create')}}" type="button" class="btn btn-primary">
                <i class="bi bi-plus"></i> {{__('New building')}}
            </a>
        </div>
    </div>
    
    <hr />
    
    @foreach ($buildings as $building)
    <a href="{{route('building_view', $building->id)}}"  class="text-decoration-none text-primary">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <h1><i class="bi bi-building"></i></h1>
                    </div>
                    <div class="col-11">
                        <h2>{{$building->name}}</h2>
                        <p>
                            <i class="bi bi-door-closed"></i> {{$building->tenentments->count()}} {{__('tenentment.name')}} |
                            <i class="bi bi-people"></i> {{ $building->countOfResidents() }} {{ __('resident.name') }} |
                            <i class="bi bi-boxes"></i> 0 {{ __('package.name') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <br>
    @endforeach
</div>
@endsection
