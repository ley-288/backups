@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Social'))

@section('content')

@push('after-styles')

<style>

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content: center;
}

.row{
    padding:30px;
}

h4{
    text-align: center;
}


    .btn-success{
        border:1px solid white;
    }

    .btn-secondary{
        border:2px solid #F7F5F8;
        color:black;
    }

    .select2-container{font-size:1rem !important}

    .slim *, .slim-crop-area *, .slim-image-editor *, .slim-popover *{
        margin-left:0px;
    }

    .slim .slim-btn-group button {
        display:none;
    }

   .modal .modal-content {
        margin-top: 100px;
        border-radius: 15px;
    }

    .modal-header .close {
        margin-top: -2px;
        display: none;
    }

    iframe{
        display:block;
        pointer-events: none;
        margin-left:auto;
        margin-right:auto;
    }

    .im{  
        position: relative;    
        z-index: 1;       
    }

    .form-control{
        border-radius:5px;
        border:2px solid #F7F5F8;
        box-shadow:none;
    }

    .select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single {
        border: 1px solid #e2e5ec;
        border-radius:5px;
    }

    .input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:first-child>.btn-group:not(:first-child)>.btn, .input-group-btn:first-child>.btn:not(:first-child), .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group>.btn, .input-group-btn:last-child>.dropdown-toggle {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle), .input-group>.input-group-append:last-child>.input-group-text:not(:last-child), .input-group>.input-group-append:not(:last-child)>.btn, .input-group>.input-group-append:not(:last-child)>.input-group-text, .input-group>.input-group-prepend>.btn, .input-group>.input-group-prepend>.input-group-text {
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .input-group-text {
        border:1px solid white;
        background-color:transparent;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered .select2-selection__choice{
        border-radius:5px;
        color:black;
    }

    .btn{border-radius:5px;}

 .im_pro_edit{
            height:50px;
            width:50px;
            border-radius:25px;
            margin-right:10px;
            margin-left:5px; 
            margin-top:10px;
        }

        .fa-facebook-square {
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
        .fa-snapchat {
            content: url('/assets/media/icons/socialbuttons/snapchat.png');
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
        .fa-whatsapp {
            content: url('/assets/media/icons/socialbuttons/whatsapp.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-skype {
            content: url('/assets/media/icons/socialbuttons/skype2.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-quora {
            content: url('/assets/media/icons/socialbuttons/quora.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-weibo {
            content: url('/assets/media/icons/socialbuttons/weibo.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-strava {
            content: url('/assets/media/icons/socialbuttons/strava.png');
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
        .fa-myspace {
            content: url('/assets/media/icons/socialbuttons/myspace.png');
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
        .fa-tripadvisor {
            content: url('/assets/media/icons/socialbuttons/tripadvisor.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-airbnb {
            content: url('/assets/media/icons/socialbuttons/airbnb.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-website {
            content: url('/assets/media/icons/socialbuttons/website.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
         .fa-spotify {
            content: url('/assets/media/icons/socialbuttons/spotify.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-apple {
            content: url('/assets/media/icons/socialbuttons/apple_logo.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-music {
            content: url('/assets/media/icons/socialbuttons/apple_music2.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-xbox {
            content: url('/assets/media/icons/socialbuttons/xbox.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-playstation {
            content: url('/assets/media/icons/socialbuttons/playstation.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-amazon {
            content: url('/assets/media/icons/socialbuttons/amazon.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-ebay {
            content: url('/assets/media/icons/socialbuttons/ebay.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        
         .fa-subito {
            content: url('/assets/media/icons/socialbuttons/subito.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
         .fa-yelp {
            content: url('/assets/media/icons/socialbuttons/yelp.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
             .fa-evernote {
            content: url('/assets/media/icons/socialbuttons/evernote.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
             .fa-craigslist {
            content: url('/assets/media/icons/socialbuttons/craigslist.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
             .fa-zoom {
            content: url('/assets/media/icons/socialbuttons/zoom.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
             .fa-telegram {
            content: url('/assets/media/icons/socialbuttons/telegram.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
             .fa-udemy {
            content: url('/assets/media/icons/socialbuttons/udemy.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
             .fa-blogger {
            content: url('/assets/media/icons/socialbuttons/blogger.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
             .fa-discord {
            content: url('/assets/media/icons/socialbuttons/discord.png');
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
            content: url('/assets/media/icons/socialbuttons/event.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-users{
            content: url('/assets/media/icons/socialbuttons/user.png');
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
        .flaticon-like{
            content: url('/assets/media/icons/socialbuttons/user.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
        }
        .fa-user-friends{
            content: url('/assets/media/icons/socialbuttons/user.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
        }

        .im:hover{
            cursor: pointer;
        }

 @media screen and (max-width: 1024px) {

   #mobile_header_style{
        display:none;
      }

    #kt_body{
        //position:inherit;
        margin-top:-50px;
    }

    #write-message-btn{
            margin-top:-55px;
            margin-left:83vw;
        }

    #mobile_search_function{
        display:none;
    }

    body{
        //background-image: url(/assets/media/icons/angryimg-2.png);
        //background-repeat: repeat-x;
        background-color:white;
    }

    .card-title{
        font-size:12px;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        max-height:40px;
        max-width:40px;
    }

    .card h5{
        //width:50vw;
    }

    #color_white{
        color:white;
    }

    .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        //align-items: center;
        margin-top: -55px;
        //box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:10px;
    }

    .row_2{
        margin-top: -50px;
        display: flex;
        justify-content: center;
    }

    .row_3{
        display: flex;
        justify-content: center;
        margin-top: -20px;
    }

    .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    .card-deck{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card-deck .card {
        display: flex;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 20px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
        width:90vw;
        margin:10px;
    }

   

    .btn{
        display:flex;
        justify-content: flex-start;
        color:black;
        //width:80vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }
}

@media screen and (min-width: 1024px) {

    body{
        background-color:white;
    }

    .card{
        border:none;
        background-color:transparent;
        color:black;
        margin-top:20vh;
    }

    .card-title{
        font-size:14px;
    }

    #color_white{
        margin-left:-40px;
    }

    .card h5{
        width:50vw;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        max-height:50px;
        max-width:50px;
    }

    .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: -55px;
        box-shadow: 0 4px 2px -2px #F7F5F8;
        padding-bottom:20px;
    }

    .row_2{
        margin-top: -50px;
        display: flex;
        justify-content: center;
    }

    .row_3{
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    .card-deck .card {
        display: flex;
        margin: 10px;
        width: 30vw;
        height: 30vh;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
    }

    .card-deck {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        margin-top:10px;
    }

    .btn-block{
        display:flex;
        justify-content: flex-start;
        margin-left:15vw;
        color:black;
        width:30vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }

}

</style>
@endpush

<div>
    <div class="row_1">
        <div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{ URL::previous() }}">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            @lang('Social')
          
        </div>
        <div>
            <i style="visibility:hidden; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;font-size:30px;" class="material-icons nav__icon">public</i>
        </div>
    </div>
    </br>
    <div class="new_row">
        @if($user->avatar_location != '')
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
         @else
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
        @endif
        </br>
        {{--<p style="font-size:20px; text-align:center; color:black;" class="card-text">Social + Contact</p>--}}
        
        
        <p style="font-size:12px; text-align:center; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text">Modifica i tuoi Social e Connections</p>
        
        
    </div>
    
    <div class="row_3">
        <div>
       
        <form action="{{ isset($dettagli) ? route('frontend.user.social.update') : route('frontend.user.social.store') }}" method="POST" class="kt-form" id="kt_form" style="padding: 30px;" enctype="multipart/form-data">
                            @csrf
                            @if(isset($dettagli))
                            @method('PUT')
                            @endif
            </br>
            <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                     <h4>Social</h4>
                                        <div id="facBlock" style="display:none;">
                                            <div class="row">
                                                <div class="form-group col-xl-8">
                                                    <label>@lang('Facebook')</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="facebook"><i class="fab fa-facebook-square kt-font-brand"></i></span>
                                                        </div>
                                                        <input type="text" name="facebook"  class="form-control  url" placeholder="https://www.facebook.com..." aria-describedby="linkedin" value="{{isset($dettagli)?$dettagli->facebook:''}}">
                                                    </div>
                                                    <span class="form-text text-muted">@lang('applicazione.facebook_descrizione')</span>
                                                </div>
                                                <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="facebook_follower"><i class="flaticon-like kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="facebook_follower" data-sometimes="facebook" class="form-control numeric" placeholder="" aria-describedby="facebook_follower" value="{{isset($dettagli)?$dettagli->facebook_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                    </div>
                                    <div id="instBlock"  style="display:none;">
                                        <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Instagram')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="instagram"><i class="fab fa-instagram kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="instagram"  class="form-control url" placeholder="https://www.instagram.com..." aria-describedby="instagram" value="{{isset($dettagli)?$dettagli->instagram:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.instagram_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="instagram_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="instagram_follower" data-sometimes="instagram" class="form-control numeric" placeholder="" aria-describedby="instagram_follower" value="{{isset($dettagli)?$dettagli->instagram_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div> 
                                        </div>
                                        </div>
                                        <div id="youBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Youtube')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="youtube"><i class="fab fa-youtube kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="youtube" class="form-control primary url" placeholder="https://youtube.com/channel/iltuocanale" aria-describedby="youtube" value="{{isset($dettagli)?$dettagli->youtube:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.youtube_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('applicazione.iscritti')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="youtube_iscritti"><i class="fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="youtube_follower" data-sometimes="twitter" class="form-control numeric" placeholder="" aria-describedby="youtube_follower" value="{{isset($dettagli)?$dettagli->youtube_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_inscritti')</span>
                                            </div>  
                                        </div>
                                    </div>  
                                    <div id="tikBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('TikTok')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="tiktok"><i class="fab fa-tiktok kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="tiktok" class="form-control primary url" placeholder="https://www.tiktok.com..." aria-describedby="tiktok" value="{{isset($dettagli)?$dettagli->tiktok:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.tiktok_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="tiktok_iscritti"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="tiktok_follower" data-sometimes="tiktok" class="form-control numeric" placeholder="" aria-describedby="tiktok_follower" value="{{isset($dettagli)?$dettagli->tiktok_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="twiBlock"  style="display:none;">                               
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Twitter')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="twitter"><i class="fab fa-twitter kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="twitter"  class="form-control primary url" placeholder="https://www.twitter.com..." aria-describedby="twitter" value="{{isset($dettagli)?$dettagli->twitter:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.twitter_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="twitter_follower"><i class="fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="twitter_follower" data-sometimes="twitter" class="form-control numeric" placeholder="" aria-describedby="twitter_follower" value="{{isset($dettagli)?$dettagli->twitter_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="pinBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Pinterest')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="pinterest"><i class="fab fa-pinterest kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="pinterest"  class="form-control primary url" placeholder="https://www.pinterest.com..." aria-describedby="pinterest" value="{{isset($dettagli)?$dettagli->pinterest:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.pinterest_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="pinterest_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="pinterest_follower" data-sometimes="pinterest" class="form-control numeric" placeholder="" aria-describedby="pinterest_follower" value="{{isset($dettagli)?$dettagli->pinterest_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="snapBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Snapchat')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="snapchat"><i class="fab fa-snapchat kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="snapchat"  class="form-control primary url" placeholder="https://www.snapchat.com/add/..." aria-describedby="snapchat" value="{{isset($dettagli)?$dettagli->snapchat:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.snapchat_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="snapchat_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="snapchat_follower" data-sometimes="snapchat" class="form-control numeric" placeholder="" aria-describedby="snapchat_follower" value="{{isset($dettagli)?$dettagli->snapchat_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="twitchBlock"  style="display:none;">
                                         <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Twitch')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="twitch"><i class="fab fa-twitch kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="twitch"  class="form-control primary url" placeholder="https://www.twitch.com..." aria-describedby="twitch" value="{{isset($dettagli)?$dettagli->twitch:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.twitch_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="twitch_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="twitch_follower" data-sometimes="twitch" class="form-control numeric" placeholder="" aria-describedby="twitch_follower" value="{{isset($dettagli)?$dettagli->twitch_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="redBlock"  style="display:none;">
                                         <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Reddit')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="reddit"><i class="fab fa-reddit kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="reddit" class="form-control primary url" placeholder="https://www.reddit.com..." aria-describedby="reddit" value="{{isset($dettagli)?$dettagli->reddit:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.reddit_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Karma')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="reddit_karma"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="reddit_karma" data-sometimes="reddit" class="form-control numeric" placeholder="" aria-describedby="reddit_karma" value="{{isset($dettagli)?$dettagli->reddit_karma:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_karma')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="tumBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Tumblr')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="tumblr"><i class="fab fa-tumblr kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="tumblr"  class="form-control primary url" placeholder="https://www.tumblr.com..." aria-describedby="tumblr" value="{{isset($dettagli)?$dettagli->tumblr:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.tumblr_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="tumblr_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="tumblr_follower" data-sometimes="tumblr" class="form-control numeric" placeholder="" aria-describedby="tumblr_follower" value="{{isset($dettagli)?$dettagli->tumblr_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="myspBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Myspace')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="myspace"><i class="fab fa-myspace kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="myspace"  class="form-control primary url" placeholder="https://www.myspace.com..." aria-describedby="myspace" value="{{isset($dettagli)?$dettagli->myspace:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.myspace_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Connections')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="myspace_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="myspace_follower" data-sometimes="myspace" class="form-control numeric" placeholder="" aria-describedby="myspace_follower" value="{{isset($dettagli)?$dettagli->myspace_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_connections')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="linBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>

                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('LinkedIn')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="linkedin"><i class="fab fa-linkedin kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="linkedin"  class="form-control primary url" placeholder="https://www.linkedin.com..." aria-describedby="linkedin" value="{{isset($dettagli)?$dettagli->linkedin:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.linkedin_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="linkedin_iscritti"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="linkedin_follower" data-sometimes="linkedin" class="form-control numeric" placeholder="" aria-describedby="linkedin_follower" value="{{isset($dettagli)?$dettagli->linkedin_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="quoraBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>

                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Quora')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="quora"><i class="fab fa-quora kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="quora"  class="form-control primary url" placeholder="https://www.quora.com..." aria-describedby="quora" value="{{isset($dettagli)?$dettagli->quora:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.quora_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="quora_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="quora_follower" data-sometimes="quora" class="form-control numeric" placeholder="" aria-describedby="quora_follower" value="{{isset($dettagli)?$dettagli->quora_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>  
                                    <div id="weiboBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>

                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Weibo')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="weibo"><i class="fab fa-weibo kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="weibo"  class="form-control primary url" placeholder="https://www.weibo.com..." aria-describedby="weibo" value="{{isset($dettagli)?$dettagli->weibo:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.weibo_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="weibo_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="weibo_follower" data-sometimes="weibo" class="form-control numeric" placeholder="" aria-describedby="weibo_follower" value="{{isset($dettagli)?$dettagli->weibo_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="stravaBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>

                                         <div class="row">
                                            <div class="form-group col-xl-8">
                                                <label>@lang('Strava')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="strava"><i class="fab fa-strava kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="strava"  class="form-control primary url" placeholder="https://www.strava.com..." aria-describedby="strava" value="{{isset($dettagli)?$dettagli->strava:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.strava_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">
                                                <label>@lang('Follower')</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="strava_follower"><i class="fa fa-user-friends kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="strava_follower" data-sometimes="strava" class="form-control numeric" placeholder="" aria-describedby="strava_follower" value="{{isset($dettagli)?$dettagli->strava_follower:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.inserisci_qui_il_numero_attuale_dei_tuoi_follower')</span>
                                            </div>  
                                        </div>
                                    </div>                                                   
                                    
                                 
                                    <div style="display: flex;justify-content: center;flex-direction: row;flex-wrap: wrap; align-content: center; padding:10px;">
                                      <div onclick="myFacBlock()"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Facebook"></div>
                                      <div onclick="myInstBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/instagram.png" alt="Facebook"></div>
                                      <div onclick="myYouBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube.png" alt="Facebook"></div>
                                      <div onclick="myTikBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/tiktok.png" alt="Facebook"></div>
                                      <div onclick="myTwiBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png" alt="Facebook"></div>
                                      <div onclick="myPinBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/pinterest.png" alt="Facebook"></div>
                                      <div onclick="mySnapBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/snapchat.png" alt="Facebook"></div>
                                      <div onclick="myTwitchBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/twitch.png" alt="Facebook"></div>
                                      <div onclick="myRedBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/reddit.png" alt="Facebook"></div>
                                      <div onclick="myTumBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/tumblr.png" alt="Facebook"></div>
                                      <div onclick="myMyspBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/myspace.png" alt="Facebook"></div>
                                      <div onclick="myLinBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png" alt="Facebook"></div>
                                      <div onclick="myQuoraBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/quora.png" alt="Facebook"></div>
                                      <div onclick="myStravaBlock()"><img  class="im_pro_edit" style="box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/strava.png" alt="Facebook"></div>
                                      <div onclick="myWeiboBlock()"><img  class="im_pro_edit"  style="box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/weibo.png" alt="Facebook"></div>
                                     
                                     
                                    </div>   
                                </div>
                                
                                <hr>
                                
                                <h4>Connections</h4>
                                <div id="whatBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Whatsapp')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="whatsapp"><i class="fab fa-whatsapp kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="tel" name="whatsapp" class="form-control" placeholder="" aria-describedby="whatsapp" value="{{isset($dettagli)?$dettagli->whatsapp:''}}">
                                                </div>
                                                <span class="form-text text-muted">@lang('applicazione.whatsapp_descrizione')</span>
                                            </div>
                                            <div class="form-group col-xl-4">   
                                            </div>  
                                        </div>
                                    </div>
                                    <div id="skyBlock"  style="display:none;">
                                         <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Skype')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="skype"><i class="fab fa-skype kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="skype" class="form-control" placeholder="https://join.skype.com/invite/" aria-describedby="skype" value="{{isset($dettagli)?$dettagli->skype:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.skype_descrizione')</span>  
                                            </div>
                                        </div>
                                    </div>
                                     <div id="zoomBlock"  style="display:none;">
                                         <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Zoom')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="zoom"><i class="fab fa-zoom kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="zoom" class="form-control" placeholder="https://us04web.zoom.us/" aria-describedby="zoom" value="{{isset($dettagli)?$dettagli->zoom:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.zoom_descrizione')</span>  
                                            </div>
                                        </div>
                                    </div>
                                     <div id="telegramBlock"  style="display:none;">
                                         <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Telegram')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="telegram"><i class="fab fa-telegram kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="telegram" class="form-control" placeholder="https://www.telegram.com/" aria-describedby="telegram" value="{{isset($dettagli)?$dettagli->telegram:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.telegram_descrizione')</span>  
                                            </div>
                                        </div>
                                    </div>
                                     <div id="discordBlock"  style="display:none;">
                                         <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Discord')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="discord"><i class="fab fa-discord kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="discord" class="form-control" placeholder="https://www.dicord.com/" aria-describedby="discord" value="{{isset($dettagli)?$dettagli->discord:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.discord_descrizione')</span>  
                                            </div>
                                        </div>
                                    </div>
                                    <div id="tripBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Tripadvisor')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="tripadvisor"><i class="fab fa-tripadvisor kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="tripadvisor" class="form-control" placeholder="https://www.tripadvisor.com" aria-describedby="tripadvisor" value="{{isset($dettagli)?$dettagli->tripadvisor:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.tripadvisor_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                     <div id="amazonBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Amazon')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="amazon"><i class="fab fa-amazon kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="amazon" class="form-control" placeholder="https://www.amazon.com" aria-describedby="amazon" value="{{isset($dettagli)?$dettagli->amazon:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.amazon_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="ebayBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('eBay')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="ebay"><i class="fab fa-ebay kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="ebay" class="form-control" placeholder="https://www.ebay.com" aria-describedby="ebay" value="{{isset($dettagli)?$dettagli->ebay:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.ebay_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="subitoBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Subito')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="subito"><i class="fab fa-subito kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="subito" class="form-control" placeholder="https://www.subito.it/" aria-describedby="subito" value="{{isset($dettagli)?$dettagli->subito:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.subito_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="craigslistBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Craigslist')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="craigslist"><i class="fab fa-craigslist kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="craigslist" class="form-control" placeholder="https://www.craigslist/" aria-describedby="craigslist" value="{{isset($dettagli)?$dettagli->craigslist:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.craigslist_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="appleBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Apple')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="apple"><i class="fab fa-apple kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="apple" class="form-control" placeholder="Apple ID" aria-describedby="apple" value="{{isset($dettagli)?$dettagli->apple:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.apple_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="appleMusicBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Apple Music')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="apple_music"><i class="fab fa-music kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="apple_music" class="form-control" placeholder="https://music.apple.com/us/artist/" aria-describedby="apple_music" value="{{isset($dettagli)?$dettagli->apple_music:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.apple_music_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="spotBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Spotify')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="spotify"><i class="fab fa-spotify kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="spotify" class="form-control" placeholder="https://open.spotify.com/artist/" aria-describedby="spotify" value="{{isset($dettagli)?$dettagli->spotify:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.spotify_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="playstationBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('PlayStation')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="playstation"><i class="fab fa-playstation kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="playstation" class="form-control" placeholder="PlayStation ID" aria-describedby="playstation" value="{{isset($dettagli)?$dettagli->playstation:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.playstation_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="xboxBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Xbox Live')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="xbox"><i class="fab fa-xbox kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="xbox" class="form-control" placeholder="Gamertag" aria-describedby="xbox" value="{{isset($dettagli)?$dettagli->xbox:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.xbox_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="airBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Airbnb')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="airbnb"><i class="fab fa-airbnb kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="airbnb" class="form-control" placeholder="https://www.airbnb.com" aria-describedby="airbnb" value="{{isset($dettagli)?$dettagli->airbnb:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.airbnb_descrizione')</span>
                                            </div>
                                        </div>
                                    </div> 
                                    <div id="yelpBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Yelp')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="yelp"><i class="fab fa-yelp kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="yelp" class="form-control" placeholder="https://www.yelp.com/" aria-describedby="yelp" value="{{isset($dettagli)?$dettagli->yelp:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.yelp_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="evernoteBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Evernote')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="evernote"><i class="fab fa-evernote kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="evernote" class="form-control" placeholder="https://www.evernote/" aria-describedby="evernote" value="{{isset($dettagli)?$dettagli->evernote:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.evernote_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="bloggerBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Blogger')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="blogger"><i class="fab fa-blogger kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="blogger" class="form-control" placeholder="https://www.blogger.com/" aria-describedby="blogger" value="{{isset($dettagli)?$dettagli->blogger:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.blogger_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="udemyBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Udemy')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="udemy"><i class="fab fa-udemy kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="udemy" class="form-control" placeholder="https://www.udemy.com/" aria-describedby="udemy" value="{{isset($dettagli)?$dettagli->udemy:''}}">
                                                </div>
                                               <span class="form-text text-muted">@lang('applicazione.udemy_descrizione')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="webBlock"  style="display:none;">
                                        <div class="kt-separator kt-separator--border kt-separator--space-lg">
                                        </div>
                                         <div class="row">
                                            <div class="form-group col-xl-12">
                                                <label>@lang('Website')</label>
                                                <div class="form-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="website"><i class="fab fa-website kt-font-brand"></i></span>
                                                    </div>
                                                    <input type="text" name="website" class="form-control" placeholder="https://www." aria-describedby="website" value="{{isset($dettagli)?$dettagli->website:''}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div> 

                                    <div style="display: flex;justify-content: center;flex-direction: row;flex-wrap: wrap; align-content: center; padding:10px;">
                                        <div onclick="myWhatBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png" alt="Facebook"></div>
                                      <div onclick="mySkyBlock()"><img  class="im_pro_edit" style="box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/skype.png" alt="Facebook"></div>
                                      <div onclick="myTripBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/tripadvisor.png" alt="Facebook"></div>
                                      <div onclick="myAirBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/airbnb.png" alt="Facebook"></div>
                                      <div onclick="myAmazonBlock()"><img  class="im_pro_edit" style="box-shadow: 2px 2px 10px 10px #F7F5F8;"  src="{{url('/')}}/assets/media/icons/socialbuttons/amazon.png" alt="Facebook"></div>
                                      <div onclick="myEbayBlock()"><img  class="im_pro_edit" style="box-shadow: 2px 2px 10px 10px #F7F5F8;"  src="{{url('/')}}/assets/media/icons/socialbuttons/ebay.png" alt="Facebook"></div>
                                        <div onclick="myAppleBlock()"><img  class="im_pro_edit"  src="{{url('/')}}/assets/media/icons/socialbuttons/apple_logo.png" alt="Facebook"></div>
                                      <div onclick="myAppleMusicBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/apple_music2.png" alt="Facebook"></div>
                                      <div onclick="mySpotifyBlock()"><img  class="im_pro_edit"  src="{{url('/')}}/assets/media/icons/socialbuttons/spotify.png" alt="Facebook"></div>
                                      <div onclick="myPlaystationBlock()"><img  class="im_pro_edit"  src="{{url('/')}}/assets/media/icons/socialbuttons/playstation.png" alt="Facebook"></div>
                                      <div onclick="myXboxBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/xbox.png" alt="Facebook"></div>

                                        <div onclick="mySubitoBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/subito.png" alt="Facebook"></div>
                                        <div onclick="myYelpBlock()"><img  class="im_pro_edit" style="box-shadow: 2px 2px 10px 10px #F7F5F8;"  src="{{url('/')}}/assets/media/icons/socialbuttons/yelp.png" alt="Facebook"></div>
                                        <div onclick="myEvernoteBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/evernote.png" alt="Facebook"></div>
                                        <div onclick="myCraigslistBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/craigslist.png" alt="Facebook"></div>
                                        <div onclick="myZoomBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/zoom.png" alt="Facebook"></div>
                                        <div onclick="myTelegramBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/telegram.png" alt="Facebook"></div>
                                        <div onclick="myUdemyBlock()"><img  class="im_pro_edit" style="box-shadow: 2px 2px 10px 10px #F7F5F8;"  src="{{url('/')}}/assets/media/icons/socialbuttons/udemy.png" alt="Facebook"></div>
                                        <div onclick="myDiscordBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/discord.png" alt="Facebook"></div>
                                        <div onclick="myBloggerBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/blogger.png" alt="Facebook"></div>

                                      <div onclick="myWebBlock()"><img  class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/website.png" alt="Facebook"></div>

                                    </div>
                                    
                                </br>
                                </br>
                                <div style="display:flex; justify-content:center;">
                                <button type="submit"  class="btn btn-success btn-sm btn-tall btn-wide kt-font-bold kt-font-transform-u" style="box-shadow:none; color:white;">@lang('applicazione.salva')</button>
                                </div>
                    </form>
        </div> 
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        </br>
        </br>
        </br>
        </br>
    </div>
    </br>
    </br>
    </br>
    </br>
</div>
</br>
</br>
</br>
</br>

<script>

function myCompanyBlock() {
  var x = document.getElementById("comBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myFacBlock() {
  var x = document.getElementById("facBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myInstBlock() {
  var x = document.getElementById("instBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myYouBlock() {
  var x = document.getElementById("youBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myTikBlock() {
  var x = document.getElementById("tikBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myTwiBlock() {
  var x = document.getElementById("twiBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myPinBlock() {
  var x = document.getElementById("pinBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function mySnapBlock() {
  var x = document.getElementById("snapBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myTwitchBlock() {
  var x = document.getElementById("twitchBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myRedBlock() {
  var x = document.getElementById("redBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myTumBlock() {
  var x = document.getElementById("tumBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myMyspBlock() {
  var x = document.getElementById("myspBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myLinBlock() {
  var x = document.getElementById("linBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myQuoraBlock() {
  var x = document.getElementById("quoraBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myWeiboBlock() {
  var x = document.getElementById("weiboBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myStravaBlock() {
  var x = document.getElementById("stravaBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myWhatBlock() {
  var x = document.getElementById("whatBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function mySkyBlock() {
  var x = document.getElementById("skyBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myTripBlock() {
  var x = document.getElementById("tripBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myAmazonBlock() {
  var x = document.getElementById("amazonBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myEbayBlock() {
  var x = document.getElementById("ebayBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myAirBlock() {
  var x = document.getElementById("airBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myWebBlock() {
  var x = document.getElementById("webBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myAppleBlock() {
  var x = document.getElementById("appleBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myAppleMusicBlock() {
  var x = document.getElementById("appleMusicBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function mySpotifyBlock() {
  var x = document.getElementById("spotBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myPlaystationBlock() {
  var x = document.getElementById("playstationBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myXboxBlock() {
  var x = document.getElementById("xboxBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function mySubitoBlock() {
  var x = document.getElementById("subitoBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myYelpBlock() {
  var x = document.getElementById("yelpBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myEvernoteBlock() {
  var x = document.getElementById("evernoteBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myCraigslistBlock() {
  var x = document.getElementById("craigslistBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myZoomBlock() {
  var x = document.getElementById("zoomBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myTelegramBlock() {
  var x = document.getElementById("telegramBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myUdemyBlock() {
  var x = document.getElementById("udemyBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myDiscordBlock() {
  var x = document.getElementById("discordBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

function myBloggerBlock() {
  var x = document.getElementById("bloggerBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


var checkBox = document.querySelector('input[type="checkbox"]');
var textInput = document.getElementById('azienda_nome');
var textInput2 = document.getElementById('partita_iva');


function toggleRequired() {

    if (textInput.hasAttribute('required') !== true) {
        textInput.setAttribute('required','required');
    }

    else {
        textInput.removeAttribute('required');  
    }

    if (textInput2.hasAttribute('required') !== true) {
        textInput2.setAttribute('required','required');
    }

    else {
        textInput2.removeAttribute('required');  
    }
}

checkBox.addEventListener('change',toggleRequired,false);
</script>

@endsection
