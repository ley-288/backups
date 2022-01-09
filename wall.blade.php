<style>

@media screen and (max-width: 1024px){

    

    body{
        background-color:white;
    }

    .post-list{
        margin-top:-35px;
    }

	#suggested_people_feed{
		margin-top:15px;
        //margin-left:20px;
	}   

	#new_post_box_height{
		margin-top:-50px;
		margin-bottom:50px;
	}

    #share_something{
        margin-left:3px;
    }
}

@media screen and (min-width: 1024px){
	#suggested_people_feed{
		margin-left:-50px;
        margin-top:30px;
        margin-bottom:20px;

	}

	#new_post_box_height{
		margin-top:-50px;
		margin-bottom:0px;
	}
}

</style>

<div id="suggested_people_feed">
    @include('widgets.suggested_people')
</div>


<div class="post-list-top-loading">
    <img src="{{url('/')}}/assets/images/loading.gif" alt="">
</div>
<div class="post-list">
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


  


<!-- Modal -->
<div id="locationModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
      </div>
      <div class="modal-body">
      <div style="margin-left:0px;" id="new_post_box_height" class="panel panel-default new-post-modal">
        <div class="panel-body">
        <form style="overflow-x:hidden; width:100%;" id="form-new-post">
            <input type="hidden" name="group_id" value="{{ $wall['new_post_group_id'] }}">
                <div class="image-area">
                    <a href="javascript:;" class="image-remove-button" onclick="removePostImage()"><i class="fa fa-times-circle"></i></a>
                        <img src=""/>
                </div>

                </br>
                <textarea style="height:100px; width:100%; border-radius:25px;" rows = '8' name="content" class="content" @if($user->hasRole('influencer')) placeholder="@lang('applicazione.cosa_stai_pensando')" @else placeholder="@lang('applicazione.cosa_stai_pensando')" @endif></textarea>
                </br>
                <textarea style="height:100px; width:100%; border-radius:25px;" rows = '4' name="link" class="link"  placeholder="@lang('applicazione.condividi_qui_video')"></textarea>
                </br>
                <textarea style="height:40px; width:100%;" rows = '2' name='location' class='form-control' placeholder='Location'></textarea>
                </br>
                {{--<textarea style="height:40px; width:100%;" rows = '2' name='tags' class='form-control' placeholder='Tags'></textarea>--}}
                </br></br></br></br></br></br></br>

                    <div class="row">
                        <div class="col-xs-6">
                            <button id="big_image_button" type="button" class="btn btn-default btn-add-image btn-sm" onclick="uploadPostImage()">
                                <i id="image_button_id_logo" class="material-icons md-12">photo_camera</i>
                            </button>
                                <input type="file"  class="image-input" name="photo" onchange="previewPostImage(this)">
                        </div>

                             <button id="big_close_button" type="button" class="btn btn-default btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                                <i id="image_button_id_logo" class="material-icons md-12">close</i>
                            </button>
              
                        <div class="col-xs-4">
                            <button id="big_post_button" type="button" class="btn btn-primary pull-right btn-submit" onclick="newPostModal();">
                                <i id="post_button_id_logo" class="material-icons md-12">send</i>
                            </button>
                        </div>
                        <div style="border-radius:25px; background-color:transparent;" id="loading">
                            <img id="loading-image" src="{{url('/')}}/assets/images/loading.gif" alt="Loading..." />
                        </div>
                    </div>

                    @if($user->id == 274)
                    <div style="display:flex; padding-bottom:20px;" id="influencer_azienda_boxes">
                        <div style="padding-right:20px;" class="azienda_box_yes">
                        <label for="azienda" class="">azienda</label>
                            <input type="checkbox" name="azienda" value="1" id="azienda_box" @if(['azienda'] == 1){{ 'checked' }}@endif>
                        </div>
                        
                        <div class="influencer_box_yes">
                        <label for="influencer" class="">influencer</label>
                            <input type="checkbox" name="influencer" value="1" id="influencer_box" @if(['influencer'] == 1){{ 'checked' }}@endif>
                        </div>
                    </div>  
                    @endif   
        </form>
        
        
        </div>
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



