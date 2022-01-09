<?php

namespace App\Http\Requests\Frontend\User;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            
            'telefono' => 'nullable|max:40',
            'azienda_nome' => 'nullable|max:200',
            'ragione_sociale' => 'nullable|max:200',
            'b_profilo_titolo' => 'nullable|max:1000',
            'website' => 'nullable|max:2150',
            'partita_iva' => 'nullable|max:50',
            'azienda_via' => 'nullable|max:200',
            'azienda_cap' => 'nullable|max:10',
            'azienda_numero_civico' => 'nullable|max:10',
            'azienda_citta' => ' nullable|max:40',
            'azienda_provincia' => 'nullable|max:100',
            'facebook' => 'nullable|max:250|url',
            'b_facebook' => 'nullable|max:250|url',
            'twitter' => 'nullable|max:250|url',
            'instagram' => 'nullable|max:250|url',
            'youtube' => 'nullable|max:2150|url',
            'linkedin' => 'nullable|max:2150|url',
            'tiktok' => 'nullable|max:2150|url',
            'pinterest' => 'nullable|max:2150|url',
            'twitch' => 'nullable|max:2150|url',
            'snapchat' => 'nullable|max:2150|url',
            'reddit' => 'nullable|max:2150|url',
            'tumblr' => 'nullable|max:2150|url',
            'myspace' => 'nullable|max:2150|url',
            'skype' => 'nullable|max:2150',
            'whatsapp' => 'nullable|max:40|',
            'tripadvisor' => 'nullable|max:2150',
            'airbnb' => 'nullable|max:2150',
            'apple' => 'nullable|max:2150',
            'apple_music' => 'nullable|max:2150',
            'spotify' => 'nullable|max:2150',
            'playstation' => 'nullable|max:2150',
            'xbox' => 'nullable|max:2150',
            'amazon' => 'nullable|max:2150',
            'ebay' => 'nullable|max:2150',
            'blog' => 'nullable|max:150|url',
            'terms' => 'nullable|integer',
            'username' => 'required|max:191|unique:users,username,' . $authUserID,
            'b_username' => 'max:191|unique:users,b_username,'
            
        ];
    }
}
