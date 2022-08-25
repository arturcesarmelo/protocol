@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" action="{{route('resident_store', $tenentment->id)}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-10">
                <h1><i class="bi bi-people"></i> Residents</h1>
            </div>
            <div class="col-2 text-end">
                <div class="clearfi">&nbsp;</div>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{__('Save')}}
                </button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="building-name" class="form-label">{{__('Resident name')}}</label>
                    <input name="name" type="text" class="form-control" id="resident-name" placeholder="Ex: John doe">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="building-name" class="form-label">{{__('Phone')}}</label>
                    <input name="phone" type="text" class="form-control" id="resident-phone" placeholder="+55 (82) 91234-5678">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="building-name" class="form-label">{{__('E-mail')}}</label>
                    <input name="email" type="email" class="form-control" id="resident-email" placeholder="example@email.com">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
