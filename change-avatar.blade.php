@push('after-styles')
<link href="{{url('/')}}/css/slim.min.css" rel="stylesheet" type="text/css" />

<style>

.slim{
    border-radius: 70px;
    height: 140px;
    width: 140px;
}

.slim-popover:after{
    background:black;
}


.slim-image-editor .slim-editor-btn-group button{
    box-shadow:none;
    border: 2px solid lightgray;
    padding:10px;
}

.slim-btn-remove{
    //display:flex;
    margin-left:10px!important;
}

.slim-btn-edit{
    display:none;
}

#change_avatar_modal_icon {
    position: absolute;
    color: black;
    margin-left: 100px;
    margin-top: -34px;
    z-index: 1;
    font-size: 20px;
    opacity: 0.5;
    color: #F1656E;
    background-color: transparent;
    border-radius: 100%;
    padding: 8px;
}

</style>
@endpush

<div>
    <form id="kt_form" style="display:flex; justify-content:center;" action="{{route('frontend.user.avatar')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="slim" data-service-format="file" 
            data-will-request="handleImageRequest" 
            data-default-input-name="avatar" 
            data-force-size="450,450" 
            data-instant-edit="true" 
            data-push="true" 
            data-ratio="1:1" 
            data-service="{{route('frontend.user.avatar')}}" 
            data-did-upload="imageAvatarUpload"
            data-did-remove="handleAvatarRemoval"
            data-size="450,450" 
            data-status-file-size="{{__('applicazione.file_troppo_grande',['mb'=>5])}}"
            data-label="{{__('applicazione.trascina_file')}}"
            data-button-cancel-label="{{__('applicazione.reset')}}"
            data-button-cancel-title="{{__('applicazione.reset')}}"
            data-button-confirm-label="{{__('applicazione.confirm')}}"
            data-button-confirm-title="{{__('applicazione.confirm')}}"
            data-button-remove-label="{{__('applicazione.remove')}}"
            data-button-remove-title="{{__('applicazione.remove')}}"
            data-button-edit-label="{{__('applicazione.edit')}}"
            data-button-edit-title="{{__('applicazione.edit')}}"
            data-button-rotate-title="{{__('applicazione.rotate')}}"
            data-status-upload-success="{{__('applicazione.saved')}}"
            data-max-file-size="5">
            @if(Auth::user()->avatar_location)
            <img src="{{asset('storage/'.Auth::user()->avatar_location)}}" alt=""/> 
             <i class="material-icons nav__icon" id="change_avatar_modal_icon">photo_camera</i>
            @else
             <img src="{{url('/')}}/assets/media/icons/socialbuttons/user.png?v=2"  alt=""/> 
              <i class="material-icons nav__icon" id="change_avatar_modal_icon">photo_camera</i>
            @endif
    <input type="file" name="avatar"/>
            
        </div>
    </form>
</div>

@push('after-scripts')

<script src="{{url('/')}}/js/slim.kickstart.min.js"></script>


<script>
    function handleImageRequest(xhr){
        
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token() }}' );
    }
    
    
        function imageAvatarUpload(error, data, response) {
            console.log(error, data, response);
            console.log('url({{asset('storage')}}/'+response.avatar_location+')');
            if(error != 'fail'){
                
                //$('#img_holder').css('background-image','url({{asset('storage')}}/'+response.avatar_location+')');
                if($('.kt-header__topbar-wrapper img').length){
                    $('.kt-header__topbar-wrapper img').attr('src','{{asset('storage')}}/'+response.avatar_location);
                }else{
                    $('.kt-header__topbar-icon').remove();
                    $('.kt-header__topbar-wrapper').append('<img src="{{asset('storage')}}/'+response.avatar_location+'" />');
                          
                }
                
                
            }
    }
     function handleAvatarRemoval(data) {
        
        // setup request and send
       
        var url = '{{route('frontend.user.avatar.delete')}}';
        var xhr = new XMLHttpRequest();
        
        xhr.open('DELETE', url , true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token() }}' );
        xhr.send();
        $('#img_holder').css('background-image','url({{url('/')}}/img/frontend/placeholder.jpg)');
        $('.kt-header__topbar-wrapper img').remove();
        $('.kt-header__topbar-wrapper').append('<span class="kt-header__topbar-icon kt-bg-brand kt-hidden-"><b>{{Auth::user()->first_name[0]}}</b></span>');
    }
</script>

@endpush
