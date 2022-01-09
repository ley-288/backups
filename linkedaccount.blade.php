@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Linked Account'))

@section('content')

@push('after-styles')

<style>

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content: center;
}

.gm-style img{
       border-radius:25px;
       object-fit:cover;
    }

    .gm-style .gm-style-iw-c{
        width:200px;
        height:150px;
        padding:20px;
    }

    .gm-style button{
        visibility:hidden;
    }

    .gmnoprint{
        visibility:hidden;
    }
    
    .tabcontent {
        display:flex;
        justify-content:center;
        color: white;
        display: none;
        height: 100%;
    }

    .tablink {
        margin-top: 0vh;
        margin-left: 0vw;
        background-color: transparent;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 14px;
        width: 50%;
        border-top:none;
        border-bottom:1px solid #F7F5F8;
    }

    #info_card{
        color:black !important;
    }

    .button_div{
        display:flex;
    }

 @media screen and (max-width: 700px) {

   #desktop_layout{
     margin-top:0px;
   }

     #stickytypeheader{
        width:100vw;
        background-color:white;
        z-index:100;
    }

   #mobile_header_style{
        display:none;
      }

     #map_location{
        display:flex; justify-content:center; margin-top:-100px !important;
     }

     #map-render{
         position:relative !important; margin-top:70px!important; height:200vh !important; width:100vw !important;
     }

    #kt_body{
        //position:inherit;
        margin-top:-30px;
    }

    #write-message-btn{
            margin-top:-55px;
            margin-left:83vw;
        }

    #mobile_search_function{
        display:none;
    }

    body{
        //background-image: url(/assets/media/icons/angryimg-2.png);
        //background-repeat: repeat-x;
        background-color:white;
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
        //width:50vw;
    }

    #color_white{
        color:white;
    }

    .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: -55px;
        //box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:10px;
    }

    .row_2{
        margin-top: -50px;
        display: flex;
        justify-content: center;
    }

    .row_3{
        display: flex;
        justify-content: center;
        //margin-top: 50px;
    }

    .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
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
        width:85vw;
        margin:10px;
    }

   

    .btn{
        display:flex;
        justify-content: flex-start;
        color:black;
        //width:80vw;
        margin-bottom:15px;
        margin-right:5px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: none;
        font-size:12px;
    }
}

@media screen and (min-width: 700px) {

    #map_location{
         display:flex; justify-content:center; margin-top:-90px;
     }

     #map-render{
         position:relative !important; margin-top:100px!important; height:600px !important; width:800px !important;
     }

    body{
        background-color:white;
    }

    .card{
        border:none;
        background-color:transparent;
        color:black;
        margin-top:20vh;
    }

    .card-title{
        font-size:14px;
    }

    #color_white{
        margin-left:-40px;
    }

    .card h5{
        //width:50vw;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        max-height:50px;
        max-width:50px;
    }

    .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: -55px;
        box-shadow: 0 4px 2px -2px #F7F5F8;
        padding-bottom:20px;
    }

    .row_2{
        margin-top: -50px;
        display: flex;
        justify-content: center;
    }

    .row_3{
        display: flex;
        justify-content: center;
        //margin-top: 50px;
    }

    .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    .card-deck{
        max-width:500px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
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

    .btn-block{
        display:flex;
        justify-content: flex-start;
        margin-left:15vw;
        color:black;
        width:30vw;
        margin-bottom:15px;
        margin-right:5px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }

    .btn{
        display:flex;
        justify-content: flex-start;
        color:black;
        //width:80vw;
        margin-bottom:15px;
        margin-right:5px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: none;
        font-size:12px;
    }

}

</style>
@endpush

<div>
    <div class="row_1">
        <div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{ URL::previous() }}">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            Negozi
          
        </div>
        <div onclick="myAddBlock()">
        
            <i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">add_circle_outline</i>
 
        </div>
    </div>
    </br>
    <div class="row_2">
        @if($user->linked_account != 1)
        <div id="addBlock" style="display:none; margin-top:150px;">
            @include('frontend.auth.linkedaccount_information')
        </div>
        @endif
    </div>
    </br>
    </br>
    </br>
    </br>
    
  

    <div class="new_row">
        @if($user->avatar_location != '')
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
        @else
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
        @endif
        <strong><p style="font-size:20px; text-align:center; color:black;" class="card-text">{{$user->username}}</p></strong>
        </br>
        @if($user->linked_account != 1)
        <p style="font-size:20px; text-align:center; color:black;" class="card-text">Hai un altro negozio?</p>
        <p style="font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text"  onclick="myAddBlock()">Creare un account nuovo</p>
        @else
        <p style="font-size:20px; text-align:center; color:black;" class="card-text"></p>
        <p style="font-size:12px; text-align:center;color: background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text"  onclick="myAddBlock()"></p>
        @endif
    </div>
    </br>
    </br>

    <div id="stickytypeheader">
        <button class="tablink" onclick="openPage('Home', this, 'transparent')" id="defaultOpen"><i class="material-icons nav__icon" id="ico_side" style="color:black;">reorder</i></button>
        <button class="tablink" onclick="openPage('News', this, 'transparent')"><i class="material-icons nav__icon" id="ico_side" style="color:black;">location_on</i></button>
    </div>

    <div id="Home" class="tabcontent" style="margin-top:100px;">
    <div class="row_3">
        @if($linker)
        <div class="card-deck">
            </br>
            @foreach($keylink as $key)
            	@if($key->username != $user->username)
                <div class="card">
                    @if($key->avatar_location != '')
                    <img class="card-img-top" src="{{asset('storage/'.$key->avatar_location)}}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{$key->username}}</strong></h5>
                        </br>
                    </div>
                    <div class="button_div">
                    <a href="{{ url('/social/'.$key->username) }}">
                    <button class="btn btn-secondary">Profilo</button>
                    </a>
                    <a href="{{ url('link-account/login-as') }}/{{ $key->id }}" onclick="login_as()">
                    <input type="hidden" name="email" id="email" value="{{ $key->email }}" />
	                <input type="hidden" name="password" id="password" value="{{ $key->password }}" />
                    <button class="btn btn-secondary" onclick="location.href='{{ url('link-account/login-as')  }}'">Login As</button> 
                    </a>
                    </div>
                </div>
                
                @endif
            @endforeach
            @foreach($linker as $linkee)
            	@if($linkee->username != $user->username)
                <div class="card">
                    @if($linkee->avatar_location != '')
                    <img class="card-img-top" src="{{asset('storage/'.$linkee->avatar_location)}}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{$linkee->username}}</strong></h5>
                        </br>
                        
                        
                    </div>
                    <div class="button_div">
                    @if($linkee->complete == 1)
                    <a href="{{ url('/social/'.$linkee->username) }}">
                    <button class="btn btn-secondary">Profilo</button>
                    </a>
                    @endif
                    <a href="{{ url('link-account/login-as') }}/{{ $linkee->id }}" onclick="login_as()">
                    <input type="hidden" name="email" id="email" value="{{ $linkee->email }}" />
	                <input type="hidden" name="password" id="password" value="{{ $linkee->password }}" />
                    <button class="btn btn-secondary" onclick="location.href='{{ url('link-account/login-as')  }}'">Login As</button> 
                    </a>
                    </div>
                </div>
                
                @endif
            @endforeach
        </div> 
        @endif
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        </br> 
    </div>

    <div class="row_3">
        @if($links) 
        <div class="card-deck">
            </br>
            @foreach($links as $link)
                
                <div class="card">
                
                    @if($link->user->avatar_location != '')
                    <img class="card-img-top" src="{{asset('storage/'.$link->user->avatar_location)}}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                    @endif
            
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{$link->user->username}} </strong></h5>
                        </br>
                        <h5 class="card-title">{{$link->user->getAddress()}} </h5>
                        </br>
                    </div>
                    <div class="button_div">
                    @if($link->complete == 1)
                    <a href="{{ url('/social/'.$link->user->username) }}">
                    <button class="btn btn-secondary">Profilo</button>
                    </a>
                    @endif
                    <a href="{{ url('link-account/login-as') }}/{{ $link->user->id }}" onclick="login_as()">
                    <input type="hidden" name="email" id="email" value="{{ $link->user->email }}" />
	                <input type="hidden" name="password" id="password" value="{{ $link->user->password }}" />
                    <button class="btn btn-secondary" onclick="location.href='{{ url('link-account/login-as')  }}'">Login As</button>
                    </a>
                    <form action="{{ url('link-account/remove')  }}" method="post">
                    @csrf
                        <input type="hidden" id="link_user_id" name="link_user_id" value="{{ $link->user->id }}">
                        <button class="btn btn-secondary">Cancella</button>
                    </form>

                    </div>
                </div>
                
            @endforeach
        </div> 
        @endif
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        </br>
        </br>
        </br>
        </br>
    </div>
    </div>

    </br>
    
    
<div id="News" class="tabcontent" style="margin-top:100px;">

    <div id="map_location">
        <div id="map_radius">
            <div id="map-render">
            </div>
                    
            </div>
        </div>
    </div>
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

<script>

function openPage(pageName, elmnt, color) {

  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }


  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  document.getElementById(pageName).style.display = "flex"; 
  elmnt.style.backgroundColor = color;
}

document.getElementById("defaultOpen").click();

function myAddBlock() {
  var x = document.getElementById("addBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

@push('after-scripts')
<script>

    @if($user->location != null)
        var map = new GMaps({
            el: '#map-render',
            lat: {{ $user->location->latitud }},
            lng: {{ $user->location->longitud }},
            zoom:8,
            minZoom: 1, //zoom out
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
                content: "<div id='info_card'>{{$user->name}}</div>"
            }
        });
    @endif


    @if($nearby != false)
        @foreach($nearby as $location)
                var avatar = {
                    url: "{{asset('storage/'.$location->user->avatar_location)}}",
                    scaledSize : new google.maps.Size(50, 50),
                    };
            map.addMarker({
                lat: {{ $location->latitud }},
                lng: {{ $location->longitud }},
                //title: '{{ $location->user->name }}',
                icon: avatar,
                infoWindow: {
                     content: "<a href='{{ url('/social/'.$location->user->username) }}' id='info_card'><strong>{{ $location->user->dettagli->azienda_nome }}</strong></br></br>{{ $location->user->getAddress() }}</br></br>{{ $location->user->username }}</a>"
                },
                click: function(e) {
                    //alert('{{ $location->user->name }}');
                }
            });
        @endforeach
    @endif


    
    
    /*@if($nearbyShops != false)
        @foreach($nearbyShops as $location)
                var avatar = {
                    url: "{{asset('storage/'.$location->user->avatar_location)}}",
                    scaledSize : new google.maps.Size(50, 50),
                    };
            map.addMarker({
                lat: {{ $location->latitud }},
                lng: {{ $location->longitud }},
                //title: '{{ $location->user->name }}',
                icon: avatar,
                infoWindow: {
                     content: "<a href='{{ url('/social/'.$location->user->username) }}' id='info_card'>{{ $location->user->name }}</a>"
                },
                click: function(e) {
                    //alert('{{ $location->user->name }}');
                }
            });
        @endforeach
    @endif*/
   

</script>

<script>
//$( document ).ready(function() {
$(function(){
        var stickyHeaderTop = $('#stickytypeheader').offset().top;
 
        $(window).scroll(function(){
                if( $(window).scrollTop() > stickyHeaderTop ) {
                        $('#stickytypeheader').css({position: 'fixed', top: '0px'});
                        $('#sticky').css('display', 'block');
                        $('.tablink').css('margin-top', '20px', 'border-top', 'none');
                        $('.tablink_b').css('margin-top', '20px');
                } else {
                        $('#stickytypeheader').css({position: 'static', top: '0px'});
                        $('#sticky').css('display', 'none');
                }
        });
  });
</script>
@endpush

@endsection

