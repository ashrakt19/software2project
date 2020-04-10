@extends('back-end.layout.app')
@php
$modulname="users";
$pagetitle = "Control " . $modulname ;
$pageDesc='Here you can add/edit/delete users';
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

    @component('back-end.shared.table' , ['pagetitle' => $pagetitle , 'pageDesc' => $pageDesc])
        @slot('addButton')
            <div class="col-md-4 text-right">
            <a href="{{route('users.create')}}" class="btn btn-white btn-round">
                        Add users
                    </a>
            </div>
        @endslot
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        email
                    </th>
                    <th>
                        group
                    </th>
                    <th class="text-right">
                        control
                    </th>
                </tr></thead>
                @foreach($users as $user) 
                             <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->group}}</td>
                          <td class="td-actions text-right">
                                <a href="{{ route('users.edit' , $user) }}" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit user">
                                    <i class="material-icons">edit</i>
                                </a>
                            <form action="{{route('users.destroy', $user)}}" method="POST">
                            {{csrf_field()}}
                            {{ method_field('delete') }}
                            <button type="submit" rel="tooltip" title="" class="btn btn-info"data-original-title="Remove">
                                <i class="material-icons">close</i>
                              </button>
                           </form>
                          </td> 
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->links() !!}
        </div>
    @endcomponent
@endsection