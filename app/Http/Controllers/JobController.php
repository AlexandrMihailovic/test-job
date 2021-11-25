<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('job.index');
    }

    public function search(Request $request)
    {
        $jobs = ($request->q) ? Job::search($request->q)->take(20)->get(['id', 'title', 'company', 'location']) : Null;
        return  response()
            ->json(['status' => 200, 'jobs' => $jobs]);
    }

    public function show(Job $job)
    {
        $cv = Cv::search($job->title)->take(20)->get();
        return view('job.show', compact('job', 'cv'));
    }
}
