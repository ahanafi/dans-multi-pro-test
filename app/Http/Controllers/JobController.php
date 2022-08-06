<?php

namespace App\Http\Controllers;

use App\Services\JobService;
use Illuminate\Http\Request;

class JobController extends Controller
{
    private JobService $jobService;
    public function __construct()
    {
        $this->jobService = new JobService();
    }

    public function index(Request $request)
    {
        $filters = [];
        if($request->has('job_description') && $request->get('job_description') !== null) {
            $filters['description'] = $request->get('job_description');
        }

        if($request->has('location') && $request->get('location') !== null) {
            $filters['location'] = $request->get('location');
        }

        if($request->has('is_full_time_only') && $request->get('is_full_time_only') !== null) {
            $filters['type'] = 'fulltime';
        }

        $filters['page'] = ($request->has('page') && $request->get('page') !== null)
            ? $request->get('page')
            : 1;

        $jobs = $this->jobService->getJobLists($filters);

        return view('job-list', compact('jobs'));
    }

    public function detail($jobId)
    {
        $job = $this->jobService->getJobDetail($jobId);
        if(is_null($job)) {
            abort(404);
        }
        return view('job-detail', compact('job'));
    }
}
