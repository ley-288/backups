<style>

    @media screen and (min-width: 1024px){
        #verified_img_sm_like{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:3px; 
            margin-left:5px;
            }
    }

     

    @media screen and (max-width: 1024px){
        #verified_img_sm_like{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:0px; 
            margin-left:2px;
            }
    }

    #loadOverlay{display: none;}
    
</style>

@if($post->getCommentCount() == 0)
    <div class="alert alert-danger" role="alert" style="margin: 10px;">Non c'e commenti!</div>
@else
    <p style="padding: 10px 10px 0 10px"><small>{{ $post->getCommentCount() }} @if($post->getCommentCount() > 1){{ 'Commenti' }}@else{{ 'Commento' }}@endif</small></p>
    <ul class="list-group">
        @foreach($post->comments()->limit(2000000)->with('user')->get() as $comment)
        <li style="border:1px solid transparent;" class="list-group-item">
            <a href="{{ url('/social/'.$comment->user->username) }}">
            @if($comment->user->avatar_location != '')
                <a href="{{ url('/social/'.$comment->user->username) }}">
                    <img class="media-object img-circle" style="margin-left:10px; max-height: 26px; max-width:26px; border-radius:13px;" src="{{asset('storage/'.$like->user->avatar_location)}}" alt="Immagine profilo">
                </a>
            @else
                <a href="{{ url('/social/'.$comment->user->username) }}">
                    <img class="media-object img-circle" style="margin-left:10px; max-height: 26px; max-width:26px; border-radius:13px;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                </a>
            @endif
              @if($comment->user->hasRole('brand') || $comment->user->company == 1){{ $comment->user->dettagli->azienda_nome }}@else{{ $comment->user->name }}@endif

                    @if($comment->user->verified == 1)
                        <img id="verified_img_sm_like" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                    @elseif($comment->user->gold == 1)
                        <img id="verified_img_sm_like" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                    @elseif($comment->user->staff == 1)
                        <img id="verified_img_sm_like" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                    @endif

                        
                    
                <small>{{ '@'.$comment->user->username }}</small>
            </a>
             <p style="margin-left:35px;">
             {{ $comment->comment }}
            </p>
            <div class="clearfix"></div>
        </li>
        @endforeach
    </ul>
@endif