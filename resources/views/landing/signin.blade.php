@extends('layouts.authentication')

@section('title', 'Sign in')

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.background-sign').outerHeight($('#signin-card').outerHeight());
        });
    </script>
@endsection

@section('content')
    <div class="col-md-8 no-padding">
        <div id="signin-card" class="card">
            <div class="logo-container">
                <img src="images/logo.png" alt="V-Tech" />
            </div>
            <h2>Sign in to V-Tech</h2>
            <div class="links">
                <div>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </div>
                <div>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
                <div>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <p class="p-text">or use your <a href="#">Gmail Account</a></p>
            <form>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <p class="my-3 p-text"><a href="#">Forgot your password?</a></p>
                <button class="mt-4" type="submit">Sign in</button>
            </form>
        </div>
    </div>
    <div class="col-md-4 no-padding">
        <div class="background-sign">
            <div class="text">
                <h2>Hello, Friend!</h2>
                <p class="p-text">Enter your personal details and start your journey with us</p>
                <div class="center-button">
                    <a href="#">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
@endsection