@push('after-styles')
<link href="{{url('/')}}/css/slim.min.css" rel="stylesheet" type="text/css" />

<style>
.slim{
    background-color:white!important;
}
.slim-popover:after{
    background:black;
}
.slim-editor-utils-group{
   // display:none;
}


.slim-image-editor .slim-editor-btn-group button{
    box-shadow:none;
    border: 2px solid lightgray;
    padding:10px;
}

#change_background_modal_icon {
    position: absolute;
    //margin-left: 240px;
    //margin-top: -40px;
    margin-left: 110px;
    margin-top: -130px;
    z-index: 1;
    font-size: 65px;
    opacity: 0.5;
    color: #F1656E;
    background-color: transparent;
    border-radius: 100%;
    padding: 8px;
}

@media screen and (min-width: 700px){
#bg_bg{
    border-radius:0px;
    //width:80vw;
    //height:40vh;
}
}

@media screen and (max-width: 700px){
#bg_bg{
    border-radius:0px;
    width:80vw;
    height:40vh;
}
}


</style>
@endpush

<div>
    <form id="kt_form" action="{{route('frontend.user.cover')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="slim" id="bg_bg" style="" data-service-format="file" 
            data-default-input-name="cover_path" 
            data-force-size="700,450" 
            data-instant-edit="true" 
            data-push="true" 
            data-ratio="2:1" 
            data-service="{{route('frontend.user.cover')}}" 
            data-will-request="handleCoverRequest" 
            data-did-upload="coverUpload"
            data-did-remove="handleCoverRemoval"
            data-size="700,450" 
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
            @if(Auth::user()->cover_path)
            <img src="{{asset('storage/covers/'.Auth::user()->cover_path)}}" style="border-radius:5px;" alt=""/> 
            <i class="material-icons nav__icon" id="change_background_modal_icon">photo_camera</i>
            @else
            <img src="{{url('/')}}/assets/media/icons/angryimg-2.png" style="border-radius:5px;" alt=""/> 
            <i class="material-icons nav__icon" id="change_background_modal_icon">photo_camera</i>
            @endif
            <input type="file" name="cover_path"/>
        </div>
    </form>
</div>

@push('after-scripts')

<script src="{{url('/')}}/js/slim.kickstart.min.js"></script>


<script>

    function handleCoverRequest(xhr){
        
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token() }}' );
    
    }
    
    
        function coverUpload(error, data, response) {
            console.log(error, data, response);
            console.log('url({{asset('storage')}}/'+response.cover_path+')');
            if(error != 'fail'){
                
                
                if($('.kt-header__topbar-wrappers img').length){
                    $('.kt-header__topbar-wrappers img').attr('src','{{asset('storage')}}/'+response.cover_path);
                }else{
                    $('.kt-header__topbar-icons').remove();
                    $('.kt-header__topbar-wrappers').append('<img src="{{asset('storage')}}/'+response.cover_path+'" />');
                          
                }
                
                
            }
    }






     function handleCoverRemoval(data) {
        
        // setup request and send
       
        var url = '{{route('frontend.user.cover.delete')}}';
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
