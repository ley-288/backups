@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Followers'))

@section('content')

@push('after-styles')

<style>

body{background:white;}
.im_pro_edit{
            height:40px;
            width:40px;
            margin-right:10px;
            margin-left:5px; 
            margin-top:10px;
        }


ul{
    list-style-type: none;
}

.modal-header{
    border-bottom: none;
}

#modal_close_btn{
    background-color:transparent;
    color:black;
    margin-left:75vw;
    border:none;
    margin-top:-40px;
    width:30px;
    box-shadow:none;
}
#mobile_search_function{
    display:none;
}
    @media screen and (max-width: 1024px){

    .profile{
      height:70px;
    }

         body.modal-open {
        overflow: hidden !important;
        margin-top:11% !important;
    }

        #mobile_header_style{
        display:none;
      }

        #desktop_layout{
            margin-top:-20px;
        }

        #whole_body_up{
            margin-top:-50px;
        }


        #user_modal_photo{
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    flex-direction: row;
    align-content: center;
    align-items: center;
        }

        #user_modal_followings{
            margin-left:12vw;
            margin-top:120px;
        }

        #user_modal_links{
            margin-top: 30px;

            //max-height: 220px;
            padding-bottom: 20px;
            
        }

        #follow_in_modal_btn{
            position:absolute;
            margin-top:-50px;
            margin-left:22vw;
        }

        #block_in_modal_btn{
            position:absolute;
            margin-top:-60px;
            margin-left:16vw;
        }

        #social_following{
        	display:block;
        	margin-left: auto;
        	margin-right: auto;
        	}       
            
        #flw_btn_flw{
            margin-left:70%;
            margin-top:-45px;
            }

        .card-container{
            height:80px;
            width:330px;
            margin-left:10px;
            margin-bottom: 10px; 
            padding: 10px; 
            border-radius:10px; 
            box-shadow: none;
            }

        #flw_name_card{
            margin-top:-70px;
            margin-left:80px;
            }

        #font_for_flw_card{
            font-size:10px;
            }  

        .content-page-title {
            color: #2d2d2d;
            border-bottom: none;
            padding-bottom: 10px;
            margin-bottom: 15px;
            } 

        #msg_dm_btn_bar{
            font-size:2rem;
            margin-left:-2px;
            margin-top:3px;
            color:white;
            }

        #message_dm_open_btn{
            position:absolute;
            margin-top:-30px;
            margin-left:62%;
            //width:70px;
            }

        #msg_srch_btn{
            margin-top:-50px;
            height:30px;
            width:30px;
            border:1px solid transparent;
            border-radius:15px;
            background-color:#25D366;
            } 

        #verified_img_sm_follow{
            position:absolute; 
            height:12px; 
            width:12px; 
            margin-top:0px; 
            margin-left:2px;
            }    
    }

    @media screen and (min-width: 1024px){

        #user_modal_photo{
            display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    flex-direction: row;
    align-content: center;
    align-items: center;
        }

        #user_modal_followings{
            margin-left:7vw;
            margin-top:120px;
        }

        #user_modal_links{
            margin-top:30px;
            //margin-left:6vw;

            //max-height: 260px;
            margin-bottom: 10px;
            overflow:scroll;
            -webkit-overflow-scrolling: touch;
        }

        #follow_in_modal_btn{
            position:absolute;
            margin-top:-50px;
            margin-left:11vw;
        }

        #block_in_modal_btn{
            position:absolute;
            margin-top:-60px;
            margin-left:4vw;
        }

         body{
            overflow-x:hidden;
            }

        #space_between_count_and_list{
            margin-top:-30px;
        	}
            
        #flw_btn_flw{
            margin-left:80%;
            margin-top:-45px;
            }

        .card-container{
            height:80px;
            width:100%;
            margin-bottom: 10px; 
            margin-left:20px; 
            padding: 10px;
            padding-left:30px; 
            border-radius:10px; 
            //box-shadow: 4px 4px 4px 4px #F7F5F8;
            }

        #flw_name_card{
            margin-top:-75px;
            margin-left:80px;
            }

        #font_for_flw_card{
            font-size:14px;
            }

        .content-page-title {
            color: #2d2d2d;
            border-bottom: none;
            padding-bottom: 10px;
            margin-bottom: 15px;
            margin-left:25px;
            }
            
        #msg_dm_btn_bar{
            margin-left:-1px;
            margin-top:4px;
            color:white;
            }

        #message_dm_open_btn{
            position:absolute;
            margin-top:-30px;
            margin-left:80%;
            }

        #msg_srch_btn{
            margin-top:-50px;
            height:34px;
            width:34px;
            border:1px solid transparent;
            border-radius:17px;
            background-color:#25D366;
            }

        #verified_img_sm_follow{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:0px; 
            margin-left:5px;
            }
    }

    .dropdown-menu{
        border-radius:15px;
    }

    #padded_plus_menu_box{
        padding:10px;
        height:145px;
    }

    #padded_plus_menu_box_2{
        padding:10px;
        height:175px;
    }

    #plus_btn_follow_list{
        margin-left:-15px;
        margin-top:-15px;
        width:70px;
        border-radius:5px;
        border: 2px solid #F7F5F8;
        //background-color:white;
        background-image: linear-gradient(#e72b38, #e72b80);
        color:white; 
    }

    .btn-group.dropleft .btn.dropdown-toggle:after, .btn-group.dropleft .nav-link.dropdown-toggle:after{
        display:none;
        color:black;
    }

    .btn.btn-default.following-button{
        position:absolute;
        background-color:transparent;
        width:200px;
    }
    
    .btn.btn-default.follow-button{
        background-color:transparent;
        color:black;
        width:200px;
    }

    .follow-button{
        position:absolute;
        border-radius:5px;
        color:black;
        width:200px;
        margin-top:10px;
    }

    .request-button{
        position:absolute;
        border-radius:5px;
        color:black;
        width:100%;
        margin-top:10px;
    }

    .following-button{
        position:absolute;
        border-radius:5px; 
        color:black;
        width:200px; 
        margin-top:10px;  
    }

    #msg_snd_menu_option{
        color:white;
        background-color:#25D366;
        border:1px solid white;
        border-radius:5px;
        width:200px;
        height:35px;
        margin-bottom:10px;
    }

    #msg_snd_option_position{
        margin-top:0px;
    }

    .btn-danger-deny{
        color:white;
        background-color:#e72b38;        
        border-radius:5px; 
        width:150px;
        margin-top:55px; 
        margin-left:7vw;      
    }

    .request-button:hover:after {
        border-radius:5px;
        content: 'Undo!';
        color:black;
        width:200px;
    }
    
    .request-button:after {
        border-radius:5px;
        content: 'Inviato!';
        color:white;
        width:200px;
    }

    .following-button:after {
        border-radius:15px;
        content: 'Segui gia';
        color:black; 
        width:200px;
    }

    .following-button:hover:after {
        border-radius:5px;
        content: 'Non segui';
        color:black;
        width:200px; 
    }

    #block_red_unblock {
        color:white;
        background-color:#e72b38;
        border:1px solid white;
        border-radius:5px;
        width:200px;
        height:35px;
        margin-top:55px;
    }

    .denied-button:after{
        content: 'unblock';
    }

    #loadOverlay{display: none;}
    	
</style>

@endpush
<div class="content-page-title" style="margin-top: -50px; display:flex; margin-left:15px; font-weight:bold;">
                         <a href="{{ URL::previous() }}">
                          <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
                          </a>
                            Followers {{--({{ $list->count() }})--}}
                        </div>

                        </br></br>
<div class="profile">
    @include('profile.widgets.sidebar_follow')
    <hr>
        @if ($can_see)
            <div id="whole_body_up">
                <div class="row">
                    <div id="social_following">
                        
                      

                    </div>
                    <div id="space_between_count_and_list" class="col-md-8" style="    margin-top: 40px;margin-left:15px;">
                        {{--<div class="content-page-title" style="display:flex; margin-left:15px; font-weight:bold;">
                         <a href="{{ URL::previous() }}">
                          <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
                          </a>
                            Followers 
                        </div>--}}
                        @if($list->count() == 0)
                            <div style="border-radius:15px; border:1px solid white;"  class="alert-message alert-message-danger">
                                <h4>Users not found.</h4>
                            </div>
                        @else
                            <div class="row">
                                @foreach($list as $relation)
                                @if($relation->follower->active == 1)
                                    <div class="col-sm-10 col-md-12">
                                        <div class="card-container">
                                            <div>
                                                <div>                                                   
                                                    <div>
                                                        <a href="{{ url('/social/'.$relation->follower->username) }}">    
                                                            @if($relation->follower->avatar_location)
                                                            
                                                                <img src="{{asset('storage/'.$relation->follower->avatar_location)}}" style="height:70px; width:70px; border-radius:35px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;"/>
                                                          
                                                            @else
                                                            
                                                                <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="height:70px; width:70px; border-radius:35px; box-shadow: 2px 2px 10px 10px #F7F5F8;"/>
                                                           
                                                            @endif
                                                        </a>                                                      
                                                    </div>
                                                    <div>
                                                        <div id="flw_name_card">
                                                        
                                                        <h3 id="font_for_flw_card" class="name" style="font-weight:bold;">
                                                        @if($relation->follower->hasRole('brand') || $relation->follower->company == 1) 
                                                            @if(!empty($relation->follower->azienda_nome))
                                                                {{ $relation->follower->dettagli->azienda_nome }}
                                                            @else
                                                                {{$relation->follower->name}}
                                                            @endif 
                                                        @else
                                                            {{ $relation->follower->name }}
                                                        @endif

                                                        @if($relation->follower->verified == 1)
                                                            <img id="verified_img_sm_follow" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                                                        @elseif($relation->follower->gold == 1)
                                                            <img id="verified_img_sm_follow" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                                                        @elseif($relation->follower->staff == 1)
                                                            <img id="verified_img_sm_follow" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                                                        @endif
                                                        </h3>
                                                       
                                                           
                                                                <p id="font_for_flw_card" class="profession">
                                                                    {{ $relation->follower->username }}
                                                                        @if($relation->follower->canSeeProfile(Auth::id()))
                                                                            {{--<small>{{ Auth::user()->distance($relation->follower) }}</small>--}}
                                                                        @else
                                                                            <small>(Private)</small>
                                                                        @endif
                                                                </p> 
                                                        </div>

                                                        
                                                        {{--<div id="message_dm_open_btn" >
                                                            <a data-item="{{ $relation->follower->name }}" data-toggle="modal" data-target="#usermodal-{{ $relation->follower->id }}" id="plus_btn_follow_list"  type="button" class="btn btn-block" >
                                                               APRI
                                                            </a>
                                                        </div>--}}

                                                        <div id="message_dm_open_btn" >
                                                            <a href="{{ url('/social/'.$relation->follower->username) }}" id="plus_btn_follow_list"  class="btn btn-block" >
                                                               Profilo
                                                            </a>
                                                        </div>
                                                        
                                                         
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @else
            <div class="container">
                <div class="alert-message alert-message-default">
                    <h4>{{ '@'.$relation->follower->username."'s" }} profile is private.</h4>
                    <p>Please follow to see {{ '@'.$relation->follower->username."'s" }} profile.</p>
                </div>
            </div>
        @endif
        </br></br></br></br></br></br></br></br></br></br></br>
</div>

{{--
@foreach($list as $relation)
<div class="modal fade"  id="usermodal-{{ $relation->follower->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="height:80vh;">
            <div class="modal-header">
                <h5 class="modal-title" id="name_title">{{$relation->follower->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="margin-left:0px;" id="new_post_box_height" class="panel panel-default new-post-modal">

                    <button id="modal_close_btn" type="button" class="btn btn-default btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                        <i class="material-icons md-12">close</i>
                    </button>


                    <div id="user_modal_photo">
                    @if($relation->follower->avatar_location)
                        <a href="{{ url('/social/'.$relation->follower->username) }}">
                            <img src="{{asset('storage/'.$relation->follower->avatar_location)}}" style="max-height:70px; max-width:70px; border-radius:35px; box-shadow: 2px 2px 10px 10px #F7F5F8;"/>
                        </a>
                    @else
                        <a href="{{ url('/social/'.$relation->follower->username) }}">
                            <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="height:70px; width:70px; border-radius:35px; box-shadow: 2px 2px 10px 10px #F7F5F8;"/>
                        </a>
                    @endif
                    </div>



<div style="margin-top:15px; display:flex; flex-direction: row;flex-wrap: wrap;justify-content: space-evenly;">
        <div class="col-xs-3">
            <a href="{{ url('/social/'.$relation->follower->username.'/following') }}">
                <p style="text-align:center;">{{ $relation->follower->following()->where('allow', 1)->count() }}</p>
            </a>
            <p style="text-align:center;">Following</p>
        </div>
        <div class="col-xs-3">
            <a href="{{ url('/social/'.$relation->follower->username.'/followers') }}">
                <p style="text-align:center;">{{ $relation->follower->follower()->where('allow', 1)->count() }}</p>
            </a>
            <p style="text-align:center;">Followers</p>
        </div>
        <div class="col-xs-3">
            <a href="#">
                <p style="text-align:center;"> @if(!empty($relation->follower->dettagli)){{$relation->follower->dettagli->facebook_follower + $relation->follower->dettagli->twitter_follower + $relation->follower->dettagli->instagram_follower + $relation->follower->dettagli->youtube_follower + $relation->follower->dettagli->linkedin_follower + $relation->follower->dettagli->tiktok_follower + $relation->follower->dettagli->pinterest_follower + $relation->follower->dettagli->snapchat_follower + $relation->follower->dettagli->twitch_follower + $relation->follower->dettagli->reddit_karma + $relation->follower->dettagli->tumblr_follower + $relation->follower->dettagli->myspace_follower + $relation->follower->dettagli->quora_follower + $relation->follower->dettagli->weibo_follower + $relation->follower->dettagli->strava_follower + $relation->follower->follower()->where('allow', 1)->count()}} @endif</p>
            </a style="text-align:center;">
            <p>Spiders</p>
        </div>
         
</div>


                    <div>
                        
                    <div id="user_modal_links">

                    <div style="display: flex;justify-content: center;flex-direction: row;flex-wrap: wrap; align-content: center; padding:10px;">
                     <a href="{{ url('/social/'.$relation->follower->username) }}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Facebook"></a>
                        <a href="{{ url('/direct-messages/show/'. $relation->follower->id) }}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/imessage.png" alt="Facebook"></a>
                                    @if(! empty($relation->follower->dettagli->facebook)) <a href="{{$relation->follower->dettagli->facebook}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Facebook"></a>@endif
                                       @if(! empty($relation->follower->dettagli->instagram)) <a href="{{$relation->follower->dettagli->instagram}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/instagram.png" alt="Facebook"></a>@endif
                                        @if(! empty($relation->follower->dettagli->youtube)) <a href="{{$relation->follower->dettagli->youtube}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube.png" alt="Facebook"></a>@endif
                                         @if(! empty($relation->follower->dettagli->tiktok)) <a href="{{$relation->follower->dettagli->tiktok}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/tiktok.png" alt="Facebook"></a>@endif
                                          @if(! empty($relation->follower->dettagli->twitter)) <a href="{{$relation->follower->dettagli->twitter}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png" alt="Facebook"></a>@endif
                                           @if(! empty($relation->follower->dettagli->pinterest)) <a href="{{$relation->follower->dettagli->pinterest}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/pinterest.png" alt="Facebook"></a>@endif
                                            @if(! empty($relation->follower->dettagli->snapchat)) <a href="{{$relation->follower->dettagli->snapchat}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/snapchat.png" alt="Facebook"></a>@endif
                                             @if(! empty($relation->follower->dettagli->twitch)) <a href="{{$relation->follower->dettagli->twitch}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/twitch.png" alt="Facebook"></a>@endif
                                              @if(! empty($relation->follower->dettagli->reddit)) <a href="{{$relation->follower->dettagli->reddit}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/reddit.png" alt="Facebook"></a>@endif
                                               @if(! empty($relation->follower->dettagli->tumblr)) <a href="{{$relation->follower->dettagli->tumblr}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/tumblr.png" alt="Facebook"></a>@endif
                                                @if(! empty($relation->follower->dettagli->myspace)) <a href="{{$relation->follower->dettagli->myspace}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/myspace.png" alt="Facebook"></a>@endif
                                                 @if(! empty($relation->follower->dettagli->linkedin)) <a href="{{$relation->follower->dettagli->linkedin}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png" alt="Facebook"></a>@endif
                                                  @if(! empty($relation->follower->dettagli->quora)) <a href="{{$relation->follower->dettagli->quora}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/quora.png" alt="Facebook"></a>@endif
                                                   @if(! empty($relation->follower->dettagli->weibo)) <a href="{{$relation->follower->dettagli->weibo}}"><img class="im_pro_edit"  style="border-radius:100%; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/weibo.png" alt="Facebook"></a>@endif
                                                    @if(! empty($relation->follower->dettagli->strava)) <a href="{{$relation->follower->dettagli->strava}}"><img class="im_pro_edit" style="border-radius:100%; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/strava.png" alt="Facebook"></a>@endif
                                                  @if(! empty($relation->follower->dettagli->whatsapp)) <a href="{{$relation->follower->dettagli->whatsapp}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png" alt="Facebook"></a>@endif
                                                   @if(! empty($relation->follower->dettagli->skype)) <a href="{{$relation->follower->dettagli->skype}}"><img class="im_pro_edit"  style="border-radius:100%; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/skype.png" alt="Facebook"></a>@endif
                                                    @if(! empty($relation->follower->dettagli->tripadvisor)) <a href="{{$relation->follower->dettagli->tripadvisor}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/tripadvisor.png" alt="Facebook"></a>@endif
                                                     @if(! empty($relation->follower->dettagli->airbnb)) <a href="{{$relation->follower->dettagli->airbnb}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/airbnb.png" alt="Facebook"></a>@endif
                                </div> 
                               
                    </div>
                        

                        
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
--}}
@endsection


@push('after-scripts')

<script src="{{url('/')}}/assets/js/profile.js"></script>

<script>

window.onload = function () {
  window.scrollTo(1, 1);
}

</script>

@endpush
