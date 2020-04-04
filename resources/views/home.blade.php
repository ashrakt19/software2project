@extends('back-end.layout.app')
@section('title')
 Home page
@endsection 
@push('css')
    <style>
        a{
            color:white !important;
        }
   </style>
@endpush
@section('content')
   @component('back-end.layout.header')
        @slot('nav_title')
          Home page
        @endslot
   @endcomponent
   <h1>Home Page</h1>
@endsection
@push('js')
    <script>
        alert('welcome');
        </script>
@endpush