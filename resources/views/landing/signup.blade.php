@extends('layouts.authentication')

@section('title', 'Sign Up')

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.background-sign').outerHeight($('#signup-card').outerHeight());
        });
    </script>
@endsection

@section('content')
    <div class="col-md-4 no-padding">
        <div class="background-sign sign-up">
            <div class="text">
                <h2>Welcome Back!</h2>
                <p class="p-text">If you already have an account, please login with your personal details</p>
                <div class="center-button">
                    <a href="#">Sign In</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 no-padding">
        <div id="signup-card" class="card">
            <div class="logo-container">
                <img src="images/logo.png" alt="V-Tech" />
            </div>
            <h2>Create an Account</h2>
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
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <button class="mt-5" type="submit">Sign in</button>
            </form>
        </div>
    </div>
@endsection

