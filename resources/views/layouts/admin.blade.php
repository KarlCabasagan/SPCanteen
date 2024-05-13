@extends('layouts.layout')

@section('content')
    @section('css', 'css/admin.css')
    @section('title', 'SPCanteen - Admin')
    <div class="container">
        @include('layouts.components.admin.admin_navbar')
        @yield('content1')
    </div>
@endsection