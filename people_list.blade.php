<style>

    .modal-content{
        border-radius:25px;
    }


    #loadOverlay{display: none;}
    
</style>



@if(count($user_list) == 0)
   <div style="border-radius:25px; display:table; margin-left:auto; margin-right:auto; width:305px;"><p style="padding:20px;"></p></div>
@else
    @php($i = 0)
    @foreach($user_list as $friend)
        <a href="javascript:;" id="chat-people-list-{{ $friend['user']->id }}" onclick="showChat({{ $friend['user']->id }})" class="friend @if($friend['user']->id == $active_user_id){{ 'active' }}@elseif($friend['new']){{ 'new-message' }}@endif">
        
            <div class="circle"></div>
            <div class="image">
            
                @if($friend['user']->avatar_location)
                                                            
                    <img id="side_chat_avatar" src="{{asset('storage/'.$friend['user']->avatar_location)}}" class="media-object img-circle" style="margin-left:10px; max-height: 40px; max-width:40px; border-radius:20px;"/>
                                                           
                    @else
                                                            
                    <img id="side_chat_avatar" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" class="media-object img-circle" style="margin-left:10px; max-height: 40px; max-width:40px; border-radius:20px;"/>
                                                            
                @endif
                       
            </div>

            <div class="mess_hide" class="detail">
           
               {{-- <strong>{{ $friend['user']->name }}</strong> --}}
                <span id="message_snippet">{{ str_limit($friend['message']->message, 20) }}</span>
                <small id="time_snippet">{{ $friend['message']->created_at->diffForHumans() }}</small>

            </div>

            @if($i == 0)
                <input type="hidden" name="people-list-first-id" value="{{ $friend['user']->id }}" />
            @endif
            
        </a>
        @php($i++)
    @endforeach
@endif

</br>