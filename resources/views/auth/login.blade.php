@extends('layouts.app')

@section('content')
    <!-- Start Login Register Area -->
    <div class="htc__login__register bg__white ptb--130 mt-40 mb-40"
        style="background: rgba(0, 0, 0, 0) url(images/bg/5.jpg) no-repeat scroll center center / cover ;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <ul class="login__register__menu" role="tablist">
                        <li role="presentation" class="login active"><a href="#login" role="tab" data-toggle="tab">Login</a>
                        </li>
                        <li role="presentation" class="register"><a href="#register" role="tab"
                                data-toggle="tab">Register</a></li>
                    </ul>
                </div>
            </div>
            <!-- Start Login Register Content -->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="htc__login__register__wrap">
                        <!-- Start Single Content -->
                        <div id="login" role="tabpanel" class="single__tabs__panel tab-pane fade in active">
                            <form id="login_form" class="login" action="{{ route('login.post') }}" method="post">
                                @csrf
                                <input type="text" name="email" placeholder="Email*">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <input type="password" name="password" placeholder="Password*">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </form>
                            <div class="tabs__checkbox">
                                <input type="checkbox" name="remember">
                                <span> Remember me</span>
                                <span class="forget"><a href="#">Forget Pasword?</a></span>
                            </div>
                            <div class="htc__login__btn mt--30">
                                <a onclick="document.getElementById('login_form').submit()"style="cursor: pointer;" >Login</a>
                            </div>
                        </div>
                        <!-- End Single Content -->
                        <!-- Start Single Content -->
                        <div id="register" role="tabpanel" class="single__tabs__panel tab-pane fade">
                            <form class="login" id="register_form" method="post" action="{{ route('register.post') }}">
                                @csrf
                                <input type="text" name="name" placeholder="Name*">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <input type="email" name="email" placeholder="Email*">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <input type="password" name="password" placeholder="Password*">
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </form>
                            <div class="tabs__checkbox">
                                <input name="remember" type="checkbox">
                                <span> Remember me</span>
                            </div>
                            <div class="htc__login__btn">
                                <a onclick="document.getElementById('register_form').submit()" style="cursor: pointer;">Register</a>
                            </div>
                        </div>
                        <!-- End Single Content -->
                    </div>
                </div>
            </div>
            <!-- End Login Register Content -->
        </div>
    </div>
    <!-- End Login Register Area -->
@endsection
