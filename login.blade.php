@extends('frontend.layouts.app')

@section('title', app_name() )

@push('after-styles')

<link href="css/login-1.css" rel="stylesheet" type="text/css">
<link href="css/c4s.css" rel="stylesheet" type="text/css">

<style>

html {
  scroll-behavior: smooth!important;
}

    ::-webkit-scrollbar {
        width: 0;
        background: transparent;
    }

    #resultat{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    #scarica_bck{
    position: absolute;
    z-index: 5;
    margin-top: 200px;
    padding: 10px;
    background-color: white;
    border-radius: 15px;
    box-shadow: 2px 2px 10px 10px #f7f5f8;
    }

    @media screen and (min-width: 1024px) {

        .container{
            width:100vw!important;
            overflow-x:crop;
        }

        #logo_base{
            z-index:3;
            position: absolute;
            justify-content: center;
            margin-top: -60px;
            width: 100vw;
            background-image: linear-gradient(white, white, transparent);
            height:30vh
        }

        #spidergain_logo{   
            margin-left: 0px;
            width: 100vw;
            height: 18vh;
            padding: 50px;
            background-image: linear-gradient(white, transparent);
        }

        #button_block_page{
            position: absolute;
            display: flex;
            background-image: linear-gradient(transparent, white, white, white, white, white);
            height: 20vh;
            width: 100vw;
            justify-content: center;
            align-items: center;
            margin-top:70vh;
            z-index:1;
        }

        #home_button_set{
            height:45px;
            width:125px;
            font-size:18px;
            margin-top:20px;
        }

        #privacy_info{
            bottom:0;
            margin-top:70px;
        }

        #photo_div_align{
            margin-top: -12vh;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            flex-wrap: nowrap;
        }

        #new_photo_container{
            //display: flex;
            //width: 100vw;
            //height: 550px;
            //height:100vh;
            //overflow-x: scroll;
            //margin-left: 0.9vw;
            //justify-content: center;
            //align-items: center;
            //flex-direction: column;
            //flex-direction: row;
            //flex-wrap: wrap;
            //-webkit-mask-image: -webkit-gradient(linear, left top, left bottom, to(#111), from(rgb(88 103 221 / 50%)));
            // mask-image: linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,0));
            overflow-y: scroll;
            position:absolute;
            height:100vh;
            width:120vw!important;
            margin-left:0vw;
            pointer-events:none;
        }

        #new_profile_image {
            //margin:0px;
            //width: 125px!important;
            //height:125px;
            height:15vw !important;
            width:15vw;
            object-fit: cover;
            filter: brightness(1) contrast(1);
        }
    }

    @media screen and (max-width: 1024px) {

        .container{
            overflow-x:hidden;
            scroll-behavior: smooth!important;
        }

        #hide_on_app{
            display:none!important;
        }

        #push_down_on_app{
            margin-top:20px;
        }

        #logo_base{
            z-index:3; 
            position: absolute;
            justify-content: center;
            margin-top: -50px;
            width: 100vw;
            background-image: linear-gradient(white, white, transparent);
            height:35vh;
        }


        #spidergain_logo{   
            margin-left: 0px;
            //background-color: white;
            //background-image: linear-gradient(white, transparent);
            width: 100vw;
            height: 24vh;
            padding:50px;
        }

        #button_block_page{
            position: absolute;
            display: flex;
            margin-top: 73vh;
            z-index: 1;
            background-image: linear-gradient(transparent, white, white);
            height: 35vh;
            width: 100vw;
            justify-content: center;
            align-items: center;
            margin-top:50vh; 
            z-index:1;
            //flex-direction: column;
        }

        #home_button_set{
            height:45px;
            width:125px;
            font-size:18px;
            margin-top:120px;
        }

        #privacy_info{
            bottom:0;
            margin-top:30px;
        }

        #photo_div_align{
            margin-top: -12vh;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            flex-wrap: nowrap;
        }

        #new_photo_container{
            //display: flex;
            //width: 100vw;
            //height: 550px;
            //height:100vh;
            //overflow-x: scroll;
            //margin-left: 0.9vw;
            //justify-content: center;
            //align-items: center;
            //flex-direction: column;
            //flex-direction: row;
            //flex-wrap: wrap;
            //-webkit-mask-image: -webkit-gradient(linear, left top, left bottom, to(#111), from(rgb(88 103 221 / 50%)));
            // mask-image: linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,0));
            overflow-y: scroll;
            //position:absolute;
            height:100%;
            width:110vw!important;
            margin-left:3vw;
            pointer-events:none;
        }

        #new_profile_image {
            height:36vw !important;
            width:36vw;
            object-fit: cover;
        }

    }

    body{
        background-color:white;
        scroll-behavior: smooth!important;
        //background-image: linear-gradient(#e72b38, white, white);
    }

    .row{
        //padding:10px;
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
        margin-top: 20px;
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
       // position:absolute;
       // height:50px;
       // margin-left:1px;
    }

    .btn-secondary{
        color:white;
        background-color:#e72b38;
         border:none;
        box-shadow:none;
        border-radius:5px;
        //padding:20px;
        width:100px;
        margin:10px;
    }

     .btn-secondary:hover {
        color: white; 
        background-color: #e72b38; 
        border-color: transparent;
    }

    .btn-secondary:active {
        color: white; 
        background-color: #e72b38; 
        border-color: transparent;
    }

    .btn-secondary:focus {
        color: white; 
        background-color: #e72b38; 
        border-color: transparent;
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
        width:120px;
        padding:20px;
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
    </br>
    <div class="row">
        <div class="col" style="display:flex; justify-content:center; color:white;font-size:10px;height: 75vh;">
            <div id="logo_base">
                <img id="spidergain_logo" src="./assets/media/logos/new/logo-rosso.svg">
            </div>
            </br>
            </br> 
            </br>
            <div style="display:flex; justify-content:center; position:absolute; z-index:10; margin-top: 90px;">
                @include('includes.partials.messages')  
            </div>           
            <div id="photo_div_align">
                <div id="new_photo_container">
                    @foreach($categorie as $categoria)
                        <img id="new_profile_image" src="https://spidergain.com/storage/categories/{{ $categoria->image  }}">
                    @endforeach
                   

                </div>
            </div>


            <div id="button_block_page">

                
                <button id="home_button_set" class="btn btn-secondary" data-toggle="modal" data-target="#loginModal">
                    Login
                </button>
                <button id="home_button_set" class="btn btn-secondary" data-toggle="modal" data-target="#registerModal">
                    Registrati
                </button>
                
                </br>
                </br>
            </div>
        </div>
    </div>
    </br>
    <div class="row" id="privacy_info">
        <div class="col-sm" style="z-index:4; margin-left:10px; display: flex;justify-content: center;flex-direction: column;flex-wrap: wrap;align-content: center; align-items: center; color:black; font-size:11px;">
            <div>
                &copy 2021 Spidergain &nbsp;&nbsp;&nbsp;
                <a style="color:black;" href="{{route('frontend.privacy')}}" class="kt-link">Privacy</a>&nbsp;&nbsp;&nbsp;
                <a style="color:black; margin-right:10px;" href="{{route('frontend.termini')}}" class="kt-link">{{__('applicazione.termini')}}</a>
            </div>
            </br>
        </div>
    </div>     
<div>






<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
       {{ html()->form('POST', route('frontend.auth.register.post'))->class('kt-form')->open() }}

                {{ html()->email('email')
                    ->class('email_bar')
                    ->class('form-control')
                    ->id('email_bar')
                    ->placeholder(__('applicazione.email'))
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
                   
                                     
<p style="color:black; font-size:12px; padding:30px; text-align:center; margin-top: -50px;">    


Cliccando Registrati, accetti i <a href="{{route('frontend.termini')}}" class="kt-link">Termini e Condizioni</a> di Spidergain e riconosci di aver letto la nostra <a href="{{route('frontend.privacy')}}" class="kt-link">privacy policy</a>

</p>
</div>
                    <div style="display:flex; justify-content:center; margin-top:-30px;">
                        {{ form_submit(__('labels.frontend.auth.register_button'))->class('btn btn-secondary')->id('kt_login_signin_submit') }}
                    </div>
                    
                   
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
                </div> --}}
                
                
              
            {{ html()->form()->close() }}



            </br>
             </br>
              </br>
             <div  style="text-align:center;">
              Scarica l'app
              </div>
            <div style="display:flex; justify-content:center; text-align:center;">

                <a href="https://apps.apple.com/gb/app/spidergain/id1575927336">
                <button class="btn btn-secondary" style="margin-right:10px; background-color:#5979FB; height:40px; width:110px; font-size:15px;">
                iOS
                </button>
                </a>
                
                <a href="https://play.google.com/store/apps/details?id=com.x5.spidergaindefinitivo">
                <button class="btn btn-secondary" style="background-color:#5979FB; height:40px; width:110px; font-size:15px;">
                Android 
                </button>
                </a>
            </div>

                </br>
               
           
      </div>

             
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
       {{ html()->form('POST', route('frontend.auth.login.post'))->class('kt-form')->open() }}
                
                {{ html()->email('email')
                        ->class('email_bar')
                        ->class('form-control')
                        ->id('email_bar')
                        ->style('border-top-right-radius:5px;border-top-left-radius:5px;')
                        ->placeholder(__('applicazione.continue_with_email_login'))
                        ->attribute('maxlength', 191)
                        ->required() }}    
                <div  id="resultat" style="">
                    <div class="input-group" style="margin-top: 5px;">    
                        <input placeholder="{{__('validation.attributes.frontend.password')}}" type="password" required name="password" id="password" class="form-control" data-toggle="password">   
                        <div class="input-group-append">
                            <span class="input-group-text"  style="border-bottom-right-radius:5px; border-top-right-radius:5px; background-color:white; border:none;">                     
                                <i style="color:lightgray;" class="fa fa-eye"></i>
                            </span> 
                        </div>
                    </div>
                    </br>
                    <a style="display:flex; justify-content:center; color:black; font-size:12px; font-weight:bold; margin-top: 15px;" class="kt-link kt-login__link-forgot" href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a>
                    </br>
                    
                    
                    <div style="display:flex; justify-content:center;">
                        {{ form_submit(__('labels.frontend.auth.login_button'))->class('btn btn-secondary')->id('kt_login_signin_submit') }}
                    </div>
                </div> 
                </br>

               

            </div>

           

                {{-- - @lang('applicazione.oppure') -
                    </br>
                    </br> 
                    <div style="display:flex; flex-direction:column;">
                    <a id="social_btn" href="{{url('/')}}/login/apple" class="btn btn-dark">
                        <i class="fab fa-apple"></i>
                        @lang('applicazione.continue_with_apple_login') 
                    </a>
                    <a id="social_btn" href="{{url('/')}}/login/facebook" class="btn btn-primary">
                        <i class="fab fa-facebook-f"></i>
                        @lang('applicazione.continue_with_facebook') 
                    </a>
                    <a id="social_btn" href="{{url('/')}}/login/google" class="btn btn-light">
                        <i class="fab fa-google"></i>
                        @lang('applicazione.continue_with_google') 
                                          
                    </a>
                    </div> --}}
                
                
                
            {{ html()->form()->close() }} 

            <div  style="text-align:center;">
              Scarica l'app
              </div>
            <div style="display:flex; justify-content:center; text-align:center;">

                <a href="https://apps.apple.com/gb/app/spidergain/id1575927336">
                <button class="btn btn-secondary" style="margin-right:10px; background-color:#5979FB; height:40px; width:110px; font-size:15px;">
                iOS
                </button>
                </a>
                
                <a href="https://play.google.com/store/apps/details?id=com.x5.spidergaindefinitivo">
                <button class="btn btn-secondary" style="background-color:#5979FB;height:40px; width:110px; font-size:15px; ">
                Android 
                </button>
                </a>
            </div>

                </br>
                </br>
                </br> 

      </div>
    </div>
  </div>
</div>
 
@endsection

@push('after-scripts')

<script>

/*
$("#new_photo_container").animate({ scrollTop: $(document).height() }, 20000);

setTimeout(function() {
   $('#new_photo_container').animate({scrollTop:0}, 20000); 
},20000);


setInterval(function(){
     // 4000 - it will take 4 secound in total from the top of the page to the bottom
$("#new_photo_container").animate({ scrollTop: $(document).height() }, 20000);
setTimeout(function() {
   $('#new_photo_container').animate({scrollTop:0}, 20000); 
},20000);
    
},8000);

*/

(function($){
    $.fn.downAndUp = function(time, repeat){
        var elem = this;
        (function dap(){
            elem.animate({scrollTop:elem.outerHeight()}, time, function(){
                elem.animate({scrollTop:0}, time, function(){
                    if(--repeat) dap();
                });
            });
        })();
    }
})(jQuery);
$("#new_photo_container").downAndUp(50000, 10000)
   
</script>

@endpush