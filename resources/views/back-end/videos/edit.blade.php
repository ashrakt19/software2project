@extends('back-end.layout.app')

@php
$pagetitle ="Edit Posts ";
$pageDesc='Here you can Edit Posts';

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
                  <form action="{{route('videos.update', $user->id)}}" method="POST" enctype="multipart/form-data" >
                  {{ method_field('put') }}
                      @include('back-end.videos.form')
                    <button type="submit" class="btn btn-primary pull-right">Udate </button>
                    <div class="clearfix"></div>

                    </form>

                    @slot('md4')
                    @php
                      $url=getyoutubeid($user->youtube)
                    @endphp
                    @if($url)
                    <iframe width="400"  src="https://www.youtube.com/embed/{{$url}}" frameborder="0"  allowfullscreen></iframe><br/>
                       @endif
                       <img src="{{url('uploads/'.$user->image)}}" style="width: 400px;height:200px" />
                    @endslot

@endcomponent

@component('back-end.shared.edit' , ['pagetitle' => "comments" , 'pageDesc' => "here we can control comment"])

       @include('back-end.comments.index')

       @slot('md4')

                    @include('back-end.comments.create')
                    @endslot

       @endcomponent
@endsection
