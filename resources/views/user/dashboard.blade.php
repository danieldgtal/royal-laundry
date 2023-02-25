@extends('layouts.app')
@if (Auth::check() && Auth::user()->user_type == '0')
    @section('content')
    @endsection
@else
    {{ Auth::logout() }}
    <script>
        window.location = "/login"
    </script>
@endif
