@extends('admin.layouts.master')

@section('content')

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>تنظیمات</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('settings.store') }}" id="form-validation" method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-5 control-label">دوره تمدید کاربر (روز)</label>
                        <div class="col-md-6">
                            <input type="number" max="365" min="14" id="user-active-period" name="user-active-period" class="form-control " value="{{ option('userActivePeriod', 365) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">دوره امانت (روز)</label>
                        <div class="col-md-6">
                            <input type="number" max="30" min="7" name="lend-period" class="form-control " value="{{ option('lendPeriod', 14) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">حداکثر امانت جاری</label>
                        <div class="col-md-6">
                            <input type="number" max="10" min="1" name="max-active-lend" class="form-control " value="{{ option('maxActiveLend', 3) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">تعداد تمدید مجاز</label>
                        <div class="col-md-6">
                            <input type="number" max="5" min="1" name="max-extend-count" class="form-control " value="{{ option('maxExtendCount', 1) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5 control-label">فعال کردن صفحه ثبت نام کاربران</label>
                        <div class="col-md-6">
                            <label class="switch switch-primary"><input type="checkbox" name="user-register" @if(option('userRegister', 'off') == 'on') checked @endif><span></span></label>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-6 col-md-offset-5">
                            <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">ذخیره تنظیمات</button>
                        </div>
                    </div>
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