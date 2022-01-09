@extends('frontend.layouts.interna')

@section('title', app_name() . ' | Richieste' )

@section('content')
@push('after-styles')


@endpush

@push('after-scripts')

@endpush



<style>

.row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: 50px;
        //box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:10px;
    }

 .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    .im{ 
        position: relative;    
        z-index: 1;       
    }

{{-- full screen --}}
    @media screen and (min-width: 1024px) {

        .container {
            //margin-top:-70px;
            display: flex;
            align-items: center;
            justify-content: center;
            //height: 200px;
            }

        .social {
            position: relative;
            display: inline-block;
            float: left;
            padding: 10px;
            }

        .im{
    	    height: 50px;
            width: 50px;
            border-radius: 25px;
            box-shadow: 2px 2px 10px 10px #F7F5F8;
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
    @media screen and (max-width: 1024px) {

      #desktop_layout{
        margin-top:0px;
      }

        #mobile_header_style{
        display:none;
      }

         .kt-portlet{
            margin-top:60px;
        }

        .container {
            margin-top:20px;
            display: flex;  
            flex-wrap: wrap;
            table-layout: fixed;
            align-items: center;
            justify-content: center;
            //height: 200px;
            }

        .social {
            position: relative;
            display: inline-block;
            float: center;
            padding: 10px;
            }

        .im{
    	    height: 40px;
            width: 40px;
            border-radius: 20px;
            box-shadow: 2px 2px 10px 10px #F7F5F8;
            margin-top:-50px;
            margin-left: auto;
            margin-right: auto   
            }

        #sup_pan{
            margin-top:-100px;
        }
    
    }

    .im:hover{
    	cursor: pointer;
    }

</style>

<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <!-- begin:: Content -->        
    <div id="sup_pan" class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-xl-12" >
                <div class="row_1">
                    <div style="display:flex; font-size:24px; font-weight:bold;">
                        <a href="{{ URL::previous() }}">
                            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
                        </a>
                        @lang('Ricevuto')
                    </div>
                    <div>
                        <i style="visibility:hidden; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">support_agent</i>
                    </div>
                </div>
                <!--begin::Widget -->     	
                <div class="kt-widget kt-widget--user-profile-2">
                    <div class="kt-widget__head">
                        <div class="container">
                            @if($campagne->isNotEmpty())
                                @foreach($campagne as $campagna)
                                    @if($loop->first || ($loop->index % 4 == 1 && $loop->index != 1))
                                    @endif
                                    @include('frontend.campagne.boxcampagne')
                                    @if($loop->last || ($loop->index%4 == 0 && !$loop->first))
                                    @endif
                                @endforeach
                                {{ $campagne->links() }}
                            @else
                                <div class="new_row">
                                    @if($user->avatar_location != '')
                                        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
                                    @else
                                        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                                    @endif
                                    </br>
                                    <p style="font-size:20px; text-align:center; color:black;" class="card-text">Benvenuto in Campagne</p>
                                    <p style="padding:50px; font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text">Quando ricevi una campagna dalle aziende che hanno trovato interessante il tuo profilo, la trovi qui e puoi iniziare a communicare con loro.</p>
                                </div>
                                {{--@include('includes.partials.empty',['element'=>__('applicazione.no_richieste')])--}}
                            @endif
                        </div>  
                    </div>
                </div>                      
            </div>
        </div>
    </div>                             
</div>

      

@endsection
    
                
     