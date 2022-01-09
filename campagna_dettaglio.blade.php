@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('applicazione.campagna'))

@section('content')

@push('after-styles')

<style>

ul{
    list-style-type: none;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 80vw;
    padding: 0;
}

li {
    background-color:transparent;
}

#mobile_search_function{
    display:none;
}

body{
    background:white;
}

.kt-widget__date{
    margin-left:10px;
}

.kt-widget.kt-widget--user-profile-3 .kt-widget__bottom{
    padding:0px;
    border-top:none;
}

.save-box{
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.dropdown-menu>.dropdown-item>i, .dropdown-menu>li>a>i{
    background-image: linear-gradient(#e72b38, #e72b80);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;

}

.dropdown-item{
    color:black;
    display: flex;
    align-items: center;
}

#azienda_btns .btn-secondary{
    //background-image: linear-gradient(#e72b38, #e72b80);
    //-webkit-text-fill-color: white;
}

#seller_reply_div{
    padding: 20px;
    text-align: right;
    margin: 10px;
    border-radius: 15px;
    color: #5979FB;
    -webkit-text-fill-color: black;
    //box-shadow: 2px 2px 10px 10px #f7f5f8;
    background-color:aliceblue;
    //border: 2px solid #F7F5F8;
}

.im_pro_edit{
        max-height:40px;
        max-width:40px;
        margin:5px;
    }

    .kt-footer .kt-footer__wrapper {
        display:none;
    }

    .modal .modal-content {
        border-radius:25px;
        margin-top:90px;
    }

    .btn-primary{
        border-radius:5px;
    }

    .btn-danger{
        border-radius:5px;
    }

    .btn-secondary{
        padding:10px;
        border:2px solid #F7F5F8;
        border-radius:5px;
        color:black;
        background-color:white;
    }

    .btn{
        border-radius:5px;
    }

    #title_campagna_dettaglia{
        margin-left:90px;
    }

    

    @media (max-width: 768px) {

        #mobile-logo{
    display:none;
}

#mobile_header_style{
    display:none;
}

    #campagna_map{
        pointer-events:none;
        margin-left:-10px;
        height:200px;
        width:101vw;
    }

    #btnGroupDrop1{
        //position:absolute;
        //margin-left:320px;
        //margin-top:-55px;
        background-color:transparent;
        border:none;
        color:white;
        font-weight:bold;
        font-size:40px;
    }

    #dropdown_modify_menu{
        position: absolute;
        will-change: transform;
        padding:30px;
        top: 20px;
        left: 150px;
        transform: translate3d(0px, 38px, 0px);
    }

        #desktop_layout{
    margin-top:-70px;
}

        .label-canali {
    margin-top: 20px;
}

.kt-widget.kt-widget--user-profile-3 .kt-widget__bottom .kt-widget__item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    padding: 2rem 1.5rem 0 0;
    justify-content: center;
}

        #azioni_btn_location{
            margin-top:-50px;
            }
        
        .kt-widget3__header{
            flex-wrap: wrap
            }

        .kt-font-info{
            flex-grow: 0 !important;
            margin-top:7px;
            text-align: left;
            }
        #head_picture_container{
             width:102vw;
              margin-top:-65px; 
        }
        #head_picture_campagain{
           
            //width:105vw;
            //-webkit-mask: radial-gradient(circle, #0000 150px, rgba(0, 0, 0, 0.9) 160px);
            //filter:blur(10px);
        }

        #verified_img_sm_camp{
            //position:absolute; 
            height:12px; 
            width:12px; 
           // margin-top:2px; 
            margin-left:2px;
            }
        
        .kt-page-content-white .kt-portlet {
            width:100%;
            }

        #autore_campagna{
            margin-top:20px;
            }

        #campagne_photos_detail{
            height:80px;
            width:80px;
            margin-right:10px;
            }

        #username_in_campagne{
            font-size:16px;
            }
        
        .campagin_detail{padding:10px; width:98vw}
        
        #new_photo_container_camp{
            width:101vw;
            margin-left:0.9vw;
            }

        #new_profile_image_camp {
            padding-top: 0.3vw;
            padding-bottom: 0.3vw;
            padding-left: 0.5vw;
            padding-right: 0.5vw;
            width: 34vw;
            height: 34vw;
            object-fit: cover;
            }
        
        .canali_flex{
            display:flex;
            flex-wrap: wrap;
            justify-content:flex-start;
            width: 100vw;
            height:70px;
            margin-left:2px;
        }

        .btn-group{
            display:flex;
            justify-content:center;
            box-shadow: 2px 2px 10px 10px #f7f5f8;
            padding: 20px;
            border-radius: 15px;
            width: 100vw;
        }
   
    }

    @media (min-width: 768px) {

        #campagna_map{
        pointer-events:none;
        height:300px;
        width:800px;
        margin-left:-10px;
    }

        #btnGroupDrop1{
        position:absolute;
        margin-left:730px;
        margin-top:-60px;
        background-color:transparent;
        border:none;
        color:white;
        font-weight:bold;
        font-size:28px;
    }

    #dropdown_modify_menu{
        position: absolute;
        will-change: transform;
        padding:30px;
        top: 100px;
        left: 1000px;
        transform: translate3d(0px, 38px, 0px);
    }
        
        .alert{
            max-width:800px;
        }

        .kt-portlet{
            margin-top:20px;
        }

        .btn{
            margin-top:10px;
        }

        #verified_img_sm_camp{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:7px; 
            margin-left:5px;
            }
       
        
        #head_picture_campagain{
            margin-top:-65px; 
            //width:800px;
        }
        
        .kt-page-content-white .kt-portlet {
            width:850px;
            }

        #autore_campagna{
            margin-top:25px;
            }

        .campagin_detail{padding:10px; width:800px}

        #campagne_photos_detail{
            margin-right:10px;
            }
        
        #new_photo_container_camp{
            width:800px;
            margin-left:0.9vw;
            }

        #new_profile_image_camp {
            padding-top: 0.3vw;
            padding-bottom: 0.3vw;
            padding-left: 0.5vw;
            padding-right: 0.5vw;
            width: 18vw;
            height: 18vw;
            object-fit: cover;
            }

        .canali_flex{
            display:flex;
            flex-wrap: nowrap;
            justify-content:flex-start;
            margin-left:10px;
        }

        .btn-group{
            display:flex;
            justify-content:flex-start;
            border-radius: 15px;
    width: 100vw;
        }

    }   
        #iconspace {
            margin-right:20px;
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
        }

        #backgroup{
            position: absolute;
    display: flex;
    justify-content: space-between;
    flex-wrap: nowrap;
    align-items: center;
    width: 100vw;
    margin-top: 0px;
        }

</style>

<link href="{{url('/')}}/js/photo/magnific-popup.css" rel="stylesheet" type="text/css" />
@endpush

@push('after-scripts')
<script src="{{url('/')}}/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="{{url('/')}}/js/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="{{url('/')}}/js/photo/jquery.magnific-popup.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
$('.image-link').magnificPopup({type:'image', mainClass: 'mfp-fade'});
});</script>
@push('after-scripts')
<script>
   
    function startChat(influencer, el ){
        startChat.timer = setInterval(
            function(){
                let last = el.find('.kt-chat__message').last().data('id');
                if (typeof last === 'undefined') {
                    getMessages(influencer, el);
                }else{
                    getLastMessages(influencer, el, last);
                }
            },
    15000);
    }
    
    function stopChat(){
        clearInterval(startChat.timer);
    }
    function scroll(el){
        el.animate({
        scrollTop: el.get(0).scrollHeight+200
    }, 1);
    }
    $('.chats').on('show.bs.modal', function (e) {
    let el = $(this);
    let scrolldiv = el.find('.kt-portlet__body');
    scroll(scrolldiv);
    
    let influencer = $(this).data('influencer');
    getMessages(influencer, el);
    startChat(influencer,el);
       
    });
    
    $('.chats').on('hidden.bs.modal', function () {
         stopChat();
    });
   

            $('.chats .kt-chat__reply').click(function(e){
                
                e.preventDefault();
                let el = $(this);
                
                let form = el.closest('form');
                if(form.find('textarea').val() == ''){
                    return false;
                }
                el.attr('disabled', true);
                let scrollDiv = el.closest('.chats');
                let modal = el.closest('.modal').find('.kt-chat__messages');
                let data = form.serialize();
                $.ajax({
                type: 'POST',
                        dataType : 'html',
                        url:'{{route('frontend.user.chat.send')}}',
                        data: data,
                        success: function(data){
                        modal.append(data);
                        el.attr('disabled', false);
                        form.find('textarea').val('');
                        scrollBottom(scrollDiv);
                        },
                        error: function(){
                        alert('@lang('Errore.Riprovare più tardi')');
                        el.attr('disabled', false);
                        }
                });
    });
    function getMessages(influencer, el) {
            $.ajax({
            type:'GET',
                    dataType:'html',
                    url:'{{route('frontend.user.chat.get')}}',
                    data:{
                    _token: "{{ csrf_token() }}",
                            cmp : "{{$campagna->uuid}}",
                            influencer : influencer
                    },
                    success: function(data) {
                    el.find('.kt-chat__messages').html(data);
                    scrollBottom(el);
                    },
                    error: function(){
                    alert('@lang('Errore.Riprovare più tardi')');
                    }
            });
    }
    
    function getLastMessages(influencer, el, last) {
    $.ajax({
    type:'GET',
            dataType:'html',
            url:'{{route('frontend.user.chat.last')}}',
            data:{
            _token: "{{ csrf_token() }}",
                    cmp : "{{$campagna->uuid}}",
                    influencer : influencer,
                    last: last
            },
            success: function(data) {
                
            
            removeread();
                
            el.find('.kt-chat__messages').append(data);
            if(data != ''){
            scrollBottom(el);
        }
            },
            error: function(){
            alert('@lang('Errore.Riprovare più tardi')');
            }
    });
    }
    
    function scrollBottom(el){
        el.find('.kt-portlet__body').animate({
        scrollTop: el.find('.kt-portlet__body').get(0).scrollHeight
    }, 1);
    };
    function removeread(){
        $('.read-label').remove();
    };
    $('.kt-portlet__body').animate({
        scrollTop: $('.kt-portlet__body').get(0).scrollHeight
    }, 1);
</script>
@endpush
@endpush

<div class="new_row">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
  </div>

    <!-- begin:: Content -->
    <div>
    
        <div style="border-radius:0px;">
        <div id="backgroup">
        @include('includes.partials.back')
            
                    <button id="btnGroupDrop1" type="button" class="btn btn-secondary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons nav__icon">more_horiz</i>
                    </button>
                    <div id="dropdown_modify_menu" class="dropdown-menu dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start">
                    @if(Auth::user()->id === $campagna->user_id)
                        <a href="{{route('frontend.user.campagne.influencer',$campagna->uuid)}}" class="dropdown-item"><i style="color:black;" class="material-icons nav__icon" id="bookmark">search</i> {{__('applicazione.cerca')}}</a>&nbsp;
                        <a href="{{route('frontend.user.campagne.modifica',$campagna->uuid)}}" class="dropdown-item "><i style="color:black;" class="material-icons nav__icon" id="bookmark">edit</i> {{__('applicazione.modifica')}}</a>&nbsp;
                        @if($campagna->active == 1)
                            <a href="{{route('frontend.user.campagne.disattiva',$campagna->uuid)}}" class="dropdown-item"><i style="color:black;" class="material-icons nav__icon" id="bookmark">power_settings_new</i> {{__('applicazione.disattiva')}}</a>&nbsp;
                        @else
                            <a href="{{route('frontend.user.campagne.disattiva',$campagna->uuid)}}?attiva" class="dropdown-item"><i style="color:black;" class="material-icons nav__icon" id="bookmark">power_settings_new</i> {{__('applicazione.attiva')}}</a>&nbsp;
                        @endif
                        <a onclick="return confirm('{{__('applicazione.conferma_cancella')}}');" href="{{route('frontend.user.campagne.cancella',$campagna->uuid)}}" class="dropdown-item btn-upper"><i style="color:black;" class="material-icons nav__icon" id="bookmark">delete</i> {{__('applicazione.cancella')}}</a>
                    @else
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#reportModal-{{$campagna->id}}"><i style="color:black" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button>
                       

                    @endif
                    </div>    
                
            </div>
            <div style="display:flex; justify-content:center;">
            <div id="head_picture_container">
                <img id="head_picture_campagain" src="https://spidergain.com/storage/posts/{{ $campagna->display_image }}" alt="Card image cap">
            </div>
            </div>
            </br>
            </br>
        <div style="margin-top: -20px;width: 100vw;border-radius: 25px;box-shadow: 2px 2px 10px 10px #F7F5F8; padding-top: 20px; padding-bottom: 20px;">
            <div class="campagin_detail">
            <a href="{{url('/social/'.$campagna->users->username)}}">
                @if($campagna->users->avatar_location != '')
                    <img src="{{asset('storage/'.$campagna->users->avatar_location)}}" alt="image" style="box-shadow: 2px 2px 10px 10px #F7F5F8; max-height:30px; max-width:30px; border-radius:15px; margin-left:5px; margin-right:5px;">
                @else
                    <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="image" style="box-shadow: 2px 2px 10px 10px #F7F5F8; max-height:30px; max-width:30px; border-radius:15px; margin-left:5px; margin-right:5px;">
                @endif
                <strong  style="color:black;">{{$campagna->users->dettagli->azienda_nome}}</strong></a>
                @if($campagna->users->verified == 1)  
                    <img id="verified_img_sm_camp" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                @elseif($campagna->users->staff == 1)
                    <img id="verified_img_sm_camp" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                @elseif($campagna->users->gold == 1)
                    <img id="verified_img_sm_camp" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                @endif
                <hr>     
                <h4><strong  style="background: linear-gradient(to right, #e72b38 0%, #e72b80 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{{$campagna->titolo}}</strong></h4>
                <input type="hidden" id="campaign_id" name="campaign_id" value="{{ $campagna->id }}"></input>
                {!! clean($campagna->descrizione) !!}
                {!! clean($campagna->scambio) !!}
                @if(!empty($campagna->durata) && !empty($campagna->budget))

             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
            
                <strong>@lang('applicazione.budget'):
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                    - 
                @lang('applicazione.durata'):
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}           
                </strong> 
                </div> 
           
            @endif
            @if(empty($campagna->durata) && !empty($campagna->budget))
         
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.budget'):</strong>
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                </div> 
            
            @endif
            
            @if(!empty($campagna->durata) && empty($campagna->budget))
             
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.durata'):</strong>
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}
             </div> 
            
            @endif 
                </br> </br>  </br>
                 <div class="canali_flex">
                    @foreach($canali_view as $item)
                        <i id="iconspace" class="{{$item['icon']}}"></i>
                    @endforeach
                </div>  
               

                <hr>  
                 <div class="save-box">
                 <button style=" background-color:white; border:none; box-shadow:none; color:black;" data-item="{{ $campagna->id }}" data-toggle="modal" data-target="#campagnaShareModal-{{ $campagna->id }}" class="tablink_b"><i class="material-icons nav__icon" id="ico_side" style="color:black;">share</i></button>

                <a href="javascript:;" onclick="saveCampagna({{ $campagna->id }}); window.location.reload();" class="save-text">
                    @if($campagna->checkSave(Auth::user()->id))
                        <i id="fa-heart" style="color:black;" class="material-icons nav__icon" id="bookmark">bookmark</i>
                    @else 
                        <i id="fa-heart-o" style="color:black;" class="material-icons nav__icon" id="bookmark-o">bookmark_border</i>
                    @endif
                </a>
             {{--<button style=" background-color:white; border:none; box-shadow:none; color:black;" data-item="{{ $campagna->id }}" data-toggle="modal" data-target="#campagnaShareModal-{{ $campagna->id }}" class="tablink_b"><i class="material-icons nav__icon" id="ico_side" style="color:black;">share</i></button>--}}
            </div>
          
                </div>
                </br>
                </br>
                @if($campagna->allegati != '')
                    @php
                        $immagini = json_decode($campagna->allegati,true);
                    @endphp  
                    <div id="new_photo_container_camp">
                        @foreach($immagini as $key=>$immagine)
                            @if($immagine != '')
                                <a data-fancybox="gallery" href="{{asset('storage/'.$immagine)}}" data-caption="{{$campagna->titolo}}">
                                    <img id="new_profile_image_camp"  style="border-radius:0px; border:1px solid transparent;"  src="{{asset('storage/'.$immagine)}}" alt="image" />
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif

                
                
                </br> 
                 @if(Auth::user()->id != $campagna->user_id)
                <hr> 
                        <div style="display:flex; justify-content:center;">
                            <a href="{{url('/social/'.$campagna->users->username)}}"><button type="submit" style="background-color:white; color:black; width:150px; margin-right:10px; border:2px solid #F7F5F8;" class="btn btn-secondary btn-block">Profilo</button></a>
                            {{--<a href="{{ url('/direct-messages/show/'. $campagna->users->id) }}"><button type="submit" style="background-color:#5979FB; color:white; width:150px; border:none;" class="btn btn-secondary btn-block">Messaggio</button></a>--}}
                        </div>
                @endif
              
                

                {{--
                @if(Auth::user()->id === $campagna->user_id)
                    <span class="kt-widget__date">
                        {{__('applicazione.inizio_campagna')}}
                    </span>
                    <span style="border-radius:5px;">{{date('d/m/Y',strtotime($campagna->data_inizio))}}</span>   
                    </br>                              
                    <span class="kt-widget__date">
                        {{__('applicazione.fine_campagna')}}
                    </span>
                    <span style="border-radius:5px;">{{date('d/m/Y',strtotime($campagna->data_fine))}}</span> 
                @endif
                --}}
                
               
                
            </div>
        </div>
         </div> 
      
       </br>

        @if(Auth::user()->id != $campagna->user_id)
        @if($sent)
        <div style="width:100vw; border-radius:25px; padding:10px; box-shadow: 2px 2px 10px 10px #F7F5F8;">
        <h4 style="background: linear-gradient(to right, #e72b38 0%, #e72b80 100%);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><strong>Mie Offerte</strong></h4>
        </br>
         </br>
            @foreach($sent as $user)
                @if($user->avatar_location != '')
                    <img src="{{asset('storage/'.$user->avatar_location)}}" alt="image" style="box-shadow: 2px 2px 10px 10px #F7F5F8; max-height:30px; max-width:30px; border-radius:15px; margin-left:5px; margin-right:10px;">
                @else
                    <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="image" style="box-shadow: 2px 2px 10px 10px #F7F5F8; max-height:30px; max-width:30px; border-radius:15px; margin-left:5px; margin-right:10px;">
                @endif
                <strong style="margin-right:10px;">{{ $user->offer }}</strong> {{ str_limit($user->message, 30) }}
                @if($user->accepted_creator != null)
                    <i style="position:absolute; color:#4AC964; margin-left:10px;" class="material-icons nav__icon">check_circle</i>
                @elseif($user->refused_creator != null)
                    <i style="position:absolute; color:#e72b38; margin-left:10px;" class="material-icons nav__icon">highlight_off</i>
                @else
                     <i style="position:absolute; color:lightgray; margin-left:10px;" class="material-icons nav__icon">watch_later</i>
                @endif

                </br>
                @if(!empty($user->message_seller))
                <div id="seller_reply_div">
                    <div>
                    {{ $user->message_seller }}
                    </div>
                    <div style="margin-right:-10px;">
                    @if($campagna->users->avatar_location != '')
                        <img src="{{asset('storage/'.$campagna->users->avatar_location)}}" alt="image" style="box-shadow: 2px 2px 10px 10px #F7F5F8; max-height:30px; max-width:30px; border-radius:15px; margin-top:10px; margin-left:5px; margin-right:5px;">
                    @else
                        <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="image" style="box-shadow: 2px 2px 10px 10px #F7F5F8; max-height:30px; max-width:30px; border-radius:15px; margin-top:10px; margin-left:5px; margin-right:5px;">
                    @endif
                    </div>
                </div>
                @endif
                </br>
                </br>
            @endforeach
        </div>

        @endif
        @endif
       

        </br> 

            @if(Auth::user()->id != $campagna->user_id)
                
                    @include('frontend.campagne.invia_offerta')
                
            @else
                @if($got)
                    <div class="btn-group" id="azienda_btns">
                        <a href="{{ url('/offers') }}"><button class="btn btn-secondary">Offerte</button></a>
                @endif
                        <a href="{{route('frontend.user.campagne.influencer',$campagna->uuid)}}"><button class="btn btn-secondary">Cerca</button></a>
                        <a href="{{route('frontend.user.campagne.modifica',$campagna->uuid)}}"><button class="btn btn-secondary"> {{__('applicazione.modifica')}}</button></a>
                        @if($campagna->active == 1)
                            <a href="{{route('frontend.user.campagne.disattiva',$campagna->uuid)}}"><button class="btn btn-secondary">Concludi</button></a>
                        @else
                            <a href="{{route('frontend.user.campagne.disattiva',$campagna->uuid)}}?attiva"><button class="btn btn-secondary">Activate</button></a>
                        @endif
                    </div>    
            @endif 

        <!-- end:: Content -->
        </br></br></br></br></br></br>
    </div>


    <div class="modal fade" id="reportModal-{{ $campagna->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title" id="exampleModalLabel">Segnala</h5>
      </div>
      <div class="modal-body">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            Sei sicuro?
        </div>
        </br>
            <form action="{{ url('campagna/report') }}" method="post" style="display: flex; justify-content: center; flex-direction: column;">
                @csrf
                <input type="hidden" id="campagna_id" name="campagna_id" value="{{$campagna->id}}">
                <textarea id="reason" name="reason" placeholder="Motivo?.." style="padding: 10px;border: 2px solid #F7F5F8;"></textarea>
                </br>
                <button type="submit" class="btn btn-secondary" style="color:#e72b38; display: flex;justify-content: center; font-weight:bold; border:2px solid  #F7F5F8;"><i style="color:#e72b38;" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button>
                </br>
            </form>
      </div>
    </div>
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


    @endsection
