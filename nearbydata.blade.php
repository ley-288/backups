<style>

#contact_info{
    overflow-x: scroll;
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: 70vw;
    //margin-left: 30px;
}

#contact_info_list{
    margin:10px;
}

#contact_info_button{
    border-radius:15px;
    padding:5px;
    background-color:white;
   // background-image:linear-gradient(#44B1FF, #2be0e7);
    color:black;
    border:2px solid #F7F5F8;
    width: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
}

#new_photo_container_camp_map{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: flext-start;
    position: relative;
    width: 90vw;
    overflow-x: scroll;
}

#book{
    background-image: linear-gradient(#44B1FF, #2be0e7);
-webkit-background-clip: text;
-webkit-text-fill-color: transparent;
}

.sivola {
    scroll-behavior: smooth;
    position: absolute;
    margin-top: -450px;
}

#map_box_div{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin-left: -20px;
}

#map_box_photo{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

#map_box_info{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
}

#map_title{
    font-size:20px;
}

#map_budget{
    color: white;
    background-image: linear-gradient(#e72b38, #e72b80);
    border-radius: 5px;
    padding: 10px;
    font-size: 18px;
}

select {
    border: 0px;
    outline: 0px;
}

.modal-header {
    padding: 30px;
    border-bottom: none;
}

#mobile-logo{
    //display:none;
}

#mobile_header_style{
    //background-color:transparent;
}

 .im_pro_edit{
        max-height:40px;
        max-width:40px;
        margin:5px;
    }


#box{
    height:70vh;
    width:100vw;
}

@media screen and (min-width: 1024px){

    #no_show_button{
        display:none;
    }

    #results_container{
        overflow-y:scroll;
        position:absolute;
        z-index: 15;
        background-color:white;
        padding:20px;
        border-radius:5px;
        margin-top:230px;
        margin-left:125px;
        height:70vh;
        width: 30vw;
        box-shadow: 2px 2px 10px 10px gray;
    }

    #map_results{
        margin-top:0px;
    }

    .card_map{
        width:28vw;
    }

    #list_camp_img{
        border-radius:5px;
    }

    .whole_page{
        margin-left:-250px;
        margin-top:-50px;
    }

.side_2{
    background-color:transparent;
    margin-top: 0px;
}

#share_menu{
    visibility:hidden;
}

.side_2:hover {
      margin-top: 0px;
      z-index:25;
}

 body.modal-open {
        overflow: hidden !important;
        margin-top:5% !important;
    }

 .kt-grid{
        margin-top:-40px;
    }

    body.kt-header-mobile--fixed{
        padding-top:none;
    }

    #kt_body {
        background-color: transparent;
    }

    body{
        background-color:white;
    }

    .search_box{
        display:flex;
        position:absolute;
        margin-top:30px;
        align-items: center;
        flex-wrap: nowrap;
        justify-content: center;
        flex-direction: row;
    }

    
    .slidecontainer {
        display: flex;
        position:fixed;
        margin-top:50px;
        margin-left:0px;
        z-index:10;
        width: 30vw;
        z-index: 9;
        background-color: white;
        height: 100px;
        padding: 20px;
        justify-content: center;
        flex-wrap: wrap;
        align-content: flex-start;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px gray;
    }

    .slider {
        -webkit-appearance: none;
        width: 90%;
        height: 5px;
        border-radius: 5px;
        border:1px solid #F7F5F8;
        background: black;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: black;
        border:1px solid black;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: black;
        cursor: pointer;
    }

    #mobile_search_function{
        display:none;
    }

   #map_card_image{
        display:flex;
        border-radius:5px;
        height:110px;
        width:100px;
        object-fit:cover;
        margin-left:5px;
    }

   .gm-style img{
       border-radius:25px;
       object-fit:cover;
    }

    .gm-style .gm-style-iw-c{
        width:400px;
        height:150px;
        padding:20px;
    }

    .gm-style button{
        visibility:hidden;
    }

    .gmnoprint{
        visibility:hidden;
    }

    #map_container{
        margin-left:-140px;
        margin-top:-80px;
    }

    #map-render{
        height:110vh;
        width:110vw;
    }

    #search_btn_map{
        z-index:10;
        padding:10px;
        height:40px;
        width:100px;
        background-color:white; 
        border:2px solid #F7F5F8;
        border-radius:5px; 
        font-size:12px;
    }
   

    #geolocate_me{
        z-index:10;
        padding-top:10px;
        padding-bottom:5px;
        text-align:center;
        height:40px;
        width:100px; 
        color:black;
        background-color: white;
        border-radius:5px;
        border:2px solid #F7F5F8;
        box-shadow:none;
        font-size:12px;
    }

    #cat_drop{
        font-size:12px !important;
        text-align-last:center;
        z-index:9;
    }

    #category{
        font-size:12px !important;
        -webkit-appearance:none;
        text-align-last:center;
        border-radius:5px; 
        height:40px;
        border:2px solid #F7F5F8; 
        width:100px; 
        background-color: white; 
    }

    .save-box{
        //position:absolute;
    }

    .data_fine_map{
        position:absolute;
        height:20px;
        color:white;
        padding:4px;
        border-radius:5px;
        background-color:#5979FB;
    }

}


@media screen and (max-width: 1024px){

   
    .kt-grid{
        margin-top:-60px;
    }

    body.kt-header-mobile--fixed{
        padding-top:none;
    }

    #kt_body {
        background-color: transparent;
    }

    body{
        background-color:white;
    }

    #results_container{
        cursor: move;
        overflow-y: scroll;
        position: fixed;
        z-index: 15;
        background-color: white;
        padding: 20px;
        border-radius: 15px;
        margin-top: -150px;
        width: 100vw;
        box-shadow: 2px 2px 10px 10px gray;
        height:90vh;
    }

    #map_results{
        height:100%;
        margin-top:40px;
        position:fixed;
        cursor: move;
        overflow-y: scroll;
    }

    .card_map{
        width:90vw;
    }

    #list_camp_img{
        border-radius:5px;
        margin-left:0px;
    }

    .search_box{
        display:flex;
        position:absolute;
        margin-top:30px;
        align-items: center;
        flex-wrap: nowrap;
        justify-content: center;
        flex-direction: row;
    }

    
    .slidecontainer {
        display: flex;
        position:absolute;
        margin-top:40px;
        z-index:10;
        width: 90vw;
        margin-left:18px;
        z-index: 9;
        background-color: white;
        height: 100px;
        padding: 20px;
        justify-content: center;
        flex-wrap: wrap;
        align-content: flex-start;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px gray;
    }

    .slider {
        -webkit-appearance: none;
        width: 90%;
        height: 5px;
        border-radius: 5px;
        border:1px solid #F7F5F8;
        background: black;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: black;
        border:1px solid black;
        cursor: pointer;
    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: black;
        cursor: pointer;
    }

   #map_card_image{
        display:flex;
        border-radius:5px;
        height:110px;
        width:100px;
        object-fit:cover;
        //margin-left:5px;
        margin-right: 10px;
    }

   .gm-style img{
       border-radius:25px;
       object-fit:cover;
    }

    .gm-style .gm-style-iw-c{
        width:400px;
        height:150px;
        padding:20px;
    }

    .gm-style button{
        visibility:hidden;
    }

    .gmnoprint{
        visibility:hidden;
    }

    #map_container{
        margin-left:0;
        margin-top:-80px;
    }

    #map-render{
        height:100vh;
        width:110vw;
    }

    #search_btn_map{
        z-index:10;
        padding:10px;
        height:40px;
        width:100px;
        background-color:white; 
        border:2px solid #F7F5F8;
        border-radius:5px; 
        font-size:12px;
    }
   

    #geolocate_me{
        z-index:10;
        padding-top:10px;
        padding-bottom:5px;
        text-align:center;
        height:40px;
        width:100px; 
        color:black;
        background-color: white;
        border-radius:5px;
        border:2px solid #F7F5F8;
        box-shadow:none;
        font-size:12px;
    }

    #cat_drop{
        font-size:12px !important;
        text-align-last:center;
        z-index:9;
    }

    #category{
        font-size:12px !important;
        -webkit-appearance:none;
        text-align-last:center;
        border-radius:5px; 
        height:40px;
        border:2px solid #F7F5F8; 
        width:100px; 
        background-color: white; 
    }

    .save-box{
        //position:absolute;
    }

    .data_fine_map{
        position:absolute;
        height:20px;
        color:white;
        padding:4px;
        border-radius:5px;
        background-color:#5979FB;
    }

}



</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">


    <div class="row">
        <div class="col-md-3">   
        </div>
    </div>
    <div class="col-md-8">
        <div id="map_radius">
            <div style="position:fixed; z-index:0;" id="map-render">
            </div>
        </div>
    </div>
<div id="drag_button" class="ui-widget-content">
    <div style="position: absolute; display:flex; justify-content:center;margin-top: -140px;z-index: 150; margin-left: 170px;">
        <i id="up_drag_button" class="material-icons nav__icon up_drag_button" style="color:black;font-size: 35px;">keyboard_arrow_up</i>
        <i id="down_drag_button" class="material-icons nav__icon down_drag_button" style="display:none; color:black;font-size: 35px;">keyboard_arrow_down</i>
    </div>

    @if($nearbyCompaign == false || $nearbyCompaign->count() == 0)   


    
        <div class="myhandle" id="results_container" style="height:90vh; margin-top:-50px;">

            <div id="map_results">
                <p style="text-align: center;">Non ci sono campagne in quest'area!</p>
            </div>
        </div>

        @else 

        
       
        <div id="no_show_button" style="position: absolute; color: black; margin-top: -220px; margin-left:10px; z-index: 1500;">
            <a href="{{url('/')}}/cerca-campagne">
            <button style="border:none; box-shadow: 2px 2px 10px 10px grey; background-color:white; padding:25px; height:10px; width:10px; border-radius:100%;display: flex;justify-content: center;align-items: center;align-content: center;">
                <i class="material-icons nav__icon" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">reorder</i>
            </button>
            </a>

           
        </div>
        <div class="myhandle" id="results_container">
      
            <div id="map_results">
                <div>
                    @foreach($nearbyCompaign as $data)                   
                        @if($data->campagna != null && $data->campagna->active == 1) 
                            <div class="card_map compaign_card_map" id="panel-post-{{ $data->campagna->id }}">
                                <div class="front">
                                    <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $data->campagna->uuid])}}" class="image-link">
                                        <img id="list_camp_img" src="https://spidergain.com/storage/posts/{{ $data->campagna->display_image }}" alt="image" />
                                    </a>                                           
                                    <h5><a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $data->campagna->uuid])}}" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{{ $data->campagna->titolo }}</a></h5>
                                    <div style="display: flex; flex-wrap:wrap; font-size:12px; padding-right: 50px;">
                                        {!! Str::limit(strip_tags($data->campagna->descrizione),80,'...') !!}
                                        <div class="save-box" style="margin-left:80vw;">
                                        <a href="javascript:;" onclick="saveCampagna({{ $data->campagna->id }})" class="save-text">
                                      @if($data->campagna->checkSave($user->id))
                                        <i id="fa-heart" style="color:black;" class="material-icons nav__icon" id="bookmark">bookmark</i>
                                      @else 
                                        <i id="fa-heart-o" style="color:black;" class="material-icons nav__icon" id="bookmark-o">bookmark_border</i>
                                      @endif
                                    </a>
                                    </div>
                                        </br>
                                        


            <div>
                @if($data->campagna->allegati != '')
                    @php
                        $immagini = json_decode($data->campagna->allegati,true);
                    @endphp  
                    <div id="new_photo_container_camp_map">
                        @foreach($immagini as $key=>$immagine)
                            @if($immagine != '') {{--href="{{asset('storage/'.$immagine)}}" data-fancybox="gallery"  data-caption="{{$data->campagna->titolo}}"--}}
                                <img style="max-height:80px; max-width:80px; object-fit:cover; margin:5px; position:relative; border-radius:5px; border:none;"  src="{{asset('storage/'.$immagine)}}" alt="image" />
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>



                                        </br>
                                       @if(!empty($data->campagna->durata) && !empty($data->campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $data->campagna->uuid])}}" style="color:white;">

             

             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder; width: 90vw;">
            
                <strong>@lang('applicazione.budget'):
                {{$data->campagna->budget}} €  {{__('applicazione.budget_'.$data->campagna->budget_periodo)}}
                    - 
                @lang('applicazione.durata'):
                {{$data->campagna->durata}}  {{__('applicazione.durata_'.$data->campagna->durata_periodo)}}           
                </strong> 
                </div> 
            </a>
            @endif
            @if(empty($data->campagna->durata) && !empty($data->campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $data->campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder; width: 90vw;">
                <strong>@lang('applicazione.budget'):</strong>
                {{$data->campagna->budget}} €  {{__('applicazione.budget_'.$data->campagna->budget_periodo)}}
                </div> 
            </a>
            @endif
            
            @if(!empty($data->campagna->durata) && empty($data->campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $data->campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder; width: 90vw;">
                <strong>@lang('applicazione.durata'):</strong>
                {{$data->campagna->durata}}  {{__('applicazione.durata_'.$data->campagna->durata_periodo)}}
             </div> 
            </a>
            @endif 
                                        
                                    </div>
                                    </br>
                                    
                                    <div>
                                    <div class="save-box" style="position:relative; display:flex; align-items:center">
                                    
                                    <button style="margin-right:45px; background-color:white; border:none; box-shadow:none; color:black;" data-toggle="modal" data-item="{{ $data->campagna->id }}" data-target="#campagnaShareModal-{{ $data->campagna->id }}" class="tablink_b"><i class="material-icons nav__icon" id="ico_side" style="color:black;">share</i></button>


                                   {{-- <a href="javascript:;" onclick="saveCampagna({{ $data->campagna->id }})" class="save-text">
                                      @if($data->campagna->checkSave($user->id))
                                        <i id="fa-heart" style="color:black;" class="material-icons nav__icon" id="bookmark">bookmark</i>
                                      @else 
                                        <i id="fa-heart-o" style="color:black;" class="material-icons nav__icon" id="bookmark-o">bookmark_border</i>
                                      @endif
                                    </a> --}}

                                <div id="contact_info">
                                   @if(!empty($data->campagna->whatsapp))
                                    <a href="https://api.whatsapp.com/send?phone={{$data->campagna->whatsapp}}" id="contact_info_list">
                                        <button id="contact_info_button">
                                        <i class="material-icons nav__icon" id="book">call</i>
                                        Whatsapp</button>
                                    </a>
                                    

                                    <a href="tel:{{$data->campagna->whatsapp}}" id="contact_info_list">
                                        <button id="contact_info_button">
                                        <i class="material-icons nav__icon" id="book">call</i>
                                        Chiama
                                        </button>
                                    </a>
                                    @endif
                                
                                    <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $data->campagna->uuid])}}" id="contact_info_list">
                                        <button id="contact_info_button">
                                        <i class="material-icons nav__icon" id="book">work</i>
                                        Offer</button>
                                    </a>
                                    
                                    <a href="https://maps.google.com/maps/dir/{{$data->campagna->getAddress()}}" id="contact_info_list">
                                        <button id="contact_info_button">
                                        <i class="material-icons nav__icon" id="book">place</i>
                                        Maps</button>
                                    </a>

                                    <a href="{{ url('/direct-messages/show/'. $data->campagna->user_id) }}" id="contact_info_list">
                                        <button id="contact_info_button">
                                        <i class="material-icons nav__icon" id="book">chat</i>
                                        Messaggio
                                        </button>
                                    </a>
                                </div>
                                    </div>
                                    </div>
                                    </br>
                                    </br>
                                </div> 
                            </div>
                            <hr>
                            </br>
                        @endif
                        
                    @endforeach
                    </br>
                    </br>
                    </br>
                    </br>
                    </br>
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
                </div>
            </div>
        
        </br>
        </br>
        </br>
        </br>
        
    </div>
</div>  
@endif


 @foreach($nearbyCompaign as $data)            

<!-- Modal -->
  <div class="modal fade" id="campagnaShareModal-{{ $data->campagna->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">{{ $data->campagna->titolo }}</h4>
        </div>
        <div class="modal-body" style="display: flex;justify-content: center;align-items: center;align-content: center;flex-wrap: nowrap;flex-direction: column;">

           
            <img src="{{asset('storage/posts/'.$data->campagna->display_image)}}"  class="media-object img-circle" style="height: 80px; width:80px; border-radius:5px; object-fit:cover;"/>
           
            </br>
            <p> Condividi la campagna in altri Social!</p>
            </br>

          <div id="user_modal_links">
                <div style="display: flex;justify-content: center;flex-direction: row;flex-wrap: wrap; align-content: center; padding:10px;">
                    <a href="javascript:void(0)" onClick='copyText(this)'><p style="display:none; font-size:1px;">{{ $data->campagna->titolo }}</p><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/copylink.png"></a>
                    <a href="#"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(' {{asset('storage/posts/'.$data->campagna->display_image)}} '),'facebook-share-dialog','width=626,height=636'); return false; ismap"></a>
                    <a href="#"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png"  alt="Share on Twitter" onclick="javascript:window.open('https://twitter.com/share?;text=Check%20this%20out%20in%20my%20Spiderfeed!&amp;url={{asset('storage/posts/'.$data->campagna->display_image)}}','Twitter-dialog','width=626,height=436'); return false; ismap"></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{asset('storage/posts/'.$data->campagna->display_image)}}" target="_blank"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png"></a>
                    <a href="https://api.whatsapp.com/send?text={{asset('storage/posts/'.$data->campagna->display_image)}}"><img class="im_pro_edit" src="{{url('/')}}/assets/media/icons/socialbuttons/whatsapp.png"  alt="Share on Whatsapp"></a>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
@endforeach

<script type="text/javascript">


    @if($user->location != null)
   
        var map = new GMaps({
            el: '#map-render',
            lat: {{ $user->location->latitud }},
            lng: {{ $user->location->longitud }},
            zoom:8,
            minZoom: 8, //zoom out
            maxZoom: 20, //zoom in
            
        });
        var avatar = {
                    url: "{{asset('storage/'.$user->avatar_location)}}",
                    scaledSize : new google.maps.Size(50, 50)
                    };
        map.addMarker({
            lat: {{ $user->location->latitud }},
            lng: {{ $user->location->longitud }},
            title: 'You',
            icon: avatar,
            infoWindow: {
                icon: "{{asset('storage/'.$user->avatar_location)}}",
                content: "<div id='info_card'> {{ $user->name }} </div>"
            }
        });
    @endif

    @if($nearby != false)
        @foreach($nearbyCompaign as $location)
        @if($location->campagna != null && $location->campagna->active == 1)
                var avatar = {
                    url: "{{asset('/storage/posts/'.$location->campagna->display_image)}}",
                    scaledSize : new google.maps.Size(50, 50),
                    };
            map.addMarker({
                lat: {{ $location->latitud }},
                lng: {{ $location->longitud }},
                
                icon: avatar,
                infoWindow: {
                      content: "<div id='map_box_div'><div id='map_box_photo'><img id='map_card_image' src='{{asset('/storage/posts/'.$location->campagna->display_image)}}'></div><div id='map_box_info'><a href='{{route('frontend.user.campagna.dettaglio',['uuid' => $location->campagna->uuid])}}' id='info_card'><div id='map_title' style='color:black;'>{{Str::limit(strip_tags($location->campagna->titolo),13)}}</div></br></br><div id='map_budget'>Budget: {{ $location->campagna->budget }} €</div></a></div></br></div>"
                },
                click: function(e) {
                    
                }
            });
            
            
        @endif
        @endforeach
    @endif 






var slider = document.getElementById("distance");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
    

</script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  {{-- <script src="jquery.ui.touch-punch.js"></script> --}}

  {{-- <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="http://code.jquery.com/ui/1.8.21/jquery-ui.min.js"></script> --}}
{{-- <script src="jquery.ui.touch-punch.min.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.mouse.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

  <script>
            //$('.sivola').scrollUp("fast");



    $("#drag_button").click(function(){
        $(this).removeAttr('id');
        $(this).attr('id', 'new_drag_button');
        $(this).addClass("sivola");
            window.scrollTo(1, 1);
        if ($(window).height() > 400) {
            $('.down_drag_button').css({
                display: 'block',
            });
            $('.up_drag_button').css({
                display: 'none',
            });
            $("#new_drag_button").click(function(){
                $(this).removeClass("sivola");
                $(this).removeAttr('id');
                $(this).attr('id', 'drag_button');
                $('.down_drag_button').css({
                    display: 'none',
                });
                $('.up_drag_button').css({
                    display: 'block',
                });
            });
        }
    });



  /*
    
    $( function() {
        var y1=450;//half box height
        var y2=$(window).height()-y1;
        var dragOpts = {
            handle: '.myhandle'
        }

        $( "#drag_button" ).draggable({ axis: "y" , containment: [y1,y2], dragOpts });
            window.scrollTo(1, 1);
        
    });
    
    */






/*
function touchHandler(event) {
    var self = this;
    var touches = event.changedTouches,
        first = touches[0],
        type = "";

    switch (event.type) {
    case "touchstart":
        type = "mousedown";
        window.startY = event.pageY;
        break;
    case "touchmove":
        type = "mousemove";
        break;
    case "touchend":
        type = "mouseup";
        break;
    default:
        return;
    }
    var simulatedEvent = document.createEvent("MouseEvent");
    simulatedEvent.initMouseEvent(type, true, true, window, 1, first.screenX, first.screenY, first.clientX, first.clientY, false, false, false, false, 0 , null);

    first.target.dispatchEvent(simulatedEvent);

    var scrollables = [];
    var clickedInScrollArea = false;
    // check if any of the parents has is-scollable class
    var parentEls = jQuery(event.target).parents().map(function() {
        try {
            if (jQuery(this).hasClass('myhandle')) {
                clickedInScrollArea = true;
                // get vertical direction of touch event
                var direction = (window.startY < first.clientY) ? 'down' : 'up';
                // calculate stuff... :o)
                if (((jQuery(this).scrollTop() <= 0) && (direction === 'down')) || ((jQuery(this).height() <= jQuery(this).scrollTop()) && (direction === 'up')) ){

                } else {
                    scrollables.push(this);
                }
            }
        } catch (e) {}
    });
    // if not, prevent default to prevent bouncing
    if ((scrollables.length === 0) && (type === 'mousemove')) {
        //event.preventDefault();
    }

}

function initTouchHandler() {
    document.addEventListener("touchstart", touchHandler, true);
    document.addEventListener("touchmove", touchHandler, true);
    document.addEventListener("touchend", touchHandler, true);
    document.addEventListener("touchcancel", touchHandler, true);

}

$(document).ready(function() {
    var y1=400;
    var y2=$(window).height()-y1;
    var dragOpts = {
        handle: '.myhandle'
    }

    initTouchHandler();
    
    $('#drag_button').draggable({
        axis: "y" , containment: [y1,y2], dragOpts,                       
        revert: true
    });
    window.scrollTo(1, 1);

});
*/

  </script>
