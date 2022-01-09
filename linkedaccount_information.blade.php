
@push('after-styles')
<style>



    input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: black;
        font-size:14px;
        padding-left:10px;
    }   

    select{
        border: 2px solid #F7F5F8 !important;
        outline: none !important;
        scroll-behavior: smooth;
        box-shadow: none !important;
        -webkit-box-shadow: none !important;
        -moz-box-shadow: none !important;
        color:black !important;
    }

    .btn{
        font-size:14px;
        display: flex;
        justify-content: flex-start;
        color: black;
        margin-bottom: 15px;
        border: 2px solid #F7F5F8;
        border-radius: 5px;
        box-shadow: none;
    }

    .link_form_flex{
        display: flex;
        flex-direction: column;
    }
    

    @media screen and (max-width: 700px) {

        .field-icon {
  float: right;
  margin-left: 74vw;
    margin-top: -28px;
  position: relative;
  z-index: 2;
}

        #create_new_group_bar{
            margin-top:-130px;
        }
        input{
            border: 2px solid #F7F5F8;
            box-shadow: none;
            border-radius:5px;
            padding:5px;
            width:80vw;
            font-size:12px;
            margin:5px;
        }   
    }

    @media screen and (min-width: 700px) {

        .field-icon {
  float: right;
  margin-left: 360px;
    margin-top: -25px;
  position: relative;
  z-index: 2;
}
        
        #create_new_group_bar{
            margin-top:-130px;
        }

        input{
            border: 2px solid #F7F5F8;
            box-shadow: none;
            border-radius:5px;
            padding:5px;
            width:400px;
            font-size:12px;
            margin-top:10px;
        }
    }

</style>

@endpush


<div>   
    <div id="create_new_group_bar">
        <form enctype="multipart/form-data" action="{{ url('link-account')  }}"  method="POST">
                @csrf  
                    <div class="link_form_flex">
                        <input style="visibility:hidden;" type="text" name="first_name"  placeholder="Nome" value="{{ $user->first_name }}"> 
                        <input style="visibility:hidden;" type="text" name="last_name"  placeholder="Cognome" value="{{ $user->last_name }}">
                        {{--<input type="text" id="username" name="username"  placeholder="Username"> --}}
                        <input type="email" id="email" name="email" required placeholder="Email">

                        
                        <input placeholder="Password" type="password"  name="password" id="password"  data-toggle="password">  
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                
                        </br>
              
                        {{--<input placeholder="Confirm Password" type="password"  name="password_confirmation" id="password_confirmation"  data-toggle="password">  
                        <span toggle="#password_confirmation" class="fa fa-fw fa-eye field-icon toggle-password"></span>      --}}
                        <div style="visibility:hidden;">
                            <label class="inside_selector">
                                <span class="kt-option__control">
                                    <span class="kt-radio kt-radio--check-bold">
                                        <input type="radio" name="register_as" value="influencer" checked="">
                                        <span class="selector_dot"></span>
                                    </span>
                                </span>
                                <span class="kt-option__label">
                                    <span class="kt-option__head">
                                        <span class="kt-option__title">Influencer
                                            {{--@lang('applicazione.iscrizione_brand')--}}
                                        </span>
                                    </span>
                                </span>
                            </label>
                            <label class="inside_selector">
                                <span class="kt-option__control">
                                    <span class="kt-radio kt-radio--check-bold">
                                        <input type="radio" name="register_as" value="brand">
                                        <span class="selector_dot"></span>
                                    </span>
                                </span>
                                <span class="kt-option__label">
                                    <span class="kt-option__head">
                                        <span class="kt-option__title">Azienda
                                            {{--@lang('applicazione.iscrizione_brand')--}}
                                        </span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div style="display:flex; justify-content:center;">
                            <button type="submit" style="width:25%; justify-content:center;" class="btn btn-secondary">Crea</button>
                        </div>
                    </div>
                </form>
    </div>   
</div>
   
@push('after-scripts')
<script>
  $(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>
   @endpush
    




