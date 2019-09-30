@extends('admin.layouts.master')

@section('content')

    <!-- Blank Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>مدیریت دسته بندی ها</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>مدیریت کتاب ها</li>
                        <li>مدیریت دسته بندی ها</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->

    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
        <!-- Block Tabs -->
        <div class="block full">
            <!-- Block Tabs Title -->
            <div class="block-title">

                <ul class="nav nav-tabs" data-toggle="tabs">
                    <li @if(!$errors->has('delete-category') && !$errors->has('replace-category') && !$errors->has('update-category') && !$errors->has('update-category-name')) class="active" @endif><a href="#block-tabs-create">افزودن دسته بندی جدید</a></li>
                    <li @if($errors->has('update-category') || $errors->has('update-category-name')) class="active" @endif><a href="#block-tabs-update">ویرایش دسته بندی</a></li>
                    <li @if($errors->has('delete-category') || $errors->has('replace-category')) class="active" @endif><a href="#block-tabs-delete">حذف دسته بندی</a></li>

                </ul>
            </div>
            <!-- END Block Tabs Title -->

            <!-- Tabs Content -->
            <div class="tab-content">
                <div class="tab-pane @if(!$errors->has('delete-category') && !$errors->has('replace-category') && !$errors->has('update-category') && !$errors->has('update-category-name')) active @endif" id="block-tabs-create">
                    <form action="{{ route('book-categories.store') }}" id="form-validation"  method="post" class="form-horizontal">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="name">نام دسته بندی  <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-effect-ripple btn-primary">ذخیره</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">تازه کردن</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="tab-pane @if($errors->has('update-category') || $errors->has('update-category-name')) active @endif" id="block-tabs-update">
                    <form action="{{ route('book-categories.update') }}" id="form-validation"  method="post" class="form-horizontal">
                        {!! csrf_field() !!}
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="update-category">دسته بندی برای ویرایش <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="update-category" name="update-category" class="form-control">
                                    <option value="">لطفا انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="update-category-name">نام جدید دسته بندی  <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <input type="text" id="update-category-name" name="update-category-name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-effect-ripple btn-primary">ذخیره</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">تازه کردن</button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="tab-pane @if($errors->has('delete-category') || $errors->has('replace-category')) active @endif" id="block-tabs-delete">

                    <form action="{{ route('book-categories.destroy') }}" id="form-validation1"  method="post" class="form-horizontal">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="delete-category">انتخاب دسته بندی برای حذف <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="delete-category" name="delete-category" class="form-control">
                                    <option value="">لطفا انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val-replace-category">دسته بندی جایگزین <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="replace-category" name="replace-category" class="form-control">
                                    <option value="">لطفا انتخاب کنید</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-effect-ripple btn-primary">ذخیره</button>
                                <button type="reset" class="btn btn-effect-ripple btn-danger">تازه کردن</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <!-- END Tabs Content -->
        </div>
        <!-- END Block Tabs -->
        @include('admin.layouts.errors')
        @include('admin.layouts.messages')
    </div>

@endsection