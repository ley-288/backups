<?php

namespace App\Http\Controllers\Frontend\Campagne;

use App\Models\App\Campagna;
use App\Http\Requests\Frontend\Campagna\StoreCampagna;
use App\Http\Controllers\Controller;
use App\Models\App\Categorie;
use Auth;
use App\Models\Auth\User;
use App\Models\CampagnaLocation;
use App\Models\CampagnaSave;
use Illuminate\Support\Facades\DB;
use App\Models\App\Richiesta;
use App\Models\App\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Response;
use App\Mail\RichiestaInviata;
use App\Mail\OffertaInviata;
use App\Mail\OffertaAccettata;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request as HttpRequest;
//use Illuminate\Http\Request;
use App\Models\App\Messaggio;
use App\Models\App\Allegati;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Frontend\Crediti\CreditiController;
use App\Http\Controllers\Frontend\Campagne\OfferController;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Config;
use App\Models\App\Visite;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use App\Library\GoogleMapsHelper;
use App\Library\sHelper;
use App\Models\City;
use App\Models\Country;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Support\Facades\Blade;

class CampagneController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($stato) {

        $user = Auth::user();

        $campagne = new Campagna;
        $campagne = $campagne->campagne($stato)->paginate(12);

        foreach ($campagne as $key => $item) {
            $item->setAttribute('canali_view', $this->canali(json_decode($item->canali, true)));
            $item->setAttribute('categorie', $this->getCategorie($item->id));
        }

        return view('frontend.campagne.campagne_campagne_aperte')->with('campagne', $campagne)->with('user', $user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Campagna $campagna) {
        $user = Auth::user();
        $categorie = Categorie::all();

        $linked_ids = DB::table('linked_accounts')->leftjoin('users', 'users.id','linked_id')->where('azienda_id',$user->id)->select('linked_accounts.linked_id','users.username','users.avatar_location')->get();
        $main_id = '';
        if(count($linked_ids) <= 0){
            $linked_ids1 = DB::table('linked_accounts')->where('linked_id',$user->id)->first();
            if($linked_ids1 != ''){
            $main_id = DB::table('linked_accounts')->leftjoin('users', 'users.id','azienda_id')->where('azienda_id',$linked_ids1->azienda_id)->select('linked_accounts.azienda_id','users.username','users.avatar_location')->first();
            // dd($main_id);
            $linked_ids = DB::table('linked_accounts')->leftjoin('users', 'users.id','linked_id')->where('azienda_id',$linked_ids1->azienda_id)->where('linked_id','!=',$user->id)->select('linked_accounts.linked_id','users.username','users.avatar_location')->get();
            }
        }
        return view('frontend.campagne.edit')->with('categorie', $categorie)->with('user', $user)->with('linked_ids', $linked_ids)->with('main_id', $main_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampagna $request) {
        $getDataOfSelectedUser = User::leftjoin('user_locations', 'user_id','=','users.id')->whereIn('users.id', $request->user_id)->where('user_locations.user_id','!=','')->get();
        //dd($getDataOfSelectedUser->toArray());
        $user = Auth::user();
        $data_inizio = \DateTime::createFromFormat('d/m/Y', $request->data_inizio);
            $data_fine = \DateTime::createFromFormat('d/m/Y', $request->data_fine);

            $request->merge(['canali' => json_encode($request->canali), 'data_inizio' => $data_inizio, 'data_fine' => $data_fine]);
            
        foreach ($getDataOfSelectedUser as $key => $value) {
            
            $dati = $request->all();
            $dati['descrizione'] = clean($dati['descrizione']);

            $campagna = new Campagna($request->all());

            $campagna->user_id = $value->id; 
            $campagna_uuid = $campagna->uuid;

            $allegati = [];
            $allegati['immagine_0'] = $request->immagine_0;
            $allegati['immagine_1'] = $request->immagine_1;
            $allegati['immagine_2'] = $request->immagine_2;
            $allegati['immagine_3'] = $request->immagine_3;
            $allegati['immagine_4'] = $request->immagine_4;
            $allegati['immagine_5'] = $request->immagine_5;
            $allegati['immagine_6'] = $request->immagine_6;
            $allegati['immagine_7'] = $request->immagine_7;
            $allegati = json_encode($allegati);
            
            $campagna->allegati = $allegati;

                $file_name = '';

                $file = $request->file('display_image');
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();
                if ($file->storeAs('/posts/', $file_name)) 
                $campagna->display_image = $file_name;
            
            $campagna->share = $request->share;
                if($request->share){
                    $campagne_post = new Post;
                    $campagne_post->user_id = $value->id;
                    $campagne_post->group_id = 0;
                    $campagne_post->content = "Test";
                    $campagne_post->has_image = 1;
                    $campagne_post->save();

                    $campagne_image = new PostImage;
                    $campagne_image->post_id =  $campagne_post->id;
                    $campagne_image->image_path = $file_name;
                    $campagne_image->save(); 
                }

            //$campagna->sponsored = 1;
            $campagna->location = $value->address;

            $campagna->save();

            $campagna->comuni()->attach($request->comuni);
            $campagna->categorie()->attach($request->categorie);

            $uuid = $campagna->uuid;

            $allegati = [];
            $allegati['immagine_0'] = $request->immagine_0;
            $allegati['immagine_1'] = $request->immagine_1;
            $allegati['immagine_2'] = $request->immagine_2;
            $allegati['immagine_3'] = $request->immagine_3;
            $allegati['immagine_4'] = $request->immagine_4;
            $allegati['immagine_5'] = $request->immagine_5;
            $allegati['immagine_6'] = $request->immagine_6;
            $allegati['immagine_7'] = $request->immagine_7;
            $allegati = json_encode($allegati);

            if ($request->h_allegato_1) {
                $nuovo_file = Allegati::where('id', $request->h_allegato_1)->first();

                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }
            if ($request->h_allegato_2) {
                $nuovo_file = Allegati::where('id', $request->h_allegato_2)->first();
                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }
            if ($request->h_allegato_3) {
                
                $nuovo_file = Allegati::where('id', $request->h_allegato_3)->first();
                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }
            if ($request->h_allegato_4) {
                
                $nuovo_file = Allegati::where('id', $request->h_allegato_4)->first();
                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }
            if ($request->h_allegato_5) {
                
                $nuovo_file = Allegati::where('id', $request->h_allegato_5)->first();
                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }
            if ($request->h_allegato_6) {
                
                $nuovo_file = Allegati::where('id', $request->h_allegato_6)->first();
                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }
            if ($request->h_allegato_7) {
                
                $nuovo_file = Allegati::where('id', $request->h_allegato_7)->first();
                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }
            if ($request->h_allegato_8) {
                
                $nuovo_file = Allegati::where('id', $request->h_allegato_8)->first();
                // if (Auth::user()->id !== $nuovo_file->autore_id) {
                //     abort(403, 'Unauthorized action.');
                // }
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->save();
            }

            if ($request->file1) {
                $filename = $uuid . 'file_1.' . $request->file('file1')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file1')->extension();
                $nuovo_file->posizione = 1;
                $nuovo_file->save();
            }
            if ($request->file2) {
                $filename = $uuid . 'file_2.' . $request->file('file2')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file2')->extension();
                $nuovo_file->posizione = 2;
                $nuovo_file->save();
            }
            if ($request->file3) {
                $filename = $uuid . 'file_3.' . $request->file('file3')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file3')->extension();
                $nuovo_file->posizione = 3;
                $nuovo_file->save();
            }
            if ($request->file4) {
                $filename = $uuid . 'file_4.' . $request->file('file4')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file4')->extension();
                $nuovo_file->posizione = 4;
                $nuovo_file->save();
            }
            if ($request->file5) {
                $filename = $uuid . 'file_5.' . $request->file('file5')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file5')->extension();
                $nuovo_file->posizione = 5;
                $nuovo_file->save();
            }
            if ($request->file6) {
                $filename = $uuid . 'file_6.' . $request->file('file6')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file6')->extension();
                $nuovo_file->posizione = 6;
                $nuovo_file->save();
            }
            if ($request->file7) {
                $filename = $uuid . 'file_7.' . $request->file('file7')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file7')->extension();
                $nuovo_file->posizione = 7;
                $nuovo_file->save();
            }
            if ($request->file8) {
                $filename = $uuid . 'file_8.' . $request->file('file8')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $value->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file8')->extension();
                $nuovo_file->posizione = 8;
                $nuovo_file->save();
            }
            

            $this->campagneLocationSave($value->latitud, $value->longitud, $campagna->id);
        
        }
       
        return redirect(route('frontend.user.cercacampagne'));
        
    }
    
    public function campagneLocationSave($latitud,$longitud,$campagnaID){
    
        $user = Auth::user();

       if (empty($latitud) || empty($longitud)){
            $response['code'] = 400;
        }else {
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $latitud . ',' . $longitud)
                ->get('results');

            //$campagna = campagna::find($campagnaID);
            
            $address = $map['results'][0]['formatted_address'];

            $country = GoogleMapsHelper::findCountry($map);

            $city = GoogleMapsHelper::findCity($map);
                        //dd($country,$city);
            if ($country && $city) {
                $country_name = $country['name'];
                $country_code = $country['short_name'];
                $lat = $latitud;
                $lon = $longitud;
                $city = $city['name'];

                $find_country = Country::where('code', $country_code)->first();
                $country_id = 0;
                if ($find_country) {
                    $country_id = $find_country->id;
                } else {
                    $country = new Country();
                    $country->name = $country_name;
                    $country->code = $country_code;
                    if ($country->save()) {
                        $country_id = $country->id;
                    }
                }

                $city_id = 0;
                if ($country_id > 0) {
                    $find_city = City::where('name', $city)->where('country_id', $country_id)->first();
                    if ($find_city) {
                        $city_id = $find_city->id;
                    } else {
                        $city_modal = new City();
                        $city_modal->name = $city;
                        $city_modal->zip = "1";
                        $city_modal->country_id = $country_id;
                        if ($city_modal->save()) {
                            $city_id = $city_modal->id;
                        }
                    }
                }

                if (!empty($lat) && !empty($lon) && !empty($city) && !empty($country_code) && !empty($city_id) && !empty($country_id)) {
                    sHelper::updateCampagnaLocation($campagnaID, $city_id, $lat, $lon, $address);
                }

            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid) {

        $user = Auth::user();

        $campagna = Campagna::where('uuid', $uuid)->with('users.dettagli')->with('comuni')->firstOrFail();

        $sent = DB::table('offers')
            ->where('offers.campagna_id', $campagna->id)
            ->where('offers.buyer_id', $user->id)
            ->where('sent_creator', null)
            ->join('users', 'users.id', '=', 'offers.buyer_id')
            ->get();

        $got = DB::table('offers')
            ->where('offers.campagna_id', $campagna->id)
            ->where('offers.creator_id', $user->id)
            ->join('users', 'users.id', '=', 'offers.creator_id')
            ->get();
        
        if (Auth::user()->hasRole('brand')) {
            if (Auth::user()->id != $campagna->user_id) {
                abort(403, 'Unauthorized action.');
            }
        } else {
           // Salva visita
            
            $visita = Visite::firstOrNew([
                'user_id' => Auth::user()->id,
                'campagne_id' => $campagna->id,
                'created_at_campagna' => $campagna->created_at,
            ]);
            $visita->save();
        }

        //notifications
        $update_all_a = DB::table('offers')
                ->where('buyer_id', $user->id)
                ->where('accepted_creator', 1)
                ->where('refused_creator', null)
                ->leftJoin('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->update(['offers.accepted_creator' => 2]);
        
         $update_all_a = DB::table('offers')
                ->where('buyer_id', $user->id)
                ->where('accepted_creator', null)
                ->where('refused_creator', 1)
                ->leftJoin('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->update(['offers.refused_creator' => 2]);


        $richieste = Richiesta::where('campagna_id', $campagna->id)->select('influencer_id')->get();


        //visualizza canali

        $canali = $this->canali(json_decode($campagna->canali, true));

        $days_tot = round((strtotime($campagna->data_fine) - strtotime($campagna->data_inizio)) / (60 * 60 * 24));

        $days_since_start = round((time() - strtotime($campagna->data_inizio)) / (60 * 60 * 24));

        $days_perc = ($days_since_start / $days_tot) * 100;
        $days_perc = ($days_perc > 100) ? 100 : $days_perc;
        $days_perc = ($days_perc < 0) ? 0 : $days_perc;
        $messaggi = Messaggio::where('campagna_id', $campagna->id)
                ->where('chat', 0)
                ->with('users.dettagli')
                ->get();
        $offerte_ricevute = Richiesta::where('accettata', 1)
                        ->where('campagna_id', $campagna->id)
                        ->whereNull('offerta_accettata')
                        ->whereNull('offerta_rifiutata')
                        ->with('users.dettagli')->get();
        $influencer_attivi = User::
                whereHas('richieste', function($q) use($campagna) {
                    $q->where('offerta_accettata', 1)
                    ->where('campagna_id', $campagna->id);
                })->with(['chat' => function($q) use ($campagna) {
                        $q->where('campagna_id', $campagna->id)
                        ->where('chat', 1);
                    }])
                ->with(['richieste' => function($q) use($campagna) {
                        $q->where('offerta_accettata', 1)
                        ->where('campagna_id', $campagna->id);
                    }])
                ->with(['recensioni' => function($q) use ($campagna) {
                        $q->where('campagna_id', $campagna->id);
                    }])->where('active',1)
                ->with('dettagli')
                ->get();
        $letto = true;
        
        foreach ($influencer_attivi as $key=>$item) {
           $letto = true;
            foreach ($item->chat as $chat) {
                
                if ($chat->autore_id != Auth::user()->id && $chat->letto == 0) {
                    $letto = false;
                    break;
                }
            }
           $item->letto = $letto;
        }
        

        $allegati = Allegati::where('campagna_id', $campagna->id)->get();
        $view = view('frontend.campagne.campagna_dettaglio')
                ->with('campagna', $campagna)
                ->with('canali_view', $canali)
                ->with('days_perc', $days_perc)
                ->with('messaggi', $messaggi)
                ->with('offerte_ricevute', $offerte_ricevute)
                ->with('influencer_attivi', $influencer_attivi)
                ->with('allegati', $allegati)
                ->with('sent', $sent)
                ->with('got', $got);
        if (Auth::user()->hasRole('brand')) {
            return $view;
        } else {
            $richiesta = Richiesta::where('campagna_id', $campagna->id)->where('influencer_id', $user->id)->first();
            $chat = Messaggio::where('campagna_id', $campagna->id)
                    ->where('chat', 1)
                    ->where('chat_influencer_id', Auth::user()->id)
                    ->with('users.dettagli')
                    ->get();
            $letto = true;
            foreach ($chat as $item) {
                if ($item->autore_id !== Auth::user()->id && $item->letto == 0) {
                    $letto = false;
                    break;
                }
            }

            return $view->with('richiesta', $richiesta)->with('chat', $chat)->with('letto', $letto)->with('user', $user)->with('sent', $sent)->with('got', $got);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campagna  $campagna
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid) {
        $user = Auth::user();
        $campagna = Campagna::where('uuid', $uuid)->firstOrFail();
        $categorie = Categorie::all();
        //$campagna->categorie()->attach($request->categorie);
        $allegati = Allegati::where('campagna_id', $campagna->id)->get();
        $allegati_v = ($campagna->allegati != '') ? json_decode($campagna->allegati,true) : '';
        $linked_ids = DB::table('linked_accounts')->leftjoin('users', 'users.id','linked_id')->where('azienda_id',$user->id)->select('linked_accounts.linked_id','users.username','users.avatar_location')->get();
        $main_id = '';
        if(count($linked_ids) <= 0){
            $linked_ids1 = DB::table('linked_accounts')->where('linked_id',$user->id)->first();
            if($linked_ids1 != ''){
            $main_id = DB::table('linked_accounts')->leftjoin('users', 'users.id','azienda_id')->where('azienda_id',$linked_ids1->azienda_id)->select('linked_accounts.azienda_id','users.username','users.avatar_location')->first();
            // dd($main_id);
            $linked_ids = DB::table('linked_accounts')->leftjoin('users', 'users.id','linked_id')->where('azienda_id',$linked_ids1->azienda_id)->where('linked_id','!=',$user->id)->select('linked_accounts.linked_id','users.username','users.avatar_location')->get();
            }
        }
        
        return view('frontend.campagne.edit')->with('campagna', $campagna)->with('categorie', $categorie)->with('allegati', $allegati)->with('comuni')->with('allegati_v', $allegati_v)->with('user', $user)->with('linked_ids', $linked_ids)->with('main_id', $main_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campagna  $campagna
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCampagna $request, $uuid) {
        $user = Auth::user();
        $data_inizio = \DateTime::createFromFormat('d/m/Y', $request->data_inizio);
        $data_fine = \DateTime::createFromFormat('d/m/Y', $request->data_fine);

        $campagna = Campagna::where('uuid', $uuid)->where('user_id', $user->id)->firstOrFail();
        $request->request->add(['user_id' => $user->id]);
        $request->merge([
            'canali' => json_encode($request->canali),
            'data_inizio' => $data_inizio,
            'data_fine' => $data_fine
        ]);
        $campagna->categorie()->sync($request->categorie);
        $campagna->comuni()->sync($request->comuni);
        if ($request->h_allegato_1) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_1);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        if ($request->h_allegato_2) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_2);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        if ($request->h_allegato_3) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_3);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        if ($request->h_allegato_4) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_4);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        if ($request->h_allegato_5) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_5);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        if ($request->h_allegato_6) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_6);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        if ($request->h_allegato_7) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_7);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        if ($request->h_allegato_8) {
            $nuovo_file = Allegati::where('id', $request->h_allegato_8);
            if (Auth::user()->id !== $nuovo_file->first()->autore_id) {
                abort(403, 'Unauthorized action.');
            }
            $nuovo_file->update(['campagna_id' => $campagna->id]);
        }
        



        if ($request->file1) {

            $file_1_old = Allegati::where('posizione', 1)->where('campagna_id', $campagna->id)->first();
            if ($file_1_old) {
                Storage::delete('allegati/' . $file_1_old->filename);
                $filename = $campagna->uuid . 'file_1.' . $request->file('file1')->extension();
                $request->file1->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_1_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file1')->extension();
                $nuovo_file->posizione = 1;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_1.' . $request->file('file1')->extension();
                $request->file1->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file1')->extension();
                $nuovo_file->posizione = 1;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile1) {
                $file_1_old = Allegati::where('posizione', 1)->where('campagna_id', $campagna->id)->first();
                if ($file_1_old) {
                    Storage::delete('allegati/' . $file_1_old->filename);
                    $file_1_old->delete();
                }
            }
        }
        if ($request->file2) {

            $file_2_old = Allegati::where('posizione', 2)->where('campagna_id', $campagna->id)->first();
            if ($file_2_old) {
                Storage::delete('allegati/' . $file_2_old->filename);
                $filename = $campagna->uuid . 'file_2.' . $request->file('file2')->extension();
                $request->file2->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_2_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file2')->extension();
                $nuovo_file->posizione = 2;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_2.' . $request->file('file2')->extension();
                $request->file2->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file2')->extension();
                $nuovo_file->posizione = 2;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile2) {
                $file_2_old = Allegati::where('posizione', 2)->where('campagna_id', $campagna->id)->first();
                if ($file_2_old) {
                    Storage::delete('allegati/' . $file_2_old->filename);
                    $file_2_old->delete();
                }
            }
        }
        if ($request->file3) {

            $file_3_old = Allegati::where('posizione', 3)->where('campagna_id', $campagna->id)->first();
            if ($file_3_old) {
                Storage::delete('allegati/' . $file_3_old->filename);
                $filename = $campagna->uuid . 'file_3.' . $request->file('file3')->extension();
                $request->file3->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_3_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file3')->extension();
                $nuovo_file->posizione = 3;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_3.' . $request->file('file3')->extension();
                $request->file3->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file3')->extension();
                $nuovo_file->posizione = 3;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile3) {
                $file_3_old = Allegati::where('posizione', 3)->where('campagna_id', $campagna->id)->first();
                if ($file_3_old) {
                    Storage::delete('allegati/' . $file_3_old->filename);
                    $file_3_old->delete();
                }
            }
        }
        if ($request->file4) {

            $file_4_old = Allegati::where('posizione', 4)->where('campagna_id', $campagna->id)->first();
            if ($file_4_old) {
                Storage::delete('allegati/' . $file_4_old->filename);
                $filename = $campagna->uuid . 'file_4.' . $request->file('file4')->extension();
                $request->file4->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_4_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file4')->extension();
                $nuovo_file->posizione = 4;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_4.' . $request->file('file4')->extension();
                $request->file4->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file4')->extension();
                $nuovo_file->posizione = 4;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile4) {
                $file_4_old = Allegati::where('posizione', 4)->where('campagna_id', $campagna->id)->first();
                if ($file_4_old) {
                    Storage::delete('allegati/' . $file_4_old->filename);
                    $file_4_old->delete();
                }
            }
        }
        if ($request->file5) {

            $file_5_old = Allegati::where('posizione', 5)->where('campagna_id', $campagna->id)->first();
            if ($file_5_old) {
                Storage::delete('allegati/' . $file_5_old->filename);
                $filename = $campagna->uuid . 'file_5.' . $request->file('file5')->extension();
                $request->file5->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_5_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file5')->extension();
                $nuovo_file->posizione = 5;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_5.' . $request->file('file5')->extension();
                $request->file5->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file5')->extension();
                $nuovo_file->posizione = 5;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile5) {
                $file_5_old = Allegati::where('posizione', 5)->where('campagna_id', $campagna->id)->first();
                if ($file_5_old) {
                    Storage::delete('allegati/' . $file_5_old->filename);
                    $file_5_old->delete();
                }
            }
        }
        if ($request->file6) {

            $file_6_old = Allegati::where('posizione', 6)->where('campagna_id', $campagna->id)->first();
            if ($file_6_old) {
                Storage::delete('allegati/' . $file_6_old->filename);
                $filename = $campagna->uuid . 'file_6.' . $request->file('file6')->extension();
                $request->file6->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_6_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file6')->extension();
                $nuovo_file->posizione = 6;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_6.' . $request->file('file6')->extension();
                $request->file6->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file6')->extension();
                $nuovo_file->posizione = 6;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile6) {
                $file_6_old = Allegati::where('posizione', 6)->where('campagna_id', $campagna->id)->first();
                if ($file_6_old) {
                    Storage::delete('allegati/' . $file_6_old->filename);
                    $file_6_old->delete();
                }
            }
        }
        if ($request->file7) {

            $file_7_old = Allegati::where('posizione', 7)->where('campagna_id', $campagna->id)->first();
            if ($file_7_old) {
                Storage::delete('allegati/' . $file_7_old->filename);
                $filename = $campagna->uuid . 'file_7.' . $request->file('file7')->extension();
                $request->file7->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_7_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file7')->extension();
                $nuovo_file->posizione = 7;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_7.' . $request->file('file7')->extension();
                $request->file7->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file7')->extension();
                $nuovo_file->posizione = 7;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile7) {
                $file_7_old = Allegati::where('posizione', 7)->where('campagna_id', $campagna->id)->first();
                if ($file_7_old) {
                    Storage::delete('allegati/' . $file_7_old->filename);
                    $file_7_old->delete();
                }
            }
        }
        if ($request->file8) {

            $file_8_old = Allegati::where('posizione', 8)->where('campagna_id', $campagna->id)->first();
            if ($file_8_old) {
                Storage::delete('allegati/' . $file_8_old->filename);
                $filename = $campagna->uuid . 'file_8.' . $request->file('file8')->extension();
                $request->file8->storeAs('allegati', $filename);
                //$file_1_old->delete();
                $nuovo_file = $file_8_old;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file8')->extension();
                $nuovo_file->posizione = 8;
                $nuovo_file->update();
            } else {
                $filename = $campagna->uuid . 'file_8.' . $request->file('file8')->extension();
                $request->file8->storeAs('allegati', $filename);
                $nuovo_file = new Allegati;
                $nuovo_file->autore_id = $user->id;
                $nuovo_file->campagna_id = $campagna->id;
                $nuovo_file->filename = $filename;
                $nuovo_file->ext = $request->file('file8')->extension();
                $nuovo_file->posizione = 8;
                $nuovo_file->save();
            }
        } else {
            if ($request->inputfile8) {
                $file_8_old = Allegati::where('posizione', 8)->where('campagna_id', $campagna->id)->first();
                if ($file_8_old) {
                    Storage::delete('allegati/' . $file_8_old->filename);
                    $file_8_old->delete();
                }
            }
        }
        $allegati = [];
        $allegati['immagine_0'] = $request->immagine_0;
        $allegati['immagine_1'] = $request->immagine_1;
        $allegati['immagine_2'] = $request->immagine_2;
        $allegati['immagine_3'] = $request->immagine_3;
        $allegati['immagine_4'] = $request->immagine_4;
        $allegati['immagine_5'] = $request->immagine_5;
        $allegati['immagine_6'] = $request->immagine_6;
        $allegati['immagine_7'] = $request->immagine_7;
        $allegati = json_encode($allegati);
        $request->merge(['allegati'=>$allegati]);
        $dati = $request->all();
        $dati['descrizione'] = clean($dati['descrizione']);

         
            
        $campagna->update($request->all());
        //$this->campagneLocationSave($request, $campagna->id);
        
       
        return redirect(route('frontend.user.campagne.influencer', ['uuid' => $uuid]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campagna  $campagna
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid) {
        $user = Auth::user();
        $campagna = Campagna::where('uuid', $uuid)->where('user_id', $user->id)->firstOrFail();
        $campagna->comuni()->detach();
        $campagna->categorie()->detach();
        $allegati = Allegati::where('campagna_id', $campagna->id);
        if (count($allegati->get()) > 0) {
            foreach ($allegati->get() as $allegato) {
                Storage::delete('allegati/' . $allegato->filename);
            }
            $allegati->delete();
        }
        $campagna->delete();
        //return redirect(route('frontend.user.dashboard'))->with('flash_success', __('applicazione.campagna_cancellata'));
        return redirect('/newpost');
    }

    public function disattiva($uuid) {
        $user = Auth::user();

        $campagna = Campagna::where('uuid', $uuid)->where('user_id', $user->id)->firstOrFail();
        if (isset($_GET['attiva'])) {
            $campagna->active = 1;
            $campagna->sponsored = 1;
            $message = __('applicazione.campagna_attivata_successo');
        } else {
            $campagna->active = 0;
            $campagna->sponsored = 0;
            $message = __('applicazione.campagna_disattivata_successo');
        }

        $campagna->update();
        return redirect()->back()->with('flash_success', $message);
    }


//Added

public function closed_in_list_brand($uuid){

        $user = Auth::user();
        $campagnar = Campagna::where('uuid', $uuid)->where('user_id', $user->id)->firstOrFail();

            DB::table('richieste')
                //->where('brand_id', '=', $user->id)
                ->where('campagna_id', '=', $campagnar->id)
                ->where([['offerta_accettata', 1]])
                ->update(['closed_in_list_brand' => 1]);

            DB::table('campagne')
                ->where('user_id', '=', $user->id)
                ->where('uuid', $uuid)
                ->update(['active' => 0]);

        $message = __('Campagna conclusa');
        return redirect()->back()->with('flash_success', $message);
}


public function closed_influencer($uuid){

        $user = Auth::user();
        $campagnax = Campagna::where('uuid', $uuid)->firstOrFail();

            DB::table('richieste')
                ->where('influencer_id', '=', $user->id)
                ->where('campagna_id', '=', $campagnax->id)
                ->where([['offerta_accettata', 1]])
                ->update(['closed_influencer' => 1]);

        $messagex = __('Campagna conclusa');
        return redirect()->back()->with('flash_success', $messagex);
}


    

    public function influencer($uuid) {
        config()->set('database.connections.mysql.strict', false);
        \DB::reconnect();
        $user = Auth::user();
        $campagna = Campagna::with('categorie')->where('user_id', $user->id)->where('uuid', $uuid)->first();
        if (!$campagna) {
            abort(403, 'Unauthorized action.');
        }
        $categorie = $campagna->categorie->pluck('id');
        $comuni = $campagna->comuni->pluck('id');
        
        
        $users = User::role('influencer')
        //->where('company', '!=', 1)
                ->join('campi_aggiuntivi as ca', 'ca.id_utente', '=', 'users.id')
                ->join('categorie_utenti as cu', 'cu.dettagli_id', '=', 'ca.id')
                ->whereIn('cu.categorie_id', $categorie)
                ->where('active',1);
                
        if(count($comuni) > 0){
            
            $users->join('comuni_utenti as co' ,'co.dettagli_id', '=', 'ca.id')
                    ->whereIn('co.comuni_id',$comuni);
        }
        
        $users = $users->where(function ($query) use ($campagna) {
            foreach (json_decode($campagna->canali, true) as $canale) {
                $query->orWhereNotNull('ca.' . $canale);
            }
        });


        $users->selectRaw('users.id as iduser,users.*,ca.*,'
                . '(select avg(`voto`) as voto from recensioni as re where re.influencer_id = users.id ) as recensione, '
                . '(select count(`id`) from recensioni as re where re.influencer_id = users.id ) as numero_recensioni,'
                . '(select count(`id`) from richieste where influencer_id = users.id and offerta_accettata = 1) as numero_campagne,'
                . 'exists (select * from richieste r where users.id = r.influencer_id and r.campagna_id = ?)  as `invitato`'
                . ', ((select avg(`voto`) as voto from recensioni as re where re.influencer_id = users.id ) + (select count(`id`) from richieste where influencer_id = users.id and offerta_accettata = 1)) as pop', [$campagna->id]);
        $request = new HttpRequest;
        if (isset($_GET['ord'])) {
            $order = $_GET['ord'];
        }
        if (isset($order)) {
            switch ($order) {
                case('recensioni'):
                    $users->orderBy('numero_recensioni', 'DESC');
                    break;
                case('campagne'):
                    $users->orderBy('numero_campagne', 'DESC');
                    break;
                case('popolarita'):
                    $users->orderBy('pop', 'DESC');
                    break;
                default:
            }
        }
        $users->groupBy('users.id');
        $users = $users->paginate(10);
        config()->set('database.connections.mysql.strict', true);
        \DB::reconnect();
        return view('frontend.campagne.ricerca')->with('users', $users)->with('campagna', $campagna);
    }

    public function add_richiesta(Request $request, Richiesta $richiesta) {

        $rules = array('cmp' => 'required|UUID|exists:campagne,uuid', 'i_id' => 'required|UUID|exists:users,uuid');
        $validator = Validator::make($request::all(), $rules);
        $user = auth()->user();
        $azienda = DB::table('campi_aggiuntivi')->where('id_utente',$user->id)->value('ragione_sociale');
        

        if ($validator->fails()) {
            return Response::json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        }
        $influencer_id = DB::table('users')->where('uuid', $request::input('i_id'))->value('id');
        $influencer_email = DB::table('users')->where('uuid', $request::input('i_id'))->value('email');
        $campagna_id = DB::table('campagne')->where('uuid', $request::input('cmp'))->value('id');

        $data = [
            "brand_id" => $user->id,
            "campagna_id" => $campagna_id,
            "influencer_id" => $influencer_id,
            "accettata" => 2
        ];
        //se l'utente non è mai stato invitato inseriscilo altrimenti no
        $richiesta = $richiesta::firstOrCreate(["campagna_id" => $campagna_id, "influencer_id" => $influencer_id], $data);
        $richiesta->accettata = 2;
        $richiesta->campagna_id = $campagna_id;
        $richiesta->save();

        //a gamble
            $offer = new Offer;
            $offer->campagna_id = $campagna_id;
            $offer->creator_id = $user->id;
            $offer->buyer_id = $influencer_id;
            $offer->sent_creator = 1;
            $offer->save();

        //Avvisa l'utente è stato creato
        if ($richiesta->wasRecentlyCreated) {
            
            Mail::to($influencer_email)->send(new RichiestaInviata($user->first_name,$user->last_name,$azienda));

            return Response::json(array('success' => true), 200);
        } else {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'user_already_invited'
                            ), 400);
        }
    }

    

    public function richieste() {

        $user = Auth::user();
        
        /*
        $campagne = Richiesta::where('influencer_id', $user->id)
                ->where('accettata', 2)
                ->where('ca.data_fine', '>', date('Y-m-d'))
                ->where('u.active',1)
                ->join('campagne as ca', 'ca.id', '=', 'richieste.campagna_id')
                ->join('users as u', 'u.id', '=', 'ca.user_id')
                ->select('ca.uuid', 'u.uuid as user_uuid', 'first_name', 'last_name', 'descrizione', 'user_id', 'titolo', 'ca.id', 'budget','budget_periodo', 'durata', 'durata_periodo', 'data_fine', 'avatar_location', 'data_inizio', 'canali')
                ->paginate(10);
        */

        $campagne = Offer::where('buyer_id', $user->id)
                //->where('accettata', 2)
                //->where('ca.data_fine', '>', date('Y-m-d'))
                ->where('sent_buyer', null)
                ->where('u.active',1)
                ->join('campagne as ca', 'ca.id', '=', 'offers.campagna_id')
                ->join('users as u', 'u.id', '=', 'ca.user_id')
                ->select('ca.uuid', 'u.uuid as user_uuid', 'first_name', 'last_name', 'username', 'descrizione', 'user_id', 'titolo', 'ca.id', 'ca.active', 'budget','budget_periodo', 'durata', 'durata_periodo', 'data_fine', 'avatar_location', 'data_inizio', 'canali')
                ->orderBy('id', 'DESC')
                ->paginate(10);

        foreach ($campagne as $key => $item) {
            $item->setAttribute('canali_view', $this->canali(json_decode($item->canali, true)));
            $item->setAttribute('categorie', $this->getCategorie($item->id));
        }

        $update_all = DB::table('offers')
                ->where('buyer_id', $user->id)
                //->where('offers.seen_buyer', )
                ->update(['offers.seen_buyer' => 1]);
                
        return view('frontend.campagne.campagne_richiesteaperte')->with('campagne', $campagne)->with('user', $user);
        //return view('frontend.campagne.campagne_campagne_aperte')->with('campagne', $campagne);
    }

    /**
     * Crea un array completo di icone per i canali in base al json salvato nella campagna
     *
     * @param  Campagna
     * @return array
     */
    public function canali($canali) {

        $canale_array = [];
        foreach ($canali as $key => $canale) {
            switch ($canale) {
                /*case 'mailing_list':
                    $icon = 'fa fa-envelope-open-text';
                    $name = 'Mailing List';
                    break;
                case 'blog':
                    $icon = 'fas fa-laptop';
                    $name = 'Blog/Web';
                    break;
                case 'giornale_tiratura':
                    $icon = 'fa fa-newspaper';
                    $name = __('applicazione.giornale');
                    break;
                case 'negozio_metri':
                    $icon = 'fa fa-store';
                    $name = __('applicazione.negozio_metri');
                    break;
                case 'eventi_numero':
                    $icon = 'fa fa-users';
                    $name = __('applicazione.eventi');
                    break;*/
                default:
                    $icon = 'fab fa-' . $canale;
                    $name = $canale;
            }
            $canale_array[$key]['icon'] = $icon;
            $canale_array[$key]['name'] = $name;
        }

        return $canale_array;
    }

    public function add_offerta(HttpRequest $request) {

        $request->validate([
            'offerta' => 'required|max:1000',
            'cmp' => 'required|UUID|exists:campagne,uuid',
            'importo' => 'required|max:100000|integer'
        ]);
        $user = Auth::user();
        $campagna = Campagna::where('uuid', $request->cmp)->first();
        $utente_email = User::where('id', $campagna->user_id)->first();

        $richiesta = Richiesta::where('influencer_id', $user->id)->where('campagna_id', $campagna->id)->first();

        $offer = Offer::where('buyer_id', $user->id)->where('campagna_id', $campagna->id)->first();

        if ($richiesta === null) {
   
            $offer = new Offer;
            $offer->campagna_id = $campagna->id;
            $offer->creator_id = $campagna->user_id;
            $offer->buyer_id = $user->id;
            $offer->save();
            
            $richiesta = new Richiesta;
            $richiesta->campagna_id = $campagna->id;
            $richiesta->brand_id = $campagna->user_id;
            $richiesta->influencer_id = $user->id;


            
            
        }
        

        $richiesta->offerta = clean($request->offerta);
        $richiesta->importo = $request->importo;
        $richiesta->accettata = 1;
        $richiesta->accettata_at = date("Y-m-d H:i:s");
        $richiesta->offerta_creata_at = date("Y-m-d H:i:s");
        $richiesta->save();

        Mail::to($utente_email->email)->send(new OffertaInviata($user->first_name, $user->last_name, $campagna->titolo));
        return redirect()->back()->with('flash_success', __('applicazione.offerta_inviata'));
    }

    public function add_messaggio(HttpRequest $request) {

        $request->validate([
            'messaggio' => 'required|max:500',
            'cmp' => 'required|UUID|exists:campagne,uuid',
        ]);
        $user = Auth::user();
        $campagna = Campagna::where('uuid', $request->cmp)->first();
        $messaggio = new Messaggio;
        $richieste = Richiesta::where('campagna_id', $campagna->id)->select('influencer_id')->get();


        if ($user->id != $campagna->user_id && !$richieste->contains('influencer_id', $user->id)) {
            abort(403, 'Unauthorized action.');
        }

        $messaggio->messaggio = $request->messaggio;
        $messaggio->campagna_id = $campagna->id;
        $messaggio->autore_id = $user->id;
        $messaggio->save();
        //return redirect()->back()->with('flash_success', __('applicazione.messaggio_inserito'));
        return Redirect::to(URL::previous() . "#bacheca")->with('flash_success', __('applicazione.messaggio_inserito'));
    }

    public function add_chat(HttpRequest $request) {

        $request->validate([
            'messaggio' => 'required|max:500',
            'cmp' => 'required|UUID|exists:campagne,uuid',
            'i_id' => 'required|UUID|exists:users,uuid'
        ]);
        $user = Auth::user();
        $campagna = Campagna::where('uuid', $request->cmp)->first();
        $influencer = User::where('uuid', $request->i_id)->first();
        $messaggio = new Messaggio;
        $richieste = Richiesta::where('campagna_id', $campagna->id)->select('influencer_id')->get();


        if ($user->id != $campagna->user_id && !$richieste->contains('influencer_id', $user->id)) {
            abort(403, 'Unauthorized action.');
        }

        if (!$richieste->contains('influencer_id', $influencer->id)) {
            abort(403, 'Unauthorized action.');
        }

        $messaggio->messaggio = $request->messaggio;
        $messaggio->campagna_id = $campagna->id;
        $messaggio->autore_id = $user->id;
        $messaggio->chat = 1;
        $messaggio->chat_influencer_id = $influencer->id;
        $messaggio->save();
        return redirect()->back()->with('flash_success', __('applicazione.messaggio_inserito'));
    }

    public function accetta_offerta(HttpRequest $request) {

        $request->validate([
            'offerta_id' => 'required|integer|exists:richieste,id',
            'cmp' => 'required|UUID|exists:campagne,uuid',
        ]);
        $user = Auth::user();
        $campagna = Campagna::where('uuid', $request->cmp)->first();

        $richiesta = Richiesta::where('campagna_id', $campagna->id)->where('id', $request->offerta_id)->firstOrFail();
        $utente = User::find($richiesta->influencer_id);
        if ($user->id != $campagna->user_id) {
            abort(403, 'Unauthorized action.');
        }
        /*
        $budget = new CreditiController;
        $budget = $budget->budget($richiesta->influencer_id);
        if ($budget <= 0) {
            return redirect()->back()->with('flash_error', __('applicazione.no_budget'));
        }
        */
        //  $richiesta->first();
        if (isset($request->rifiuta)) {
            $richiesta->offerta_rifiutata = 1;
            $richiesta->offerta_rifiutata_at = date("Y-m-d H:i:s");
        } else {
            $richiesta->offerta_accettata = 1;
            $richiesta->offerta_accettata_at = date("Y-m-d H:i:s");
        }

        $richiesta->save();

        if (isset($request->rifiuta)) {
            Mail::to($utente->email)->send(new OffertaAccettata(true, $user->first_name, $user->last_name, $campagna->titolo));
            return redirect()->back()->with('flash_success', __('applicazione.richiesta_rifiutata'));
        } else {
            Mail::to($utente->email)->send(new OffertaAccettata(false, $user->first_name, $user->last_name, $campagna->titolo));
            return redirect()->back()->with('flash_success', __('applicazione.richiesta_accettata'));
        }
    }




   






    public function get_influencer($uuid) {
        $user = User::where('uuid', $uuid);
    }
    
    
     public function add_immagine(HttpRequest $request) {
             
        $validator = Validator::make($request->all(), [
                    'slim_output_0' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_1' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_2' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_3' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_4' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_5' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_6' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_7' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
                    'slim_output_8' => 'image|mimes:jpeg,jpg,png|max:5120|dimensions:min_width=450,min_height=450',
        ]);

        if ($request->hasFile('slim_output_0')) {
            $extension = $request->slim_output_0->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_0->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 0,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_1')) {
            $extension = $request->slim_output_1->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_1->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 1,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_2')) {
            $extension = $request->slim_output_2->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_2->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 2,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_3')) {
            $extension = $request->slim_output_3->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_3->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 3,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_4')) {
            $extension = $request->slim_output_4->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_4->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 4,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_5')) {
            $extension = $request->slim_output_5->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_5->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 5,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_6')) {
            $extension = $request->slim_output_6->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_6->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 6,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_7')) {
            $extension = $request->slim_output_7->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_7->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 7,'file'=>'allegati/' . $filename), 200);
        }
        if ($request->hasFile('slim_output_8')) {
            $extension = $request->slim_output_8->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->slim_output_8->storeAs('allegati', $filename);
            $image = Image::make('storage/allegati/' . $filename);
            $image->crop(450, 450);
            $image->save();
            return Response::json(array('success' => true, 'field' => 8,'file'=>'allegati/' . $filename), 200);
        }
     }
     
      public function delete_immagine(HttpRequest $request) {
          
          
          if(strpos( $request->immagine, Auth::user()->uuid)){
                Storage::delete($request->immagine);
          }
      }
    public function add_allegato(HttpRequest $request) {
        $validator = Validator::make($request->all(), [
                    'allegato' => 'required|file|mimes:pdf|max:5120',
                    'posizione' => 'required|integer|in:1,2,3,4,5,6,7,8'
        ]);
        //validator ha problemi con dei file tiff
        if ($validator->fails() || strtolower($request->allegato->getClientOriginalExtension() == 'tiff') || strtolower($request->allegato->getClientOriginalExtension() == 'tif')) {

            return Response::json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        }

        if ($request->hasFile('allegato')) {
            $extension = $request->allegato->getClientOriginalExtension();
            $filename = Auth::user()->uuid . '-' . time() . '.' . $extension;
            $request->allegato->storeAs('allegati', $filename);

            $thumb_location = 'allegati/' . $filename;

            $allegato = new Allegati;
            $allegato->autore_id = Auth::user()->id;
            $allegato->ext = $extension;
            $allegato->filename = $filename;
            $allegato->posizione = $request->posizione;
            $allegato->save();
            return Response::json(array('success' => true, 'avatar_location' => $thumb_location, 'extension' => $extension, 'id' => $allegato->id), 200);
        } else {
            return Response::json(array(
                        'success' => false,
                        'errors' => 'no file'
                            ), 400);
        }
    }

    public function delete_allegato(HttpRequest $request) {
        $validator = Validator::make($request->all(), [
                    'id' => 'integer'
        ]);
        //validator ha problemi con dei file tiff
        if ($validator->fails()) {
            return Response::json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        }
        $allegato = Allegati::where('id', $request->id)->first();
        if ($allegato->autore_id != Auth::user()->id) {
            return Response::json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        }
        Storage::delete('allegati/' . $allegato->filename);
        $allegato->delete();
        return Response::json(array('success' => true), 200);
    }







   

public function cercacampagne() {
       
    $user = Auth::user();
    $user = User::where('id', $user->id)->with('dettagli')->first();
    $canali = Config::get('social');
    $dettagli = $user->dettagli->getAttributes();
    $categorie = $user->dettagli->categorie->pluck('id')->toArray();
    
    $campagne_viste_ids = Visite::where('user_id',$user->id)->select('campagne_id')->pluck('campagne_id')->toArray();
    
    $canaliToFilter = [];
    /*foreach ($canali as $canale) {

        if ($dettagli[$canale] != '' || $dettagli[$canale] !== null) {
            $canaliToFilter[] = $canale;
        }
    }*/

    $ids = DB::table('campagne')->select('campagne.id')
                    ->join('richieste', 'campagne.id', '=', 'richieste.campagna_id')
                    ->where('richieste.influencer_id', $user->id)
                    ->where('data_fine', '>=', date('Y-m-d'))
                    ->where(function($query) use ($canaliToFilter) {
                        if (!empty($canaliToFilter)) {
                            foreach ($canaliToFilter as $item) {
                                $query->orWhere('canali', 'like', '%' . $item . '%');
                            };
                        };
                    })->pluck('id');


    config()->set('database.connections.mysql.strict', false);
    \DB::reconnect();
    $campagne = new Campagna;
    $campagne = $campagne->where('campagne.active', 1)
            ->where('data_fine', '>=', date('Y-m-d'))
            ->orWhere('sponsored', 1)
            ->join('categorie_campagne as cu', 'cu.campagna_id', '=', 'campagne.id')
            
            ->leftJoin('visite_campagne as vi','vi.campagne_id' ,'=','campagne.id')
            
            ->whereIn('cu.categorie_id', $categorie)
            ->whereNotIn('id', $ids)
            ->where(function($query) use ($canaliToFilter) {
        if (!empty($canaliToFilter)) {
            foreach ($canaliToFilter as $item) {
                $query->orWhere('canali', 'like', '%' . $item . '%');
            };
        }
    });
    $campagne->select('campagne.*','vi.campagne_id','vi.created_at_campagna');
    $campagne = $campagne->groupBy('campagne.id')
            ->orderByRaw('-vi.created_at_campagna ASC')
            ->orderBy('campagne.created_at','DESC');
            
            
    $campagne = $campagne->paginate(8);
   
    foreach ($campagne as $key => $item) {
        
        $item->setAttribute('canali_view', $this->canali(json_decode($item->canali, true)));
        if(in_array($item->id,$campagne_viste_ids)){
            $item->setAttribute('vista',false);
        }
        $item->setAttribute('cerca',true);
    }
   
    config()->set('database.connections.mysql.strict', true);
    \DB::reconnect();
    return view('frontend.campagne.campagne_campagne_aperte')->with('campagne', $campagne)->with('user', $user);
}








    public function getCategorie($id) {
        $categorie = DB::table('categorie as ca')
                        ->join('categorie_campagne as cc', 'cc.categorie_id', '=', 'ca.id')
                        ->where('cc.campagna_id', $id)
                        ->select('ca.nome')
                        ->get()->toArray();
        return $categorie;
    }

    public function leggiChat(HttpRequest $request) {
        $validator = Validator::make($request->all(), [
                    'cmp' => 'required|UUID|exists:campagne,uuid',
                    'usr' => 'required|UUID|exists:users,uuid'
        ]);
         if ($validator->fails()) {
            return Response::json(array(
                        'success' => false,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        }
        $influencer = User::where('uuid', $request->usr)->first();
        $campagna = Campagna::where('uuid', $request->cmp)->first();
        if (Auth::user()->hasRole('brand')) {
            if ($campagna->user_id != Auth::user()->id) {
                return Response::json(array('error' => true), 400);
            }
        }
        $messaggi = new Messaggio;
        $messaggi = $messaggi->where('campagna_id', $campagna->id);
        $messaggi = $messaggi->where('autore_id', '!=', Auth::user()->id);
        if (Auth::user()->hasRole('brand')) {
            $messaggi = $messaggi->where('chat_influencer_id', $influencer->id);
        } else {
            $messaggi = $messaggi->where('chat_influencer_id', auth::user()->id);
        }
        $messaggi = $messaggi->where('chat', 1);

        $messaggi = $messaggi->update(['letto' => 1]);
        return Response::json(array('success' => true), 200);
    }





    public function cercacampagneOut() {
       

        $campagneout = Campagna::select('campagne.*')->orderBy('id', 'DESC')->paginate(10);

        //$comuniout = DB::table('comuni')->select('*')->get();

        //$categoriaout = DB::table('categorie')->get();
        
        config()->set('database.connections.mysql.strict', true);
        \DB::reconnect();

        return view('frontend.campagne.campagne-out')->with('campagneout', $campagneout);


    }

     public function cercacampagneAzienda() {
       
        $campagneout = Campagna::select('campagne.*')->orderBy('id', 'DESC')->paginate(10);

        //$comuniout = DB::table('comuni')->select('*')->get();

        //$categoriaout = DB::table('categorie')->get();
        
        config()->set('database.connections.mysql.strict', true);
        \DB::reconnect();

        return view('frontend.campagne.campagne-out-azienda')->with('campagneout', $campagneout);


    }


    public function shareSave(){
       // decode your image first.
       $imagedata = base64_decode($_REQUEST['base64data']);
       // make random name
       $filename = md5(uniqid(rand(), true));
       //path where you want to upload image
       $file = $_SERVER['DOCUMENT_ROOT'] . '/uploads/'.$filename.'.png';
       file_put_contents($file, $imagedata);
    }


    public function campagnaLocationSave(Request $request, $campagnaID){
    
       if (empty($request->input('latitude')) || empty($request->input('longitude'))){
            $response['code'] = 400;
        }else {
        
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                ->get('results');
            
            $address = $map['results'][0]['formatted_address'];

            $country = GoogleMapsHelper::findCountry($map);

            $city = GoogleMapsHelper::findCity($map);
                        
            if ($country && $city) {
                $country_name = $country['name'];
                $country_code = $country['short_name'];
                $lat = $request->input('latitude');
                $lon = $request->input('longitude');
                $city = $city['name'];

                $find_country = Country::where('code', $country_code)->first();
                $country_id = 0;
                if ($find_country) {
                    $country_id = $find_country->id;
                } else {
                    $country = new Country();
                    $country->name = $country_name;
                    $country->code = $country_code;
                    if ($country->save()) {
                        $country_id = $country->id;
                    }
                }

                $city_id = 0;
                if ($country_id > 0) {
                    $find_city = City::where('name', $city)->where('country_id', $country_id)->first();
                    if ($find_city) {
                        $city_id = $find_city->id;
                    } else {
                        $city_modal = new City();
                        $city_modal->name = $city;
                        $city_modal->zip = "1";
                        $city_modal->country_id = $country_id;
                        if ($city_modal->save()) {
                            $city_id = $city_modal->id;
                        }
                    }
                }

                if (!empty($lat) && !empty($lon) && !empty($city) && !empty($country_code) && !empty($city_id) && !empty($country_id)) {
                    sHelper::updateCampagnaLocation($campagnaID, $city_id, $lat, $lon, $address);
                }

            }
        }
    }


    public function campagnaSave(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $campagna = Campagna::find($request->input('id'));

        if ($campagna){
            $campagna_save = CampagnaSave::where('campagna_id', $campagna->id)->where('save_user_id', $user->id)->get()->first();

            if ($campagna_save) { // Unsave
                if ($campagna_save->save_user_id == $user->id) {
                    $deleted = DB::delete('delete from campagne_saved where campagna_id='.$campagna_save->campagna_id.' and save_user_id='.$campagna_save->save_user_id);
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'unsave';
                    }
                }
            }else{
                // save
                $campagna_save = new campagnasave();
                $campagna_save->campagna_id = $campagna->id;
                $campagna_save->save_user_id = $user->id;
                if ($campagna_save->save()){
                    $response['code'] = 200;
                    $response['type'] = 'save';
                }
            }
            //if ($response['code'] == 200){
            //    $response['save_count'] = $campagna->getsaveCount();
            //}
        }

        return Response::json($response);
    }

    public function campagnaSaved(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $campagna = Campagna::find($request->input('id'));

        if ($campagna){
            $response['code'] = 200;
            $html = View::make('widgets.post_detail.saved', compact('campagna'));
            $response['saves'] = $html->render();
        }

        return Response::json($response);
    }

    public function campagneSaved(Request $request){

        $user = Auth::user();
        $user = User::where('id', $user->id)->with('dettagli')->first();
        $canali = Config::get('social');
        $dettagli = $user->dettagli->getAttributes();
        $categorie = $user->dettagli->categorie->pluck('id')->toArray();
        
        $campagne_viste_ids = Visite::where('user_id',$user->id)->select('campagne_id')->pluck('campagne_id')->toArray();
        
        $canaliToFilter = [];
       /* foreach ($canali as $canale) {

            if ($dettagli[$canale] != '' || $dettagli[$canale] !== null) {
                $canaliToFilter[] = $canale;
            }
        } */

        $ids = DB::table('campagne')->select('campagne.id')
                        ->join('richieste', 'campagne.id', '=', 'richieste.campagna_id')
                        ->where('richieste.influencer_id', $user->id)
                        ->where('data_fine', '>=', date('Y-m-d'))
                        ->where(function($query) use ($canaliToFilter) {
                            if (!empty($canaliToFilter)) {
                                foreach ($canaliToFilter as $item) {
                                    $query->orWhere('canali', 'save', '%' . $item . '%');
                                };
                            };
                        })->pluck('id');


        config()->set('database.connections.mysql.strict', false);
        \DB::reconnect();
        $campagne = new Campagna;
        $campagne = $campagne
        
                //Sponsored Campagne in every bachecha
                
                ->join('campagne_saved', 'campagne_saved.campagna_id', '=', 'campagne.id')
                ->where('campagne_saved.save_user_id', $user->id)
            

                ->orWhere('campagne.active', 1)
        
                ->where('data_fine', '>=', date('Y-m-d'))

                ->join('categorie_campagne as cu', 'cu.campagna_id', '=', 'campagne.id')
                
                ->leftJoin('visite_campagne as vi','vi.campagne_id' ,'=','campagne.id')
                
                ->whereIn('cu.categorie_id', $categorie)
                ->whereNotIn('campagne.id', $ids)
                ->where(function($query) use ($canaliToFilter) {
            if (!empty($canaliToFilter)) {
                foreach ($canaliToFilter as $item) {
                    $query->orWhere('canali', 'save', '%' . $item . '%');
                };
            }
        });
        $campagne->select('campagne.*','vi.campagne_id','vi.created_at_campagna');
        $campagne = $campagne->groupBy('campagne.id')
                ->orderByRaw('-vi.created_at_campagna ASC')
                ->orderBy('campagne.created_at','DESC');
                
                
        $campagne = $campagne->paginate(8);
       
        foreach ($campagne as $key => $item) {
            
            $item->setAttribute('canali_view', $this->canali(json_decode($item->canali, true)));
            if(in_array($item->id,$campagne_viste_ids)){
                $item->setAttribute('vista',false);
            }
            $item->setAttribute('cerca',true);
        }
       
        config()->set('database.connections.mysql.strict', true);
        \DB::reconnect();

        /*
        $campagne = DB::table('campagne')
            ->join('campagne_saved', 'campagne_saved.campagna_id', '=', 'campagne.id')
            ->where('campagne_saved.save_user_id', $user->id)
            ->get();
        */
       

        return view('frontend.campagne.campagne_saved')->with('campagne', $campagne)->with('user', $user);
    }

    public function campagneActive($stato) {

        $user = Auth::user();

        $campagne = new Campagna;
        $campagne = $campagne->campagne($stato)->paginate(12);

        foreach ($campagne as $key => $item) {
            $item->setAttribute('canali_view', $this->canali(json_decode($item->canali, true)));
            $item->setAttribute('categorie', $this->getCategorie($item->id));
        }

        return view('frontend.campagne.campagne_active')->with('campagne', $campagne)->with('user', $user);
    }

    public function campagneAperte() {

        $user = Auth::user();

        $campagne = DB::table('campagne')
            ->where('campagne.user_id', $user->id)
            ->where('campagne.active', 1)
            ->get();


        return view('frontend.campagne.campagne-active')->with('campagne', $campagne)->with('user', $user);
    }

    public function campagneClosed() {

        $user = Auth::user();

        $campagne = DB::table('campagne')
            ->where('campagne.user_id', $user->id)
            ->where('campagne.active', 0)
            ->get();
    

        return view('frontend.campagne.campagne-closed')->with('campagne', $campagne)->with('user', $user);
    }

    public function sendOffer(Request $request){
        
        $user = Auth::user();
        
        $send_offer = new Offer;
        $send_offer->campagna_id = $request->campaign_id;
        $send_offer->creator_id = $request->creator_id;
        $send_offer->buyer_id = $user->id;

        $send_offer->message = $request->message;
        $send_offer->offer = $request->offer;

        //$send_offer->accettata_at = date("Y-m-d H:i:s");
        //$send_offer->offerta_creata_at = date("Y-m-d H:i:s");

        $send_offer->save();

    }


}