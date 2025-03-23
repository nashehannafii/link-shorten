@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Login') }}</div>

                <div class="card-body">
                    <div class="row mt-3 justify-content-center">
                        <a href="{{ url('auth/google') }}" class="btn btn-light" style="border: 2px solid green; color: green; display: flex; align-items: center;width: auto;">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/Google_%22G%22_logo.svg" alt="Google Logo" style="width: 20px; height: 20px; margin-right: 8px;">
                            <span style="font-size: 16px;">Login / Sign In With Google</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection