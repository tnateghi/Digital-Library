@extends('auth.master')

@section('content')
    <!-- Login Container -->
    <div id="login-container">
        <!-- Register Header -->
        <h1 class="h2 text-light text-center push-top-bottom animation-slideDown">
            <i class="fa fa-plus"></i> <strong>ایجاد حساب کاربری</strong>
        </h1>
        <!-- END Register Header -->
        <div class="animation-fadeInQuickInv">
            @include('admin.layouts.errors')
            @include('admin.layouts.messages')

            @if(session('status'))

                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{ session('status') }}</p>
                </div>
            @endif
        </div>

        <!-- Register Form -->
        <div class="block animation-fadeInQuickInv">

            <!-- Register Title -->
            <div class="block-title">
                <div class="block-options pull-right">
                    <a href="{{ route('login') }}" class="btn btn-effect-ripple btn-primary" data-toggle="tooltip" data-placement="right" title="بازگشت به صفحه ورود"><i class="fa fa-user"></i></a>
                </div>
                <h2>عضویت</h2>
            </div>
            <!-- END Register Title -->

            <!-- Register Form -->
            <form id="form-register" action="{{ route('register') }}" method="post" class="form-horizontal">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" id="first-name" name="first-name" class="form-control" value="{{ old('first-name') }}" placeholder="نام">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" id="last-name" name="last-name" class="form-control"  value="{{ old('last-name') }}" placeholder="نام خانوادگی">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" id="national-code" name="national-code" class="form-control" value="{{ old('national-code') }}" placeholder="کد ملی">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" id="email" name="email" class="form-control"  value="{{ old('email') }}" placeholder="ایمیل">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="text" id="tel" name="tel" class="form-control" value="{{ old('tel') }}"  placeholder="شماره تلفن">
                    </div>
                </div>

                <div class="form-group">

                    <div class="col-xs-12">
                        <textarea id="address" name="address" rows="7" class="form-control" placeholder="آدرس" >{{ old('address') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <br><p><span class="text-danger">نکته</span> : تمامی فیلدها الزامی می باشند.</p>
                    </div>
                </div>

                <div class="form-group form-actions">
                    <div class="col-xs-6">
                        <label class="csscheckbox csscheckbox-primary" data-toggle="tooltip" title="با شرایط موافقم">
                            <input type="checkbox" id="register-terms" name="register-terms" @if(old('register-terms')) checked @endif >
                            <span></span>
                        </label>
                        <label for="register-terms">
                            <a href="#modal-terms" data-toggle="modal">شرایط</a> را خوانده ام
                        </label>
                    </div>
                    <input type="hidden" name="submit">
                    <div class="col-xs-6 text-right">
                        <button type="submit" class="btn btn-effect-ripple btn-success"><i class="fa fa-plus"></i> ایجاد حساب</button>
                    </div>
                </div>
            </form>
            <!-- END Register Form -->
        </div>
        <!-- END Register Block -->

        @include('auth.footer')
    </div>
    <!-- END Login Container -->

    <!-- Modal Terms -->
    <div id="modal-terms" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center"><strong>شرایط ایجاد حساب</strong></h3>
                </div>
                <div class="modal-body">
                    <h4 class="page-header">1. <strong>شرایط</strong></h4>
                    <p>متن آزمایشی</p>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-effect-ripple btn-sm btn-primary" data-dismiss="modal">شرایط را خواندم</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal Terms -->
@endsection