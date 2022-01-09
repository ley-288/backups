@extends('frontend.layouts.interna')

@section('title', app_name() . ' | ' . __('applicazione.campagne') . ' | ' . 'Saved')

@section('content')

@push('after-styles')


<style> 

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content:center;
}

.btn-default{
    color:black!important;
    background-color:white!important;
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
      .card{
        margin:10px;
        padding-top:20px;
        padding-bottom:20px;
        padding-left:10px;
        padding-right:10px;
        border-radius:10px;
        width: 50vw;
    }

    #new_display_card_image{
        border-radius:10px;
    }
}

@media screen and (max-width: 700px){

    .kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    position:absolute;
}

    body{
        //background-image: linear-gradient(to bottom, white 0%, #F7F5F8 100%);
    }

     #mobile_header_style{
        display:none;
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

     .card{
        margin:10px;
        padding-top:20px;
        padding-bottom:20px;
        padding-left:10px;
        padding-right:10px;
        border-radius:10px;
        width: 90vw;
    }

    #new_display_card_image{
        border-radius:10px;
    }

      .btn-danger{
        margin:2px;
    }

}
</style>

@endpush



<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <!-- begin:: Content -->
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div id="camp_margin" class="row">
            <div class="btn-group" role="group" aria-label="Basic example">
                @if($user->company == 1)<a href="{{url('/')}}/campagne/open"><div id="btn-secondary" class="btn btn-secondary" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">@lang('Aperte')</div></a>
                    
                    <a href="{{url('/')}}/campagne/closed"><div id="btn-secondary" class="btn btn-secondary">@lang('Concluse')</div></a>
                    <a href="{{url('/')}}/10secondi/list"><div id="btn-secondary" class="btn btn-secondary">@lang('Salvate')</div></a>@endif

                    @if($user->company != 1)<a href="{{url('/')}}/saved-campaigns"><div id="btn-secondary" class="btn btn-secondary" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">@lang('Salvate')</div></a>@endif
                   
            </div>
            @if($campagne->isNotEmpty())
            <div>
            @foreach($campagne as $campagna)

             <div class="card">

                <div class="card-body" style="color:black; border-radius:10px;">

                <img style="border-radius:5px; margin-bottom:5px;" src="{{asset('storage/posts/'.$campagna->display_image)}}">

                    <h5 class="card-title">
                            <strong>{{ $campagna->titolo }}</strong>
                        </h5>
                    
                    </br>
                      @if(!empty($campagna->durata) && !empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
            
                <strong>@lang('applicazione.budget'):
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                    - 
                @lang('applicazione.durata'):
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}           
                </strong> 
                </div> 
            </a>
            @endif
            @if(empty($campagna->durata) && !empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.budget'):</strong>
                {{$campagna->budget}} €  {{__('applicazione.budget_'.$campagna->budget_periodo)}}
                </div> 
            </a>
            @endif
            
            @if(!empty($campagna->durata) && empty($campagna->budget))
             <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}" style="color:white;">
             <div style="display: flex; justify-content: center;background-image: linear-gradient(#e72b38, #e72b80);padding: 10px;color: white;border-radius: 5px;font-size: 14px;font-weight: bolder;">
                <strong>@lang('applicazione.durata'):</strong>
                {{$campagna->durata}}  {{__('applicazione.durata_'.$campagna->durata_periodo)}}
             </div> 
            </a>
            @endif 
                    </br>
                    </br>
                    <div style="display:flex; justify-content: space-evenly;">
                    <a href="javascript:;" onclick="saveCampagna({{ $campagna->id }})" class="save-text">
                        @if($campagna->checkSave($user->id))
                            <i id="fa-heart" style="color:black;" class="material-icons nav__icon" id="bookmark">bookmark</i>
                        @else 
                            <i id="fa-heart-o" style="color:black;" class="material-icons nav__icon" id="bookmark-o">bookmark_border</i>
                        @endif
                        </a>
                        </br>
                        </br>
                        
                            <a href="{{route('frontend.user.campagna.dettaglio',['uuid' => $campagna->uuid])}}"><i style="color:black;" class="material-icons nav__icon" id="bookmark">launch</i></a>
                        </div>
                </div>
                
                
                
            </div>
             
                </br>  
            @endforeach
            </div>
            @else
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
                <p style="font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text">Qui vedi le campagne salvate</p>
            </div>
            </br>
            </br>
            @endif
        </div>
    </div>
     </br></br></br></br></br></br></br>
    <!--End::Section-->
</div>

@push('after-scripts')
<script>

$(window).scroll(function() {
    var pxFromBottom = 350;
    if ($(window).scrollTop() + $(window).height() > $(document).height() - pxFromBottom) {
        $('#campagne_menu').fadeOut('fast');
    } else {
        $('#campagne_menu').fadeIn('fast')
    }
});

</script>
@endpush
<!-- end:: Content -->

@endsection