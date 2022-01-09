@extends('frontend.layouts.social')

@section('title', app_name() . ' | Profilo' )

@section('content')



<style>


ul{
    list-style-type: none;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 80vw;
    padding: 0;
}

li {
    background-color:transparent;
}

#follow_deny_group{
       display: flex;
    flex-direction: column;
    align-content: center;
    align-items: center;
}

#follow_deny_group .btn.btn-default {
    height: 40px;
    font-size: 18px;
    width:300px;
    border: 2px solid #F7F5F8;
    background-color: white;
}

#follow_deny_group .btn {
    height: 40px;
    font-size: 18px;
    width:150px;
    border: 2px solid #F7F5F8;
    background-color: white;
}

#desktop_layout{
    max-width:800px;
}

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile) {
    display: flex;
    flex-direction: column;
   


    box-shadow: -10px 0 8px -8px #F7F5F8, 10px 0 8px -8px #F7F5F8;
}

#mobile_search_function{
    display:none;
}

#kt_desktop{
    width:800px !important; 
    margin-top:-20px;
}

.morecontent span {
    display: none;
    width:70vw;
}

.morelink {
    display: inline;
    width:70vw;
}

#new_modal_avatar_image{
    max-height:120px;
    width:120px;
    border-radius:60px;
    box-shadow: 2px 2px 10px 10px #F7F5F8;
}

#denied_button_block a{
    color:red;
    //border: 2px solid #F7F5F8;
    border-radius: 5px;
    padding: 5px;
    box-shadow:none;
    width: 150px;
}


body{background-color:white;}

    @media screen and (max-width: 1024px) {

        #brief{
            visibility:hidden;
            position:fixed;
            z-index:101;
            width:100vw;
            background-color:white;
            padding:1px;
            font-size:18px;
            display:flex;
            justify-content:center;
            margin-top: -20px;
            //box-shadow: 2px 2px 10px 10px #F7F5F8;
            }
        
    
        #avatar_top{
            height: 30px;
            width: 30px;
            //margin-right:20px;
            border-radius:100%;
            }

        .cardo{
            height:70px;
            padding-left: 10px;
            padding-top:30px;
            display: flex;
            align-items: center;
            //margin-left: 15px;
            margin-bottom: 1px;
            flex-direction: row;
            flex-wrap: nowrap;
                justify-content: space-around;
            background-color:white;
            }
        .panel-body-modal-info {
            display: flex;
    /* padding-left: 0px; */
    /* margin-left: 15px; */
    justify-content: center;
    align-items: center;
    flex-direction: column;
        }
    }

    @media screen and (min-width: 1024px) {
        #brief{
            display:none;
        }
    }

</style>




<div id="brief">
    <div class="cardo" style="width: 100vw;">
    
    {{--
    <div style="position:absolute; display:flex;justify-content: flex-start;width: 50vw; margin-top: 5px;">
     <a href="{{ URL::previous() }}" >
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
    </div>
    --}}
           
                @if($user->avatar_location != '')
                    <img id="avatar_top" class="card-img" src="{{asset('storage/'.$user->avatar_location)}}" alt="Avatar">
                @else
                      <img id="avatar_top" class="card-img"   src="{{url('/')}}/assets/media/icons/socialbuttons/user.png?v=2" alt="Avatar">
                @endif
       
                    <h5 class="card-title" style="font-weight;bold;">
                    @if($user->company == 1)
                        {{ $user->dettagli->azienda_nome }}
                    @else
                        {{ $user->name }}
                    @endif
                     @if($user->verified == 1)
                <img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Verified">
            @elseif($user->gold == 1)
                <img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/v3.png" alt="Verified">
            @elseif($user->staff == 1)
                <img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/v2.png" alt="Verified">
            @endif
                    </h5>
                @if($user->id != 274) 
                     <a href="#" style="color:black;" data-item="{{ $user->id }}" data-toggle="modal" data-target="#blockInfo-{{ $user->id }}"><i class="material-icons nav__icon">more_horiz</i></a>
                @else
                     <a style="visibility:hidden;" href="#"data-item="{{ $user->id }}" data-toggle="modal" data-target="#blockInfo-{{ $user->id }}"><i class="material-icons nav__icon">more_horiz</i></a>
                @endif
                    
        </div>
</div>


<div class="new_row">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
  </div>

<div>
    @include('profile.widgets.head')
</div>

@if($user->id != 274)
<div>
    @include('profile.widgets.social')
</div>

@if($groups_prof->count() > 0)
<div>
    @include('profile.widgets.groups')
</div>
@endif


<div>
    @include('profile.widgets.menu')
</div>
@endif


@if($errors->any())
    <h4>{{$errors->first()}}</h4>
@endif

@if(!$they_blocked_me)
<div>
    @include('widgets.wall_test')
</div>

@else
</br>
</br>
</br>
<div class="new_row">
    <div style="display:flex; justify-content:center; flex-direction:column; align-items: center;">
        <i style="font-size:50px;" class="material-icons nav__icon">lock</i>
        <a href="#" data-item="{{ $user->id }}" data-toggle="modal" data-target="#blockInfo-{{ $user->id }}">
            <i style="font-size:50px; color:black;" class="material-icons nav__icon">more_horiz</i>
        </a>
    </div>
  
        </div> 
    </div>

@endif

<!-- Modal -->
<div id="blockInfo-{{$user->id}}" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">{{$user->username}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">
            <div style="margin-left:0px;" id="new_post_box_height">
                <div class="panel-body-modal-info">
                </br>
                </br>
                <div style="display:flex; justify-content:center;">
                @if($user->avatar_location != '')
                    <img id="new_modal_avatar_image" class="card-img" src="{{asset('storage/'.$user->avatar_location)}}" alt="Avatar">
                @else
                      <img id="new_modal_avatar_image"  class="card-img" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png?v=2" alt="Avatar">
                @endif
                </div>
                </br>
                <div id="follow_deny_group">
                  <div>
                      {!! sHelper::followButton($user->id, Auth::id(), '.profile-follow-b1') !!}
                  </div>
                    
                    @if(Auth::user()->id != $user->id)

                  
                    @if($i_blocked_them)
                    
                       <form action="{{ url('user/unblock')  }}" method="post">
                            @csrf
                            <input type="hidden" id="blocked_id" name="blocked_id" value="{{$user->id}}">
                            <button style="color:red!important; font-size:18px; text-align:center; margin-top:50px; padding:5px; border:2px solid #F7F5F8; width:150px" class="btn btn-secondary"><i style="color:black" class="material-icons nav__icon" id="bookmark">block</i> Unblock</button>
                        </form>

                    @else

                        <button style="color:red!important; font-size:18px; text-align:center; margin-top:50px; padding:5px; border:2px solid #F7F5F8; width:150px" class="btn btn-secondary" data-toggle="modal" data-target="#blockModal-{{$user->id}}"><i style="color:black" class="material-icons nav__icon" id="bookmark">block</i> Block</button>
                                   
                    @endif  
                      
                    
                    <button style="color:red!important; font-size:18px; text-align:center; margin-top:50px; padding:5px; border:2px solid #F7F5F8; width:150px" class="btn btn-secondary" data-toggle="modal" data-target="#reportModal-{{$user->id}}"><i style="color:black" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button>
                       
                    @endif
                    </div>
                </div>

    @if($my_profile)
      <div style="display:flex; justify-content:center; flex-wrap: wrap;">
             @if(Auth::user()->company == 1)
            <div class="card_menuselect">
                <a  style="color: black;" href="{{url('/')}}/link-account"> <i id="this_icon" class="material-icons nav__icon" >storefront</i>@lang('applicazione.negozi')</a>
               </div>
            @else
            <div class="card_menuselect">
                <a  style="color: black;" href="{{url('/')}}/richieste"> <i id="this_icon" class="material-icons nav__icon" >arrow_circle_down</i>@lang('applicazione.ricevuto')</a>
               </div>
            @endif
              <div  class="card_menuselect">
                <a style="color: black;" href="{{url('/')}}/profilo/categoria"><i id="this_icon" class="material-icons nav__icon">category</i>@lang('applicazione.categorie')</a>
                </div>
                <div class="card_menuselect">
                <a  style="color: black;" href="{{url('/')}}/groups"><i id="this_icon" class="material-icons nav__icon">group</i>@lang('applicazione.gruppi')</a>
              </div>
                
              <div  class="card_menuselect">
                <a style="color: black;" href="{{url('/')}}/profilo/completa/modifica"><i id="this_icon" class="material-icons nav__icon">create</i>@lang('applicazione.modifica')</a>
                </div>

                <div class="card_menuselect">
                <a  style="color: black;" href="{{url('/')}}/social_accounts"> <i id="this_icon" class="material-icons nav__icon" >public</i>@lang('applicazione.presenza_online')</a>
               </div>

                <div class="card_menuselect">
                <a  style="color: black;" href="{{url('/')}}/account"><i id="this_icon" class="material-icons nav__icon">lock</i>@lang('applicazione.account')</a>
              </div>
      </div>
      

    @endif 
                </br>
                </br>
                </br>
                </br>
              
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="blockModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title" id="exampleModalLabel">Block</h5>
      </div>
      <div class="modal-body">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            Sei sicuro?
            
        </div>
        <p style="color:black;">
                <strong>{{$user->username}}</strong> non potrà vedere i tuoi post o inviarti messaggi
            </p>
        </br>
            <form action="{{ url('user/block') }}" method="post" style="display: flex; justify-content: center; flex-direction: column;">
                @csrf
                <input type="hidden" id="blocked_id" name="blocked_id" value="{{$user->id}}">
                </br>
                <button type="submit" class="btn btn-secondary" style="color:#e72b38; display: flex;justify-content: center; font-weight:bold; border:2px solid  #F7F5F8;"><i style="color:#e72b38;" class="material-icons nav__icon" id="bookmark">block</i> Block</button>
                </br>
            </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reportModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title" id="exampleModalLabel">Segnala</h5>
      </div>
      <div class="modal-body">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
            Sei sicuro?
        </div>
        </br>
            <form action="{{ url('user/report') }}" method="post" style="display: flex; justify-content: center; flex-direction: column;">
                @csrf
                <input type="hidden" id="reported_id" name="reported_id" value="{{$user->id}}">
                <textarea id="reason" name="reason" placeholder="Motivo?.." style="padding: 10px;border: 2px solid #F7F5F8;"></textarea>
                </br>
                <button type="submit" class="btn btn-secondary" style="color:#e72b38; display: flex;justify-content: center; font-weight:bold; border:2px solid  #F7F5F8;"><i style="color:#e72b38;" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button>
                </br>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div id="findModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Location</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
        </div>
        <div class="modal-body">
            <div style="margin-left:0px;" id="new_post_box_height">
                <div class="panel-body">
                    <form style="overflow-x:hidden; width:100%;" id="form-profile-information">
                            <input type="hidden" value="" name="map_info" class="map-info">
                            <div class="form-group">
                                <label>Location:</label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                            <input type="text" class="form-control location-input" readonly value="{{ $user->getAddress() }}" aria-describedby="basic-addon1">
                                            <input type="hidden" value="" name="map_info" class="map-info">
                                        </div>
                                    </div>
                                    <div class="col-md-12 map-place"></div>
                                </div>
                                <div class="clearfix"></div>
                                <a href="javascript:;" onclick="findLocation()">Re-Find My Location</a>
                            </div>
                            </br></br></br></br></br></br></br>
                            <div class="row">
                                <div class="col-xs-6">
                                </div>
                                <button style="margin-left:40%;" id="big_close_button" type="button" class="btn btn-default btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                                    <i id="image_button_id_logo" class="material-icons md-12">close</i>
                                </button>
                                <div class="col-xs-4"> 
                                    <button type="button" class="btn btn-success" onclick="saveInformation()">Save</button>
                                </div>
                            </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection


@push('after-scripts')


    <script type="text/javascript">
        @if ($can_see)
            WALL_ACTIVE = true;
            fetchPost(1,0,{{ $user->id }},5,-1,-1,'initialize');
        @endif
    </script>


    <script>

    function myOpenFunction() {
        var x = document.getElementById("myDIV");

        if (x.style.display === "none") {
            x.style.display = "block";
            } else {
            	x.style.display = "none";
            }
    }
    
    $(document).ready(function() {
    // Configure/customize these variables.
	    var showChar = 49;  // How many characters are shown by default
	    var ellipsestext = "...";
	    var moretext = "più";
	    var lesstext = "...meno";
	    

	    $('#full_screen_bio').each(function() {
		var content = $(this).html();
	 
		if(content.length > showChar) {
	 
		    var c = content.substr(0, showChar);
		    var h = content.substr(showChar, content.length - showChar);
	 
		    var html = c + '<span style="color:#0645AD;" class="moreellipses">' + ellipsestext + '</span><span class="morecontent"><span>' + h + '</span><a href="" class="morelink">'+ moretext + '</a></span>';
	 
		    $(this).html(html);
		}
	 
	    });
	 
	    $(".morelink").click(function(){
		if($(this).hasClass("less")) {
		    $(this).removeClass("less");
		    $(this).html(moretext);
		} else {
		    $(this).addClass("less");
		    $(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	    });
	});
    
    </script>
   
   
<script>
if ($(window).width() < 1024) {
$(window).scroll(function() {

    if ($(this).scrollTop()>200)
    {  
        //$('#brief').slideDown("fast");
        $('#brief').fadeIn("fast");
        $('#brief').css({
                visibility: 'initial',
            });
        
    }
    else
    {
        //$('#brief').slideUp("fast");
        $('#brief').fadeOut("fast");
        $('#brief').css({
                visibility: 'hidden'
            });
    }
});
}
</script>
<script>

//window.onload = function () {
//  window.scrollTo(1, 1);
//}

</script>

@endpush

