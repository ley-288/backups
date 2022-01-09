@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Social'))

{{--@section('title', app_name() . ' | ' . __('navs.general.home'))--}}

@section('content')

<style>

.radial_border {
      border-radius: 50px;
    border: 4px solid transparent;
    background: linear-gradient(
        45deg,red, #e72b38,  #e72b80, #e72b80) border-box;
    -webkit-mask: /*4*/ linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
    /* -webkit-mask-composite: destination-out; */
    mask-composite: exclude;
    z-index: 0;
}


.list-group{
    box-shadow:none;
}

@media screen and (max-width: 1024px){

    #desktop_layout{
        margin-top:-40px;
    }

    body.modal-open {
        overflow: hidden !important;
        margin-top:6% !important;
    }

    .modal{
        margin-top:10px;
    }

     #mobile_header_style{
        margin-top:30px;
        box-shadow:none;
    }
   
    body{
        //background-image: url(/assets/media/icons/angryimg-2.png);
        //background-repeat: repeat-x;
    }

    #sidebar_id_phone{
        position:absolute; margin-left:50px;
    }

    #wall_id_phone{
        margin-top:-50px;
    }

    #fetch-new-button{
         visibility:hidden; 
         position:fixed; 
         margin-top:60vh; 
         width: 100vw;
         display: flex;
         justify-content: center;
         align-items: flex-end; 
         z-index: 214;
    }

}

@media screen and (min-width: 1024px){

    body{
        background-color:white;
    }

    .post-list{
        margin-top: -10px;
    }

    #wall_id_phone{
        margin-top:-200px;

        //max-width: 600px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        border-radius:5px;
    }

    #fetch-new-button{
         visibility:hidden; 
         position:fixed; 
         margin-top:60vh; 
         //width: 100vw;
         margin-left:300px;
         display: flex;
         justify-content: center;
         align-items: flex-end; 
         z-index: 214;
    }
    

}

</style>

</br></br></br></br>


        <div id="fetch-new-button" style="">
            <div id="fetch_button" style="background-color: white;border-radius: 55px;padding: 10px; box-shadow: 2px 2px 10px 10px lightgray; display: flex;justify-content: space-evenly;align-items: center;">
                {{--@if($user->avatar_location != '')
                    <img class="radial_border" style="height:40px;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">  ↻ Posts Nuovi
                @else
                    <img class="radial_border" style="height:40px;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png?v=2" alt="Immagine profilo"> ↻ torno
                @endif--}}
                <i style="font-size:30px;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons">arrow_circle_up</i> 
            </div>
        </div>


<div class="feed_layout" style="margin-top:-20px;">
    <div id="wall_in_computer" class="row">
        <div id="wall_id_phone" class="widget_wall">
            @include('widgets.wall')
        </div>
        
    </div>
    
</div>

          

@endsection



@push('after-scripts')

   <script type="text/javascript">

        WALL_ACTIVE = true;
        $('document').ready(function(){
             fetchPost(0,0,0,10,-1,-1,'initialize');
        });

    </script> 

    <script>

        $("#fetch_button").click(function() {
            $("html").animate({ scrollTop: 0 }, "slow");
            fetchForNewPosts();
        });


    </script>

    <script>

 $(window).scroll(function() {

    if ($(this).scrollTop()>500)
     {
        $('#fetch-new-button').css({
                visibility: 'initial'
            });
     }
    else
     {
      $('#fetch-new-button').css({
                visibility: 'hidden'
            });
     }
 });

</script>

@endpush

