<?php

namespace App\Models\App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'campi_aggiuntivi';
    
    protected $fillable = [
        'azienda_nome',
        'ragione_sociale',
        'partita_iva',
        'profilo_titolo',
        'website',
        'descrizione',
        'azienda_via',
        'azienda_numero_civico',
        'azienda_citta',
        'azienda_provincia',
        'azienda_cap',
        'telefono',
        'azienda_email',
        'facebook',
        'facebook_follower',
        'twitter',
        'twitter_follower',
        'instagram',
        'instagram_follower',
        'youtube',
        'youtube_follower',
        'linkedin',
        'linkedin_follower',
        'tiktok',
        'tiktok_follower',
        'pinterest',
        'pinterest_follower',
        'twitch',
        'twitch_follower',
        'snapchat',
        'snapchat_follower',
        'reddit',
        'reddit_karma',
        'tumblr',
        'tumblr_follower',
        'myspace',
        'myspace_follower',
        'whatsapp',
        'skype',
        'tripadvisor',
        'airbnb',
        'blog',
        'terms',
        'id_utente'
    ];
}
