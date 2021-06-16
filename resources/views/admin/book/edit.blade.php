@extends('admin.layouts.master', ['title' => __('messages.admin.books.edit.edit_book')])

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
                    <h2>{{ __('messages.admin.books.edit.edit_book') }}</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form action="{{ route('books.update', ['book' => $book]) }}" id="form-validation"  method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-bookname">{{ __('messages.admin.books.show.book_name') }} <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-bookname" name="bookName" class="form-control" value="{{ $book->name }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-author">{{ __('messages.admin.books.show.author') }} <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-author" name="author" class="form-control" value="{{ $book->author }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-file">file <span class="text-danger">*</span></label>
                        <div class="col-md-7">
                            <input type="file" id="val-file" name="file" class="form-control" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-bookmaker">{{ __('messages.admin.books.show.bookmaker') }} <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-bookmaker" name="bookmaker" class="form-control" value="{{ $book->bookmaker }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="range">{{ __('messages.admin.books.show.count') }} <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="number" id="val-range" name="count" class="form-control" value="{{ $book->count }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-category">{{ __('messages.admin.books.show.category') }} <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <select id="val-category" name="category" class="form-control">
                                <option value="">{{ __('messages.admin.books.edit.please_select_category') }}</option>
                                @foreach(\App\BookCategory::all() as $category)
                                    <option value="{{ $category->id }}" @if($book->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-ed_year">{{ __('messages.admin.books.show.edition_year') }} <span class="text-danger">*</span></label>
                        <div class="col-md-6">
                            <input type="text" id="val-ed_year" name="ed_year" class="form-control" value="{{ $book->ed_year }}" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="val-description">{{ __('messages.admin.books.show.description') }} </label>
                        <div class="col-md-9">
                            <textarea id="val-description" name="description" rows="7" class="form-control" >{{ $book->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-3">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">{{ __('messages.admin.books.edit.save') }}</button>
                            <button type="reset" class="btn btn-effect-ripple btn-danger">{{ __('messages.admin.books.edit.cancel') }}</button>
                        </div>
                    </div>
                    <input type="hidden" name="submit" />
                </form>
                <!-- END Form Validation Form -->

            </div>
            <!-- END Form Validation Block -->

        </div>
    </div>
    <!-- END Form Validation Content -->

@endsection

@section('scripts')
    <script src="/js/pages/bookCreate.js"></script>
    <script>$(function(){ FormsValidation.init(); });</script>
@endsection
