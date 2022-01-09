@extends('frontend.layouts.social')

@section('title', app_name() . ' | Offers' )

@section('content')

<style>

#desktop_layout{
    max-width:800px;
}

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile) {
    display: flex;
    flex-direction: column;
}

#mobile_search_function{
    display:none;
}

#kt_desktop{
    //width:800px !important; 
    margin-top:-20px;
}

#kt_body {
    margin-top:-100px;
}

body{
    background-color:white;
}

h2{
    padding:10px;
}

.card-body{
    padding:10px;
}

.card-img-top{
    height:100px;
    width:100px;
}

.card-img{
    height:40px;
    width:40px;
    border-radius:20px;
    margin-right:10px;
    box-shadow: 2px 2px 10px 10px #F7F5F8;
}

.card-img_title{
    height:40px;
    width:40px;
    border-radius:0px;
    margin-right:10px;
    box-shadow: 2px 2px 10px 10px #F7F5F8;
}

.btn-group{
    display:flex;
    justify-content:center;
    padding:15px;
}

.btn-secondary{
    border-radius:5px;
    border:2px solid #F7F5F8;
    margin-right:1px;
    color:black;
}

</style>

<div>

    <h2>Single Offer</h2>
    <div class="card-deck">
       

        <form action="{{ url('/offer/accept')  }}" method="POST">
                        
            @csrf
            <input name="buyer_id" value="{{ $offer->buyer_id }}">
            <input name="offer_id" value="{{ $offer->id }}">
            <button type="submit" class="btn btn-secondary">Accept</button>

        </form>
    </div>    

</div>

@endsection