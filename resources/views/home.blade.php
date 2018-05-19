@extends('layouts.master')

@section('content')
    @if( auth()->check() )
        <h4>Welcome, <strong>{{ auth()->user()->name }}</strong></h4>
    @endif
@endsection