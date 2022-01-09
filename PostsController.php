<?php
namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\CommentLike;
use App\Models\CommentReply;
use App\Models\PostImage;
use App\Models\PostLike;
use App\Models\PostTag;
use App\Models\PostHashtag;
use App\Models\PostLocation;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;
use View;
// use Intervention\Image\Facades\Image;
use Embera\Embera;
use App\Library\GoogleMapsHelper;
use App\Library\sHelper;
use App\Models\City;
use App\Models\Country;
use Image;



class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fetch(Request $request){
    	//$post_location = PostLocation::all();
    	//dd($post_location);
        $wall_type = $request->input('wall_type'); // 0 => all posts, 1 => profile posts, 2 => group posts
        $list_type = $request->input('list_type'); // 0 => all, 1 => only text, 2 => only image
        $optional_id = $request->input('optional_id'); // Group ID, User ID, or empty
        $limit = intval($request->input('limit'));
        if (empty($limit)) $limit = 20;
        $post_min_id = intval($request->input('post_min_id')); // If not empty, post_id < post_min_id
        $post_max_id = intval($request->input('post_max_id')); // If not empty, post_id > post_max_id
        $div_location = $request->input('div_location');

        $user = Auth::user();

        //$postBody = $this->parseUsernames($request->body);

        $posts = Post::with('user');

        if ($wall_type == 1){
            $posts = $posts->where('user_id', $optional_id)->where('group_id', 0);
        }else if ($wall_type == 2){

            $posts = $posts->where('group_id', $optional_id)->whereExists(function ($query) {
                $query->select(DB::raw(1));
                    
            });
        }else{

            $posts = $posts->where(function($query) use ($user) {

                $query->whereIn('user_id', function ($q) use ($user) {
                    $q->select('following_user_id')->from('user_following')->where('follower_user_id', $user->id)->where('allow', 1);
                });

                $query->orWhere('user_id', $user->id);

                })->where('group_id', 0)->where('spider', '!=', 1);

        }

        if ($list_type == 1){
            $posts = $posts->where('has_image', 1);
        }else if ($list_type == 2) {
            $posts = $posts->where('has_image', 2);
        }

        if ($post_min_id > -1){
            $posts = $posts->where('id', '<', $post_min_id);
        }else if ($post_max_id > -1){
            $posts = $posts->where('id', '>', $post_max_id);
        }

        $posts = $posts->limit($limit)->orderBy('id', 'DESC')->get();

        if ($div_location == 'initialize'){
            $div_location = ['top', 'bottom'];
        }else{
            $div_location = [$div_location];
            if (count($posts) == 0) return "";
        }

        $comment_count = 0;

        return view('widgets.wall_posts', compact('posts', 'user', 'wall_type', 'list_type', 'optional_id', 'limit', 'div_location', 'comment_count'));
    }

    public function single(Request $request, $id){

        $post = Post::find($id);

        if (!$post) return redirect('/search');

        $user = Auth::user();
        $comment_count = 2000000;
        
        $comment = PostComment::find($request->input('hidden_id'));
        //$comment = $request->input('hidden_id');
        $replies = DB::table('comment_replies')
                ->where('comment_id', $comment)
                ->get();

        

        //maybe a problem?
        $can_see = $user->canSeeProfile(Auth::id());

        if ($post->group_id == 0) {
            $can_see = $post->user->canSeeProfile(Auth::id());
            if (!$can_see) return redirect('/search');
        }

        $posttags = DB::table('post_tags')->where('post_id', $post->id)->get('tag_id');
        $posthashtags = DB::table('post_hashtags')->where('post_id', $post->id)->get('hashtag_id');

        $update_all = $post->comments()->where('seen', 0)->update(['seen' => 1]);
        $update_all = $post->likes()->where('seen', 0)->update(['seen' => 1]);
        $update_all = DB::table('post_tags')
                ->where('seen', 0)
                ->where('tag_id', 'like', '%'.$user->username.'%')
                ->update(['seen' => 1]);
                

        return view('post', compact('post', 'user', 'comment_count', 'can_see', 'posttags', 'posthashtags', 'replies'));
    }


    public function delete(Request $request){

        $response = array();
        $response['code'] = 400;

        $post = Post::find($request->input('id'));
        $image = PostImage::where('post_id', $post->id)->delete();
        $tag = PostTag::where('post_id', $post->id)->delete();
        $hashtag = PostHashtag::where('post_id', $post->id)->delete();
        $location = PostLocation::where('post_id', $post->id)->delete();
        
                        
        if ($post){
            if ($post->user_id == Auth::id()) {

                if ($post->delete()) {

                    $response['code'] = 200;
                }
            }
        }

        return Response::json($response);
    }


    public function like(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $post = Post::find($request->input('id'));

        if ($post){
            $post_like = PostLike::where('post_id', $post->id)->where('like_user_id', $user->id)->get()->first();

            if ($post_like) { // UnLike
                if ($post_like->like_user_id == $user->id) {
                    $deleted = DB::delete('delete from post_likes where post_id='.$post_like->post_id.' and like_user_id='.$post_like->like_user_id);
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'unlike';
                    }
                }
            }else{
                // Like
                $post_like = new PostLike();
                $post_like->post_id = $post->id;
                $post_like->like_user_id = $user->id;
                if ($post_like->save()){
                    $response['code'] = 200;
                    $response['type'] = 'like';
                }
            }
            if ($response['code'] == 200){
                $response['like_count'] = $post->getLikeCount();
            }
        }

        return Response::json($response);
    }

    public function commentLike(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $comment = PostComment::find($request->input('id'));

        if ($comment){
            $comment_like = CommentLike::where('comment_id', $comment->id)->where('like_user_id', $user->id)->get()->first();

            if ($comment_like) { // UnLike
                if ($comment_like->like_user_id == $user->id) {
                    $deleted = DB::delete('delete from comment_likes where comment_id='.$comment_like->comment_id.' and like_user_id='.$comment_like->like_user_id);
                    if ($deleted){
                        $response['code'] = 200;
                        $response['type'] = 'unlike';
                    }
                }
            }else{
                // Like
                $comment_like = new CommentLike();
                $comment_like->comment_id = $comment->id;
                $comment_like->like_user_id = $user->id;
                if ($comment_like->save()){
                    $response['code'] = 200;
                    $response['type'] = 'like';
                }
            }
            if ($response['code'] == 200){
                $response['like_count'] = $comment->getCommentLikeCount();
            }
        }

        return Response::json($response);
    }


    public function comment(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $post = Post::find($request->input('id'));
        $text = $request->input('comment');

        if ($post && !empty($text)){

            $comment = new PostComment();
            $comment->post_id = $post->id;
            $comment->comment_user_id = $user->id;
            $comment->comment = $text;
            if ($comment->save()){
                $response['code'] = 200;
                $html = View::make('widgets.post_detail.single_comment', compact('post', 'comment'));
                $response['comment'] = $html->render();
                $html = View::make('widgets.post_detail.comments_title', compact('post', 'comment'));
                $response['comments_title'] = $html->render();
            }

        }

        return Response::json($response);
    }


    public function commentNew(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $text = $request->input('comment');
        
            $comment = new PostComment();
            $comment->post_id = $request->input('postid');
            $comment->comment_user_id = $user->id;
            $comment->comment = $text;
            $comment->save();

        return back();
    }

     public function reply(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $comment = PostComment::find($request->input('commentid'));
        $text = $request->input('reply');

        if ($comment && !empty($text)){

            $reply = new CommentReply();
            $reply->comment_id = $comment->id;
            $reply->reply_user_id = $user->id;
            $reply->reply = $text;
            if ($reply->save()){
                $response['code'] = 200;
                //$html = View::make('widgets.post_detail.single_reply', compact('post', 'comment'));
                //$response['comment'] = $html->render();
                //$html = View::make('widgets.post_detail.comments_title', compact('post', 'comment'));
                //$response['comments_title'] = $html->render();
            }

        }

        return back()->with('success', 'Replied!');
        //return Response::json($response);
    }

    public function deleteComment(Request $request){

        $response = array();
        $response['code'] = 400;

        $post_comment = PostComment::find($request->input('id'));

        if ($post_comment){
            $post = $post_comment->post;
            if ($post_comment->comment_user_id == Auth::id() || $post_comment->post->user_id == Auth::id()) {
                if ($post_comment->delete()) {
                    $response['code'] = 200;
                    $html = View::make('widgets.post_detail.comments_title', compact('post'));
                    $response['comments_title'] = $html->render();
                }
            }
        }
        return Response::json($response);
    }

    public function deleteReply(Request $request){

        $response = array();
        $response['code'] = 400;

        $comment_reply = CommentReply::find($request->input('replyid'));

        if ($comment_reply){
            $comment = $comment_reply->comment;
            if ($comment_reply->reply_user_id == Auth::id() || $comment_reply->comment->user_id == Auth::id()) {
                if ($comment_reply->delete()) {
                    $response['code'] = 200;
                    //$html = View::make('widgets.post_detail.comments_title', compact('post'));
                    //$response['comments_title'] = $html->render();
                }
            }
        }
        return back()->with('success', 'Deleted!');
        //return Response::json($response);
    }


    public function likes(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $post = Post::find($request->input('id'));

        if ($post){
            $response['code'] = 200;
            $html = View::make('widgets.post_detail.likes', compact('post'));
            $response['likes'] = $html->render();
        }

        return Response::json($response);
    }

    public function commentLikes(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $comment_like = PostComment::find($request->input('id'));

        if ($comment_like){
            $response['code'] = 200;
            $html = View::make('widgets.post_detail.comment_likes', compact('comment_like'));
            $response['likes'] = $html->render();
        }

        return Response::json($response);
    }

    public function liked(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $post = Post::find($request->input('id'));

        if ($post){
            $response['code'] = 200;
            $html = View::make('widgets.post_detail.liked', compact('post'));
            $response['likes'] = $html->render();
        }

        return Response::json($response);
    }

    public function commentLiked(Request $request){

        $user = Auth::user();

        $response = array();
        $response['code'] = 400;

        $comment_liked = PostComment::find($request->input('id'));

        if ($comment_liked){
            $response['code'] = 200;
            $html = View::make('widgets.post_detail.comment_liked', compact('comment_liked'));
            $response['likes'] = $html->render();
        }

        return Response::json($response);
    }

    public function create(Request $request){
	
        $data = $request->all();
        $input = json_decode($data['data'], true);

        unset($data['data']);
        foreach ($input as $key => $value) $data[$key] = $value;

        $response = array();
        $response['code'] = 400;
        
        if ($request->hasFile('image')){
            $validator_data['image'] = 'required|max:50120';
            //|mimes:jpeg,jpg,png,gif,mp4,mpeg-4,mov,wmv,avi,flv,mp3,MOV,HEVC //
        }else{
            $validator_data['content'] = 'nullable';
        }

        $validator = Validator::make($data, $validator_data);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $post = new Post();
            $post->content = !empty($data['content'])?$data['content']:'';
            $post->group_id = !empty($data['group_id'])?$data['group_id']:'';
            $post->user_id = Auth::user()->id;

            //$post->tags = !empty($data['tags'])?$data['tags']:'';
            $post->link = !empty($data['link'])?$data['link']:'';
            $post->location = !empty($data['location'])?$data['location']:'';

            $post->both_visible = 0;
            $post->azienda = !empty($data['azienda'])?$data['azienda']:'';
            $post->influencer = !empty($data['influencer'])?$data['influencer']:'';
            $post->map = !empty($data['map'])?$data['map']:'';

            $file_name = '';

            if ($request->hasFile('image')) {
                $post->has_image = 1;
                $file = $request->file('image');
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();

                if ($file->storeAs('/posts/', $file_name)){
                    $destinationPath = public_path('/thumbnail');
                    $img = Image::make($file->path());
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$file_name);
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }
            if ($process) {               
                if ($post->save()){
                    $this->postLocationSave($request,$post->id);
                    if (!empty($input['tags'])) {
                        $tagNames = explode(' ' , $input['tags']);
                        foreach($tagNames as $tagName)
                        {   
                            $posttag = new PostTag();
                            $posttag->post_id = $post->id;
                            $posttag->tag_id = $tagName;
                            $posttag->save(); 
                        }       
                    }

                    if (!empty($input['hashtags'])) {
                        $tagNames = explode(' ' , $input['hashtags']);
                        foreach($tagNames as $tagName)
                        {   
                            $posttag = new PostHashtag();
                            $posttag->post_id = $post->id;
                            $posttag->hashtag_id = $tagName;
                            $posttag->save(); 
                        }       
                    }
                    
                    if ($post->has_image == 1) {
                        
                        
                        

                        $post_image = new PostImage();
                        $post_image->image_path = $file_name;
                        $post_image->post_id = $post->id;
                        

                        if ($post_image->save()){
                            $response['code'] = 200;
                        }else{
                            $response['code'] = 400;
                            $response['message'] = "Oops something went wrong!";
                            $post->delete();
                        }

                    }else{
                        $response['code'] = 200;
                    }
                }
            }else{

                

                $response['code'] = 400;
                $response['message'] = "Oops something went wrong!";
            }


        }

        return Response::json($response);

    }

     public function checkIn(Request $request){
	
        $data = $request->all();
        $input = json_decode($data['data'], true);

        unset($data['data']);
        foreach ($input as $key => $value) $data[$key] = $value;

        $response = array();
        $response['code'] = 400;
        
        if ($request->hasFile('image')){
            $validator_data['image'] = 'required|max:50120';
            //|mimes:jpeg,jpg,png,gif,mp4,mpeg-4,mov,wmv,avi,flv,mp3,MOV,HEVC //
        }else{
            $validator_data['content'] = 'nullable';
        }

        $validator = Validator::make($data, $validator_data);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $post = new Post();
            $post->content = !empty($data['content'])?$data['content']:'';
            $post->group_id = !empty($data['group_id'])?$data['group_id']:'';
            $post->user_id = Auth::user()->id;

            //$post->tags = !empty($data['tags'])?$data['tags']:'';
            //$post->link = !empty($data['link'])?$data['link']:'';
            $post->location = !empty($data['location'])?$data['location']:'';

            $post->map = 1;

            $post->both_visible = 0;
            $post->azienda = !empty($data['azienda'])?$data['azienda']:'';
            $post->influencer = !empty($data['influencer'])?$data['influencer']:'';
            //$post->map = !empty($data['map'])?$data['map']:'';

            $file_name = '';

            if ($request->hasFile('image')) {
                $post->has_image = 1;
                $file = $request->file('image');
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();

                if ($file->storeAs('/posts/', $file_name)){
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }
            if ($process) {               
                if ($post->save()){
                    $this->postLocationSave($request,$post->id);
                    if (!empty($input['tags'])) {
                        $tagNames = explode(' ' , $input['tags']);
                        foreach($tagNames as $tagName)
                        {   
                            $posttag = new PostTag();
                            $posttag->post_id = $post->id;
                            $posttag->tag_id = $tagName;
                            $posttag->save(); 
                        }       
                    }

                    if (!empty($input['hashtags'])) {
                        $tagNames = explode(' ' , $input['hashtags']);
                        foreach($tagNames as $tagName)
                        {   
                            $posttag = new PostHashtag();
                            $posttag->post_id = $post->id;
                            $posttag->hashtag_id = $tagName;
                            $posttag->save(); 
                        }       
                    }
                    
                    if ($post->has_image == 1) {
                        
                        
                        /*
                        $intervention_file = $file;
                        $watermark = url('/assets/media/icons/socialbuttons/user.png');
                     
                        $intervention = Image::make($intervention_file);
                        $intervention->insert($watermark, 'bottom-right', 50, 50);
                        $intervention->resize(400,400);
                        $intervention->text('Spidergain', 50, 50, function($font){
                            $font->size(50);
                            $font->color("#ffb00");
                            $font->align('center');
                            $font->valign('top');
                        });
                        $intervention_file_name = md5(uniqid() . time()) . '.' . $intervention_file->getClientOriginalExtension();
                        $intervention_file->storeAs('/posts/', $intervention_file_name);
                        
                        if ($intervention->save()){

                            $post_image = new PostImage();
                            $post_image->image_path = $intervention_file_name;
                            $post_image->post_id = $post->id;

                        }*/

                        $post_image = new PostImage();
                        $post_image->image_path = $file_name;
                        $post_image->post_id = $post->id;
                        

                        if ($post_image->save()){
                            $response['code'] = 200;
                        }else{
                            $response['code'] = 400;
                            $response['message'] = "Oops something went wrong!";
                            $post->delete();
                        }

                    }else{
                        $response['code'] = 200;
                    }
                }
            }else{

                

                $response['code'] = 400;
                $response['message'] = "Oops something went wrong!";
            }


        }

        return Response::json($response);

    }
    

     public function quickSend(Request $request){
	
        $data = $request->all();
        $input = json_decode($data['data'], true);

        unset($data['data']);
        foreach ($input as $key => $value) $data[$key] = $value;

        $response = array();
        $response['code'] = 400;
        
        if ($request->hasFile('image')){
            $validator_data['image'] = 'required|max:50120';
            //|mimes:jpeg,jpg,png,gif,mp4,mpeg-4,mov,wmv,avi,flv,mp3,MOV,HEVC //
        }else{
            $validator_data['content'] = 'nullable';
        }

        $validator = Validator::make($data, $validator_data);

        if ($validator->fails()) {
            $response['code'] = 400;
            $response['message'] = implode(' ', $validator->errors()->all());
        }else{
            $post = new Post();
            $post->content = !empty($data['content'])?$data['content']:'';
            $post->group_id = !empty($data['group_id'])?$data['group_id']:'';
            $post->user_id = Auth::user()->id;

            //$post->tags = !empty($data['tags'])?$data['tags']:'';
            $post->link = !empty($data['link'])?$data['link']:'';
            $post->location = !empty($data['location'])?$data['location']:'';

            $post->both_visible = 0;
            $post->azienda = !empty($data['azienda'])?$data['azienda']:'';
            $post->influencer = !empty($data['influencer'])?$data['influencer']:'';
            $post->map = !empty($data['map'])?$data['map']:'';

            $post->quickpost = 1;

            $file_name = '';

            if ($request->hasFile('image')) {
                $post->has_image = 1;
                $file = $request->file('image');
                $file_name = md5(uniqid() . time()) . '.' . $file->getClientOriginalExtension();

                if ($file->storeAs('/posts/', $file_name)){
                    $destinationPath = public_path('/thumbnail');
                    $img = Image::make($file->path());
                    $img->resize(100, 100, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$file_name);
                    $process = true;
                } else {
                    $process = false;
                }
            }else{
                $process = true;
            }
            if ($process) {               
                if ($post->save()){
                    $this->postLocationSave($request,$post->id);
                    if (!empty($input['tags'])) {
                        $tagNames = explode(' ' , $input['tags']);
                        foreach($tagNames as $tagName)
                        {   
                            $posttag = new PostTag();
                            $posttag->post_id = $post->id;
                            $posttag->tag_id = $tagName;
                            $posttag->save(); 
                        }       
                    }

                    if (!empty($input['hashtags'])) {
                        $tagNames = explode(' ' , $input['hashtags']);
                        foreach($tagNames as $tagName)
                        {   
                            $posttag = new PostHashtag();
                            $posttag->post_id = $post->id;
                            $posttag->hashtag_id = $tagName;
                            $posttag->save(); 
                        }       
                    }
                    
                    if ($post->has_image == 1) {
                        
                        
                        

                        $post_image = new PostImage();
                        $post_image->image_path = $file_name;
                        $post_image->post_id = $post->id;
                        

                        if ($post_image->save()){
                            $response['code'] = 200;
                        }else{
                            $response['code'] = 400;
                            $response['message'] = "Oops something went wrong!";
                            $post->delete();
                        }

                    }else{
                        $response['code'] = 200;
                    }
                }
            }else{

                

                $response['code'] = 400;
                $response['message'] = "Oops something went wrong!";
            }


        }

        return Response::json($response);

    }


    public function postLocationSave(Request $request,$postID){
    
       if (empty($request->input('latitude')) || empty($request->input('longitude'))){
            $response['code'] = 400;
        }else {
        
            $map = \GoogleMaps::load('geocoding')
                ->setParamByKey('latlng', $request->input('latitude') . ',' . $request->input('longitude'))
                ->get('results');

            //$post = Post::find($postID);
            
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
                    sHelper::updatePostLocation($postID, $city_id, $lat, $lon, $address);
                }

            }
        }
    }

    public function edit($id)
    {
        //

    }

    public function update(Request $request, $id)
    {       

        //$post = Post::find($id);
        $post = Post::find($request->input('postid'));

        $this->validate($request, array(
            'content' => 'nullable',
            'link' => 'nullable',
            'location' => 'nullable',
            'has_image' => 'nullable',
        ));

        $post->content = $request['content'];
        $post->link = $request['link'];
        $post->location = $request['location'];
        $post->save();

        return back()->with('success','Post Updated Successfully');
        
    }
    

}   
