@if(auth()->user())
            <form action="{{route('front.commentStore',['id'=>$video->id])}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Add Comment</label>
                            <textarea  class="form-control" name="comment" rows="4" > </textarea>
                        </div>
                            <button type="submit" class="btn">Add Comment</button>
                    </form>
   @endif