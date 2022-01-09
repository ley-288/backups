<style>

.modal-header{
    border-bottom:none;
}

#unordered_list_likes{
    align-items:flex-start;
}

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

@if($post->getLikeCount() == 0)
    <div class="alert alert-danger" role="alert" style="margin: 10px;">Non c'e Likes!</div>
@else
    <p style="padding: 10px 10px 0 10px; margin-left:20px;"><small>{{ $post->getLikeCount() }} @if($post->getLikeCount() > 1){{ 'Likes' }}@else{{ 'Like' }}@endif</small></p>
    <ul id="unordered_list_likes" class="list-group">
        @foreach($post->likes()->limit(2000000)->with('user')->get() as $like)
        <li style="border:1px solid transparent;" class="list-group-item">
            <a href="{{ url('/social/'.$like->user->username) }}">
            @if($like->user->avatar_location != '')
                <a href="{{ url('/social/'.$like->user->username) }}">
                    <img class="media-object img-circle" style="margin-left:10px; height: 26px; width:26px; border-radius:13px; object-fit:cover;" src="{{asset('storage/'.$like->user->avatar_location)}}" alt="Immagine profilo">
                </a>
            @else
                <a href="{{ url('/social/'.$like->user->username) }}">
                    <img class="media-object img-circle" style="margin-left:10px; height: 26px; width:26px; border-radius:13px; object-fit:cover;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                </a>
            @endif
           
            @if($like->user->hasRole('brand') || $like->user->company == 1){{ $like->user->dettagli->azienda_nome }}@else{{ $like->user->name }}@endif

                    @if($like->user->verified == 1)
                        <img id="verified_img_sm_like" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                    @elseif($like->user->gold == 1)
                        <img id="verified_img_sm_like" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                    @elseif($like->user->staff == 1)
                        <img id="verified_img_sm_like" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                    @endif

                        
                {{--<small>{{ '@'.$like->user->username }}</small>--}}
            </a>
            <div class="clearfix"></div>
        </li>
        @endforeach
    </ul>
@endif