@extends('frontend.layouts.interna')

@section('title', app_name() . ' | Offers' )

@section('content')
@push('after-styles')

@endpush

@push('after-scripts')

@endpush

<style>

.row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: 50px;
        //box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:10px;
        //position:absolute;
    }

 .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    margin-top:0px;
    }

    .im{ 
        position: relative;    
        z-index: 1;       
    }

    .card{
        border-radius:15px;
        border:none;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        width: 95vw;
        padding: 10px;
    }

    .card-img_title{
        border-radius:15px;
        height:100px;
        //width:200px;
        object-fit:cover;
        //margin:5px;
        margin-top:-20px;
        margin-bottom:5px;
    }

    .card-img{
        border-radius:100%;
        width:40px;
        margin-right:10px;
    }

    .btn-group{
        display: flex;
    justify-content: center;
    margin: 11px;
    }

    .btn-secondary{
        color:black;
        padding:5px; 
        border-radius:5px;
        border:2px solid #F7F5F8;
        margin:2px;
    }

{{-- full screen --}}
    @media screen and (min-width: 1024px) {

        .container {
            //margin-top:-70px;
            display: flex;
            align-items: center;
            justify-content: center;
            //height: 200px;
            }

        .social {
            position: relative;
            display: inline-block;
            float: left;
            padding: 10px;
            }

        .im{
    	    height: 50px;
            width: 50px;
            border-radius: 25px;
            box-shadow: 2px 2px 10px 10px #F7F5F8;
            margin-top:-100px;
            margin-left: auto;
            margin-right: auto  
            }
    
        .im:hover{
            transition:0.2s;
            transform: scale(1.1);
            }
    
    }


{{-- mobile --}}
    @media screen and (max-width: 1024px) {

      #desktop_layout{
        margin-top:0px;
      }

        #mobile_header_style{
        display:none;
      }

         .kt-portlet{
            margin-top:60px;
        }

        .container {
            margin-top:20px;
            display: flex;  
            flex-wrap: wrap;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            //height: 200px;
            }

        .social {
            position: relative;
            display: inline-block;
            float: center;
            padding: 10px;
            }

        .im{
    	    height: 40px;
            width: 40px;
            border-radius: 20px;
            box-shadow: 2px 2px 10px 10px #F7F5F8;
            margin-top:-50px;
            margin-left: auto;
            margin-right: auto   
            }

        #sup_pan{
            margin-top:-100px;
        }
    
    }

    .im:hover{
    	cursor: pointer;
    }

</style>

<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <!-- begin:: Content -->        
    <div id="sup_pan" class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-xl-12" >
                <div class="row_1">
                    <div style="display:flex; font-size:24px; font-weight:bold;">
                        <a href="{{ URL::previous() }}">
                            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
                        </a>
                        @lang('Offers')
                    </div>
                    <div>
                        {{--<i style="visibility:hidden; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">support_agent</i>--}}
                        <div style="display:flex; justify-content:center; align-items: center; text-align:center; height:30px;width:30px; background-image: linear-gradient(#e72b38, #e72b80); color:white;border-radius:100%;">{{$my_offers->count()}}</div>
                    </div>
                </div>
                <!--begin::Widget -->     	
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__head">
                        <div class="container">
                            @if($my_offers->count() > 0)
    
    <hr>
    <div class="card-deck">
        @foreach($my_offers as $user)
            <div class="card" id="try">

                <div class="card-body">
                    <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $user->uuid])}}"><h3 class="card-title"><img src="{{asset('storage/posts/'.$user->display_image)}}" class="card-img_title" alt="..." ></a>
                    </br>
                    <strong style="font-size:16px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{{ $user->titolo }}</strong>
                    </br></br>
                    <a href="{{ url('/social/'.$user->username) }}" style="color:black;font-size:16px;">
                     @if($user->avatar_location != '')<img src="{{asset('storage/'.$user->avatar_location)}}" class="card-img" alt="...">
                     @else<img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" class="card-img" alt="...">
                     @endif
                     
                      {{ $user->first_name }} {{ $user->last_name }}</a>
                    </br></br>
                    <p class="card-text" style="color:black;font-size:12px;">{{ $user->message }} </p> 
                    
                    <p class="card-text"><small class="text-muted" style="font-size:10px;">{{ $user->created_at }}</small></p>
                    </br> 
                    <p style="background-image: linear-gradient(#e72b38, #e72b80); color:white; padding:10px; border-radius:5px;text-align:center;"><strong style="font-size: 16px;">{{ $user->offer }} €</strong> </p>
                    

                </div>
                
                 
                    
                    <div style="display:flex;justify-content:center;">
                        <textarea style="width:85vw; border:2px solid #F7F5F8; padding:10px;margin:10px;" id="message_seller" name="message_seller" placeholder="Messaggi.."></textarea>
                    </div>
                   
                    

                    
                    
                <div class="btn-group" role="group" aria-label="Basic example">
                    
                    @if($user->accepted_creator == null && $user->refused_creator == null)
                        <a onclick="offers(this.id,{{ $user->offer_id }})" id="refuse"><button class="btn btn-secondary">Refuse</button></a>
                        <a onclick="offers(this.id,{{ $user->offer_id }})" id="accept"><button class="btn btn-secondary">Accept</button></a>
                    @endif


                   

                </div>

               
            </div> 
            <hr>
        @endforeach
        </br>
        </br>
        </br>
        
    
        </br>
        </br>
        </br>
    
@else 

         <div class="new_row">
          </br>
        </br>
        </br>
        
        
                @if($user->avatar_location != '')
                <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
                @else
                <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                @endif
                </br>
                <p style="font-size:20px; text-align:center; color:black;" class="card-text">No Offers!</p>
                <p style="font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color:transparent;" class="card-text">Qui vedi le tue offerte </p>
                </div> 
                </br>
                </br>
    </div>
     </br>
        </br>
        </br>
       
 @endif
                        </div>  
                    </div>
                </div>                      
            </div>
        </div>
    </div>                             
</div>

      

@endsection
    
                
     
<script>
function offers(clicked_id, id){

    var message_seller = $('#try #message_seller').val();
    var data = "offer_type="+clicked_id+"&offer_id="+id+"&message_seller="+message_seller;

	$.ajax({
		url: BASE_URL+'/send-offer',
		type: "POST",
        data: data,
		//data: "offer_type="+clicked_id+"&offer_id="+id,
		headers: {'X-CSRF-TOKEN': CSRF},				
		success: function(response){
			$('#refuse').hide();
			$('#accept').hide();
            $('#try #message_seller').hide();
		},
	});
}
</script>
