@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('applicazione.campagne'))

@section('content')

<style> 


.im_pro{
            margin-top:0px !important;
        }

#desktop_layout{
            margin-top:-50px;
        }

        .page-item.active .page-link {
    margin: 2px;
    border-radius: 25px;
    z-index: 1;
    color: #fff;
    background-color: #5867dd;
    border-color: #5867dd;
    }

      .page-link {
    margin: 2px;
    border-radius: 25px;
    z-index: 1;
    color: #fff;
    background-color: #5867dd;
    border-color: #5867dd;
    }

    @media screen and (max-width: 700px) {

        #camplist {
  overflow: scroll;
  height: 95vh;
  scroll-snap-points-y: repeat(100vh);
  scroll-snap-type: y mandatory;
}

#camplist .snapbox {
  height: 100vh;
  scroll-snap-align: start;
  position: relative;
}

        body.modal-open {
        overflow: hidden !important;
        margin-top:3% !important;
    }


        #mobile_header_style{
            display:none;
        }

        body{
            background:white;
        }

        #kt_body{
            margin-top:-40px;
        }

        .box-list_campaigns{
            margin-top:-20px;
            display:flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        #mobile_search_function{
            display:none;
        }

        .btn-group{
            margin-top:-30px;
            display:flex;
            justify-content:center;
            padding:15px;
        }
    
        #btn-secondary{
            border-radius:5px;
            border:2px solid #F7F5F8;
            padding-left:25px;
            padding-right:25px;
            padding-top:5px;
            padding-bottom:5px;
            margin:1px;
            color:black;
            box-shadow:none;
            background:white;
        } 

        #fixed_map_button{
            visibility:hidden;
            position:fixed;
            z-index:1;
            margin-bottom:0;
            margin-left: -80px;
            margin-top: 60vh;
            background-color:white;
            padding:1px;
            height:60px;
            width:60px;
            border-radius:30px;
            box-shadow: none;
            font-size:18px;
        }

     
        
    }


    @media screen and (min-width: 700px) {

         .side_2{
            margin-top:20px;
        }

        .side_2:hover{
            margin-top:20px;
        }

        .kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
            justify-content:center !important;
        }

        body{
            background-color:white;
        }

        #margin-top_boxes{
            margin-top:70px;
        }

        .group-center{
            display:flex;
            justify-content:center;
        }

        .btn-group{
            position:absolute;
            margin-top:-30px;
            display:flex;
            justify-content:center;
            padding:15px;
            margin-bottom:20px;
        }
    
        #btn-secondary{
            border-radius:5px;
            border:2px solid #F7F5F8;
            margin:3px;
            color:black;
            box-shadow:none;
        }   

        .box-list_campaigns{
            display: flex;
    align-content: center;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;
    width: 90vw;
        }

        #fixed_map_button{
            display:none;
        }

    }


        .fa-facebook {
            content: url('/assets/media/icons/socialbuttons/facebook.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-twitter {
            content: url('/assets/media/icons/socialbuttons/twitter.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-instagram {
            content: url('/assets/media/icons/socialbuttons/instagram.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-youtube {
            content: url('/assets/media/icons/socialbuttons/youtube.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-linkedin {
            content: url('/assets/media/icons/socialbuttons/linkedin.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-tiktok {
            content: url('/assets/media/icons/socialbuttons/tiktok.png');
            width: 20px;
            height: 20px;
            font-size: 1.1em;
            }
        .fa-users{
            content: url('/assets/media/icons/socialbuttons/event.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-newspaper{
            content: url('/assets/media/icons/socialbuttons/newspaper.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            }
        .fa-store{
            content: url('/assets/media/icons/socialbuttons/shop.png');
            width: 20px;
            height: 20px;
            font-size: 1.2em;
            } 

</style>


<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"> 
    <!-- begin:: Content -->
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="group-center">
                <div id="scroll_go" class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{url('/')}}/saved-campaigns"><button id="btn-secondary" class="btn btn-secondary btn-lg">
                    @if($user->avatar_location != '')
                        <img style="height:26px; width:26px; border-radius:13px; margin-right:5px; border:1px solid lightgray; object-fit:cover;" class="im_pro" src="{{asset('storage/'.$user->avatar_location)}}" alt="Attive">
                    @else
                        <img style="height:26px; width:26px; border-radius:13px; margin-right:5px; border:1px solid lightgray;" class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Attive">
                    @endif
                        Attive</button></a>
                    <a href="{{url('/')}}/social/nearby"><button id="btn-secondary" class="btn btn-secondary btn-lg"><img style="height:26px; width:26px; margin-right:5px;" class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/map_search.png" alt="GMaps"> Map</button></a>
                    @if($user->company == 1)
                        <a href="{{url('/')}}/offers"><button id="btn-secondary" class="btn btn-secondary btn-lg"><img style="height:26px; width:26px; margin-right:5px;" class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/handshake.png" alt="GMaps"> Offers</button></a>
                    @endif
                </div>
            </div>
            </br>
            </br>


    {{--
            <div style="display:flex; justify-content:flex-end;">
                <a href="{{url('/')}}/social/nearby"><img id="fixed_map_button" src="{{url('/')}}/assets/media/icons/socialbuttons/map_search.png" alt="GMaps"></a>
            </div>
    --}}
   

  @if(Auth::user()->role('influencer') && Route::current()->getName() != 'frontend.user.cercacampagne')
        @endif
        @if(count($campagne))
        <div id="camplist" class="box-list_campaigns">
            @if(Auth::user()->hasRole('influencer'))
                
                @foreach($campagne as $campagna)
                <div class="snapbox">
                    @include('frontend.campagne.boxcampagne_lista')
                </div>
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
            @endif
            @if(Auth::user()->hasRole('brand'))
                @foreach($campagne as $campagna)
                <div class="snapbox">
                    @include('frontend.campagne.boxcampagne_lista')
                </div>
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
            @endif
            {{ $campagne->links() }}
        @else
           
        @endif
      
         
        </div>
         </br>
                </br>
                </br>
        <!--End::Section-->
    </div>
    <!-- end:: Content -->
</div>



@push('after-scripts') 

@if(empty(Auth::user()->getAddress()))
<script type="text/javascript">
   
        autoFindLocation();
  
</script>
 @endif

<script>

window.onload = function () {
  window.scrollTo(1, 1);
}

</script>

<script>

 $(window).scroll(function() {

    if ($(this).scrollTop()>100)
     {
        $('#fixed_map_button').css({
                visibility: 'initial'
            });
     }
    else
     {
      $('#fixed_map_button').css({
                visibility: 'hidden'
            });
     }
 });
</script>
@endpush

@endsection
