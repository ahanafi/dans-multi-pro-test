@extends('layouts.app')

@section('content')
    <style>
        .list-group-item-action:hover{
            background: #e9542036;
            transition: .75s;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Job Details</h4>
                        <a href="{{ route('job.index') }}" class="btn btn-secondary">
                            Return Back
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <td>Job Title</td>
                                <td>:</td>
                                <td>{{ $job['title'] }}</td>
                            </tr>
                            <tr>
                                <td>Job Type</td>
                                <td>:</td>
                                <td>{{ $job['type'] }}</td>
                            </tr>
                            <tr>
                                <td>Company</td>
                                <td>:</td>
                                <td>{{ $job['company'] }}</td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td>:</td>
                                <td>{{ $job['location'] }}</td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td>:</td>
                                <td>{!! $job['description'] !!}</td>
                            </tr>
                            <tr>
                                <td>How to Apply?</td>
                                <td>:</td>
                                <td>{!! $job['how_to_apply'] !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
