@push('after-scripts')
<script src="{{url('/')}}/assets/vendors/general/linkifyjs/jquery.linkify.min.js"></script>

<script>

$(".comment-linkify-{{ $comment->id }}").linkify();

</script>
@endpush

<style>

.commenter{
    display: flex;
    flex-wrap: nowrap;
    align-content: center;
    align-items: center;
}

.comment_to_reply{
    padding:10px; 
    margin:10px;
    background-color:aliceblue;
    border-radius:5px;
}

.reply_block{
    margin-left:50px;
    margin-right: 50px;
}

.reply_to_reply{
    padding:10px;
    background-color:#F7F5F8;
    border-radius:5px;
    padding:10px !important;
}

.replier{
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

#reply{
    padding:10px;
    color:black;
    border-radius:5px;
    border:none;
    background-color:#F7F5F8;
    box-shadow:none;
}

.reply_avatar{
    margin-left:5px;
    height:20px;
    width:20px;
    border-radius:10px;
    object-fit:cover;
}

.reply_username{
    font-size:12px;
    color:black;
}

.post-write-commento{
    z-index:1;
}

.btn-danger{
    border-radius:5px;
}
    
    .modal-header{
        border-bottom:none;
    }

    .btn-default{
        color:black;
        background-color:white;
        box-shadow:none;
        border-radius:5px;
        border:1px solid #F7F5F8;
    }

    @media screen and (min-width: 1024px){
        
        #iframe_comment{
            margin-left:0px;
            height:100%;
            width:100%;
            padding-top:5px;
            margin-top:0px;
            margin-bottom:0px;
        }

        #comment_like_count_number{
            margin-top:3px;
            color: #929292;
            font-size: 10px;
        }
        
        #verified_img_sm_com{
            position:absolute; 
            height:12px; 
            width:12px; 
            margin-top:1px; 
            margin-left:5px;
            }

        #comment_date_icon{
            margin-left:0px;
            margin-right: 10px;
            }
        
        #heart_position_comment{
            margin-left:44vw;
        }

        #comment_type_length{
            width:35vw;
        }
    }

    

    @media screen and (max-width: 1024px){

         #iframe_comment{
            margin-left:10px;
            height:90%;
            width:90%;
            padding-top:5px;
            margin-top:5px;
            margin-bottom:0px;
        }

        #comment_like_count_number{
            margin-top:3px;
            color: #929292;
            font-size: 10px;
        }

        #verified_img_sm_com{
            //position:absolute; 
            height:10px; 
            width:10px; 
            margin-top:-2px; 
            margin-left:2px;
            } 

        #comment_date_icon{
            margin-left:0px;
            margin-right: 10px;
            }

        #heart_position_comment{
            margin-left:88vw;
        }

        #comment_type_length{
            width:65vw;
        }
    }

    #loadOverlay{display: none;}
    
</style>


<div class="panel-default post-comment comment-linkify-{{ $comment->id }}" id="post-comment-{{ $comment->id }}">
    <div class="panel-body">
        <div class="pull-left">
            @if($comment->user->avatar_location != '')
                <a href="{{ url('/social/'.$comment->user->username) }}">
                    <img style="margin-left:5px; height:36px; width:36px; border-radius:18px; object-fit:cover;" class="media-object img-circle comment-profile-photo" src="{{asset('storage/'.$comment->user->avatar_location)}}" alt="Immagine profilo">
                </a>
                    @else                            
                <a href="{{ url('/social/'.$comment->user->username) }}">
                    <img style="margin-left:5px; max-height:36px; max-width:36px; border-radius:18px;"  class="media-object img-circle comment-profile-photo" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                </a>
            @endif
        </div>
        <div class="pull-left comment-info">

            <a href="{{ url('/social/'.$comment->user->username) }}" class="name" style="margin-bottom:10px;">@if($comment->user->hasRole('brand') || $comment->user->company == 1){{ $comment->user->dettagli->azienda_nome }}@else{{ $comment->user->name }}@endif</a>

                    @if($comment->user->verified == 1)
                        <img id="verified_img_sm_com" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                    @elseif($comment->user->gold == 1)
                        <img id="verified_img_sm_com" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                    @elseif($comment->user->staff == 1)
                        <img id="verified_img_sm_com" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                    @endif


            
            </br></br>
            <span id="comment_date_icon" class="date text-muted">{{ $comment->created_at->diffForHumans() }} </span>
            
            

            
            @if($post->user_id == Auth::id() || $comment->comment_user_id == Auth::id())
            <a href="javascript:;" class="remove pull-right">
                <p class="text-muted" id="comment_like_count_number" onclick="removeComment({{ $comment->id }}, {{ $post->id }})">@lang('applicazione.delete_comment')</p>
            </a>
            @endif

            <a href="javascript:;" class="all_likes pull-right">
                <p class="text-muted" id="comment_like_count_number" data-item="{{ $comment->id }}" data-toggle="modal" data-target="#replyModal-{{ $comment->id }}">@lang('applicazione.reply')</p>
            </a>

             <a href="javascript:;" class="all_likes pull-right" onclick="showCommentLikes({{ $comment->id }})">
                <p class="text-muted"  id="comment_like_count_number">{{ $comment->getCommentLikeCount() }} {{ 'Likes' }}&nbsp;&nbsp;&nbsp;</p>
            </a>


            <div class="clearfix"></div>
        </div>
        <br/>

                <div id="heart_position_comment" style="position:absolute;" class="pull-right">
                    <a href="javascript:;" onclick="likeComment({{ $comment->id }})" class="like-comment">
                        @if($comment->checkCommentLike($user->id))
                            <i style="color:#e72b38; font-size:12px;" id="heart_img" class="fa fa-heart"></i>
                        @else
                            <i style="color:#e72b38;  font-size:12px;" id="heart_img" class="fa fa-heart-o"></i>
                        @endif
                    </a>
                    
                </div>
                

        <p id="comment_type_length" style="margin-left:50px; margin-top:15px; margin-bottom:15px; background-color:aliceblue; border-radius:5px; padding:10px;">

        {{ $comment->comment }}


        </p>


        
        <div id="reply_block" class="reply_block">
        
        @foreach($comment->replies()->orderBY('id', 'DESC')->get() as $reply)
            <a href="{{ url('/social/'.$reply->user->username) }}">
            @if($reply->user->avatar_location != '')
            <img class="reply_avatar" src="{{asset('storage/'.$reply->user->avatar_location)}}">
            @else
            <img class="reply_avatar" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png">
            @endif
            </a>
            <p class="reply_username"><strong>{{ $reply->user->username }}</strong> - {{ $reply->created_at->diffForHumans() }} 
           
            </p>
            <p class="reply_to_reply">{{$reply->reply}}</p>
            
        @endforeach 

        </div>

    </div>
</div>



<div class="clearfix"></div>

<!-- Modal -->
    {{-- <div class="modal fade " id="likeListModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Likes</h5>
                </div>

                <div class="user_list">

                </div>
            </div>
        </div>
    </div> --}}


<!-- Modal -->
  <div class="modal fade" id="replyModal-{{ $comment->id }}" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">@lang('applicazione.delete_comment')<strong> {{ $comment->user->username }}</strong> </h4>
        </div>
        <div class="modal-body">
          <form id="form-reply-comment" action="/posts/comment/reply" method="POST" data-parsley-validate>
          @csrf
            <div class="commenter">
           @if($comment->user->avatar_location != '')
            <img style="height:40px; width:40px; border-radius:20px; object-fit:cover;" class="media-object img-circle comment-profile-photo" src="{{asset('storage/'.$comment->user->avatar_location)}}" alt="Immagine profilo">
            @else
            <img style="max-height:40px; max-width:40px; border-radius:20px;"  class="media-object img-circle comment-profile-photo" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
            @endif
            <p class="comment_to_reply">
            {{ $comment->comment }}
            </p>

            <input type="hidden" name="commentid" value="{{ $comment->id }}">
            </div>
            </br></br>
            <div class="replier">
            <textarea style="width:100%; border-radius:5px;" rows = '8' name="reply" id="reply" class="reply" placeholder="Reply to {{ $comment->user->username }}"></textarea>
            </br>
            @if($user->avatar_location != '')
            <img style="height:40px; width:40px; border-radius:20px; object-fit:cover;" class="media-object img-circle comment-profile-photo" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
            @else
            <img style="max-height:40px; max-width:40px; border-radius:20px;"  class="media-object img-circle comment-profile-photo" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
            @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" type="button" class="btn btn-default" id="new_modal_btn">@lang('applicazione.reply')</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      </form>
    </div>
  </div>



