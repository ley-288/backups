<?php

use App\Http\Controllers\Frontend\Auth\PersonaController;

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\frontend\User\ProfiloDettagliController;
use App\Http\Controllers\Frontend\Campagne\CampagneController;
use App\Http\Controllers\Frontend\Campagne\CampagnaSaveController;
use App\Http\Controllers\Frontend\Campagne\CampagneOutController;
use App\Http\Controllers\Frontend\Campagne\OfferController;
use App\Http\Controllers\Frontend\Influencer\InfluencerController;
use App\Http\Controllers\Frontend\Recensioni\RecensioniController;
use App\Http\Controllers\Frontend\Crediti\CreditiController;
use App\Http\Controllers\Frontend\Crediti\CoinsController;
use App\Http\Controllers\Frontend\Faq\FaqController;
use App\Http\Controllers\Frontend\User\BrandController;
use App\Http\Controllers\Frontend\Comuni\ComuniController;
use App\Http\Controllers\Frontend\Chat\ChatController;
use App\Http\Controllers\Frontend\CasaController;
use App\Http\Controllers\Backend\Auth\User\UserController;


//added
use App\Http\Controllers\Frontend\CosmofinController;
use App\Http\Controllers\Frontend\SocialAccountController;
use App\Http\Controllers\Frontend\ReportController;

use App\Http\Controllers\Frontend\SocialFeedController;
use App\Http\Controllers\Frontend\UserCountController;
use App\Http\Controllers\Frontend\TopController;
use App\Http\Controllers\Frontend\FindLocationController;
use App\Http\Controllers\Frontend\FollowController;
use App\Http\Controllers\Frontend\GroupController;
use App\Http\Controllers\Frontend\MessagesController;
use App\Http\Controllers\Frontend\NearbyController;
use App\Http\Controllers\Frontend\PostsController;
use App\Http\Controllers\Frontend\StoriesController;
use App\Http\Controllers\Frontend\SocialProfileController;
use App\Http\Controllers\Frontend\AziendaProfileController;
use App\Http\Controllers\Frontend\AmiciController;
use App\Http\Controllers\Frontend\OptionsController;
use App\Http\Controllers\Frontend\NotificationsController;
use App\Http\Controllers\Frontend\CategorySelectController;

//demo
use App\Http\Controllers\Frontend\SocialFeedOpenController;
use App\Http\Controllers\Frontend\SocialProfileOpenController;
use App\Http\Controllers\Frontend\PostsOpenController;
use App\Http\Controllers\Frontend\Faq\FaqOpenController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', [HomeController::class, 'index'])->name('index');

//Route::get('/', [PersonaController::class, 'showRegistrationForm'])->name('persona.register');
//Route::post('/', [PersonaController::class, 'register'])->name('persona.register.post');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
	Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    return "Cache is cleared";
});


Route::get('/route-list', function () {
    $exitCode = Artisan::call('route:list');
    return '/feed';
});

//Route::get('/schedulerun', function() {
//    $exitCode = Artisan::call('schedule:run');
//    return '/feed';
//});


Route::get('/privacy', function () {
    return view('frontend.privacy');
})->name('privacy');
Route::get('/cookie-policy', function () {
    return view('frontend.cookie');
})->name('cookie');
Route::get('/termini-e-condizioni', function () {
    return view('frontend.termini');
})->name('termini');
Route::get('/supporto', function () {
    return view('frontend.supporto');
})->name('supporto');
Route::get('/suggerimenti', function () {
    return view('frontend.suggerimenti');
})->name('suggerimenti');
Route::get('/verified', function () {
    return view('frontend.verified');
})->name('verificato');
Route::get('/condividi', function () {
    return view('frontend.condividi');
})->name('condividi');
Route::get('/condividi-open', function () {
    return view('frontend.condividi_open');
})->name('condividi_open');
Route::get('/modulovideo', function () {
    return view('frontend.modulo');
})->name('modulo');
Route::get('/formspg1002021lb', function () {
    return view('frontend.form');
})->name('form');


Route::get('/testingspidergain9001001zxyc123', function () {
    return view('frontend.testpage');
})->name('testpage');

/*
//Demo-influencer
Route::get('cerca-campagne-open', [CampagneController::class, 'cercacampagneOut'])->name('cercacampagneOut');
Route::get('/influencer/open', [SocialFeedOpenController::class, 'index'])->name('spiderfeed.open');
Route::get('/social-open/{username}', [SocialProfileOpenController::class, 'index'])->name('socialprofile.index');
//Route::get('/social-open/profile', [SocialProfileOpenController::class, 'index_profile_me'])->name('socialprofile.index.me');
Route::get('/posts-open/list', [PostsOpenController::class, 'fetch'])->name('posts.list');
Route::get('/post-open/{id}', [PostsOpenController::class, 'single'])->name('post.single');
Route::get('faq-open', [FaqOpenController::class, 'index'])->name('faq.open');
Route::get('come-funziona-open', function() {return view('frontend.faq.tutorial_open');});

Route::get('/supporto-open', function() {
    return view('frontend.supporto_open');
})->name('supporto-open');
Route::get('/suggerimenti-open', function() {
    return view('frontend.suggerimenti_open');
})->name('suggerimenti-open');
Route::get('/verified-open', function() {
    return view('frontend.verificato_open');
})->name('verificato.open');


//Demo-azienda
Route::get('cerca-campagne-azienda', [CampagneController::class, 'cercacampagneAzienda'])->name('cercacampagneAzienda');
Route::get('/aziende/open', [SocialFeedOpenController::class, 'index_azienda'])->name('spiderfeed.azienda');
Route::get('/social-azienda/{username}', [SocialProfileOpenController::class, 'index_azienda'])->name('socialprofile.azienda.index');
//Route::get('/social-open/azienda', [SocialProfileOpenController::class, 'index_profile_azienda'])->name('socialprofile.index.me');
Route::get('/posts-azienda/list', [PostsOpenController::class, 'fetch_azienda'])->name('posts.azienda.list');
Route::get('/post-azienda/{id}', [PostsOpenController::class, 'single'])->name('post.azienda.single');
Route::get('come-funziona-azienda', function() {return view('frontend.faq.tutorial_open_azienda');});

Route::get('/supporto-azienda', function() {
    return view('frontend.supporto_azienda');
})->name('supporto.azienda');
Route::get('/suggerimenti-azienda', function() {
    return view('frontend.suggerimenti_azienda');
})->name('suggerimenti.azienda');
Route::get('/verified-azienda', function() {
    return view('frontend.verificato_azienda');
})->name('verificato.azienda');
*/

Route::get('/cosmofin', [CosmofinController::class, 'showUsers'])->name('cosmofin');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */

Route::group(['middleware' => ['auth'], 'namespace' => 'User', 'as' => 'user.'], function () {

    Route::post('campagna/report', [ReportController::class, 'reportCampaign'])->name('campagne.report');
     Route::post('user/report', [ReportController::class, 'reportUser'])->name('user.report');
      Route::post('message/report', [ReportController::class, 'reportMessage'])->name('message.report');
       Route::post('post/report', [ReportController::class, 'reportPost'])->name('post.report');
        Route::post('story/report', [ReportController::class, 'reportStory'])->name('story.report');

    Route::post('campagna/save', [CampagnaSaveController::class, 'saveCampaign'])->name('campagne.save');
    Route::post('/campagna/saved', [CampagneController::class, 'campagnaSaved'])->name('campagna.saved');
    Route::get('/saved-campaigns', [CampagneController::class, 'campagneSaved'])->name('campagne.saved');
    Route::post('campagna/like', [CampagneController::class, 'campagnaLike'])->name('campagne.like');
    Route::post('campagna/likes', [CampagneController::class, 'campagnaLikes'])->name('campagne.likes');
    Route::post('/campagna/liked', [CampagneController::class, 'campagnaLiked'])->name('campagna.liked');
    //Route::get('campagne/closed', [CampagneController::class, 'campagneActive'])->defaults('status', 0)->name('campagne.closed.index');
    //Route::get('campagne/active', [CampagneController::class, 'campagneActive'])->defaults('status', 1)->name('campagne.active.index');

    Route::get('campagne/open', [CampagneController::class, 'campagneAperte'])->name('campagne.closed.index');
    Route::get('campagne/closed', [CampagneController::class, 'campagneClosed'])->name('campagne.closed.index');


    Route::get('/options', [OptionsController::class, 'index']);
    Route::post('/options', [OptionsController::class, 'update']);
    //Route::get('cerca-campagne', [CampagneController::class, 'cercacampagne'])->name('cercacampagne');
    Route::get('/counter', [UserCountController::class, 'userCount'])->name('user.count');

    Route::get('/top', [TopController::class, 'topCount'])->name('top');

    //Modify Profile
    //Route::get('profilo/completa', [ProfiloDettagliController::class, 'create'])->name('profile.completa');
    //Route::get('profilo/completa/modifica', [ProfiloDettagliController::class, 'edit'])->name('profile.completa.modifica');
    //Route::post('profilo/completa/create', [ProfiloDettagliController::class, 'store'])->name('profile.completa.store');
    //Route::put('profilo/completa/update', [ProfiloDettagliController::class, 'update'])->name('profile.completa.update');

    //Maybe Change all Routes to This Format??
    Route::get('profilo/completa', 'ProfiloDettagliController@create')->name('profile.completa');
    Route::get('profilo/completa/modifica', 'ProfiloDettagliController@edit')->name('profile.completa.modifica');
    Route::post('profilo/completa/create', 'ProfiloDettagliController@store')->name('profile.completa.store');
    Route::put('profilo/completa/update', 'ProfiloDettagliController@update')->name('profile.completa.update');
    Route::post('avatar', 'ProfiloDettagliController@avatarbrand')->name('avatar');
    Route::post('cover', 'ProfiloDettagliController@coverbrand')->name('cover');

    // Categories
    Route::get('profilo/categoria/completa', [CategorySelectController::class, 'create'])->name('categoria.completa');
    Route::get('profilo/categoria/', [CategorySelectController::class, 'edit'])->name('categoria.modifica');
    Route::post('profilo/categoria/completa/create', [CategorySelectController::class, 'store'])->name('categoria.store');
    Route::put('profilo/categoria/completa/update', [CategorySelectController::class, 'update'])->name('categoria.update');

    // New Posts & Stories Page
    //Route::get('/newpost', [StoriesController::class, 'selectPostType'])->name('posts.select');
    Route::get('/new', [StoriesController::class, 'newPost'])->name('new.new');
    Route::get('/new/check-in', [StoriesController::class, 'newCheckIn'])->name('new.check-in');
    Route::get('/new/quickpost', [StoriesController::class, 'newQuickPost'])->name('new.post');
    Route::get('/new/photo', [StoriesController::class, 'newPostPhoto'])->name('new.photo');
    Route::get('/new/iframe', [StoriesController::class, 'newPostIframe'])->name('new.iframe');
    Route::get('/new/instagram', [StoriesController::class, 'newPostInstagram'])->name('new.instagram');
    Route::get('/new/tiktok', [StoriesController::class, 'newPostTikTok'])->name('new.tiktok');
    Route::get('/new/facebook', [StoriesController::class, 'newPostFacebook'])->name('new.facebook');
    Route::get('/story/new', [StoriesController::class, 'newStory'])->name('stories.new');
    Route::get('/story/{username}', [StoriesController::class, 'single'])->name('stories.single');
    Route::get('/story/single/{story_id}/{image_id}', [StoriesController::class, 'singleStory'])->name('posts.singleStory');
    Route::post('/story/save', [StoriesController::class, 'saveStory'])->name('story.save');
    Route::post('/story/saved', [StoriesController::class, 'storiesSaved'])->name('story.saved');
     Route::post('/story/delete', [StoriesController::class, 'deleteStory'])->name('story.delete');

    //10 Seconds Get
    Route::get('/10secondi', [StoriesController::class, 'tenSeconds'])->name('ten_seconds');
    Route::get('/10secondi/list', [StoriesController::class, 'tenSecondsList'])->name('ten_seconds.list');
    Route::get('/10secondi/saved', [StoriesController::class, 'tenSecondsSaved'])->name('ten_seconds.saved');
    Route::get('/10secondi/single/{id}', [StoriesController::class, 'tenSecondsSingle'])->name('ten_seconds.single');
    Route::get('/10secondi/aziende', [StoriesController::class, 'tenSecondsAziende'])->name('ten_seconds.aziende');
     Route::get('/10secondi/aziende-data', [StoriesController::class, 'aziendeNearByData'])->name('ten_seconds.nearByData');
    Route::post('/10secondi/send', [StoriesController::class, 'tenSecondsSend'])->name('ten_seconds.send');

    // Stories
    Route::post('/stories/new', [StoriesController::class, 'create'])->name('stories.create');
    Route::post('/stories/quick', [StoriesController::class, 'createQuick'])->name('stories.create');
    Route::post('/stories/delete', [StoriesController::class, 'delete'])->name('stories.delete');
    Route::patch('/stories/{id}/update', [StoriesController::class, 'update'])->name('story.update');


    // Posts
    Route::get('/posts/list', [PostsController::class, 'fetch'])->name('posts.list');
    Route::post('/posts/new', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts/new/check-in', [PostsController::class, 'checkIn'])->name('posts.check-in');
    Route::post('/posts/new/quickpost/send', [PostsController::class, 'quickSend'])->name('posts.quick');
    Route::post('/posts/delete', [PostsController::class, 'delete'])->name('posts.delete');
    Route::patch('/posts/{id}/update', [PostsController::class, 'update'])->name('post.update');
    Route::post('/posts/like', [PostsController::class, 'like'])->name('posts.like');
    Route::post('/posts/likes', [PostsController::class, 'likes'])->name('posts.likes');
    Route::post('/posts/liked', [PostsController::class, 'fetch'])->name('posts.liked');
    Route::post('/posts/comment', [PostsController::class, 'comment'])->name('posts.comment');
      Route::post('/posts/comment/new', [PostsController::class, 'commentNew'])->name('posts.comment.new');
    Route::post('/posts/comment/reply', [PostsController::class, 'reply'])->name('comment.reply');
    Route::post('/posts/comment/like', [PostsController::class, 'commentLike'])->name('comment.like');
    Route::post('/posts/comment/likes', [PostsController::class, 'commentLikes'])->name('comment.likes');
    Route::post('/posts/comment/liked', [PostsController::class, 'fetch'])->name('comment.liked');
    Route::post('/posts/comments/delete', [PostsController::class, 'deleteComment'])->name('posts.comment.delete');
    Route::post('/posts/comments/reply/delete', [PostsController::class, 'deleteReply'])->name('posts.reply.delete');
    Route::get('/post/{id}', [PostsController::class, 'single'])->name('post.single');




    // Search
    //Route::get('/search', [SocialFeedController::class, 'search'])->name('search');
    Route::get('/search/users', [SocialFeedController::class, 'searchUsers'])->name('search.users');
    Route::get('/search/hashtags', [SocialFeedController::class, 'searchHashtags'])->name('search.hashtags');
    Route::get('/search/photos', [SocialFeedController::class, 'searchPhotos'])->name('search.photos');
    Route::get('/search/groups', [SocialFeedController::class, 'searchGroups'])->name('search.groups');
    Route::get('/search/campagne', [SocialFeedController::class, 'searchCampagne'])->name('search.campagne');

    //Nearby

    //TEST PAGES
    Route::get('/leytontest/nearby', [NearbyController::class, 'testIndex'])->name('nearby.index');
    Route::get('/leytontest/nearby-data', [NearbyController::class, 'testNearByData'])->name('nearby.nearByData');

    Route::get('/social/nearby', [NearbyController::class, 'index'])->name('nearby.index');
    Route::get('/social/nearby-data', [NearbyController::class, 'nearByData'])->name('nearby.nearByData');
    Route::get('/posts/nearby', [NearbyController::class, 'postsNearby'])->name('posts.nearby.index');
    //Route::get('/campagne/nearby', [NearbyController::class, 'campagneNearby'])->name('campagne.nearby.index');    

    // Groups
    //Route::get('/groups', [GroupController::class, 'index'])->name('group.index');
    Route::get('/group/{id}', [GroupController::class, 'group'])->name('group');
    Route::post('/group/delete', [GroupController::class, 'deleteGroup'])->name('group.delete');
    Route::get('/group/{id}/stats', [GroupController::class, 'stats'])->name('group.stats');
    Route::post('/group/{id}/people-list', [GroupController::class, 'peopleList'])->name('groups.people.list');
    Route::post('/group/{id}/save/group', [GroupController::class, 'saveUserToGroup'])->name('group.save.user');
    Route::post('/group/{id}/delete/group', [GroupController::class, 'removeUserFromGroup'])->name('group.save.user');

    // Requests //
    //Route::get('/groups/pending', [GroupController::class, 'pending'])->name('groups.pending');
    //Route::post('/groups/delete', [GroupController::class, 'delete'])->name('groups.delete');
    //Route::post('/groups/request', [GroupController::class, 'groupsRequest'])->name('groups.request');

    // Follow
    Route::post('/follow', [FollowController::class, 'follow'])->name('follow.index');
    Route::get('/followers/pending', [FollowController::class, 'pending'])->name('follow.pending');
    Route::post('/follower/request', [FollowController::class, 'followerRequest'])->name('follow.request');
    Route::post('/follower/denied', [FollowController::class, 'followDenied'])->name('follow.denied');

    // Relations
    //Route::get('/relations/pending', [AmiciController::class, 'pending'])->name('relations.pending');
    //Route::post('/relations/delete', [AmiciController::class, 'delete'])->name('relations.delete');
    //Route::post('/relations/request', [AmiciController::class, 'relationsRequest'])->name('relations.request');

    // Messages
    Route::get('/direct-messages', [MessagesController::class, 'index'])->name('messages.index');
    Route::post('/direct-messages/like', [MessagesController::class, 'like'])->name('messages.like');
    Route::post('/direct-messages/likes', [MessagesController::class, 'likes'])->name('posts.likes');
    Route::post('/direct-messages/liked', [MessagesController::class, 'fetch'])->name('posts.liked');
    Route::get('/direct-messages/show/{id}', [MessagesController::class, 'index'])->name('messages.show.index');
    Route::post('/direct-messages/chat', [MessagesController::class, 'chat'])->name('messages.chat');
    Route::post('/direct-messages/send', [MessagesController::class, 'send'])->name('messages.send');
    Route::post('/direct-messages/new-messages', [MessagesController::class, 'newMessages'])->name('new.messages');
    Route::post('/direct-messages/people-list', [MessagesController::class, 'peopleList'])->name('messages.people.list');
    Route::get('/direct-messages/open-chat-list', [MessagesController::class, 'openMessagesList'])->name('open.chats.list');
    Route::post('/direct-messages/delete-chat', [MessagesController::class, 'deleteChat'])->name('messages.chat.delete');
    Route::post('/direct-messages/delete-message', [MessagesController::class, 'deleteMessage'])->name('messages.delete');
    Route::post('/direct-messages/notifications', [MessagesController::class, 'notifications'])->name('messages.notifications');
    Route::post('/direct-messages/hide', [MessagesController::class, 'hideMessages'])->name('messages.hide');


    // Find Location
    Route::get('/social/find-my-location', [FindLocationController::class, 'index'])->name('location.index');
    Route::get('/social/save-my-location', [FindLocationController::class, 'save'])->name('location.save');
    Route::get('/social/save-my-location2', [FindLocationController::class, 'save2'])->name('location.save2');


    // Find Campaign Location
    Route::get('/campagna/find-campagna-location', [FindLocationController::class, 'campLocation'])->name('location.index');
    Route::get('/campagna/save-campagna-location', [FindLocationController::class, 'campLocationSave'])->name('location.save');
    Route::get('/campagna/save-campagna-location2', [FindLocationController::class, 'campLocationSave2'])->name('location.save2');

    // Find Post Location
    Route::get('/post/find-post-location', [FindLocationController::class, 'postLocation'])->name('post.location.index');
    Route::get('/post/save-post-location', [FindLocationController::class, 'postLocationSave'])->name('post.location.save');
    Route::get('/post/save-post-location2', [FindLocationController::class, 'postLocationSave2'])->name('post.location.save2');

    // Notifications
    Route::get('/social/notifications', [NotificationsController::class, 'notifications'])->name('notifications.index');

    // Profilo
    //Route::get('/social/{username}', [SocialProfileController::class, 'index'])->name('socialprofile.index');
    Route::get('/test/{username}', [SocialProfileController::class, 'viewProfile'])->name('socialprofile.view.profile');
    Route::get('/azienda/{b_username}', [AziendaProfileController::class, 'index'])->name('aziendaprofile.index');
    Route::post('/social/{username}/upload/profile-photo', [SocialProfileController::class, 'uploadProfilePhoto'])->name('socialprofile.photo');
    Route::post('/test/{username}/upload/cover', [SocialProfileController::class, 'uploadCover'])->name('socialprofile.cover');
    Route::post('/delete/cover', [SocialProfileController::class, 'deleteCover'])->name('socialprofile.cover.delete');
    Route::post('/social/{username}/save/information', [SocialProfileController::class, 'saveInformation'])->name('socialprofile.save.information');
    Route::get('/social/{username}/following', [SocialProfileController::class, 'following'])->name('socialprofile.following');
    Route::get('/social/{username}/followers', [SocialProfileController::class, 'followers'])->name('socialprofile.followers');
    Route::get('/social/{username}/spiders', [SocialProfileController::class, 'amici'])->name('socialprofile.relations');
    Route::post('/social/{username}/save/hobbies', [SocialProfileController::class, 'saveHobbies'])->name('socialprofile.save.hobby');
    Route::delete('/social/{username}/delete/hobbies', [SocialProfileController::class, 'deleteHobby'])->name('socialprofile.delete.hobby');
    Route::post('/social/{username}/save/relationship', [SocialProfileController::class, 'saveRelationship'])->name('socialprofile.save.relationship');
    Route::post('/social/{username}/save/group', [SocialProfileController::class, 'addGroup'])->name('socialprofile.save.group');
    Route::post('/social/{username}/upload/prof', [SocialProfileController::class, 'updateProfileImages'])->name('socialprofile.image.ok');
    Route::post('/social/{username}/upload/cover', [SocialProfileController::class, 'updateProfileCover'])->name('socialprofile.cover.ok');

    //Campagne and Offers
    Route::get('campagne/crea', [CampagneController::class, 'create'])->name('campagne.crea');
    Route::get('campagne/{uuid}/influencer', [CampagneController::class, 'influencer'])->name('campagne.influencer');
    Route::get('campagne/modifica/{uuid}', [CampagneController::class, 'edit'])->name('campagne.modifica');
    Route::post('campagne/create', [CampagneController::class, 'store'])->name('campagne.store');
    Route::put('campagne/update/{uuid}', [CampagneController::class, 'update'])->name('campagne.update');
    Route::get('campagne/disattiva/{uuid}', [CampagneController::class, 'disattiva'])->name('campagne.disattiva');
    Route::get('campagne/cancella/{uuid}', [CampagneController::class, 'destroy'])->name('campagne.cancella');
    Route::post('recensione/create', [RecensioniController::class, 'add_recensione'])->name('recensione.create');
    Route::post('allegato', [CampagneController::class, 'add_allegato'])->name('allegato');
    Route::post('allegato/delete', [CampagneController::class, 'delete_allegato'])->name('allegato.delete');
    Route::post('immagine', [CampagneController::class, 'add_immagine'])->name('immagine');
    Route::delete('immagine/delete', [CampagneController::class, 'delete_immagine'])->name('immagine.delete');
    Route::post('/campagna-usermatch', [CampagneController::class, 'userMatch'])->name('campagna.user_match');

    //Offers
    Route::post('/send-offer', [OfferController::class, 'sendOffer'])->name('campagna.send-offer');
    Route::post('/send-offer-message', [OfferController::class, 'sendOfferMessage'])->name('campagna.send-offer.message');
    Route::get('/offers', [OfferController::class, 'newOffers'])->name('campagne.newoffers');


    Route::get('campagne/closed_influencer/{uuid}', [CampagneController::class, 'closed_influencer'])->name('campagne.closed_influencer');
    Route::get('campagne/closed_brand/{uuid}', [CampagneController::class, 'closed_in_list_brand'])->name('campagne.closed_in_list_brand');
    Route::post('richiesta/create', [CampagneController::class, 'add_richiesta'])->name('richiesta.create');
    Route::post('offerta/accetta', [CampagneController::class, 'accetta_offerta'])->name('accetta.offerta');


    Route::get('comuni', [ComuniController::class, 'getComuni'])->name('comuni');

    // Route::get('profilo/ruolo/', [ProfiloDettagliController::class, 'ruolo'])->name('profile.ruolo');
    // Route::post('profilo/ruolo/crea', [ProfiloDettagliController::class, 'ruolo_crea'])->name('profile.ruolo.crea');

    Route::get('profilo/ruolo', 'ProfiloDettagliController@ruolo')->name('profile.ruolo');
    Route::post('profilo/ruolo/crea', 'ProfiloDettagliController@ruolo_crea')->name('profile.ruolo.crea');
    Route::get('get/facebook', [ProfiloDettagliController::class, 'facebook'])->name('profile.facebook');
    Route::get('get/instagram', [ProfiloDettagliController::class, 'instagram'])->name('profile.instagram');
    Route::get('get/youtube', [ProfiloDettagliController::class, 'youtube'])->name('profile.youtube');
    Route::get('get/twitter', [ProfiloDettagliController::class, 'twitter'])->name('profile.twitter');

    Route::group(['middleware' => 'check_profile'], function () {
        
        //newpost
        Route::get('/newpost', [StoriesController::class, 'selectPostType'])->name('posts.select');
        
        //search
        Route::get('/search', [SocialFeedController::class, 'search'])->name('search');

        //Social
        Route::get('social_accounts/completa', [SocialAccountController::class, 'create'])->name('social.completa');
        Route::get('social_accounts/', [SocialAccountController::class, 'edit'])->name('social.modifica');
        Route::post('social_accounts/create', [SocialAccountController::class, 'store'])->name('social.store');
        Route::put('social_accounts/update', [SocialAccountController::class, 'update'])->name('social.update');

        //Groups
        Route::get('/groups', [GroupController::class, 'index'])->name('group.index');

        // Lets see
        Route::get('/social/{username}', [SocialProfileController::class, 'index'])->name('socialprofile.index');
        Route::get('cerca-campagne', [CampagneController::class, 'cercacampagne'])->name('cercacampagne');
         Route::post('/user/block', [SocialProfileController::class, 'blockUser'])->name('block.user');
          Route::post('/user/unblock', [SocialProfileController::class, 'unblockUser'])->name('unblock.user');
        

        // User Dashboard Specific
        Route::get('feed', [SocialFeedController::class, 'index'])->name('spiderfeed'); // Added **
        //Route::get('profilo/brand/modifica', [BrandController::class, 'modifica'])->name('brand.modifica');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        // User Account Specific
        Route::get('account', [AccountController::class, 'index'])->name('account');

        // User Profile Specific
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('brand/{uuid}', [BrandController::class, 'getBrand'])->name('brand.get');
        Route::get('influencer/{uuid}', [InfluencerController::class, 'get_influencer'])->name('influencer.get');

        Route::group(['middleware' => 'role:brand'], function () {
            /*
            Route::get('cerca-campagne', [CampagneController::class, 'cercacampagne'])->name('cercacampagne');
            Route::get('campagne/crea', [CampagneController::class, 'create'])->name('campagne.crea');
            Route::get('campagne/{uuid}/influencer', [CampagneController::class, 'influencer'])->name('campagne.influencer');
            Route::get('campagne/modifica/{uuid}', [CampagneController::class, 'edit'])->name('campagne.modifica');
            Route::post('campagne/create', [CampagneController::class, 'store'])->name('campagne.store');
            Route::put('campagne/update/{uuid}', [CampagneController::class, 'update'])->name('campagne.update');
            Route::get('campagne/disattiva/{uuid}', [CampagneController::class, 'disattiva'])->name('campagne.disattiva');
            Route::get('campagne/closed_influencer/{uuid}', [CampagneController::class, 'closed_influencer'])->name('campagne.closed_influencer');
            Route::get('campagne/closed_brand/{uuid}', [CampagneController::class, 'closed_in_list_brand'])->name('campagne.closed_in_list_brand');
            Route::get('campagne/cancella/{uuid}', [CampagneController::class, 'destroy'])->name('campagne.cancella');
            Route::post('richiesta/create', [CampagneController::class, 'add_richiesta'])->name('richiesta.create');
            Route::post('offerta/accetta', [CampagneController::class, 'accetta_offerta'])->name('accetta.offerta');
            Route::post('/campagna-usermatch', [CampagneController::class, 'userMatch'])->name('campagna.user_match');
            Route::post('recensione/create', [RecensioniController::class, 'add_recensione'])->name('recensione.create');
            Route::post('allegato', [CampagneController::class, 'add_allegato'])->name('allegato');
            Route::post('allegato/delete', [CampagneController::class, 'delete_allegato'])->name('allegato.delete');
            Route::post('immagine', [CampagneController::class, 'add_immagine'])->name('immagine');
            Route::delete('immagine/delete', [CampagneController::class, 'delete_immagine'])->name('immagine.delete');
            */
        });

        Route::group(['middleware' => 'role:influencer'], function () {
            Route::post('offerta/create', [CampagneController::class, 'add_offerta'])->name('offerta.create');
            Route::get('richieste', [CampagneController::class, 'richieste'])->name('campagne.richieste');
            Route::get('crediti', [CreditiController::class, 'crediti'])->name('crediti');
            Route::post('crediti/compra', [CreditiController::class, 'compra'])->name('crediti.compra');
            Route::get('crediti/pagamento', [CreditiController::class, 'getPaymentStatus'])->name('crediti.paymentstatus');
            //Route::get('cerca-campagne', [CampagneController::class, 'cercacampagne'])->name('cercacampagne');

             Route::get('coins', [CoinsController::class, 'coins'])->name('coins');
            Route::post('coins/compra', [CoinsController::class, 'compra'])->name('coins.compra');
            Route::get('coins/pagamento', [CoinsController::class, 'getPaymentStatus'])->name('paymentstatus');
        });

        Route::post('chat/create', [CampagneController::class, 'add_chat'])->name('chat.create');
        Route::post('messaggio/create', [CampagneController::class, 'add_messaggio'])->name('messaggio.create');
        Route::get('campagna/{uuid}', [CampagneController::class, 'show'])->name('campagna.dettaglio');
        Route::get('campagne/aperte', [CampagneController::class, 'index'])->defaults('status', 1)->name('campagne.aperte.index');
        Route::get('campagne/chiuse', [CampagneController::class, 'index'])->defaults('status', 0)->name('campagne.chiuse.index');
        //Route::post('avatar', [ProfiloDettagliController::class, 'avatarbrand'])->name('avatar');
        //Route::post('avatar', 'ProfiloDettagliController@avatarbrand')->name('avatar');
         Route::delete('cover/delete', 'ProfiloDettagliController@coverbranddelete')->name('cover.delete');
        Route::delete('avatar/delete', 'ProfiloDettagliController@avatarbranddelete')->name('avatar.delete');
        Route::post('utente/delete', [SocialProfileController::class, 'utentedelete'])->name('utente.delete');
        Route::get('faq', [FaqController::class, 'index'])->name('faq');
        Route::get('come-funziona', function () {
            return view('frontend.faq.tutorial');
        });
        Route::get('tutorial', function () {
            return view('frontend.faq.video');
        });
        Route::post('leggi', [CampagneController::class, 'leggiChat'])->name('leggi');
        Route::post('chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
        Route::get('chat/get', [ChatController::class, 'getMessages'])->name('chat.get');
        Route::get('chat/last', [ChatController::class, 'getLastMessage'])->name('chat.last');
    });


    Route::group(['middleware' => 'role:influencer'], function () {
        // Pagine per completare il profilo
        /* Route::get('profilo/completa', [ProfiloDettagliController::class, 'create'])->name('profile.completa');
        Route::get('profilo/completa/modifica', [ProfiloDettagliController::class, 'edit'])->name('profile.completa.modifica');
        Route::post('profilo/completa/create', [ProfiloDettagliController::class, 'store'])->name('profile.completa.store');
        Route::put('profilo/completa/update', [ProfiloDettagliController::class, 'update'])->name('profile.completa.update');
        */
        Route::get('campagne/closed_influencer/{uuid}', [CampagneController::class, 'closed_influencer'])->name('campagne.closed_influencer');
    });

    Route::group(['middleware' => 'role:brand'], function () {
        //Route::get('profilo/brand/modifica', [BrandController::class, 'modifica'])->name('brand.modifica');
        //Route::get('profilo/brand', [BrandController::class, 'edit'])->name('brand.edit');
        //Route::post('profilo/brand/create', [BrandController::class, 'store'])->name('brand.store');
        //Route::put('profilo/brand/update', [BrandController::class, 'update'])->name('brand.update');
    });
});
