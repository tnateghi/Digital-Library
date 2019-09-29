@extends('auth.master')

@section('content')
    <!-- Login Container -->
    <div id="login-container">
        <!-- Login Header -->
        <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
            <i class="fa fa-cube"></i> {{ config('app.name', 'کتابخانه دیجیتال') }}
        </h1>
        <!-- END Login Header -->

        <div class="animation-fadeInQuickInv">
            @include('admin.layouts.errors')
            @include('admin.layouts.messages')
        </div>

        <!-- Login Block -->
        <div class="block animation-fadeInQuickInv">
            <!-- Login Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="{{ route('password.request') }}" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="right" title="یادآوری گذرواژه"><i class="fa fa-exclamation-circle"></i></a>
                    @if(option('userRegister', 'off') == 'on')<a href="{{ route('register') }}" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="right" title="ایجاد حساب کاربری"><i class="fa fa-plus"></i></a> @endif
                </div>
                <h2>لطفا وارد شوید</h2>
            </div>
            <!-- END Login Title -->

            <!-- Login Form -->
            <form id="form-login" action="{{ route('login') }}" method="post" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}" placeholder="نام کاربری...">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password" id="login-password" name="password" class="form-control" placeholder="گذرواژه...">
                    </div>
                </div>
                <div class="form-group form-actions">
                    <div class="col-xs-8">
                        <label class="csscheckbox csscheckbox-primary" for="login-remember-me">
                            <input type="checkbox" id="login-remember-me" name="remember">
                            <span></span>
                            مرا بخاطر بسپار
                        </label>

                    </div>
                    <div class="col-xs-4 text-right">
                        <button type="submit" class="btn btn-effect-ripple btn-sm btn-primary"><i class="fa fa-check"></i> ورود</button>
                    </div>
                </div>
            </form>

            <!-- END Login Form -->
        </div>
        <!-- END Login Block -->

        @include('auth.footer')
    </div>
    <!-- END Login Container -->
@endsection