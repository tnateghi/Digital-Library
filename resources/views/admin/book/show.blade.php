@extends('admin.layouts.master', ['title' => __('messages.admin.books.show.book_details')])

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>{{ __('messages.admin.books.show.book_details') }} "{{ $book->name }}"</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form id="form-validation" method="post" class="form-horizontal form-bordered">

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.book_name') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $book->name }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.author') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $book->author }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.bookmaker') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $book->bookmaker }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.create_date') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ get_date($book->created_at) }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.count') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $book->count }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.edition_year') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $book->ed_year }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">file : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">
                                @if ($book->file)
                                    <a href="{{ $book->fileUrl() }}">download file</a>
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.description') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $book->description }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.category') }} : </label>
                        <div class="col-md-6">
                            <p class="form-control-static label label-default">{{ $book->category->name }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">{{ __('messages.admin.books.show.added_by') }} : </label>
                        <div class="col-md-6">
                            @can('users-admin') <p class="form-control-static"><a href="{{ route('users.show', ['user' => $book->user->id]) }}" target="_blank">{{ $book->user->fullName }} <i class="gi gi-new_window"></i></a></p> @endcan
                            @cannot('users-admin') <p class="form-control-static">{{ $book->user->fullName }}</p> @endcannot
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-12 col-md-offset-1">
                            <a href="{{ route('books.edit', ['book' => $book->id]) }}"><button type="button" class="btn btn-effect-ripple btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-edit"></i> {{ __('messages.admin.books.show.edit') }}</button></a>
                            <a href="#modal-fade" data-toggle="modal"><button type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;"><i class="fa fa-trash-o"></i> {{ __('messages.admin.books.show.delete') }}</button></a>

                        </div>
                    </div>
                </form>
                <!-- END Form Validation Form -->

                    <form id="delete-book-form" action="{{ route('books.destroy', ['book' => $book->id]) }}" method="post">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                    </form>

                <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title"><strong>{{ __('messages.admin.books.show.alert') }}</strong></h3>
                            </div>
                            <div class="modal-body">
                                {{ __('messages.admin.books.show.delete_alert_text') }}
                            </div>
                            <div class="modal-footer">
                                <button onclick="document.getElementById('delete-book-form').submit();" type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">{{ __('messages.admin.books.show.delete_confirm_text') }}</button></a>
                                <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">{{ __('messages.admin.books.show.delete_cancel_text') }}</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>
@endsection
