@extends('admin.layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>مدیریت امانت</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>امانت</li>
                        <li><a href="">مدیریت امانت</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

        <div class="block full">

            <div class="block-title">
                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li @if(!$errors->has('username')) class="active" @endif><a href="#block-tabs-add-lend">ثبت امانت</a></li>
                    <li @if($errors->has('username')) class="active" @endif><a href="#block-tabs-extend">تمدید و بازگشت امانت</a></li>
    {{--                <li @if($errors->has('return-username')) class="active" @endif><a href="#block-tabs-return">ثبت بازگشت</a></li>--}}
                </ul>
            </div>

            <div class="tab-content">
                <div class="tab-pane @if(!$errors->has('username') && !$errors->has('return-bookId')) active @endif" id="block-tabs-add-lend">
                    <form action="{{ route('lends.create') }}" id="form-validation" method="post" class="form-horizontal form-bordered">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="username">نام کاربری  <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="bookId">بارکد کتاب <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="bookId" name="bookId" class="form-control" value="{{ old('bookId') }}">
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">ذخیره</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">تازه کردن</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="tab-pane @if($errors->has('username')) active @endif" id="block-tabs-extend">

                    <form action="{{ route('lends.userActiveLends') }}" id="form-validation-extend" method="post" class="form-horizontal form-bordered">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="username">نام کاربری  <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="username" name="username" class="form-control" value="{{ old('username') }}">
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">جستجوی کاربر</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">تازه کردن</button>
                            </div>
                        </div>
                    </form>
                </div>

                {{--<div class="tab-pane @if($errors->has('return-username')) active @endif" id="block-tabs-return">
                    <form action="{{ route('lends.return') }}" id="form-validation-return" method="post" class="form-horizontal form-bordered">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="return-bookId">بارکد کتاب <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="return-bookId" name="return-username" class="form-control" value="{{ old('return-username') }}">
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-3">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">ذخیره</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">تازه کردن</button>
                            </div>
                        </div>
                    </form>
                </div>--}}
            </div>
        </div>
        @include('admin.layouts.errors')
        @include('admin.layouts.messages')
    </div>
@endsection