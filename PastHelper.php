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

class PastHelper
{

    static $notifications = null;
    

    public static function notifications(){
        if (self::$notifications == null){
            $notifications = [];

            $user = Auth::user();

            /*
            $followers = $user->follower()->where('seen', 1)->count();
            if ($followers > 0){
                $notifications[] = [
                    'url' => url('/social/'.$user->username.'/followers/'),
                    'icon' => 'fas fa-plus-circle',
                    'text' => 'Hai '.$followers.' follower nuovi!',
                    'img' => url('/assets/media/icons/socialbuttons/user.png'),
                    'photo_url' => url('/social/'.$user->username.'/followers/')
                ];
            }
            

            $spiders = $user->relatives()->where('seen', 1)->count();
            if ($spiders > 0){
                $notifications[] = [
                    'url' => url('/social/'.$user->username.'/spiders/'),
                    'icon' => 'fas fa-plus-circle',
                    'text' => 'Hai '.$spiders.' Amici nuovi!',
                    'img' => url('/assets/media/icons/socialbuttons/user.png'),
                    'photo_url' => url('/social/'.$user->username.'/spiders/'),
                ];
            }
            */

            $startfollow = DB::table('user_following')
                ->where([['seen', 1], ['following_user_id', $user->id]])
                ->orderBy('id', 'DESC')->limit(20)->get();

            if ($startfollow->count() > 0){
                foreach ($startfollow as $follow){
                    $name = DB::table('users')->where('id',$follow->follower_user_id)->value('username');
                   
                    $avatar = DB::table('users')->where('id',$follow->follower_user_id)->value('avatar_location');
                   
                    $notifications[] = [
                        'url' => url('/social/'.$user->username.'/followers/'),
                        'icon' => 'add_circle',
                        'text' => $name.' ti sta seguendo',
                        
                        'img' => url('/storage/'.$avatar),
                        
                        'photo_url' => url('/social/'.$name),
                        ];
                    
                } 

            }

            $relatives = $user->relatives()->where('allow', 0)->count();
            if ($relatives > 0){
                $notifications[] = [
                    'url' => url('/relations/pending'),
                    'icon' => 'add-circle',
                    'text' => $relatives.' richieste',
                    'img' => url('/assets/media/icons/socialbuttons/user.png'),
                    'photo_url' => url('/relations/pending'),
                ];
            }

            $invites = DB::table('video_send')->where([['seen', 1],['azienda_id', $user->id]])
                ->orderBy('id', 'DESC')
                ->limit(50)
                ->get();
            if ($invites->count() > 0){
                foreach ($invites as $invite){
                $name = DB::table('users')->where('id',$invite->influencer_id)->value('username');
                $avatar = DB::table('users')->where('id',$invite->influencer_id)->value('avatar_location');
                $notifications[] = [
                        'url' => url('/10secondi/single/'.$invite->story_id),
                        'icon' => 'play_circle_filled',
                        'text' => 'Guarda il video da '.$name,
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/storage/'.$avatar),
                    ];
                }
            }

            $comments = DB::table('post_comments')->where([['seen', 1],['comment_user_id','!=', $user->id]])->join('posts', 'posts.id', '=', 'post_comments.post_id')
                ->where('posts.user_id', $user->id)->select('post_comments.*')->orderBy('id', 'DESC')->limit(50);
            if ($comments->count() > 0){
                foreach ($comments->get() as $comment){
                $name = DB::table('users')->where('id',$comment->comment_user_id)->value('username');
                $avatar = DB::table('users')->where('id',$comment->comment_user_id)->value('avatar_location');
                $username = DB::table('users')->where('id',$comment->comment_user_id)->value('username');
                $notifications[] = [
                        'url' => url('/post/'.$comment->post_id),
                        'icon' => 'chat',
                        'text' => $name. ' ha commentato il tuo post!',
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$name),
                    ];
                }
            }

            $likes = DB::table('post_likes')
                ->where([['seen', 1],['like_user_id','!=', $user->id]])
                ->leftJoin('posts', 'posts.id', '=', 'post_likes.post_id')
                ->where('posts.user_id', $user->id)
                ->select('post_likes.*')
                ->orderBy('id', 'DESC')->limit(50)->get();

            if ($likes->count() > 0){
                foreach ($likes as $likne){
                    $name = DB::table('users')->where('id',$likne->like_user_id)->value('username');
                    
                    $avatar = DB::table('users')->where('id',$likne->like_user_id)->value('avatar_location');
                    $username = DB::table('users')->where('id',$likne->like_user_id)->value('username');    
                    $notifications[] = [
                        'url' => url('/post/'.$likne->post_id),
                        'icon' => 'favorite',
                        'text' => 'A '.$name.' piace il tuo post!',
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$name),
                    ];
                } 

            }


            


            $groups = DB::table('user_hobbies')
                ->where([['seen', 1],['user_id','=', $user->id]])
                ->leftJoin('hobbies', 'hobbies.id', '=', 'user_hobbies.hobby_id')
                ->where('hobbies.admin_id', '!=', $user->id)
                ->select('hobbies.*')
                ->orderBy('id', 'DESC')->limit(50)->get();

            if ($groups->count() > 0){
                foreach ($groups as $group){
                    $name = DB::table('users')->where('id',$group->admin_id)->value('username');
                    $avatar = DB::table('users')->where('id',$group->admin_id)->value('avatar_location');
                    $avatar = DB::table('users')->where('id',$group->admin_id)->value('username');
                    $notifications[] = [
                        'url' => url('/groups/'),
                        'icon' => 'group',
                        'text' => $name. ' ti ha aggiunto a un gruppo '.$group->name.'.',
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$user->username),
                    ];
                }
            }

            //new offer to creator
            $offer_from = DB::table('offers')
                ->where('creator_id', $user->id)
                ->where('offers.seen_creator', 1)
                ->where('sent_buyer', 1)
                ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->orderBy('offers.id', 'DESC')->limit(50)->get();

            if ($offer_from->count() > 0){
                foreach ($offer_from as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->buyer_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->buyer_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/offers'),
                        'icon' => 'work',
                        'text' => "Hai un offerta nuova da " .$aname,
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$aname),
                    ];
                }
            }

            //new offer to buyer

            $offer_to = DB::table('richieste')
                ->where('influencer_id', $user->id)
                ->where('richieste.request_seen', 1)
                ->join('campagne', 'campagne.id', '=', 'richieste.campagna_id')
                ->orderBy('richieste.id', 'DESC')->limit(50)->get();

            if ($offer_to->count() > 0){
                foreach ($offer_to as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->brand_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->brand_id)->value('avatar_location');
                    $notifications[] = [
                        'url' => url('/richieste'),
                        'icon' => 'work',
                        'text' => "Hai un offerta nuova da " .$aname,
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$aname),
                    ];
                }
            }

             //offer accepted
            $accepted = DB::table('offers')
                ->where('buyer_id', $user->id)
                ->where('offers.accepted_creator', 2)
                ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->orderBy('offers.id', 'DESC')->limit(50)->get();

            if ($accepted->count() > 0){
                foreach ($accepted as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->creator_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->creator_id)->value('avatar_location');
                    $campagna = DB::table('campagne')->where('id',$campagna->campagna_id)->value('uuid');
                    $notifications[] = [
                        'url' => url('/campagna/'.$campagna),
                        'icon' => 'work',
                        'text' => "Ha accetato il tuo offer " .$aname,
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$aname),
                    ];
                }
            }

            //offer refused
             $refused = DB::table('offers')
                ->where('buyer_id', $user->id)
                ->where('offers.refused_creator', 2)
                ->join('campagne', 'campagne.id', '=', 'offers.campagna_id')
                ->orderBy('offers.id', 'DESC')->limit(50)->get();

            if ($refused->count() > 0){
                foreach ($refused as $campagna){  
                    $aname = DB::table('users')->where('id',$campagna->creator_id)->value('username');
                    $avatar = DB::table('users')->where('id',$campagna->creator_id)->value('avatar_location');
                    $campagna = DB::table('campagne')->where('id',$campagna->campagna_id)->value('uuid');
                    $notifications[] = [
                        'url' => url('/campagna/'.$campagna),
                        'icon' => 'work',
                        'text' => "Ha rifiuto il tuo offer " .$aname,
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$aname),
                    ];
                }
            }

             //reviews
            $campagne = DB::table('recensioni')
                ->where([['seen', 1],['influencer_id','=', $user->id]])
                ->leftJoin('campagne', 'campagne.id', '=', 'recensioni.campagna_id')
                ->where('campagne.user_id', '!=', $user->id)
                ->select('campagne.*')
                ->orderBy('id', 'DESC')->limit(50)->get();

            if ($campagne->count() > 0){
                foreach ($campagne as $campagna){
                    $aname = DB::table('recensioni')
                    ->where('influencer_id', '=', $user->id)
                        ->leftJoin('campi_aggiuntivi', 'campi_aggiuntivi.id_utente', '=', 'recensioni.brand_id') 
                                ->value('azienda_nome');
                    //$name = DB::table('campi_aggiuntivi')->where('id',$campagna->user_id)->value('azienda_nome');
                    $avatar = DB::table('users')->where('id',$campagna->user_id)->value('avatar_location');
                    $username = DB::table('users')->where('id',$campagna->user_id)->value('username');
                    $notifications[] = [
                        'url' => url('/influencer/'.$user->uuid),
                        'icon' => 'work',
                        'text' => 'Hai una recensione da '.$aname,
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$username),
                    ];
                }
            }

            //tagged
            $s = Auth::user()->username;
            $tags = DB::table('post_tags')
                //->where('tag_id', 'like', '%'.$s.'%')
                ->where('tag_id', Auth::user()->username)
                ->where('seen', 1)->limit(50)
                ->get();
            if ($tags->count() > 0){
                foreach ($tags as $tag){
                    $aname = DB::table('users')->where('username', $tag->tag_id)->value('username');
                    $avatar = DB::table('users')->where('username', $tag->tag_id)->value('avatar_location');
                    $username = DB::table('users')->where('username', $tag->tag_id)->value('username');
                    $notifications[] = [
                        'url' => url('/post/'.$tag->post_id),
                        //'url' => url('/feed/'),
                        'icon' => 'account_circle',
                        'text' => 'you have been tagged in a post!',
                        'img' => url('/assets/media/icons/socialbuttons/user.png'),
                        'photo_url' => url('/social/'.$aname),
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
                    $username = DB::table('users')->where('id',$tag->comment_user_id)->value('username');
                    $notifications[] = [
                        'url' => url('/post/'.$tag->post_id),
                        'icon' => 'fas fa-comment',
                        'text' => $aname.' has tagged you in a comment!',
                        'img' => url('/storage/'.$avatar),
                        'photo_url' => url('/social/'.$username),
                    ];
                }
            }
            */
            

            self::$notifications = $notifications;

        }

        return self::$notifications;
    }


}
