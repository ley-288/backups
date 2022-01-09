@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Gruppi'))

@section('content')

@push('after-styles')
<style>

#verified_img_sm_group_admin{
    height:15px;
    width:15px;
}

#mobile_search_function{
    display:none;
}

tbody{
    display:flex; align-items:center;justify-content: space-between;
}

body{background:white;}

#desktop_layout{
    margin-top:-30px;
}

body.modal-open {
        overflow: hidden !important;
        margin-top:11% !important;
    }
    
.group_title{
    margin-top:-40px;
    margin-left:10px;
    margin-bottom:10px;
}

.group_button{
    height:60px;
    width:60px;
    border-radius:30px;
    border:1px solid lightgray;
    color:black;
    background:white;
    margin-left:10px;
    margin-right:10px;
}

.group_admin{
    height:60px;
    width:60px;
    border-radius:30px;
    border:2px solid #5979FB;
    margin-top:-15px;
    box-shadow: 2px 2px 10px 10px #F7F5F8;
}

.scrollmenu_group{
    position:absolute;
        margin-left:140px;
        margin-top:-64px;
        display: flex;
        overflow-x: auto;
        overflow-y: hidden;
        white-space: nowrap;
        max-width: 100vw;
        justify-content: flex-start;
        flex-wrap: nowrap;
        flex-direction: row;
}

.scroll_users{
    max-height:60px;
    max-width:60px;
    border-radius:30px;
    object-fit:cover;
    border:2px solid #5979FB;
    margin-left:10px;
    //box-shadow: 2px 2px 10px 10px #F7F5F8;
}

#add_to_group{
    padding:1px;
    height:20px;
    width:20px;
    border-radius:10px;
    border:1px solid lightgray;
    color:black;
    background:white;
    margin-left:10px;
}

#remove_from_group{
    padding:1px;
    height:20px;
    width:20px;
    border-radius:10px;
    border:none;
    color:white;
    background:red;
}

.group_remove_text{
    margin-top:10px;
}

#posts_in_group{
    margin-left:-15px;
    margin-top:100px;
}

@media screen and (max-width: 1024px){

  #mobile_header_style{
        display:none;
      }
      
.btn-group_2{
    position:absolute;
    margin-top:20px;
    width:100vw;
    margin-left:0px;
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    flex-direction: row;
}
}

@media screen and (min-width: 1024px){

    #groupPost .modal-body{
        margin-top:130px;
    }

    .btn-group_2{
    position:absolute;
    margin-top:20px;
    //width:100vw;
    //margin-left:-45px;
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    flex-direction: row;
    }
}



.btn-secondary{
    border:none !important;
    box-shadow:none;
}

.btn-alert{
    padding:10px;
    border:2px solid #F7F5F8;
    box-shadow:none;
    border-radius:5px;
    background-color:white;
    color:black;
    width:100px;
    //margin:55px;
}

.btn-default{
    padding:10px;
    border:none !important;
    box-shadow:none;
    border-radius:5px;
    background-color:white;
    color:black;
    width:50px;
    margin:5px;
}

.row{
    display:flex;
    justify-content:center;
}


</style>

@endpush

    
<div>
    <div>
        <div>
            <div class="group_title">
                @if(!empty($group->hobby->category)) {{ $group->hobby->category }}@endif - {{ $group->hobby->name }}
                </br>
                {{ $group->countPeople() }}  Members
            </div>
        </div>  
                   
            <div>
                <div>
               
                    @if($group->hobby->admin_id == Auth::user()->id || $group->hobby->default == 1) 
                       
                        <button class="group_button" type="button" data-toggle="modal" data-target="#userListModal"><i class="material-icons nav__icon">add</i>
                        
                    @else
                    <button class="group_button" type="button"><i class="material-icons nav__icon">group</i>
                    @endif
                    </button>
                    <a href="{{ url('/social/'.$group->hobby->admin_username) }}">
                        <img class="group_admin" src="{{asset('storage/'.$group->hobby->admin_photo)}}">
                    </a>
                </div>
                <div style="height:95%; background-color:transparent; border:1px solid transparent;" class="dm">
                    <div style="border:1px solid transparent; overflow-x:hidden;" class="friends-list">
                    </div>
                    <div class="chat">
                    </div>
                </div>
            </div>
    </div>
    <div>
               

        @if($errors->any())
            
        @endif
        <div>
         </div>
    </div>
</div>

        <div>
            <div class="btn-group_2">
                @if($user->hasHobby($group->hobby_id)) 
                    <a href="#" data-toggle="modal" data-target="#groupPost"><button class="btn-alert">Post</button></a>
                    @if($group->hobby->admin_id != Auth::user()->id)<button class="btn-alert remove" onclick="{{'removeUserFromGroup('.$user->id.','.$group->id.')'}}">Leave</button>@endif
                @endif
                @if($group->hobby->admin_id != Auth::user()->id)<a href="{{ url('/direct-messages/show/'. $group->hobby->admin_id) }}"><button class="btn-alert">Contact</button></a>@endif
            </div>
        </div>

<div class="scrollmenu_group">  
    @foreach($members as $user)
    @if($group->hobby->admin_id != $user->id)
        <!-- start for members div -->
        <div class="membersList">
            <a href="{{ url('/social/'.$user->username) }}">
                @if($user->avatar_location != "")
                <img class="scroll_users" style="border:none;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Immagine profilo">
                @else
                <img class="scroll_users" style="border:none;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Immagine profilo">
                @endif
                @if($user->verified == 1)<img id="verified_img_sm_sugg" src="{{url('/')}}/assets/media/icons/socialbuttons/octagonal_star.png" alt="Recensioni">@endif
            </a>    
        </div>
        <!-- end for members div -->
    @endif
    @endforeach

 
</div> 
               


<div id="posts_in_group">
    @include('widgets.wall_group')
</div>


<div style="margin-top:-10px;" class="modal fade " id="userListModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div style="border-radius:25px;" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="no_show_new_message" class="modal-title">Aggiungi al gruppo</h5>
            </div>
            <div class="user_list">
                <div class="form-group">
                    <input style="border-radius:25px;" type="text" class="form-control" id="modal-search"  onkeyup="searchUserList()" placeholder="Seleziona tra i tuoi Spiders..">
                </div> 
                @foreach($user_list->get() as $f)
                @if($f->follower->hasHobby($group->hobby_id))
                    @csrf
                        <table id="modal-table">
                            <tr>
                                <td>                                                    
                                    <div id="user_photo" class="image">
                                        @if($f->follower->avatar_location)                                                            
                                                <img src="{{asset('storage/'.$f->follower->avatar_location)}}" class="img-circle" style="max-height:40px; margin-right:10px;" />                                                           
                                            @else      
                                                <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" class="img-circle" style="height:40px; margin-right:10px;"/>                                                         
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>                                              
                                    </td> 
                                </tr>
                                <tr>   
                                    <td>
                                     @if($f->follower->hasRole('brand')) {{ $f->follower->dettagli->azienda_nome }} @else {{ $f->follower->name }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>  
                                        <button id="remove_from_group" type="submit" onclick="{{'removeUserFromGroup('.$f->follower->id.','.$group->id.')'}}"><i id="addicon_menu" class="fa fa-minus"></i></button> 
                                    </td>
                                </tr>
                                <hr>
                                </br>
                            </table>    
                        
                        @else

                        <form action="/group/{id}/save/group" method="POST">
                    @csrf
                        <table id="modal-table">
                            <tr>
                                <td>                                                    
                                    <div id="user_photo" class="image">
                                        @if($f->follower->avatar_location)                                                            
                                                <img src="{{asset('storage/'.$f->follower->avatar_location)}}" class="img-circle" style="max-height:40px; margin-right:10px;" />                                                           
                                            @else      
                                                <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" class="img-circle" style="height:40px; margin-right:10px;"/>                                                         
                                            @endif
                                        </div>
                                        <div class="clearfix"></div>                                              
                                    </td> 
                                </tr>
                                <tr>   
                                    <td>
                                     @if($f->follower->hasRole('brand')) {{ $f->follower->dettagli->azienda_nome }} @else {{ $f->follower->name }} @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>  
                                        @if($group->countPeople() < 10)
                                       
                                            <input style="display:none;" name="group" value="{{ $group->hobby->id }}">
                                            <input style="display:none;" name="person" value="{{ $f->follower->id }}">                                                        
                                            <button id="add_to_group" type="submit"><i id="addicon_menu" class="fa fa-plus"></i></button>  
                                        
                                        @endif
                                    </td>
                                </tr>
                                <hr>
                                </br>
                            </table>    
                        </form>
                        @endif
                @endforeach   
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="groupPost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="margin-left:0px;" id="new_post_box_height" class="panel panel-default new-post-modal">
                    <form style="overflow-x:hidden; width:100%;" id="form-new-post">
            <input type="hidden" name="group_id" class="group_id" id="group_id" value="{{ $group->id }}">
            
           
                <div class="image-area" style="margin-top:30px;">
                    <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                        <img src=""/>
                </div>

                </br>
                <textarea style="height:100px; width:100%; border-radius:25px;" rows = '8' name="content" class="content" placeholder="@lang('applicazione.cosa_stai_pensando')"></textarea>
                </br>
                <textarea style="height:100px; width:100%; border-radius:25px;" rows = '4' name="link" class="link"  placeholder="@lang('applicazione.condividi_qui_video')"></textarea>
                </br>
                <textarea style="height:40px; width:100%;" rows = '2' name='location' class='form-control' placeholder='Location'></textarea>
                </br>
               
                </br></br></br>

                    <div class="row">
                        <div class="button-row">
                            <button type="button" class="btn btn-default btn-sm" onclick="uploadPostImage()">
                                <i class="material-icons md-12">photo_camera</i>
                            </button>
                                <input type="file"  class="image-input" name="photo" onchange="previewPostImage(this)">
                        

                             <button type="button" class="btn btn-default btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                                <i class="material-icons md-12">close</i>
                            </button>
              
                       
                            <button type="button" class="btn btn-default btn-sm" onclick="groupPostModal();">
                                <i class="material-icons md-12">send</i>
                            </button>
                      
                        <div style="border-radius:25px; background-color:transparent;" id="loading">
                            <img id="loading-image" src="{{url('/')}}/assets/images/loading.gif" alt="Loading..." />
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
        WALL_ACTIVE = true;
        fetchPost(2,0,{{ $group->id }},10,-1,-1,'initialize');
    </script>

    <script src="{{url('/')}}/assets/js/group.js?v=1.2"></script>

    <script>
        window.onload = function () {
            window.scrollTo(1, 1);
        }
    </script>
    
@endpush