@push('after-scripts')

<script src="{{url('/')}}/js/read.js" type="text/javascript"></script>

@endpush

<div class="kt-portlet kt-portlet--bordered kt-portlet--head--noborder" style="border-radius:5px; border:1px solid #1DC9B7">
    <div class="kt-portlet__body">
        <div class="kt-iconbox__body">
            <div class="kt-iconbox__icon"> </div>
            <div class="kt-iconbox__desc">
                <h3 class="kt-iconbox__title">
                @if($campagna->offerta_acettata == 1)
                     {{__('applicazione.offerta')}}
                @else
                    {{__('applicazione.offerta_2')}}
                @endif
                </h3>
                <div class="kt-iconbox__content">
                    @if(isset($richiesta->offerta))
                        <p> {!! clean($richiesta->offerta) !!}</p>
                    @endif
                    @if(isset($richiesta->importo))
                        <p><strong>@lang('applicazione.importo'):</strong> {{$richiesta->importo}}€</p>
                    @endif
                   @if(!isset($box))
                    <p><button type="button" class="btn btn-bold btn-brand btn-sm leggi" data-tkn="{{csrf_token()}}" data-usr="{{Auth::user()->uuid}}" data-cmp="{{$campagna->uuid}}" data-url="{{route('frontend.user.leggi')}}" data-toggle="modal" data-target="#messaggi_user">{{__('applicazione.apri_chat')}} <?php echo ((!$letto)) ? '<span class="kt-badge kt-badge--danger kt-badge--inline">'.__('applicazione.non_letti').'</span>':'' ?></button>
                    </p>
                   @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.campagne.modalchatinfluencer')
