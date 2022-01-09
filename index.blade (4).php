@extends('frontend.layouts.social')

@section('title', app_name() . ' | ' . __('Gruppi'))

@section('content')

@push('after-styles')

<style>

.kt-grid.kt-grid--ver:not(.kt-grid--desktop):not(.kt-grid--desktop-and-tablet):not(.kt-grid--tablet):not(.kt-grid--tablet-and-mobile):not(.kt-grid--mobile){
    justify-content: center;
}

 @media screen and (max-width: 1024px) {

   #desktop_layout{
     margin-top:0px;
   }

   #mobile_header_style{
        display:none;
      }

    #kt_body{
        //position:inherit;
        margin-top:-30px;
    }

    #write-message-btn{
            margin-top:-55px;
            margin-left:83vw;
        }

    #mobile_search_function{
        display:none;
    }

    body{
        //background-image: url(/assets/media/icons/angryimg-2.png);
        //background-repeat: repeat-x;
        background-color:white;
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
        //width:50vw;
    }

    #color_white{
        color:white;
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
        width: 100vw;
    }

    .row_2{
        margin-top: -50px;
        display: flex;
        justify-content: center;
    }

    .row_3{
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
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
        padding: 20px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
        width:90vw;
        margin:10px;
    }

   

    .btn{
        display:flex;
        justify-content: flex-start;
        color:black;
        width:80vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }
}

@media screen and (min-width: 1024px) {

    body{
        background-color:white;
    }

    .card{
        border:none;
        background-color:transparent;
        color:black;
        margin-top:20vh;
    }

    .card-title{
        font-size:14px;
    }

    #color_white{
        margin-left:-40px;
    }

    .card h5{
        width:50vw;
    }

    .card-body{
        margin-top:5px;
        font-weight:bold;
        padding:0;
    }

    .card-img-top{
        border-radius:100%;
        max-height:50px;
        max-width:50px;
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

    .row_2{
        margin-top: -50px;
        display: flex;
        justify-content: center;
    }

    .row_3{
        display: flex;
        justify-content: center;
        margin-top: 50px;
    }

    .new_row{
            display: flex;
    justify-content: center;
    flex-direction: column;
    align-content: center;
    align-items: center;
    }

    .card-deck .card {
        display: flex;
        margin: 10px;
        width: 30vw;
        height: 30vh;
        flex-wrap: nowrap;
        align-content: center;
        justify-content: center;
        text-align: center;
        padding: 10px;
        border: none;
        box-shadow: 2px 2px 10px 10px #f7f5f8;
        align-items: center;
    }

    .card-deck {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        margin-top:10px;
    }

    .btn-block{
        display:flex;
        justify-content: flex-start;
        margin-left:15vw;
        color:black;
        width:30vw;
        margin-bottom:15px;
        border:1px solid #F7F5F8;
        border-radius:5px;
        box-shadow: 2px 2px 10px 10px #F7F5F8;
        font-size:12px;
    }

}

</style>
@endpush

<div>
    <div class="row_1">
        <div style="display:flex; font-size:24px; font-weight:bold;">
          <a href="{{ URL::previous() }}">
            <i style="font-size:30px; background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="material-icons nav__icon">chevron_left</i>
          </a>
            @lang('applicazione.gruppi')
          
        </div>
        @if($admin->count() < 1)
        <div onclick="myAddBlock()">
        @endif
            <i style="background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent; font-size:30px;" class="material-icons nav__icon">add_circle_outline</i>
        </div>
    </div>
    </br>
    <div class="row_2">
        <div id="addBlock" style="display:none; margin-top:150px;">
            @include('groups.widgets.group_information')
        </div>
    </div>
    </br>
    </br>
    </br>
    </br>
    <div class="new_row">
        @if($user->avatar_location != '')
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{asset('storage/'.$user->avatar_location)}}" alt="Card image cap">
         @else
        <img style="height:80px; width:80px; border-radius:40px; object-fit:cover; box-shadow: 2px 2px 10px 10px #F7F5F8;" src="{{url('/')}}/assets/media/icons/socialbuttons/user.png" alt="Card image cap">
        @endif
        </br>
        <p style="font-size:20px; text-align:center; color:black;" class="card-text">Benvenuto in Gruppi</p>
        
        @if($admin->count() < 1)
        <p style="font-size:12px; text-align:center;background-image: linear-gradient(#e72b38, #e72b80);-webkit-background-clip: text;-webkit-text-fill-color: transparent;" class="card-text" onclick="myAddBlock()">Creare un gruppo</p>
        @endif
        
    </div>
    </br>
    </br>
    <div class="row_3">
        <div class="card-deck">
            </br>
            @foreach($groups->get() as $group)
            
                <a href="{{ url('/group/'.$group->id) }}">
                <div class="card">
                    <img class="card-img-top" src="{{asset('storage/'.$group->hobby->admin_photo)}}" alt="Card image cap">
                    <div class="card-body">
                    @if($group->hobby->admin_id == $user->id) <p style="color:#e72b38;">ADMIN</p> @endif
                        <h5 class="card-title">{{ $group->hobby->name }} </br> {{ $group->hobby->category }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $group->countPeople() }}</small></p>
                    @if($group->hobby->admin_id == $user->id) 
                        <div style="display:flex; justify-content:center;">
                        <form action="{{ url('/group/delete')  }}" method="post">
                            @csrf
                            <input type="hidden" id="group_hobby_id" name="group_hobby_id" value="{{$group->hobby->id}}">
                            <button class="btn btn-secondary">
                                Cancella
                            </button>
                        </form>
                        </div>
                    @endif
                    </div>
                </div>
                </a>
            @endforeach
        </div> 
        @if($errors->any())
            <h4>{{$errors->first()}}</h4>
        @endif
        </br>
        </br>
        </br>
        </br>
    </div>
    </br>
    </br>
    </br>
    </br>
</div>
</br>
</br>
</br>
</br>

<script>
function myAddBlock() {
  var x = document.getElementById("addBlock");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

@endsection
