@extends('layout.login')

@section('title')
    <title>Rental Kostum | Login</title>
@endsection

@section('body')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Registrasi Admin</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="login-wrap p-0">
                    <form action="{{ url('/register') }}" id="register-form" class="signin-form" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('nama')is-invalid @enderror"
                                placeholder="Username" name="nama" id="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control @error('email')is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="Email" name="email" id="email" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password"
                                class="form-control @error('password')is-invalid @enderror" placeholder="Password"
                                name="password" required>
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="confirm-password-field" type="password"
                                class="form-control @error('confirm-password')is-invalid @enderror"
                                placeholder="Confirm Password" name="confirm-password" required>
                            <span toggle="#confirm-password-field"
                                class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            @error('confirm-password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="role">
                                <option value="1" hidden>Admin Toko</option>
                                {{-- <option value="2">Super</option> --}}
                            </select>
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
