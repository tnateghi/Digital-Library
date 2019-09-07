@extends('admin.layouts.master')

@section('content')
<!-- Page Header -->
<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>نوشته ها</h1>
            </div>
        </div>
        <div class="col-sm-6 hidden-xs">
            <div class="header-section">
                <ul class="breadcrumb breadcrumb-top">
                    <li>مدیریت وبلاگ</li>
                    <li><a href="">نوشته ها</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Page Header -->

@if(! $articles->count())

<div class="block full">
    <!-- Get Started Content -->
    در حال حاضر هیچ نوشته ای موجود نیست
    <!-- END Get Started Content -->
</div>

@else

<div class="row">
    <div class="col-md-12 col-lg-12">
        <!-- Tickets Block -->
        <div class="block">
            <!-- Tickets List -->
                    <div class="table-responsive">

                        <table class="table table-hover table-vcenter table-borderless">
                            <thead>
                            <tr>
                                <th>عنوان</th>
                                <th>نویسنده</th>
                                <th class="text-center">تاریخ انتشار</th>
                                <th class="text-center"><i class="fa fa-comments"></i></th>
                                <th class="text-center">وضعیت</th>

                                <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td><strong>{{ $article->title }}</strong></td>

                                    <td>{{ $article->user->firstName.' '.$article->user->lastName }}</td>

                                    <td class="text-center">{{ $article->created_at }}</td>

                                    <td class="text-center"><span class="badge">{{ $article->comments->count() }}</span></td>
                                    @if($article->state == 'publish')
                                        <td class="text-center"><span class="label label-success">منتشر شده</span></td>
                                    @else
                                        <td class="text-center"><span class="label label-danger">پیش نویس</span></td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ route('articles.edit', ['article' => $article->slug]) }}" title="ویرایش" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-pencil"></i></a>
                                        <a onclick="document.getElementById('deleteForm').action='{{ route('articles.destroy', ['article' => $article->slug]) }}'" href="#modal-fade" data-toggle="modal" title="حذف" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <form action="#" id="deleteForm" method="post">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                    </form>

                    <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h3 class="modal-title"><strong>هشدار</strong></h3>
                                </div>
                                <div class="modal-body">
                                    آیا میخواهید این پست را حذف کنید؟
                                </div>
                                <div class="modal-footer">
                                    <button onclick="document.getElementById('deleteForm').submit();" type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">بله</button>
                                    <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">خیر</button>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        <!-- END Tickets Block -->
        @include('admin.layouts.messages')
    </div>
</div>

@endif

@endsection
