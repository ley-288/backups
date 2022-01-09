@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Follow Requests'))

@section('content')

@push('after-styles')

<style>

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content: center;
}

.appr_btn{
    display:flex;
    flex-direction:row;
    justify-content:center;
}

#verified_img_sm_follow{
    height:15px;
    width:15px;
    margin-left:2px;
    margin-top:-2px;
}

.btn{
    padding:10px;
}

#newaccept{
    background-image: linear-gradient(#2dc731, #7bdf28);
}

#newdeny{
    background-image: linear-gradient(#e72b38, #e72b80);
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
        width:100vw;
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
        padding: 20px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
        width:90vw;
        margin:10px;
        border-radius:15px;
    }

   

    .btn{
        display:flex;
        justify-content: flex-start;
        color:black;
        //width:80vw;
       // margin-bottom:15px;
       margin:10px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
        color:white;
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
        width: 30vw;
        height: 30vh;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
    }

    .card-deck {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
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
            @lang('applicazione.follow_requests')
          
        </div>
        <div>
             <i style="visibility:hidden; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">group_add</i>
        </div>
    </div>
    </br>
    
    <div class="row_3">
        <div class="card-deck">
            </br>
            @foreach($list as $relation)
                <div class="card">
                    @if($relation->follower->avatar_location)
                        <a href="{{ url('/social/'.$relation->follower->username) }}">
                            <img src="{{asset('storage/'.$relation->follower->avatar_location)}}" style="max-height:50px; max-width:50px; border-radius:25px;"/>
                        </a>
                    @else
                        <a href="{{ url('/social/'.$relation->follower->username) }}">
                            <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="max-height:50px; max-width:50px; border-radius:25px;"/>
                        </a>
                    @endif  

                    </br>

                    <strong>
                    @if($relation->follower->company == 1) 
                        @if(!empty($relation->follower->dettagli->azienda_nome))
                            {{ $relation->follower->dettagli->azienda_nome }}
                        @else
                            {{$relation->follower->name}}
                        @endif 
                    @else
                        {{ $relation->follower->name }}
                    @endif
                     @if($relation->follower->verified == 1)
                        <img id="verified_img_sm_follow" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                    @elseif($relation->follower->gold == 1)
                        <img id="verified_img_sm_follow" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Recensioni">
                    @elseif($relation->follower->staff == 1)
                        <img id="verified_img_sm_follow" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Recensioni">
                    @endif
                    </strong>

                   
                  

                    {{ $relation->follower->username }}

                    {{--
                        <small>@lang('applicazione.private')</small>
                    --}}

                    </br>
                                 
                    <div class="appr_btn" id="approve-buttons-{{ $relation->id }}">
                        <div class="text-success approved" style="display: none"><i class="fa fa-check"></i>@lang('applicazione.successfully_approved')</div>
                        <div class="text-danger denied" style="display: none"><i class="fa fa-times"></i>@lang('applicazione.denied')</div>
                        <a id="newaccept" style="border-radius:5px;" href="javascript:;" class="btn btn-success approve-button btn-sm" onclick="followRequest(1, {{ $relation->id }})"><i  class="material-icons nav__icon">check_circle</i> Accept</a>
                        <a id="newdeny" style="border-radius:5px;" href="javascript:;" class="btn btn-danger approve-button btn-sm" onclick="followRequest(2, {{ $relation->id }})"><i  class="material-icons nav__icon">cancel</i> Deny</a>
                    </div>
                                        
                                        
                            </div>
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
