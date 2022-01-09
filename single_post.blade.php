<style>

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

    .im_con{
        max-height: 40px;
        max-width: 40px;
        border-radius: 100%;
        margin-left:0px;
        margin-top:0px;
    }

    .pmorecontent span {
        display: none;
    }
    
    .pmorelink {
        display: inline;
    }
    
    .morecontent span {
        display: none;
        width:70vw;
    }
    
    .morelink {
        display: inline;
        width:70vw;
    }
    
    #new_modal_btn{
        background-color:white;
        border:none;
    }
    
    .list-group{
        box-shadow:none;
    }

    .panel-post .info a.name {
        /* color: #454545; */
        background-image: linear-gradient(#e72b38, #e72b80);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    @media screen and (max-width: 1024px){
    
        #post_header_image_and_name{
            margin-left:20px;
        }
    
    
        .panel-body{
            padding-left:0px;
            margin-left:15px;
        }
    
        #post_cog_icon{
            margin-top:-70px;
            margin-left:85vw;
        }
    
        .panel{
          box-shadow: none;
        }
    
        blockquote{
            border-left:none;
        }
    
        .ellip_limit{
            width:95vw;
        }
    
        iframe{
            margin-left:-15px;
            width:103vw;
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
        
        #iframe_tiktok{
                position:relative;
                border:none;
                width:90vw;
                margin-left:-13px;
                height:777px;
                }
        
      
        #share_like_container{
                position:absolute;
                margin-top: -5px;
                margin-left:73vw;
                display: flex;
                flex-wrap: wrap;
                table-layout: fixed;
                align-items: center;
                justify-content: center;
                height: 1px;
                }
        
        #share_like_container_foto{
                position:absolute;
                margin-top: -5px;
                margin-left:75vw;
                display: flex;
                flex-wrap: wrap;
                table-layout: fixed;
                align-items: center;
                justify-content: center;
                height: 1px;
                }
            
        #comment_box_under_post {
                position:absolute;
                border-radius: 15px;
                width: 77vw;
                height:51px;
                border:2px solid #F7F5F8;
                box-shadow:none;
                }
        
        #submit_button_under_comment_box{
                position:absolute;
                height:43px;
                width:43px;
                background-color:transparent;
                border:1px solid transparent;
                box-shadow:none;
                margin-left:63vw;
                margin-top:5px;
                }
        
        #image_post_picture{
                max-height:500px;
                width:101vw;
                object-fit: cover;
                }
    
        #image_post_video{
                max-height:450px;
                width:103vw;
                object-fit: cover;
                }  
    
        #likes_comments_count_tiktok{
            margin-top:-60px;
            } 
          
    
        #share_like_container_tiktok {
            position: absolute;
            margin-top: -65px;
            margin-left: 75vw;
            display: flex;
            flex-wrap: wrap;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            height: 1px;
        }
    
        .post-write-comment{
          margin-left:10px;
        }
    
    }
    
    
    @media screen and (min-width: 1024px){
    
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
    
        #share_like_container_foto {
                margin-left: 85%;
                display: flex;
                flex-wrap: wrap;
                table-layout: fixed;
                align-items: center;
                justify-content: center;
                height: 5px;
            }
            
        .navbar-right{
          margin-left:750px;
        }
    
    }
    
    </style>
    
    
    
    <div style="margin-top:0px; overflow-x:hidden;" class="b">
        <div class="panel panel-default panel-post" id="panel-post-{{ $post->id }}" ondblclick="likePost({{ $post->id }})">
            <div style="border-radius:5px;" class="panel-body">
                <div id="post_header_image_and_name" class="pull-left">
                    @if($post->user->avatar_location)
                    <a href="{{ url('/social/'.$post->user->username) }}">
                        <img class="media-object img-circle post-profile-photo" style="max-height:40px; max-width:40px; border-radius:20px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;" src="{{asset('storage/'.$post->user->avatar_location)}}">
                    </a>
                    @else
                    <a href="{{ url('/social/'.$post->user->username) }}">
                        <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="max-height:40px; max-width:40px; border-radius:20px; box-shadow: 2px 2px 10px 10px #F7F5F8;"/>
                    </a>
                    @endif
                </div>
                <div id="post_header_detail" class="pull-left info">                                                                                        
                    <a href="{{ url('/social/'.$post->user->username) }}" class="name">@if($post->user->hasRole('brand') || ($post->user->company == 1)){{ Str::limit($post->user->dettagli->azienda_nome, 30) }} @else {{ Str::limit($post->user->name, 30) }} @endif
                        @if($post->user->verified == 1)
                            <img id="verified_img_sm_post" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                        @elseif($post->user->gold == 1)
                            <img id="verified_img_sm_post" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                        @elseif($post->user->staff == 1)
                            <img id="verified_img_sm_post" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                        @endif
                    <a href="{{ url('/social/'.$post->user->username) }}" class="username" style="color: #a7abc3 !important;">{{ Str::limit($post->user->username, 15) }} {{ $post->created_at->diffForHumans() }}</a>
                </div>
                <div class="clearfix"></div>
                <span>
                    
                        <div class="navbar-right" style="margin-top: 20px; position: absolute;">
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
                
                @if($post->quickpost == 1)
                <div id="post_container_iframe" class="post-content post-content-s post-linkify-{{ $post->id }} " style="padding-left:24px; margin-bottom:-50px;">
                @else
                <div id="post_container_iframe" class="post-content post-content-s post-linkify-{{ $post->id }} " style="padding-left:24px; padding-bottom:15px;">
                @endif
                </br>
    
    
    
    {{--<div class="ellip_limit" id="open_post_text-{{$post->id}}">--}}
    
    <?php

        $content = $post->content;
    
        $count = 0;
        $length = strlen($content);
                    
        for ($i = 0; $i < $length; $i++) {
            if( ctype_alpha($content[$i]) ) {
            $count++;
            }
        }
                    
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
    
                    echo '<div class="ellip_limit" id="open_post_text-'.$post->id.'">'.$content.'</div>';
                        
            }
    
    ?>
    
    {{--
    @if(!empty($post->hashtags()))
    <p>
    @foreach($post->hashtags()->get() as $hashtag)
        @foreach(explode('#',$hashtag->hashtag_id) as $tag)
            <a href="https://www.spidergain.com/search/hashtags?s={{$hashtag}}">
        @endforeach
        {{ $hashtag->hashtag_id }}
        </a>  
    @endforeach
    </p>
    @endif
    --}}
    
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
                
                </br></br>
    
                @if($post->map == 1)
                <div>
                
                    
    
                  <iframe loading='lazy' id="map_on_page" style="pointer-events:none;" width="100%" height="50%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://maps.google.com/maps?f=l&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{$post->location}}&amp;aq=t&amp;z=17&amp;om=0&amp;iwloc=addr&amp;iwd=0&amp;layer=0&amp;&output=embed"></iframe>
                 
                </div>
                @endif
    
                </div>
    
               
                <div id="message" class="post-content post-content-s">
                    @if($post->hasImage())
                        @foreach($post->images()->get() as $image)
                            @if ((str_contains($image->getURL(), 'MOV') == 0) && (str_contains($image->getURL(), 'mp4') == 0))
    
                                @if ($post->content == null)
                                <div id="post_image_container">

                                    
                                    
                                    <a href="javascript:void(0);" ><img style="margin-top:-50px;" id="image_post_picture" src="{{ $image->getURL() }}"></a>
                                    {{--<div id='heart_test' style="display:none;position:absolute;font-size:60px;flex-direction: row;justify-content: center; max-height: 400px;width: 100%;"><i id="heart_img" style="color:white!important; opacity:0.3" class="fa fa-heart"></i></div>--}}
                                    
                                @else
                                
                                    
                                    <a href="javascript:void(0);" ><img id="image_post_picture" src="{{ $image->getURL() }}"></a>
                                    {{--<div id='heart_test' style="display:none;position:absolute;font-size:60px;flex-direction: row;justify-content: center; max-height: 400px;width: 100%;"><i id="heart_img" style="color:white!important; opacity:0.3" class="fa fa-heart"></i></div>--}}
                                    
                                </div>
                                @endif
    
                            @endif
    
                            @if ((str_contains($image->getURL(), 'MOV') == 1) || (str_contains($image->getURL(), 'mp4') == 1))
    
                                 @if ($post->content == null)
                                  <div id="post_video_container">
                                     <a href="{{ $image->getURL() }}" ><video style="pointer-events: auto; margin-top:-50px;" id="image_post_video" src="{{ $image->getURL() }}" preload autoplay loop controls muted playsinline ></a>
                                @else
                                     <a href="{{ $image->getURL() }}" ><video style="pointer-events: auto;" id="image_post_video" src="{{ $image->getURL() }}" preload autoplay loop controls muted playsinline ></a>
                                    </div>
                                @endif
    
                               
    
                            @endif
    
                        @endforeach
                    @endif
                </div>
                
               
                <hr style="visibility:hidden;" class="fix-hr">
    
    
           
            <div id="margin-left" style="display:flex;flex-direction: column;align-content: center;justify-content: flex-start;">
    
                {{--@if (strpos($post->link, 'tiktok') !== false || strpos($post->link, 'facebook') !== false)
                <div id="share_like_container_tiktok">
                @elseif($post->hasImage())
                 <div id="share_like_container_foto">
                @else
                <div id="share_like_container">
                @endif--}}
    
    
                @if($post->hasImage() && !empty($post->content))
    <div id="share_like_container" style="margin-left:77vw;">
                @elseif($post->hasImage() && empty($post->content))
    <div id="share_like_container">
                @else
    <div id="share_like_container">
                @endif
 
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-item="{{ $post->id }}" data-toggle="modal" data-target="#sharePostModal-{{$post->id}}">
                            <span style="margin-top:7px; margin-right:3px; color:black;" class="material-icons">share</span>
                        </button>
                        
                    </div>
                    
                    <div class="pull-right like-box">
                        <a href="javascript:;" onclick="likePost({{ $post->id }})" class="like-text">
                            @if($post->checkLike($user->id))
                                <i id="heart_img" style="width: 30px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;display: initial;" class="fa fa-heart"></i>
                            @else
                                <i id="heart_img" style="width: 30px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;display: initial;"  class="fa fa-heart-o"></i>
                            @endif
                        </a>
                        
                    </div>
                </div>
    
    
                @if($post->hasImage() && !empty($post->content))
    <div style="margin-left:35px; font-size:12px; max-width: 300px;" id="likes_comments_count">
                @elseif($post->hasImage() && empty($post->content))
    <div style="margin-left:20px; font-size:12px; max-width: 300px;" id="likes_comments_count">
                @else
    <div style="margin-left:20px; font-size:12px; max-width: 300px;" id="likes_comments_count">
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
                        
                        {{--<p>{{ $post->getLikeCount() }} {{ 'Like' }}</p>--}}
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
    
             
               
    
               @if($post->comments()->count() == 0)
    
               @if($post->hasImage() && !empty($post->content))
    <div id="image_content" class="media post-write-comment" style="margin-left:15px">
                @elseif($post->hasImage() && empty($post->content))
    <div id="image_no_content" class="media post-write-comment" style="margin-left:0px">
                @else
    <div id="empty" class="media post-write-comment">
                @endif
    
                
                    <form id="form-new-comment" @if($post->hasImage()) style="margin-left:10px;" @endif>
                        <div class="pull-left">
                            @if($user->avatar_location != '')
                            <a href="{{ url('/social/'.$user->username) }}">
                                <img style="border:3px solid white; margin-left:5px; margin-top:5px; height:40px; width:40px; border-radius:20px; margin-right: 10px; object-fit:cover;" class="kt-widget__img kt-hidden-" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                            </a>
                            @else
                            <a href="{{ url('/social/'.$user->username) }}">
                                <img style="border:3px solid white; margin-left:5px; margin-top:5px; max-height:40px; max-width:40px; border-radius:20px; margin-right: 10px;" class="kt-widget__img kt-hidden-" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                            </a>
                            @endif
                        </div>
                        <div class="media-body">
                            <textarea style="padding-top:14px; padding-right:50px;" id="comment_box_under_post" class="form-control" rows="1" placeholder="@lang('applicazione.commenta')"></textarea>
                        </div>
                        <button style="color:#5979FB;" id="submit_button_under_comment_box" type="button" class="btn btn-default btn-xs" onclick="submitComment({{ $post->id }})">
                            {{--<i style="position:absolute; color:black;" class="fa fa-send"></i>--}}
                            <i style="position:absolute; color:black;" class="material-icons md-12">reply</i>
                            
                        </button>
                    </form>
                </div>
                @endif
    
                @if($post->comments()->count() > 0)
    
                    <div id="hidden_comments" style="margin-left:30px;" id="empty" class="media post-write-comment">
    
                @endif
    
                <div class="post-comments">
                    @foreach($post->comments()->limit($comment_count)->orderBY('id', 'DESC')->with('user')->get()->reverse() as $comment)
                        @include('widgets.post_detail.single_comment')
                    @endforeach
    
                </div>
                    
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
                                </br>
                                <div class="row" style="display:flex; justify-content:center;">
                                    <div class="col-xs-6" style="display:flex; justify-content:center;">
                                          
                                    
                                    <button type="button" class="btn btn-secondary btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close" id="new_modal_btn">
                                        <i id="image_button_id_logo" class="material-icons md-12">close</i>
                                    </button>
                                   
                                        <button type="submit" type="button" class="btn btn-secondary pull-right btn-submit" id="new_modal_btn">
                                            <i id="image_button_id_logo" class="material-icons md-12" >send</i>
                                            
                                         
                                        </button>
                                        
                                    </div>
                                </div>
                                
                                </div>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </br></br>
    
    
    
    
    <script>
        $(document).ready(function() {
        // Configure/customize these variables.
            var showChar = 50;  // How many characters are shown by default
            var ellipsestext = "...";
            var moretext = " più";
            var lesstext = "...meno";
            var postID = {{$post->id}};
            
    
            $('#open_post_text-'+postID).each(function() {
            var content = $(this).html();
            {{ '<?php $content1 = preg_replace('/\s+/', ' ', trim($post->content )); ?>'}}
            var content_1 = '{{$content1}}';
            if(content_1.length > showChar ) {
         
                var c = content.substr(0, showChar);
                var h = content.substr(showChar, content.length - showChar);
         
                var html = c + '<span style="color:#0645AD; font-weight:bold;" class="moreellipses">' + ellipsestext + '</span><span class="morecontent"><span>' + h + '</span><a href="javascript:void(0)" style="font-weight:bold;" class="morelink-'+postID+'">'+ moretext + '</a></span>';
         
                $(this).html(html);
            }
         
            });
         
            $(".morelink-"+postID).click(function(){
            //console.log($(this));
            if($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
            });
        });
    
    </script>
    
    
    
    <script>
    
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
    
    <script>
    
    $(".post-linkify-{{ $post->id }}").linkify();
    
    function copyText(element) {
        var range, selection, worked;
    
        if (document.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(element);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(element);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    
        try {
            document.execCommand('copy');
            alert('link copiato!');
        }
        catch (err) {
            alert('unable to copy text');
        }
    }
    
    function myFunction() {
      var iframe = document.getElementById("iframe_tiktok");
      var elmnt = iframe.contentWindow.document.getElementsByClassName("_embed_video_layer-wrapper")[position];
      elmnt.style.visibility = "hidden";
    }
    
    
    </script>
    
    