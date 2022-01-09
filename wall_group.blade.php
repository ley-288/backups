@push('after-styles')

<style>

    #margin-left{
        display:none !important;
    }

    .new-post-box {
        background-color:transparent;
        box-shadow:none;
        border:1px solid transparent;
    }

    .new-post-box textarea::-webkit-input-placeholder {
        font-style: normal;
    }

    #hidden_comments{
        display:none;
    }


    #picture_and_post_buttons:hover{
        transition:0.2s;
        transform: scale(1.1);
    }

    @media screen and (max-width: 1024px){

        .new-post-box textarea{
            border-radius:25px;
            padding-top:13px;
            padding-bottom:10px;
            padding-left:10px;
            padding-right:10px;
            width:65%; 
            }
        
        #share_something{
            height:10px;
            max-height:100%;
            margin-top:-100px;
            width:90vw;
            }
            
        #new_post_box_height{
            max-height:100%;
            margin-top:-30px;
            margin-left:50px;
            }

        #send_button_id{
            max-height:30px;
            max-width:30px;
            border-radius:15px;
            }
        
        .material-icons.md-12{ 
            font-size: 18px;
            }

        .button_group{
            margin-left:30px;
            height:50px;
        }

        #sugg_peep_placement{
            margin-top:-75px;
        }

        #suggested_people_feed{
            margin-top:-50px;
        }

        #post_count_prof{
            margin-left:25px;
        }

        .btn{
            border:1px solid #F7F5F8;
            border-radius:5px;
            margin-right:10px;
            margin-top:5px;
        }
    }


    @media screen and (min-width: 1024px){

        #new_post_box_height{
            max-height:1800px;
            margin-top:-150px;
            }

        #share_something{
            margin-left:10px;
            }

        .material-icons.md-12{ 
            font-size: 18px;
            }

        .button_group{
            margin-left:30px;
            height:50px;
        }

        #sugg_peep_placement{
            margin-top:-10px;
        }

        #suggested_people_feed{
            margin-top:-30px;
        }

        #post_count_prof{
            margin-left:15px;
        }

        .btn{
            border:1px solid #F7F5F8;
            border-radius:5px;
            margin-right:10px;
            margin-top:5px;
        }
    }


    #loadOverlay{display: none;}

</style>

@endpush


<div class="post-list-top-loading">
    <img src="{{url('/')}}/assets/images/loading.gif" alt="">
</div>
<div style="margin-top:-30px;" class="post-list">
</div>
<div class="post-list-bottom-loading">
    <img src="{{url('/')}}/assets/images/loading.gif" alt="">
</div>
<div class="modal fade " id="likeListModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <h5 class="modal-title">Likes</h5>
            </div>
            <div class="user_list">
            </div>
        </div>
    </div>
</div>

</br></br></br></br></br></br></br></br></br></br></br>

<script>

function refreshPage(){
    window.location.reload();
} 

</script>