@extends('admin.layouts.master', ['title' => 'ویرایش کاربر'])

@section('content')

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

            @include('admin.layouts.errors')
            @include('admin.layouts.messages')

            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>ویرایش اطلاعات کاربر</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('users.update', ['user' => $user->id]) }}" id="form-validation" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}

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

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-first-name">نام <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-first-name" name="first-name" class="form-control" value="{{ $user->firstName }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-last-name">نام خانوادگی <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-last-name" name="last-name" class="form-control" value="{{ $user->lastName }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-email">ایمیل </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="val-email" name="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-national-code">کد ملی <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-national-code" name="national-code" class="form-control" value="{{ $user->username }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-tel">شماره تلفن <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-tel" name="tel" class="form-control" value="{{ $user->tel }}">
                        </div>
                    </div>

                    @if($user->level != 'creator')
                        @can('roles-admin')
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="role_id">مقام ها </label>
                                <div class="col-md-6">
                                    <select id="role_id" name="role_id[]" class="select-chosen" data-placeholder="انتخاب کنید.." style="width: 250px;" multiple>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endcan
                    @endif

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-address">آدرس <span class="text-danger">*</span></label>
                        <div class="col-md-9">
                            <textarea id="val-address" name="address" rows="7" class="form-control">{{ $user->address }}</textarea>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">ذخیره</button>
                            <a href="{{ route('users.show', ['user' => $user->id]) }}"><button type="button" class="btn btn-effect-ripple btn-warning" style="overflow: hidden; position: relative;"><i class="gi gi-redo"></i> بازگشت به صفحه پروفایل </button></a>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Form -->

            </div>			<!-- END Form Validation Block -->
        </div>
    </div>
    <!-- END Form Validation Content -->

@endsection

@section('scripts')
    <script src="/js/pages/userEdit.js"></script>
    <script>$(function(){ FormsValidation.init(); });</script>
@endsection