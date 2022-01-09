@push('after-styles')

<style>

    .kt-portlet{
        border-radius:5px;
    }

    .btn-label-success{
        background-image: linear-gradient(#e72b38, #e72b80);
        color:white!important;
        border:none;
    }

    .pagination{
        margin-bottom: 50px;
        display: flex;
        justify-content: center;
    }
    
    .btn{
        border-radius:5px;
        border:2px solid #F7F5F8;
        color:black;
        background-color:white;
    }

    body{
        background-color:white;
    }

    #mobile_search_function{
        display:none;
    }

    #desktop_layout{
        margin-top:-30px;
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
    
    @media screen and (max-width: 1024px){

        #verified_img_sm_camp{
            position:absolute; 
            height:12px; 
            width:12px; 
            margin-top:0px; 
            margin-left:2px;
            }

    }  

    @media screen and (min-width: 1024px){

        #verified_img_sm_camp{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:0px; 
            margin-left:5px;
            }
            
    }    

</style>

@endpush

<div class="kt-portlet">
    <div class="kt-portlet__body">
        <div class="kt-widget kt-widget--user-profile-3">
            <div class="kt-widget__top">
                
                 @if($user->avatar_location != '')
                        <div class="kt-widget__media kt-hidden-">
                            <a href="{{url('/social/'.$user->username)}}">
                                <img style="max-height:50px; max-width:50px; border-radius:25px; object-fit:cover;" src="{{asset('storage/'.$user->avatar_location)}}" alt="image">
                            </a>
                        </div>
                        @else
                        <div class="kt-widget__media kt-hidden-">
                            <a href="{{url('/social/'.$user->username)}}">
                                <img style="height:50px; width:50px; border-radius:25px;" src='/assets/media/icons/socialbuttons/user.png' alt="image">
                            </a>
                        </div>
                        @endif
                
                <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                    {{$user->first_name}}{{ $user->last_name}}
                </div>

                <div class="kt-widget__content">
                    <div class="kt-widget__head">
                        
                        <a href="{{url('/social/'.$user->username)}}" class="kt-widget__username" style="color:black; font-size:18px;">
                            {{$user->name}}
                        
                           @if($user->verified == 1)
                           
                           {{$user->name}}<img id="verified_img_sm_camp" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
         
                           @endif
                        
                        </a>

                        <div style="margin-left:-7px;" class="kt-widget__action">
                            <a href="{{ url('/social/'.$user->username) }}" class="btn  btn-label-success btn-sm btn-upper">{{__('applicazione.vedi_profilo')}}</a>&nbsp; 
                            <button type="button" {{$user->invitato ? 'disabled' : ''}} data-influencer="{{$user->uuid}}" class="btn btn-brand btn-sm richiesta btn-upper">{!!$user->invitato ? '<i class="flaticon2-check-mark"></i> ' .__('applicazione.richiesta_inviata') : __('applicazione.invia_richiesta')!!}</button>
                        </div>
                    </div>
                    <div class="kt-widget__subhead">
                       
                        <a href="#" style="color:black;">{{$user->profession}}</a>
                       <!-- <a href="#"><i class="flaticon2-placeholder"></i>{{$user->residenza_citta}}</a> -->
                    </div>

                    
                    <div class="kt-widget__info">
                        <div style="color:black;" class="kt-widget__desc">
                            {!! $user->bio !!}
                        </div>
                        {{--
                        <div class="kt-widget__progress">
                            <div class="kt-widget__text">
                                {{ __('applicazione.giudizi_positivi') }}
                            </div>
                           
                            <div class="progress" style="height: 5px;width: 100%;">
                                <div class="progress-bar kt-bg-success"
                                     role="progressbar" style="width: {{isset($user->recensione) ? $user->recensione * 10 : 0}}%;"
                                     aria-valuenow="{{isset($user->recensione) ? $user->recensione * 10 : 0}}" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                            <div class="kt-widget__stats">
                                
                                {{isset($user->recensione) ? round(($user->recensione*10),1).'%' : __('applicazione.nessuna_recensione')}}
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-widget__bottom" style="display: flex;justify-content: flex-start; flex-direction: row;flex-wrap: nowrap;">
                @if($campagna->tipologia == 'online')
                @php
                $canali = json_decode($campagna->canali);
                @endphp
                @foreach($canali as $canale)
                @if($user->$canale != '')
                    <div class = "kt-widget__item" style="margin:10px;">
                        <div class = "kt-widget__icon">
                            @if($canale == 'blog')
                              <i class = "fas fa-laptop"></i>
                            @elseif($canale == 'mailing_list')
                              <i class = "fa fa-envelope-open-text"></i>
                            @else
                            <i class = "fab fa-{{$canale}}"></i>
                            @endif
                        </div>
                        <div class = "kt-widget__details">
                           
                            
                            <span class = "kt-widget__value"><?php echo number_format($user->{$canale.'_follower'},0,',','.')  ?></span>
                            
                        </div>
                    </div>
                @endif
                @endforeach
                @else
                 @php
                $canali = json_decode($campagna->canali);
                @endphp
                @foreach($canali as $canale)
                @if($user->$canale != '')
                    <div class = "kt-widget__item">
                        <div class = "kt-widget__details">
                            <span class = "kt-widget__title">{{__('applicazione.'.$canale.'_follower')}}</span>
                            @switch($canale)
                            @case('giornale_tiratura')
                            @php $valore = $user->giornale_tiratura @endphp
                            @break
                            @case('negozio_metri')
                            @php $valore = $user->negozio_metri @endphp
                            @break
                            @case('eventi_numero')
                            @php $valore = $user->eventi_numero @endphp
                            @endswitch
                            <span class="kt-widget__value">{{$valore}}</span>
                            
                        </div>
                    </div>
                 @endif
                @endforeach
                @endif
                {{--
                 <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">{{$user->numero_campagne}} Campagne</span>
                                        <a href="#" class="kt-widget__value">{{__('applicazione.dal').' '.$user->created_at->formatLocalized('%d %B %Y')}}</a>
                                       
                                    </div>
                                </div>
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">{{$user->numero_recensioni}} recensioni</span>
                                        <a href="{{route('frontend.user.influencer.get',$user->uuid)}}" class="kt-widget__value">Vedi</a>
                                    </div>
                                </div>
                       
            </div>
            --}}
        </div>
    </div>
</div>

</br></br>