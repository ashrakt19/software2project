@extends('back-end.layout.app')

@php 
$pagetitle =" create Posts";
$pageDesc='Here you can create Posts';

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
                  <form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data">
                      @include('back-end.videos.form')
                    <button type="submit" class="btn btn-primary pull-right">Add </button>
                    <div class="clearfix"></div>
                  </form>
              
        @endcomponent
@endsection
  
