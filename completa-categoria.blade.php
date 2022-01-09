@extends('frontend.layouts.interna')

@section('title', app_name() . ' | ' . __('Category'))

@section('content')
@push('before-styles')
<link href="{{url('/')}}/assets/vendors/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
@endpush

@push('after-styles')

<style>
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

  .cont-main {
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;
  }

  .cont-checkbox {
    margin: 5px;
    width: 13vh;
    height: 13vh;
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
    height: 100%;
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
    height: 13vh;
    width: 13vh;
    object-fit:cover;
    border-radius:3px;
    margin-left:0px;
  }

  label .info {
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

      #desktop_layout{
        margin-top:20px;
      }

      #mobile_header_style{
        display:none;
      }

      .row_1{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        //align-items: center;
        margin-top: -55px;
        //box-shadow: 0 4px 2px -2px #F7F5F8;
        padding:10px;
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

</style>

@endpush

@push('after-scripts')
<script src="{{url('/')}}/js/select2.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/select2/dist/js/i18n/{{Config::get('app.locale')}}.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/jquery-validation/dist/localization/messages_{{Lang::locale()}}.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/summernote/dist/summernote.js" type="text/javascript"></script>
<script src="{{url('/')}}/assets/vendors/general/summernote/dist/lang/summernote-it-IT.js" type="text/javascript"></script>
<script src="{{url('/')}}/js/editor.js?v=0.6" type="text/javascript"></script>
@endpush
<?php
?>
<div>
<div class="row_1">

<div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{ URL::previous() }}">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            @lang('applicazione.categorie')
          
        </div>
        
          <i style="visibility:hidden; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">category</i>
    </div>

    </br>
<form action="{{ isset($dettagli) ? route('frontend.user.categoria.update') : route('frontend.user.categoria.store') }}" method="POST" class="kt-form" id="kt_form" enctype="multipart/form-data">
  @csrf
  @if(isset($dettagli))
  @method('PUT')
  @endif
	<div class="cont-main">
	  @foreach($categorie as $categoria)
	    <div class="cont-checkbox">
	    <input type="checkbox" value="{{$categoria->id}}" class="cat" name="categorie[]" id="myCheckbox-{{$categoria->id}}" {{isset($dettagli) && $dettagli->hasCategorie($categoria->id) ? 'checked' : ''}}/>
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
  <hr>
  <div class="kt-holder kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">    
        <div class="kt-portlet" style="box-shadow:none;">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div id="info_block"  class="kt-grid__item kt-grid__item--fluid">
                    <div class="kt-portlet__foot" style="display:flex;justify-content:center; border-top:none;">
                        <div class="kt-form__actions">
                            <button type="submit" style="" class="btn btn-success">@lang('applicazione.salva')</button>
                            <button type="reset" class="btn btn-secondary">@lang('Cancella')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  </br>
  </br>
</form>
</div>
</br>
</br>
</br>
</br>
</br>
</br>

@push('after-scripts')
<script>

var limit = 10;
$('input.cat').on('click', function (evt) {
    if ($('.cat:checked').length > limit) {
        this.checked = false;
    }
});

</script>

@endpush

@endsection      
