{{-- CAMPAGNE OFFERS RECIEVED --}}

<style>

    .btn{
        border-radius:25px;
    }

    .btn-secondary{
        border:2px solid #F7F5F8;
        border-radius:5px;
        margin:5px;
        color: black;
    }

    #btn-concluded{
        color:black;
        display: flex;
        align-items: center;
    }

    #offer_panel{
        border-radius:15px;
        border:none;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
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

</style>

<div>

</br>

<div class="card-deck">                
    <div class="card" id="offer_panel">
        <div class="card-body">
            <h5 class="card-title">
            @if(isset($campagna))
                <div class="kt-widget__media">
                    @if($campagna->avatar_location)
                        <span class="kt-userpic kt-userpic--xl">
                            <img class="kt-widget3__img" style="height:40px; width:40px; border-radius:100%;" src="{{asset('storage/'.$campagna->avatar_location)}}" alt="">
                        </span>
                        {{--
                        @if($campagna->verified == 1)
                            <img id="verified_img_sm_campbox" src="{{url('/')}}/assets/media/icons/socialbuttons/octagonal_star.png?v=1.1" alt="Recensioni">
                        @elseif($campagna->staff == 1)
                            <img id="verified_img_sm_campbox" src="{{url('/')}}/assets/media/icons/socialbuttons/ssuper.png?v=1.1" alt="Recensioni">
                        @elseif($campagna->gold == 1)
                            <img id="verified_img_sm_campbox" src="{{url('/')}}/assets/media/icons/socialbuttons/s_gradient_gold.png?v=1.1" alt="Recensioni">
                        @endif
                        --}}
                    @else
                        <img class="kt-widget3__img" style="height:40px; width:40px; border-radius:100%;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="">
                    @endif
                </div>
            @endif
            </br>
            <h6 style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{{ $campagna->username }}</h6>
            
            <strong>{{Str::limit(strip_tags($campagna->titolo),30)}} </strong>
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
            {{--<strong>{{__('applicazione.fine_campagna_box')}} </strong> 
            <span style="border-radius:25px;" class="">{{date('d/m/Y',strtotime($campagna->data_fine))}}</span>
            </br>--}}
            </br>
            @if(isset($campagna->canali_view))                    
                @foreach($campagna->canali_view as $item)
                    <span class="" style="margin-right:10px; background-color:transparent;height:40px; width:40px;"><i class="{{$item['icon']}}"></i></span>                                            
                @endforeach 
            @endif  
            
            </p>
            <div style="display:flex;justify-content:center;">

    
            @if($campagna->active == 1)
                <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" class="btn btn-secondary">{{__('applicazione.guarda_campagna')}}</a>
                <a href="{{ url('/direct-messages/show/'. $campagna->user_id) }}" class="btn btn-secondary">Messagio</a>
            @else
                  <a href="#" class="btn btn-secondary" id="btn-concluded"><i id="fa-heart-o" style="color:red;" class="material-icons nav__icon" id="bookmark-o">error</i>Concluso</a>
            @endif
            </div>
        </div>
    </div>
</div>
</div>