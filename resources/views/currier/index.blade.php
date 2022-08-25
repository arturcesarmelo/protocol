@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">
            <h1><i class="bi bi-send"></i> {{ __('currier.name') }} <span class="badge bg-warning text-primary">total: {{ count($buildings) }}</span></h1>
        </div>
        <div class="col-2 text-end">
            <div class="clearfi">&nbsp;</div>
            <a href="{{route('currier_create')}}" type="button" class="btn btn-primary">
                <i class="bi bi-plus"></i> {{__('currier.name')}}
            </a>
        </div>
    </div>
    
    <hr />
    
    @foreach ($curriers as $currier)
    <a href=""  class="text-decoration-none text-primary">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-1">
                        <h1><i class="bi bi-send"></i></h1>
                    </div>
                    <div class="col-5">
                        <h2>{{$currier->name}}</h2>
                        <p>
                            <i class="bi bi-door-closed"></i> {{$currier->tenentments->count()}} {{__('tenentment.name')}} |
                        </p>
                    </div>
                    <div class="col-6">
                        <ul class="list-group">
                            @foreach ($currier->tenentments as $tenentment)
                            <li class="list-group-item">{{$tenentment->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <br>
    @endforeach
</div>
@endsection
