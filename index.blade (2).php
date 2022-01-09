@extends('frontend.layouts.social')

@section('content')

@push('after-styles')
<link href="{{url('/')}}/assets/css/map.css?v=1.0" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
@endpush

<style>
    #desktop_layout{
        margin-top:5px;
    }
</style>

<div>
    
<div class="whole_page" style="">
    <div class="slidecontainer" id="slidecontainer1">
        <input type="range" min="1" max="50" value="1" class="slider" name="distance" id="distance" style="margin-bottom:5px;">
        <strong style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><p>Distanza : <span id="demo"></span> km </strong>della tua posizione</p>
        </br>
        <div class="search_box">
        <div id="cat_drop">
            <select id="category" name="category">
           
                <option disabled selected>Categoria</option>
               
                @foreach($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                @endforeach
                
            </select>
        </div> 
        <div id="geolocate_me">
            <a data-item="{{ $user->id }}" data-toggle="modal" data-target="#findModal-{{$user->id}}" id="plus_btn_follow_list">
            Posizione     
            </a>
        </div> 
        <input id="search_btn_map" type="button" class="" onclick="filterData()" value="Cerca">
        </div>
    </div>
    </br>
    

    <div class="col-md-8" id="map_container">
        <div id="map_radius">
            <div style="z-index:0;" id="map-render">
            </div>
        </div>
    </div>
</div>
        

</div>


<!-- Modal -->
<div id="findModal-{{$user->id}}" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Posizione</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
      <div style="margin-left:0px;" id="new_post_box_height">
        <div class="panel-body">
        <form style="overflow-x:hidden; width:100%;" id="form-profile-information">
            {{ csrf_field() }}
            <input type="hidden" value="" name="map_info" class="map-info">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input style="border-radius:5px;" type="text" class="form-control location-input" value="{{ $user->getAddress() }}" aria-describedby="basic-addon1">
                            <input type="hidden" value="" name="map_info" class="map-info">
                        </div>
                    </div>  
                </div>
               </br>
                <div class="clearfix"></div>
                    <a href="javascript:;" style="display:flex; justify-content:center;" onclick="findMyLocation({{$user->id}})">Posizione Reale ( Dal tuo telefono<i style="font-size:12px;" class="material-icons nav__icon">location_on</i>)</a>
                </div>
                    </br></br></br>
                <div class="row" style="display:flex; justify-content:center;">
                    <div class="col-xs-4" style="display:flex; justify-content:center;"> 
                           <button type="button" class="btn btn-success saveMyLocation" style="border-radius:5px;" onclick="saveMyLocation({{$user->id}})">Save</button>
                    </div>
                </div>
            </div> 
        </form>
        </div>
    </div>
    </div>
  </div>
</div>
 

@endsection



@push('after-scripts')

<script type="text/javascript">

window.onload = function () {
  window.scrollTo(1, 1);
}

    function filterData(){
        var dist = $('#distance').val();
        var cat = $('#category').val();
        if(dist != null){
            $.ajax({
                url: BASE_URL+'/social/nearby-data',
                type: "GET",
                data: {'distance':dist, 'category_id':cat},
                success: function(response) {
                $("#map_radius").html(response);
                    console.log(response);
                },
            });
        }
    }

    @if($user->location != null)
   
        var map = new GMaps({
            el: '#map-render',
            lat: {{ $user->location->latitud }},
            lng: {{ $user->location->longitud }},
            zoom:12,
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
                content: "<div id='info_card'>'Ciao!'</div>"
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
                     content: "<img id='map_card_image' src='{{asset('/storage/posts/'.$location->campagna->display_image)}}'></br><a href='{{route('frontend.user.campagna.dettaglio',['uuid' => $location->campagna->uuid])}}' id='info_card'>{{ $location->campagna->titolo }}</br>Budget:{{ $location->campagna->budget }} - Durata:{{ $location->campagna->durata }}</a></br></br>"
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

    if (slider.value > 21){
        slider.oninput = function() {
            return false;
        }
    } else {
        slider.oninput = function() {
            output.innerHTML = this.value;
        }
    }  


</script>

{{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css"> --}}
{{-- <script>
$( function() {
    $( "#results_container" ).draggable();
  } );
</script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>




@endpush
