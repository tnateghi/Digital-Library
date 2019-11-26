@extends('admin.layouts.master', ['title' => 'ویرایش مقام'])

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
                    <h2>ویرایش مقام</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('roles.update', ['role' => $role->id]) }}" id="form-validation"  method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">عنوان مقام <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="name" name="name" class="form-control" value="{{ $role->name or old('name') }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="permission_id">دسترسی ها <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="permission_id" name="permission_id[]" class="select-chosen" data-placeholder="انتخاب کنید.." style="width: 250px;" multiple>
                                @foreach(\App\Permission::latest()->get() as $permission)
                                    <option value="{{ $permission->id }}" {{ in_array(trim($permission->id) , $role->permissions->pluck('id')->toArray()) ? 'selected' : ''  }} >{{ $permission->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary"> ذخیره</button>
                            <a href="{{ route('roles.index') }}"><button type="button" class="btn btn-default">لیست مقام ها <i class="gi gi-undo"></i></button></a>
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
