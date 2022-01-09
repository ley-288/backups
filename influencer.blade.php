@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('Influencer'))
@push('after-styles')

<link href="css/login-1.css" rel="stylesheet" type="text/css">
<link href="css/c4s.css" rel="stylesheet" type="text/css">

<style>

body {
  scroll-snap-type: y mandatory;
}

    ::-webkit-input-placeholder {
        color:#ACB0C5;
    }

    ::-moz-placeholder {
        color:#ACB0C5;
    }

    ::-ms-placeholder {
        color:#ACB0C5;
    }

    ::placeholder {
        color:#ACB0C5;
    }

    .kt-radio>span{
        border:1px solid white;
    }

    .kt-radio>input:checked~span {
        border:1px solid white;
    }

    .kt-radio>span:after {
        border: solid white;
        background: white;
    }

    .kt-login.kt-login--v1 .kt-login__wrapper .kt-login__body .kt-login__form .kt-form .form-group .form-control{
        border:1px solid white;
    }

    INPUT[type="text"]:focus,
    INPUT[type="number"]:focus,
    INPUT[type="email"]:focus,
    INPUT[type="search"]:focus,
    INPUT[type="password"]:focus,
    INPUT[type="range"]:focus
    {
        outline: 1px solid transparent;    
    }​

    .im_pro_home:hover{
    	transition:0.2s;
    	transform: scale(1.1);
    }

    .g-recaptcha{
        transform:scale(0.55);
        transform-origin:0 0;
    }


    .kt-quick-panel--right{
        background-color:#e72b38;
    }

    label.kt-option {
        cursor: pointer;
        transition: all 0.35s 
    }

    label.kt-option:hover{
        box-shadow: 1px 1px 20px 1px rgba(0,0,0,0.08);
    }

    .register-btn{
        background-color:#ea2b38;
        border:2px solid transparent;
    }
    
    .register-btn:hover{
        background-color:#ea2b38;
        border:2px solid transparent;
        transition:0.2s;
        transform: scale(1.1);
    }


    @media screen and (min-width: 480px) {

        #block-0{
            position:absolute; margin-top:250px; height:500px; width:100vw; background-color:#e72b38;
        }
        #block-1{
            position:absolute; margin-top:700px; height:800px; width:100vw; background-color:white; padding-top:50px;padding-bottom:50px;
        }
        #block-2{
            position:absolute; margin-top:2000px; height:700px; width:100vw; background-color:#e72b38; padding-top:50px;padding-bottom:50px;
        }
        #block-3{
            position:absolute; margin-top:2700px; height:600px; width:100vw; background-color:white; padding-top:50px;padding-bottom:50px;
        }
        #block-4{
            position:absolute; margin-top:3300px; height:150px; width:100vw; background-color:#e72b38; padding-top:50px;padding-bottom:50px;
        }

        #register_form_block{
            margin-top:3900px;
            }

        #overall_body{
            margin-top:310px;
            }
        
        #phrase_lungo_1{
            margin-top:25px; 
            margin-left:150px;
            margin-right:150px;
            font-size:26px;
            text-align:center;
            }
        
        #phrase_lungo_2{
            position:absolute;
            margin-top:0px; 
            margin-left:53%;
            width:480px;
            font-size:26px;
            text-align:center;
            }
        
         #phrase_lungo_3{
            margin-top:-10px;
            margin-left:150px;
            margin-right:150px;
            font-size:22px;
            text-align:center;
            }
        
        #phrase_lungo_4{
            margin-top:25px;
            margin-left:150px;
            margin-right:150px;
            font-size:22px;
            text-align:center;
            }

         #phrase_lungo_5{
            margin-top:25px;
            margin-left:150px;
            margin-right:150px;
            font-size:22px;
            text-align:center;
            }

        #phrase_lungo_right{
            position:absolute;
            width:200px;
            margin-top:400px;
            margin-left:15%;
            font-size:20px;
            text-align:left;
            }
        
        #phrase_lungo_6{
            margin-left:150px;
            margin-right:150px;
            font-size:26px;
            text-align:center;
            margin-top:600px;
            }
        
         #phrase_lungo_ul_1{
            margin-left:100px;
            margin-right:100px;
            font-size:22px;
            text-align:left;
            }
        
        #phrase_lungo_ul_2{
            margin-left:100px;
            margin-right:100px;
            font-size:22px;
            text-align:left;
            }
        
        
        #fotogramma_left{
            position:absolute;
            margin-left:8%;
            border:5px solid #5979FB;
            border-radius:10px;
            height:70%;
            width:40%;
            }

        #fotogramma_center{
            position:absolute;
            margin-left:22%;
            margin-top:-500px;
            border:5px solid #5979FB;
            border-radius:10px;
            height:60%;
            width:50%;
        }

        #fotogramma_right{
            position:absolute;
            margin-left:-480px;
            margin-top:-600px;
            border:5px solid #5979FB;
            border-radius:10px;
            height:280%;
            width:50%;
        }

        .kt-login.kt-login--v1 .kt-login__wrapper .kt-login__body{
            height:0;
            }

        .space_between_logo_and_name{
            margin-top:20px;
            }

        .space_between_social_and_name{
            margin-top:-50px;
            }

        .main_img_height{
            height:55px;   
            }

        .g-recaptcha.mt-3{
            margin-left:37%;
            }

        #sub_head_hai{
            text-align:center;
            margin-left:auto;
            margin-right:auto;
            margin-top:10px;
            }

        .social_btn_container_class{
            display:block;
            margin-left:140px;
            margin-right:136px;
            margin-top:30px;
            }

        #social_login_btn{
            max-width:170px;
            border-radius:25px;
            height:35px;
            margin-top:-5px;
            }

        #login_btn_position {
            margin-right:40px;
            }

        #overhead_logo{
            margin-top:10px;
            }

        #remember_box {
            margin-left:60px;
            }

        #register_diment{
            margin-left:10px;
            margin-top:5px;
            }

        .email_bar{
            border-radius:50px;
            border:0px solid white;
            max-width:380px;
            max-height:45px;
            }

        .pass_bar{
            border-radius:50px;
            border:0px solid white;
            padding-left:15px;
            width:380px;
            height:45px;
            }

        .eye_bar{
            margin-left:460px;
            margin-top:-40px;   
            }

        .role_box{
            max-width:420px;
            margin-top:70px;
            margin-left:50px;
            }

        #register_btn_register_page{
            display:block;
            margin-left:auto;
            margin-right:auto;
            max-width:250px;
            height:45px;
            }

        #register_btn_register_page:hover{
            transform: scale(1.1);
            }

        #social_login_btn:hover{
            transform: scale(1.1);
            }

        .space_between_options{
            margin-left:50px;
            }

        .space_between_password{
            margin-top:15px;
            }

        .inside_selector{
            background-color:#e72b38; 
            color:white;
            border-radius:25px; 
            height:35px;
            width:163px;
            font-size:14px;
            padding-top:8px;
            padding-left:10px;
            border:1px solid #e72b38;
            margin-left:-10px;
            }

        .selector_dot{
            margin-top:-5px;
            }

        .login_btn_login_page{
            display:block;
            margin-left:auto;
            margin-right:auto;
            }

        .login_btn_login_page:hover{
            transform: scale(1.1);
            }

        .register_btn_position{
            margin-top:-30px;
            }

        #ho_letto_box{
            margin-left:40px;
            }

        #ho_letto_text{
            font-size: 0.5em;
            }
        
        #cliccando_text{
            font-size: 0.5em;
            padding-left:150px;
            padding-right:150px;
            }

        #social_and_privacy{
            margin-top:-70px;
            }

    }

    @media screen and (max-width: 480px) {

        #block-0{
            position:absolute; margin-top:340px; height:300px; width:100vw; background-color:#e72b38; scroll-snap-align: start;
        }
        #block-1{
            position:absolute; margin-top:450px; height:850px; width:100vw; background-color:white; scroll-snap-align: start;
        }
        #block-2{
            position:absolute; margin-top:1100px; height:800px; width:100vw; background-color:#e72b38; scroll-snap-align: start;
        }
        #block-3{
            position:absolute; margin-top:1900px; height:800px; width:100vw; background-color:white; scroll-snap-align: start;
        }
        #block-4{
            position:absolute; margin-top:2350px; height:400px; width:100vw; background-color:#e72b38; scroll-snap-align: start;
        }

         #phrase_lungo_1{
            margin-top:35px; 
            font-size:12px;
            text-align:center;
            }
        
        #phrase_lungo_2{
            position:absolute;
            margin-top:205px; 
            margin-left:-5px;
            margin-right:5px;
            font-size:12px;
            text-align:center;
            }

        #phrase_lungo_3{
            position:absolute;
            margin-left: -10px;
            margin-right: 5px;
            font-size:12px;
            text-align:center;
            }

        #phrase_lungo_4{
            position:absolute;
            margin-top:200px;
            margin-left: -10px;
            margin-right: 5px;
            font-size:12px;
            text-align:center;
            }

        #phrase_lungo_5{
            position:absolute;
            font-size:12px;
            text-align:center;
            }
        
        #phrase_lungo_6{
            position:absolute;
            margin-top:290px;
            margin-left:5px;
            margin-right:5px;
            font-size:12px;
            text-align:center;
            }
        
        #phrase_lungo_ul_1{
            position:absolute;
            margin-top:350px;
            margin-left:-15px;
            text-align:left;
            font-size:12px;
            }

        #phrase_lungo_ul_2{
            position:absolute;
            margin-left:-15px;
            margin-top:50px;
            text-align:left;
            font-size:12px;
            }

        #fotogramma_left{
            position:absolute;
            margin-top:-20px;
            margin-left:5%;
            border:5px solid #5979FB;
            border-radius:10px;
            height:60%;
            width:80%;
        }
        #fotogramma_right{
            position:absolute;
            margin-left:-200px;
            margin-top:-300px;
            border:5px solid #5979FB;
            border-radius:10px;
            height:350%;
            width:100%;
        }
        #fotogramma_center{
            position:absolute;
            margin-left:5%;
            margin-top:0px;
            border:5px solid #5979FB;
            border-radius:10px;
            height:23%;
            width:80%;
        }

        #register_form_block{
            margin-top:2700px;
            scroll-snap-align: start;
        }

        .kt-login.kt-login--v1 .kt-login__wrapper .kt-login__body{
            height:0;
            }

        #ho_letto_box{
            margin-top:-3px;
            }

        #ho_letto_text{
            font-size: 0.6em;
            } 
        
        #cliccando_text{
            margin-top:-20px;
            font-size: 0.5em;
            padding-left:30px;
            padding-right:30px;
            padding-bottom:10px;
            }

        #overall_body{
            margin-top:265px;
            }

        .space_between_logo_and_name{
            margin-top:10px;
            }

        .space_between_social_and_name{
            margin-top:-30px;
            }

        .main_img_height{
            height:55px;   
            }

        .g-recaptcha.mt-3{
            margin-left:23%;
            }

        #sub_head_hai{
            text-align:center;
            margin-left:auto;
            margin-right:auto;
            margin-top:15px;
            }

        .social_btn_container_class{
            margin-left:38px;
            margin-right:38px;
            }

        #social_login_btn{
            max-width:120px;
            border-radius:25px;
            }

        #overhead_logo{
            margin-top:0px;
            scroll-snap-align: start;
            }

        #login_btn_position {
            margin-right:0px;
            }

        #remember_box {
            margin-left:20px;
            }

        #register_diment{
            margin-left:10px;
            }   

        .email_bar{
            border-radius:50px;
            border:0px solid white;
            max-width:250px;
            max-height:35px;
            }

        .pass_bar{
            border-radius:50px;
            border:0px solid white;
            padding-left:15px;
            max-width:250px;
            height:35px;
            }

        .eye_bar{
            margin-left:240px;
            margin-top:-35px;
            }

        .role_box{
            max-width:220px;
            margin-top:55px;
            padding-bottom:5px;
            display:block;
            margin-left:auto;
            margin-right:auto;
            }

        #register_btn_register_page{
            display:block;
            margin-left:auto;
            margin-right:auto;
            margin-top:-40px;
            max-width:165px;
            text-align:center;
            font-size:12px;
            height:45px;
            }

        .space_between_options{
            margin-left:10px;
            }

        .space_between_password{
            margin-top:10px;
            }

        .inside_selector{
            background-color:#e72b38; 
            color:white;
            border-radius:25px; 
            height:35px; 
            width:120px;
            font-size:12px;
            padding-top:10px;
            padding-left:20px;
            border:1px solid #e72b38;
            margin-left:-8px;
            }

        .selector_dot{
            margin-top:-4px;
            }

        .login_btn_login_page{
            display:block;
            margin-left:auto;
            margin-right:auto;
            }

        .register_btn_position{
            margin-top:10px;
            }

        #social_and_privacy{
            margin-top:-60px;
            }
 
    }


</style>

@endpush
@push('after-scripts')
<script src="{{url('/')}}/js/show-password.min.js" type="text/javascript"></script>
@if($errors->any())
<script>
    document.getElementById('register-form').scrollIntoView(true);
</script>
@endif
@endpush
@section('content')



<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            <!--begin::Aside-->
            <!--begin::Aside-->
            <!--begin::Content-->

            <div id="overhead_logo" style="height:200px; background-color:#e72b38;" class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div>
                    <div>
                    <a href="#" class="kt-login__logo">
                        <img class="main_img_height" style="display:block; margin:0 auto;" src="./assets/media/logos/new/logo-bianco.svg">
                    </a>
                    <p id="phrase_lungo_1" style="color:white;">
                    
                        Vorresti guadagnare o guadagnare di più con quello che già fai? </br>
                        Sei un influencer anche alle prime armi? </br>
                        Allora <strong>Spidergain</strong> può aiutarti a monetizzare il tuo lavoro o il tuo hobby.

                    </p>
                    </div>
                </div>
                <div class="space_between_logo_and_name"></div>   
            </div>

             <div id="block-0" class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div>
                    <div>
                    <img id="fotogramma_left" src="./assets/media/logos/Fotogramma_Aziende_1.png">
                    
                    <p id="phrase_lungo_2" style="color:white;">

                        Tantissime aziende locali hanno bisogno di visibilità, hanno bisogno di pubblicità.
                        </br></br>
                         Tu potresti aiutarle in cambio di un compenso!
                        </br></br>
                        Puoi guadagnare anche con solo pochi amici, follower o lettori.

                    </p>
                    </div>
                </div>
                <div class="space_between_logo_and_name"></div>   
            </div>

            <div id="block-1" class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div>
                    <div>
                    <p id="phrase_lungo_3" style="color:black;">

                    Hai 100 amici o follower su Facebook, vivi in una piccola città e pensi: con solo 100 amici o follower, come posso guadagnare con il mio profilo social? Immaginiamo ora che per esempio nella stessa città qualcuno abbia aperto un nuovo ristorante che non è ancora conosciuto.
                    Il ristoratore si chiederà: Come arrivo alle persone di questa città per far conoscere il mio ristorante e fargli capire che qui si mangia bene?
                    Il ristoratore sarebbe felice di poter far sapere ai tuoi 100 amici che da lui si mangia bene. Sarebbe ancora più felice se lo facessi TU attraverso il tuo canale Facebook. Sa benissimo che le persone che ti seguono e ti conoscono, ascoltano volentieri un tuo consiglio. E lo sappiamo tutti che il passaparola è lo strumento di pubblicità più potente che esiste.
                    </br></br>
                    <strong>Quindi?</strong>
                    </br></br>
                    <strong>Spidergain</strong> vi mette in contatto, il ristoratore portrebbe proporti una cena con uno sconto altissimo o anche a costo zero per farti conoscere la qualità del suo prodotto e sevizio.
                    </br>
                    Tu parli bene del ristorante sui tuoi canali con un post o una recensione, il ristoratore raggiunge l’obiettivo di essere conosciuto da nuovi possibili clienti.
                    Ecco perché anche con pochi follower o amici potresti avere un grande valore per chi ha un’attività.
                    La stessa cosa la puoi moltiplicare all'infinito, per qualunque attività e magari specializzarti nel tempo in un settore specifico (moda, tecnologia, food, fitness e molti altri).
                    </br>
                    <strong>Ovviamente</strong>, se tu hai già migliaia di amici, follower, lettori e più canali social, potrai anche concordare compensi interessanti.
                    </br>

                    </p>
                    </div>
                </div>
                <div class="space_between_logo_and_name"></div>   
            </div>

            <div id="block-2" class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div>
                    <div>
                    <img id="fotogramma_center" src="./assets/media/logos/Fotogramma_Aziende_2.png">
                    <p id="phrase_lungo_4" style="color:white;">
                    
                    È appena partito e stiamo raccogliendo le iscrizioni di tutti gli influencer, di coloro che lo vogliono diventare e anche di chi vuole semplicemente guadagnare qualcosa in più.
                    </br>
                    Ci sono opportunità per tutti, professionisti e non.
                    </br>        
                    Nel caso ti chiedessi: Perché dovrei iscrivermi?
                    <ul id="phrase_lungo_ul_1" style="color:white;">
                        <li> <strong>ZERO RISCHI: NON</strong> ti vendiamo nulla, <strong>NON</strong> ti proponiamo nulla,<strong> NON</strong> ci sono abbonamenti o rinnovi automatici nascosti.
                        </br></br>
                        <li> <strong>PUOI GUADAGNARE CON LA TUA PASSIONE:</strong> Puoi guadagnare facendo pubblicità per aziende che te lo chiedono. Puoi scegliere tu se farla o meno. Hai tutta la libertà di scelta. Se ti piace il progetto lo fai se non ti piace rifiuti.
                        </br></br>
                        <li> <strong>CRESCITA COME INFLUENCER:</strong> Stiamo realizzando delle video guide <strong>GRATUITE</strong> e tutorial che ti aiuteranno a far crescere il tuo account social, il tuo blog, la tua visibilità e di conseguenza il valore che hai per le aziende.
                        </br></br>
                        <li> <strong>L’ISCRIZIONE E’ GRATUITA:</strong> E non solo! Anche tutti i servizi in <strong>Spidergain</strong> sono <strong>GRATUITI!</strong> Ti vogliamo nella nostra piattaforma perchè più saremo più aumenterà la possibilità di business per tutti!
                    </ul>
                    
                    </p>
                    </div>
                </div>
                <div class="space_between_logo_and_name"></div>   
            </div>

            <div id="block-3" class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div>
                    <div>
                    <p id="phrase_lungo_5" style="color:black;">
                    
                    La piattaforma che abbiamo realizzato è semplice e intuitiva:
                    <ul id="phrase_lungo_ul_2" style="color:black;">
                        <li> L’azienda interessata si iscrive a <strong>Spidergain</strong>.
                        <li> Cerca persone che possono promuovere i suoi prodotti, i servizi o semplicemente farla conoscere.
                        <li> Come risultato, le viene visualizzato un elenco di utenti e influencer che corrispondono alle caratteristiche della campagna pubblicata.
                        <li> L’azienda può contattare questi utenti o influencer spiegando di cosa ha bisogno e chiedendo di fare un’offerta per fargli pubblicità nei propri canali social.
                        <li> Se tu sei uno di quelli contattati, puoi portare avanti la trattativa economica ricordando che più persone puoi raggiungere più è alto il tuo valore.
                        <li> Tu e l’azienda stabilite il prezzo, la modalità di esecuzione dei servizi e il metodo di pagamento.
                        <li> Dopo la tua esecuzione della pubblicità concordata l’azienda ti paga e ti lascia una recensione del tuo servizio.
                        <li> Il pagamento avviene fuori dal portale per cui il guadagno è tutto tuo.
                    </ul>
                    </br>
                    
                    </p>
                    </div>
                </div>
                <div class="space_between_logo_and_name"></div>   
            </div>

            <div id="block-4" class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div>
                    <div>
                    <p id="phrase_lungo_6" style="color:white;">
                    
                    Ancora non hai creato il tuo profilo su <strong>Spidergain</strong>?
                    </br>
                    Cosa stai aspettando? 
                    </br>
                    <strong>Registrati Subito!</strong>
                    <img id="fotogramma_right" src="./assets/media/logos/Fotogramma_Aziende_3.png">
                    </p>
                    </div>
                </div>
                <div class="space_between_logo_and_name"></div>   
            </div>

            <!--end::Content-->
        </div>
    </div>
</div>








<div id="register_form_block" class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            <!--begin::Aside-->
            <!--begin::Aside-->
            <!--begin::Content-->
            <div id="overhead_logo" style="height:100%; background-color:#e72b38;" class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                <div class="space_between_logo_and_name"></div>   
                <!--begin::Body-->
                <div id="overall_body" class="kt-login__body">
                    <!--begin::Signin-->
                    <div id="register-form" class="kt-login__form">
                    <div class="space_between_social_and_name"></div>
                      @include('includes.partials.messages')  
                        {{ html()->form('POST', route('frontend.auth.register.post'))->class('kt-form')->open() }}
                        <div style="display:flex; justify-content:center;" class="row">
                                    {{ html()->text('first_name')
                                        ->style('background-color:white;')
                                        ->class('email_bar')
                                        ->class('form-control')
                                        ->placeholder(__('applicazione.nome'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                        </div>
                        <div style="margin-top:10px;"></div>
                        <div style="display:flex; justify-content:center;" class="row">
                                    {{ html()->text('last_name')
                                        ->style('background-color:white;')
                                        ->class('email_bar')
                                        ->class('form-control')
                                        ->placeholder(__('applicazione.cognome'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                        </div><!--row-->
                        <div style="margin-top:-5px;"></div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->email('email')
                                        ->style('background-color:white; display:block; margin-right:auto; margin-left:auto;')
                                        ->class('email_bar')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        <div style="margin-top:10px;"></div>
                        <div class="row"></div>                       
                        <div class="selector_box_left_and_right">
                            <div class="col">
                                <div class="form-group">
                                    <!-- {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}-->
                                    <div class="pass_eye" class="input-group">    
                                        <input class="pass_bar" style="display:block; margin-left:auto; margin-right:auto; border-radius:50px; background-color:white;" placeholder="{{__('validation.attributes.frontend.password')}}" type="password" required name="password" id="password" class="form-control" data-toggle="password">   
                                        <div class="eye_bar" class="input-group-append">
                                            <span style="background-color:transparent; border:1px solid transparent; height:36px; width:36px; border-radius:18px;" class="input-group-text">                     
                                            <i class="fa fa-eye"></i>
                                            </span> 
                                        </div>
                                    </div>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        <div class="space_between_password"></div>
                        <div style="display:block; margin-right:auto; margin-left:auto;" class="row">
                            <div class="col">
                                <div class="form-group">
                                    <!-- {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}-->
                                    <div class="pass_eye" class="input-group">    
                                    <input class="pass_bar" style="display:block; margin-left:auto; margin-right:auto; border-radius:50px; background-color:white;" placeholder="{{__('validation.attributes.frontend.password_confirmation')}}" type="password" required name="password_confirmation" id="password_confirmation" class="form-control" data-toggle="password">   
                                        <div class="eye_bar" class="input-group-append">  
                                        <span style="background-color:transparent; border:1px solid transparent; height:36px; width:36px; border-radius:18px;" class="input-group-text">                     
                                        <i class="fa fa-eye"></i>
                                        </span>
                                        </div> 
                                    </div>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        <div style="margin-top:-45px;"></div>
                        {{--<span style="color:#DEDEDE; font-size:8px; display:table; margin-left: auto; margin-right:auto;margin-top:5px;">@lang('auth.password_rules')</span>--}}
                        <div style="display:table; margin-left:auto; margin-right:auto;" class="row">
                            <div class="col">
                                <div class="role_box" class="form-group">
                                    <div class="row">
                                        <div class="col-m-4">
                                            <label style="display:none;" class="inside_selector">
                                                <span class="kt-option__control">
                                                    <span
                                                        class="kt-radio kt-radio--check-bold">
                                                        <input type="radio"
                                                               name="register_as"
                                                               value="influencer" checked="">
                                                        <span class="selector_dot"></span>
                                                    </span>
                                                </span>
                                                <span class="kt-option__label">
                                                    <span class="kt-option__head">
                                                        <span
                                                            class="kt-option__title">Persona
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="space_between_options"></div>
                                        <div style="display:none;" class="col-m-4">
                                            <label class="inside_selector">
                                                <span class="kt-option__control">
                                                    <span
                                                        class="kt-radio kt-radio--check-bold">
                                                        <input type="radio"
                                                               name="register_as"
                                                               value="brand">
                                                        <span class="selector_dot"></span>
                                                    </span>
                                                </span>
                                                <span class="kt-option__label">
                                                    <span class="kt-option__head">
                                                        <span
                                                            class="kt-option__title">Azienda
                                                        </span>
                                                    </span>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        <p id="cliccando_text" style="text-align:center; color:#DEDEDE;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cliccando 'Registrati', accetto i termini e le condizioni le <a href="{{route('frontend.termini')}}" style="color:white;text-decoration: underline;">note legali</a>, la nostra policy sulla <a target="_blank" href="{{route('frontend.privacy')}}" style="color:white;text-decoration: underline;">privacy</a> e la nostra policy sui <a href="{{route('frontend.cookie')}}" style="color:white;text-decoration: underline;">Cookie</a></p>
                        <div class="register_btn_position"></div>
                        <div id="register_btn_register_page" class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    <div class="kt-login__actions">
                                    {{ form_submit(__('labels.frontend.auth.register_button'))->class('login_btn_login_page')->style('font-size:13px; max-height:35px; border-radius:25px; border:1px solid white;background-color:white; color:red;')->class('btn btn-primary btn-elevate kt-login__btn-primary')->id('kt_login_signin_submit') }}
                                    </div>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        <div class="row">
                        {{--<div class="col">
                            <div class="social_btn_container_class">
                            <p id="register_diment" style="text-align:center; color:#DEDEDE;font-size:10px;">Se vuoi registrati con..</p>
                                <div class="kt-login__options">
                                    <a href="{{url('/')}}/login/google" id="social_login_btn" class="btn btn-secondary kt-btn" style="background-color:white;">
                                        <i class="fab fa-google"></i>
                                            Google                              
                                    </a>
                                    <a href="{{url('/')}}/login/facebook" id="social_login_btn" class="btn btn-primary kt-btn">
                                        <i class="fab fa-facebook-f"></i>
                                            Facebook
                                    </a>
                                </div>
                            </div>
                        </div>--}}
                    </div>
                    <div id="sub_head_hai">
                    <span style="color:#DEDEDE; font-size:9px;">Hai già un account?</span>&nbsp;&nbsp;
                    <a href="{{route('frontend.auth.login')}}" style="color:white; font-size:9px;" class="kt-link kt-login__signup-link">Effettua il login</a>
                    </div>
                        </br>                      
                        {{ html()->form()->close() }}
                    <div id="social_and_privacy">
                        <div style="display:table; margin-left:auto; margin-right:auto; margin-top:20px; font-size:12px; color:#DEDEDE;" class="kt-login__copyright">
                            &copy 2021 Spidergain &nbsp;&nbsp;&nbsp;
                            <a style="color:#DEDEDE;" href="{{route('frontend.privacy')}}" class="kt-link">Privacy</a>&nbsp;&nbsp;&nbsp;
                            <a style="color:#DEDEDE;" href="{{route('frontend.termini')}}" class="kt-link">{{__('applicazione.termini')}}</a>
                        </div>
                        <div style="display:table; margin-left:auto; margin-right:auto;">
                        <a href="https://www.facebook.com/spidergain/">
                        <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/facebook_white.png" alt="Facebook" style="height:20px; width:20px;margin-left:10px;margin-top:10px;">
                        </a>
                        <a href="https://www.youtube.com/channel/UCTq1jq0PcHl3eAmxGskHtlw/playlists">
                        <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/youtube_white.png" alt="YouTube" style="height:20px; width:20px;margin-left:10px;margin-top:10px;">
                        </a>
                        <a href="https://www.twitter.com/spidergain/">
                        <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/twitter_white.png" alt="Twitter" style="height:20px; width:20px;margin-left:10px;margin-top:10px;">
                        </a>
                        <a href="https://www.linkedin.com/company/spidergain/">
                        <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/linkedin_white.png" alt="LinkedIn" style="height:20px; width:20px;margin-left:10px;margin-top:10px;">
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.x5.spidergaindefinitivo">
                        <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/playstore_white.png" alt="Playstore" style="height:20px; width:20px;margin-left:10px;margin-top:10px;">
                        </a>
                        <a href="https://apps.apple.com/gb/app/spidergain/id1575927336">
                        <img class="im_pro_home" src="{{url('/')}}/assets/media/icons/socialbuttons/apple_white.png" alt="AppStore" style="height:20px; width:20px;margin-left:10px;margin-top:10px;">
                        </a>
                        </div> 
                        </br></br>
                    </div><!--end::Form--><!--end::Options-->
                    </div> <!--end::Signin-->
                </div> <!--end::Body-->
            </div><!--end::Content-->
        </div>
    </div>
</div>



@endsection

@push('after-scripts')

@endpush