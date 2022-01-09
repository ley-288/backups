<?php
namespace App\Library;

use App\Models\Group;
use App\Models\Hobby;
use App\Models\UserHobby;
use App\Models\City;
use App\Models\Country;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\Auth\User;
use App\Models\Auth\BaseUser;
use App\Models\UserFollowing;
use App\Models\UserLocation;
use App\Models\PostLocation;
use App\Models\CampagnaLocation;
use App\Models\App\Campagna;
use App\Models\Auth\Richiesta;

use Illuminate\Http\Request;
use Auth;
use DB;

class sHelper
{

    static $notifications = null;


    public static function followButton($following, $follower, $element, $size = ''){

        $user = Auth::user();

        if ($following == $follower) return "";

        $connection = $user->following()->where('allow', 1)->get();

        $relation = UserFollowing::where('following_user_id', $following)->where('follower_user_id', $follower)->get()->first();

        $relation1 = UserFollowing::where('following_user_id', $follower)->where('follower_user_id', $following)->get()->first();

        if ($relation){
            if ($relation->allow == 0) {
                return '<a href="javascript:;" class="btn btn-default request-button '.$size.'" onclick="follow(' . $following . ', ' . $follower . ', \''.$element.'\', \''.$size.'\')"></a>';
            }elseif ($relation->allow == 1){
                return '<a href="javascript:;" class="btn btn-default following-button '.$size.'" onclick="follow('.$following.', '.$follower.', \''.$element.'\', \''.$size.'\')"></a>';
            }
        }

        if ($relation1){
            if ($relation1->allow == 0) {
                return '<a href="javascript:;" class="btn btn-default '.$size.'" onclick="follow(' . $following . ', ' . $follower . ', \''.$element.'\', \''.$size.'\')">Segui anche tu</a>';
            }elseif ($relation1->allow == 1){
                return '<a href="javascript:;" class="btn btn-default '.$size.'" onclick="follow('.$following.', '.$follower.', \''.$element.'\', \''.$size.'\')">Segui anche tu</a>';
            }
        }

        if($connection){
            return '<a href="javascript:;" class="btn btn-default follow-button '.$size.'" onclick="follow('.$following.', '.$follower.', \''.$element.'\', \''.$size.'\')"> Segui</a>';
        } else {
            return '<a href="javascript:;" class="btn btn-default follow-button '.$size.'" onclick="follow('.$following.', '.$follower.', \''.$element.'\', \''.$size.'\')"> Segui</a>';
        }
        

    }

    public static function deniedButton($following, $follower, $element, $size = ''){
        
       if ($following  == $follower) return "";

        $relation = UserFollowing::where('following_user_id', $following)->where('follower_user_id', $follower)->get()->first();

        if ($relation){
            if ($relation->allow == 0) {
                return '<a href="javascript:;" class=" '.$size.'" onclick="deniedFollow(' . $following . ', ' . $follower . ', \''.$element.'\', \''.$size.'\')">Block</a>';
            }elseif ($relation->allow == 1){
                
                return '<a href="javascript:;" class=" '.$size.'" onclick="deniedFollow('.$following.', '.$follower.', \''.$element.'\', \''.$size.'\')">Blocca</a>';
            }
        }

        return '<a href="javascript:;" class=" '.$size.'" onclick="deniedFollow('.$following.', '.$follower.', \''.$element.'\', \''.$size.'\')"> Blocca</a>';

    }


    public static function distance($lat1, $lon1, $lat2, $lon2) {

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        $km = $miles * 1.609344;

        if ($km < 1){
            return round($miles * 1609.344).' m';
        }

        return round($km, 2).' km';

    }

     public static function friends(){
          if (self::$friends == null){
              $friends = [];
              
              $user = Auth::user();

              $follow = $user->follower()->where('allow', 0)->count();
                if ($follow > 0){
                $friends[] = [
                    'url' => url('/followers/pending'),
                    'icon' => 'fa-user-plus',
                    'text' => $follow.' follower richieste',
                    'img' => url('/assets/media/icons/socialbuttons/user.png')
                ];
            }
            self::$friends = $friends;

          }
          return self::$friends;
     }
     

    public static function notifications(){
        if (self::$notifications == null){
            $notifications = [];

            $user = Auth::user();

            /*
            $followers = $user->follower()->where('seen', 0)->count();
            if ($followers > 0){
                $notifications[] = [
                    'url' => url('/social/'.$user->username.'/followers/'),
                    'icon' => 'fas fa-plus-circle',
                    'text' => 'Hai '.$followers.' follower nuovi!',
                    'img' => url('/assets/media/icons/socialbuttons/user.png')
                ];
            }
            */

            $follow = $user->follower()->where('allow', 0)->count();
            if ($follow > 0){
                $notifications[] = [
                    'url' => url('/followers/pending'),
                    'icon' => 'add_circle',
                    'text' => $follow.' follower richieste',
                    'img' => url('/assets/media/icons/socialbuttons/user.png')
                ];
            }

            /*
            $spiders = $user->relatives()->where('seen', 0)->count();
            if ($spiders > 0){
                $notifications[] = [
                    'url' => url('/social/'.$user->username.'/spiders/'),
                    'icon' => 'fas fa-plus-circle',
                    'text' => 'Hai '.$spiders.' Amici nuovi!',
                    'img' => url('/assets/media/icons/socialbuttons/user.png')
                ];
            }
            */

            $relatives = $user->relatives()->where('allow', 0)->count();
            if ($relatives > 0){
                $notifications[] = [
                    'url' => url('/relations/pending'),
                    'icon' => 'add_circle',
                    'text' => $relatives.' richieste',
                    'img' => url('/assets/media/icons/socialbuttons/user.png')
                ];
            }

            /*
            $friends = DB::table('user_following')->where([['seen', 0],['following_user_id','=', $user->id]])->join('users', 'users.id', '=', 'user_following.follower_user_id')
                ->select('users.*')->orderBy('id', 'DESC');
            if ($friends->count() > 0){
                foreach ($friends->get() as $friend){
                $name = DB::table('users')->where('id',$friend->follower_user_id)->value('username');
                $avatar = DB::table('users')->where('id',$friend->follower_user_id)->value('avatar_location');
                $notifications[] = [
                         'url' => url('/social/'.$user->username.'/followers/'),
                        'icon' => 'fas fa-comment',
                        'text' => $name. ' is following you',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }
            */

            
            $startfollow = DB::table('user_following')
                ->where([['seen', 0], ['following_user_id', $user->id]])
                ->orderBy('id', 'DESC')
                ->limit(20)
                ->get();

            if ($startfollow->count() > 0){
                foreach ($startfollow as $follow){
                    $name = DB::table('users')->where('id',$follow->follower_user_id)->value('username');
                    $avatar = DB::table('users')->where('id',$follow->follower_user_id)->value('avatar_location'); 
                    
                    $notifications[] = [
                        'url' => url('/social/'.$user->username.'/followers/'),
                        'icon' => 'add_circle',
                        'text' => $name.' ora ti sta seguendo',
                        'img' => url('/storage/'.$avatar)
                        ];
                    
                } 

            }
            
            $invites = DB::table('video_send')->where([['seen', null],['azienda_id', $user->id]])
                ->orderBy('id', 'DESC')
                ->limit(10)
                ->get();
            if ($invites->count() > 0){
                foreach ($invites as $invite){
                $name = DB::table('users')->where('id',$invite->influencer_id)->value('username');
                $avatar = DB::table('users')->where('id',$invite->influencer_id)->value('avatar_location');
                $notifications[] = [
                        'url' => url('/10secondi/single/'.$invite->story_id),
                        'icon' => 'play_circle_filled',
                        'text' => 'Guarda il video da '.$name,
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }
            

            $comments = DB::table('post_comments')->where([['seen', 0],['comment_user_id','!=', $user->id]])->join('posts', 'posts.id', '=', 'post_comments.post_id')
                ->where('posts.user_id', $user->id)->select('post_comments.*')->orderBy('id', 'DESC')->limit(20);
            if ($comments->count() > 0){
                foreach ($comments->get() as $comment){
                $name = DB::table('users')->where('id',$comment->comment_user_id)->value('username');
                $avatar = DB::table('users')->where('id',$comment->comment_user_id)->value('avatar_location');
                $notifications[] = [
                        'url' => url('/post/'.$comment->post_id),
                        'icon' => 'chat',
                        'text' => $name. ' ha commentato il tuo post!',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            $likes = DB::table('post_likes')
                ->where([['seen', 0],['like_user_id','!=', $user->id]])
                ->leftJoin('posts', 'posts.id', '=', 'post_likes.post_id')
                ->where('posts.user_id', $user->id)
                ->select('post_likes.*')
                ->orderBy('id', 'DESC')
                ->limit(50)
                ->get();

            if ($likes->count() > 0){
                foreach ($likes as $likne){
                    $name = DB::table('users')->where('id',$likne->like_user_id)->value('username');
                    $brand = DB::table('campi_aggiuntivi')->where('id_utente',$likne->like_user_id)->value('azienda_nome');
                    $avatar = DB::table('users')->where('id',$likne->like_user_id)->value('avatar_location'); 
                    
                    $notifications[] = [
                        'url' => url('/post/'.$likne->post_id),
                        'icon' => 'favorite',
                        'text' => 'A '.$name.' piace il tuo post!',
                        'img' => url('/storage/'.$avatar)
                        ];
                    
                } 

            }

            $saves = DB::table('stories_saved')
                ->where([['seen', 0],['save_user_id','!=', $user->id]])
                ->leftJoin('stories', 'stories.id', '=', 'stories_saved.story_id')
                ->where('stories.user_id', $user->id)
                ->select('stories_saved.*')
                ->limit(20)
                ->orderBy('id', 'DESC')->get();

            if ($saves->count() > 0){
                foreach ($saves as $save){
                    $name = DB::table('users')->where('id',$save->save_user_id)->value('username');
                    $brand = DB::table('campi_aggiuntivi')->where('id_utente',$save->save_user_id)->value('azienda_nome');
                    $avatar = DB::table('users')->where('id',$save->save_user_id)->value('avatar_location'); 
                    
                    $notifications[] = [
                        'url' => url('/10secondi/single/'.$save->story_id),
                        //'url' => url('/feed/'),
                        'icon' => 'favorite',
                        'text' => 'A '.$name.' piace il tuo video!',
                        'img' => url('/storage/'.$avatar)
                        ];
                    
                } 

            }
            

            $groups = DB::table('user_hobbies')
                ->where([['seen', 0],['user_id','=', $user->id]])
                ->leftJoin('hobbies', 'hobbies.id', '=', 'user_hobbies.hobby_id')
                ->where('hobbies.admin_id', '!=', $user->id)
                ->select('hobbies.*')
                ->limit(10)
                ->orderBy('id', 'DESC')->get();

            if ($groups->count() > 0){
                foreach ($groups as $group){
                    $name = DB::table('users')->where('id',$group->admin_id)->value('username');
                    $avatar = DB::table('users')->where('id',$group->admin_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/groups/'),
                        'icon' => 'group',
                        'text' => $name. ' ti ha aggiunto a un gruppo '.$group->name.'.',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            /*
            $replies = DB::table('comment_replies')
                ->where('comment_replies.seen', 0)
                ->where('reply_user_id', '!=', $user->id)
                ->join('post_comments', 'post_comments.id', '=', 'comment_replies.comment_id')
                ->where('post_comments.comment_user_id', '=', $user->id)
                //->select('hobbies.*')
                ->orderBy('id', 'DESC')->get();

            if ($replies->count() > 0){
                foreach ($replies as $reply){
                    $name = DB::table('users')->where('id',$reply->comment_user_id)->value('username');
                    $avatar = DB::table('users')->where('id',$reply->comment_user_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/groups/'),
                        'icon' => 'fas fa-comment',
                        'text' => $name. ' ti ha aggiunto a un gruppo '.$reply->reply.'.',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }
            */


            // business message influencer
            $private = DB::table('messaggi')
                ->where([['letto', 0],['autore_id','!=', $user->id]])
                ->where('chat_influencer_id','=', $user->id)
                ->where('brand_id','!=', $user->id)
                ->limit(10)
                ->get();

            if ($private->count() > 0){
                foreach ($private as $privata){
                    $name = DB::table('users')->where('id',$privata->autore_id)->value('username');
                    $avatar = DB::table('users')->where('id',$privata->autore_id)->value('avatar_location');
                    $campagna = DB::table('campagne')->where('id',$privata->campagna_id)->value('uuid');
                    $notifications[] = [
                        'url' => url('/campagna/'.$campagna),
                        'icon' => 'chat',
                        //'text' => $name. ' ti ha madato un messaggio camapagna. ',
                        'text' => 'Hai un messaggio in camapagne!',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            $unseen = DB::table('user_direct_messages')
                ->where('seen', 0)
                ->where('receiver_user_id', $user->id)
                ->limit(10)
                ->get();

            if ($unseen->count() > 0){
                foreach ($unseen as $message){
                    $name = DB::table('users')->where('id',$message->sender_user_id)->value('username');
                    $avatar = DB::table('users')->where('id',$message->sender_user_id)->value('avatar_location');
                    $snippet = $message->message;
                    $notifications[] = [
                        'url' => url('/direct-messages/open-chat-list'),
                        'icon' => 'chat',
                        //'text' => $name. ' ti ha madato un messaggio camapagna. ',
                        'text' => 'Hai un messaggio nuovo!',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }
            
            // business message brand
            $private = DB::table('messaggi')
                ->where([['letto', 0],['autore_id','!=', $user->id]])
                ->where('brand_id','=', $user->id)
                ->limit(10)
                ->get();

            if ($private->count() > 0){
                foreach ($private as $privata){
                    $name = DB::table('users')->where('id',$privata->autore_id)->value('username');
                    $avatar = DB::table('users')->where('id',$privata->autore_id)->value('avatar_location');
                    $campagna = DB::table('campagne')->where('id',$privata->campagna_id)->value('uuid');
                    $notifications[] = [
                        'url' => url('/campagna/'.$campagna),
                        'icon' => 'chat',
                        //'text' => $name. ' ti ha madato un messaggio camapagna. ',
                        'text' => 'Hai un messaggio in camapagne!',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            //new offer to creator
            $campagne = DB::table('offers')
                ->where('creator_id', $user->id)
                ->where('offers.seen_creator', null)
                ->where('sent_buyer', 1)
                ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->orderBy('offers.id', 'DESC')
                ->limit(20)->get();

            if ($campagne->count() > 0){
                foreach ($campagne as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->buyer_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->buyer_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/offers'),
                        'icon' => 'work',
                        'text' => "Offerta nuova " .$aname,
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            //new offer to buyer

            $campagne = DB::table('offers')
                ->where('buyer_id', $user->id)
                ->where('offers.seen_buyer', 0)
                ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->orderBy('offers.id', 'DESC')->limit(20)->get();

            if ($campagne->count() > 0){
                foreach ($campagne as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->brand_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->brand_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/richieste'),
                        'icon' => 'work',
                        'text' => "Offerta nuova " .$aname,
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            //offer accepted
            $accepted = DB::table('offers')
                ->where('buyer_id', $user->id)
                ->where('offers.accepted_creator', 1)
                ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->orderBy('offers.id', 'DESC')->limit(20)->get();

            if ($accepted->count() > 0){
                foreach ($accepted as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->creator_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->creator_id)->value('avatar_location');
                    $campagna = DB::table('campagne')->where('id',$campagna->campagna_id)->value('uuid');
                    $notifications[] = [
                        'url' => url('/campagna/'.$campagna),
                        'icon' => 'work',
                        'text' => "Ha accetato il tuo offer " .$aname,
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            //offer refused
             $refused = DB::table('offers')
                ->where('buyer_id', $user->id)
                ->where('offers.refused_creator', 1)
                ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->orderBy('offers.id', 'DESC')->limit(20)->get();

            if ($refused->count() > 0){
                foreach ($refused as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->creator_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->creator_id)->value('avatar_location');
                    $campagna = DB::table('campagne')->where('id',$campagna->campagna_id)->value('uuid');
                    $notifications[] = [
                        'url' => url('/campagna/'.$campagna),
                        'icon' => 'work',
                        'text' => "Ha rifiuto il tuo offer " .$aname,
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }
            

            //reviews
            $campagne = DB::table('recensioni')
                ->where([['seen', 0],['influencer_id','=', $user->id]])
                ->leftJoin('campagne', 'campagne.id', '=', 'recensioni.campagna_id')
                ->where('campagne.user_id', '!=', $user->id)
                ->select('campagne.*')
                ->orderBy('id', 'DESC')->limit(20)->get();

            if ($campagne->count() > 0){
                foreach ($campagne as $campagna){
                    $aname = DB::table('recensioni')
                    ->where('influencer_id', '=', $user->id)
                        ->leftJoin('campi_aggiuntivi', 'campi_aggiuntivi.id_utente', '=', 'recensioni.brand_id') 
                                ->value('azienda_nome');
                    $avatar = DB::table('users')->where('id',$campagna->user_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/influencer/'.$user->uuid),
                        'icon' => 'work',
                        'text' => 'Hai una recensione da '.$aname,
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }

            //tagged
            $s = Auth::user()->username;
            $tags = DB::table('post_tags')
                ->where('tag_id', Auth::user()->username)
                ->where('seen', 0)
                ->limit(20)
                ->get();
            if ($tags->count() > 0){
                foreach ($tags as $tag){
                    $aname = DB::table('users')->where('username', $tag->tag_id)->value('username');
                    $avatar = DB::table('users')->where('username', $tag->tag_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/post/'.$tag->post_id),
                        'icon' => 'account_circle',
                        'text' => 'you have been tagged in a post!',
                        'img' => url('/assets/media/icons/socialbuttons/user.png')
                    ];
                }
            }


            /*comment tagged
            $s = Auth::user()->username;
            $tags = DB::table('post_comments')
                ->where('comment_user_id','!=', $user->id)
                ->where('comment', 'like', '%'.$s.'%')
                ->orderBy('id', 'DESC')->get();
            if ($tags->count() > 0){
                foreach ($tags as $tag){
                    $aname = DB::table('users')->where('id', $tag->comment_user_id)->value('username');
                    $avatar = DB::table('users')->where('id',$tag->comment_user_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/post/'.$tag->post_id),
                        'icon' => 'fas fa-comment',
                        'text' => $aname.' has tagged you in a comment!',
                        'img' => url('/storage/'.$avatar)
                    ];
                }
            }
            */
            

            self::$notifications = $notifications;

        }

        return self::$notifications;
    }

    public static function ip($request){
        $ip = $request->headers->get('CF_CONNECTING_IP');
        if (empty($ip))$ip = $request->ip();
        return $ip;
    }

    public static function alternativeAddress($ip, $id){
        $query = IPAPI::query($ip);

        if ($query->status == "success") {

            $country_name = $query->country;
            $lat = $query->lat;
            $lon = $query->lon;
            $city = $query->city;
            $country_code = $query->countryCode;

            $find_country = Country::where('short_name', $country_code)->first();
            $country_id = 0;
            if ($find_country) {
                $country_id = $find_country->id;
            } else {
                $country = new Country();
                $country->name = $country_name;
                $country->shortname = $country_code;
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
                    $city = new City();
                    $city->name = $city;
                    $city->zip = "1";
                    $city->country_id = $country_id;
                    if ($city->save()) {
                        $city_id = $city->id;
                    }
                }
            }


            if (!empty($lat) && !empty($lon) && !empty($city) && !empty($country_code) && !empty($city_id) && !empty($country_id)) {

                self::updateLocation($id, $city_id, $lat, $lon, $city);
            }
        }

    }

    public static function updateLocation($id, $city_id, $lat, $long, $address){
        $find_location = UserLocation::where('user_id', $id)->first();


        if (!$find_location) {

            $find_location = new UserLocation();
            $find_location->user_id = $id;

        }

        $find_location->city_id = $city_id;
        $find_location->latitud = $lat;
        $find_location->longitud = $long;
        $find_location->address = $address;

        $find_location->save();
        
    }
    
    public static function updatePostLocation($postID, $city_id, $lat, $long, $address){
        $find_location = PostLocation::where('post_id', $postID)->first();


        if (!$find_location) {

            $find_location = new PostLocation();
            $find_location->post_id = $postID;

        }

        $find_location->city_id = $city_id;
        $find_location->latitud = $lat;
        $find_location->longitud = $long;
        $find_location->address = $address;

        $find_location->save();
        
    }

    public static function updateCampagnaLocation($campagnaID, $city_id, $lat, $long, $address){
        $find_location = CampagnaLocation::where('campagna_id', $campagnaID)->first();

        if (!$find_location) {

            $find_location = new CampagnaLocation();
            $find_location->campagna_id = $campagnaID;

        }

        $find_location->city_id = $city_id;
        $find_location->latitud = $lat;
        $find_location->longitud = $long;
        $find_location->address = $address;

        $find_location->save();
        
    }

}
