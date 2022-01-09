
<style>

    .im_pro_edit{
        max-height:40px;
        max-width:40px;
        margin:5px;
    }

    #verified_img_sm_campbox{
            max-height:12px;
            max-width:12px;
            margin-top:-40px;
    }

    .card{
        width: 92vw;
        border:none;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        border-radius: calc(1rem - 1px);
        margin-bottom:50px;
    }

    .card h5{
        font-weight:bold;
    }

    .card-text{
        //border-bottom:1px solid #F7F5F8;
    }

    .modal-header{
        border-bottom:none;
    }

    .modal-footer{
        border-top:none;
    }

    .btn{
        color: black;
        border:none;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
    }

    .btn-secondary{
        color: black;
        border:none;
        border-radius:5px;
        box-shadow: none;
        display: flex;
        flex-wrap: nowrap;
        justify-content: center;
        border:2px solid #F7F5F8;
    }

    .save-box{
        display: flex;
        align-items: center;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: space-around;
    }

    @media screen and (min-width: 1024px) {

        .card-img-top {
        width: 100%;
        margin-left: 0px;
        height:33vh;
        object-fit:cover;
        border-top-left-radius: calc(1rem - 1px);
        border-top-right-radius: calc(1rem - 1px);
    }

    .card-body{
        height:45vh;
    }

        .card{
            max-width:30vw;
            margin-top:3vh;
            margin-right:30px !important;
            }

        .fa-facebook {
            content: url('/assets/media/icons/socialbuttons/facebook.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-twitter {
            content: url('/assets/media/icons/socialbuttons/twitter.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-instagram {
            content: url('/assets/media/icons/socialbuttons/instagram.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-youtube {
            content: url('/assets/media/icons/socialbuttons/youtube.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-linkedin {
            content: url('/assets/media/icons/socialbuttons/linkedin.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-tiktok {
            content: url('/assets/media/icons/socialbuttons/tiktok.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-pinterest {
            content: url('/assets/media/icons/socialbuttons/pinterest.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-twitch {
            content: url('/assets/media/icons/socialbuttons/twitch.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-snapchat {
            content: url('/assets/media/icons/socialbuttons/snapchat.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-reddit {
            content: url('/assets/media/icons/socialbuttons/reddit.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-tumblr {
            content: url('/assets/media/icons/socialbuttons/tumblr.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-myspace {
            content: url('/assets/media/icons/socialbuttons/myspace.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }

        .fa-laptop {
            content: url('/assets/media/icons/socialbuttons/laptop.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-envelope-open-text {
            content: url('/assets/media/icons/socialbuttons/envelope.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-users{
            content: url('/assets/media/icons/socialbuttons/event.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-desktop{
            content: url('/assets/media/icons/socialbuttons/envelope.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-newspaper{
            content: url('/assets/media/icons/socialbuttons/newspaper.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-store{
            content: url('/assets/media/icons/socialbuttons/shop.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }

        .kt-userpic--xl img {
            width: 40px !important;
            height: 40px !important;
            margin-left:0px; 
            border-radius: 50px;
            box-shadow: 4px 4px 4px 4px #F7F5F8;
            margin-bottom:10px;
        }

    }


    @media screen and (max-width: 1024px) {

        .card-img-top {
        width: 100%;
        margin-left: 0px;
        max-height:33vh;
        object-fit:cover;
        border-top-left-radius: calc(1rem - 1px);
        border-top-right-radius: calc(1rem - 1px);
    }
        
        .im_con{
            max-height: 26px;
            max-width: 26px;
            border-radius: 13px;
            margin-left:5px;
			margin-top:10px;
            }

         .kt-userpic--xl img {
            width: 40px !important;
            height: 40px !important;
            margin-left:0px;
            border-radius: 50px;
            box-shadow: 4px 4px 4px 4px #F7F5F8;
            margin-bottom:10px;
            }
    
        .fa-facebook {
            content: url('/assets/media/icons/socialbuttons/facebook.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-twitter {
            content: url('/assets/media/icons/socialbuttons/twitter.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-instagram {
            content: url('/assets/media/icons/socialbuttons/instagram.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-youtube {
            content: url('/assets/media/icons/socialbuttons/youtube.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-linkedin {
            content: url('/assets/media/icons/socialbuttons/linkedin.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-tiktok {
            content: url('/assets/media/icons/socialbuttons/tiktok.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-pinterest {
            content: url('/assets/media/icons/socialbuttons/pinterest.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-twitch {
            content: url('/assets/media/icons/socialbuttons/twitch.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-snapchat {
            content: url('/assets/media/icons/socialbuttons/snapchat.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-reddit {
            content: url('/assets/media/icons/socialbuttons/reddit.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-tumblr {
            content: url('/assets/media/icons/socialbuttons/tumblr.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-myspace {
            content: url('/assets/media/icons/socialbuttons/myspace.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        
        .fa-users{
            content: url('/assets/media/icons/socialbuttons/event.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }

        .fa-newspaper{
            content: url('/assets/media/icons/socialbuttons/newspaper.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }

        .fa-store{
            content: url('/assets/media/icons/socialbuttons/shop.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            
        .fa-laptop {
            font-size: 1.2em;
            color:black;
            }
        .fa-envelope-open-text {
            font-size: 1.2em;
            color:black;
            }

    }


</style>





           
    <div class="card" id="panel-post-{{ $campagna->id }}">
        <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}">
            <img class="card-img-top" src="https://spidergain.com/storage/posts/{{ $campagna->display_image }}" alt="Card image cap">
        </a>
        <div class="card-body">
            <h5 class="card-title" style="display: flex;justify-content: flex-start;align-items: center;">
            @if(isset($campagna->users))
                <div class="kt-widget__media">
                    @if($campagna->users->avatar_location)
                        <span class="kt-userpic kt-userpic--xl">
                            <img class="kt-widget3__img" src="{{asset('storage/'.$campagna->users->avatar_location)}}" alt="">
                        </span>
                        @if($campagna->users->verified == 1)
                            <img id="verified_img_sm_campbox" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                        @elseif($campagna->users->staff == 1)
                            <img id="verified_img_sm_campbox" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                        @elseif($campagna->users->gold == 1)
                            <img id="verified_img_sm_campbox" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                        @endif
                    @else
                        <img class="kt-widget3__img" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="">
                    @endif
                </div>
            @endif
            <div style="margin-left:10px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color:transparent; ">
                {{Str::limit(strip_tags($campagna->titolo),30)}} 
            </div>
            </h5>
            <p class="card-text">{{Str::limit(strip_tags($campagna->descrizione),80,'...')}}
            </br>
            </br>
            
          
            @if(!empty($campagna->durata) && !empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
            
                <strong>@lang('applicazione.budget'):
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                    - 
                @lang('applicazione.durata'):
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}           
                </strong> 
                </div> 
            </a>
            @endif
            @if(empty($campagna->durata) && !empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.budget'):</strong>
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                </div> 
            </a>
            @endif
            
            @if(!empty($campagna->durata) && empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.durata'):</strong>
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}
             </div> 
            </a>
            @endif 
              
            
             
            </br>
           
            </br>
            @if(isset($campagna->canali_view))  

                <div style="display:flex; justify-content:flex-start; max-width:85vw; height:10px; align-items: center; margin-left:2px;    margin-top: 5px;">                 
                @foreach($campagna->canali_view as $item)
                    <span style="background-color:transparent;height:40px; width:40px;"><i class="{{$item['icon']}}"></i></span>                                            
                @endforeach 
                </div>

            @endif  
            <hr>
            <div class="save-box">
             
            <button style=" background-color:white; border:none; box-shadow:none; color:black;" data-item="{{ $campagna->id }}" data-toggle="modal" data-target="#campagnaShareModal-{{ $campagna->id }}" class="tablink_b"><i class="material-icons nav__icon" id="ico_side" style="color:black;">share</i></button>

            
                <a href="javascript:;" onclick="saveCampagna({{ $campagna->id }})" class="save-text">
                    @if($campagna->checkSave($user->id))
                        <i id="fa-heart" style="color:black;" class="material-icons nav__icon" id="bookmark">bookmark</i>
                    @else 
                        <i id="fa-heart-o" style="color:black;" class="material-icons nav__icon" id="bookmark-o">bookmark_border</i>
                    @endif
                </a>
            
            
            </div>
           
            </p>
           
            
        </div>
    </div>

<!-- Modal -->
  <div class="modal fade"  id="campagnaShareModal-{{ $campagna->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">{{ $campagna->titolo }}</h4>
        </div>
        <div class="modal-body" style="display: flex;justify-content: center;align-items: center;align-content: center;flex-wrap: nowrap;flex-direction: column;">

           
                <img src="{{asset('storage/posts/'.$campagna->display_image)}}"  class="media-object img-circle" style="height: 80px; width:80px; border-radius:5px; object-fit:cover;"/>
           
            </br>
            <p> Condividi la campagna in altri Social!</p>
            </br>

          <div id="user_modal_links">
                <div style="display: flex;justify-content: center;flex-direction: row;flex-wrap: wrap; align-content: center; padding:10px;">
                    <a href="javascript:void(0)" onClick='copyText(this)'><p style="display:none; font-size:1px;">{{ $campagna->titolo }}</p><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/copylink.png"></a>
                    <a href="#"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(' {{asset('storage/posts/'.$campagna->display_image)}} '),'facebook-share-dialog','width=626,height=636'); return false; ismap"></a>
                    <a href="#"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png"  alt="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?;text=Check%20this%20out%20in%20my%20Spiderfeed!&amp;url={{asset('storage/posts/'.$campagna->display_image)}}','Twitter-dialog','width=626,height=436'); return false; ismap"></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{asset('storage/posts/'.$campagna->display_image)}}" target="_blank"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png"></a>
                    <a href="https://api.whatsapp.com/send?text={{asset('storage/posts/'.$campagna->display_image)}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png"  alt="Share on Whatsapp"></a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
