@extends('back-end.layout.app')

@php 
$pagetitle =" create User";
$pageDesc='Here you can create user';

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

      @component('back-end.shared.create' , ['pagetitle' => $pagetitle , 'pageDesc' => $pageDesc])
                  <form action="{{route('users.store')}}" method="POST">
                      @include('back-end.users.form')
                    <button type="submit" class="btn btn-primary pull-right">Add </button>
                    <div class="clearfix"></div>
                  </form>
              
        @endcomponent
@endsection
  


 