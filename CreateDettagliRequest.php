<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateDettagliRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $authUser = \Auth::user();
        $authUserID = $authUser ? $authUser->id : null;
        return [
            'profilo_titolo' => 'nullable|max:300',
            'b_profilo_titolo' => 'nullable|max:300',
            'descrizione' => 'nullable|max:1000',
            'website' => 'nullable|max:2150',
            'b_descrizione' => 'nullable|max:1000',
            'ruolo' => 'nullable|max:500',
            'my_city' => 'nullable|max:191',
            'telefono' => ' nullable|max:40',
            'azienda_nome' => 'nullable|max:200',
            'ragione_sociale' => 'nullable|max:200',
            'partita_iva' => ' nullable|max:50',
            'azienda_via' => ' nullable|max:200',
            'azienda_cap' => ' nullable|max:10',
            'azienda_numero_civico' => ' nullable|max:10',
            'azienda_citta' => ' nullable|max:40',
            'azienda_provincia' => ' nullable|max:40',
            'azienda_nazione' => ' nullable|integer|max:249',
            'facebook' => ' nullable|max:250|url',
            'b_facebook' => ' nullable|max:250|url',
            'facebook_follower' => ' nullable|integer',
            'twitter' => ' nullable|max:250|url',
            'twitter_follower' => ' nullable|integer',
            'instagram' => ' nullable|max:250|url',
            'instagram_follower' => ' nullable|integer',
            'linkedin' => ' nullable|max:250|url',
            'linkedin_follower' => ' nullable|integer',
            'tiktok' => ' nullable|max:250|url',
            'tiktok_follower' => ' nullable|integer',
            'youtube' => ' nullable|max:2150|url',
            'youtube_follower' => ' nullable|integer',
            'pinterest' => ' nullable|max:2150|url',
            'pinterest_follower' => ' nullable|integer',
            'snapchat' => ' nullable|max:2150|url',
            'snapchat_follower' => ' nullable|integer',
            'twitch' => ' nullable|max:2150|url',
            'twitch_follower' => ' nullable|integer',
            'reddit' => ' nullable|max:2150|url',
            'reddit_karma' => ' nullable|integer',
            'tumblr' => ' nullable|max:2150|url',
            'tumblr_follower' => ' nullable|integer',
            'myspace' => ' nullable|max:2150|url',
            'myspace_follower' => ' nullable|integer',
            'quora' => ' nullable|max:2150|url',
            'quora_follower' => ' nullable|integer',
            'weibo' => ' nullable|max:2150|url',
            'weibo_follower' => ' nullable|integer',
            'strava' => ' nullable|max:2150|url',
            'strava_follower' => ' nullable|integer',
            'skype' => 'nullable|max:2150',
            'whatsapp' => ' nullable|max:40',
            'tripadvisor' => 'nullable|max:2150',
            'airbnb' => 'nullable|max:2150',
            'playstation' => 'nullable|max:2150',
            'spotify' => 'nullable|max:2150',
            'xbox' => 'nullable|max:2150',
            'apple_music' => 'nullable|max:2150',
            'apple' => 'nullable|max:2150',
            'amazon' => 'nullable|max:2150',
            'ebay' => 'nullable|max:2150',
            'subito' => 'nullable|max:2150',
            'yelp' => 'nullable|max:2150',
            'evernote' => 'nullable|max:2150',
            'craigslist' => 'nullable|max:2150',
            'zoom' => 'nullable|max:2150',
            'telegram' => 'nullable|max:2150',
            'udemy' => 'nullable|max:2150',
            'discord' => 'nullable|max:2150',
            'blogger' => 'nullable|max:2150',
            'blog' => ' nullable|max:150|url',
            'blog_follower' => ' nullable|integer',
            'blog_visualizzazioni' => ' nullable|integer',
            'mailing_list' => ' nullable|integer',
            'mailing_list_aperture' => ' nullable|numeric',
            'mailing_list_click' =>  'nullable|numeric',
            'giornale_tiratura' => ' nullable|integer',
            'giornale_periodo' => ' nullable|max:50',
            'giornale_area' => ' nullable|max:50',
            'negozio_metri' => ' nullable|integer',
            'negozio_area' => ' nullable|max:50',
            'negozio_posizione' => ' nullable|max:50',
            'negozio_clienti' => ' nullable|integer',
            'eventi_numero' => ' nullable|integer',
            'eventi_partecipanti' => ' nullable|integer',
            'terms' => 'nullable|integer',
            'username' => 'required|max:191|unique:users,username,' . $authUserID 
        ];
    }
}
