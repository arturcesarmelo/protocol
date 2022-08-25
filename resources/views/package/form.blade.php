@extends('layouts.app')

@section('content')
<div class="container">
    <form class="form" action="{{route('packages_store', $tenentment->id)}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-10">
                <h1><i class="bi bi-box"></i> Packages</h1>
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
                    <label for="package-type" class="form-label">{{__('Package type:')}}</label>
                    <select class="form-select" name="type" id="package-type">
                        <option value="LETTER">
                            <i class="bi bi-letter"></i> Letter
                        </option>
                        <option value="PACKAGE">
                            <i class="bi bi-boxe"></i> Package
                        </option>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="package-type" class="form-label">{{__('Deliver to:')}}</label>
                    <select class="form-select" name="resident_id" id="package-resident-id">
                        @foreach ($tenentment->residents as $resident)
                        <option value="{{$resident->id}}">
                            <i class="bi bi-person"></i> {{$resident->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="package-description" class="form-label">Description</label>
                <textarea name="description" id="package-description" class="form-control" rows="3"></textarea>
            </div>
        </div>
    </form>
</div>
@endsection
