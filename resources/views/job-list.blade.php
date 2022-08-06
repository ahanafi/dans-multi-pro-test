@extends('layouts.app')

@section('content')
    <style>
        .list-group-item-action:hover {
            background: #e9542036;
            transition: .75s;
        }
        #pagination {
            margin-top: 30px;
            display: flex;
            justify-content: end;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Job Finder Form') }}</div>

                    <div class="card-body">
                        <form action="{{ route('job.index') }}" class="row mb-5 align-items-end">
                            <div class="col-4">
                                <label class="col-form-label" for="job-description">Job Description</label>
                                <input
                                    value="{{ request()->has('job_description') ? request()->get('job_description') : '' }}"
                                    type="text" name="job_description" class="form-control" id="job-description"
                                    placeholder="Filter by title, benefits, companies, expertise">
                            </div>

                            <div class="col-4">
                                <label class="col-form-label" for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location"
                                       value="{{ request()->has('location') ? request()->get('location') : '' }}"
                                       placeholder="Filter by city, state, zip code or country">
                            </div>

                            <div class="col-2">
                                <div class="form-check" style="margin-bottom: .5rem">
                                    <input
                                        {{ request()->has('is_full_time_only') ? 'checked' : '' }} class="form-check-input"
                                        name="is_full_time_only" type="checkbox" id="inlineFormCheck">
                                    <label class="form-check-label" for="inlineFormCheck">
                                        Full Time Only
                                    </label>
                                </div>
                            </div>

                            <div class="col-2">
                                <button type="submit" class="btn w-100 btn-primary">Search</button>
                            </div>
                        </form>

                        <hr>
                        <div class="result">
                            <h4>Job List</h4>
                            <hr>
                            <div class="list-group">
                                @foreach($jobs as $job)
                                    @if($job !== null)
                                        <a href="{{ route('job.detail', $job['id']) }}"
                                       class="list-group-item list-group-item-action"
                                       aria-current="true">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <h5 class="fw-semibold text-primary mb-1">{{ $job['title'] }}</h5>
                                            <div class="text-end">
                                                <b>{{ $job['location'] }}</b>
                                                <br>
                                                <span>
                                                    {{ \Illuminate\Support\Carbon::parse($job['created_at'])->diffForHumans()  }}
                                                </span>
                                            </div>
                                        </div>
                                        <span class="mb-1 text-muted">{{ $job['company'] }}</span> -
                                        <span class="text-success fw-bold">{{ $job['type'] }}</span>
                                    </a>
                                    @endif
                                @endforeach
                            </div>

                            <div id="pagination">
                                <nav aria-label="...">
                                    <ul class="pagination">
                                        @if(request()->has('page') && request()->get('page') !== null)
                                            <li class="page-item">
                                                <a class="page-link" href="{{ route('job.index') }}">Previous</a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ route('job.index') }}">1</a></li>
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link">2</span>
                                            </li>
                                            <li class="page-item disabled">
                                                <span class="page-link">Next</span>
                                            </li>
                                        @else
                                            <li class="page-item disabled">
                                                <span class="page-link">Previous</span>
                                            </li>
                                            <li class="page-item active" aria-current="page">
                                                <span class="page-link">1</span>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="{{ route('job.index', ['page' => 2]) }}">2</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="{{ route('job.index', ['page' => 2]) }}">Next</a>
                                            </li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
