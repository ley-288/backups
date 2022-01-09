@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Search'))

@section('content')

<style>

    h4{
        color:black;
    }

    #desktop_layout{
        margin-top:0px;
    }

    .tab-content{
        margin-top:60px;
    }

    li{
        border-radius:7px;
    }

    h4{
        margin-left:20px;
    }

    a{
        color:black;
    }

    a:focus, a:hover {
        //color: red;
         background-image: linear-gradient(#e72b38, #e72b80); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
    }

    .btn-secondary{
        background-color:white;
        border:2px solid #F7F5F8;
        box-shadow:none;
        color:black;
        border-radius:5px;
    }

    table{
        //margin-left:20px;
        margin:30px;
    }

    td{
        padding:10px;
    }

    .card-title{
        font-size:12px;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        max-height:40px;
        max-width:40px;
    }

    .card h5{
        width:50vw;
    }

    @media screen and (max-width: 1024px){

        #comp_image_flex{
            width:91vw;
        }

        #search_campaign_card{
            width:97vw;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 2px 2px 10px 10px #f7f5f8;
            margin: 10px;
        }

        #phone_width{
            width:95vw;
            margin: 10px;
            box-shadow: 2px 2px 10px 10px #F7F5F8;
            border-radius:5px;
            padding:10px;
            border:none;
        }

        #profile_button_in_search{
            position: absolute;
            margin-left: 68vw;
            margin-top: -50px;
        }

        #mobile_header_style{
            display:none;
        }

        .input-group{
            border: 2px solid #F7F5F8; 
            width:90vw;
            border-radius:5px;
        }

        #block{
            position:fixed;
            //top:0;
            margin-top:-150px;
            background-color:white;
            z-index:5;
            //-webkit-backdrop-filter: blur(15px);
            //backdrop-filter: blur(15px);
            //background-color: transparent;
        }

        .search_in_search{
            margin-top:-50px;
            margin-left:20px;
            display: flex;
            flex-wrap: nowrap;
            flex-direction: row;
        }   

        input{
            border:none !important;
            box-shadow: none !important;
        }

        #search_scroll_row {
            //border-bottom: 1px solid #F7F5F8;
            height:85px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
        }

        .search_new_scroll { 
            width: 105vw;
            margin-left:-20px;
            background-color: transparent;
            overflow-x: auto !important;
            overflow-y: hidden;
            white-space: nowrap;
        }

        .new-search-item {
            font-size:15px;
            margin-top:9px;
            width: 150px;
            height: 50px;
            background: white;
            //color:black !important;
            display: inline-block;
            padding: 12px;
            text-align: center;
            border: 2px solid #F7F5F8;
            border-radius:15px;
        }

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

        .card-deck{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }   

        .card-deck .card {
            display: flex;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
            border: none;
            box-shadow: 2px 2px 10px 10px #f7f5f8;
            align-items: center;
            width:35vw;
            margin:10px;
        }

        .scrollmenu_search{
            display: flex;
            width: 100vw;
            height: 100px;
            background-color: transparent;
            overflow-x: auto !important;
            overflow-y: hidden;
            white-space: nowrap;
        }

    }


    @media screen and (min-width: 1024px){

         #profile_button_in_search{
            position: absolute;
            margin-left: 700px;
            margin-top: -50px;
        }

          #search_campaign_card{
            width:40vw;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 2px 2px 10px 10px #f7f5f8;
            margin: 10px;
        }

        #comp_layout{
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #tab1 .card{
            width:800px
        }

        .input-group{
            border: 2px solid #F7F5F8; 
            width:610px;
            margin-left:20px;
            margin-top:-90px;
            border-radius:5px;
        }

        #block{
            //position:fixed;
            top:0;
            margin-top:-120px;
            //background-color:white;
            width:800px;
            z-index:9999999999999901;
            //-webkit-backdrop-filter: blur(15px);
            //backdrop-filter: blur(15px);
            //background-color: transparent;
        }   

        .search_in_search{
            margin-top:-50px;
            margin-left:0px;
            display: flex;
            flex-wrap: nowrap;
            flex-direction: row;
            justify-content:center;
        }

        input{
            border:none !important;
            box-shadow: none !important;
        }   

        #search_scroll_row {
            //border-bottom: 1px solid #F7F5F8;
            height:85px;
            margin-left:-20px;
            //width: 820px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
        }

        .search_new_scroll { 
            background-color: transparent;
            overflow-x: auto !important;
            overflow-y: hidden;
            white-space: nowrap;
        }

        .new-search-item {
            margin-top:9px;
            width: 150px;
            height: 50px;
            background: white;
            //color:black;
            display: inline-block;
            padding: 15px;
            text-align: center;
            border: 2px solid #F7F5F8;
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

        .card-deck{
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card-deck .card {
            display: flex;
            flex-wrap: nowrap;
            align-content: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
            border: none;
            box-shadow: 2px 2px 10px 10px #f7f5f8;
            align-items: center;
            width:35vw;
            margin:10px;
        }

        .scrollmenu_search{
            display: flex;
            width: 800px;
            height: 100px;
            background-color: transparent;
            overflow-x: auto !important;
            overflow-y: hidden;
            white-space: nowrap;
        }
    }

</style>

<div id="block">
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<div style="z-index:9999999999999999;" id="mobile_search_function">
    <div class="search_in_search">
        <form method="get" action="{{ url('/search') }}">
            <div class="input-group">
                <input type="text" class="form-control input-lg" name="s" placeholder="@lang('applicazione.cerca')" minlength="3" value="{{$s}}"/>
                <span class="input-group-btn">
                    <button id="unhide_search_button" type="submit" class="btn btn-secondary btn-lg" type="button" style="border:none;">
                        <i id="icon_menu_icon_logo" class="material-icons nav__icon" style="font-size:24px; border:none; padding: 0px;">search</i>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>


<div id="search_scroll_row">
    <ul class="search_new_scroll" role="tablist">
        <li class="new-search-item"><a href="#tab1"  data-toggle="tab" >@lang('applicazione.utenti')</a></li>
        <li class="new-search-item"><a href="#tab2" data-toggle="tab" >@lang('#Hashtags')</a></li>
        <li class="new-search-item"><a href="#tab4" data-toggle="tab" >@lang('applicazione.gruppi')</a></li> 
        <li class="new-search-item"><a href="#tab5" data-toggle="tab" >@lang('applicazione.campagne')</a></li>
    </ul>
</div>
</div>
    

<div class="tab-content">
    <div class="tab-pane @if(empty($s))fade in active @endif" id="tab0">
        </br>
        <h4>Suggested</h4>
        <div class="scrollmenu_search">
            @foreach(Auth::user()->suggestedPeople(100) as $user)
                @if($user->complete == 1)
                    
                        <a class="new-search-item" style="border:none; margin-top: -10px;" href="{{ url('/social/'.$user->username) }}">
                        @if($user->avatar_location != '')
                            <img id="sugg_p_avatar"  style="height:100px; width:100px; border-radius:50px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                                @if($user->verified == 1)
                                    <img id="verified_img_sm_sugg" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                                @elseif($user->staff == 1)
                                    <img id="verified_img_sm_sugg" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                                @elseif($user->gold == 1)
                                    <img id="verified_img_sm_sugg" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                                @endif
  
                            @else
                            <img id="sugg_p_avatar"  style="height:100px; width:100px; border-radius:50px; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                             
                    @endif  
                    <p style="font-size:10px; font-weight: bold; margin-left:0px; margin-top:4px; color:black;">{{ str_limit($user->username, 10) }}</p>
                        </a>
                           
                @endif   
            @endforeach
        </div>
        </br>

        <div id="user_list_hidden" style="display:none">
         <h4>Users</h4>
        <div class="scrollmenu_search">
             @foreach($users->take(20) as $user)
                        
                @if($user->complete == 1 && $user->username != 'User')
                    
                        <a class="new-search-item" style="border:none; margin-top: -10px;" href="{{ url('/social/'.$user->username) }}">
                        @if($user->avatar_location != '')
                            <img id="sugg_p_avatar"  style="height:60px; width:60px; border-radius:30px; box-shadow: 2px 2px 10px 10px #F7F5F8; object-fit:cover;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                                @if($user->verified == 1)
                                    <img id="verified_img_sm_sugg" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                                @elseif($user->staff == 1)
                                    <img id="verified_img_sm_sugg" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                                @elseif($user->gold == 1)
                                    <img id="verified_img_sm_sugg" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                                @endif
  
                            @else
                            <img id="sugg_p_avatar"  style="height:60px; width:60px; border-radius:30px; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                             
                    @endif  
                    <p style="font-size:10px; font-weight: bold; margin-left:0px; margin-top:4px; color:black;">{{ str_limit($user->username, 10) }}</p>
                        </a>
                           
                @endif   
            @endforeach
        </div>
        </br>
        </div>

        <h4>Latest</h4>
        <div id="new_photo_container_camp">
            @foreach($posts->take(100) as $post)
                @if( $post->user->username != 'User' && $post->spider != 1)
                    @if($post->hasImage())
                        @foreach($post->images()->get() as $image)
                            @if ((str_contains($image->getURL(), 'MOV') == 0) && (str_contains($image->getURL(), 'mp4') == 0))
                                <a href="{{ url('/post/'. $post->id) }}">
                                    <img id="new_profile_image_camp"  style="border-radius:0px; border:1px solid transparent;" src="{{ $image->getURL() }}" alt="Post" />
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endif
            @endforeach
        </div>
        </br>
        </br>
    </div>

    <div class="tab-pane @if(!empty($s))fade in active @endif" id="tab1"> 
        {{--</br>
        <h4>Users</h4>--}}
        @if($users->count() == 0)
        @else
            <div>
            
              
@foreach($users->take(30) as $user)
@if($user->complete == 1 && $user->username != 'User')
                
  <div class="card" id="phone_width">
  <div class="card-body" style="padding:10px; border-radius:5px; display: flex;justify-content: center;flex-direction: column;align-items: flex-start;flex-wrap: nowrap;">
    <div class="card-title"><a href="{{ url('/social/'.$user->username) }}">
                                        @if($user->avatar_location != '')
                                            <img style="max-height:60px; max-width:60px; border-radius:30px; margin-right:5px; box-shadow: 2px 2px 10px 10px #F7F5F8" src="{{asset('storage/'.$user->avatar_location)}}"/>
                                        @else
                                            <img style="max-height:60px; max-width:60px; border-radius:30px; margin-right:5px;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png"/>
                                        @endif
                                    </a>
                                     @if($user->company == 1)
                                        @if(!empty($user->azienda_nome))
                                            {{Str::limit(strip_tags($user->azienda_nome),27,'...')}}
                                        @endif
                                    @else
                                        {{Str::limit(strip_tags($user->name),27,'...')}}
                                    @endif
                                    <div id="profile_button_in_search">
                                    <a href="{{ url('/social/'.$user->username) }}" class="card-link"><button style="background-image: linear-gradient(#e72b38, #e72b80); color:white;" class="btn btn-secondary">Profilo</button></a>
                                    </div>
                                    </br>
                                    </div>
                                   
                                    </br>
                                    @if(!empty($user->bio))
                                    <p style=" background-image: linear-gradient(#e72b38, #e72b80); -webkit-background-clip: text; -webkit-text-fill-color: transparent; font-size:10px; text-align:center;">{{ $user->profession }}</p>
    <p class="card-text">{!!  substr(strip_tags($user->bio), 0, 200) !!}...</p>
    @else
    </br>
    @endif
    
    
  </div>
 
</div>

@endif
@endforeach


                </br>
                </br>
                </br>
                </br>
                </br>
                </br>
            </div>                  
        @endif
    </div>

    <div class="tab-pane fade" id="tab2">    
    {{--</br>
    <h4>Hashtags</h4>--}}
        <div id="new_photo_container_camp">
            @foreach($posts->take(100) as $post)
                @if( $post->user->username != 'User' && $post->spider != 1)
                 @if($post->hasImage())
                    @foreach($post->images()->get() as $image)
                    @if ((str_contains($image->getURL(), 'MOV') == 0) && (str_contains($image->getURL(), 'mp4') == 0))
                    <a href="{{ url('/post/'. $post->id) }}">
                        <img id="new_profile_image_camp"  style="border-radius:0px; border:1px solid transparent;" src="{{ $image->getURL() }}" alt="Post" />
                    </a>
                    @endif
                    @endforeach
                @endif
                @endif
            @endforeach
        </div>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
    </div>

    <div class="tab-pane fade" id="tab4"> 
    {{--</br>
    <h4>Gruppi</h4>--}}
    @if($groups_search->count() == 0)    
    @else
        <div class="card-deck">
            </br>
            @foreach($groups_search->take(10) as $group_search)
                <a href="{{ url('/group/'.$group_search->id) }}">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage/'.$group_search->hobby->admin_photo)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $group_search->hobby->name }}</br>@if(!empty($group_search->hobby->category))  {{ $group_search->hobby->category }} @else </br> @endif</h5>
                        <p class="card-text"><small class="text-muted">{{ $group_search->countPeople() }}</small></p>
                    </div>
                </div>
                </a>
            @endforeach
        </div> 
    @endif 
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>   
    </div>
     
    <div class="tab-pane fade" id="tab5">
    {{--</br>
    <h4>Campagne</h4>
    </br>--}}
        <div id="comp_layout" style="margin-left:-5px;">
        @foreach($campagne->take(20) as $campagna)
        <div id="search_campaign_card">
               <div class="card_map compaign_card_map" id="panel-post-{{ $campagna->id }}">
                    <div class="front">
                        <div id="comp_image_flex" style="display:flex;justify-content:center;">
                        <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" class="image-link">
                            <img style="border-radius:15px;" src="https://spidergain.com/storage/posts/{{ $campagna->display_image }}" alt="image" />
                        </a>  
                        </div> 
                        <h3 id="titolo_map">
                        <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}">{{ $campagna->titolo }}</a></h3>
                        <p id="username_map" style="color:black;">
                            {!! Str::limit(strip_tags($campagna->descrizione),80,'...') !!}
                        </p>     
                            </br>
            @if(!empty($campagna->durata) && !empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
            
                <strong>@lang('applicazione.budget'):
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                    - 
                @lang('applicazione.durata'):
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}           
                </strong> 
                </div> 
            </a>
            @endif
            @if(empty($campagna->durata) && !empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.budget'):</strong>
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                </div> 
            </a>
            @endif
            
            @if(!empty($campagna->durata) && empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.durata'):</strong>
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}
             </div> 
            </a>
            @endif 
                        
                        </br>
                       
                    </div>      
                </div> 
                </br>
                </br>
            </div>
            @endforeach
            </br>
            </br>
            </br>
            </br>
            </br>
            </br> 
        </div>
    </div>
</div>       

@endsection

@push('after-scripts')

<script>

window.onload = function () {
    window.scrollTo(1, 1);
}

</script>

@endpush


