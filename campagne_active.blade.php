@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('applicazione.campagne'))

@section('content')
@push('after-styles')

<style>
#mobile_header_style{
        display:none;
    }
</style>

@endpush

@push('after-scripts')

@endpush

<style> 

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content:center;
}


        body{
            background:white;
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

@media screen and (min-width: 700px){

    #camp_margin{
        margin-top:30px;
        justify-content:center;
    }

      .new_row{
         margin-left: 0px;
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    margin-top:50px;
    }
    
    .btn-group{
        position:absolute;
        display:flex;
        justify-content:center;
        padding:15px;
        margin-top:-50px;
    }

    #btn-secondary{
        border-radius:5px;
        border:2px solid #F7F5F8 !important;
        margin-right:1px;
        color:black;
        box-shadow:none;
    }
}

@media screen and (max-width: 700px){

    .kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    position:absolute;
}

    #mobile_header_style{
        display:none;
    }

    body{
        //background-image: linear-gradient(to bottom, white 0%, #F7F5F8 100%);
    }

     

      .new_row{
         margin-left: 0px;
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    #mobile_search_function{
        display:none;
    }

    #camp_margin{
        display:flex;
        margin-top:-90px;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    } 

    .btn-group{
        display:flex;
        justify-content:center;
        padding:15px;
    }
    
    #btn-secondary{
        font-size:12px;
        border-radius:5px;
        border:2px solid #F7F5F8 !important;
        margin-right:1px;
        color:black;
        box-shadow:none;
        width:80px;
        padding:5px;
    } 


}

</style>




<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    {{--<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    </div>--}}
    <!-- begin:: Content -->
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        @if(Auth::user()->role('influencer') && Route::current()->getName() != 'frontend.user.cercacampagne')    
        @endif    
        @if(count($campagne))
            @if(Auth::user()->hasRole('influencer'))
            <div id="camp_margin" class="row">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{url('/')}}/campagne/active"><button id="btn-secondary" class="btn btn-secondary">@lang('Aperte')</button></a>
                    <a href="{{url('/')}}/saved-campaigns"><button id="btn-secondary" class="btn btn-secondary">@lang('Salvate')</button></a>
                    <a href="{{url('/')}}/campagne/closed"><button id="btn-secondary" class="btn btn-secondary">@lang('Concluse')</button></a>
                    
                </div>     
                @foreach($campagne as $campagna)
                {{--@if($campagna->closed_in_list_influencer == 0)--}}
                    @if($campagna->user_id == Auth::user()->id)
                        @include('frontend.campagne.boxcampagne_lista')        
                    @endif
                {{--@endif--}}
                @endforeach
                </br>
                </br>
        
                <div class="new_row">
        
                @if($user->avatar_location != '')
                <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
                @else
                <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                @endif
                </br>
                <p style="font-size:20px; text-align:center; color:black;" class="card-text">Benvenuto in Campagne</p>
                <p style="font-size:12px; text-align:center;color: #5979FB;" class="card-text">Vedi qui le tue campagne </p>
                </div> 
                </br>
                </br>
            </div>
            @endif
            @if(Auth::user()->hasRole('brand'))
                <div id="camp_margin" class="row">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('/')}}/campagne/active"><button id="btn-secondary" class="btn btn-secondary">@lang('Aperte')</button></a>
                        <a href="{{url('/')}}/saved-campaigns"><button id="btn-secondary" class="btn btn-secondary">@lang('Salvate')</button></a>
                        <a href="{{url('/')}}/campagne/closed"><button id="btn-secondary" class="btn btn-secondary">@lang('Concluse')</button></a>
                        {{--@if($user->company != 1)
                            <a href="{{url('/')}}/richieste"><button id="btn-secondary" class="btn btn-secondary">@lang('Ricevuto')</button></a>
                        @endif--}}
                    </div>
                    @foreach($campagne as $campagna)
                        @if($campagna->user_id == Auth::user()->id && $campagna->closed_in_list_brand == 0)
                            @include('frontend.campagne.boxcampagne_lista')              
                        @endif
                    @endforeach
                    </br>
                </br>
                    <div class="new_row">
                    @if($user->avatar_location != '')
                    <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
                    @else
                    <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                    @endif
                    </br>
                    <p style="font-size:20px; text-align:center; color:black;" class="card-text">Benvenuto in Campagne</p>
                    <p style="font-size:12px; text-align:center;color: #5979FB;" class="card-text">Qui vedi i tuoi campagne </p>
                    </div> 
                    </br>
                    </br>
                </div> 
                @endif
                    {{ $campagne->links() }}
                @else

                 <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('/')}}/campagne/active"><button id="btn-secondary" class="btn btn-secondary">@lang('Aperte')</button></a>
                        <a href="{{url('/')}}/saved-campaigns"><button id="btn-secondary" class="btn btn-secondary">@lang('Salvate')</button></a>
                        <a href="{{url('/')}}/campagne/closed"><button id="btn-secondary" class="btn btn-secondary">@lang('Concluse')</button></a>
                        {{--@if($user->company != 1)
                            <a href="{{url('/')}}/richieste"><button id="btn-secondary" class="btn btn-secondary">@lang('Ricevuto')</button></a>
                        @endif--}}
                    </div>
        
                </br>
                </br>
                <div class="new_row">
                @if($user->avatar_location != '')
                <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
                @else
                <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                @endif
                </br>
                <p style="font-size:20px; text-align:center; color:black;" class="card-text">Benvenuto in Campagne</p>
                <p style="font-size:12px; text-align:center;color: #5979FB;" class="card-text">Vedi qua i tuoi campagne aperte</p>
                </div>
                </br>
                </br>

            @endif

        
        <!--End::Section-->

    </div>
</div>

</br></br>
    <!-- end:: Content -->


    @endsection
