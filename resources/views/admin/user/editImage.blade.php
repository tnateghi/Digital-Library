@extends('admin.layouts.master')

@section('content')

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>ویرایش تصویر پروفایل {{ $user->fullname }}</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('users.updateImage', ['user' => $user->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">

                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label class="col-md-3 control-label">تصویر فعلی : </label>
                        <div class="col-md-8">
                            <div class="widget">
                                <img src="{{ $user->getImage }}" style="border-radius: 10px;width:100px;height:100px;" alt="avatar" class="img-circle">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="file">تصویر جدید </label>
                        <div class="col-md-9">
                            <input type="file" id="file" name="file">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> </label>
                        <div class="col-md-9">
                            <p class="well well-sm"><strong>نکته : </strong><br>تصویر کاربر باید با فرمت jpeg با حجم کمتر از 500 کیلوبایت باشد.<br><small>( بهترین اندازه 128*128 )</small></p>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-9 col-md-offset-3">
                            <a href=""><button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">ذخیره</button></a>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}"><button type="button" class="btn btn-effect-ripple btn-default" style="overflow: hidden; position: relative;"><i class="gi gi-redo"></i> بازگشت به صفحه پروفایل </button></a>
                        </div>
                    </div>

                </form>
                <!-- END Form Validation Form -->

            </div>
            <!-- END Form Validation Block -->
            @include('admin.layouts.messages')
            @include('admin.layouts.errors')
        </div>

    </div>
    <!-- END Form Validation Content -->

@endsection

@section('scripts')
    <script src="/ajs/pages/formsValidation.js"></script>
    <script>$(function(){ FormsValidation.init(); });</script>
@endsection