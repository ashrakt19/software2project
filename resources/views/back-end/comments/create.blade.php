<form action="{{route('comment.store')}}" method="POST" style=>
      {{csrf_field()}}
@include('back-end.comments.form')

 <input  type="hidden" value="{{$user->id}}" name="video_id"/>
<button type="submit" class="btn btn-primary pull-right">Add </button>
                    <div class="clearfix"></div>
</form>