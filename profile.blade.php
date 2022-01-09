

<hr>
<div style="display:flex; justify-content:center;flex-direction: column; align-items: center; color:black;">
<h4>Cancella il tuo account?</h4>
</br>
<h6>We are sorry to see you go..</h6>
</br>
<i style="text-align:center;" class="material-icons">
sentiment_dissatisfied
</i>
</div>
</br>
</br>

<hr>
<div class="form-group row " style="display:flex; justify-content:center;">
    <form id="cancella_profilo" action="{{route('frontend.user.utente.delete')}}" method="post">
        @csrf
        <div>
        <a class="btn btn-sm btn-danger cancella_profilo" href="#" >@lang('applicazione.cancella_account')</a>
        </div>
    </form>
</div>