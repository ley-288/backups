
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
        justify-content: center;
        color: black;
        margin-bottom: 15px;
        border: 2px solid #F7F5F8;
        border-radius: 5px;
        box-shadow: none;
    }
    

    @media screen and (max-width: 1024px) {

        #create_new_group_bar{
            margin-top:-80px;
        }
        input{
            border: 2px solid #F7F5F8;
            box-shadow: none;
            border-radius:5px;
            padding:5px;
            width:80vw;
            font-size:12px;
        }   
    }

    @media screen and (min-width: 1024px) {
        
        #create_new_group_bar{
            margin-top:-100px;
        }

        input{
            border: 2px solid #F7F5F8;
            box-shadow: none;
            border-radius:5px;
            padding:5px;
            width:400px;
            font-size:12px;
        }
    }

</style>

@endpush


<div>   
    <div id="create_new_group_bar">
        <form action="/social/{username}/save/group" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Gruppo Nome">
            </br>
            </br>
                <select class="form-control" name="categorie" style="width: 100%">
                    @foreach($hobbies as $hobby)
                        @if( $hobby->default == 1 )
                            <option value="{{ $hobby->name }}">{{ $hobby->name }}</option> 
                        @endif 
                    @endforeach
                </select>
                </br>
            <button type="submit" class="btn btn-secondary">Vai</button>
        </form>
    </div> 
</div>
   
