@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" action="{{route('building_new')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-10">
                <h1>Buildings</h1>
            </div>
            <div class="col-2 text-end">
                <div class="clearfi">&nbsp;</div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{__('Save')}}
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="building-name" class="form-label">{{__('Building name')}}</label>
                    <input name="name" type="text" class="form-control" id="building-name" placeholder="Ex: Bloco A">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
