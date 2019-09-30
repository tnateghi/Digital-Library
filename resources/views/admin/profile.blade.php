@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

            <div class="block">
                <!-- General Elements Title -->
                <div class="block-title">
                    <h2>پروفایل کاربری من</h2>
                </div>

                <!-- END General Elements Title -->

                <!-- General Elements Content -->
                <form method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">تصویر پروفایل : </label>
                        <div class="col-md-7">
                            <div class="widget">
                                <img src="{{ $user->getImage }}" style="border-radius: 10px;width:100px;height:100px;" alt="avatar" class="img-circle">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">نام : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->firstName }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">نام خانوادگی : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->lastName }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">کد ملی (نام کاربری) : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">تاریخ عضویت : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->created_at }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">تلفن : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->tel }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">ایمیل : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">آدرس : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->address }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">درباره من : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->status }}</p>
                        </div>
                    </div>

                </form>
                <!-- END General Elements Content -->
            </div>
        </div>
    </div>

@endsection