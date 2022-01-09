<style>


@media screen and (max-width: 1024px){

    .new_social_scroll {
        padding-left:13px;
        background-color: transparent;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        max-width: 100vw;
        //margin-left: 3vw;
        margin-top:-15px;
        //margin-top:-4vh;
    }

    .new_social_scroll_no {
        padding-left:13px;
        background-color: transparent;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        max-width: 100vw;
        margin-top:40px;
        //margin-left: 3vw;
        //margin-top:0px;
        //margin-top:-4vh;
    }
    
    .social_link_icons{
        margin-top:7px;
        margin-right:20px;
    }

}


@media screen and (min-width: 1024px){

    .new_social_scroll {
        border-top: 1px solid #F7F5F8;
        border-bottom: 1px solid #F7F5F8;
        display:flex;
        justify-content: center;
    }

    .social_link_icons{
        margin-right:3px;
        padding:7px;
    }

}

</style>



@if($can_see)

@if(! empty($user->dettagli))
@if(! empty($user->bio))
<div class="new_social_scroll">
@else
<div class="new_social_scroll_no">
@endif


    @if($user->id != 274)
             <div class="social_link_icons">
                
                    <a href="{{ url('/social/'.$user->username.'/followers') }}">
                        <img id="im_pro" src="{{url('/')}}/assets/media/icons/definitive_s.png" alt="Spidergain" style="height:30px; width:30px; margin-left:5px; margin-top:10px;"><p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->follower()->where('allow', 1)->count() < 999)
                            {{$user->follower()->where('allow', 1)->count()}}
                        @endif
                        @if($user->follower()->where('allow', 1)->count() >= 1000 && $user->follower()->where('allow', 1)->count() <= 999999)
                           {{round($user->follower()->where('allow', 1)->count() / 1000, 1)}} K
                        @endif
                         @if($user->follower()->where('allow', 1)->count() >= 1000000 && $user->follower()->where('allow', 1)->count() <= 999999999)
                            {{round($user->follower()->where('allow', 1)->count() / 1000000, 0)}} M
                        @endif
                        
                        </p></a>
                
                </div> 
    @endif            

				@if(! empty($user->dettagli->facebook))
                <div class="social_link_icons">
				    <a href="{{$user->dettagli->facebook}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Facebook" style="height:30px; width:30px; margin-left:5px; margin-top:10px;">@if(! empty ($user->dettagli->facebook_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->facebook_follower < 999)

                        {{$user->dettagli->facebook_follower}}                        

                        @endif
                        @if($user->dettagli->facebook_follower >= 1000 && $user->dettagli->facebook_follower <= 999999)

                        
                        {{round($user->dettagli->facebook_follower / 1000, 1)}} K
                        
                        @endif
                         @if($user->dettagli->facebook_follower >= 1000000 && $user->dettagli->facebook_follower <= 999999999)
                            {{round($user->dettagli->facebook_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left"  style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                @if(! empty($user->dettagli->instagram))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->instagram}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/instagram.png" alt="Instagram" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->instagram_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->instagram_follower < 999)
                            {{$user->dettagli->instagram_follower}}
                        @endif
                        @if($user->dettagli->instagram_follower >= 1000 && $user->dettagli->instagram_follower <= 999999)
                           {{round($user->dettagli->instagram_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->instagram_follower >= 1000000 && $user->dettagli->instagram_follower <= 999999999)
                            {{round($user->dettagli->instagram_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                                   
                @if(! empty($user->dettagli->youtube))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->youtube}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube.png" alt="YouTube" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->youtube_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->youtube_follower < 999)
                            {{$user->dettagli->youtube_follower}}
                        @endif
                        @if($user->dettagli->youtube_follower >= 1000 && $user->dettagli->youtube_follower <= 999999)
                           {{round($user->dettagli->youtube_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->youtube_follower >= 1000000 && $user->dettagli->youtube_follower <= 999999999)
                            {{round($user->dettagli->youtube_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                @if(! empty($user->dettagli->tiktok))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->tiktok}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/tiktok.png" alt="TikTok" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->tiktok_follower))<p id="follower_count_left"  style="text-align:center; color:black;">
                        @if($user->dettagli->tiktok_follower < 999)
                            {{$user->dettagli->tiktok_follower}}
                        @endif
                        @if($user->dettagli->tiktok_follower >= 1000 && $user->dettagli->tiktok_follower <= 999999)
                           {{round($user->dettagli->tiktok_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->tiktok_follower >= 1000000 && $user->dettagli->tiktok_follower <= 999999999)
                            {{round($user->dettagli->tiktok_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif
                        

                @if(! empty($user->dettagli->twitter))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->twitter}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png" alt="Twitter" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->twitter_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                         @if($user->dettagli->twitter_follower < 999)
                            {{$user->dettagli->twitter_follower}}
                        @endif
                         @if($user->dettagli->twitter_follower >= 1000 && $user->dettagli->twitter_follower <= 999999)
                           {{round($user->dettagli->twitter_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->twitter_follower >= 1000000 && $user->dettagli->twitter_follower <= 999999999)
                            {{round($user->dettagli->twitter_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                 @if(! empty($user->dettagli->snapchat))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->snapchat}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/snapchat.png" alt="Snapchat" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->snapchat_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->snapchat_follower < 999)
                            {{$user->dettagli->snapchat_follower}}
                        @endif
                        @if($user->dettagli->snapchat_follower >= 1000 && $user->dettagli->snapchat_follower <= 999999)
                           {{round($user->dettagli->snapchat_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->snapchat_follower >= 1000000 && $user->dettagli->snapchat_follower <= 999999999)
                            {{round($user->dettagli->snapchat_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif
                 

                @if(! empty($user->dettagli->pinterest))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->pinterest}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/pinterest.png" alt="Pinterest" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->pinterest_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->pinterest_follower < 999)
                            {{$user->dettagli->pinterest_follower}}
                        @endif
                        @if($user->dettagli->pinterest_follower >= 1000 && $user->dettagli->pinterest_follower <= 999999)
                           {{round($user->dettagli->pinterest_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->pinterest_follower >= 1000000 && $user->dettagli->pinterest_follower <= 999999999)
                            {{round($user->dettagli->pinterest_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

               

                @if(! empty($user->dettagli->twitch))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->twitch}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/twitch.png" alt="Twitch" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->twitch_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->twitch_follower < 999)
                            {{$user->dettagli->twitch_follower}}
                        @endif
                        @if($user->dettagli->twitch_follower >= 1000 && $user->dettagli->twitch_follower <= 999999)
                           {{round($user->dettagli->twitch_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->twitch_follower >= 1000000 && $user->dettagli->twitch_follower <= 999999999)
                            {{round($user->dettagli->twitch_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                @if(! empty($user->dettagli->reddit))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->reddit}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/reddit.png" alt="Reddit" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->reddit_karma))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->reddit_karma < 999)
                            {{$user->dettagli->reddit_karma}}
                        @endif
                        @if($user->dettagli->reddit_karma >= 1000 && $user->dettagli->reddit_karma <= 999999)
                           {{round($user->dettagli->reddit_karma / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->reddit_karma >= 1000000 && $user->dettagli->reddit_karma <= 999999999)
                            {{round($user->dettagli->reddit_karma / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                 @if(! empty($user->dettagli->tumblr))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->tumblr}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/tumblr.png" alt="Tumblr" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->tumblr_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->tumblr_follower < 999)
                            {{$user->dettagli->tumblr_follower}}
                        @endif
                        @if($user->dettagli->tumblr_follower >= 1000 && $user->dettagli->tumblr_follower <= 999999)
                           {{round($user->dettagli->tumblr_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->tumblr_follower >= 1000000 && $user->dettagli->tumblr_follower <= 999999999)
                            {{round($user->dettagli->tumblr_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                 @if(! empty($user->dettagli->myspace))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->myspace}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/myspace.png" alt="Myspace" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->myspace_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->myspace_follower < 999)
                            {{$user->dettagli->myspace_follower}}
                        @endif
                        @if($user->dettagli->myspace_follower >= 1000 && $user->dettagli->myspace_follower <= 999999)
                           {{round($user->dettagli->myspace_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->myspace_follower >= 1000000 && $user->dettagli->myspace_follower <= 999999999)
                            {{round($user->dettagli->myspace_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                                     
                @if(! empty($user->dettagli->linkedin))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->linkedin}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png" alt="LinkedIn" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->linkedin_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->linkedin_follower < 999)
                            {{$user->dettagli->linkedin_follower}}
                        @endif
                        @if($user->dettagli->linkedin_follower >= 1000 && $user->dettagli->linkedin_follower <= 999999)
                           {{round($user->dettagli->linkedin_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->linkedin_follower >= 1000000 && $user->dettagli->linkedin_follower <= 999999999)
                            {{round($user->dettagli->linkedin_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                 @if(! empty($user->dettagli->quora))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->quora}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/quora.png" alt="Quora" style="height:30px; width:30px;margin-left:5px;margin-top:10px;">@if(! empty ($user->dettagli->quora_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->quora_follower < 999)
                            {{$user->dettagli->quora_follower}}
                        @endif
                        @if($user->dettagli->quora_follower >= 1000 && $user->dettagli->quora_follower <= 999999)
                           {{round($user->dettagli->quora_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->quora_follower >= 1000000 && $user->dettagli->quora_follower <= 999999999)
                            {{round($user->dettagli->quora_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif


                 @if(! empty($user->dettagli->weibo))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->weibo}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/weibo.png" alt="Weibo" style="height:30px; width:30px;margin-left:5px;margin-top:10px;box-shadow: 2px 2px 10px 10px #F7F5F8;">@if(! empty ($user->dettagli->weibo_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->weibo_follower < 999)
                            {{$user->dettagli->weibo_follower}}
                        @endif
                        @if($user->dettagli->weibo_follower >= 1000 && $user->dettagli->weibo_follower <= 999999)
                           {{round($user->dettagli->weibo_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->weibo_follower >= 1000000 && $user->dettagli->weibo_follower <= 999999999)
                            {{round($user->dettagli->weibo_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif

                 @if(! empty($user->dettagli->strava))
                <div class="social_link_icons">
                    <a href="{{$user->dettagli->strava}}">
                        <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/strava.png" alt="Strava" style="height:30px; width:30px;margin-left:5px;margin-top:10px;box-shadow: 2px 2px 10px 10px #F7F5F8;">@if(! empty ($user->dettagli->strava_follower))<p id="follower_count_left" style="text-align:center; color:black;">
                        @if($user->dettagli->strava_follower < 999)
                            {{$user->dettagli->strava_follower}}
                        @endif
                        @if($user->dettagli->strava_follower >= 1000 && $user->dettagli->strava_follower <= 999999)
                           {{round($user->dettagli->strava_follower / 1000, 1)}} K
                        @endif
                         @if($user->dettagli->strava_follower >= 1000000 && $user->dettagli->strava_follower <= 999999999)
                            {{round($user->dettagli->strava_follower / 1000000, 0)}} M
                        @endif
                        
                        </p>@else<p id="follower_count_left" style="text-align:center; color:transparent;">0</p>@endif</a>
                </div>
                @endif


                 
                       
            </div>
</div>

@endif

@endif
