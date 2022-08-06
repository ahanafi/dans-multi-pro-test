@extends('layouts.app')

@section('content')
    <style>

    </style>
    <div class="container px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://coraopolislibrary.org/wp-content/uploads/2017/04/Find-Job-Computer-Button.jpg" class="d-block mx-lg-auto rounded img-fluid" alt="Bootstrap Themes" width="700"
                     height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Are you looking for a new opportunity?</h1>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias animi dolorem et ex iusto numquam, sapiente totam. Alias assumenda autem distinctio ea maiores nisi, nobis porro, repudiandae, temporibus voluptas voluptatum.
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">Register</a>
                </div>
            </div>
        </div>
    </div>
@endsection
