

<style>

.kt-header-mobile{
    height:45px;
}

@media screen and (max-width: 1024px) {
#icon_menu_icon_logo{
color:black; font-size: 38px; margin-top:-2px; margin-left:4px;
}

#on_mobile_notif{
position:absolute; 
 margin-top:35px;
 margin-left:50px;
}
}

@media screen and (min-width: 1024px) {
#icon_menu_icon_logo{
color:#e72b38; font-size: 23px; margin-top:-2px; margin-left:4px;
}

#on_mobile_notif{
position:absolute; 
 margin-top:-2px;
 margin-left:30px;
}

#notify_number_black{
    margin-right:6px;
    margin-top:2px;
}
}

</style>



@if(count($user_list) == 0)
<a href="{{ url('/direct-messages/open-chat-list') }}">
<i id="icon_menu_icon_logo" class="material-icons nav__icon">message</i>
</a>
@else

<a style="background-color:transparent;" href="{{ url('/direct-messages/open-chat-list') }}">
    @if (count($user_list) > 0)
    <div id="on_mobile_notif">
        <span id="notify_number_black" class="badge badge-notify">{{ count($user_list) }}</span>
    </div>
    @endif
    <i id="icon_menu_icon_logo" class="material-icons nav__icon">message</i>
    
</span>
</a>


<ul style="background-color:transparent; border:1px solid transparent; box-shadow:none;" class="dropdown-menu" role="menu">
        @foreach($user_list as $friend)
            <li" style=' margin-top:20px; position:absolute;'>
                <a href="{{ url('/direct-messages/show/'. $friend['user']->id) }}" class="friend">
                    
                    <div style="display:flex; width:300px; margin-left:-170px; padding:20px; box-shadow: 10px 20px 20px 10px rgba(0,0,0,0.5); border-radius:25px; background-color:white;" class="detail">
                       
                    @if($friend['user']->avatar_location) 
                            <img src="{{asset('storage/'.$friend['user']->avatar_location)}}"  class="media-object img-circle" style="margin-left:5px; max-height: 30px; max-width:30px; border-radius:15px;"/>
                            @else                              
                            <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png"  class="media-object img-circle" style="margin-left:5px; max-height: 30px; max-width:30px; border-radius:15px;"/>
                            @endif

                        @if($friend['user']->verified == 1)
                        <strong style="font-size:12px; margin-left:3px;">{{ $friend['user']->username }}<img id="verified_img_sm_mess_notif" src="{{url('/')}}/assets/media/icons/socialbuttons/octagonal_star.png" alt="Recensioni"></strong></br>
                        @else
                        <strong style="font-size:12px; margin-left:3px;">{{ $friend['user']->username }}</strong></br>
                        @endif
                
                        <span style="font-size:10px; margin-left:20px; margin-top:7px;">{{ str_limit($friend['message']->message, 10) }}</span>
                        <small style="font-size:8px; margin-left:5px; margin-top:10px;">{{ $friend['message']->created_at->diffForHumans() }}</small>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
        @endforeach
</ul>

@endif
