<?php


namespace App\Http\Controllers\Frontend\Auth;

use App\Models\UserFollowing;
use App\Models\LinkAccount;
use App\Models\Auth\User;
use App\Models\App\Dettagli;
use App\Models\UserLocation;
use App\Http\Controllers\Controller;
use App\Helpers\Auth\SocialiteHelper;
use App\Http\Requests\RegisterRequest;
use App\Events\Frontend\Auth\UserRegistered;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Repositories\Frontend\Auth\UserRepository;
use GoogleRecaptchaToAnyForm\GoogleRecaptcha;
use Auth;
use DB;
use Illuminate\Http\Request;
use Response;

//Backend
use App\Helpers\Auth\AuthHelper;
use App\Exceptions\GeneralException;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;

/**
 * Class RegisterController.
 */
class LinkedAccountController extends Controller
{
    use RegistersUsers;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * RegisterController constructor.
     *
     * @param UserRepository $userRepository
     */

    
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    

    /**
     * Where to redirect users after login.
     *
     * @return string
    */

    public function redirectPath()
    {
        return route('frontend.auth.login');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function linkForm(Request $request)
    {
        $user = Auth::user();
        $keylink = DB::table('linked_accounts')
            ->where('linked_id', $user->id)
            ->join('users', 'users.id', '=', 'azienda_id')
            ->get();
        $test = DB::table('linked_accounts')
            ->where('linked_id', $user->id)
            ->first();
        if($test != null){
            $mainUser = User::find($test->azienda_id);
            // dd($mainUser->id);
            $linker = DB::table('linked_accounts')
            	->where('azienda_id', $mainUser->id)
                ->join('users', 'users.id', '=', 'linked_id');
                
                $linker_ids = $linker->pluck('linked_id');
                $linker_ids[] = $mainUser->id;
               
        }else{
            $linker = DB::table('linked_accounts')
            ->where('azienda_id', $user->id)
            ->join('users', 'users.id', '=', 'azienda_id'); 
            $linker_ids = $linker->pluck('linked_id');
        }
        $linker = $linker->get();
            
        $links = $user->links()->orderBy('created_at', 'DESC')->get();
        $distance = $request->distance ? $request->distance : 9999;
        $nearbyShops = $user->findNearbyShops($distance);
        $nearby = $user->findLinkAccount($linker_ids,$distance,9999);

        return view('frontend.auth.linkedaccount', compact('user', 'links', 'linker', 'nearby', 'nearbyShops', 'keylink'));
    }

    /**
     * @param RegisterRequest $request
     *
     * @throws \Throwable
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function link(Request $request)
    {
        //abort_unless(config('access.registration'), 404);
        
        $user = $this->userRepository->create($request->only('first_name', 'last_name', 'email', 'password', 'register_as'));

        $new_link = new LinkAccount;
        $new_link->azienda_id = Auth::user()->id;
        $new_link->linked_id = $user->id;
        $new_link->save();
        
        $new_link_follow = new UserFollowing;
        $new_link_follow->follower_user_id = Auth::user()->id;
        $new_link_follow->following_user_id = $user->id;
        $new_link_follow->allow = 1;
        $new_link_follow->save();

        $new_link_follow_2 = new UserFollowing;
        $new_link_follow_2->follower_user_id = $user->id;
        $new_link_follow_2->following_user_id = Auth::user()->id;
        $new_link_follow_2->allow = 1;
        $new_link_follow_2->save();
        
        $user->linked_account = 1;
        $user->company = 1;
        $user->save();

        return back();
    }

    public function loginAs(Request $request, User $user)
    {
        $user = $request->id;
        // Overwrite who we're logging in as, if we're already logged in as someone else.
        
            // Let's not try to login as ourselves.
            //if ($request->user()->id === $user->id || (int) session()->get('admin_user_id') === $user->id) {
            //    throw new GeneralException('Do not try to login as yourself.');
            //}

            // Overwrite temp user ID.
            session(['temp_user_id' => $user]);

            // Login.
            auth()->loginUsingId($user);
		
            // Redirect.
            return redirect()->route(home_route());
        

        resolve(AuthHelper::class)->flushTempSession();
	
        // Won't break, but don't let them "Login As" themselves
        if ($request->user()->id === $user) {
            throw new GeneralException('Do not try to login as yourself.');
        }

        // Add new session variables
        //session(['admin_user_id' => $request->user()->id]);
        //session(['admin_user_name' => $request->user()->full_name]);
        //session(['temp_user_id' => $user->id]);

        // Login user
        auth()->loginUsingId($user);

        // Redirect to frontend
        return redirect()->route(home_route());
    }

     public function linkDelete(Request $request){

        $response = array();
        $response['code'] = 400;

        $user = Auth::user();
        $link = $request->input('link_user_id');

        LinkAccount::where('azienda_id', $user->id)->where('linked_id', $link)->delete();
        UserFollowing::where('following_user_id', $user->id)->where('follower_user_id', $link)->delete();
        UserFollowing::where('following_user_id', $link)->where('follower_user_id', $user->id)->delete();
        UserFollowing::where('following_user_id', '274')->where('follower_user_id', $link)->delete();
        UserFollowing::where('following_user_id', $link)->where('follower_user_id', '274')->delete();
        
        $update_all = User::where('id', $link)->update(['complete' => 0], ['active' => 0]);
                  

        return back();
        
    }
}
