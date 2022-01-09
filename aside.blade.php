<style>

    button{
		background: rgb(158, 0, 250);
		cursor: pointer;
		will-change: background;
		transition: background 1s;
		&:hover{
			background: rgb(229, 0, 250);
		}
	}
		
	.overlay{
		opacity: 1;
		position: absolute;
		z-index: 0;
		top: 50px;
		left: -10;
		width: 100vw;
		height: 100vh;
		background: rgb(0,0,0,.5);
	}
	
	.share, .overlay{
		display: none;
	}
	
	.show-share{
		display: block;
	}
	
	.share{
		position: absolute;
		left: 0;
		right: 0;
		top: 30%;
		margin: auto;
		width: 50%;
		z-index: 1;
		padding: 1em;
		background: white;	
		h2{
			margin: 0;
		}	
		button{
			border: none;
			padding: 8em 1.2em;
			margin-top: 3em;
			width: 32%;
			cursor: pointer;
		}
	}
	
	#kt_aside_menu_wrapper{
	background-color:white;
	}
	
	#side-button{
	background-color:white;
	}

	#header{
	background-color:white;
	}


    {{-- mobile --}}
    @media screen and (max-width: 1024px) {


	    #side-button{
	        display: none;
	        }
	
	    #kt_aside{
	        display: none;
	        }
	
	    #kt_aside_close_btn{
	        display: none;
	        }
	
	    .sidebar{
	        display: none;
	        }
	
	    .side_2{
	        display: none;
	        }

        #mobile_menu_function {
            transition: bottom 0.3s;
            }
            
        .nav__link--active {
            //background-color: white !important;
            //color: black !important;
            //color: red !important;
            background-image: linear-gradient(#e72b38, #e72b80);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            }
    
    }

    
	

    {{-- web --}}
    @media screen and (min-width: 1024px) {	
	
	    #mobile_nav{
	        display:none;
	        }
	
	    #kt_aside{
	        display: none;
	        }

            
    }

    body {
        margin: 0 0 55px 0;
    }

    .nav_mobile {
        position: fixed;
        left: 0;
        bottom: 0;
        //margin-bottom:20px;
        //margin-top:85vh;
        width: 100%;
        height: 50px;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        //background-color: #1E1E2D;
        background-color: white;
        display: flex;
        overflow-x: auto;
        z-index: 214748359;
    }

    .nav__link {
        //margin-bottom:50px;
        padding-left:-3px;
        padding-right:-3px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        flex-grow: 1;
        min-width: 50px;
        overflow: hidden;
        white-space: nowrap;
        font-family: poppins;
        font-size: 13px;
        color: black;
        text-decoration: none;
        background-color:white;
        -webkit-tap-highlight-color: transparent;
        transition: background-color 0.1s ease-in-out; 
        //padding-bottom:10px;
        margin-top: -8px;
    }

    .nav__link:hover {
        color: #e72b38; 
        //background-image: linear-gradient(#e72b38, #e72b80);
        //-webkit-background-clip: text;
        //-webkit-text-fill-color: transparent;   
    }

    .nav__link--active {
        background-color: white;
        color: black;
    }

    .nav__link--active:active {
        color: #e72b38 !important;
    }

    #mobile_nav .active{
        //color: #e72b38 !important;
        background-image: linear-gradient(#e72b38, #e72b80);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .nav__icon {
        font-size: 18px;
        margin-top: 2px;
    }

    .nav__text{
        font-size:9px;
    }
	
    #ico_side{
	    margin-top:5px;
	    height:20px;
	    width:20px;
        color:black;
    }

{{-- NUOVA SIDE MENU AND ICONS --}}

    .side_2 {
        height: 100%;
        width: 80px;
        position: fixed;
        transition: 0.5s;
        z-index: 2;
        margin-top: -30px;
        left: 0;
        //background-color: #1E1E2D;
        background-color: white;
        color:black !important;
        overflow-x: hidden;
        padding-top: 30px;
        box-shadow:none;
        background-color:transparent;
    }

    .side_2:hover {
        height: 100%;
        width: 220px;
        position: fixed;
        z-index: 2;
        margin-top: -30px;
        left: 0;
        //background-color: #1E1E2D;
        background-color: white;
        color:black !important;
        overflow-x: hidden;
        padding-top: 30px;
        //box-shadow:0 0 15px #F7F5F8;
        box-shadow: none;
        clip-path: inset(0px -15px 0px 0px);
    }

   
   
}

    #par{
        color:transparent;
    }

    .side_2 a {
        padding: 20px 20px 10px 25px;
        text-decoration: none;
        font-size: 20px;
        color: white;
        display: block;
    }

    /* Style links on mouse-over */
    .side_2 a:hover {
        color: white;
        transform: scale(1.1)
    }

    /* Style the main content */
    .main {
        margin-left: 160px; /* Same as the width of the sidenav */
        padding: 0px 10px;
    }

    #loadOverlay{display: none;}
    
</style>

           
<div class="side_2">
    <a id="share_menu" href="{{route('frontend.condividi')}}"><i class="material-icons nav__icon" id="ico_side">share</i><p style="margin-top: -35px; margin-left:55px; color:black;"> @lang('applicazione.condividi')</p></a>
      <a href="{{url('/')}}/newpost" ><i class="material-icons nav__icon" id="ico_side">add_circle</i><p style="margin-top: -35px;margin-left:55px; color:black;"> Post</p></a>
    <a href="{{url('/social',Auth::user()->username)}}" ><i class="material-icons nav__icon"  id="ico_side">account_circle</i> <p style="margin-top:-35px;margin-left:55px;  color:black;"> @lang('applicazione.profilo')</p></a>
    <a href="{{url('/')}}/profilo/categoria" ><i class="material-icons nav__icon"  id="ico_side">category</i> <p style="margin-top:-35px;margin-left:55px;  color:black;"> @lang('applicazione.categorie')</p></a>
    @if(Auth::user()->company == 1)
    <a href="{{url('/')}}/link-account"><i class="material-icons nav__icon"  id="ico_side">storefront</i> <p style="margin-top:-35px;margin-left:55px;  color:black;">Negozi</p></a>
    @endif
    <a href="{{url('/')}}/feed" ><i class="material-icons nav__icon" id="ico_side">public</i><p style="margin-top: -35px;margin-left:55px; color:black;"> @lang('applicazione.social')</p></a>
    <a href="{{url('/')}}/groups" ><i class="material-icons nav__icon" id="ico_side">people</i><p style="margin-top: -35px;margin-left:55px; color:black;"> @lang('applicazione.gruppi')</p></a>
     <a href="{{url('/')}}/cerca-campagne" ><i class="material-icons nav__icon"  id="ico_side">work</i> <p style="margin-top:-35px;margin-left:55px;  color:black;"> @lang('applicazione.campagne')</p></a>
    @if(Auth::user()->company != 1)
    <a href="{{url('/')}}/richieste"><i class="material-icons nav__icon" id="ico_side">swap_vertical_circle</i><p style="margin-top: -35px;margin-left:55px; color:black;"> @lang('applicazione.ricevuto')</p></a>
    @endif
    @if(Auth::user()->company == 1)
    <a href="{{url('/')}}/campagne/open"><i class="material-icons nav__icon" id="ico_side">offline_bolt</i><p style="margin-top: -35px;margin-left:55px; color:black;"> @lang('applicazione.aperte')</p></a>
    @else
     <a href="{{url('/')}}/saved-campaigns"><i class="material-icons nav__icon" id="ico_side">bookmark</i><p style="margin-top: -35px;margin-left:55px; color:black;"> @lang('Salvate')</p></a>
    @endif
</div>

 
{{-- MUST KEEP THIS CODE FOR LAYOUT OF WEBSITE --}}
<!-- begin:: Aside -->
<button class="kt-aside-close" style="background-color:#5579F6;" id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside kt-aside--fixed kt-scroll kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" data-scroll="true" id="kt_aside"></div>
<!-- end:: Aside Menu -->



{{-- mobile Nav --}}
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <nav class="nav_mobile" id="mobile_nav">
  
  <a href="{{ url('/search') }}" class="nav__link">
    <i class="material-icons nav__icon {{ Request::is('search') ? 'active' : '' }}" style="font-weight: bold; margin-bottom:-2px">search</i>
  </a>
 
  
  
  
  <a href="{{url('/')}}/feed" class="nav__link ">
    <i class="material-icons nav__icon {{ Request::is('feed') ? 'active' : '' }}">public</i>
  </a>

  
  
  @if(Auth::user()->company == 1)
  <a href="{{url('/')}}/10secondi" class="nav__link ">
   <i class="material-icons nav__icon {{ Request::is('10secondi') ? 'active' : '' }}">work</i>  
  </a>
  @else
  <a href="{{url('/')}}/cerca-campagne" class="nav__link ">
   <i class="material-icons nav__icon {{ Request::is('cerca-campagne') ? 'active' : '' }}">work</i>  
  </a>
 @endif

 

  
  <a href="{{url('/social',Auth::user()->username)}}" class="nav__link">
    <i class="material-icons nav__icon {{ Request::is('social'.'/'.Auth::user()->username) ? 'active' : '' }}">account_circle</i>
  </a>
  
  
  
  <a href="{{url('/')}}/newpost" class="nav__link ">
    <i class="material-icons nav__icon {{ Request::is('newpost') ? 'active' : '' }}">add_circle</i>
  </a>


  @role('administrator')
  <a  href="{{url('/')}}/admin/dashboard" class="nav__link ">
    <i class="material-icons nav__icon {{ Request::is('admin/dashboard') ? 'active' : '' }}">account_circle</i>
    <span class="nav__text">Admin</span>
  </a>
  @endrole

</nav>

<!-- end:: Aside -->
