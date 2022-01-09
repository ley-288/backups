@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Coins'))

@section('content')

@push('after-styles')

<style>

.coin_card{
    border-radius:15px;
    border:2px solid #F7F5F8;
    padding:20px;
    height:150px;
    width:120px;
    display:flex;
    justify-content:center;
    flex-direction:column;
    align-items: center;
}

#coin_shadow{
        //border: 5px solid #cdab018c;
        //border: 5px solid transparent;
        //border-radius: 100%;
        animation: shadowThrob 1.5s infinite;
        animation-direction: normal;
        -webkit-animation: shadowThrob 1.5s ease-out infinite;
        -webkit-animation-direction: normal;
        display:flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        //text-align: center;
        //font-size: 10px;
}

@keyframes shadowThrob {
	    //from {box-shadow: 0 0 0 8px rgba(0,0,0, 1);}
	    //to {box-shadow: 0 0 0 1px rgba(1,1,1, 0.1);}
         from {   box-shadow: 0 0 0 6px rgb(172 172 172 / 48%);}
         to {   box-shadow: 0 0 20px 10px rgb(1 1 1 / 0%);}
    }
    @-webkit-keyframes shadowThrob {
	    //from {box-shadow: 0 0 0 0px rgba(0,0,0, 1);}
	    //to {box-shadow: 0 0 0 8px rgba(1,1,1, 0.1);}
          from {   box-shadow: 0 0 0 6px rgb(172 172 172 / 48%);}
         to {   box-shadow: 0 0 20px 10px rgb(1 1 1 / 0%);}
    }

.btn-secondary{
    border-radius:5px;
    border:2px solid #F7F5F8;
    color:black;
    padding-left:10px;
    padding-right:10px;
}

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
        //align-items: center;
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


@endpush

<div>
    <div class="row_1">
        <div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{ URL::previous() }}">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            Coins
          
        </div>
        <div>
            <i style="visibility:hidden; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">monetization_on</i>
        </div>
    </div>
   
    </br>
    </br>
    </br>
    </br>
    
    <div class="new_row">
          <img id="coin_shadow" style="width:140px;border-radius:70px;" src="{{url('/')}}/assets/media/icons/socialbuttons/new_gold_coin.png" >

       {{--<i id="coin_shadow"  style="background-image: linear-gradient(#ffc905,#ffd84b8c, #9d7f03);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:150px;" class="material-icons nav__icon">monetization_on</i>--}}
       
        </br>
        <p style="font-size:20px; text-align:center; color:black;" class="card-text"><span><span>@lang('Coins'): </span><strong>{{round($budget2, 2)}}</strong></span></p>
        <p style="font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text" ></p>
    </div>

    </br>
    </br>
    </br>
    </br>

{{--
<div style="display:flex; justify-content:center;">
    <div id="coin_scroll" style="display: flex;width: 100vw;flex-direction: row;flex-wrap: nowrap;justify-content: space-evenly;align-items: center;">

        <div class="coin_card">
            
            <img id="coin_shadow" style="width:40px;" src="{{url('/')}}/assets/media/icons/socialbuttons/new_bronze_coin.png" >
            </br>
            <p style="font-size:20px; text-align:center; color:black;" class="card-text">10</p>
            
                                <form action="{{route('frontend.user.coins.compra')}}" method="post">
                                    <button type="submit" class="btn-secondary">Aquista</button>
                                    @csrf
                                    <input type="hidden" value="40" name="coins">
                                </form>
           
        </div>
        <div class="coin_card">
                       <img id="coin_shadow" style="width:40px;" src="{{url('/')}}/assets/media/icons/socialbuttons/new_silver_coin.png" >
       
            </br>
            <p style="font-size:20px; text-align:center; color:black;" class="card-text">20</p>

                <form action="{{route('frontend.user.coins.compra')}}" method="post">
                                    <button type="submit" class="btn-secondary">Aquista</button>
                                    @csrf
                                    <input type="hidden" value="70" name="coins">
                                </form>
         
        </div>
        <div class="coin_card">
                        <img id="coin_shadow" style="width:40px;" src="{{url('/')}}/assets/media/icons/socialbuttons/new_gold_coin.png" >
       
            </br>
            <p style="font-size:20px; text-align:center; color:black;" class="card-text">30</p>
           
                <form action="{{route('frontend.user.coins.compra')}}" method="post">
                                    <button type="submit" class="btn-secondary">Aquista</button>
                                    @csrf
                                    <input type="hidden" value="90" name="coins">
                                </form>
          
        </div>

    </div>
</div> 
--}}
   
</div>
</br>
</br>
</br>
</br>


@endsection
