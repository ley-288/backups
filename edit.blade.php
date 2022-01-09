<style>
#profile_verified_new{
    height:50px;
    width:50px;
}
</style>

<hr>
<div style="text-align:center; color:black;">
<h4>{{ Auth::user()->name}}</h4>
<hr>
<h5>{{ Auth::user()->email }}</h5>
<hr>
<p>profile created at</p>
<h5>{{ Auth::user()->created_at }}</h5>
<hr>

@if(Auth::user()->company == 1)
<h5>Business Account</h5>
@elseif(Auth::user()->linked_account == 1)
<h5>Shop</h5>
@else
<h5>Personal Account</h5>
@endif

<hr>

@if(Auth::user()->staff == 1)
<img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/ssuper.png" alt="Recensioni">
@elseif(Auth::user()->verified == 1)
<img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/octagonal_star.png" alt="Recensioni">
@elseif(Auth::user()->gold == 1)
<img id="profile_verified_new" src="{{url('/')}}/assets/media/icons/socialbuttons/s_gradient_gold.png" alt="Recensioni">
@else
<a href="{{url('/')}}/verified"><img id="profile_verified_new" style="height:20px; width:20px;" src="{{url('/')}}/assets/media/icons/socialbuttons/octagonal_star.png" alt="Recensioni"><h5>Verificato</h5></a>
@endif
</div>

@push('after-scripts')
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
@endpush
