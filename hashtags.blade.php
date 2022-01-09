@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Search'))

@section('content')


<style>


#desktop_layout{
    margin-top:0px;
}

.tab-content{
    margin-top:100px;
}

li{
    border-radius:7px;
}

h4{
    margin-left:20px;
}

.btn-secondary{
        background-color:white;
        border:2px solid #F7F5F8;
        box-shadow:none;
        color:black;
        border-radius:5px;
    }

table{
    margin-left:20px;
}

td{
    padding:10px;
}

 .card-title{
        font-size:12px;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        max-height:40px;
        max-width:40px;
    }

    .card h5{
        width:50vw;
    }

@media screen and (max-width: 1024px){

     #mobile_header_style{
        display:none;
    }

    .input-group{
        border: 2px solid #F7F5F8; 
        width:90vw;
        border-radius:5px;
    }

    #block{
        position:fixed;
        //top:0;
        margin-top:-150px;
        width: 100vw;
        background-color:white;
        z-index:5;
        //-webkit-backdrop-filter: blur(15px);
        //backdrop-filter: blur(15px);
        //background-color: transparent;
    }

    .search_in_search{
        margin-top:-50px;
        margin-left:20px;
        display: flex;
        flex-wrap: nowrap;
        flex-direction: row;
    }

    input{
        border:none !important;
        box-shadow: none !important;
    }

    #search_scroll_row {
        border-bottom: 1px solid #F7F5F8;
        height:85px;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: center;
    }

    .search_new_scroll { 
        width: 100vw;
        background-color: transparent;
        overflow-x: auto !important;
        overflow-y: hidden;
        white-space: nowrap;
    }

    .new-search-item {
        margin-top:9px;
        width: 150px;
        height: 50px;
        background: white;
        color:black;
        display: inline-block;
        padding: 15px;
        text-align: center;
        border: 2px solid #F7F5F8;
    }

    #new_photo_container_camp{
            width:101vw;
            margin-left:0.9vw;
            }

    #new_profile_image_camp {
            padding-top: 0.3vw;
            padding-bottom: 0.3vw;
            padding-left: 0.5vw;
            padding-right: 0.5vw;
            width: 34vw;
            height: 34vw;
            object-fit: cover;
            }

    .card-deck{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card-deck .card {
        display: flex;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
        width:35vw;
        margin:10px;
    }

    .scrollmenu_search{
        display: flex;
        width: 100vw;
        height: 100px;
        background-color: transparent;
        overflow-x: auto !important;
        overflow-y: hidden;
        white-space: nowrap;
    }

}


@media screen and (min-width: 1024px){

     .input-group{
        border: 2px solid #F7F5F8; 
        width:610px;
        margin-left:20px;
         margin-top:-90px;
         border-radius:5px;
    }

    #block{
        position:fixed;
        top:0;
        background-color:white;
        width:800px;
        z-index:5;
        //-webkit-backdrop-filter: blur(15px);
        //backdrop-filter: blur(15px);
        //background-color: transparent;
    }

    .search_in_search{
        margin-top:-50px;
        margin-left:0px;
        display: flex;
        flex-wrap: nowrap;
        flex-direction: row;
        justify-content:center;
    }

    input{
        border:none !important;
        box-shadow: none !important;
    }

    #search_scroll_row {
        border-bottom: 1px solid #F7F5F8;
        height:85px;
        width: 820px;
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: center;
    }

    .search_new_scroll { 
        background-color: transparent;
        overflow-x: auto !important;
        overflow-y: hidden;
        white-space: nowrap;
    }

    .new-search-item {
        margin-top:9px;
        width: 150px;
        height: 50px;
        background: white;
        color:black;
        display: inline-block;
        padding: 15px;
        text-align: center;
        border: 2px solid #F7F5F8;
    }

     #new_photo_container_camp{
            width:800px;
            margin-left:0.9vw;
            }

        #new_profile_image_camp {
            padding-top: 0.3vw;
            padding-bottom: 0.3vw;
            padding-left: 0.5vw;
            padding-right: 0.5vw;
            width: 18vw;
            height: 18vw;
            object-fit: cover;
            }

    .card-deck{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }

    .card-deck .card {
        display: flex;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
        width:35vw;
        margin:10px;
    }

     .scrollmenu_search{
        display: flex;
        width: 800px;
        height: 100px;
        background-color: transparent;
        overflow-x: auto !important;
        overflow-y: hidden;
        white-space: nowrap;
    }

}

</style>
<div id="block">
</br>
</br>
</br>
</br>
</br>
</br>
</br>
    <div id="mobile_search_function">
        <div class="search_in_search">
            <form  method="get" action="{{ url('/search/hashtags') }}">
                <div class="input-group">
                    <input type="text" class="form-control input-lg" name="s" placeholder="@lang('applicazione.cerca')" minlength="3" value="{{$s}}"/>
                    <span class="input-group-btn">
                        <button class="btn btn-secondary btn-lg" type="button" style="border:none;">
                            <i id="icon_menu_icon_logo" class="material-icons nav__icon" style="color:black; font-size:24px; border:none; padding: 0px;">search</i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    </br>

</div>
     

<div>    
    </br>
    <h4>Hashtags</h4>
    <div id="new_photo_container_camp">
            @foreach($posts->take(50) as $post)
                @if($post->user->username != 'User' && $post->spider != 1)
                 @if($post->hasImage())
                    @foreach($post->images()->get() as $image)
                    @if ((str_contains($image->getURL(), 'MOV') == 0) && (str_contains($image->getURL(), 'mp4') == 0))
                    <a href="{{ url('/post/'. $post->id) }}">
                        <img id="new_profile_image_camp"  style="border-radius:0px; border:1px solid transparent;" src="{{ $image->getURL() }}" alt="Post" />
                    </a>
                    @endif
                    @endforeach
                @endif
                @endif
            @endforeach
        </div>
         
        </br>
        </br>
        </br>
        </br>
        </br>
        </br>

</div>

        </br>
        </br>
        </br>
        </br>
        </br>
        </br>
    
     

    

@endsection

@push('after-scripts')

<script>

window.onload = function () {
  window.scrollTo(1, 1);
}

</script>

@endpush


