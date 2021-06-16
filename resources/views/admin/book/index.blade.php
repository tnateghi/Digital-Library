@extends('admin.layouts.master', ['title' => __('messages.admin.sidebar.books_list')])

@section('content')
    <!-- Blank Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>{{ __('messages.admin.books.index.books_list') }}</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>{{ __('messages.admin.sidebar.books') }}</li>
                        <li>{{ __('messages.admin.sidebar.books_list') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->

    @if($books->isEmpty())
        <div class="block full">
            <!-- Get Started Content -->
            {{ __('messages.admin.books.index.books_list_is_empty') }}
            <!-- END Get Started Content -->
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                @include('admin.layouts.messages')

                <!-- Row Styles Block -->
                <div class="block">
                    <!-- Row Styles Content -->
                    <div class="table-responsive">
                        <table class="table table-borderless table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">ID</th>
                                    <th>{{ __('messages.admin.books.index.book_name') }}</th>
                                    <th>{{ __('messages.admin.books.index.author') }}</th>
                                    <th>{{ __('messages.admin.books.index.bookmaker') }}</th>
                                    <th>{{ __('messages.admin.books.index.edition_year') }}</th>
                                    <th class="text-center">{{ __('messages.admin.books.index.status') }}</th>
                                    <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <td class="text-center">{{ $book->id }}</td>
                                        <td><strong>{{ $book->name }}</strong></td>
                                        <td>{{ $book->author }}</td>
                                        <td>{{ $book->bookmaker }}</td>
                                        <td>{{ $book->ed_year }}</td>

                                        @if(isExtant($book->id))
                                            <td class="text-center"><span class="label label-success">{{ __('messages.admin.books.index.status_available') }}</span></td>
                                        @else
                                            <td class="text-center"><span class="label label-danger">{{ __('messages.admin.books.index.status_notavailable') }}</span></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ route('books.show', ['book' => $book->id]) }}" title="{{ __('messages.admin.books.index.view') }}" data-toggle="tooltip" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Row Styles Content -->
                </div>
                <!-- END Row Styles Block -->

            </div>
        </div>
    @endif
@endsection
