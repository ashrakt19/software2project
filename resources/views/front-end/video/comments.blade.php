<div class="row" id="comments">
                <div class="col-md-12">
                <div class="card text-left">
                        <div class="card-header card-header-rose">
                        @php $comments = $video->comments @endphp
                       <h5>Comments ({{ count($comments) }})</h5>
                        </div>
                        <div class="card-body">
                        @foreach($video->comments as $comment)
                        <div class="row">
                        <div class="col-md-8">
                        <i class="nc-icon nc-chat-33"></i> :
                        <a href="{{ route('front.profile' , ['id' => $comment->user->id , 'slug' => slug($comment->user->name)]) }}">
                                {{ $comment->user->name }}
                            </a>
                        </div>
                        <div class="col-md-4 text-right">
                          <span>
                               <i class="nc-icon nc-calendar-60"></i> : {{$comment->created_at }}
                          </span>
                          </div>
                   </div>
                  <strong> <p style="color:firebrick ;font-size:20px">{{ $comment->comment }} </p></strong>


                  
                  @if(auth()->user())
                       @if((auth()->user()->group =='admin')||auth()->user()->id==$comment->user->id)

                         <a href="{{ route('front.commentsDelete' , ['id' => $comment->id]) }}" rel="tooltip" title=""  class="btn btn-white btn-link btn-sm" data-original-title="Remove Comment">
                              #Delete
                         </a>
                        @endif
                        @endif





                        @endforeach
                        </div>
                     </div>
                     </div>
                   </div>