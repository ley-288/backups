@extends('frontend.layouts.interna')

@section('title', app_name() . ' | ' . __('applicazione.profilo_influencer'))

@section('content')
@push('after-styles')


@endpush

@push('after-scripts')

@endpush


<script>
function openPage(pageName, elmnt, color) {
  // Hide all elements with class="tabcontent" by default */
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Remove the background color of all tablinks/buttons
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }

  // Show the specific tab content
  document.getElementById(pageName).style.display = "block";

  // Add the specific color to the button used to open the tab content
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<style>

    .container {
        display: flex;
        align-items: center;
        justify-content: left;
        height: 200px;
    }

    .social:hover {
        transition:0.2s;
        transform: scale(1.1);
    }

    .spiderg:hover {
        transition:0.2s;
        transform: scale(1.1);
    }

    #posizioni:hover{
        transition:0.2s;
        transform: scale(1.1);
        background-color:#fcfdfe;
    }

    .im{
        height: 70px;
        width: 70px;
        border-radius: 35px;
        margin-top:-100px;
        margin-left: auto;
        margin-right: auto  
    }
    
    .im:hover{
        transition:0.2s;
        transform: scale(1.1);
    }
    
}

{{-- mobile --}}
    @media screen and (max-width: 480px) {

        .container {
            display: flex;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            height: 200px;
            }

        .social {
            position: relative;
            display: inline-block;
            float: left;
            padding: 10px;
            }

        .im{
            height: 40px;
            width: 40px;
            border-radius: 20px;     
            margin-top:-50px;
            margin-left: auto;
            margin-right: auto  
            }
    
    }

    .im:hover{
    	cursor: pointer;
    }


/* Set height of body and the document to 100% to enable "full page tabs" */
    body, html {
        height: 100%;
        margin: 0;
    }

/* Style tab links */
    .tablink {
        background-color: #1E1E2D;
        color: white;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        font-size: 17px;
        width: 25%;
    }

    .tablink:hover {
        background-color: #e72b38;
    }

/* Style the tab content (and add height:100% for full page content) */
    .tabcontent {
        color: white;
        display: none;
        padding: 100px 20px;
        height: 100%;
    }

    #Home {background-color: white;}
    #News {background-color: white;}
    #Contact {background-color: white;}
    #About {background-color: white;}

  	@media screen and (max-width: 1024px) {
	
	    #prof_loc{
		    margin-top:0px;
		    max-width:130px;
	        }
	    
    }

	@media screen and (min-width: 1024px) {
	
	    #prof_loc{
		    margin-top:-15px;
		    max-width:150px;
	        }
  
    }

</style>  

<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid">
    <!-- begin:: Subheader -->
  

        

    <!-- begin:: Content -->
   
              
              
<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        
        <div class="row">
            <div class="col-xl-12" >
              <div class="kt-portlet kt-portlet--height-fluid-" style="background-repeat:no-repeat;position:relative; background-size:150% 200px;">
                    <div class="kt-portlet__head kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>

                    </div>
                    <div class="kt-portlet__body">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-2">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    <div class="kt-widget3__user-img">
                                        @if($user->avatar_location != '')
                                        <a href="{{ url('/social/'.$user->username) }}">
                                        <img style="border:3px solid white;" id="prof_loc" class="kt-widget__img kt-hidden-" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                                        </a>
                                            @else
                                            <div class="kt-widget3__user-img">
                                            <a href="{{ url('/social/'.$user->username) }}">
                                            <img style=" border:3px solid white;" id="prof_loc" class="kt-widget__img kt-hidden-" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                                             </a>
                                                {{--{{$user->first_name[0]}} {{$user->last_name[0]}}--}}
                                            
                                            </div>
                                            @endif
                                       
                                    </div>
                                </div>
                                <div class="kt-widget__info">
                                    <a href="{{ url('/social/'.$user->username) }}" class="kt-widget__username" style="color:black;">
                                        {{$user->first_name}} {{$user->last_name}}
                                    </a>
                                    <span class="kt-widget__desc" style="color:black;">
                                        {{$user->dettagli->ruolo}}
                                    </span>   
                                </div>                                
                            </div>
                            
                            </br>
                            
                            
                            </br>
                            
                            
                            
                          {{--  <div>
                             @if(!empty($user->dettagli->comuni))
  				<div style="margin: 0 auto; display: table; float:left;">
   					@foreach($user->dettagli->comuni as $comune)
   
   						<span class="badge badge-sm badge-light" id="posizioni" style="background-color:transparent; color:black; border-radius:30px; box-shadow: 1px 1px 3px 3px #F7F5F8; margin: 5px;">
   						<i style="color:red;"class="fa fa-map-marker-alt"></i> {{$comune->nome}}</span>
   
   					@endforeach
   				</div>
  			     @endif
   			    </div>  --}}
                             
                             
                             



    
{{--
<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid">


              
<button class="tablink" onmouseover="openPage('Home', this, '#5D78FF')" id="defaultOpen"><i class="material-icons nav__icon" id="ico_side" style="color:white;">place</i></button>
<button class="tablink" onmouseover="openPage('News', this, '#5D78FF')"><i class="material-icons nav__icon" id="ico_side" style="color:white;">group</i></button>
<button class="tablink" onmouseover="openPage('Contact', this, '#FFF200')"><i class="material-icons nav__icon" id="ico_side" style="color:white;">stars</i></button>
<button class="tablink" onmouseover="openPage('About', this, '#5D78FF')"><i class="material-icons nav__icon" id="ico_side" style="color:white;">public</i></button>

	<div id="Home" class="tabcontent">
	</div>

	<div id="News" class="tabcontent"> 
	</div>

	<div id="Contact" class="tabcontent">
	</div>
 
	<div style="color:black;" id="About" class="tabcontent">
  		<h3>Informazioni</h3>
  		</br>
  		{!! clean($user->dettagli->descrizione) !!}
   		@if(isset($campagna->categorie))                               
   		@foreach($campagna->categorie as $categoria)
    		<span class="kt-badge kt-badge--unified-brand  kt-badge--inline" style="height: 30px;text-align: center; float:center;">{{$categoria->nome}}</span>
   		@endforeach
   		@endif
   		</br>
	</div>
                       
                
</div>   

--}}

                            <div class="kt-widget__body">
                                <div class="kt-widget__section">
        
                                </div>
                            </div>
                            
                            </div>
                            <div class="col-xl-12">
                @include('frontend.influencer.recensioni')
            </div>
            <div class="col-xl-12">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{__('applicazione.campagne_attive')}}
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect id="Rectangle-10" x="0" y="0" width="24" height="24"></rect>
                                    <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" id="Path-3" fill="#000000"></path>
                                   <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    
                   
                    
                    <div class="kt-portlet__body">
                        @if( count($user->richieste) > 0 )


                        <?php
//                                $days_tot = round((strtotime($richiesta->campagne->data_fine) - strtotime($richiesta->campagne->data_inizio)) / (60 * 60 * 24));
//                                $days_since_start = round((time() - strtotime($richiesta->campagne->data_inizio)) / (60 * 60 * 24));
//                                $days_perc = ($days_since_start / $days_tot) * 100;
//                                $days_perc = ($days_perc > 100) ? 100 : $days_perc;
                        ?>
                        <div class="kt-section kt-section--space-md">
                            <div class="kt-widget24 kt-widget24--solid">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <a href="#" class="kt-widget24__title" title="Click to edit">
                                            {{__('applicazione.numero_campagne')}}
                                        </a>
                                        <span class="kt-widget24__desc">

                                        </span>
                                    </div>
                                    <span class="kt-widget24__stats kt-font-brand">

                                        {{count($user->richieste)}}
                                    </span>
                                </div>
                            </div>
                        </div>

                        @else
                        {{__('applicazione.no_campagne')}}
                        @endif

                    </div>
                </div>
            </div>

        </div>

                       

                        <!--end::Widget -->

                        <!--begin::Navigation -->


                        <!--end::Navigation -->
                    </div> 
                </div>
              </div>
             
              

              
 
                              

            
        
        

</br></br>


    </div>
    



              

    @endsection
