@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Messages'))

@section('content')

@push('after-styles')

<style>

.modal-header{
  border-bottom:none;
}

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content: center;
}

#verified_img_sm_mess_list{
            position:absolute; 
            height:12px; 
            width:12px; 
            margin-top:2px; 
            margin-left:2px;
            }

#userListModal .user_list a {
    border-bottom: none;
}

 @media screen and (max-width: 1024px) {

    body.modal-open {
        overflow: hidden !important;
        margin-top:17% !important;
    }

   #desktop_layout{
     margin-top:0px;
   }

     #mobile_header_style{
        display:none;
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
        max-height:70px;
        max-width:70px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        //position:absolute;
    }

    .card h5{
        text-align:right;
    }

    .card-text:last-child{
        text-align:right;
    }

    #color_white{
        color:white;
    }

    .row_1{
      /*
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: -60px;
        box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:10px;
      */

          display: flex;
    flex-direction: row;
    justify-content: space-around;
    flex-wrap: nowrap;
    align-items: center;
    margin-top: -60px;
    //box-shadow: 0 4px 2px -2px #f7f5f8;
    padding: 10px;
    width: 150vw;
    }

    .row_2{
        margin-top: -50px;
        display: flex;
        justify-content: center;
    }

    .row_3{
        display: flex;
        justify-content: center;
        margin-top: 0px;
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

    #card_back{
      display: flex;
    //background-image: linear-gradient( #44B1FF, #2be0e7);
    background-color:#F7F5F8;
    height: 100px;
    width: 120vw;
    align-content: center;
    align-items: center;
    justify-content: space-around;
    //color:white;
    }

    .card-deck .card {
      /*
        display: flex;
    margin: 10px;
    flex-wrap: nowrap;
    justify-content: flex-start;
    text-align: center;
    padding: 20px;
    border: none;
    box-shadow:  0 4px 2px -2px #F7F5F8;
    align-items: center;
    flex-direction: row;
        width:90vw;
    */

        display: flex;
    margin: 10px;
    text-align: center;
    padding: 20px;
    border: none;
    border-radius: 0px;
    box-shadow: 0 4px 2px -2px #f7f5f8;
    flex-direction: row;
    width: 100vw;
    height: 100px;
    align-items: center;
    align-content: space-between;
    }

   

    .btn{
        display:flex;
        justify-content: flex-start;
        color:black;
        width:80vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }
}

@media screen and (min-width: 1024px) {

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
        width:50vw;
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
        margin-top:-25px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        margin-left:20px;
        position:absolute;
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
        margin-top: 50px;
    }

    .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    .card-deck .card {
        display: flex;
    margin: 10px;
    flex-wrap: nowrap;
    justify-content: flex-start;
    text-align: center;
    padding: 20px;
    border: none;
    box-shadow: 2px 2px 10px 10px #f7f5f8;
    align-items: center;
    flex-direction: row;
    }

    .card-deck {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: center;
        margin-top:10px;
    }

    .btn-block{
        display:flex;
        justify-content: flex-start;
        margin-left:15vw;
        color:black;
        width:30vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }

}

</style>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

@endpush

<div>
    <div class="row_1">
        <div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{ URL::previous() }}">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            Messaggi
          
        </div>
        <div data-toggle="modal" data-target="#userListModal">
            <i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">add_circle_outline</i>
        </div>
    </div>
    @if(!$user_list)
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
        </br>
        <p style="font-size:20px; text-align:center; color:black;" class="card-text">Tuoi Messaggi</p>
        <p style="font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text" data-toggle="modal" data-target="#userListModal"">Message your contacts</p>
    </div>
    @endif
    
    <div class="row_3">
        <div class="card-deck">
            </br>
            
            @foreach($user_list as $friend)
            
           {{-- <div id="card_back" style="z-index:1;"> 

                <div style="position:absolute;">
                    <div style="display:flex; justify-content: space-evenly;align-items: center;flex-wrap: nowrap;height: 100px;width: 100vw;">
                    <a href="{{ url('/direct-messages/show/'. $friend['user']->id) }}" style="display: flex;flex-direction: column;align-items: center; color: black;">
                            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">maps_ugc</i>Apri
                        </a>
                        <a href="{{ url('/social/'. $friend['user']->username) }}" style="display: flex;flex-direction: column;align-items: center; color: black;">
                            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">account_circle</i>Profilo
                        </a>
                        <a href="#" data-toggle="modal" data-target="#reportModal-{{$friend['user']->id}}" style="display: flex;flex-direction: column;align-items: center;    color: black;">
                            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">report</i>Segnala
                        </a>
                        
                    </div>
                </div> --}}

                <div class="card ui-widget-content" id="drag_button_message" style="z-index:2;">
                    <a href="{{ url('/social/'. $friend['user']->username) }}"><img class="card-img-top" src="{{asset('storage/'.$friend['user']->avatar_location)}}" alt="Card image cap"></a>
                    <div class="card-body">

                    <a href="{{ url('/direct-messages/show/'. $friend['user']->id) }}" class="friend">
                        <h5 class="card-title"><strong style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                        @if($friend['user']->company == 1)
                            {{ $friend['user']->dettagli->azienda_nome }}
                        @else
                            {{ $friend['user']->name }}
                        @endif
                    </a>

                        </strong> </br> {{ str_limit($friend['message']->message, 30) }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $friend['message']->created_at->diffForHumans() }}</small></p>
                    </div>
                </div>
             
            {{--</div>--}}
            
            @endforeach
          
        </div> 
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
</br>
</br>
</br>

<div class="modal fade " id="userListModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div style="border-radius:25px;" class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="no_show_new_message" class="modal-title">Messaggio Nuovo</h5>
                            </div>

                            <div class="user_list">
                                
                                    <div class="form-group">
                                        <input style="border-radius:5px;border: 2px solid #F7F5F8; box-shadow: none;" type="text" class="form-control" id="modal-search"  onkeyup="searchUserList()" placeholder="@lang('applicazione.cerca_contatti')">
                                    </div>
                                    <table id="modal-table">
                                    
                                        @foreach($user_list_chats->get() as $f)
                                            <tr>
                                                <td>
                                                    <a href="{{ url('/direct-messages/show/'. $f->follower->id) }}" style="color:black;font-weight:bold;">
                                                        <div class="image" >
                                                            @if($f->follower->avatar_location)
                                                            
                                                            <img src="{{asset('storage/'.$f->follower->avatar_location)}}" class="img-circle" style="height:50px; width:50px; object-fit:cover;" />
                                                            
                                                            @else
                                                            
                                                            <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" class="img-circle" style="height:50px;"/>
                                                            
                                                            @endif
                                                        </div>
                                                        <div class="detail" style="margin-top:20px;">

                                                        
                                                        @if($f->follower->hasRole('influencer'))

                 
                                                        
                                                            @if($f->follower->verified == 1)
                                                                {{ $f->follower->name }}<img id="verified_img_sm_mess_list" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                                                            @else
                                                                {{ $f->follower->name }}</h3>
                                                            @endif  
                                                    @endrole
                                                    @if($f->follower->hasRole('brand'))
                                                        
                                                        @if(! empty($f->follower->dettagli->azienda_nome))
                                                            @if($f->follower->verified == 1)
                                                                {{ $f->follower->dettagli->azienda_nome }}<img id="verified_img_sm_mess_list" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                                                            @else
                                                                {{ $f->follower->dettagli->azienda_nome }}
                                                            @endif
                                                        @else
                                                            {{ $f->follower->name }}
                                                        @endif
                                                    @endrole

                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                               
                            </div>
                        </div>
                    </div>
                </div>


 @foreach($user_list as $friend)
<div class="modal fade" id="reportModal-{{ $friend['user']->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title" id="exampleModalLabel">Segnala</h5>
      </div>
      <div class="modal-body">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            Sei sicuro?
        </div>
        </br>
            <form action="{{ url('user/report') }}" method="post" style="display: flex; justify-content: center; flex-direction: column;">
                @csrf
                <input type="hidden" id="reported_id" name="reported_id" value="{{$friend['user']->id}}">
                <textarea id="reason" name="reason" placeholder="Motivo?.." style="padding: 10px;border: 2px solid #F7F5F8;"></textarea>
                </br>
                <button type="submit" class="btn btn-secondary" style="color:#e72b38; display: flex;justify-content: center; font-weight:bold; border:2px solid  #F7F5F8;"><i style="color:#e72b38;" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button>
                </br>
            </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
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
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/jquery.ui.mouse.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

<script>
window.onload = function () {
  window.scrollTo(1, 1);
}
</script>


<script>

/*  
$( function() { 
    $( "#drag_button_message" ).each(function() {
        var x1=-150;
        var x2=$(window).width()-x1;
        
        var dragOpts = {
            handle: '.card'
        }
        $( this ).draggable({ axis: "x" , containment: [x1, x2], dragOpts });
    });
});
*/



/*
$( function() {
    
        var x1=-100;
        //var x2=$(window).width()-x1;
        var x2=$(window).width()-x1;
        
        var dragOpts = {
            handle: '.card'
        }

        $( "#drag_button_message" ).draggable({ axis: "x" , containment: [x1, x2], dragOpts });
            //window.scrollTo(1, 1);
        
});
*/


</script>

@endpush

@endsection
