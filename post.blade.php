@extends('frontend.layouts.social')

@section('content')


<style>

#comment{
    border:none;
    box-shadow:none;
}

    html{
        overflow-x:hidden;
    }

     #modal_share_list{
        margin:5px;
        border:2px solid  #F7F5F8;
        border-radius:15px;
        padding:10px;
        width: 70vw;
    }

    #modal_share_link{
        display: flex;
        align-items: center;
        flex-direction: row;
        justify-content: space-between;
        color:black;
    }

    #newbutn{
        background-image: linear-gradient(#e72b38, #e72b80);
        color:white;
        border-radius:5px;
        border:none;
    }

    .name{
       background-image: linear-gradient(#e72b38, #e72b80);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
    }

    body{
       overflow-x:hidden;
    }

    #form-new-comment textarea::-webkit-input-placeholder {
        font-style: normal;
    }

    .new-post-modal .btn-add-image{
        background:transparent;
        border-color:transparent;
    }

    .btn-secondary.active,
    .btn-secondary:active,
    .btn-secondary:focus,
    .btn-secondary:hover,
    .show>.btn-secondary.dropdown-toggle{
        border:1px solid transparent;
        background-color:transparent;
    }

    .btn-group.open .dropdown-toggle{
        background-color:transparent;
        border:1px solid transparent;
    }

    .bootstrap-dialog.type-primary .modal-header{
        display:none;
    }

    .modal .modal-content{
        margin-top:100px;
        border-radius:25px;
        color:black;
    }

    .modal-header{
        border-bottom:none;
    }

    .modal-footer{
        border-top:none;
    }

    .bootstrap-dialog.type-primary .modal-header{
        border-radius:25px;
        border:1px solid transparent;
        background-color:transparent;
        color:black;
    }

    .close{
        display:none;
    }

    .btn-group.dropleft
    .btn.dropdown-toggle:after,
    .btn-group.dropleft
    .nav-link.dropdown-toggle:after{
        display:none;
    }

    .im_con{
        position: relative;
        z-index: 1;
    }

    .im_con:hover{
        cursor: pointer;
    }

    .panel{
        border:1px solid transparent;
    }

    .fa-heart:before{
        font-size:1.3em;
        margin-left:-2px;
    }

    .fa-heart-o:before{
        font-size:1.3em;
        margin-left:-2px;
    }

   



    @media screen and (min-width: 1024px){

         #ok_yo{
            margin-top:-100px;
            }

        .panel-body{
            box-shadow: none;
        }

        blockquote{
        border-left:none;
    }

     #image_post_video{
            margin-left:-15px;
            height:100%;
            width:820px;
            max-width:840px;
            }
    
    #iframe_facebook {
            padding-top:20px;    
            height:45vh;
            }
    
    #iframe_tiktok{
            position:relative;
            border:none;
            width:90vw;
            margin-left:-330px;
            height:680px;
            }
    
    #likes_comments_count_tiktok{
            margin-top:-10px;
            } 

    #share_like_container_tiktok {
            margin-left: 85%;
            margin-top:-10px;
            display: flex;
            flex-wrap: wrap;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            height: 5px;
        }

#im_com{
    margin-top:25px;
}

#emoji_scroll { 
  position:absolute;
  margin-left:0px;
  height:50px;
  margin-top:-20px;
  padding-top:10px;
  overflow-x: scroll;
  overflow-y: hidden;
  //white-space: nowrap;
  width: auto;
}

#emoji_icon{
    font-size:14px;
    background-color:transparent;
    border-radius:25px;
    padding:10px;
    margin-right:5px;
}

         #image_post_video{
        margin-left:-15px;
        height:100%;
        width:820px;
        max-width:840px;
    }

        #fa_send_max{
            margin-top:10px;
        }

        .post-write-commento {
            position: fixed;
            top: 85vh;
            left: 396px;
            right: 20px;
            background-color:white;
            width:732px;
            height:110px;
            margin-left:-20px;
            padding-top:20px;
            z-index:10;
            }

        #big_close_button{
            position:absolute;
            height:40px; 
            width:40px; 
            border-radius:20px; 
            background-color:white;
            border:1px solid transparent; 
            margin-left:45%;
            margin-top:-48px;
            }

        #post_location_type{
            height:22px;
            width:17px;
            margin-top:-3px;
            }
        
        #post_location_type_no_map{
            height:22px;
            width:17px;
            margin-top:-950px;
            }

        .col-md-offset-2 {
            margin-left: 1%;
            }

        .new-post-modal textarea{
            border-radius:25px;
            padding-top:12px;
            padding-bottom:10px;
            padding-left:10px;
            padding-right:10px;
            width:100%;
            height:100px; 
            margin-left:55px;
            margin-top:20px;
            border-radius:25px;
            }

        .modal-content{
            margin-top:110px;
            border-radius:25px;
            }

        iframe{
            padding-top:30px;
            margin-top:-15px;
            margin-bottom:-45px;
            margin-left:-35px;
            border:1px solid white;
            position:relative;
            width:108%;
            height:60vh;
            border:none;
            }
        
        #image_post_picture{
            display:block;
            margin-left:-35px;
            width:810px;
            max-width:840px;
            margin-bottom:-20px;
            }

        .post_panel{
            width: 100%;
            height: auto;
            display: inline-block;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: normal;
            line-break: strict;
            hyphens: none;
            -webkit-hyphens: none;
            -moz-hyphens: none;
            }
        
        #submit_button_under_comment_box{
            position:relative;
            height:43px;
            width:43px;
            background-color:transparent;
            border:1px solid transparent;
            box-shadow:none;
            margin-left:88%;
            margin-top:-90px;
            }

        #comment_box_under_post{
            border-radius:25px;
            width:95%;
            }

        .share_container{
            display: inline-block;
            float:right;
            margin-top:-20px;
            }

        .social{
            display: inline-block;
            float: right;
            padding: 10px;
            }

        .btn{
            border-radius:25px;
            }

        .im_con{
            max-height: 40px;
            max-width: 40px;
            border-radius: 20px;
            margin-left:10px;
			margin-top:10px;
            }

        .im_con:hover{
            transition:0.2s;
            transform: scale(1.1);
            }

        #post_cog_icon{
            margin-top:-50px;
            margin-right:13px;
            }

        #heart_img:hover{
            transition:0.2s;
            transform: scale(1.1);
            }

        #share_like_container{
            margin-left:80%;
            display: flex;
            flex-wrap: wrap;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            height: 5px;
            }

        #share_btn_left{
            position:absolute;
            margin-left:720px;
            margin-top:-13px;
            }

        #drop_men_icon_bar{
            width:350px;
            height:70px;
            padding-left:10px;
            }

        #likes_margin_left{
            margin-left:10px;
            }
        
        #verified_img_sm_post{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:3px; 
            margin-left:3px;
            } 

    }


    @media screen and (max-width: 1024px){

        body.modal-open {
        overflow: hidden !important;
        margin-top:20% !important;
    }

      #mobile_header_style{
        display:none;
      }

         #desktop_layout{
            margin-top:10px;
        }


        .b{
            margin-top:-3vh;
        }

#im_com{
    margin-top:25px;
}

#emoji_scroll { 
  //position:absolute;
  margin-left:0px;
  height:50px;
  margin-top:-10px;
  padding-top:10px;
  overflow-x: scroll;
  overflow-y: hidden;
  //white-space: nowrap;
  width: auto;
  display:flex;
  flex-direction: row;
    align-items: center;
    justify-content: center;
}

#emoji_icon{
    font-size:14px;
    background-color:transparent;
    border-radius:25px;
    padding:10px;
    margin-right:5px;
    margin-bottom:10px;
}

#likes_comments_count_tiktok{
            margin-top:-30px;
            } 

    #share_like_container_tiktok {
            margin-left: 70vw;
            margin-top:-50px;
            display: flex;
            flex-wrap: wrap;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            height: 5px;
        }


    blockquote{
        border-left:none;
    }

    #iframe_facebook {
            padding-top:20px;    
            margin-top:-15px;
            margin-bottom:-55px;
            margin-left:-12px;
            border:1px solid white;
            position:relative;
            width:102vw;
            height:40vh;
            padding-bottom:0px;
            border:none;
            }

    #iframe_youtube {
            padding-top:20px;    
            margin-top:-15px;
            margin-bottom:-55px;
            margin-left:-10px;
            border:1px solid white;
            position:relative;
            width:102vw;
            height:33vh;
            padding-bottom:0px;
            border:none;
            }

    #iframe_instagram {
            padding-top:20px;    
            margin-top:-15px;
            margin-bottom:-55px;
            margin-left:-10px;
            border:1px solid white;
            position:relative;
            width:102vw;
            height:450px;
            padding-bottom:0px;
            border:none;
            }

    #iframe_facebook {
            padding-top:20px;    
            height:45vh;
            }
    
    #iframe_tiktok{
            position:relative;
            border:none;
            width:90vw;
            margin-left:-5px;
            height:750px;
            }

        #image_post_video{
        margin-left:-5px;
        height:100%;
        width:103vw;
    }

        #ok_yo{
            margin-top:-70px;
            }

        .post-write-commento {
            position: fixed;
            left: 20px;
            right: 20px;
            bottom: 0;
            //backdrop-filter: blur(50px);
            background: white;
            width:100vw;
            height:100px;
            margin-left:-20px;
            padding-top:10px;
            margin-bottom:50px;
            }

        #big_close_button{
            position:absolute;
            height:40px; 
            width:40px; 
            border-radius:20px; 
            background-color:white;
            border:1px solid transparent; 
            margin-left:43%;
            margin-top:-48px;
            }

        #post_location_type{
            height:20px;
            width:15px;
            margin-top:0px;
            margin-left:2px;
        }

        .new-post-modal textarea{
            border-radius:25px;
            padding-top:13px;
            padding-bottom:10px;
            padding-left:10px;
            padding-right:10px;
            width:100%; 
            height:100px;
            margin-top:20px;
            }
        

        .col-md-8{
            padding-left:0px;
            padding-right:0px;
            margin-left:-17px;
            width:110vw;
            }

        .kt-container{
            overflow-x:hidden;
            padding:0;
            }
        
        #post-content{
            margin-left:15px;
            }

        #post_container_iframe{
            font-size: 14px;
            margin-left:-15px;
            }

        iframe {
            padding-top:20px;    
            margin-top:-15px;
            margin-bottom:-45px;
            margin-left:-5px;
            border:1px solid white;
            position:relative;
            width:103%;
            height:33vh;
            padding-bottom:10px;
            border:none;
            }

        #image_post_picture{
            display:block;
            margin-left:-15px;
            margin-bottom:-20px;
            max-width:108%;
            margin-top:-20px;
            }

        #post_header_image_and_name{
            margin-left:10px;
            }

        #comment_box_under_post{
            border-radius:15px;
            width:90%;
            border:2px solid #F7F5F8;
            box-shadow:none;
            }

        #submit_button_under_comment_box{
            position:absolute;
            //height:43px;
            //width:43px;
            background-image: linear-gradient(#e72b38, #e72b80);
            color:white;
            //-webkit-background-clip: text;
            //-webkit-text-fill-color: transparent;           
            //background-color:transparent;
            font-size:15px;
            //border:1px solid transparent;
            box-shadow:none;
            border-radius:5px;
            //margin-left:55%;
            //margin-top:-40px;
            padding:5px;
            }

        .post_panel{
            width: 100%;
            height: auto;
            display: inline-block;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: normal;
            line-break: strict;
            hyphens: none;
            -webkit-hyphens: none;
            -moz-hyphens: none;
            }

        .share_container{
            display: inline-block;
            float:right;
            margin-top: -15px;
            }

        .social{
            display: inline-block;
            float: right;
            padding: 10px;
            }

        .btn{
            border-radius:25px;
            }

        .im_con{
            max-height: 26px;
            max-width: 26px;
            border-radius: 13px;
            margin-left:5px;
			margin-top:10px;
            }

        #post_cog_icon{
                position: absolute;
                margin-top: -60px;
                margin-left: 87vw;
            }

        #share_like_container{
            margin-top: -5px;
            margin-left:70%;
            display: flex;
            flex-wrap: wrap;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            height: 1px;
            }

        #share_btn_left{
            position:relative;
            float:right;
            margin-right:-20px;
            margin-top:-15px;
            }

        #drop_men_icon_bar{
            width:220px;
            padding:2px;
            height: 50px;
            }

        #likes_comments_count{
            margin-top:0px;
            }

        #likes_margin_left{
            margin-left:10px;
            }
       
        #verified_img_sm_post{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:2px; 
            margin-left:3px;
            }

    }

    #loadOverlay{display: none;}

    #map_on_page{
        height:80vh;
        padding-bottom:60px;
    }

</style>






<div class="h-20"></div>
    <div class="container">
        <div class="row">
      
 
           <div id="ok_yo" class="col-md-offset-2 col-md-8">

     


<div style="overflow-x:hidden;" class="b">


    <div class="panel panel-default panel-post" id="panel-post-{{ $post->id }}">
   


        <div style="border-radius:5px; padding:20px;" class="panel-body">
        

            <div id="post_header_image_and_name" class="pull-left">
                @if($post->user->avatar_location)
                <a href="{{ url('/social/'.$post->user->username) }}">
                    <img class="media-object img-circle post-profile-photo" style="max-height:40px; max-width:40px; border-radius:20px;" src="{{asset('storage/'.$post->user->avatar_location)}}">
                </a>
                @else
                <a href="{{ url('/social/'.$post->user->username) }}">
                    <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="max-height:50px; max-width:50px; border-radius:25px;"/>
                </a>
                @endif
            </div>
            
            <div id="post_header_detail" class="pull-left info">
                    <a href="{{ url('/social/'.$post->user->username) }}" class="name">@if($post->user->hasRole('brand') || ($post->user->company == 1)){{$post->user->dettagli->azienda_nome}} @else {{$post->user->name}} @endif
                        @if($post->user->verified == 1)
                            <img id="verified_img_sm_post" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                        @elseif($post->user->gold == 1)
                            <img id="verified_img_sm_post" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                        @elseif($post->user->staff == 1)
                            <img id="verified_img_sm_post" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                        @endif
                    <a href="{{ url('/social/'.$post->user->username) }}" class="username" style="color: #a7abc3 !important;">{{ '@'.$post->user->username }} {{ $post->created_at->diffForHumans() }}</a>
                </div>
            <div class="clearfix"></div>
            
            
            <span>
                 <div class="navbar-right" style="margin-top: 0px; position: absolute;">
                            <div class="dropdown">
                                <button class="pull-right" id="post_cog_icon" class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color:transparent; border:1px solid transparent;">
                                    <i id="heart_img" class="material-icons" style="color:black;" aria-hidden="true">more_horiz</i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dd1" style="margin-top:-20px; margin-left:150px; border-radius:5px; padding:20px;width: 200px;">
                                <div style="display:flex; justify-content: center;">
                                @if($post->checkOwner($user->id) && $post->spider != 1)
                                    <li style="display:flex; justify-content:center;"><button data-mycontent="{{$post->content}}" data-mylink="{{$post->link}}" data-mylocation="{{$post->location}}" data-mypostid="{{$post->id}}" data-toggle="modal" data-target="#editpost" id="edit" style="background-color:white; border:none;    display: flex;flex-direction: column;align-items: center;"><i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color:transparent;" class="material-icons nav__icon" id="bookmark">edit</i> Modifica</button></li>
                                    </br>
                                    
                                    <li style="display:flex; justify-content:center;"><button onclick="deletePost({{ $post->id }})" style="background-color:white; border:none;    display: flex;flex-direction: column;align-items: center;"><i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color:transparent;" class="material-icons nav__icon" id="bookmark">delete</i> Cancella</button></li>
                                @else
                                     <li style="display:flex; justify-content:center;"><button data-toggle="modal" data-target="#reportModal-{{$post->id}}" style="background-color:white; border:none;    display: flex;flex-direction: column;align-items: center;"><i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color:transparent;" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button></li>
                                @endif
                                </div>
                                </ul>
                            </div>
                        </div>
            </span>
             
            
            <div id="post_container_iframe" class="post-content post-content-s post-linkify-{{ $post->id }}" style="padding-left:17px; padding-bottom:15px; padding-right:2px;">
            </br>

<?php

                $content = $post->content;

                if (strstr($content, '#') !== false){
                        
            //Try Different way
            $hashtags = preg_match_all('/#(\w+)/', $content, $match);
            
            $test = '<div class="ellip_limit" id="open_post_text-'.$post->id.'">'.$content.'<br>';

                //I ADDED THIS LINE BUT DOESNT WORK SO WELL!
                $test = preg_replace('/#(\w+)/', '', $test);
                
                foreach ($match[0] as $key => $value) {
    
                    $link = preg_replace('/[^A-Za-z0-9\-]/', '', $value);        
                    $test.= '<a href="https://www.spidergain.com/search/hashtags?s='.$link.'">'.$value.'</a> ';

                }

                
            $test.='</div>';
                echo $test;
    
    
            } else {

                    echo $content;
                    
                }
                    

?>

{{--
<p>
@foreach($post->hashtags()->get() as $hashtag)
    <a href="https://www.spidergain.com/search/hashtags?s=${{ $hashtag->hashtag_id }}">
        {{ $hashtag->hashtag_id }}
    </a>  
@endforeach
</p>
--}}

<p>
@foreach($post->tags()->get() as $tag)
    <a href="{{ url('/social/'.$tag->tag_id) }}">
        {{ $tag->tag_id }}
    </a>  
@endforeach
</p>



@if($post->hasImage() == 0)
<?php   
        if($post->link != null) {
                $datas = str_replace("shorts/","watch?v=",$post->link);
            }
            
    
        //get youtube video link and show it in iframe

        $datas = str_replace("shorts/","watch?v=",$post->link);

        $link = preg_replace(
                "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                "<iframe id='iframe_youtube' loading='lazy' src=\"//www.youtube.com/embed/$2/\" allowfullscreen autoplay></iframe>",
                $datas);
            
            if (strpos($link, '</iframe>') !== false) {
                echo $link;
            }
            
            else {
                //get other than youtube video link and show it in iframe
                                
                preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $link, $match);
                $ext_content = $link;
    
                if(isset($match[0]) && count($match[0]) > 0){
                    $vedio_content = '';
                    foreach ($match[0] as $key => $value) {
                        $ext_content = str_replace($value,"",$ext_content);
    
                        if (strpos($value, 'instagram') !== false) {
                            $insta_link = explode("/?",$value);
                            if(count($insta_link) > 1){
                                $value = $insta_link[0]."/embed";
                                $vedio_content .= "<iframe loading='lazy' id='iframe_instagram' src='".$value."' allowfullscreen></iframe>";
                            }
                        }
    
                        else if (strpos($value, 'tiktok') !== false) {
                            //$cut = explode('/?', $value);
                            
                            $int = str_replace(['+', '-'], '', filter_var($value, FILTER_SANITIZE_NUMBER_INT));
                            $vedio_content = "<blockquote class='tiktok-embed' cite='' data-video-id='".$int."' style='' id=''>  <iframe name='' loading='lazy' id='iframe_tiktok' src='https://www.tiktok.com/embed/v2/".$int."?lang=en-US&autoplay=1&loop=1&autopause=0&controls=0' allow='autoplay' allowfullscreen style='display: block; visibility: unset;'></iframe></blockquote>";
                        }
    
                        else if(strpos($value, 'facebook') !== false) {
                            $facebook_link = explode("/",$value);
                            if(count($facebook_link) > 1){
                                foreach($facebook_link as $facebook_link_val){
                                    if(is_numeric($facebook_link_val)){
                                        $value = "https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/dccarmen/videos/".$facebook_link_val;
                                        //$value = "https://fb.watch/".$facebook_link_val;
                                    }
                                }
                            }
                            $vedio_content .= "<iframe id='iframe_facebook' loading='lazy' src='".$value."' allowfullscreen></iframe>";
                        }
                        
                        else{
                            $vedio_content .= "<iframe id='iframe_facebook' loading='lazy' src='".$value."' allowfullscreen></iframe>";
                        }
                    }
                    echo $vedio_content;
                    echo $ext_content;
    
    
    
                }  else {
    
                    if (strstr($post->link, '#') !== false || strstr($post->link, '@') !== false){
    
                        echo $link;
    
                    } else {
    
                        echo $link;
                        
                    }
                }
            }
    
            
    ?>
@endif

 @if(!empty($post->tags()))
    <p>
    @foreach($post->tags()->get() as $tag)
        <a href="https://www.spidergain.com/social/{{ $tag->tag_id }}">
            {{ $tag->tag_id }}
        </a>  
    @endforeach
    </p>
    @endif

 @if(!empty($post->location) && ($post->location != 'undefined'))
        <a href="#">
            {{ $post->location }}
        </a>
    @endif

            </br></br>


            </div>
            <div style="pointer-events: none;" id="message" class="post-content post-content-s">
                @if($post->hasImage())
                    @foreach($post->images()->get() as $image)
                        @if ((str_contains($image->getURL(), 'MOV') == 0) && (str_contains($image->getURL(), 'mp4') == 0))

                            @if ($post->content == null)
                                <a data-fancybox="gallery" href="{{ $image->getURL() }}" data-caption="{{ $post->content }}"><img style="margin-top:-50px;" id="image_post_picture" src="{{ $image->getURL() }}"></a>
                            @else
                                <a data-fancybox="gallery" href="{{ $image->getURL() }}" data-caption="{{ $post->content }}"><img id="image_post_picture" src="{{ $image->getURL() }}"></a>
                            @endif

                        @endif

                        @if ((str_contains($image->getURL(), 'MOV') == 1) || (str_contains($image->getURL(), 'mp4') == 1))

                             @if ($post->content == null)
                                 <a href="{{ $image->getURL() }}" ><video style="pointer-events: auto; margin-top:-50px;" id="image_post_video" src="{{ $image->getURL() }}" preload autoplay loop controls muted playsinline ></a>
                            @else
                                 <a href="{{ $image->getURL() }}" ><video style="pointer-events: auto;" id="image_post_video" src="{{ $image->getURL() }}" preload autoplay loop controls muted playsinline ></a>
                            @endif

                           

                        @endif

                    @endforeach
                @endif
            </div>
           
            <hr style="visibility:hidden;" class="fix-hr">
            @if (strpos($post->link, 'tiktok') !== false || strpos($post->link, 'facebook') !== false)
            <div id="share_like_container_tiktok">
            @else
            <div id="share_like_container">
            @endif
                <div class="btn-group dropleft">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-item="{{ $post->id }}" data-toggle="modal" data-target="#sharePostModal-{{$post->id}}">
                        <span style="margin-top:7px; margin-right:3px; color:black;" class="material-icons">share</span>
                    </button>
                    {{--
                    <div id="drop_men_icon_bar" class="dropdown-menu" style="border-radius:25px;">
                        <!-- Dropdown menu links -->
                        <a href="javascript:void(0)" onClick='copyText(this)'><p style="display:none; font-size:1px;">{{ url('/post/'.$post->id) }}</p><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/copylink.png"></a>

                        @if($post->hasImage())
                             @foreach($post->images()->get() as $image)
                                <a href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(' {{ $image->getURL() }} '),'facebook-share-dialog','width=626,height=636'); return false; ismap"></a>
                            @endforeach
                        @else
                            <a href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(' {{ $post->content }} '),'facebook-share-dialog','width=626,height=636'); return false; ismap"></a>
                        @endif

                        @if($post->hasImage())
                             @foreach($post->images()->get() as $image)
                                <a href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png"  alt="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?;text=Check%20this%20out%20in%20my%20Spiderfeed!&amp;url={{ url('/post/'.$post->id) }}','Twitter-dialog','width=626,height=436'); return false; ismap"></a>
                            @endforeach
                        @else
                            <a href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png"  alt="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?;text=Check%20this%20out%20in%20my%20Spiderfeed!&amp;url={{ $post->content }}','Twitter-dialog','width=626,height=436'); return false; ismap"></a>
                        @endif

                        @if($post->hasImage())
                             @foreach($post->images()->get() as $image)
                                <a id="share" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $image->getURL() }}&title=Registrati&summary=spidergain.com&source=Spidergain" target="_blank"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png"> </a>
                            @endforeach
                        @else
                            <a id="share" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $post->content }}&title=Registrati&summary=spidergain.com&source=Spidergain" target="_blank"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png"> </a>
                        @endif

                        

                         <a href="https://api.whatsapp.com/send?text=Vedi questo post {{ url('/post/'.$post->id) }}"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png"  alt="Share on Whatsapp"></a>

                        <a href="mailto:?subject=Check this post from Spidergain!&amp;body={{ $post->content }}"title="Share by Email"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/email.png" ></a>
                    </div>
                    --}}
                
                </div>
                <div class="pull-right like-box">
                    <a href="javascript:;" onclick="likePost({{ $post->id }})" class="like-text">
                        @if($post->checkLike($user->id))
                            <i id="heart_img" class="fa fa-heart"></i>
                        @else
                            <i id="heart_img" class="fa fa-heart-o"></i>
                        @endif
                    </a>
                    
                </div>
            </div>

            
            @if (strpos($post->link, 'tiktok') !== false || strpos($post->link, 'facebook') !== false)
            <div style="margin-left:15px; font-size:12px;" id="likes_comments_count_tiktok">
            @else
            <div style="margin-left:15px; font-size:12px;" id="likes_comments_count">
            @endif

                    @if($post->getLikeCount() == 0)
                        <a href="javascript:;" class="all_likes">
                            <span>
                                <p class="text-muted">{{ $post->getLikeCount() }} {{ 'Likes' }}</p>
                            </span>
                        </a>
                    @endif

                    @if($post->getLikeCount() == 1)
                        <a href="javascript:;" class="all_likes" onclick="showLikes({{ $post->id }})">
                            @foreach($post->likes()->limit(2000000)->with('user')->get()->take(1) as $like)
                                <span>
                                    @if($like->user->id != Auth::user()->id)
                                        @if($like->user->avatar_location != '')
                                            <img style="margin-left:0px; margin-right:2px; margin-top:-2px; height:18px; width:18px; border-radius:14px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;" class="kt-widget__img kt-hidden-" src="{{asset('storage/'.$like->user->avatar_location)}}" alt="Immagine profilo">
                                        @else
                                            <img style="margin-left:0px; margin-right:2px; margin-top:-2px; height:18px; width:18px; border-radius:14px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;" class="kt-widget__img kt-hidden-"  src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                                        @endif
                                    @endif
                                    @if($like->user->id == Auth::user()->id)
                                        @lang('applicazione.liked_by_you')
                                    @else
                                        @lang('applicazione.liked_by') {{ $like->user->name }}
                                    @endif
                                </span>
                            @endforeach
                        </a>
                    @endif

                    @if($post->getLikeCount() > 1)
                        <a href="javascript:;" class="all_likes" onclick="showLikes({{ $post->id }})">
                            @foreach($post->likes()->limit(2000000)->with('user')->get()->take(1) as $like)
                                <span>
                                    @if($like->user->id != Auth::user()->id)
                                        @if($like->user->avatar_location != '')
                                            <img style="margin-left:0px; margin-right:2px; margin-top:-2px; height:18px; width:18px; border-radius:14px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;" class="kt-widget__img kt-hidden-" src="{{asset('storage/'.$like->user->avatar_location)}}" alt="Immagine profilo">
                                        @else
                                            <img style="margin-left:0px; margin-right:2px; margin-top:-2px; height:18px; width:18px; border-radius:14px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;" class="kt-widget__img kt-hidden-"  src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                                        @endif
                                    @endif
                                   @if($like->user->id == Auth::user()->id)
                                        @lang('applicazione.liked_by_you_e')
                                    @else
                                        @lang('applicazione.liked_by') @if($like->user->hasRole('brand') || $like->user->company == 1){{ $like->user->dettagli->azienda_nome }}@else{{ $like->user->first_name }}@endif
                                    @endif          
                                    <p>@lang('applicazione.italian_space') {{ $post->getLikeCount()-1 }} @lang('applicazione.liked_by_others')</p>
                                </span>
                            @endforeach
                        </a>
                    @endif
                              
                    <div style="margin-left:-10px;">
                        @include('widgets.post_detail.comments_title')
                    </div>
                </div>
                                    
         
            <div class="media post-write-commento">
                <form id="form-new-comment">
                            {{--
                                    <div id="emoji_scroll">
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">❤️</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😊</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😂</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🤩</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🔥</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🙌</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😜</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😭</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😳</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😴</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🥳</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😇</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😎</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😘</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">⭐️</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">☀️</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🏃‍♂️</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🎥</a>
                                        <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🎧</a>
                                    </div>
                                --}}
                    <div class="pull-left">
                        @if($user->avatar_location != '')
                        <a href="{{ url('/social/'.$user->username) }}">
                            <img id="im_com" style="border:3px solid white; margin-left:20px; max-height:50px; max-width:50px; border-radius:25px; margin-right: 10px;" class="kt-widget__img kt-hidden-" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                        </a>
                        @else
                        <a href="{{ url('/social/'.$user->username) }}">
                            <img id="im_com" style="border:3px solid white; margin-left:15px; max-height:50px; max-width:50px; border-radius:25px; margin-right: 10px;" class="kt-widget__img kt-hidden-" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                        </a>
                        @endif
                    </div>
                                    
                                    
                    <div class="media-body">

                     <textarea style="margin-top:30px; padding-right:50px;" id="comment_box_under_post" class="form-control" rows="1" placeholder="@lang('applicazione.commenta')" readonly  data-toggle="modal" data-target="#newCommentModal-{{$post->id}}"></textarea>
                    {{--
                     data-toggle="modal" data-target="#newCommentModal-{{$post->id}}"
                     <textarea style="margin-top:30px; padding-right:50px;" id="comment_box_under_post" class="form-control" rows="1" placeholder="@lang('applicazione.commenta')" onpaste="console.log('onpastefromhtml')"></textarea>
                    --}}
                        

                    </div>
                    {{--
                    <button id="submit_button_under_comment_box" type="button" class="btn btn-default btn-xs">
                        

                            <button id="submit_button_under_comment_box" type="button" class="btn btn-default btn-xs" onclick="submitComment({{ $post->id }})">
                        
                        <i style="position:absolute;" id="fa_send_max" class="fa fa-send"></i>
                        <i style="position:absolute; color:black;"id="fa_send_max"  class="material-icons md-12">reply</i>--}}
                    </button>
                </form>
            </div>
            

            <div class="post-comments">
                @foreach($post->comments()->limit($comment_count)->orderBY('id', 'DESC')->with('user')->get()->reverse() as $comment)
                    @include('widgets.post_detail.single_comment')
                @endforeach 
                </br>
                </br>
                </br>
                </br>
            </div> 

        </div>
    </div>
</div>

</br></br>

<div class="modal fade " id="likeListModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">Likes</h5>
            </div>

            <div class="user_list">

            </div>
        </div>
    </div>
</div>


  
<div class="modal fade" id="reportModal-{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form action="{{ url('post/report') }}" method="post" style="display: flex; justify-content: center; flex-direction: column;">
                @csrf
                <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
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
<div class="modal fade" id="sharePostModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('applicazione.condividi')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="display:flex; justify-content:center; padding:20px;">
        <div style="border-radius:25px; display:flex; flex-direction:column;">
                            <!-- Dropdown menu links -->
                            <div id="modal_share_list">
                            <a id="modal_share_link" href="javascript:void(0)" onClick='copyText(this)'><p style="display:none; font-size:1px;">{{ url('/post/'.$post->id) }}</p><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/copylink.png"> Link</a>
                            </div>

                            <div id="modal_share_list">
                            @if($post->hasImage())
                                 @foreach($post->images()->get() as $image)
                                    <a id="modal_share_link" href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(' {{ $image->getURL() }} '),'facebook-share-dialog','width=626,height=636'); return false; ismap"> Facebook</a>
                                @endforeach
                            @else
                                <a id="modal_share_link" href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent('  {{ $post->link }} '),'facebook-share-dialog','width=626,height=636'); return false; ismap"> Facebook</a>
                            @endif
                            </div>
                            <div id="modal_share_list">
                            @if($post->hasImage())
                                 @foreach($post->images()->get() as $image)
                                    <a id="modal_share_link" href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png"  alt="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?;text=Check%20this%20out%20in%20my%20Spiderfeed!&amp;url={{ url('/post/'.$post->id) }}','Twitter-dialog','width=626,height=436'); return false; ismap"> Twitter</a>
                                @endforeach
                            @else
                                <a id="modal_share_link" href="#"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png"  alt="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?;text=Check%20this%20out%20in%20my%20Spiderfeed!&amp;url={{ $post->content }}','Twitter-dialog','width=626,height=436'); return false; ismap"> Twitter</a>
                            @endif
                            </div>

                            <div id="modal_share_list">
                            @if($post->hasImage())
                                 @foreach($post->images()->get() as $image)
                                    <a id="modal_share_link" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $image->getURL() }}&title=Registrati&summary=spidergain.com&source=Spidergain" target="_blank"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png"> LinkedIn</a>
                                @endforeach
                            @else
                                <a id="modal_share_link" href="https://www.linkedin.com/shareArticle?mini=true&url={{ $post->content }}&title=Registrati&summary=spidergain.com&source=Spidergain" target="_blank"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png"> LinkedIn</a>
                            @endif
                            </div>

                            <div id="modal_share_list">
                                <a id="modal_share_link" href="https://api.whatsapp.com/send?text=Vedi questo post {{ url('/post/'.$post->id) }}"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png"  alt="Share on Whatsapp"> Whatsapp</a>
                            </div>

                            <div id="modal_share_list"> 
                            <a id="modal_share_link" href="mailto:?subject=Check this post from Spidergain!&amp;body={{ $post->content }}"title="Share by Email"><img class="im_con" src="{{url('/')}}/assets/media/icons/socialbuttons/email.png" > Email</a>
                            </div>
                        </div>
      </div>
      
    </div>
  </div>
</div>
    



<!-- Modal -->
<div class="modal fade" id="newCommentModal-{{ $post->id }}" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Comment</h4>
            </div>
            <div class="modal-body">
                
                    <form id="form-new-comment-modal2" action="{{ url('/posts/comment/new')  }}" method="POST" data-parsley-validate>
                        <div id="emoji_scroll">
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">❤️</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😊</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😂</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🤩</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🔥</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🙌</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😜</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😭</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😳</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😴</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🥳</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😇</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😎</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">😘</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">⭐️</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">☀️</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🏃‍♂️</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🎥</a>
                            <a id="emoji_icon" href="javascript:void(0);" onclick="CopyToTextarea(this)">🎧</a>
                        </div>
                        
          @csrf
            <div>
           
            

            <input type="hidden" name="postid" value="{{ $post->id }}">
            </div>
            </br></br>
            <div class="replier">
            <textarea style="width:100%; border-radius:5px;" rows = '8' name="comment" id="comment" class="comment" placeholder="Commenta!"></textarea>
            </br>
            @if($user->avatar_location != '')
            <img style="height:40px; width:40px; border-radius:20px; object-fit:cover;" class="media-object img-circle comment-profile-photo" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
            @else
            <img style="max-height:40px; max-width:40px; border-radius:20px;"  class="media-object img-circle comment-profile-photo" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
            @endif
            </div>
        </div>
        <div class="modal-footer">
            <button id="newbutn" type="submit" type="button" class="btn btn-default" id="new_modal_btn">@lang('applicazione.invia')</button>
          {{--<button id="newbutn"  type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
        </div>
      </div>
      </form>
                
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="editpost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifica</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="margin-left:0px;" id="new_post_box_height" class="panel panel-default new-post-modal">
                    <form id="form-edit-post" action="/posts/{{ $post->id }}/update" method="POST" data-parsley-validate>
                        {{  csrf_field() }}
                        {{ method_field('PATCH') }}
	                    <div class="modal-body">
	      		            <input type="hidden" id="postid" value="">
                            <textarea style="visibility:hidden; height:20px; width:70%; border-radius:25px;" rows = '8' name="postid" id="postid" class="postid" placeholder="{{$post->id}}"></textarea>
				            </br>
                            <textarea style="height:100px; width:70%; border-radius:25px;" rows = '8' name="content" id="content" class="content" placeholder="content"></textarea>
                            </br>
                            <textarea style="height:100px; width:70%; border-radius:25px;" rows = '8' name="link" id="link" class="link" placeholder="link"></textarea>
                            </br>
                            <textarea style="height:40px; width:70%;" rows = '2' name="location" id='location' class='form-control' placeholder='location'></textarea>
                            </br></br></br></br></br></br></br>

                             <div class="row" style="display:flex; justify-content:center;">
                                <div class="col-xs-6" style="display:flex; justify-content:center;">
                                      
                                    <button type="button" class="btn btn-secondary btn-add-image btn-sm" onclick="uploadPostImage()">
                                        <i id="image_button_id_logo" class="material-icons md-12">photo_camera</i>
                                    </button>
                                    <input type="file" accept="image/*" class="image-input" name="photo" onchange="previewPostImage(this)">
                                
                                <button type="button" class="btn btn-secondary btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close" id="new_modal_btn">
                                    <i id="image_button_id_logo" class="material-icons md-12">close</i>
                                </button>
                               
                                    <button type="submit" type="button" class="btn btn-secondary pull-right" id="new_modal_btn">
                                        <i id="image_button_id_logo" class="material-icons md-12" >send</i>
                                     
                                    </button>
                                    
                                </div>
                            </div>
	                    </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



</br></br></br></br>



@endsection

<script>

window.onload = function () {
    window.scrollTo(1, 1);
}

</script>

@push('after-scripts')

<script>
$(document).ready(function () {
  $(".post-linkify-{{ $post->id }}").linkify();
});
</script>


<script>

function CopyToTextarea(el){
  var text = el.textContent,                           // get this <a> text
      textarea = document.getElementById('comment'),  // textarea id
      textareaValue = textarea.value,                  // text area value
      Regex = new RegExp(text +  'g'),            // make new regex with <a> text and \n line break 
      textareaValue = textareaValue.indexOf(text) > -1 ?  textareaValue.replace(Regex, '') : textareaValue + text; // this is something similar to if statement .. mean if the textarea has the <a> text and after it line break .. replace it with its line break to blank (remove it) .. if not its not on textarea add this <a> text to the textarea value
  textarea.value = textareaValue ;                     // change the textarea value with the new one
}

$('#editpost').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var content = button.data('mycontent')
      var location = button.data('mylocation')
      var link = button.data('mylink')
      var postid = button.data('mypostid') 
      
      var modal = $(this)
      modal.find('.modal-body #content').val(content);
      modal.find('.modal-body #location').val(location);
      modal.find('.modal-body #postid').val(postid);
      modal.find('.modal-body #link').val(link);
})

</script>



@endpush
