@extends('frontend.layouts.app')

@section('title', app_name() . ' | Register' )

@push('after-styles')

<link href="css/login-1.css" rel="stylesheet" type="text/css">
<link href="css/c4s.css" rel="stylesheet" type="text/css">

<style>


#resultat{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

    @media screen and (max-width: 1024px) {
        #hide_on_app{
            display:none!important;
        }

        #push_down_on_app{
            margin-top:20px;
        }
    }

    @media screen and (min-width: 1024px) {
        #hide_on_full{
            display:none!important;
        }
    }

    body{
        background-color:#e72b38;
    }

    .row{
        padding:10px;
    }

    .form-control{
        display:flex;
        justify-content:center;
        border-radius:0px;
        background-color:white;
        //border:2px solid #F7F5F8;
        margin:0px;
        width:260px;
        height:40px;
        //border: 1px solid #F7F5F8 !important;
        border:none;
        border-radius:5px;
        margin-bottom:5px;
        text-align:left;
    }

    .kt-form{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 150px;
    }

    .input-group{
        border-radius:0px;
        margin:0px;
        width:260px;
        height:25px;
    }

    .im_pro_home{
        max-height:20px;
        margin:5px;
    }

    #spidergain_logo{
        position:absolute;
        height:50px;
        margin-left:1px;
    }

    .btn-secondary{
        color:black;
        background-color:white;
        border:2px solid #F7F5F8;
        box-shadow:none;
    }

    .btn-dark{
        background-color:black;
    }

    #kt_login_signin_submit{
        display: flex;
        //margin-top:-20px;
        justify-content: center;
    }

    #kt_login_signin_submit, .register {
        text-transform: uppercase;
        font-weight: normal;
        font-size: 1em;
        height:30px;
    }

    #social_btn{
        //width:100px;
        width:260px;
        margin:5px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight:bold;
        font-size:14px;
        border-radius:5px;
        padding:10px;
    }

    .btn-primary{
        background-image: linear-gradient(#01ACFC, #0166D9);
    }

    .fa-eye{
        color:white;
    }

    .fa-facebook-f {
        content: url('/assets/media/icons/socialbuttons/facebook_f.png');
        max-width: 22px;
        max-height: 22px;
        font-size: 1.1em;
        //margin-left:5px;
        //margin-bottom:5px;
        margin-top:-3px;
        margin-right:5px;

    }

    .fa-apple {
        content: url('/assets/media/icons/socialbuttons/apple.png');
        max-width: 30px;
        max-height: 30px;
        font-size: 1.1em;
        //margin-left:5px;
        //margin-bottom:5px;
        margin-top:-5px;
         margin-right:5px;
    }

    .fa-google {
        content: url('/assets/media/icons/socialbuttons/google_g.png');
        max-width: 30px;
        max-height: 30px;
        font-size: 1.1em;
        //margin-left:5px;
        //margin-bottom:5px;
        margin-top:-5px;
         margin-right:5px;
    }

    #slide_3{
        margin-top:-4px;
        margin-left:-4px;
    }

</style>

@endpush

@push('after-scripts')
<script src="{{url('/')}}/js/show-password.min.js" type="text/javascript"></script>
@if($errors->any())
<script>
    document.getElementById('register-form').scrollIntoView(true);
</script>
@endif
@endpush
@section('content')

<div class="container">
</br>
    <div class="row">
        <div class="col-sm" id="push_down_on_app" style="display:flex; justify-content:center; color:white; font-size:10px;">
            <span>Hai già un account?</span>&nbsp;&nbsp;
            <a href="{{route('frontend.auth.login')}}" style="color:white;" class="kt-link kt-login__signup-link">Effettua il login</a>
        </div>
    </div>
    </br>
    <div class="row">
        <div id="hide_on_app" class="col" style="display:flex; justify-content:center;">
           @foreach(array_keys(config('locale.languages')) as $lang)
                @if($lang != app()->getLocale())
                    @if($lang == 'it')
                        <a href="#">
                        <img id="mainPhoto" src="./assets/media/new_login/categories.png" style="max-height:550px;">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/gym.png">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/mary.png">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/ristorante.png">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/nadia.png">
                        


                                                
                        </a>
                    @endif
                    @if($lang == 'en')
                        <a href="#">
                        <img id="mainPhoto" src="./assets/media/new_login/categories.png" style="max-height:550px;">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/gym.png">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/mary.png">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/ristorante.png">
                        <img id="slide_3" style="display:none; " src="./assets/media/new_login/nadia.png">
                       

                                               
                        </a>
                    @endif
                @endif
            @endforeach
        </div>
        <div class="col" style="display:flex; justify-content:center; color:white;font-size:10px; max-height: 105vh;">
            <img id="spidergain_logo" src="./assets/media/logos/new/logo-bianco.svg">
            </br>
            </br> 
            </br>
            <div style="display:flex; justify-content:center; position:absolute;">
            @include('includes.partials.messages')  
            </div>
            {{ html()->form('POST', route('frontend.auth.register.post'))->class('kt-form')->open() }}
                <img id="hide_on_full" src="./assets/media/new_login/categories.png" style="margin-top:-80px; max-height:400px; margin-bottom:20px;">
                            <img id="slide_3" style="display:none; " src="./assets/media/new_login/gym.png">
                            <img id="slide_3" style="display:none; " src="./assets/media/new_login/mary.png">
                            <img id="slide_3" style="display:none; " src="./assets/media/new_login/ristorante.png">
                            <img id="slide_3" style="display:none; " src="./assets/media/new_login/nadia.png"> 

            {{--    {{ html()->email('email')
                    ->class('email_bar')
                    ->class('form-control')
                    ->id('email_bar')
                    ->placeholder(__('applicazione.continue_with_email'))
                    ->attribute('maxlength', 191)
                    
                    ->required() }} --}}

            <button style="height:35px;" id="email_bar" type="button" class="email_bar form-control" data-toggle="modal" data-target="#registerModal">
                @lang('applicazione.registrati')
            </button>
            
                <div id="resultat" style="display:none;">
                    {{ html()->text('first_name')
                        ->class('email_bar')
                        ->class('form-control')
                        ->placeholder(__('applicazione.nome'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                    {{ html()->text('last_name')
                        ->class('email_bar')
                        ->class('form-control')
                        ->placeholder(__('applicazione.cognome'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                    <!-- {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}-->
                    <div class="input-group">    
                        <input placeholder="{{__('validation.attributes.frontend.password')}}" type="password" required name="password" id="password" class="form-control" data-toggle="password">   
                        <div class="input-group-append">
                        <span class="input-group-text" style="border-bottom-right-radius:5px; border-top-right-radius:5px; background-color:white; border:none;">                     
                            <i style="color:lightgray;" class="fa fa-eye"></i>
                        </span> 
                        </div>
                    </div>
                    </br>
                    <!-- {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}-->
                    <div class="input-group" style="margin-top:5px;">    
                        <input placeholder="{{__('validation.attributes.frontend.password_confirmation')}}" type="password" required name="password_confirmation" id="password" class="form-control" data-toggle="password">   
                        <div class="input-group-append">  
                        <span class="input-group-text" style="border-bottom-right-radius:5px; border-top-right-radius:5px; background-color:white; border:none;">                     
                            <i style="color:lightgray;" class="fa fa-eye"></i>
                        </span>
                        </div>
                    </div>
                    <div style="visibility:hidden;">
                        <span class="kt-option__control">
                            <span class="kt-radio kt-radio--check-bold">
                                <input type="radio" name="register_as" value="influencer" checked="">
                                <span class="selector_dot"></span>
                            </span>
                        </span>
                        <span class="kt-option__label">
                            <span class="kt-option__head">
                                <span class="kt-option__title">Persona
                                </span>
                            </span>
                        </span>
                    </div>
                    <div style="visibility:hidden;" class="col-m-4">
                        <span class="kt-option__control">
                            <span class="kt-radio kt-radio--check-bold">
                                <input type="radio" name="register_as" value="brand">
                                <span class="selector_dot"></span>
                            </span>
                        </span>
                        <span class="kt-option__label">
                            <span class="kt-option__head">
                                <span class="kt-option__title">Azienda
                                </span>
                            </span>
                        </span>
                    </div>
                    <div style="display:flex; justify-content:center;">
                        {{ form_submit(__('labels.frontend.auth.register_button'))->class('btn btn-secondary')->id('kt_login_signin_submit') }}
                    </div>
                </div>
                </br>
                <div id="hide_on_phone">
            &copy 2021 Spidergain &nbsp;&nbsp;&nbsp;
            <a style="color:white;" href="{{route('frontend.privacy')}}" class="kt-link">Privacy</a>&nbsp;&nbsp;&nbsp;
            <a style="color:white; margin-right:10px;" href="{{route('frontend.termini')}}" class="kt-link">{{__('applicazione.termini')}}</a>
            </div>
               {{-- - @lang('applicazione.oppure') -
                </br>
                </br>
                 <div style="display:flex; flex-direction:column;">
                    <a id="social_btn" href="{{url('/')}}/login/apple" class="btn btn-dark">
                        <i class="fab fa-apple"></i>
                        @lang('applicazione.continue_with_apple') 
                    </a>
                    <a id="social_btn" href="{{url('/')}}/login/facebook" class="btn btn-primary">
                        <i class="fab fa-facebook-f"></i>
                        @lang('applicazione.continue_with_facebook') 
                    </a>
                    <a id="social_btn" href="{{url('/')}}/login/google" class="btn btn-light">
                        <i class="fab fa-google"></i>
                        @lang('applicazione.continue_with_google')                  
                    </a>
                </div>--}}
                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
                {{--<div style="display: flex;justify-content: center;flex-direction: row;flex-wrap: nowrap; margin-left:10px;">
                    <a href="https://play.google.com/store/apps/details?id=com.x5.spidergaindefinitivo"><img style="height:45px;" src="./assets/media/appdl.png"></a>
                    <a href="https://apps.apple.com/gb/app/spidergain/id1575927336"><img style="height:41px; margin-top:1px;" src="./assets/media/goodl.png"></a>
                </div>--}}
            {{ html()->form()->close() }} 
        </div>
    </div>
    <div id="hide_on_app" class="row" style="">
        <div class="col-sm" style="display: flex;justify-content: center;flex-direction: column;flex-wrap: wrap;align-content: center; align-items: center; color:white; font-size:10px;">
            <div>
            &copy 2021 Spidergain &nbsp;&nbsp;&nbsp;
            <a style="color:white;" href="{{route('frontend.privacy')}}" class="kt-link">Privacy</a>&nbsp;&nbsp;&nbsp;
            <a style="color:white; margin-right:10px;" href="{{route('frontend.termini')}}" class="kt-link">{{__('applicazione.termini')}}</a>
            </div>
            </br>
           {{-- <div>
            <a href="https://www.facebook.com/spidergain/">
                <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook_white.png" alt="Facebook">
            </a>
            <a href="https://www.youtube.com/channel/UCTq1jq0PcHl3eAmxGskHtlw/playlists">
                <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube_white.png" alt="YouTube">
            </a>
            <a href="https://www.twitter.com/spidergain/">
                <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter_white.png" alt="Twitter">
            </a>
            <a href="https://www.linkedin.com/company/spidergain/">
                <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin_white.png" alt="LinkedIn">
            </a>
            <a href="https://play.google.com/store/apps/details?id=com.x5.spidergaindefinitivo">
                <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/playstore_white.png" alt="Playstore">
            </a>
            <a href="https://apps.apple.com/gb/app/spidergain/id1575927336">
                <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/apple_white.png" alt="AppStore">
            </a>
            </div> --}}
        </div>
    </div>       
<div>



<!-- Modal -->
<div style="margin-top:-100px;" class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      {{--<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>--}}
      <div class="modal-body">
      </br>
       {{ html()->form('POST', route('frontend.auth.register.post'))->class('kt-form')->style('margin-top:0px;')->open() }}

                {{ html()->email('email')
                    ->class('email_bar')
                    ->class('form-control')
                    ->id('email_bar')
                    ->placeholder(__('applicazione.continue_with_email'))
                    ->attribute('maxlength', 191)
                    ->required() }}
            
                <div  id="resultat" style="">
                    {{ html()->text('first_name')
                        ->class('email_bar')
                        ->class('form-control')
                        ->placeholder(__('applicazione.nome'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                    {{ html()->text('last_name')
                        ->class('email_bar')
                        ->class('form-control')
                        ->placeholder(__('applicazione.cognome'))
                        ->attribute('maxlength', 191)
                        ->required() }}
                    <!-- {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}-->
                    <div class="input-group">    
                        <input placeholder="{{__('validation.attributes.frontend.password')}}" type="password" required name="password" id="password" class="form-control" data-toggle="password">   
                        <div class="input-group-append">
                        <span class="input-group-text" style="border-bottom-right-radius:5px; border-top-right-radius:5px; background-color:white; border:none;">                     
                            <i style="color:lightgray;" class="fa fa-eye"></i>
                        </span> 
                        </div>
                    </div>
                    </br>
                    <!-- {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}-->
                    <div class="input-group" style="margin-top:5px;">    
                        <input placeholder="{{__('validation.attributes.frontend.password_confirmation')}}" type="password" required name="password_confirmation" id="password" class="form-control" data-toggle="password">   
                        <div class="input-group-append">  
                        <span class="input-group-text" style="border-bottom-right-radius:5px; border-top-right-radius:5px; background-color:white; border:none;">                     
                            <i style="color:lightgray;" class="fa fa-eye"></i>
                        </span>
                        </div>
                    </div>
                    <div style="visibility:hidden;">
                        <span class="kt-option__control">
                            <span class="kt-radio kt-radio--check-bold">
                                <input type="radio" name="register_as" value="influencer" checked="">
                                <span class="selector_dot"></span>
                            </span>
                        </span>
                        <span class="kt-option__label">
                            <span class="kt-option__head">
                                <span class="kt-option__title">Persona
                                </span>
                            </span>
                        </span>
                    </div>
                    <div style="visibility:hidden;" class="col-m-4">
                        <span class="kt-option__control">
                            <span class="kt-radio kt-radio--check-bold">
                                <input type="radio" name="register_as" value="brand">
                                <span class="selector_dot"></span>
                            </span>
                        </span>
                        <span class="kt-option__label">
                            <span class="kt-option__head">
                                <span class="kt-option__title">Azienda
                                </span>
                            </span>
                        </span>
                    </div>
<div>                    
<p style="color:black; font-size:12px; padding:20px;">    


Cliccando Registrati, accetti i <a href="{{route('frontend.termini')}}" class="kt-link">Termini e Condizioni</a> di Spidergain e riconosci di aver letto la nostra <a href="{{route('frontend.privacy')}}" class="kt-link">politica sulla privacy</a>

</p>
</div>
                    <div style="display:flex; justify-content:center;">
                    
                        {{ form_submit(__('labels.frontend.auth.register_button'))->class('btn btn-secondary')->id('kt_login_signin_submit') }}
                    </div>
                </div>
                </br>
               
            {{ html()->form()->close() }}



      </div>
    </div>
  </div>
</div>

 
@endsection

@push('after-scripts')

<script>
/*
document.getElementById("email_bar").addEventListener("focus", showdiv);
function showdiv(event) {
    document.getElementById("resultat").style.display = "block";
}
*/
</script>

<script>
let images = ['./assets/media/new_login/categories.png', './assets/media/new_login/gym.png', './assets/media/new_login/mary.png',  './assets/media/new_login/ristorante.png', './assets/media/new_login/nadia.png'];

let index = 0;
const imgElement = document.querySelector('#hide_on_full');

function change() {
   imgElement.src = images[index];
   index > 3 ? index = 0 : index++;
}

window.onload = function () {
    setInterval(change, 6000);
};
</script>

@foreach(array_keys(config('locale.languages')) as $lang)
@if($lang != app()->getLocale())

@if($lang == 'en')

<script>

let images = ['./assets/media/new_login/categories.png', './assets/media/new_login/gym.png', './assets/media/new_login/mary.png',  './assets/media/new_login/ristorante.png', './assets/media/new_login/nadia.png'];

let index = 0;
const imgElement = document.querySelector('#mainPhoto');

function change() {
   imgElement.src = images[index];
   index > 3 ? index = 0 : index++;
}

window.onload = function () {
    setInterval(change, 6000);
};

</script>
@endif


@if($lang == 'it')
<script>

//let images = ['./assets/media/it_en/gym_e.png',  './assets/media/it_en/pt_en.png', './assets/media/it_en/rist_en.png',  './assets/media/it_en/bachecha.png', './assets/media/it_en/sun_en.png', './assets/media/it_en/sg_en.png',  './assets/media/it_en/prof.png',];
let images = ['./assets/media/new_login/categories.png', './assets/media/new_login/gym.png', './assets/media/new_login/mary.png',  './assets/media/new_login/ristorante.png', './assets/media/new_login/nadia.png'];

let index = 0;
const imgElement = document.querySelector('#mainPhoto');

function change() {
   imgElement.src = images[index];
   index > 3 ? index = 0 : index++;
}

window.onload = function () {
    setInterval(change, 6000);
};

</script>
@endif
@endif
@endforeach

@endpush