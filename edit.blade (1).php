
@extends('frontend.layouts.interna')

@section('title', app_name() . ' | ' . __('applicazione.modifica'))
@php

$value_immagine_0 = $value_immagine_1 = $value_immagine_2 = $value_immagine_3 = $value_immagine_4 = $value_immagine_5 = $value_immagine_6 = $value_immagine_7 = '';
@endphp
@section('content')
@push('after-styles')

<link href="{{url('/')}}/css/wizard-4.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
<script src="{{url('/')}}/js/slim.kickstart.min.js"></script>


<style>

    body{
        background:white;
    }

    #mobile_search_function{
    display:none;
}

#mobile_header_style{
        display:none;
}

.kt-switch input:checked~span:after{
    background-image: linear-gradient(#e72b38, #e72b80);
}
  
.new_row{
         margin-left: 0px;
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
        margin-top: 60px;
    }
    
   .modal .modal-content {
        margin-top: 100px;
        border-radius: 15px;
    }

    .modal-header .close {
        margin-top: -2px;
        display: none;
    }

    .side_2{
        margin-top:70px;   
    }

    .select2-search__field{
        background-color:transparent; 
    }

    .body{
        overflow-x:hidden; 
    }

    .form-group label{
        border-radius:5px;
    }

    select#comuni {
  -webkit-appearance: button;
  -webkit-border-radius: 5px;
  -webkit-box-shadow: none;
  -webkit-padding-end: 20px;
  -webkit-padding-start: 2px;
  -webkit-user-select: none;
  background-position: center right;
  background-repeat: no-repeat;
  border: 1px solid #AAA;
  color: #555;
  font-size: inherit;
  margin: 0;
  overflow: hidden;
  padding-top: 2px;
  padding-bottom: 2px;
  text-overflow: ellipsis;
  white-space: nowrap;
}

    .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child>.btn, .input-group-btn:first-child>.btn-group>.btn, .input-group-btn:first-child>.dropdown-toggle, .input-group-btn:last-child>.btn-group:not(:last-child)>.btn, .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle){
        border-radius:5px;
        border:2px solid #F7F5F8;
    }

    .input-group .form-control:not(:first-child):not(:last-child), .input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child) {
        border-radius:5px;
        margin-top:5px;
        border:2px solid #F7F5F8;
    }

    .input-group>.input-group-append>.btn, .input-group>.input-group-append>.input-group-text, .input-group>.input-group-prepend:first-child>.btn:not(:first-child), .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child), .input-group>.input-group-prepend:not(:first-child)>.btn, .input-group>.input-group-prepend:not(:first-child)>.input-group-text {
        border-radius:5px;
        border:2px solid #F7F5F8;
    }

    .btn{
        border-radius:5px;
    }

    .select2-selection select2-selection--multiple{
        border-radius:5px;
        border:2px solid #F7F5F8;
    }

    .form-control{
        border:2px solid #F7F5F8;
        box-shadow:none;
        border-radius:5px;
    }

    input[type="text"]{
      //font-size:25px!important;
    }

    #item_num{
        border-radius:5px;
    }

    .select2-container{
        font-size:1rem !important;
        border:2px solid #F7F5F8;
    }

    .input-group-text{
         border:2px solid #F7F5F8;
         background-color:transparent;
    }

    @media screen and (max-width: 1024px) {

    .kt-container kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch{
        width:100vw;
    }
      
      .kt-wizard-v4__nav{
        display:none;
      }

      #canali_block{
        margin-top:30px;
      }

        #desktop_layout{
            margin-top: -100px;
            width: 100vw;
        }

#canali_select_combo{
        display: flex;
    flex-direction: column;
    align-items: center;
    padding:10px;
}

        .form-group.row .kt-switch{
            //margin-left:45vw;
        }

        #cat_wizard_v{
            border-radius:5px;
            }

        .kt-portlet {
            border-radius:5px;
            }

        .kt-avatar__holder{
            background-image: url("{{url('/')}}/img/frontend/add_file.jpg");
            background-size: contain;
            }
    }

    @media screen and (min-width: 1024px) {

        #cat_wizard_v{
            border-radius:5px 5px 0px 0px;
            }

        .kt-portlet {
            border-radius:0px 0px 5px 5px;
            }
       
        .kt-avatar__holder{
            background-image: url("{{url('/')}}/img/frontend/add_file.jpg");
            background-size: contain;
            }
    }

li{
    border-radius:0px!important;
}

</style>



<style>

.cont-main-user {
        display: flex;
    flex-wrap: nowrap;
    align-content: center;
    justify-content: flex-start;
    flex-direction: row;
    overflow-x: scroll;
    width: 100vw;
    padding-left:10px;
    height:200px;
  }
  
  * {
    //font-family: Lato;
    margin: 0;
    padding: 0;
    --transition: 0.15s;
    --border-radius: 0.5rem;
    //--background: #5979FB;
    //--box-shadow: #5979FB;
    --box-shadow: linear-gradient(#e72b38, #e72b80);
  }

  .cont-main-camp {
    display: flex;
    flex-wrap: wrap;
    //width: 400px;
    width:100vw;
    //margin-left:6px;
    justify-content: center;
    align-items: center;
  }

  .cont-checkbox {
    margin-left: 3px;
    margin-right: 3px;
    margin-top: 3px;
    margin-bottom: 5px;
    width: 29vw;
    height: 29vw;
    //border-radius: var(--border-radius);
    //box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    background: white;
    transition: transform var(--transition);
  }

  


  .cont-bg {
    min-height: 100vh;
    background-image: radial-gradient(
      circle farthest-corner at 7.2% 13.6%,
      rgba(37, 249, 245, 1) 0%,
      rgba(8, 70, 218, 1) 90%
    );
    padding: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .cont-checkbox:first-of-type {
    margin-bottom: 0.75rem;
    margin-right: 0.75rem;
  }

  .cont-checkbox:active {
    transform: scale(0.9);
  }

  input {
    display: none;
  }

  input:checked + label {
    //borer-radius:5px;
    opacity: 1;
    box-shadow: 0 0 0 3px var(--background);
    //filter: contrast(50%);
  }

  input:checked + label img {
    -webkit-filter: none; /* Safari 6.0 - 9.0 */
    filter: none;
    filter: contrast(50%);
  }

  input:checked + label .cover-checkbox {
    opacity: 1;
    transform: scale(1);
  }

  input:checked + label .cover-checkbox svg {
    stroke-dashoffset: 0;
  }

  label {
    display: inline-block;
    cursor: pointer;
    //border-radius: var(--border-radius);
    overflow: hidden;
    width: 100%;
    //height: 100%;
    position: relative;
    //opacity: 0.6;
  }

  label .cover-checkbox {
    position: absolute;
    right: 5px;
    top: 3px;
    z-index: 1;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: var(--box-shadow);
    border: 2px solid #fff;
    transition: transform var(--transition),
      opacity calc(var(--transition) * 1.2) linear;
    opacity: 0;
    transform: scale(0);

  }

  label .cover-checkbox svg {
    width: 13px;
    height: 11px;
    display: inline-block;
    vertical-align: top;
    fill: none;
    margin: 3px 0 0 1px;
    stroke: #fff;
    stroke-width: 2;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke-dasharray: 16px;
    transition: stroke-dashoffset 0.4s ease var(--transition);
    stroke-dashoffset: 16px;
  }

  label img{
    width: 29vw;
    height: 29vw;
    object-fit:cover;
    border-radius:3px;
    margin-left:0px;
  }

 .cont-main-camp label .info {
    position:absolute;
    text-align: left;
    margin-top: -2.9rem;
    margin-left:2px;
    font-weight: 1000;
    font-size: 10px;
    //margin-left:-10px;
    color:white;
    z-index:10;
    padding:1px;
    border-radius:2px;
    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);
  }

  .cont-main-user label img{
    height: 15vh;
    object-fit: cover;
    border-radius: 100%;
    margin-left: 10px;
    margin-right: 10px;
    max-width: 15vh;
    border:1px solid #F7F5F8;
  }

  .cont-main-user label .info {
    position:absolute;
    text-align: center;
    margin-top: 1rem;
    font-weight: 1000;
    font-size: 10px;
    margin-left: 45px;
    color:black;
    z-index:10;
  }


   .btn-success{
    border:none;
    box-shadow:none;
  }

  .btn-secondary{
    border:2px solid #F7F5F8;
    color:black;
    box-shadow:none;
  }

  .select2-container{font-size:1rem !important}

    @media screen and (max-width: 1024px) {

      #mobile_header_style{
        display:none;
      }

      #kt_form{
          width:100vw;
      }

      .kt-wizard-v4 .kt-wizard-v4__wrapper .kt-form {
    //width: 85vw;
    //padding: 1px;
      }

      .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: -55px;
        box-shadow: 0 4px 2px -2px #F7F5F8;
        padding-bottom:20px;
      }
      
    }

    @media screen and (min-width: 1024px) {

      .row_1{
        display: flex;
        flex-direction: row;
        justify-content: ;
        flex-wrap: nowrap;
        align-items: center;
        margin-top: 0px;
        box-shadow: 0 4px 2px -2px #F7F5F8;
        padding-bottom:20px;
        justify-content: space-evenly;
    }
       
  }

  .im_pro{
    max-height:30px;
    max-width:30px;
  }

</style>


<link href="{{url('/')}}/assets/vendors/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
<link href="{{url('/')}}/css/slim.min.css" rel="stylesheet" type="text/css" />

@endpush

@push('after-scripts')

<script>

window.onload = function () {
  window.scrollTo(1, 1);
}

</script>
<script>
$(".comuni").select2({
    tags: false,
    multiple: true,
    tokenSeparators: [','],
    minimumInputLength: 3,
    placeholder: "@lang('Inizia a digitare')",
    language: "{{ Config::get('app.locale')}}",
    minimumResultsForSearch: 10,
    ajax: {
        url: "{{route('frontend.user.comuni')}}",
        dataType: "json",
        type: "GET",
        data: function (params) {

            var queryParameters = {
                search: params.term
            }
            return queryParameters;
        },
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.nome,
                        id: item.id
                    }
                })
            };
        }
    }
});
function handleRequest(xhr){
        
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token() }}' );
    }
    
    
        function imageUpload(error, data, response) {
            
            if(error != 'fail'){
                
                $('#immagine_'+response.field).val(response.file);
                
            }

    }
    function handleImageRemoval(data) {

        
        // setup request and send
        var immagine = (typeof  data.meta.immagine !== 'undefined') ? data.meta.immagine : data.server.file
        var url = '{{route('frontend.user.immagine.delete')}}';
        var xhr = new XMLHttpRequest();
        console.log(immagine);
        xhr.open('DELETE', url+'?immagine='+immagine , true);
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{csrf_token() }}' );
        xhr.send();
        $('#immagine_'+data.meta.allegato).val('');
    }

    function attiva(classe) {


    if (classe == 'digitali') {
    $('.canali').html('{{__('applicazione.descrizione_canali_digitali') }}');
    $('div.digitali').show();
    $('div.tradizionali input').prop('checked', false);
    $('div.tradizionali').hide();
    } else {
    $('.canali').html('{{__('applicazione.descrizione_canali_tradizionali') }}');
    $('div.digitali').hide();
    $('div.digitali input').prop('checked', false);
    $('div.tradizionali').show();
    }
    }
    $(document).ready(function () {

    $('input.tipologia').click(function () {
    attiva($(this).data('active'));
    });
    $('input.tipologia').each(function () {
    if ($(this).is(':checked')) {
    attiva($(this).data('active'));
    }
    });
    $('.cancella-allegato').click(function (e) {
    var target = $(this).data('input');
    $('#' + target).show();
    $(this).parent().hide();
    $('#kt_form').append('<input type="hidden" name="' + target + '" value="1" />');
    });
    $(".profile_avatar").change(function () {

    var token = '{{csrf_token()}}';
    var formData = new FormData();
    var posizione = $(this).data('posizione');
    formData.append('allegato', this.files[0]);
    formData.append('_token', token);
    formData.append('posizione', posizione);
    KTApp.block('#kt-avatar__holder_' + posizione);
    $.ajax({
    type: 'POST',
            url: '{{route('frontend.user.allegato')}}',
            data: formData,
            contentType: false,
            processData: false,
    }).done(function (data) {


    if (data.extension != 'pdf'){
        
    $('#kt-avatar__holder_' + posizione).css('background-image', 'url({{url('/')}}/storage/' + data.avatar_location + ')');
    } else{
        
    $('#kt-avatar__holder_' + posizione).css('background-image', 'url({{url('')}}/img/frontend/pdf.jpg)');
    }
    $('#h_allegato_' + posizione).remove();
    $('#kt_apps_user_add_avatar_' + posizione).append('<input type="hidden" id="h_allegato_' + posizione + '" name="h_allegato_' + posizione + '" value="' + data.id + '" />')

    

    KTApp.unblock('#kt-avatar__holder_' + posizione);
    $('#kt-avatar__cancel_' + posizione).css('display', 'flex');
    $('#kt-avatar__cancel_' + posizione).data('id', data.id);
    }).fail(function (jqXHR, textStatus, errorThrown) {
    KTApp.unblock('#kt-avatar__holder_' + posizione);
    swal.fire({
    "title": "",
            "text": "@lang('Sono consentiti solo file Pdf. Max 5MB')",
            "type": "error",
            "confirmButtonClass": "btn btn-secondary"
    });
    });
    });
    $('.kt-avatar__cancel').click(function () {

    var token = '{{csrf_token()}}';
    var formData = new FormData();
    var posizione = $(this).data('posizione');
    var id = $(this).data('id');
    KTApp.block('#kt-avatar__holder_' + posizione);
    formData.append('_token', token);
    formData.append('id', id);
    $.ajax({

    type: 'POST',
            url: '{{route('frontend.user.allegato.delete')}}',
            data: formData,
            contentType: false,
            processData: false,
    }).done(function (data) {
    KTApp.unblock('#kt-avatar__holder_' + posizione);
    swal.fire({
    "title": "",
            "text": "@lang('File Cancellato')",
            "type": "success",
            "confirmButtonClass": "btn btn-secondary"
    });
    $('#kt-avatar__holder_' + posizione).css('background-image', 'url({{url('/')}}/img/frontend/add_file.jpg)');
    $('#kt-avatar__cancel_' + posizione).css('display', 'none');
    $('#h_allegato_' + posizione).remove();
    $("#allegato_" + posizione).val('');
    }).fail(function (jqXHR, textStatus, errorThrown) {
    KTApp.unblock('#kt-avatar__holder_' + posizione);
    });
    });
    });</script>

<script src="{{url('/')}}/js/wizard-4.js?v=1.3"></script>
<script src="{{url('/')}}/js/select2.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/select2/dist/js/i18n/{{Config::get('app.locale')}}.js" type="text/javascript"></script>
<script src="{{url('/')}}/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/bootstrap-datepicker/js/locales/bootstrap-datepicker.it.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="{{url('/')}}/js/bootstrap-maxlength.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/summernote/dist/lang/summernote-it-IT.js" type="text/javascript"></script>
<script src="{{url('/')}}/js/editor.js" type="text/javascript"></script>
<script>
    $(function(){
    registerSummernote('.summernote', '', 1000, function(max) {
    $('#maxContentPost').text(max)
    });
    });

</script>
<script>


</script>

@endpush

<div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">

    </div>
    <!-- begin:: Content -->
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-wizard-v4" id="kt_wizard_v4" data-ktwizard-state="step-first">

            @if ($errors->any())

            <div class="alert alert-danger fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">{{__('alerts.frontend.error_profile')}}<br>@foreach($errors->all() as $error)
                    {{$error}}
                    @endforeach</div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-close"></i></span>
                    </button>
                </div>
            </div>

            @endif
            <!--begin: Form Wizard Nav -->
            <div class="kt-wizard-v4__nav">
                <div class="kt-wizard-v4__nav-items">
                    <a id="cat_wizard_v" class="kt-wizard-v4__nav-item" href="#" data-ktwizard-type="step"
                       data-ktwizard-state="current">
                        <div class="kt-wizard-v4__nav-body">
                            <div id="item_num" class="kt-wizard-v4__nav-number">
                                1
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    @lang('applicazione.scegli_la_tipologia')
                                </div>
                                <div class="kt-wizard-v4__nav-label-desc">
                                   {{-- @lang('Digitale / Tradizionale') --}}
                                </div>
                            </div>
                        </div>
                    </a>
                    <a id="cat_wizard_v" class="kt-wizard-v4__nav-item" href="#" data-ktwizard-type="step">
                        <div class="kt-wizard-v4__nav-body">
                            <div id="item_num" class="kt-wizard-v4__nav-number">
                                2
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    @lang('applicazione.canali')
                                </div>
                               {{--<div class="kt-wizard-v4__nav-label-desc canali">
                                    @if(isset($campagna))
                                   {{($campagna->tipologia == 'online') ? __('applicazione.descrizione_canali_digitali') : __('applicazione.descrzione_canali_tradizionali') }}
                                    @endif
                                </div>--}}
                            </div>
                        </div>
                    </a>
                    <a id="cat_wizard_v" class="kt-wizard-v4__nav-item" href="#" data-ktwizard-type="step">
                        <div class="kt-wizard-v4__nav-body">
                            <div id="item_num" class="kt-wizard-v4__nav-number">
                                3
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    @lang('applicazione.categorie')
                                </div>
                                <div class="kt-wizard-v4__nav-label-desc">

                                </div>
                            </div>
                        </div>
                    </a>
                    <a id="cat_wizard_v" class="kt-wizard-v4__nav-item" href="#" data-ktwizard-type="step">
                        <div class="kt-wizard-v4__nav-body">
                            <div id="item_num" class="kt-wizard-v4__nav-number">
                                4
                            </div>
                            <div class="kt-wizard-v4__nav-label">
                                <div class="kt-wizard-v4__nav-label-title">
                                    @lang('applicazione.descrizione')
                                </div>
                                <div class="kt-wizard-v4__nav-label-desc">
                                    
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!--end: Form Wizard Nav -->
            <div class="kt-portlet" style="box-shadow:none;">
                <div class="kt-portlet__body kt-portlet__body--fit">
                    <div class="kt-grid">
                        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                            <!--begin: Form Wizard Form-->
                            <form action="{{ isset($campagna) ? route('frontend.user.campagne.update',$campagna->uuid) : route('frontend.user.campagne.store') }}" method="POST" class="kt-form" id="kt_form" enctype="multipart/form-data">
                                @csrf
                                @if(isset($campagna))
                                @method('PUT')
                                @endif
                                <!--begin: Form Wizard Step 1-->
                                <div class="kt-wizard-v4__content"
                                     data-ktwizard-type="step-content"
                                     data-ktwizard-state="current">

                                     <div class="new_row">
        @if($user->avatar_location != '')
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
         @else
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
        @endif
        </br>
        <p style="font-size:20px; text-align:center; color:black;" class="card-text">Crea una Campagna</p>
        <p style="font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text">Le campagne su Spidergain non hanno alcun costo e sono visibili agli utenti.</p>
        </div>
        </br>
        </br>
       


                                    {{--<div class="kt-heading kt-heading--md">@lang('applicazione.scegli_la_tipologia')*</div>--}}
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__form">
                                            <div class="form-group form-group-marginless">
                                                {{--<label>@lang('applicazione.titolo_per_la_tua_campagna')</label>--}}
                                                <input type="text" class="form-control" maxlength="30" value="{{isset($campagna) ? $campagna->titolo : ''}}" name="titolo" placeholder="@lang('Inserisci titolo..')" />
                                            </div>

                                    </br>
                                    </br>
                                    
                                <div style="visibility:hidden;">
                                    <div style="text-align:center;">
                                    Aggiungi la posizione per avere la tua campagna visibile sulla mappa 
                                    </div>   

                                    <textarea id="locazioni" style="margin-top:20px; height:65px; border-radius:5px;" rows = '2' name='location' class="form-control location-input" placeholder='Location' value=""></textarea>
                                    <div class="findMyLocation" style="display:flex;justify-content:center;flex-direction: column;align-items: center; text-align:center;">
                                        <a href="javascript:;" onclick="findCampagnaLocation({{ Auth::user()->id }})">Find My Location</a>
                                        
                                    </div>
                                    </br>
                                    
                                    <input type="hidden" value="" class="map-info" name="map_info" id="map_info">
                                    <input type="hidden" value="" class="latitude" name="latitude" id="latitude">                       
                                    <input type="hidden" value="" class="longitude" name="longitude" id="longitude">       
                                </div>          
                                                <div class="mt-3 form-group" style="display:none;">
                                                    <label>@lang('applicazione.città_o_comuni_dove')</label>
                                                   
                                                    <select style="border-radius:5px; border:0px; outline:0px;" id="comuni" multiple name="comuni[]" class="comuni form-control">
                                                        @if(!empty($campagna->comuni))
                                                       
                                                            @foreach($campagna->comuni as $comune)
                                                            <option selected value="{{$comune->id}}">{{$comune->nome}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    
                                                </div>
                                            
                                            
                                            <div style="display:none;" class="form-group form-group-marginless">
                                                <label></label>
                                              <div class="row">
                                                    <div class="col-lg-6">
                                                        <label class="kt-option">
                                                            <span class="kt-option__control">
                                                                <span
                                                                    class="kt-radio kt-radio--check-bold">
                                                                    <input type="radio" name="tipologia" value="online" checked="" class="tipologia" data-active="digitali" 
                                                                           {{ (isset($campagna) && $campagna->tipologia == 'online') ? 'checked' : ''}} 
                                                                    />
                                                                    <span></span>
                                                                </span>
                                                            </span>
                                                            <span class="kt-option__label">
                                                                <span class="kt-option__head">
                                                                    <span
                                                                        class="kt-option__title">
                                                                        @lang('Digitale')
                                                                    </span>
                                                                    <span
                                                                        class="kt-option__focus">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px"
                                                                             height="24px"
                                                                             viewBox="0 0 24 24"
                                                                             version="1.1"
                                                                             class="kt-svg-icon">
                                                                        <g stroke="none"
                                                                           stroke-width="1"
                                                                           fill="none"
                                                                           fill-rule="evenodd">
                                                                        <rect id="bound"
                                                                              x="0" y="0"
                                                                              width="24"
                                                                              height="24" />
                                                                        <path
                                                                            d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                                            id="Combined-Shape"
                                                                            fill="#000000"
                                                                            opacity="0.3" />
                                                                        <path
                                                                            d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                                            id="Combined-Shape"
                                                                            fill="#000000" />
                                                                        </g>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                                <span class="kt-option__body">
                                                                    @lang('Social Media')
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                   <div class="col-lg-6">
                                                        <label class="kt-option">
                                                            <span class="kt-option__control">
                                                                <span
                                                                    class="kt-radio kt-radio--check-bold">
                                                                    <input type="radio"
                                                                    
                                                                           name="tipologia"
                                                                           class="tipologia"
                                                                           data-active="tradizionali"
                                                                           value="offline"
                                                                           {{ (isset($campagna) && $campagna->tipologia == 'offline') ? 'checked' : ''}} 
                                                                    >
                                                                    <span></span>
                                                                </span>
                                                            </span>
                                                         <span class="kt-option__label">
                                                                <span class="kt-option__head">
                                                                    <span
                                                                        class="kt-option__title">
                                                                        @lang('Canali Tradizionali')
                                                                    </span>
                                                                    <span
                                                                        class="kt-option__focus">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px"
                                                                             height="24px"
                                                                             viewBox="0 0 24 24"
                                                                             version="1.1"
                                                                             class="kt-svg-icon">
                                                                        <g stroke="none"
                                                                           stroke-width="1"
                                                                           fill="none"
                                                                           fill-rule="evenodd">
                                                                        <rect id="bound"
                                                                              x="0" y="0"
                                                                              width="24"
                                                                              height="24" />
                                                                        <path
                                                                            d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
                                                                            id="Combined-Shape"
                                                                            fill="#000000" />
                                                                        <path
                                                                            d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
                                                                            id="Path-41-Copy"
                                                                            fill="#000000"
                                                                            opacity="0.3" />
                                                                        </g>
                                                                        </svg>
                                                                    </span>
                                                                </span>
                                                               <span class="kt-option__body">
                                                                    @lang('Eventi / Riviste / Negozi')
                                                                </span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Form Wizard Step 1-->







                                {{-- Hello Due to your below Ui changes the form submit may effect so i roll it back to my previous code. --}}






                                

                                <!--begin: Form Wizard Step 2-->
                                

                                <!--end: Form Wizard Step 2-->

                                <!--begin: Form Wizard Step 2-->
                                <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                    @php 
                                    if(isset($campagna)){
                                    $canali = json_decode($campagna->canali, true);

                                    }
                                    @endphp
                                    <div id="canali_block" class="kt-heading kt-heading--md" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">@lang('applicazione.scegli_il_tuo_canale')</div>
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__form">
                                            <div class="form-group row digitali" style="display: flex;justify-content: center;"">
                                            {{--    <label class="col-3 col-form-label"><button style="background-color:transparent; box-shadow:none;" type="button" class="btn btn-label-primary btn-sm btn-icon facebook" data-toggle="kt-popover" title="" data-content="{{__('applicazione.facebook_spiegazione')}}" data-original-title="Facebook"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Facebook" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox" name="canali[]" value="facebook" {{(isset($campagna) && in_array('facebook',$canali)) ? 'checked' : ''}} >
                                                                   <span></span>
                                                        </label>
                                                    </span>

                                                </div>
                                               <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon twitter" data-toggle="kt-popover" title="" data-content="{{__('applicazione.twitter_spiegazione')}}" data-original-title="Twitter"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png" alt="Twitter" style="height:30px; width:30px;"></button>    </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="twitter" {{(isset($campagna) && in_array('twitter',$canali)) ? 'checked' : ''}} >
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            
                                                <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon instagram" data-toggle="kt-popover" title="" data-content="{{__('applicazione.instagram_spiegazione')}}" data-original-title="Instagram"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/instagram.png" alt="Instagram" style="height:30px; width:30px;"></button>  </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="instagram" {{(isset($campagna) && in_array('instagram',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                                <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon youtube" data-toggle="kt-popover" title="" data-content="{{__('applicazione.youtube_spiegazione')}}" data-original-title="Youtube"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube.png" alt="Youtube" style="height:30px; width:30px;"></button>  </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="youtube" {{(isset($campagna) && in_array('youtube',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            
                                                <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon linkedin" data-toggle="kt-popover" title="" data-content="{{__('applicazione.linkedin_spiegazione')}}" data-original-title="LinkedIn"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png" alt="LinkedIn" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="linkedin" {{(isset($campagna) && in_array('linkedin',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>                                            
                                           
                                               <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon tiktok" data-toggle="kt-popover" title="" data-content="{{__('applicazione.tiktok_spiegazione')}}" data-original-title="TikTok"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/tiktok.png" alt="TikTok" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="tiktok" {{(isset($campagna) && in_array('tiktok',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>           
                                                                                
                                            
                                                                                         
                                           
                                               <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon pinterest" data-toggle="kt-popover" title="" data-content="{{__('applicazione.pinterest_spiegazione')}}" data-original-title="pinterest"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/pinterest.png" alt="Pinterest" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="pinterest" {{(isset($campagna) && in_array('pinterest',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div> 

                                                <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon twitch" data-toggle="kt-popover" title="" data-content="{{__('applicazione.twitch_spiegazione')}}" data-original-title="Twitch"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/twitch.png" alt="Twitch" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="twitch" {{(isset($campagna) && in_array('twitch',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>           
                                                                                
                                            
                                                <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon snapchat" data-toggle="kt-popover" title="" data-content="{{__('applicazione.snapchat_spiegazione')}}" data-original-title="Snapchat"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/snapchat.png" alt="Snapchat" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="snapchat" {{(isset($campagna) && in_array('snapchat',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>                                            
                                           
                                              <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon reddit" data-toggle="kt-popover" title="" data-content="{{__('applicazione.reddit_spiegazione')}}" data-original-title="Reddit"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/reddit.png" alt="Reddit" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="reddit" {{(isset($campagna) && in_array('reddit',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>         
                                                                                
                                           
                                                <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon tumblr" data-toggle="kt-popover" title="" data-content="{{__('applicazione.tumblr_spiegazione')}}" data-original-title="Tumblr"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/tumblr.png" alt="Tumblr" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="tumblr" {{(isset($campagna) && in_array('tumblr',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>                                            
                                           
                                              <label class="col-3 col-form-label"><button style="background-color:transparent;" type="button" class="btn btn-label-primary btn-sm btn-icon myspace" data-toggle="kt-popover" title="" data-content="{{__('applicazione.myspace_spiegazione')}}" data-original-title="Myspace"><img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/myspace.png" alt="Myspace" style="height:30px; width:30px;"></button> </label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="myspace" {{(isset($campagna) && in_array('myspace',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>         
                                             --}}




                                            <div id="canali_select_combo">
                                                <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook.png" alt="Facebook" style="height:30px; width:30px;">
                                               
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox" name="canali[]" value="facebook" {{(isset($campagna) && in_array('facebook',$canali)) ? 'checked' : ''}} >
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                            </div>

                                            <div id="canali_select_combo">
                                               <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter.png" alt="Twitter" style="height:30px; width:30px;">
                                               
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="twitter" {{(isset($campagna) && in_array('twitter',$canali)) ? 'checked' : ''}} >
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                               </div> 
                                            
                                            <div id="canali_select_combo">
                                                <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/instagram.png" alt="Instagram" style="height:30px; width:30px;">
                                               
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="instagram" {{(isset($campagna) && in_array('instagram',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                             </div> 

                                             <div id="canali_select_combo"> 
                                                <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube.png" alt="Youtube" style="height:30px; width:30px;">
                                               
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="youtube" {{(isset($campagna) && in_array('youtube',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                             </div>

                                             <div id="canali_select_combo">  
                                            
                                                <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin.png" alt="LinkedIn" style="height:30px; width:30px;">
                                                
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="linkedin" {{(isset($campagna) && in_array('linkedin',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                               </div>
                                               <div id="canali_select_combo">
                                               <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/tiktok.png" alt="TikTok" style="height:30px; width:30px;">
                                               
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="tiktok" {{(isset($campagna) && in_array('tiktok',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                                <div id="canali_select_combo">        
                                                  
                                               <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/pinterest.png" alt="Pinterest" style="height:30px; width:30px;">
                                                
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="pinterest" {{(isset($campagna) && in_array('pinterest',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>

                                                <div id="canali_select_combo">
                                                    <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/twitch.png" alt="Twitch" style="height:30px; width:30px;">
                                               
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="twitch" {{(isset($campagna) && in_array('twitch',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>

                                                <div id="canali_select_combo">         
                                                                                
                                            
                                                    <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/snapchat.png" alt="Snapchat" style="height:30px; width:30px;">
                                                
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="snapchat" {{(isset($campagna) && in_array('snapchat',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>                                       
                                           <div id="canali_select_combo">
                                            <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/reddit.png" alt="Reddit" style="height:30px; width:30px;">
                                                
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="reddit" {{(isset($campagna) && in_array('reddit',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                             </div>         
                                             <div id="canali_select_combo">                                   
                                           
                                               <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/tumblr.png" alt="Tumblr" style="height:30px; width:30px;">
                                               
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="tumblr" {{(isset($campagna) && in_array('tumblr',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                             </div>                                            
                                           <div id="canali_select_combo">
                                  <img  class="im_pro" src="{{url('/')}}/assets/media/icons/socialbuttons/myspace.png" alt="Myspace" style="height:30px; width:30px;">
                                              
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                  name="canali[]" value="myspace" {{(isset($campagna) && in_array('myspace',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                             
                                            </div>





                                            </div>

                                         <div class="form-group row tradizionali">
                                                <label class="col-3 col-form-label"><button type="button" style="background-color:transparent;" class="btn btn-label-primary btn-sm btn-icon " data-toggle="kt-popover" title="" data-content="{{__('applicazione.rivista_spiegazione')}}" data-original-title="Rivista"><i class="fa fa-info-circle"></i></button>  @lang('Rivista cartacea')</label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="giornale_tiratura" {{(isset($campagna) && in_array('giornale_tiratura',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                                <label class="col-3 form-label"><button type="button" style="background-color:transparent;" class="btn btn-label-primary btn-sm btn-icon " data-toggle="kt-popover" title="" data-content="{{__('applicazione.eventi_spiegazione')}}" data-original-title="Eventi"><i class="fa fa-info-circle"></i></button>  @lang('Eventi')</label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox"
                                                                   name="canali[]" value="eventi_numero" {{(isset($campagna) && in_array('eventi_numero',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                                <label class="col-3 col-form-label"><button type="button" style="background-color:transparent;" class="btn btn-label-primary btn-sm btn-icon " data-toggle="kt-popover" title="" data-content="{{__('applicazione.negozio_spiegazione')}}" data-original-title="Negozio"><i class="fa fa-info-circle"></i></button>  @lang('Negozio')</label>
                                                <div class="col-xl-3 col-9">
                                                    <span
                                                        class="kt-switch kt-switch--icon">
                                                        <label>
                                                            <input type="checkbox" name="canali[]" value="negozio_metri" {{(isset($campagna) && in_array('negozio_metri',$canali)) ? 'checked' : ''}}>
                                                                   <span></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end: Form Wizard Step 2-->

                                <!--begin: Form Wizard Step 3-->
                                <div class="kt-wizard-v4__content"
                                     data-ktwizard-type="step-content" style="overflow-x: hidden;">
                                   
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__form">

                                          
    <div style="display:flex;justify-content:center;">
        <div class="cont-main-camp">
	        @foreach($categorie as $categoria)
	            <div class="cont-checkbox">
	                <input type="checkbox" value="{{$categoria->id}}" class="cat2" name="categorie[]" id="myCheckbox-{{$categoria->id}}" {{isset($dettagli) && $dettagli->hasCategorie($categoria->id) ? 'checked' : ''}}/>
	                <label  for="myCheckbox-{{$categoria->id}}">
                        <img src="https://spidergain.com/storage/categories/{{ $categoria->image  }}" alt="Card image cap">
		                <span class="cover-checkbox">
		                    <svg viewBox="0 0 12 10">
		                        <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
		                    </svg>
		                </span>
		                <div class="info">{{$categoria->nome}}</div>
	                </label>
	            </div>
	        @endforeach
	    </div>
    </div>

    

   
                                        </div>
                                    </div>
                                </div>
                                <style>.select-2{ width: 100% !important}</style>
                                <!--end: Form Wizard Step 3-->

                                <!--begin: Form Wizard Step 4-->
                                <div class="kt-wizard-v4__content"
                                     data-ktwizard-type="step-content" style="overflow-x:hidden;">
                                    {{--<div class="kt-heading kt-heading--md">@lang('applicazione.descrivi_la_tua_campagna')</div>--}}
                                    <div class="kt-form__section kt-form__section--first">
                                        <div class="kt-wizard-v4__form">

                                            <div class="form-group form-group-last">
@if(empty($campagna->descrizione))
                                          <div class="form-group row">
                                          <label class="col-xl-12" for="descrizione" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; margin-left: 5px;">Seleziona i negozi per i quali vuoi pubblicare questa campagna.</label>
                                            {{-- <select style="width:100%" class="form-control kt-select2"
                                                    id="kt_select2_3" name="user_id[]"
                                                    multiple="multiple">
                                                    <option value="{{Auth::user()->id}}" selected>{{Auth::user()->username}}</option>
                                                    @if($main_id != '')
                                                    <option value="{{$main_id->azienda_id}}">{{$main_id->username}}  </option>
                                                    @endif
                                                @foreach($linked_ids as $linked_id)
                                                <option value="{{$linked_id->linked_id}}">{{$linked_id->username}}  </option>
                                                @endforeach
                                            </select> --}}
                                            <div style="display:flex;justify-content:center;">
                                          <div class="cont-main-user">
                                           <div class="cont-checkbox" style="width:40vw;">
            <input type="checkbox" value="{{ Auth::user()->id }}" class="cat" name="user_id[]" id="myCheckbox1-{{ Auth::user()->id }}" checked/>
            <label style="width: auto;"  for="myCheckbox1-{{ Auth::user()->id }}">
            
                
                @if(Auth::user()->avatar_location != '')
                <img style="border-radius:100%; object-fit:cover; width: 150px;" src="https://spidergain.com/storage/{{ Auth::user()->avatar_location  }}" alt="Card image cap">
                @else
                <img src="https://spidergain.com/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                @endif

                <span class="cover-checkbox">
                <svg viewBox="0 0 12 10">
                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
                </span>
                <div class="info">{{Auth::user()->username}}</div>
            </label>
	    </div>
	  @foreach($linked_ids as $linked_id)
	    <div class="cont-checkbox" style="width:40vw;">
            <input type="checkbox" value="{{$linked_id->linked_id}}" class="cat" name="user_id[]" id="myCheckbox-{{$linked_id->linked_id}}"/>
            <label style="width: auto;" for="myCheckbox-{{$linked_id->linked_id}}">
            
                
                @if($linked_id->avatar_location != '')
                <img style="border-radius:100%; object-fit:cover; width: 150px;" src="https://spidergain.com/storage/{{ $linked_id->avatar_location  }}" alt="Card image cap">
                @else
                <img src="https://spidergain.com/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                @endif

                <span class="cover-checkbox">
                <svg viewBox="0 0 12 10">
                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
                </span>
                <div class="info">{{$linked_id->username}}   </div>
            </label>
        </div>
            @endforeach
            
       
        @if($main_id != '')
        <div class="cont-checkbox" style="width:40vw;">
            <input type="checkbox" value="{{$main_id->azienda_id}}" class="cat" name="user_id[]" id="myCheckbox2-{{$main_id->azienda_id}}"/>
            <label style="width: auto;" for="myCheckbox2-{{$main_id->azienda_id}}">
            
                
                @if($main_id->avatar_location != '')
                <img style="border-radius:100%; object-fit:cover; width: 150px;" src="https://spidergain.com/storage/{{ $main_id->avatar_location  }}" alt="Card image cap">
                @else
                <img src="https://spidergain.com/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
                @endif

                <span class="cover-checkbox">
                <svg viewBox="0 0 12 10">
                    <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                </svg>
                </span>
                <div class="info">{{$main_id->username}}</div>
            </label>
	    </div>
        @endif
	</div>
    
</div>

                                            </div>

                                              </br>
                                              </br>
@endif
                                                <div class="form-group row">
                                                    <label class="col-xl-12" for="descrizione" style="margin-left: 5px;">@lang('applicazione.descrizione_campagna')</label>
                                                    </br>
                                            
                                                    <div class="col-xl-12">
                                                        <textarea name="descrizione" class="form-control" maxlength="1000" id="descrizione" rows="3" placeholder="Descrizione.." style="height: 30vh;">{{isset($campagna) ? $campagna->descrizione : ''}}</textarea>
                                                        <span class="form-text text-muted text-right" id="maxContentPost"></span>
                                                        
                                                    </div>
                                                   {{-- </br>
                                                    <label style="visibility:hidden;" class="col-xl-12" for="descrizione">@lang('applicazione.descrizione_scambio')</label>
                                                    <div class="col-xl-12">
                                                    <label class="col-xl-12" for="descrizione">@lang('applicazione.descrizione_scambio')</label>
                                                        <textarea name="scambio" class="form-control" maxlength="1000" id="scambio" rows="3">{{isset($campagna) ? $campagna->scambio : ''}}</textarea>
                                                        <span class="form-text text-muted text-right" id="maxContentPost"></span>
                                                        
                                                    </div>--}}
                                                </div>
                                                </br>
                                                </br>
<div class="kt-heading kt-heading--md" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">@lang('Inserisci le date')</div>
                                                <div class="form-group row" style="display: flex;flex-direction: row;justify-content: center;flex-wrap: nowrap;align-items: center;align-content: center;">                                    

                                                    {{--<label class="col-form-label col-xl-12">@lang('applicazione.data_inizio_visibilità')*</label>
                                                    <div class="col-xl-3">
                                                     <i class="la la-calendar-check-o"></i>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control" name="data_inizio" autocomplete="off" placeholder="Inizio" id="data_inizio" value="{{isset($campagna) ? date('d/m/Y',strtotime($campagna->data_inizio)) : ''}}" />
                                                            <span class="form-text text-muted">@lang('applicazione.quando_la_campagna')</span>
                                                            <div class="input-group-append">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                
                                                    <label class="col-form-label col-xl-12">@lang('applicazione.data_fine_visibilità')*</label>
                                                    <div class="col-xl-3">
                                                     <i class="la la-calendar-check-o"></i>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control" name="data_fine" autocomplete="off" placeholder="Fine" id="data_fine" value="{{isset($campagna) ? date('d/m/Y',strtotime($campagna->data_fine)) : ''}}" />
                                                            <span class="form-text text-muted">@lang('applicazione.quando_la_campanga_diventerà')</span>
                                                            <div class="input-group-append">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>--}}

                                                     
                                                     
                                                    
                                                    
                                                     
                                                        
                                                            <input style="width:150px; margin:5px;" type="text" class="form-control" name="data_inizio" autocomplete="off" placeholder="Inizio" id="data_inizio" value="{{isset($campagna) ? date('d/m/Y',strtotime($campagna->data_inizio)) : ''}}" />
                                                            
                                                            <div class="input-group-append">
                                                                
                                                            </div>
                                                      
                                                    

                                                
                                                    
                                                    
                                                     
                                                        
                                                            <input style="width:150px; margin:5px;" type="text" class="form-control" name="data_fine" autocomplete="off" placeholder="Fine" id="data_fine" value="{{isset($campagna) ? date('d/m/Y',strtotime($campagna->data_fine)) : ''}}" />
                                                            
                                                            <div class="input-group-append">
                                                                
                                                            </div>
                                                        
                                                    

                                                </div> 

                                                </br>
                                                </br>

                                                <div class="kt-heading kt-heading--md" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">@lang('Durata e Budget')</div>
                                                <div class="form-group row" style="display: flex;flex-direction: row;justify-content: center;flex-wrap: nowrap;align-items: center;align-content: center;">    
                                                              <div>
                                                              {{--onchange="showDurataDiv('durata_input_number_2', this)"--}}
                                                                <select  style="width:150px; margin:5px;" id="durata_input_number" name="durata_periodo" class="custom-select form-control">
                                                                <option disabled selected>Durata</option>
                                                                    @for($i=1; $i<=4; $i++)
                                                                    <option
                                                                        @if(isset($campagna))
                                                                        {{($campagna->durata_periodo == $i) ? 'selected' : ''}}
                                                                        @endif
                                                                        value="{{$i}}">@lang('applicazione.durata_'.$i)</option>
                                                                    @endfor
                                                                </select>
                                                           
                                                            <input style="width:150px; margin:5px;" id="durata_input_number_2" type="number" name="durata" class="form-control" placeholder="" value="{{isset($campagna) ? $campagna->durata : ''}}" aria-label="Durata">
                                                            </div>

                                                            <div>
                                                                {{--onchange="showBudgetDiv('budget_input_number_2', this)"--}}
                                                                <select  style="width:150px;margin:5px;" id="budget_input_number" name="budget_periodo" class="custom-select form-control">
                                                                    <option disabled selected>Budget</option>
                                                                    @for($i=1; $i<=5; $i++)
                                                                    <option
                                                                        @if(isset($campagna))
                                                                        {{($campagna->budget_periodo == $i) ? 'selected' : ''}}
                                                                        @endif
                                                                        value="{{$i}}">@lang('applicazione.budget_'.$i)</option>
                                                                    @endfor
                                                                </select>
                                                          
                                                            <input style="width:150px;margin:5px;" id="budget_input_number_2" type="number" name="budget" class="form-control" placeholder="€" value="{{isset($campagna) ? $campagna->budget : ''}}" aria-label="Budget">
                                                          </div>
                                                       
                                                
                                                
                                                </div>

                                                 </br>
                                                </br>

                                                <div class="kt-heading kt-heading--md" style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;">
                                                    @lang('applicazione.immagini')
                                                     {{--<span class="form-text text-muted">@lang('applicazione.se_hai_immagini')</span>--}}

                                                </div>


                                        <div class="image-area">
                                        
                                        
                                        <div class="image_or_video_preview"></div>
                                        </div>
                                        
                                        
                                        </br> </br> </br>
                                             
                                        <div class="form-group row">

                                            <div id="hide_this_when_foto" style="border:1px solid red ;margin-left: 15px; background: #F7F5F8; width: 100vw; height:20vh; margin-right: 15px; margin-bottom:20px;display: flex;align-items: center;align-content: center;flex-direction: column;justify-content: center;flex-wrap: nowrap;">

                                            <button type="button" style="background-color:transparent; border:none;display: flex; align-items: center; flex-direction: column;" onclick="uploadCampagnaImage()">
                                                Campagna Foto *
                                                <i id="photo_icon_card_image" class="material-icons nav__icon">photo_camera</i>
                                                </br>
                                                la foto piu visibile agli utenti
                                            </button>

                                            {{--
                                          <div id="unhide_this">
                                             <button style="visibility:hidden; background-color:transparent; border:none;display: flex; align-items: center; flex-direction: column;" onclick="uploadCampagnaImage()">
                                                
                                               <img class="card-img-top" src="{{url('/')}}/assets/media/icons/socialbuttons/play.png" alt="Campagna">
                                                
                                            </button>
                                            </div>
                                           --}}

                                            @if(!empty( $campagna->display_image ))
                                                <input type="file" class="image-input" name="display_image" value="https://spidergain.com/storage/display/{{ $campagna->display_image }}">
                                            @else
                                                <input style="visibility:hidden;" type="file" class="image-input" name="display_image" required onchange="previewCampagnaImage(this)">
                                            @endif

                                            </div>
                                        
                                                
                                                 <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato"
                                                             data-meta-allegato ="7"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_7']) && $allegati_v['immagine_7'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_7']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_7']) && $allegati_v['immagine_7'] != '')
                                                             @php
                                                             $value_immagine_7 = $allegati_v['immagine_0'];
                                                             @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_7'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="immagine_7" value="{{$value_immagine_7}}" name="immagine_7" />
                                        

                                                 <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato"
                                                             data-meta-allegato ="6"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_6']) && $allegati_v['immagine_6'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_6']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_6']) && $allegati_v['immagine_6'] != '')
                                                             @php
                                                             $value_immagine_6 = $allegati_v['immagine_6'];
                                                             @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_6'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="immagine_6" value="{{$value_immagine_6}}" name="immagine_6" />

                                                 <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato"
                                                             data-meta-allegato ="5"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_5']) && $allegati_v['immagine_5'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_5']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_5']) && $allegati_v['immagine_5'] != '')
                                                             @php
                                                             $value_immagine_5 = $allegati_v['immagine_5'];
                                                             @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_5'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="immagine_5" value="{{$value_immagine_5}}" name="immagine_5" />

                                                <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato"
                                                             data-meta-allegato ="4"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_4']) && $allegati_v['immagine_4'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_4']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_4']) && $allegati_v['immagine_4'] != '')
                                                             @php
                                                             $value_immagine_4 = $allegati_v['immagine_4'];
                                                             @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_4'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="immagine_4" value="{{$value_immagine_4}}" name="immagine_4" />

                                                <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato"
                                                             data-meta-allegato ="3"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_3']) && $allegati_v['immagine_3'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_3']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_3']) && $allegati_v['immagine_3'] != '')
                                                             @php
                                                             $value_immagine_3 = $allegati_v['immagine_3'];
                                                             @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_3'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="immagine_3" value="{{$value_immagine_3}}" name="immagine_3" />

                                                     

                                                    <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato"
                                                             data-meta-allegato ="2"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_2']) && $allegati_v['immagine_2'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_2']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_2']) && $allegati_v['immagine_2'] != '')
                                                             @php
                                                             $value_immagine_2 = $allegati_v['immagine_2'];
                                                             @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_2'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="immagine_2" value="{{$value_immagine_2}}" name="immagine_2" />

                                                    <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato" 
                                                             data-meta-allegato ="1"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_1']) && $allegati_v['immagine_1'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_1']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_1']) && $allegati_v['immagine_1'] != '')
                                                             @php 
                                                             $value_immagine_1 = $allegati_v['immagine_1'];
                                                             @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_1'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>

                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="immagine_1" value="{{$value_immagine_1}}" name="immagine_1" />
                                                    
                                                    <div class="col-xl-4 col-md-4 col-6">
                                                        <div class="slim" data-service-format="file" 
                                                             data-will-request="handleRequest" 
                                                             data-default-input-name="allegato" 
                                                             data-meta-allegato ="0"
                                                             @if(isset($campagna) && isset($allegati_v['immagine_0']) && $allegati_v['immagine_0'] != '')
                                                             data-meta-immagine = "{{$allegati_v['immagine_0']}}"
                                                             @endif
                                                             data-force-size="450,450" 
                                                             data-instant-edit="true" 
                                                             data-push="true" 
                                                             data-ratio="1:1" 
                                                             data-service="{{route('frontend.user.immagine')}}" 
                                                             data-did-upload="imageUpload"
                                                             data-did-remove="handleImageRemoval"
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
                                                            @if(isset($campagna) && isset($allegati_v['immagine_0']) && $allegati_v['immagine_0'] != '')
                                                            @php $value_immagine_0 = $allegati_v['immagine_0'];
                                                            @endphp
                                                            <img src="{{asset('storage/'.$allegati_v['immagine_0'])}}" alt=""/> 
                                                            @endif
                                                           <input type="file" name="allegato"/>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" value="{{$value_immagine_0}}" id="immagine_0" name="immagine_0" />
                                                </div>
                                               
 
                                            </div>

                                        </div>

                                    </div>

{{--
                                    <div class="form-group{{ $errors->has('private') ? ' has-error' : '' }}">
                                            <label for="private" class="">Create Post?</label>
                                                <div class="">
                                                    <input id="share" type="checkbox" name="share" value="1" @if($user['share'] == 1){{ 'checked' }}@endif>
                                                        @if ($errors->has('private'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('private') }}</strong>
                                                            </span>
                                                        @endif
                                                </div>
                                        </div> 
--}}

                                </div>

                                <!--end: Form Wizard Step 4-->

                                <!--begin: Form Actions -->
                                <div class="kt-form__actions">
                                    <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
                                         data-ktwizard-type="action-prev">
                                        @lang('applicazione.precedente')
                                    </div>
                                    <div class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
                                         data-ktwizard-type="action-submit">
                                        @lang('applicazione.pubblica')
                                    </div>
                                    <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
                                         data-ktwizard-type="action-next" style="background-image: linear-gradient(#e72b38, #e72b80); -webkit-text-fill-color: white; border-color:white;">
                                        @lang('applicazione.prossimo')
                                    </div>
                                </div>

                                <!--end: Form Actions -->
                            </form>

                            <!--end: Form Wizard Form-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

</br></br></br>
        <!--End::Section-->
    </div>
    <!-- end:: Content -->


<!-- Modal -->
<div id="findLocationModal-{{ isset($campagna) ? $campagna->id : '' }}" class="modal" tabindex="-1" role="dialog">
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
        <form style="overflow-x:hidden; width:100%;" id="form-campagna-information">
            {{ csrf_field() }}
            <input type="hidden" value="" name="map_info" class="map-info">
                    <div class="form-group">
                        <label>Location:</label>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                  
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control location-input" readonly value="{{ isset($campagna) ? $campagna->getAddress() : '' }}" aria-describedby="basic-addon1">
                                    <input type="hidden" value="" name="map_info" class="map-info">

                                    <input readonly style="height:100px; width:70%; border-radius:5px;" rows = '8' name="camp_id" id="camp_id" class="camp_id" value="{{ isset($campagna) ? $campagna->id : '' }}">
                                    
                                    
                                    
                                </div>
                            </div>
                            <div class="col-md-12 map-place"></div>
                        </div>
                        <div class="clearfix"></div>
                        <a href="javascript:;" onclick="findCampagnaLocation({{ isset($campagna) ? $campagna->id : '' }})">Re-Find My Location</a>
                    </div>
                    </br></br></br></br></br></br></br>
                    <div class="row">
                        <div class="col-xs-6">
                        </div>
                             <button style="margin-left:40%;" id="big_close_button" type="button" class="btn btn-default btn-add-image btn-sm" class="close" data-dismiss="modal" aria-label="Close"">
                                <i id="image_button_id_logo" class="material-icons md-12">close</i>
                            </button>
                        <div class="col-xs-4"> 
                           <button type="button" disabled class="btn btn-success saveMyLocation" onclick="saveCampagnaLocation({{ isset($campagna) ? $campagna->id : '' }})">Save</button>
                        </div>
                    </div> 
        </form>
        </div>
    </div>
    </div>
  </div>
</div>

@push('after-scripts')
<script>

var limit = 10;
$('input.cat2').on('click', function (evt) {
    if ($('.cat2:checked').length > limit) {
        this.checked = false;
    }
});

</script>

@if(empty(Auth::user()->getAddress()))
<script type="text/javascript">

    autoFindLocation();

</script>
@endif

@endpush


    @endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>

    var today = new Date();
var lastDate = new Date(today.getFullYear() +1, 11, 31);
$(function() {
  $('.campagna-date-pick').datepicker({ 
    minDate: '0',
    yearRange: '-0:+1',
    maxDate: lastDate,
    hideIfNoPrevNext: true
  });
});


    </script>

    <script>
function showDurataDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}

function showBudgetDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}
    </script>
