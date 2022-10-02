@extends('layouts.main')

@section('content')
    <div class="">
        <detail-component article="{{ session('id') }}"></detail-component>
    </div>
@endsection