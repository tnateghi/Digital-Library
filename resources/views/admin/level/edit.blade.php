@extends('admin.layouts.master')

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
                    <h2> ویرایش مقام های {{ $user->fullname }}</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('level.update', ['user' => $user->id]) }}" id="form-validation"  method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label class="col-md-3 control-label">تصویر پروفایل</label>
                        <div class="col-md-6">
                            <div class="widget">
                                <img src="{{ asset('user-img/'.$user->image) }}" style="border-radius: 10px;width:100px;height:100px;" alt="avatar" class="img-circle">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="role_id">مقام ها <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="role_id" name="role_id[]" class="select-chosen" data-placeholder="انتخاب کنید.." style="width: 250px;" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary"> ذخیره</button>
                        </div>
                    </div>
                </form>
                <!-- END Form Validation Form -->

            </div>
            <!-- END Form Validation Block -->

        </div>
    </div>
    <!-- END Form Validation Content -->

@endsection
