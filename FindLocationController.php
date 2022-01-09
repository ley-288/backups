<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\GoogleMapsHelper;
use App\Library\sHelper;
use App\Library\PastHelper;
use App\Models\City;
use App\Models\Country;
use App\Models\CampagnaLocation;
use App\Models\PostLocation;
use App\Models\App\Campagna;
use Auth;
use Illuminate\Http\Request;
use Response;


class FindLocationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){

        $response = array();

        if (empty($request->input('latitude')) || empty($request->input('longitude'))){
            $response['code'] = 400;
        }else {
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                ->get('result');
                
            //$address = $map['results'][0]['formatted_address'];
            
            if (isset($map['results'][0]['formatted_address'])){
                $address = $map['results'][0]['formatted_address'];
            }

            $country = GoogleMapsHelper::findCountry($map);
            $city = GoogleMapsHelper::findCity($map);
            if ($country && $city) {
                $response['code'] = 200;
                $response['map_info'] = json_encode([
                    'latitude' => $request->input('latitude'),
                    'longitude' => $request->input('longitude'),
                    'country' => $country,
                    'city' => $city,
                    'address' => $address
                ]);
                $response['address'] = $address;
            }
        }
    
        return Response::json($response);

    }


    public function save(Request $request){

       if ((empty($request->input('latitude')) || empty($request->input('longitude'))) && empty($request->input('address'))){
            $response['code'] = 400;
        }else {
            if(!empty($request->input('address'))){
                $map = \GoogleMaps::load('geocoding')
                	->setParamByKey('address', $request->input('address'))
                	->get('results');
            }else{
                $map = \GoogleMaps::load('geocoding')
                	->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                	->get('results');
            }

            $address = $map['results'][0]['formatted_address'];

            $country = GoogleMapsHelper::findCountry($map);

            $city = GoogleMapsHelper::findCity($map);
                        
            if ($country && $city) {
                $country_name = $country['name'];
                $country_code = $country['short_name'];
                //$lat = $request->input('latitude'); backup mate
                //$lon = $request->input('longitude');
                $lat = $map['results'][0]['geometry']["location"]['lat']; //backup mate
                $lon = $map['results'][0]['geometry']["location"]['lng'];
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
		
                    sHelper::updateLocation(Auth::id(), $city_id, $lat, $lon, $address);
                }

            }
        }
    }


    public function save2(Request $request){
        $ip = sHelper::ip($request);
        sHelper::alternativeAddress($ip, Auth::id());
    }


    public function postLocation(Request $request){

        $response = array();

        if (empty($request->input('latitude')) || empty($request->input('longitude'))){
            $response['code'] = 400;
        }else {
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                ->get('result');
                
            //$address = $map['results'][0]['formatted_address'];
            
            if (isset($map['results'][0]['formatted_address'])){
                $address = $map['results'][0]['formatted_address'];
            }

            $country = GoogleMapsHelper::findCountry($map);
            $city = GoogleMapsHelper::findCity($map);
            if ($country && $city) {
                $response['code'] = 200;
                $response['map_info'] = json_encode([
                    'latitude' => $request->input('latitude'),
                    'longitude' => $request->input('longitude'),
                    'country' => $country,
                    'city' => $city,
                    'address' => $address
                ]);
                $response['address'] = $address;
            }
        }
    
        return Response::json($response);

    }


    public function postLocationSave(Request $request){

       if (empty($request->input('latitude')) || empty($request->input('longitude'))){
            $response['code'] = 400;
        }else {
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                ->get('results');

            $post = Post::find($request->input('id'));
            
            $address = $map['results'][0]['formatted_address'];

            $country = GoogleMapsHelper::findCountry($map);

            $city = GoogleMapsHelper::findCity($map);
                        //dd($country,$city);
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
                    
                    sHelper::updatePostLocation($post, $city_id, $lat, $lon, $address);
                }

            }
        }
    }


    public function postLocationSave2(Request $request){
        $ip = sHelper::ip($request);
        sHelper::alternativeAddress($ip, Auth::id());
    }


    public function campLocation(Request $request){
	
        $response = array();

        if (empty($request->input('latitude')) || empty($request->input('longitude'))){
            $response['code'] = 400;
        }else {
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                ->get('result');
                
            //$address = $map['results'][0]['formatted_address'];
            
            if (isset($map['results'][0]['formatted_address'])){
                $address = $map['results'][0]['formatted_address'];
            }

            $country = GoogleMapsHelper::findCountry($map);
            $city = GoogleMapsHelper::findCity($map);
            if ($country && $city) {
                $response['code'] = 200;
                $response['map_info'] = json_encode([
                    'latitude' => $request->input('latitude'),
                    'longitude' => $request->input('longitude'),
                    'country' => $country,
                    'city' => $city,
                    'address' => $address
                ]);
                $response['address'] = $address;
            }
        }
    
        return Response::json($response);

    }


    public function campLocationSave(Request $request){
       if (empty($request->input('latitude')) || empty($request->input('longitude'))){
            $response['code'] = 400;
        }else {
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                ->get('results');

            $campagna = $request->camp_id;
            
            $address = $map['results'][0]['formatted_address'];

            $country = GoogleMapsHelper::findCountry($map);

            $city = GoogleMapsHelper::findCity($map);
                        //dd($country,$city);
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
                    
                    sHelper::updateCampagnaLocation($campagna, $city_id, $lat, $lon, $address);
                }

            }
        }
    }


    public function campLocationSave2(Request $request){
        $ip = sHelper::ip($request);
        sHelper::alternativeAddress($ip, Auth::id());
    }
}
