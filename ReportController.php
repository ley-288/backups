<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\sHelper;
use App\Models\Auth\User;
use App\Models\Reports\ReportCampaign;
use App\Models\Reports\ReportMessage;
use App\Models\Reports\ReportPost;
use App\Models\Reports\ReportStory;
use App\Models\Reports\ReportUser;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Response;
use Session;
use View;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reportCampaign(Request $request){

        $user = Auth::user();

        $report = new ReportCampaign();
        $report->campaign_id = $request->campagna_id;
        $report->reporter_id = $user->id;
        $report->reason = $request->reason;
        $report->save();

        return redirect()->back()->with('success', 'Campagna Reported');

    }
    
    public function reportUser(Request $request){

        $user = Auth::user();

        $report = new ReportUser();
        $report->user_id = $request->reported_id;
        $report->reporter_id = $user->id;
        $report->reason = $request->reason;
        $report->save();

        return redirect()->back()->with('success', 'User Reported');

    }

    public function reportPost(Request $request){

        $user = Auth::user();

        $report = new ReportPost();
        $report->post_id = $request->post_id;
        $report->reporter_id = $user->id;
        $report->reason = $request->reason;
        $report->save();

        return redirect()->back()->with('success', 'Post Reported');

    }

     public function reportMessage(Request $request){

        $user = Auth::user();

        $report = new ReportMessage();
        $report->message_id = $request->message_id;
        $report->reporter_id = $user->id;
        $report->reason = $request->reason;
        $report->save();

        return redirect()->back()->with('success', 'Message Reported');

    }

     public function reportStory(Request $request){

        $user = Auth::user();

        $report = new ReportStory();
        $report->story_id = $request->story_id;
        $report->reporter_id = $user->id;
        $report->reason = $request->reason;
        $report->save();

        return redirect()->back()->with('success', 'Story Reported');

    }
}