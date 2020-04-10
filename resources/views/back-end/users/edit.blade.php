@extends('back-end.layout.app')

@php 
$pagetitle ="Edit User ";
$pageDesc='Here you can Edit user';

@endphp
@section('title')
{{$pagetitle}}
@endsection 

@section('content')

   @component('back-end.layout.header')
        @slot('nav_title')
            {{$pagetitle}}
        @endslot
   @endcomponent

   @component('back-end.shared.edit' , ['pagetitle' => $pagetitle , 'pageDesc' => $pageDesc])
                <div class="card-body">
                  <form action="{{route('users.update', $user->id)}}" method="POST">
                  {{ method_field('put') }}
                      @include('back-end.users.form')
                    <button type="submit" class="btn btn-primary pull-right">Udate </button>
                    <div class="clearfix"></div>
                    </form>
    @endcomponent
@endsection