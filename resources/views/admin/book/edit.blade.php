@extends('admin.layouts.master')

@section('content')

    <!-- Form Validation Content -->
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">

            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>ویرایش کتاب</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('books.update', ['id' => $book->id]) }}" id="form-validation"  method="post" class="form-horizontal form-bordered">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-bookname">نام کتاب <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-bookname" name="bookName" class="form-control" value="{{ $book->name }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-author">نویسنده <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-author" name="author" class="form-control" value="{{ $book->author }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-bookmaker">ناشر <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-bookmaker" name="bookmaker" class="form-control" value="{{ $book->bookmaker }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="range">تعداد <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" id="val-range" name="count" class="form-control" value="{{ $book->count }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-category">دسته <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="val-category" name="category" class="form-control">
                                <option value="">لطفا انتخاب کنید</option>
                                @foreach(\App\BookCategory::all() as $category)
                                    <option value="{{ $category->id }}" @if($book->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-ed_year">سال چاپ <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-ed_year" name="ed_year" class="form-control" value="{{ $book->ed_year }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-description">توضیحات </label>
                        <div class="col-md-9">
                            <textarea id="val-description" name="description" rows="7" class="form-control" >{{ $book->description }}</textarea>
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

@section('scripts')
    <script src="/ajs/pages/formsValidation.js"></script>
    <script>$(function(){ FormsValidation.init(); });</script>
@endsection