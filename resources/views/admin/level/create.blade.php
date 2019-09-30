@extends('admin.layouts.master')

@section('content')
    <!-- Blank Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>افزودن مدیر جدید</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>مدیریت مقام ها</li>
                        <li>مدیریت کاربران مدیر</li>
                        <li>افزودن مدیر جدید</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->
    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>افزودن مدیر جدید</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('level.store') }}" id="form-validation"  method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="user_id">آیدی کاربر <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="user_id" name="user_id" class="form-control" value="{{ old('name') }}" >
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">ذخیره</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger">تازه کردن</button>
                        </div>
                    </div>
                    <input type="hidden" name="submit" />
                </form>
                <!-- END Form Validation Form -->

            </div>
            <!-- END Form Validation Block -->
            @include('admin.layouts.errors')
            @include('admin.layouts.messages')

        </div>
    </div>
    <!-- END Form Validation Content -->

@endsection