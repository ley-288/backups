@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('New Post'))

@section('content')

<style>

.hide{
    display: none;
}

audio, canvas, progress, video {
    display: inline-block;
    vertical-align: baseline;
    height: 40vh;
    width: 100vw;
}

.modal {
    //margin-top:45vh;
    //height:50vh;
    //width:110vw;
}

.modal-header{
    border-bottom:none;
}

.btn.btn-default{
    background:transparent;
    border:none;
}

.btn.btn-default.active, .btn.btn-default:active, .btn.btn-default:hover, .show>.btn.btn-default{
    background:transparent;
    border:none;
}

.control-me::after {
    content: ;
    height:20px;
    width:20px;
    font-size: 20px;
}
#map:checked ~ .control-me::after {
    content: ;
}

label {
    background: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
}

.visually-hidden {
    position: absolute;
    left: -100vw;
    
    /* Note, you may want to position the checkbox over top the label and set the opacity to zero instead. It can be better for accessibilty on some touch devices for discoverability. */
}


#mobile_search_function{
    display:none;
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
  //background-color:white;
  //font-family: Arial;
}


.header {
  text-align: center;
  padding: 32px;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create four equal columns that sits next to each other */
.column {
  -ms-flex: 100%; /* IE10 */
  flex: 100%;
  max-width: 100%;
  padding: 0 4px;
}


/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    -ms-flex: 100%;
    flex: 100%;
    max-width: 100%;
  }
}



.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
    border:none;
    border-radius:25px;
    color:red;
}


    .kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
        display:flex;
        flex-direction: column;
    }

    @media screen and (min-width: 10240px){

        #influencer_azienda_boxes{
            margin-left:60px;
        }


        #profile_button{
            margin-left:50vw;
        }

        #post_header_image_and_name{
            margin-left:70px;
        }

            .column img {
                margin-top: 8px;
                vertical-align: middle;
                width:100%;
            }

            #tab2{
                margin-top:50px;
                }

            .nav-tabs {
                position:absolute;
                border:none;
                margin-left:25%;
                margin-top:-50px;
                }

             .col-lg-6{
                width:100%;
            }

             #pill_to_top_and_center{
                margin-top:60px;
                margin-left:-25%;
            }

            .kt-portlet{
                padding:0;
                width:100%;
                margin-left:50px;
                }
        
            #single_post_comment_display_panel{
                width:130%;
                }
            
            .card-container{
                height:100px;
                width:700px;
                margin-bottom: 10px; 
                //background-color:yellow; 
                padding: 10px;
                padding-left:30px; 
                border-radius:25px; 
                box-shadow: 4px 4px 4px 4px #F7F5F8;
                }

            #plus_btn_follow{
                margin-top:-15px;
                border-radius:25px;
                border:2px solid white;
                background-color:#5979FB;
                color:white; 
                }
            
            iframe{
                margin-top:-22px;
                margin-bottom:-45px;
                margin-left:-16px;
                border:1px solid white;
                position:relative;
                width:111%;
                height:500px;
                }

            #user_posts_pills{
                padding-bottom:50px;
                margin-left:40px;
                }
            
            #search_name_div{
                margin-top:-60px;
                margin-left:60px;
                }

            #search_name_line{
                font-size:14px;
                }

            #search_username_line{
                font-size:10px;
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

            hr{
                color:transparent;
                }
            
            #verified_img_sm{
                position:absolute; 
                height:15px; 
                width:15px; 
                margin-top:0px; 
                margin-left:10px;
                }

            #groups_in_search{
                display:block;
                margin-left:45%;
                width:400px;
                margin-top:10px;
                } 

             #group_name_in_search{
                position:absolute;
                margin-left:80px;
                margin-top:0px;
                font-size:10px;
                }

            #group_members_count_in_search{
                position:absolute;
                margin-left:110px;
                margin-top:23px;
                }

            #admin_photo_in_search{
                position:absolute;
                height:50px;
                width:50px;
                border-radius:25px;
                margin-top:-5px;
                margin-left:-170px;
                }

            #verified_img_sm_group{
                height:20px;
                width:20px;
                margin-top:-105px;
                margin-left:350px;
                }

            #verified_img_sm_group_star{
                height:20px;
                width:20px;
                margin-top:-145px;
                margin-left:320px;
                }

            #verified_img_sm_group_star_unverified{
                height:20px;
                width:20px;
                margin-top:-105px;
                margin-left:320px;
                }

            #group_icon_in_search{
                position:absolute;
                margin-top:17px;
                margin-left:-100px;
                }

                #tab1{
   margin-top:20px;
}
                     
           .scroll { 
  margin-top:-140px;
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  width: auto;
}

#emoji_scroll { 
  height:50px;
  margin-top:-10px;
  margin-left:60px;
  padding-top:10px;
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  width: auto;
}

#emoji_icon{
    font-size:14px;
    background-color:transparent;
    border-radius:25px;
    padding:10px;
    margin-right:5px;
}

.image-area-story{
    position: fixed;
    height: 100vh;
    width: 100%;
    top:0;
}

.image-area{
    position: relative;
    width: 100vw;
    margin-top:15px;
}

#story_send_btns{
    position:fixed;
    bottom:0;
}

#verified_img_sm_mess_list{
    height:12px;
    width:12px;
}

#check_in_location{
    position:absolute;
    margin-top: -50px;
    margin-left: 25vw;
}

#map_in_post_frame{
    width:100vw;
    height:300px;
    margin-top:30px;
}

#open_map_button{
    background-color:white;
    border-radius:25px;
    border:none;
}


#hashtag_button{
    background-color:white;
    border-radius:25px;
    border:none;
}

#open_foto_button{
    background-color:white;
    border-radius:25px;
    border:none;
}

#add_foto_loc{
    position:absolute; margin-top:-580px; margin-left:39vw;
}

#add_post_loc{
    position:absolute; margin-left:39vw; margin-top:-50px;
}

#tag_loc{
    position:absolute; margin-left:70px; margin-top:-50px;
}

#hashtag_loc{
    position:absolute; margin-left:150px; margin-top:-50px;
}

#gmaps_loc{
    position: absolute;
    height: 50px;
    width: 55px;
    background-color: white;
    border-radius: 25px;
    margin-left: 250px;
    margin-top: -60px;
}

#gmaps_button{
    height:40px;
    width:40px;
    margin-top:5px; 
    margin-right:0px;
}

#social_loc{
    margin-left:60px;
}

#tags{
    width:650px;
}

#hashtags{
    width:650px;
}

#locazioni{
    width:650px;
}

#post_text_area{
    width:650px;
}
#link_box_width{
    width:650px;
}

.findMyLocation{
	text-align: center;
        margin: 10px 0;
}
    }


    @media screen and (max-width: 1024px){

      #mobile_header_style{
        display:none;
      }

        #desktop_layout{
            margin-top:0px;
        }

        #influencer_azienda_boxes{
            margin-bottom:30px;
        }

        #profile_button{
            margin-left:75vw;
        }

        body{
            background-color:white;
        }

        .kt-container{
            overflow-x:clip;
        }

        .kt-header-mobile{
            //display:none;
        }
        
            .column img {
                margin-top: 8px;
                vertical-align: middle;
                width:100%;
                }

            #tab2{
                margin-top:30px;
                }

            .nav-tabs {
                position:absolute;
                border:none;
                margin-left:2%;
                margin-top:10px;
                }

            #pill_to_top_and_center{
                margin-top:-10px;
                }

            .col-lg-6{
                width:100%;
                }

            .kt-container{
                padding:0;
                }

            .card-container{
                height:100px;
                width:310px;
                margin-left:5px;
                margin-top:-30px;
                margin-bottom: 0px; 
                background-color:transparent; 
                padding: 10px; 
                border-radius:10px; 
                box-shadow: 4px 4px 4px 4px #F7F5F8;
                }
            
            #plus_btn_follow{
                margin-left:25%;
                margin-top:-15px;
                border-radius:25px;
                border:2px solid white;
                background-color:#5979FB;
                color:white; 
                }
            
            #iframe_in_post{
                margin-left:3px;
                width:105%;
                height:100%;
                margin-right:-15px;
                }

            #user_posts_pills{
                padding-bottom:50px;
                margin-left:10%;
                }
            
            
        	#social_following{
        	    margin-left:-25px;
        	    padding-left:-5px;
        	    padding-rght:-5px;
        	    }
            
            #single_post_comment_display_panel{
                width:114%;
                margin-left:-35px;
                }

            #search_closer_to_nav{
                margin-top:-50px;
                }

            #posts{
                margin-top:-20px;
                }

            #users{
                margin-top:-30px;
                }
            
            #search_name_div{
                margin-top:-60px;
                margin-left:60px;
                }

            #search_name_line{
                font-size:12px;
                }

            #search_username_line{
                font-size:8px;
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
                margin-left:65%;
                }

            #msg_srch_btn{
                margin-top:-50px;
                height:30px;
                width:30px;
                border:1px solid transparent;
                border-radius:15px;
                background-color:#25D366;
                }
            
            #verified_img_sm{
                position:absolute; 
                height:15px; 
                width:15px; 
                margin-top:-2px; 
                margin-left:10px;
                }
            
            #groups_in_search{
                display:block;
                margin-left:auto;
                margin-right:auto;
                width:300px;
                }

            #group_name_in_search{
                position:absolute;
                margin-left:60px;
                margin-top:0px;
                }

            #group_members_count_in_search{
                position:absolute;
                margin-left:90px;
                margin-top:23px;
                }

            #admin_photo_in_search{
                position:absolute;
                height:50px;
                width:50px;
                border-radius:25px;
                margin-top:-5px;
                margin-left:-130px;
                }

            #verified_img_sm_group{
                position:absolute;
                height:20px;
                width:20px;
                margin-top:-70px;
                margin-left:300px;
                }

            #verified_img_sm_group_star{
                height:20px;
                width:20px;
                margin-top:-135px;
                margin-left:270px;
                }

            #verified_img_sm_group_star_unverified{
                height:20px;
                width:20px;
                margin-top:-135px;
                margin-left:270px;
                }

            #group_icon_in_search{
                position:absolute;
                margin-top:17px;
                margin-left:-70px;
                }
            
            #border_box {
                width:380px;
                margin-left:auto;
                margin-right:auto;
            }

             div.scrollmenu { 
            margin-top:-20px;
            background-color: transparent;
            overflow: auto;
            white-space: nowrap;
            height:85px;
            max-width:110vw;
            margin-bottom:20px;
            margin-left:10px;
			padding-left:0px;
            }

        div.scrollmenu a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
            }

        div.scrollmenu a:hover {
            background-color: transparent;
            }
#tab1{
   margin-top:-50px;
}
                 
.scroll { 
  margin-top:-140px;
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  width: auto;
}

#emoji_scroll { 
  height:50px;
  margin-top:-40px;
  padding-top:10px;
  overflow-x: scroll;
  overflow-y: hidden;
  white-space: nowrap;
  width: auto;
}

#emoji_icon{
    font-size:14px;
    background-color:transparent;
    border-radius:25px;
    padding:10px;
    margin-right:5px;
}

.image-area-story{
    position: fixed;
    height: 100vh;
    width: 110vw;
    top:0;
}

.image-area{
    position: relative;
    max-width: 100vw;
    //max-height:50vh;
    margin-top:15px;
}

#story_send_btns{
    position:fixed;
    bottom:0;
}

#verified_img_sm_mess_list{
    height:12px;
    width:12px;
}

#check_in_location{
    position:absolute;
    margin-top: -50px;
    margin-left: 38vw;
}

#map_in_post_frame{
    width:100vw;
    height:300px;
    margin-top:30px;
}

#open_map_button{
    background-color:white;
    border-radius:25px;
    border:none;
    box-shadow: 4px 4px 4px 4px #F7F5F8;
}

#hashtag_button{
    background-color:white;
    border-radius:25px;
    border:none;
    box-shadow: 4px 4px 4px 4px #F7F5F8;
}

#open_foto_button{
    background-color:white;
    border-radius:25px;
    border:none;
    box-shadow: 4px 4px 4px 4px #F7F5F8;
}

#add_foto_loc{
    position:absolute; margin-top:-550px; margin-left:57vw;
}

#add_post_loc{
    position:absolute; margin-left:57vw; margin-top:-60px;
}

#tag_loc{
    position:absolute; margin-left:5px; margin-top:-60px;
}

#hashtag_loc{
    position:absolute; margin-left:20vw; margin-top:-60px;
}

#gmaps_loc{
    position: absolute;
    height: 50px;
    width: 55px;
    background-color: white;
    border-radius: 25px;
    margin-left: 43vw;
    margin-top: -75px;
    box-shadow: 4px 4px 4px 4px #F7F5F8;
}

#gmaps_button{
   margin-top:5px; margin-right:8px;
}

#social_loc{
    margin-top:-10px;
    margin-left:10px;
}

#tags{
    width:100vw;
}

#locazioni{
    width:100vw;
}

#post_text_area{
    width:100vw;
}

#link_box_width{
    width:100vw;
}

.findMyLocation{
	text-align: right;
        margin-top:15px;
        margin-right:10px;
}
        
    }

    .nav-pills>li.active>a{
        background-color:#5979FB;
    }

    nav-pills>li.active>a, .nav-pills>li.active>a:focus, .nav-pills>li.active>a:hover {
        background-color:#5979FB;
    }

    .nav>li>a{
        color:black;
    }

    .list-item {
        width: 150px;
        height: 50px;
        background: white;
        margin-left: 10px;
        display: inline-block;
    }

    #search_cat_name{
        font-size:18px;
        margin-top:12px;
        margin-left:10px;
    }
    
    #loadOverlay{display: none;}

	
</style>

<div>

<!-- Tab panes -->

<div class="tab-content">
    <div role="utenti" class="tab-pane fade in active" id="tab1">  

        <div id="post_header_image_and_name" class="pull-left">
            @if($user->avatar_location)
                
                <a href="#">
                    <img class="media-object img-circle post-profile-photo" style="max-height:60px; max-width:60px; border-radius:30px;" src="{{asset('storage/'.$user->avatar_location)}}">
                </a>
                
            @else
                <a href="{{ url('/social/'.$user->username) }}">
                    <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="max-height:50px; max-width:50px; border-radius:25px;"/>
                </a>
            @endif
        </div>

        
           
        <div id="locationModal" class="" tabindex="-1" role="dialog">
            <div role="document">
                <div>
                    <div>
                        <div style="margin-left:0px;" id="new_post_box_height" class="panel panel-default new-post-modal">
                            <div>
                            <form style="overflow-x:hidden; width:100%;" id="form-new-post">
                                <input type="hidden" name="group_id" value="">
                                    <div class="image-area">
                                        <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                                        <div class="image_or_video_preview"></div>
                                    </div>
                                    </br>
                                        
                                        {{--<img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/pensando.png" alt="YouTube" style="height:30px; width:30px;margin-left:5px;margin-top:10px;"> <h4 style="position:absolute; margin-left:40px; margin-top:-25px;">New Post</h4>--}}

                                    </br></br>

                                   
                                    
                                    <textarea id="post_text_area" style="margin-top:-40px; height:110px; border-top-left-radius: 25px; border-top-right-radius: 25px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;" rows = '8' name="content" class="content" @if($user->hasRole('influencer')) placeholder="@lang('applicazione.cosa_stai_pensando')" @else placeholder="@lang('applicazione.cosa_stai_pensando')" @endif></textarea>

                                    <textarea id="link_box_width" style="height:50px; border-radius:0px; margin-top:5px; color:#5979FB;" rows = '4' name="link" class="link"  placeholder="@lang('applicazione.condividi_qui_video')"></textarea>
     
                                    <textarea id="hashtags" style="margin-top:-10px; height:80px;  border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; color:#5979FB;" rows = '8' name='hashtags' placeholder=''></textarea>

                                    <textarea id="tags" style="margin-top:-10px; height:80px;  border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; color:#5979FB;" rows = '8' name='tags' placeholder=''></textarea>
                                    
                                    <textarea id="locazioni" style="margin-top:-5px; height:65px; border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-left-radius: 25px; border-bottom-right-radius: 25px;" rows = '2' name='location' class="form-control location-input" placeholder='Location' value="" ></textarea>
                                                                      
                                    <input type="hidden" value="" class="map-info" name="map_info" id="map_info">
                                    </br>
                                    </br>

                                  
                                    </br>
                                                                         
                                  
                                    </br>
                                                                                                             

                                    

                                     @if($user->id == 274)
                                     </br>
                                    <div style="display:flex; padding-bottom:20px;" id="influencer_azienda_boxes">
                                        <div style="padding-right:20px;" class="azienda_box_yes">
                                            <label for="azienda" class="">azienda</label>
                                            <input type="checkbox" name="azienda" value="1" id="azienda_box" @if(['azienda'] == 1){{ 'checked' }}@endif>
                                        </div>
                                        <div class="influencer_box_yes">
                                            <label for="influencer" class="">influencer</label>
                                            <input type="checkbox" name="influencer" value="1" id="influencer_box" @if(['influencer'] == 1){{ 'checked' }}@endif>
                                        </div>
                                    </div>  
                                    @endif  
                                    </br></br>
                                    <div class="row">

                                        <div class="col-xs-6" id="add_foto_loc">
                                            <button type="button" style="height:50px; width:135px;" id="open_foto_button" onclick="uploadPostImage()">
                                            Camera
                                                <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/fotocamera.png" alt="YouTube" style="height:30px; width:30px; margin-top:1px; margin-left:2px;">
                                            </button>
                                          
                                            <input type="file" class="image-input" name="photo" onchange="previewPostImage(this)">
           
                                        </div>

                                         <div class="col-xs-4" id="tag_loc">
                                        <button type="button" style="height:50px; width:55px;" id="open_map_button" data-toggle="modal" data-target="#tagUsersModal">
                                            
                                            <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/at.png" alt="YouTube" style="height:30px; width:30px; margin-top:1px; margin-left:2px; box-shadow:none;">
                                        </button>
                                        </div>

                                        <div class="col-xs-4" id="hashtag_loc">
                                        <button type="button" style="height:50px; width:55px;" id="hashtag_button" onclick="CopyToHashtagArea();">
                                            
                                            <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/hashtag.png" alt="YouTube" style="height:30px; width:30px; margin-top:1px; margin-left:2px; box-shadow:none;">
                                        </button>
                                        </div>

                                        <div class="findMyLocation">
                                            <a href="javascript:;" onclick="findPostLocation({{ $user->id }})"> 
                                            <div id="gmaps_loc">
                                                <img class="im_pro" id="gmaps_button" src="{{url('/')}}/assets/media/icons/socialbuttons/map_pin.png" alt="GMaps" style="height:30px; width:30px; margin-top:10px; margin-right:12px;  box-shadow:none;"></a>
                                            </div>
                                        </div>


                                        <div class="col-xs-4" id="add_post_loc">
                                            <button type="button" style="height:50px; width:135px;" id="open_map_button" onclick="newPostModal();">
                                            Post
                                                <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/send.png" alt="YouTube" style="height:30px; width:30px; margin-top:1px; margin-left:2px;">
                                            </button>
                                        </div>
                                    

                                        <div style="border-radius:25px; background-color:transparent;" id="loading">
                                            <img id="loading-image" src="{{url('/')}}/assets/images/loading.gif" alt="Loading..." />
                                        </div>
                                    </div>    
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                <div style="width:100vw;" class="modal fade" id="tagUsersModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div style="border-radius:25px;" class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="no_show_new_message" class="modal-title">Tag Amici</h5>
                            </div>
                            <div class="user_list">
                                <div class="form-group">
                                    <input style="border-radius:25px;" type="text" class="form-control" id="modal-search"  onkeyup="searchUserList()" placeholder="@lang('applicazione.cerca_contatti')">
                                </div>
                                </br>
                                <table id="modal-table">
                                    @foreach($user_list_chats->get() as $f)
                                    <tr>
                                        <td>
                                        <div class="image" >
                                            @if($f->follower->avatar_location)
                                                <img src="{{asset('storage/'.$f->follower->avatar_location)}}" class="img-circle" style="max-height:30px; margin-left:15px; margin-bottom:10px;" />
                                            @else
                                                <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" class="img-circle" style="max-height:30px;"/>
                                            @endif
                                        </div>
                                        <div>

                                        {{--<a href="#" onclick="myFunFunction(this);">{{ '@'.$f->follower->username }} <p onclick="CopyToIdArea(this);" style="position:absolute; visibility:hidden;">{{ $f->follower->id }}</p></a>--}}
                                           <a style="position:absolute; margin-left:80px; margin-top:-35px; font-size:14px;" href="#" onclick="CopyToTagArea(this); tageduser(this);">{{ $f->follower->username }}</a>

                                        <div>
                                            <a href="{{ url('/social/'.$f->follower->username) }}">
                                                <button id="profile_button" style="position:absolute; color:white; background-color:#5979FB; border-radius:25px; border:none; margin-top:-35px;">Profilo</button>
                                            </a>
                                        </div>

                                        </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    <button style="margin-top:-120px; margin-left:80vw;" id="big_close_button" type="button" class="btn btn-default btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                                        <i id="image_button_id_logo" class="material-icons md-12">close</i>
                                    </button>
                                    
                                </table>
                                </br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



</br></br></br></br>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script>

function tageduser(element){
  $(element).closest("tr").addClass("hide");
}

function CopyToTextarea(el){
  var text = el.textContent;
  var textarea = document.getElementById('post_text_area');
  textarea.value = textarea.value + text;
}


function CopyToHashtagArea() {
  var txt = $("#hashtags").val();
  $("#hashtags").val(txt + "#");
}

//add

function CopyToTagArea(el){
  var text = el.textContent;
  var textarea = document.getElementById('tags');
  textarea.value = textarea.value + text + ' ';
  
}

//remove

function CopyToTagArea(el){
  var text = el.textContent,                           // get this <a> text
      textarea = document.getElementById('tags'),  // textarea id
      textareaValue = textarea.value,                  // text area value
      Regex = new RegExp(text + ' ', 'g'),            // make new regex with <a> text and \n line break 
      textareaValue = textareaValue.indexOf(text+' ') > -1 ?  textareaValue.replace(Regex, '') : textareaValue + text+' '; // this is something similar to if statement .. mean if the textarea has the <a> text and after it line break .. replace it with its line break to blank (remove it) .. if not its not on textarea add this <a> text to the textarea value
  textarea.value = textareaValue ;                     // change the textarea value with the new one
}


</script>

<script>
    $(".ignore-click").click(function(){
        return false;
    });
</script>


@endsection


@push('after-scripts')


<script>

window.onload = function () {
  window.scrollTo(1, 1);
}

</script>

@endpush
