

{{--

@extends('frontend.layouts.interna')

OLD PROFILE PAGE COMMENTED OUT. SAVED TO REVERT (IF-EVER NEEDED)

@section('content')

<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
       </div>
          <!-- begin:: Content -->
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
       @include('includes.partials.messages')
          <div class="row">
            <div class="col-xl-12">
                <!--begin:: Widgets/Applications/User/Profile3-->
                <div class="kt-portlet kt-portlet--height-fluid">                                	
                    <div class="kt-portlet__body">
                        <div class="kt-widget kt-widget--user-profile-3">
                            <div class="kt-widget__top">
                                @if($user->avatar_location != '')
                                <div class="kt-widget__media kt-hidden-">
				  <a href="{{ url('/social/'.$user->username) }}">
                                   <img style="border:3px solid white;" id="prof_loc" src="{{asset('storage/'.$user->avatar_location)}}" alt="image">
				  </a>
                                </div>
                                @else
                               <div class="kt-widget3__user-img">
                                <a href="{{ url('/social/'.$user->username) }}">
                                            <img style="border:3px solid white;" id="prof_loc" class="kt-widget__img kt-hidden-" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
				</a>
                                   {{$user->first_name[0].$user->last_name[0]}}
                                </div>
                                @endif
                                <div class="kt-widget__content">
                                    <div class="kt-widget__head">
                                       <a href="#" class="kt-widget__username">
                                            {{$user->first_name.' '.$user->last_name}}
                                            <span class="kt-badge kt-badge--success kt-badge--inline">@lang('Aziendale')</span>
                                            - {{$user->dettagli->ragione_sociale}}
                                        </a>                                   
                                        <div class="kt-widget__action">                                       
                                        </div>
                                    </div>
                                   <div style="word-break: break-word" class="kt-widget__subhead">
                                        @if(isset($user->dettagli->azienda_email))
                                        <a href="#"><i class="flaticon2-new-email"></i>{{$user->dettagli->azienda_email}}</a>
                                        @endif
                                        @if(isset($user->dettagli->telefono))
                                        <a href="#"><i class="flaticon2-phone"></i>{{$user->dettagli->telefono}}</a>
                                        @endif
                                    </div>
                                   <div class="kt-widget__info">
                                        <div class="kt-widget__desc">
                                            <strong>{{$user->dettagli->ragione_sociale}}</strong> - {{$user->dettagli->azienda_citta.' - '.$user->dettagli->azienda_via.', '.$user->dettagli->azienda_numero_civico}}
                                        </div>
                                        @if($user->dettagli->descrizione)
                                        <div class="kt-widget__desc">
                                            {!! clean($user->dettagli->descrizione) !!}
                                        </div>
                                        @endif
                                    </div>
                                </div> 
                            </div> 
                            <div class="kt-widget__bottom">
                                 @if($user->dettagli->blog)
                                <div class="kt-widget__item">                                
                                    <div class="kt-widget__icon">
                                        <a href="{{$user->dettagli->blog}}" target="_blank">
                                        <i class="fa fa-globe"></i>
                                        </a>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">@lang('Sito Web')</span>
                                         <a href="{{$user->dettagli->blog}}" target="_blank">
                                       // <span class="kt-widget__value">@lang('Vai alla pagina')</span>
                                         </a>
                                    </div>
                                    </a>
                                </div>
                                @endif                               
                                 @if($user->dettagli->youtube)
                                <div class="kt-widget__item">                                  
                                @if($user->dettagli->facebook)
                                <div class="kt-widget__item">
                                    <div class="kt-widget__icon">
                                        <a href="{{$user->dettagli->facebook}}" target="_blank">
                                        <i class="fab fa-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">Facebook</span>
                                         <a href="{{$user->dettagli->facebook}}" target="_blank">
                                       // <span class="kt-widget__value">@lang('Vai alla pagina')</span>
                                         </a>
                                    </div>
                                    </a>
                                </div>
                                @endif
                                @if($user->dettagli->instagram)
                                <div class="kt-widget__item">                                 
                                    <div class="kt-widget__icon">
                                        <a href="{{$user->dettagli->instagram}}" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                        </a>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">Instagram</span>
                                         <a href="{{$user->dettagli->instagram}}" target="_blank">
                                       // <span class="kt-widget__value">@lang('Vai alla pagina')</span>
                                         </a>
                                    </div>
                                    </a>
                                </div>
                                @endif
                                @if($user->dettagli->twitter)
                                <div class="kt-widget__item">                            
                                    <div class="kt-widget__icon">
                                        <a href="{{$user->dettagli->twitter}}" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                        </a>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">Twitter</span>
                                        <a href="{{$user->dettagli->twitter}}" target="_blank">
                                       // <span class="kt-widget__value">@lang('Vai alla pagina')</span>
                                        </a>
                                    </div>
                                    </a>
                                </div>
                                @endif
                                    <div class="kt-widget__icon">
                                        <a href="{{$user->dettagli->youtube}}" target="_blank">
                                        <i class="fab fa-youtube"></i>
                                        </a>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">YouTube</span>
                                          <a href="{{$user->dettagli->youtube}}" target="_blank">
                                      //  <span class="kt-widget__value">@lang('Vai alla pagina')</span>
                                          </a>
                                    </div>
                                    </a>
                                </div>
                                @endif
                               @if($user->dettagli->tiktok)
                                <div class="kt-widget__item">                                  
                                    <div class="kt-widget__icon">
                                        <a href="{{$user->dettagli->tiktok}}" target="_blank">
                                        <i class="fab fa-tiktok"></i>
                                        </a>
                                    </div>
                                    <div class="kt-widget__details">
                                        <span class="kt-widget__title">TikTok</span>
                                         <a href="{{$user->dettagli->tiktok}}" target="_blank">
                                       // <span class="kt-widget__value">@lang('Vai alla pagina')</span>
                                         </a>
                                    </div>
                                    </a>
                                </div>
                                @endif 
                            </div>
                        </div>
                    </div>
                </div>
               <!--end:: Widgets/Applications/User/Profile3-->
            </div>
        </div>
    </div>
@endsection

--}}
        




@extends('frontend.layouts.interna')

@section('title', app_name() . ' | ' . __('Profilo'))

@section('content')


<style>

@media screen and (max-width: 1024px) {

    #profile_maps{
        margin-top:20px;
        width:120%;
        }

    #map_on_page{
        width:100%;
        height:50vh;
    }

    .container {
        display:flex;
        margin-top:-30px;
        margin-left:auto;
        margin-right:auto;
        height: 110px;
        }
        
    .socio {
        position:absolute;
        padding: 10px;
        margin-left:-20px;
        }

    .social_right {
        position:absolute;
        margin-left:100px;
        margin-right:10px;
        align:right;
        padding: 10px;
        }
	  
      
}

@media screen and (min-width: 1024px) {

    #profile_maps{
        width:800px;
        margin-top:30px;
        margin-left:10%;
        }
    
    #map_on_page{
        margin-top:-20px;
        width:100%;
        height:60vh;
    }

    .container {
        display: flex;
        justify-content:left;
        height: 140px;
        }

    .socio {
        margin-right:410px;
        padding: 10px;
        }

    .social_right {
        position:absolute;
        margin-left:530px;
        align:right;
        padding: 10px;
        }

        
}

</style>

<div style="overflow-x:hidden;" id="profile_maps">
    <!-- begin:: Subheader -->
                            
    <div class="container">
        <div class="socio">
            @include('profile.widgets.card')
        </div>
        <div class="social_right">
            @include('widgets.maps_menu')
        </div>
    </div>


<iframe id="map_on_page" width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://maps.google.com/maps?f=l&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q={{$user->dettagli->azienda_nome}},{{$user->dettagli->azienda_via}}&amp;aq=t&amp;z=17&amp;om=0&amp;iwloc=addr&amp;iwd=0&amp;layer=0&amp;&output=embed"></iframe></small>
   

</div>

    <!--end::Widget -->

    <!--begin::Navigation -->

    <!--end::Navigation -->
                    
</div>

@endsection
        
        
        
        
        
