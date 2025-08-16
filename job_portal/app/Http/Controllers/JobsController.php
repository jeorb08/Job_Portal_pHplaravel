<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobType;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function index(){
        $jobTypes= JobType::where('status',1)->get();
        $jobs = Job::where('status',1)->with('jobType') ->orderBy('created_at','DESC') ->paginate(9);
        return view('front.layouts.jobs',[
            'jobs' => $jobs,
            'jobTypes'=> $jobTypes
        ]);

    }
    public function detail($id){
                $job = Job::where([
                            'id' => $id, 
                            'status' => 1
                        ])->with(['jobType','category'])->first();
        
                if ($job == null) {
                abort(404);
        }

        return view('front.jobDetail',[
            'job'=>$job
        ]);


    }
   

    public function applyJob(Request $request){
    $job = Job::find($request->id);

    if (!$job) {
        return back()->with('error', 'Job does not exist.');
    }

    if ($job->user_id == Auth::id()) {
        return back()->with('error', 'You cannot apply on your own job.');
    }

    JobApplication::create([
        'job_id' => $job->id,
        'user_id' => Auth::id(),
        'employer_id' => $job->user_id,
        'applied_date' => now(),
    ]);

    return back()->with('success', 'You have successfully applied.');
}

}
