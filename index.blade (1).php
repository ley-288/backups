@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Messaggi'))

@section('content')

@push('after-styles')

<style>

.modal-header{
    border-bottom:none;
}

#userListModal .user_list a{
    border-bottom:none;
}

.btn{
    border-radius:5px !important;
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

    #userListModal .user_list a small{
        font-style:normal;
    }

    .modal .modal-content{
        border-radius:25px;
        margin-top:100px;
    }

    .bootstrap-dialog.type-primary .modal-header{
        display:none;
        color:black;
        background-color:transparent;
        border-radius:25px;
        border:1px solid transparent;
    }

    .modal .modal-content .modal-header .close{
        display:none;
    }

    .btn-danger{
        border-radius:25px;
    }

    .btn{
        border-radius:25px;
    }

    
    #form-message-write{
        position: relative;
    }

    .active{
        border-radius:25px;
    }
    
    @media screen and (max-width: 1024px){

        #desktop_layout{
            //margin-top:-50px;
        }


        .kt-header-mobile{
            display:none !important;
        }

        #kt_body{
            margin-top:-80px;
        }

        #back_here{
            margin-top:-20px;
        }

        #new_message_header{
            display:none;
        }

        #userListModal{
            margin-top:50px;
            }
        
        #space_between_button_and_top{
            margin-top:-25px;
            }

        .phone_message_button{
            position:absolute;
            margin-top:-51px;
            margin-left:5px;
            width:50px;
            height:50px;
            background-color:#5979FB;
            border:1px solid white;
            }

        .no_show_new_message{
            display:none;
            }
        
        #mess_list_uname{
            margin-left:12px;
            }
        
        #icon_menu_in_messages{
            display:none;
            margin-top:-5px;
            }
        
        #verified_img_sm_mess_list{
            position:absolute; 
            height:12px; 
            width:12px; 
            margin-top:2px; 
            margin-left:2px;
            }

        .dm{
            background-color:transparent;
            border:2px solid transparent;
            }

        #space_between_top_and_box{
            margin-top:-65px;
            }

        #seen_message{
            position:absolute;
            margin-left:90vw;
            color:black;
        }

        #seen_message_seen{
            position:absolute;
            margin-left:90vw;
            //color:#5979FB;
            background-image: linear-gradient(#e72b38, #e72b80);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        #seen_message_date{
            position:absolute;
            margin-left:105vw;
            color:black;
            padding-right:5px;
        }

        #seen_message_date_you{
            position:absolute;
            margin-left:115vw;
            color:black;
            padding-right:5px;
        }

        #chat_box_height{
            position:fixed;
            height:90vh;
            width:99vw;
            margin-left:0px;
            margin-top:35px;
            padding-bottom:150px;
            border:none;
            }
        
        #message_write_box{
            position:fixed;
            margin-left:-5px;
            width:103vw;
            bottom:25px;
            height:100px;
            //backdrop-filter: blur(50px);
            //background-color: white;
            background-color:transparent;
            //background-image: linear-gradient(transparent, white);
            }
        
        #personal_message{
            //position:fixed;
            //margin-left:55px;
            //width:80vw;
            //bottom:75px;
            //border-radius:25px;
            //height:40px;
            //max-height:1000px;
            //background-color:white;
            //border:2px solid #F7F5F8;
            //padding-right:65px;
            }
        
        .sendMSGLinkClass{
            position: absolute;
            right: 20px;
            bottom: -30px;
            }

        .friends-list{
            display:none;
            position:absolute;
            max-width:80px;
            height:10px;
            background-color:transparent;
	        margin-left:-25px;
	        margin-right:15px;
            border-radius:25px;
            box-shadow: 2px 2px 10px 10px #F7F5F8;
            }
        
        .dm .friends-list{
            display:none;
        }

        .chat-info{
            position:fixed;
            margin-top:0px!important;
            z-index:10;
            background-color:white;
            color:black;
            width:103vw;
	        margin-bottom:10px;
            //margin-top:-25px;
            margin-left:-5px;
            border-bottom:2px solid #F7F5F8 !important;
            }

        .message-list{
            width:260px;
            margin-left:30%;
	        margin-bottom:10px;
            }

        #message_snippet{
	        display:none;
            }

        #time_snippet{
	        font-size:1px;
	        color:transparent;
            }

        #side_chat_avatar{
	        height:50px;
	        width:50px;
            }

        .dm .chat .chat-info .btn-remove {
            float: right;
            display: block;
            border-radius:15px;
            height:30px;
            width:30px;
            padding-top:5px;
            padding-left:9px;
            }

        .dm .friends-list .friend.active{
            background-color:transparent;
            border:1px solid transparent;
            }

        .dm .friends-list .friend{
            background-color:transparent;
            border:1px solid transparent;
            }

        #space_between_bottom{
            margin-bottom:-90px;
            }
        
        #verified_img_sm_mess_head{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:12px; 
            margin-left:10px;
            }
        
        #mobile_search_function{
            display:none;
        }


    }
    

    

    @media screen and (min-width: 1024px){

        #personal_message{
            margin-left:30px;
            padding-right:85px;
            width: 600px;
        }


        .new-message-button_here{
            display:none;
        }

        #back_here{
            display:none;
        }

        body{
            overflow-y:hidden;
            overflow-x:hidden;
        }

        #userListModal{
            margin-top:80px;
            }

        #space_between_button_and_top{
            margin-top:-50px;
            }

        .phone_message_button{
            width:50px;
            height:50px;
            background-color:#5979FB;
            border:1px solid white;
            margin-top:-100px;
            }
        
        #mess_list_uname{
            margin-left:20px;
            }
        
        #icon_menu_in_messages{
            margin-top:20px;
            }
        
        #verified_img_sm_mess_list{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:4px; 
            margin-left:5px;
            }  
        
        .dm{
            background-color:transparent;
            border:2px solid transparent;
            margin-bottom:50px;
            }

        #chat_box_height{
            border-radius:5px;
            //max-height:90%;
            height:500px;
            width:750px;
            margin-left:30px;
            margin-top:10px;
            border:2px solid #F7F5F8;
            }
        
        #message_write_box{
            border-radius:5px;
            width:750px;
            margin-left:30px;
            background-color:white;
            //border:2px solid #F7F5F8;
            }
        
        .sendMSGLinkClass{
            position: absolute;
            right: 10px;
            top: 10px;
            }

        .chat-info{
            margin-top:-50px;
            color:black;
            background-color:white;
            margin-left:30px;
            width:750px;
            border-radius:5px;
            border:2px solid #F7F5F8 !important;
            }

        .friends-list{
            display:none;
            margin-top:100px;
            max-height:65.9%;
            background-color:white;
	        margin-left:-15px;
	        margin-right:15px;
            border-radius:25px;
            box-shadow: 2px 2px 10px 10px #F7F5F8;
            padding:10px;
            }

        .chat-info{
	        margin-bottom:10px;
            }

        .message-list{
	        margin-bottom:10px;
            }

        .dm .chat .chat-info .btn-remove {
            float: right;
            display: block;
            border-radius:15px;
            height:30px;
            width:30px;
            padding-top:5px;
            padding-left:9px;
            
            }

        .dm .friends-list .friend.active{
            border:1px solid transparent;
            }

        .dm .friends-list .friend{
            border:1px solid transparent;
            }

        #space_between_bottom{
            margin-bottom:-50px;
            }
        
        #verified_img_sm_mess_head{
            position:absolute; 
            height:15px; 
            width:15px; 
            margin-top:6px; 
            margin-left:10px;
            } 
    }

    .btn.btn-wide{
        background-color:transparent;
        color:transparent;
    }

    #new-message-button_here{
        margin-left:30px;
    }

    #phone_message_button_here{
        position:absolute;
        margin-left:0px;
    }


</style>

@endpush


<div id="space_between_button_and_top"></div>
                
<div style="color:transparent;" id="loader">
     Loading...
</div>


    <div class="h-20"></div>
    <div>
        <div id="body_parts"  class="row">

            <div id="icon_menu_in_messages" class="col-md-8">
             
            </div>
          
            <div class="col-md-10">
   
                <div style="margin-bottom:5px;  height:100%; background-color:transparent; border:1px solid transparent;" class="dm">

                    <div class="chat">

                    </div>

                </div>


            </div>
        </div>
    </div>
    


    </br></br>
 

@endsection



@push('after-scripts')
<script>
window.onload = function () {
  window.scrollTo(1, 1);
}
</script>



<script>
//$('.chat').scrollTop($('.chat')[0].scrollHeight - $('.chat')[0].clientHeight);
</script>


    <script type="text/javascript">
        @if($show)
            var initial_dm = 1;
        @else
            var initial_dm = 0;
        @endif
    </script>
    <script src="{{url('/')}}/assets/js/dm.js?v=2.6"></script>
    <script type="text/javascript">
        @if($show)
            $(function() {
                showChat({{ $id }});
            });
        @endif
    </script> 


   
@endpush
