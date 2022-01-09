
<script>
$(".message-linkify-{{ $message->id }}").linkify();
</script>


<style>



.photo_message{
    border-radius:5px;
    margin-left:0px;
}


    @media screen and (max-width: 1024px){

        iframe{
            border-radius:25px;
            border:1px solid transparent;
            height:100px;
            width:150px;
            }
        
        .dm .chat .message-list .message small{
            font-style:normal;
            color:black;
            font-size:8px;
            }

        .dm .friends-list .friend:hover {
            background: transparent;
            }

        .dm .friends-list .friend.active {
            background: transparent;
            }

        .dm .chat .message-list .message .text {
            background: white;
            border:2px solid #F7F5F8;
            margin-bottom:10px;
            font-size:14px;
            }
        
        .dm .chat .message-list .message.message-right .text{
            width:250px;
            //background-image: linear-gradient(to bottom right, aliceblue, aliceblue, aliceblue);
            background-color:aliceblue;
            border:none;
            color:white;
            margin-left:15px;
            }

        .dm .chat .message-list .message.message-left .text{
            width:250px;
            margin-left:30px;
            }
    }

    

    @media screen and (min-width: 1024px){

        #hide_on_big{
            display:none;
        }

        iframe{
            border-radius:25px;
            border:1px solid transparent;
            height:150px;
            width:200px;
            }
        
        .dm .chat .message-list .message small{
            font-style:normal;
            color:black;
            font-size:10px;
            }

        .dm .friends-list .friend:hover {
            border-radius:25px;
            }

        .dm .chat .message-list .message .text {
            background: aliceblue;
            margin-bottom:15px;
            }

        .dm .chat .message-list .message.message-right .text{
            background: #CDD7FE;
            }

        .dm .friends-list .friend.active {
            background: #5979FB;
            }
    }

    #loadOverlay{display: none;}
    
</style>

<div class="message @if($message->sender_user_id == $user->id){{ 'message-right' }}@else{{ 'message-left' }}@endif" id="chat-message-{{ $message->id }}">
<div ondblclick="likeMessage({{ $message->id }})" onmousedown="mouseDown()" class="like-text">

{{--                
@if ($message->created_at->format('d/m/Y H:i') > Carbon\Carbon::now())
hello
@endif
--}}

        @if($message->sender_user_id == Auth::user()->id)
        <small id="seen_message_date" style="margin-top:12px;">{{ $message->created_at->format('d/m/Y H:i') }}</small>
        @else
        <small id="seen_message_date_you" style="margin-top:12px;">{{ $message->created_at->format('d/m/Y H:i') }}</small>
        @endif

        @if($message->seen == 0 && $message->sender_user_id == Auth::user()->id)
            <i id="seen_message" class="material-icons nav__icon" style="margin-top:10px;">done</i>
        @endif

        @if($message->seen == 1 && $message->sender_user_id == Auth::user()->id)
            <i id="seen_message_seen" class="material-icons nav__icon" style="margin-top:10px;">check_circle</i>
        @endif

        @if($message->sender_user_id == Auth::user()->id)
            @if($message->checkLike($user->id))
                <i style="position:absolute; margin-top:15px; margin-left:-5px;" id="heart_img_mess" class="fa fa-heart"></i>
            @else
                <i style="position:absolute; margin-top:15px; margin-left:-5px; color:transparent;" id="heart_img_mess" class="fa fa-heart-o"></i>
            @endif
        @else  
            @if($message->checkLike($user->id))
                <i style="position:absolute; margin-left:80vw; margin-top:15px;" id="heart_img_mess" class="fa fa-heart"></i>
            @else
                <i style="position:absolute; margin-left:80vw; margin-top:15px; color:transparent;" id="heart_img_mess" class="fa fa-heart-o"></i>
            @endif
        @endif

        @if($message->sender_user_id != Auth::user()->id)
                <img id="hide_on_big" src="{{asset('storage/'.$friend->avatar_location)}}" style="position:absolute; height: 30px; width:30px; border-radius:15px; margin-left:-5px; margin-top:10px; object-fit:cover;"/>
            @endif
        @if($message->sender_user_id == Auth::user()->id)
                <img id="hide_on_big" src="{{asset('storage/'.$user->avatar_location)}}" style="position:absolute; max-height: 30px; max-width:30px; border-radius:15px; margin-left:75vw; margin-top:5px;"/>
        @endif


    <div style="border-radius:15px; color:black;" class="text message-linkify-{{ $message->id }}">
    
        <?php
            $images = $message->images;
            $sender_user_id = $message->sender_user_id;
            $user_id = $user->id;
            $messageID = $message->id;
            //get youtube video link and show it in iframe
            $message = preg_replace(
                    "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
                    "<iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
                    $message->message
                );
                if (strpos($message, '</iframe>') !== false) {
                    echo $message;
                }else{
                    //get other than youtube video link and show it in iframe
                    preg_match_all('#\https?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $message, $match);
                    $ext_message = $message;
                    if(isset($match[0]) && count($match[0]) > 0){
                        $vedio_message = '';
                        foreach ($match[0] as $key => $value) {
                            $ext_message = str_replace($value,"",$ext_message);
                            if (strpos($value, 'instagram') !== false) {
                                $insta_link = explode("/?",$value);
                                if(count($insta_link) > 1){
                                    $value = $insta_link[0]."/embed";
                                    $vedio_content .= "<iframe' src='".$value."' allowfullscreen></iframe>";
                                }
                            }else if(strpos($value, 'facebook') !== false) {
                                $facebook_link = explode("/",$value);
                                if(count($facebook_link) > 1){
                                    foreach($facebook_link as $facebook_link_val){
                                        if(is_numeric($facebook_link_val)){
                                            $value = "https://www.facebook.com/plugins/video.php?href=https://www.facebook.com/dccarmen/videos/".$facebook_link_val;
                                        }
                                    }
                                }
                                $vedio_message .= "<iframe' src='".$value."' allowfullscreen></iframe>";
                            }else{
                                $vedio_message .= "<iframe' src='".$value."' allowfullscreen></iframe>";
                            }
                        }
                        echo $vedio_message;
                        echo $ext_message;
                    }else{

                        if (strstr($message, '#') !== false || strstr($message, '@') !== false){

                        $message = preg_replace('/#(\w+)/', 
                            '<a href="https://www.spidergain.com/search/hashtags?s=$1">#$1</a>', 
                            $message);
                        $message = preg_replace('/@(\w+)/', 
                            '<a href="https://www.spidergain.com/social/$1" style="color:blue;">@$1</a>', 
                        $message);

                        echo $message;

                        }else{

                        echo $message;
                        }
                    }
                }
                if($images->count() > 0){
                	foreach($images as $image){
                		//echo "<img src='".$image->image_path."'><br />";
                		echo "<img class='photo_message' src='".asset('/storage/messages/')."/".$image->image_path."'><br />";
                		//echo '<img src="{{asset(storage/messages/'".$image->image_path)}}">';
                		
                	}
                }
                
        ?>
        <?php if($sender_user_id == $user_id){?>
            <a style="color:white;" href="javascript:;" class="remove pull-right" onclick="deleteMessage(<?php echo $messageID;?>)"><i class="fa fa-times" style="color:white;"></i></a>
        <?php }?>

       

    </div>
</div>
</div>

<div class="clearfix"></div>

