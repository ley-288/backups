<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    @else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @endlangrtl
        
<style>

body{
    background-color:white !important;
    color:black !important;
}

.modal{
    margin-top:50px;
    border-radius:25px;
}

.modal-header{
    border-bottom:none;
}

.modal-footer{
    border-top:none;
}

    @media screen and (min-width: 1024px){
        #desktop_layout{
       	    display:block;
        	margin-left: 200px;
        	margin-right: 160px;
        	} 	
        	
    }
           
    @media screen and (max-width: 1024px){

        /* Add animation to "page content" */
.animate-right {
  position: relative;
  -webkit-animation-name: animateright;
  -webkit-animation-duration: 0.3s;
  animation-name: animateright;
  animation-duration: 0.3s;
}

@-webkit-keyframes animateright {
  from { right:-200px; opacity:0 } 
  to { right:0px; opacity:1 }
}

@keyframes animateright { 
  from{ right:-200px; opacity:0 } 
  to{ right:0; opacity:1 }
}

        #kt_scrolltop{
        	display: none;
        	}
        	
        #desktop_layout{
        	margin-top: 50px;
        	}
	}

</style>
        
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>@yield('title', app_name())</title>
            <meta name="description" content="SpiderGain">
            <meta name="author" content="SpiderGain">
             @include('includes.partials.favicon')
            @yield('meta')
            <script>var BASE_URL = 'https://www.spidergain.com/';</script>
            <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
            <script>
            
          
WebFont.load({
google: {
    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
},
active: function () {
    sessionStorage.fonts = true;
}
});
            </script>
            
            @stack('before-styles')

            <link href="{{url('/')}}/assets/vendors/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
            <link href="{{url('/')}}/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

            <link href="{{url('/')}}/css/style.bundle__.min.css" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/css/c4s.css?v=1.9.7" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/assets/css/around.css" rel="stylesheet">
			<link href="{{url('/')}}/assets/css/header.css?v=1.2" rel="stylesheet">
                       
            @stack('after-styles')
            
        </head>
        
        <body id="desktop_layout" style="border-top:3px solid transparent" class="animate-right kt-page--fluid kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent">
            @include('includes.partials.logged-in-as')
            @include('includes.partials.demo')
            
            
            @include('includes.partials.header')
            
            
            <div class="kt-container kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch" id="kt_body">
                @include('includes.partials.aside')
                @yield('content')
            </div>
                <script>
                    var KTAppOptions = {
                        "colors": {
                            "state": {
                                "brand": "#5d78ff",
                                "dark": "#282a3c",
                                "light": "#ffffff",
                                "primary": "#5867dd",
                                "success": "#34bfa3",
                                "info": "#36a3f7",
                                "warning": "#ffb822",
                                "danger": "#fd3995"
                            },
                            "base": {
                                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                            }
                        }
                    };
                </script>
                <!-- Scripts -->
                
                @stack('before-scripts')
                
                <script src="{{url('/')}}/assets/vendors/general/jquery/dist/jquery.js"></script>
                <script src="{{url('/')}}/assets/vendors/general/popper.js/dist/umd/popper.js"></script>
                <script src="{{url('/')}}/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="{{url('/')}}/assets/vendors/general/js-cookie/src/js.cookie.js"></script>
                <script src="{{url('/')}}/assets/vendors/general/moment/min/moment.min.js"></script>
                <script src="{{url('/')}}/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js"></script>
                <script src="{{url('/')}}/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js"></script>
                <script src="{{url('/')}}/assets/vendors/general/jquery-form/dist/jquery.form.min.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/custom/js/vendors/bootstrap-switch.init.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/select2/dist/js/select2.full.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/jquery-validation/dist/jquery.validate.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/jquery-validation/dist/additional-methods.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/custom/js/vendors/jquery-validation.init.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
                <script src="{{url('/')}}/assets/vendors/general/sticky-js/src/sticky.js" type="text/javascript"></script>
                <script src="{{url('/')}}/js/scripts.bundle_v.js"></script>

               



<script src="//maps.google.com/maps/api/js?key=<?=config('googlemaps.key')?>"></script>
<script src="{{url('/')}}/assets/plugins/gmaps/gmaps.min.js"></script>
<script src="{{url('/')}}/assets/js/campagna.js?v=2.0"></script>
<script src="{{url('/')}}/assets/js/around.js?v=2.6"></script>

<script src="{{url('/')}}/assets/js/story.js?v=2.0"></script>
<script src="{{url('/')}}/assets/js/profile.js?v=0.5"></script>
<script src="{{url('/')}}/assets/js/notifications.js?v=2.0"></script>        
                
<script type="text/javascript">
    var BASE_URL = "{{ url('/') }}";
    var REQUEST_URL = "<?=Request::url()?>";
    var CSRF = "{{ csrf_token() }}";
    var WALL_ACTIVE = false;
</script>
         
<script type="text/javascript">
    @if(!Auth::user()->has('location'))

            autoFindLocation();

    @endif
</script>
            
                
               
                
                
                @stack('after-scripts')



                @include('includes.partials.ga')
                @include('includes.partials.footer')
                @include('cookieConsent::index')
        </body>
    </html>
