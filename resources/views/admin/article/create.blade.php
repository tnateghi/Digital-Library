@extends('admin.layouts.master', ['title' => 'افزودن نوشته جدید'])

@section('content')
    <!-- Page Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>افزودن نوشته جدید</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>مدیریت نوشته ها</li>
                        <li>افزودن نوشته جدید</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    @include('admin.layouts.errors')
    @include('admin.layouts.messages')

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-md-12">
            <div class="block">
                <!-- CKEditor Title -->
                <div class="block-title">
                    <h2>افزودن نوشته</h2>
                </div>
                <!-- END CKEditor Title -->

                <!-- CKEditor Content -->
                <form action="{{ route('articles.store') }}" method="post" class="form-horizontal">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" id="title" name="title" class="form-control" placeholder="عنوان نوشته" value="{{ old('title') }}">
                        </div>
                    </div>

                    <fieldset>
                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea id="textarea-ckeditor" name="body" class="ckeditor" style="visibility: hidden; display: none;">{!! old('body') !!}</textarea>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12">
                            <div class="col-md-2 col-xs-4">
                                <select name="state" class="form-control">
                                    <option value="publish" selected>انتشار</option>
                                    <option value="draft">پیش نویس</option>
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">ذخیره</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Form Validation Content -->

@endsection

@section('scripts')
    <script src="/js/plugins/ckeditor/ckeditor.js"></script>
@endsection
