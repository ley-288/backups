<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Scope\UserScope;
use App\Models\Auth\Traits\Method\UserMethod;
use App\Models\Auth\Traits\Attribute\UserAttribute;
use App\Models\Auth\Traits\Relationship\UserRelationship;
use App\Library\sHelper;
use DB;
use Illuminate\Http\Request;
use App\Models\UserLocation;
use App\Models\CampagnaLocation;
use App\Models\App\Campagna;
use App\Models\App\Categorie;
use App\Models\LinkAccount;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        UserMethod,
        UserRelationship,
        UserScope;
    
    public function dettagli() {
        return $this->hasOne('App\Models\App\Dettagli','id_utente');
    }
    public function campagne() {
        return $this->hasMany('App\Models\App\Campagna','user_id','id');
    }
    public function messaggi() {
        return $this->hasMany('App\Models\App\Messaggio','autore_id','id');
    }
    public function chat() {
        return $this->hasMany('App\Models\App\Messaggio','chat_influencer_id','id');
    }
    public function richieste() {
        return $this->hasMany('App\Models\App\Richiesta','influencer_id','id');
    }
    public function offers() {
        return $this->hasMany('App\Models\App\Offer','influencer_id','id');
    }
    public function recensioni() {
        return $this->hasMany('App\Models\App\Recensioni','influencer_id','id');
    }
    public function recensioni_to() {
        return $this->hasMany('App\Models\App\Recensioni','brand_id','id');
    }
    public function posts(){
        return $this->hasMany('App\Models\Post', 'user_id', 'id');
    }
    public function location(){
        return $this->hasOne('App\Models\UserLocation', 'user_id', 'id');
    }
    public function relatives(){
        return $this->hasMany('App\Models\UserRelationship', 'main_user_id', 'id');
    }
    public function relatives2(){
        return $this->hasMany('App\Models\UserRelationship', 'related_user_id', 'id');
    }
    public function follower(){
        return $this->hasMany('App\Models\UserFollowing', 'following_user_id', 'id');
    }
    public function following(){
        return $this->hasMany('App\Models\UserFollowing', 'follower_user_id', 'id');
    }
    public function links(){
        return $this->hasMany('App\Models\LinkAccount', 'azienda_id', 'id');
    }
    public function hobbies(){
        return $this->hasMany('App\Models\UserHobby', 'user_id', 'id');
    }
    public function stories(){
        return $this->hasMany('App\Models\Story', 'user_id', 'id');
    }
    
   // 
   // public function has($Model){
   //     if (count($this->$Model) > 0) return true;
   //     return false;
   // }
   // 
       
    public function getPhoto($w = null, $h = null){
        if (!empty($this->profile_path)){
            $path = '/storage/profile_photos/'.$this->profile_path;
        }else {
            $path = "{{url('/')}}/assets/media/icons/socialbuttons/user.png";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }
    
     public function getCover($w = null, $h = null){
        if (!empty($this->cover_path)){
            $path = 'storage/covers/'.$this->cover_path;
        }else {
            return "";
        }
        if ($w == null && $h == null){
            return url('/'.$path);
        }
        $image = '/resizer.php?';
        if ($w > -1) $image .= '&w='.$w;
        if ($h > -1) $image .= '&h='.$h;
        $image .= '&zc=1';
        $image .= '&src='.$path;
        return url($image);
    }
    
    public function getSex(){
        if ($this->sex == 0) return "Male";
        return "Female";
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getAge(){
        if ($this->birthday) return date('Y') - $this->birthday->format('Y');
    }

    public function getLocation(){
        return "";
    }

    public function getAddress(){
        $location = $this->location()->first();
        if ($location){
            return $location->address;
        }
    }
    
    public function suggestedPeople($limit = 50, $city_id = null, $hobby_id = null, $all = null){
        $list = User::where('id', '!=', $this->id)->where('active', 1);

        if ($all == null) {
            $list = $list->whereNotIn('id', function ($q) {
                $q->select('following_user_id')->from('user_following')->where('follower_user_id', $this->id);
            });
        }

        if ($city_id != null && $hobby_id != null){
            $list = $list->whereExists(function ($query) use($city_id) {
                $query->select(DB::raw(1))
                    ->from('user_locations')
                    ->whereRaw('users.id = user_locations.user_id and user_locations.city_id = '.$city_id);
            })->whereExists(function ($query) use($hobby_id) {
                $query->select(DB::raw(1))
                    ->from('user_hobbies')
                    ->whereRaw('users.id = user_hobbies.user_id and user_hobbies.hobby_id = '.$hobby_id);
            });
        }

        $list = $list->limit($limit)
            //->orderBy('avatar_location', 'desc')
            ->groupBy('avatar_location')
            ->inRandomOrder()
            ->get();
        return $list;
    }


    public function validateUsername($filter = "[^a-zA-Z0-9\-\_\.]"){
        return preg_match("~" . $filter . "~iU", $this->username) ? false : true;
    }

    public function isPrivate(){
        if ($this->private == 1) return true;
        return false;
    }

    public function canSeeProfile($user_id){
        if ($this->id == $user_id || !$this->isPrivate()) return true;
        $relation = $this->follower()->where('follower_user_id', $user_id)->where('allow', 1)->get()->first();
        if ($relation){
            return true;
        }
        return false;
    }


    public function distance($user){
        if ($this->id == $user->id) return "";
        if ($user){
            $user_location = $user->location()->get()->first();
            $my_location = $this->location()->get()->first();
            if ($user_location && $my_location){
                return sHelper::distance($my_location->latitud, $my_location->longitud, $user_location->latitud, $user_location->longitud);
            }
        }
        return "";
    }

    public function findNearby($distance=50){
        $location = $this->location()->get()->first();
        if (!$location) return false;
        $lat = $location->latitud;
        $long = $location->longitud;

        if (empty($lat) || empty($long)) return false;

        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
        $users = UserLocation::select('user_id', 'latitud', 'longitud', 'address',
            DB::raw($raw.' AS distance'))->with('user')
            ->havingRaw("distance < $distance")->orderBy('distance', 'ASC')->get();


        return $users;
    }


    public function findNearbyCompanies($distance=1000){
        $location = $this->location()->get()->first();
        if (!$location) return false;
        $lat = $location->latitud;
        $long = $location->longitud;

        if (empty($lat) || empty($long)) return false;

        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
        $users = UserLocation::select('user_id', 'latitud', 'longitud', 'address',
            DB::raw($raw.' AS distance'))->with('user')
            ->havingRaw("distance < $distance")->orderBy('distance', 'ASC')->get();


        return $users;
    }


    
   public function findNearbyCompaign($distance=50,$category_id){
        $location = $this->location()->get()->first();
        if (!$location) return false;
        $lat = $location->latitud;
        $long = $location->longitud;
        if (empty($lat) || empty($long)) return false;

        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
        $users = CampagnaLocation::select('campagna_id', 'latitud', 'longitud', 'address',
            DB::raw($raw.' AS distance'))->with('campagna')->whereHas('campagna',function($compagna) use($category_id){
            if($category_id){
            	$compagna->whereHas('categorie',function($q) use($category_id){
		    $q->where('id',$category_id);
		});
            }
            	
            })
            ->havingRaw("distance < $distance")->orderBy('distance', 'ASC')->get();


        return $users;
    }

    public function findNearbyShops($distance=99999){
        
        $location = $this->location()->get()->first();//dd($location);
        if (!$location) return false;
        $lat = $location->latitud;//dd($lat);
        $long = $location->longitud;

        if (empty($lat) || empty($long)) return false;
        
        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
        $users = UserLocation::select('user_id', 'latitud', 'longitud', 'address',
            DB::raw($raw.' AS distance'))->with('user')->where('user_id', '!=', $this->id)
            
            
            ->havingRaw("distance < $distance")
            ->orderBy('distance', 'ASC')
            ->get();
        
        return $users;
    }
    
    public function findLinkAccount($linker_ids ,$distance=99999){
    	//dd($linker_ids);
        $location = $this->location()->get()->first();
        if (!$location) return false;
        $lat = $location->latitud;
        $long = $location->longitud;

        if (empty($lat) || empty($long)) return false;

        $raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
        $users = UserLocation::select('user_id', 'latitud', 'longitud', 'address',
            DB::raw($raw.' AS distance'))->with('user')
            ->havingRaw("distance < $distance")->whereIn('user_id', $linker_ids)->orderBy('distance', 'ASC')->get();

        return $users;
    }
    
    
    public function findbyCategory($distance=50, $sel_category="", Request $request){
        $location = $this->location()->get()->first();
        if (!$location) return false;
        $lat = $location->latitud;
        $long = $location->longitud;
        if (empty($lat) || empty($long)) return false;

    	$raw = '111.045 * DEGREES(ACOS(COS(RADIANS('.$lat.')) * COS(RADIANS(latitud)) * COS(RADIANS(longitud) - RADIANS('.$long.')) + SIN(RADIANS('.$lat.')) * SIN(RADIANS(latitud))))';
    	$users = Campagna::select('id', 'user_id', 'titolo',
        	DB::raw($raw.' AS distance'))->with('categorie')->whereHas('categorie',function($q) use($request){
        $q->where('id',$request->category_id);
    })->get();

    return $users;
}

    public function messagePeopleList(){
        $list = $this->follower()->where('allow',1)->with('follower')->whereExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('user_following as f')
                ->whereRaw('f.following_user_id = user_following.follower_user_id')
                ->whereRaw('f.follower_user_id = '.$this->id)
                ->whereRaw('f.allow = 1');
        });

        return $list;
    }

    public function hasHobby($hobby_id){
        $check = $this->hobbies()->where('hobby_id', $hobby_id)->get()->first();
        if ($check) return true;
        return false;
    } 

    

    
}

