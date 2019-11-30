@extends('admin.layouts.master', ['title' => 'لیست کتاب ها'])

@section('content')
    <!-- Blank Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>لیست کتاب ها</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>مدیریت کتاب ها</li>
                        <li>لیست کتاب ها</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->

    @if($books->isEmpty())
        <div class="block full">
            <!-- Get Started Content -->
            لیست کتاب ها خالی است.
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
                                    <th>نام کتاب</th>
                                    <th>نویسنده</th>
                                    <th>ناشر</th>
                                    <th>سال چاپ</th>
                                    <th class="text-center">وضعیت</th>
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
                                            <td class="text-center"><span class="label label-success">موجود</span></td>
                                        @else
                                            <td class="text-center"><span class="label label-danger">ناموجود</span></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ route('books.show', ['book' => $book->id]) }}" title="مشاهده" data-toggle="tooltip" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-eye"></i></a>
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
