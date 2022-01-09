

<style>

.kt-header-mobile{
    height:45px;
}

.dropdown {
  position: relative;
  display: inline-block;
  margin-top:5px;
}

.dropdown-content {
  display: none;
  //position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: none;
  z-index: 1;
  margin-left:-230px;
  border:2px solid #F7F5F8;
  border-radius:5px;
}

.dropdown:hover .dropdown-content {
  display: block;
}

#ico_web{
    position: relative;
    margin-top:15px;
    margin-right:20px;
    margin-left:10px;
    color:black;
}

.card_menuselect{
    height:13vh;
    width:13vh;
    padding:10px;
    display: flex;
    justify-content: center;
    align-content: center;
    flex-wrap: nowrap;
    flex-direction: column;
    align-items: center;
    text-align:center;
    border:2px solid  #F7F5F8;
    border-radius:5px;
    margin:1px;
}

#this_icon{
        display: flex!important;
    justify-content: center!important;
    color:black!important;
}

.btn-danger{
    border-radius:5px;
    background-color:#e72b38;
}

.btn-default{
    border-radius:5px;
}

@media screen and (max-width: 1024px) {

.input-lg::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: white;
  opacity: 1; /* Firefox */
  padding-left:60px;
}

#mobile-logo{
    margin-left:0px!important;
    margin-top:10px;
}

#icon_menu_icon_logo{
color:black; font-size: 38px; margin-top:-2px; margin-left:4px;
}

#mobile_header_style{
    position:absolute;
    box-shadow:none;
    z-index:999;
    //background-color:#e72b38;
    background-color:white; 
}

#ico{
    color:black;
}

#para_men{
    color:black;
}

}

@media screen and (min-width: 1024px) {
#icon_menu_icon_logo{
color:#e72b38; font-size: 23px; margin-top:0px; margin-left:4px;
}

#icon_menu_icon_search{
color:#e72b38; font-size: 23px; margin-top:5px; margin-left:4px;
}
}

</style>


<!-- begin:: Header Mobile -->
<div id="mobile_header_style" class="kt-header-mobile  kt-header-mobile--fixed">

    <div class="kt-header-mobile__logo">
    
            <a href="{{url('/feed')}}">
                <img id="mobile-logo" style="margin-left:0px;" alt="Logo" width="155px" src="{{url('/')}}/assets/media/logos/new/rosso.png" />
            </a>
    </div>
    <div style="margin-top:10px;" class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" style="margin-right:20px;" id="kt_aside_mobile_toggler">
        </button>
        @include('avatar')
    </div> 
</div>
<!-- end:: Header Mobile -->



<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
            <!-- begin:: Header -->
            <div id="kt_header" style="background-color:transparent; height:50px !important; border-top: none; box-shadow:none; z-index:9999999999999900;" class="kt-header kt-grid__item  kt-header--fixed data-kt-header-minimize=on">
                <div class="kt-container">
                    <div class="kt-header__brand " id="kt_header_brand">
                        <div class="kt-header__brand-logo">
                            <a href="{{url('/')}}/feed">
                                <img alt="Logo" width="180" src="{{url('/')}}/assets/media/logos/new/rosso.png" />
                            </a>
                        </div>
                    </div>
                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">
                    
                    <div style="position:absolute; height:28px; width:28px; background-color:transparent; border-radius:100%; margin-left:-150px; margin-top:5px;">
                            <a id="icon_menu_icon" style="background-color:transparent;" href="{{ url('/search') }}" role="button" aria-expanded="false">
                                <i id="icon_menu_icon_search" class="material-icons nav__icon" style="font-size:28px;">search</i>
                            </a>
                    </div>
                    <div style="position:absolute; height:28px; width:28px; background-color:transparent; border-radius:100%; margin-left:-100px; margin-top:8px;">
                        <div class="dropdown direct-messages-notification">
                            <a id="icon_menu_icon" style="background-color:transparent;" href="{{ url('/direct-messages') }}" role="button" aria-expanded="false">
                                <i id="icon_menu_icon_logo" class="material-icons nav__icon" style="">message</i>
                            </a>
                        </div>
                    </div>
                    <div style="position:absolute; margin-left:-50px; margin-top:3px;">
                        @include('widgets.notifications')
                    </div>
                    
                    <!--begin: User bar -->
                    <div class="kt-header__topbar-item kt-header__topbar-item--user">          
                        <div class="dropdown">
                            @if(Auth::user()->avatar_location != '')                             
                                <img alt="Pic" src="{{asset('storage/'.Auth::user()->avatar_location)}}" style=" border:2px solid white; width:40px; border-radius:20px; object-fit:cover;" />                             
                            @else                       
                                <img alt="Pic" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="border:2px solid white; max-height:40px; max-width:40px; border-radius:20px;" />                          
                            @endif
                            <div class="dropdown-content">
                            </br>
                            <div style="display:flex; justify-content:center;">
                                <a  href="{{url('/social',Auth::user()->username)}}">
                                    @if(Auth::user()->avatar_location != '')                             
                                        <img alt="Pic" src="{{asset('storage/'.Auth::user()->avatar_location)}}" style=" border:2px solid white; width:80px; border-radius:40px; object-fit:cover;" />                             
                                    @else                       
                                        <img alt="Pic" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="border:2px solid white; max-height:80px; max-width:80px; border-radius:40px;" />                          
                                    @endif
                            </a>
                            </div>
                            <h4 style="text-align:center;">Ciao..</h4>
                            
                            <strong><h3 style="text-align:center;">@if (Auth::user()->hasRole('brand') || Auth::user()->company == 1) @if(!empty(Auth::user()->dettagli->azienda_nome)){{ Auth::user()->dettagli->azienda_nome }}@else{{ Auth::user()->name }}@endif @elseif (Auth::user()->hasRole('influencer')){{ Auth::user()->name }} @endif</h3></strong>
                            <hr>
                                @if(Auth::user()->hasRole('administrator'))
                                    <a href="{{url('/')}}/admin/dashboard">
                                        <i class="material-icons nav__icon" id="ico_web">explore</i>
                                        Admin      
                                    </a> 
                                    </br>
                                         
                                @endif
                               
                              
                                <a href="{{url('/')}}/profilo/completa/modifica"> 
                                    <i class="material-icons nav__icon" id="ico_web">create</i>
                                    @lang('applicazione.modifica_profilo') 
                                </a>
                                </br>

                                 <a href="{{url('/')}}/social_accounts"> 
                                    <i class="material-icons nav__icon" id="ico_web">public</i>
                                    @lang('applicazione.presenza_online') 
                                </a>
                                </br>
                                
                                <a href="{{url('/')}}/account">     
						                        <i class="material-icons nav__icon" id="ico_web">lock</i>
                                    @lang('applicazione.account')
                                </a>
                                </br>
                                
                                <a href="{{url('/')}}/come-funziona">   
                                    <i class="material-icons nav__icon" id="ico_web">psychology</i>
                                    @lang('applicazione.come_funziona')
                                </a>
                                </br>
                               
                                <a href="{{url('/')}}/faq">   
                                    <i class="material-icons nav__icon" id="ico_web">help</i>
                                    @lang('applicazione.faq')  
                                </a>
                                </br>
                                
                                <a href="{{url('/')}}/supporto">
                                    <i class="material-icons nav__icon" id="ico_web">support_agent</i>
                                    @lang('applicazione.supporto')      
                                </a>
                                </br>
                                
                                @if(Auth::user()->hasRole('influencer'))
                                    <a href="https://www.youtube.com/playlist?list=PLBmU2ksW1iMGYsEup6-Jodxb6IsfE08fQ">   
                                        <i style="color:#e72b38;" class="material-icons nav__icon" id="ico_web">video_library</i>
                                        @lang('applicazione.tutoriale')
                                    </a>
                                    </br>
                                     
                                @endif
                                @if(Auth::user()->hasRole('brand'))
                                    <a href="https://www.youtube.com/playlist?list=PLBmU2ksW1iMGRw21XMAx8sqqszInFXoci">   
                                        <i style="color:#e72b38;" class="material-icons nav__icon" id="ico_web">video_library</i>
                                        @lang('applicazione.tutoriale')
                                    </a>
                                    </br>
                                   
                                @endif

                                @if(Auth::user()->staff == 1)
                                <a  href="{{url('/')}}/counter">   
                                        <i style="color:#e72b38;" class="material-icons nav__icon" id="ico_web">timer</i>
                                        Counter
                                    </a>
                                    </br>
                    
                                @endif

                                <hr>

            
                               
                                <div style="display:flex; justify-content:space-between;">
                                    <a href="{{url('/')}}/logout" target="_blank" class="btn btn-secondary btn-sm" style="margin-left:10px; border:2px solid #F7F5F8; color:black; border-radius:5px;" id="esci">@lang('applicazione.esci')</a>
                                
                               
                                
                                    @foreach(array_keys(config('locale.languages')) as $lang)
                                        @if($lang != app()->getLocale())
                                            @if($lang == 'en')
                                                <a href="{{ '/lang/'.$lang }}"> <img style="margin-right:10px; max-height:25px; max-width:25px;" src="{{url('/')}}/assets/media/icons/socialbuttons/usa_flag.png"></a>
                                            @endif
                                            @if($lang == 'it')
                                                <a href="{{ '/lang/'.$lang }}"> <img style="margin-right:10px; max-height:25px; max-width:25px;" src="{{url('/')}}/assets/media/icons/socialbuttons/italy_flag.png"></a>
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                                </br>
                            </div>
                        </div>
                    </div>
                    <!--end: Navigation -->
                </div>
            </div>
            <!--end: User bar -->
        </div>
        <!-- end:: Header Topbar -->
    </div>   
</div>
<!-- end:: Header -->




@push('after-scripts')


@endpush