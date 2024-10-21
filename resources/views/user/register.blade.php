@extends('layout.login')

@section('title')
    <title>Rental Kostum | Login</title>
@endsection

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Registrasi Admin</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <form action="{{ url('/login') }}" class="signin-form" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" class="form-control" placeholder="Password"
                                name="password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input id="password-fielde" type="password" class="form-control" placeholder="Confirm Password"
                                name="confirm-password" required>
                            <span toggle="#password-fielde" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary submit pt-3">Sign Up</button>
                        </div>
                    </form>
                    <p class="w-100 text-center">&mdash; Or already have an account? &mdash;</p>
                    <div class="social d-flex text-center">
                        <a href="{{ url('/login') }}" class="px-2 py-2 mr-md-1 rounded"><span
                                class="fas fa-sign-in-alt mr-2"></span>Sign In</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
