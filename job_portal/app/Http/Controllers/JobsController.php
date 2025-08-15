<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobType;

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
}
