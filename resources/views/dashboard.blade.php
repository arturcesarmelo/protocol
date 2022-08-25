@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col">
        <h1>{{__('dashboard.name')}}</h1>
    </div>
    {{ __('dashboard.greetings') }}
</div>
@endsection
