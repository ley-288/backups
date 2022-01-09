@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Aziende'))

@section('content')

@push('after-styles')

<style>

.alert.alert-success{
    background-image: linear-gradient(#e72b38, #e72b80);
    border:none;
}

ul{
    list-style-type: none;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 80vw;
    padding: 0;
}

li {
    background-color:transparent;
}

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content: center;
}

    #info_card{
        color:black !important;
    }

    .button_div{
        display:flex;
    }

 @media screen and (max-width: 1024px) {

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
        border-radius: 15px;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
        width:93vw;
        margin:10px;
    }

   

    .btn{
        display:flex;
        justify-content: flex-start;
        color:white;
        //width:80vw;
        margin-bottom:15px;
        margin-right:5px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: none;
        font-size:12px;
        background-image: linear-gradient(#e72b38, #e72b80);
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
        box-shadow: 2px 2px 10px 10px #F7F5F8;
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
        border-radius: 15px;
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
        color:white;
        //width:80vw;
        margin-bottom:15px;
        margin-right:5px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: none;
        font-size:12px;
        background-image: linear-gradient(#e72b38, #e72b80);
    }

}

</style>
@endpush

<div>
    <div class="row_1">
         <div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{url('/')}}/newpost">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            Aziende
          
        </div>
        <div>
        
            <i style="visibility:hidden; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">work</i>
 
        </div>
    </div>
    </br>

  <div class="new_row">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
  </div>


<div style="color:white; display:flex; justify-content:center; padding:5px; margin:10px; text-align:center; background-image:linear-gradient(to right, #44B1FF, #2be0e7); border-radius:15px;">
  <h4>
    Invita le aziende a vedere il tuo video
  </h4>
</div>


    <div class="row_3">

        <div class="card-deck">
            </br>
            @foreach($aziende as $azienda)
<div style="position:absolute; color:black;">
        {{$azienda->id}}
</div>        
                @if($azienda->user->company == 1 && $azienda->user->complete == 1 && $azienda->user->active == 1)
                
                <div class="card">
                 
                    @if($azienda->user->avatar_location != '')
                    <img class="card-img-top" src="{{asset('storage/'.$azienda->user->avatar_location)}}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                    @endif
            
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{$azienda->user->username}} </strong></h5>
                        </br>

                       
                        @if($azienda->user->address_visible != 1)
                            <h5 class="card-title">{{$azienda->user->getAddress()}} </br>   
                        @endif
                          

                            <i style="background-image: linear-gradient(#2b54e7f2, #2be0e7);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:10px;" class="material-icons nav__icon">place</i> {{ Auth::user()->distance($azienda->user) }}</h5>
                        </br>
                        {{ $azienda->user->bio}}
                        </br>
                    </div>
                    </br>
                    <div class="button_div">
                    
                    <a href="{{ url('/social/'.$azienda->user->username) }}">
                    <button class="btn btn-secondary">Profilo</button>
                    </a>
                  
                  
                    <form action="{{ url('10secondi/send') }}" method="post">
                    @csrf
                        <input type="hidden" id="story_id" name="story_id" value="{{$my_story}}">
                        <input type="hidden" id="azienda_id" name="azienda_id" value="{{ $azienda->user->id }}">
                        <button class="btn btn-secondary">Invia</button>
                    </form>

                    </div>
                     </br>
                </div>
                 </br>
        </br>
        </br>
        </br>
                @endif
          
            @endforeach
             </br>
        </br>
        </br>
        </br>
        </div> 
    
        </br>
        </br>
        </br>
        </br>
    </div>
     </br>
        </br>
        </br>
        </br>
    </div>
 </br>
        </br>
        </br>
        </br>
</div>
</br>
</br>
</br>
</br>







@endsection