<div class="row">

    <div class="col-xl-8 kt-margin-b-20">
        <div class="row">
             <div class="col-xl-12">
                @include('frontend.campagne.offerte')
            </div>
            <div class="col-xl-12">
                @include('frontend.campagne.influencer_attivi')
            </div>

        
            @if($campagna->active == 0)
               <a href="#">                           
                    <button type="button" class="btn btn-brand pull-right">Concluso</button>
                </a>
            @else
                <a href="{{route('frontend.user.campagne.closed_in_list_brand',$campagna->uuid)}}">                           
                    <button type="button" class="btn btn-brand pull-right">Concludi Campagna</button>
                </a>
            @endif
               
           
        </div>
    </div>

    <!--    
    <div class="col-xl-4 kt-margin-b-20">
        {{-- @include('frontend.campagne.messaggi') --}}
    </div>
    -->

</div>