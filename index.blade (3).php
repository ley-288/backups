@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Notifications'))

@section('content')

@push('after-styles')

<style>

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

.btn-secondary{
    background-color:white;
    border:2px solid #F7F5F8;
    border-radius:5px;
    width:100px !important;
    box-shadow:none !important;
    margin-right:5px;
    //background-image: linear-gradient(#e72b38, #e72b80);
    color: black;
}

 @media screen and (max-width: 1024px) {

     #notification_list_icon{
        position: absolute;
        background-image: linear-gradient(#2b54e7f2, #2be0e7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        //background-color: white;
        //border-radius: 100%;
        //border:1px solid white;
        font-size: 30px;
        margin-top: 40px;
        //margin-right: 215px;
        margin-left:-15px;
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
        margin-top:-45px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        //height:70px;
        width:70px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
    }

    .card h5{
        text-align:right;
    }

    #color_white{
        color:white;
    }

    .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        //align-items: center;
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
    margin: 10px;
    flex-wrap: wrap;
    justify-content: flex-end;
    text-align: center;
    padding: 30px;
    border: none;
    box-shadow: 0 4px 2px -2px #f7f5f8;
    align-items: center;
    flex-direction: row;
    width: 95vw;
    align-content: flex-end;
    }

     .card-deck_2 .card {
            display: flex;
    margin: 10px;
    flex-wrap: wrap;
    justify-content: flex-start;
    text-align: center;
    padding: 20px;
    border: none;
    box-shadow: 0 4px 2px -2px #f7f5f8;
    align-items: center;
    flex-direction: column;
    width: 90vw;
    align-content: center;
    }

    

    .btn-group{
    position:relative;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin-right:-10px;
    margin-top:-45px;
}

}

@media screen and (min-width: 1024px) {


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
        box-shadow: 2px 2px 10px 10px #F7F5F8;
    }

    .card h5{
        text-align:right;
    }

    #color_white{
        color:white;
    }

   .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: -60px;
        box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:20px;
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

    .card-deck{
        display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    flex-wrap: wrap;
    justify-content: flex-start;
    align-items: center;
    }

    .card-deck .card {
       display: flex;
    margin: 10px;
    flex-wrap: nowrap;
    justify-content: center;
    text-align: center;
    padding: 20px;
    border: none;
    box-shadow: 0 4px 2px -2px #f7f5f8;
    align-items: center;
    flex-direction: column;
    width: 90vw;
    align-content: center;
    }

     .card-deck_2 .card {
            display: flex;
    margin: 10px;
    flex-wrap: wrap;
    justify-content: flex-start;
    text-align: center;
    padding: 20px;
    border: none;
    box-shadow: 0 4px 2px -2px #f7f5f8;
    align-items: center;
    flex-direction: column;
    width: 90vw;
    align-content: center;
    }

    .btn-group{
    position:relative;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    margin-right:-10px;
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
            Notifications
          
        </div>
        <div>
            <i style="visibility:hidden; color:#e72b38; font-size:30px;" class="material-icons nav__icon">notifications</i>
        </div>
    </div>
    
    @if(count(sHelper::notifications()) < 0)
    </br>
    </br>
    </br>
    </br>
    <div class="new_row">
        @if($user->avatar_location != '')
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
        @else
         <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;"  src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
         @endif
        </br>
        <p style="font-size:20px; text-align:center; color:black;" class="card-text"></p>
        <p style="font-size:12px; text-align:center;color: black;" class="card-text"  type="button" data-toggle="modal" data-target="#userListModal"">i tuoi notifications</p>
    </div>
    @endif
    <div class="row_3">
         <div class="card-deck">
            </br>
            @if(count(SHelper::notifications()) > 0)
                {{--<h4>Storia</h4>--}}
                @foreach(SHelper::notifications() as $notification)
            
                
                <div class="card" style="border-radius: 15px; background-color:aliceblue">
                <div id="pic_icon_combo">
                @if(!empty($notification['img']))
                    <img class="card-img-top" src="{{ $notification['img'] }}" alt="User">
                @else
                      <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="User">
                @endif

                <i id="notification_list_icon" class="material-icons nav__icon">{{ $notification['icon'] }}</i>
                </div>
                    <div class="card-body">
                        <h5 class="card-title"><strong style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{{ str_limit($notification['text'], 25) }}</strong></h5>
                    </div>
                    </br>
                    <div class="btn-group">
                        
                        <a style="visibility:hidden;" href="{{ $notification['url'] }}" class="btn btn-secondary">Vedi</a>
                       <a href="{{ $notification['url'] }}" class="btn btn-secondary">Vedi</a>
                        
                    </div>
                </div>
                
                @endforeach
            @endif
        </div> 
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        </br>
        
    </div>
    <div class="row_3">
        <div class="card-deck">
            </br>
            @if(count(PastHelper::notifications()) > 0)
                {{--<h4>Storia</h4>--}}
                @foreach(PastHelper::notifications() as $notification)
            
                
                <div class="card">
                <div id="pic_icon_combo">
                @if(!empty($notification['img']))
                    <img class="card-img-top" src="{{ $notification['img'] }}" alt="User">
                @else
                      <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="User">
                @endif

                
                <i id="notification_list_icon" class="material-icons nav__icon">{{ $notification['icon'] }}</i>
                </div>
                    <div class="card-body">
                        <h5 class="card-title"><strong style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">{{ str_limit($notification['text'], 25) }}</strong></h5>
                    </div>
                    </br>
                    <div class="btn-group">
                        
                        <a href="{{ $notification['url'] }}" class="btn btn-secondary">Vedi</a>
                        <a href="{{ $notification['photo_url'] }}" class="btn btn-secondary">Profilo</a>
                        
                    </div>
                </div>
                
                @endforeach
            @endif
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

<script>

</script>

@endsection
