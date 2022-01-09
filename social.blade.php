<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    @else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        @endlangrtl
   
        <head>
           
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>@yield('title', app_name())</title>
            <meta name="description" content="SpiderGain">
            <meta name="author" content="SpiderGain">
            
            
            @include('includes.partials.favicon')
            @yield('meta')
           
                  
<style>

#my-div { display:block !important; }

body{
    background-color:white !important;
    color:black !important;
}

#loading {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 100;
        background-color: #fff;
        z-index: 99;
    }

    #loading-image {
        height:50px;
        width:50px;
        z-index: 100;
        
    }
        
    @media screen and (min-width: 1024px){

        
        	
            #desktop_layout{
       		    display:block;
       		    margin-left:auto;
       		    margin-right:auto;
       		    max-width: 800px;
        	    }
        	
        	.dm{
        	    display:block;
        	    margin-left:auto;
        	    margin-right:auto;
        	    max-width: 1000px;
        	    }

             #mobile_header_style{
        display:none;
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

            body.modal-open {
                overflow: hidden !important;
                margin-top:25% !important;   
            }
        	
        	#desktop_layout{
                overflow-x:hidden;
        	    display:block;
                margin-right: auto;
                margin-left: auto;
                margin-top:30px;
        	    }
        	
        	.dm{
        	    display:flex;
        	    float:center;
        	    margin:0 auto;
        	    max-width: 1000px;
        	    }

            #kt_body{
                position:absolute;
            }

            #mobile_header_style{
        margin-top:70px!important;
        box-shadow:none;
    }

    }		
        
</style>

<style>
/* Center the loader */
#load_spinner {
  position: absolute;
  z-index:9999;
  background-color: transparent;
  //left: 50%;
  //top: 50%;
  //z-index: 1;
  //width: 120px;
  //height: 120px;
  //margin: -76px 0 0 -76px;
  //border: 16px solid #f3f3f3;
  //border-radius: 50%;
  //border-top: 16px solid #e72b38;
  //-webkit-animation: spin 2s linear infinite;
  //animation: spin 2s linear infinite;
}


#load_image{
    height: 100vh;
    width: 100vw;
    position: fixed;
    margin-top: 180px;
    margin-left: 0px;
    background-color: transparent;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 0.5s;
  animation-name: animatebottom;
  animation-duration: 0.5s;
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}


#load_page_panel {
  display: none;
}
</style>
           
          
            @stack('before-styles')

            <link href="{{url('/')}}/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
            <link href="{{url('/')}}/assets/plugins/pace-master/themes/white/pace-theme-flash.css" rel="stylesheet">
            <link href="{{url('/')}}/assets/plugins/fancybox/dist/jquery.fancybox.min.css" rel="stylesheet">
            <link href="{{url('/')}}/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
            <link href="{{url('/')}}/assets/plugins/bootstrap3-dialog/dist/css/bootstrap-dialog.min.css" rel="stylesheet">
            <link href="{{url('/')}}/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
            <link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

            <link href="{{url('/')}}/css/style.bundle__.min.css" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/css/c4s.css?v=1.9.7" rel="stylesheet" type="text/css">
            <link href="{{url('/')}}/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
            <link href="{{url('/')}}/assets/css/around.css?v=1.5" rel="stylesheet">
			<link href="{{url('/')}}/assets/css/header.css?v=1.2" rel="stylesheet">
            <link href="{{url('/')}}/assets/css/notifications.css?v=1.2" rel="stylesheet">
            <link href="{{url('/')}}/assets/css/message_notif.css?v=1.2" rel="stylesheet">
            <link href="{{url('/')}}/assets/css/post.css?v=1.6" rel="stylesheet">
            
            <link href="{{url('/')}}/assets/css/feed.css?v=1.2" rel="stylesheet">
			<link href="{{url('/')}}/assets/css/wall.css?v=1.2" rel="stylesheet">
			<link href="{{url('/')}}/assets/css/wall_profile.css?v=1.3" rel="stylesheet">
			<link href="{{url('/')}}/assets/css/profile.css?v=1.9" rel="stylesheet">
			<link href="{{url('/')}}/assets/css/suggested_people.css?v=1.3" rel="stylesheet">
            
            
            
            
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

            @stack('after-styles')
           
            <script>
             var myVar;

                    function LoadPageFunction() {
                        myVar = setTimeout(showPage, 2000);
                    }

                    function showPage() {
                        document.getElementById("load_spinner").style.display = "none";
                        document.getElementById("load_page_panel").style.display = "contents";
                    }
                 window.onload = LoadPageFunction();
            </script>
        </head>
        
        
        <body id="desktop_layout" style="font-family: poppins; border-top:3px solid transparent" class="animate-right kt-page--fluid kt-page-content-white kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent">
            
            {{--<div id="load_spinner"></div>
            <div id="load_spinner">
                <img id="load_image" src="{{url('/')}}/assets/media/loading/new_load.jpg" alt="Loading..." />
            </div>
            <div style="display:contents;" id="load_page_panel"  class="animate-bottom">--}}
            
                <div id="my-div">
                    @include('includes.partials.header')
                </div>
                <div class=" kt-container kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch" id="kt_body">
                        @include('includes.partials.aside')
                        <div class="main-content">
       		                @yield('content')       	
    	                </div>
                </div>
	        

		 @include('widgets.error') 
              
                <!-- Scripts -->
                @stack('before-scripts')


            


<script type="text/javascript">
    var BASE_URL = "{{ url('/') }}";
    var REQUEST_URL = "<?=Request::url()?>";
    var CSRF = "{{ csrf_token() }}";
    var WALL_ACTIVE = false;
</script>


<script src="{{url('/')}}/assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="{{url('/')}}/assets/plugins/pace-master/pace.min.js"></script>
<script src="{{url('/')}}/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/assets/plugins/jquery.serializeJSON/jquery.serializejson.min.js"></script>
<script src="{{url('/')}}/assets/plugins/fancybox/dist/jquery.fancybox.min.js"></script>
<script src="{{url('/')}}/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{url('/')}}/assets/plugins/bootstrap3-dialog/dist/js/bootstrap-dialog.min.js"></script>
<script src="{{url('/')}}/assets/plugins/select2/dist/js/select2.full.min.js"></script>
<script src="//maps.google.com/maps/api/js?key=<?=config('googlemaps.key')?>"></script>
<script src="{{url('/')}}/assets/plugins/gmaps/gmaps.min.js"></script>
<script src="{{url('/')}}/assets/js/campagna.js?v=1.4"></script>
<script src="{{url('/')}}/assets/js/around.js?v=2.6"></script>
<script src="{{url('/')}}/assets/js/wall.js?v=38.3"></script>
<script src="{{url('/')}}/assets/js/story.js?v=4.0"></script>
<script src="{{url('/')}}/assets/js/profile.js?v=0.5"></script>
<script src="{{url('/')}}/assets/js/notifications.js?v=2.0"></script> 


{{--
<script type="text/javascript">
    @if(!Auth::user()->has('location'))

            autoFindLocation();

    @endif
</script>
--}}
             
                
                <script>
                    $(window).load(function() {
                        $('#loading').hide();
                    });
                </script>
                

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


                @stack('after-scripts')

                

                @include('cookieConsent::index')
                @include('includes.partials.ga')
                @include('includes.partials.footer')
                

                
    </body>
</html>
