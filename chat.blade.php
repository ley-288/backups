
<style>

#form-message-write textarea::-webkit-input-placeholder {
        font-style: normal;
    }

#backbutton_mess{
    position:absolute;
    margin-top:2px !important;
    margin-left:-20px !important;
}

.btn-light{
    border:none !important;
    }

#more_info_btn{
    position:absolute;
    background-color:transparent;
    color:white;
    font-size:28px;
    border:none;
    margin-left:130px;
    margin-top:-10px;
}

@media screen and (max-width: 1024px){

    #user_info_bar{
        width: 100vw;
        display: flex;
        padding: 10px;
        justify-content: space-between;
        align-items: center;
    }

    #send_message_button{
        margin-bottom:3px; 
        margin-right:-7px;
        background-color:#5979FB;
        color:white;
        padding:8px;
        border-radius:5px;
        //background-image: linear-gradient(to bottom right, #F7F5F8, #F7F5F8, white);
    }

    #foto_send{
    //position: absolute;
    z-index: 1;
    /* margin-top: 15px; */
    //border: 2px solid #F7F5F8;
    height: 50px;
    width:50px;
    padding: 10px;
    color:white;
    border-radius: 5px;
    background-image: linear-gradient(#e72b38, #e72b80);
    display:flex;
    flex-direction:column;
    justify-content:center;
    }

    .bottom_when_typing{
        bottom:0;
    }
}

@media screen and (min-width: 1024px){
    #send_message_button{
        margin-bottom:5px; 
        background-color:white;
        //background-image: linear-gradient(to bottom right, #F7F5F8, aliceblue, red);
        padding:8px; 
        border-radius:25px;
    }   

    #foto_send{
    //position: absolute;
    z-index: 1;
    /* margin-top: 15px; */
    //border: 2px solid #F7F5F8;
    height: 50px;
    width:50px;
    padding: 10px;
    color:white;
    border-radius: 5px;
    background-image: linear-gradient(#e72b38, #e72b80);
    display:flex;
    flex-direction:column;
    justify-content:center;
    }
}

</style>


<div id="space_between_top_and_box"></div>

<input type="hidden" name="chat_friend_id" id="friend_id" value="{{ $friend->id }}">

<div id="user_info_bar" style="padding:10px;"  class="chat-info">

<div id="chevron_info_together">
<div id="backbutton_mess" class="row">

    <div class="col-xl-12">
        <a href="{{ URL::previous() }}" class="btn btn-light"  style="background-color:transparent;">
            <i style="font-size:30px; color:red;" class="material-icons nav__icon">chevron_left</i>
        </a> 
    </div>
</div>
    
        <div>
        @if($friend->avatar_location)
            <a href="{{ url('/social/'.$friend->username) }}">
                <img src="{{asset('storage/'.$friend->avatar_location)}}" style="margin-left:40px; height: 40px; width:40px; border-radius:20px; border:1px solid white; margin-right:5px; object-fit:cover;"/>
            </a>
                @if($friend->hasRole('influencer'))                                 
                    @if($friend->verified == 1)
                        {{ $friend->name }}<img id="verified_img_sm_mess_head" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                    @else
                        {{ $friend->name }}</h3>
                    @endif  
                @endrole

                @if($friend->hasRole('brand'))                          
                    @if(! empty($friend->dettagli->azienda_nome))
                        @if($friend->verified == 1)
                            {{ $friend->dettagli->azienda_nome }}<img id="verified_img_sm_mess_head" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                        @else
                            {{ $friend->dettagli->azienda_nome }}
                        @endif
                    @else
                        {{ $friend->name }}
                    @endif
                @endrole            
            

        @else
   
            <a href="{{ url('/social/'.$friend->username) }}">
                <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" style="margin-left:40px; max-height: 30px; max-width:30px; border-radius:15px; margin-right:5px;"/>
            </a>
                @if($friend->hasRole('influencer'))                                    
                    @if($friend->verified == 1)
                        {{ $friend->name }}<img id="verified_img_sm_mess_head" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                    @else
                        {{ $friend->name }}</h3>
                    @endif  
                @endrole

                @if($friend->hasRole('brand'))
                    @if(! empty($friend->dettagli->azienda_nome))
                        @if($friend->verified == 1)
                            {{ $friend->dettagli->azienda_nome }}<img id="verified_img_sm_mess_head" src="{{url('/')}}/assets/media/icons/socialbuttons/v1.png" alt="Recensioni">
                        @else
                            {{ $friend->dettagli->azienda_nome }}
                        @endif
                    @else
                        {{ $friend->name }}
                    @endif
                @endrole
            
        @endif
        </div>
    </div>

   <div>
        <a id="button_transparent_test" href="#" data-toggle="modal" data-target="#menuModal-{{$friend->id}}">
                <i id="icon" class="material-icons nav__icon" style="color: black">more_horiz</i>
            </a>
        </div>


    {{--
    <div id="personal_panel" style="position:absolute; margin-top:15px; width:97vw; background-color:aliceblue;box-shadow: 2px 2px 10px 10px #f7f5f8;">
        <textarea id="personal_message" style="border-radius:5px; background-color:white; padding-top:10px; padding-bottom:0px; padding-left:10px; border:none; box-shadow:none;" class="form-control" placeholder="@lang('applicazione.tuoi_messaggio')"></textarea> 
        <a href="javascript:;" id="send_message_arrow" class="sendMSGLinkClass remove pull-right" onclick="sendMessage(event)" style="margin-bottom: 55px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Invia</a>
    </div>
    --}}
</div>




<div id="chat_box_height" style="margin-bottom:5px; background-color:white; padding-top:10px; padding-left:10px; padding-right:10px;"  class="message-list">
    </br></br></br>
    @php($first_message_id = 0)
    
        @php($i=0)
        @foreach($message_list->get()->reverse() as $message)
            
                @include('messages.widgets.single_message')
            @if($i == 0)
                @php($first_message_id = $message->id)
            @endif
            
            @php($i++)
        @endforeach
  

   
    <div class="first_message_div">
        <input type="hidden" name="first_message_id" value="{{ $first_message_id }}">
    </div>  

</div>


<div class="bottom_when_typing">

<div id="message_write_box" class="message-write">
    <form id="form-message-write">
        <input type="hidden" name="user_id" value="{{ $friend->id }}">
        @if ($can_send_message)
           @if(!$they_blocked_me)
            <a href="#" data-toggle="modal" data-target="#messageImage" id="foto_send" class="pull-right" style="margin-right: 20px;"><i id="image_button_id_logo" class="material-icons" style="color:white; margin-left: 3px;">edit</i></a>
            @endif
            {{--
            <textarea id="personal_message" style="border-radius:5px; background-color:white; padding-top:10px; padding-bottom:0px; padding-left:10px;" class="form-control" placeholder="@lang('applicazione.tuoi_messaggio')"></textarea>
            
            
            <a href="javascript:;" id="send_message_arrow" class="sendMSGLinkClass remove pull-right" onclick="sendMessage(event)" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">Invia</a>
            --}}
        @else
            <div class="alert alert-danter">You must follow each other to send messages!</div>
        @endif
        
    </form>
</div>

</div>


<div id="space_between_bottom"></div>


<div class="modal fade" id="messageImage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $friend->username }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="margin-left:0px; box-shadow:none;" class="panel panel-default">
                    <form id="form-new-message">
                        @csrf
	                    <div class="modal-body">
	      		            <input type="hidden">
                            <div class="image-area">
                                <a href="javascript:;" id="image-remove-button-modal" class="image-remove-button" onclick="removeMessageImage()"></a>
                                <img src=""/>
                            </div>
                            </br>
                            <div style="display:flex; justify-content:center; flex-direction: column;">

                            <div id="personal" style="display:flex; justify-content:center; margin-bottom:35px;">
                                 <textarea id="personal_message" style="border-radius:15px; height: 150px;     border: 2px solid #F7F5F8;box-shadow: none;padding-top:10px; padding-bottom:0px; padding-left:10px;" class="form-control" placeholder="@lang('applicazione.tuoi_messaggio')"></textarea>
                            </div>


                            <hr>
                            
                                <div style="display:flex; justify-content:space-around;">


                            

                                    <div id="foto_send" class="btn btn-secondary btn-add-image btn-sm" onclick="uploadMessageImage()">
                                        <i  class="material-icons" style="margin-left:3px; color:white;">photo_camera</i>

                                    </div>
                                    
                                
                                <div id="foto_send" class="btn btn-secondary btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                                    <i  class="material-icons" style="margin-left:3px; color:white;">close</i>
                                </div>
                               
                                

                                    <div  id="foto_send" class="btn btn-secondary pull-right btn-submit" onclick="newMessage()">
                                        <i  class="material-icons"style="margin-left:3px; color:white;" >send</i>
                                    </div>
                                
                                

                                </div>
                            </div>
                            <input style="visibility:hidden;" type="file" accept="image/*" class="image-input" name="photo" onchange="previewMessageImage(this)">
	                    </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="menuModal-{{ $friend->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <h5 class="modal-title" id="exampleModalLabel">{{ $friend->username }}</h5>
      </div>
      <div class="modal-body">
</br></br>
      <div style="display: flex;font-weight: bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;justify-content: center;align-content: center;    border: 2px solid #F7F5F8; border-radius:5px; padding: 10px;">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
             <a id="button_transparent_test" href="{{ url('/social/'.$friend->username) }}" style="display: flex;justify-content: center;align-items: center;width: 10vw;">
                <i id="icon" class="material-icons nav__icon" style="color: black; margin-right:10px;">account_circle</i> Profilo
            </a>
        </div>
        </div>
    </br></br>
      <div style="display: flex;font-weight: bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;justify-content: center;align-content: center;   border: 2px solid #F7F5F8; border-radius:5px; padding: 10px;">
        <div style="font-weight:bold;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
             <a id="button_transparent_test" href="#" data-toggle="modal" data-target="#reportModal-{{$friend->id}}" style="display: flex;justify-content: center;align-items: center;width: 10vw;">
                <i id="icon" class="material-icons nav__icon" style="color: black; margin-right:10px;">report</i> Segnala
            </a>
        </div>
        </div>
    
</div>
        </br>
           
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="reportModal-{{ $friend->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="hidden" id="reported_id" name="reported_id" value="{{$friend->id}}">
                <textarea id="reason" name="reason" placeholder="Motivo?.." style="padding: 10px;border: 2px solid #F7F5F8;"></textarea>
                </br>
                <button type="submit" class="btn btn-secondary" style="color:#e72b38; display: flex;justify-content: center; font-weight:bold; border:2px solid  #F7F5F8;"><i style="color:#e72b38;" class="material-icons nav__icon" id="bookmark">report</i> Segnala</button>
                </br>
            </form>
      </div>
    </div>
  </div>
</div>


@push('after-scripts')

<script>
/*
var $htmlOrBody = $('html, body'),
    scrollTopPadding = 8;

$('textarea').focus(function() {
    var textareaTop = $(this).offset().top;
    $htmlOrBody.scrollTop(textareaTop - scrollTopPadding);
}); 
*/
</script>
@endpush