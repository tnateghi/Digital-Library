@extends('admin.layouts.master')

@section('content')

<!-- Page Header -->
<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>دیدگاه ها</h1>
            </div>
        </div>
        <div class="col-sm-6 hidden-xs">
            <div class="header-section">
                <ul class="breadcrumb breadcrumb-top">
                    <li>مدیریت نوشته ها</li>
                    <li><a href="">دیدگاه ها</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Page Header -->

@if($comments->count())
<!-- Tables Row -->
<div class="col-lg-12">
    <!-- Row Styles Block -->
    <div class="block">


        <!-- Row Styles Content -->
        <div class="table-responsive">
            <table class="table table-borderless table-hover table-vcenter">
                <thead>
                <tr>

                    <th>نویسنده</th>
                    <th>دیدگاه</th>
                    <th class="hidden-md hidden-sm hidden-xs">در پاسخ به نوشته</th>
                    <th>ارسال شده در</th>

                    {{--<th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->user->fullname }}</td>
                    <td style="width: 400px;">{{ $comment->body }}</td>
                    <td class="hidden-md hidden-sm hidden-xs"><b><a target="_blank" href="{{ route('article.show', ['article' => $comment->article->slug]) }}">{{ $comment->article->title }}</a></b></td>
                    <td>{{ jDate::forge($comment->created_at)->ago() }}</td>

                    {{--<td class="text-center">--}}
                        {{--<a href="{{ route('users.confirm', ['user' => $comment->id]) }}" data-toggle="tooltip" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="تایید"><i class="fa fa-check"></i></a>--}}
                        {{--<a onclick="document.getElementById('deleteUserForm').action='{{ route('users.destroy', ['user' => $comment->id]) }}'" href="#modal-fade" data-toggle="modal" title="حذف" class="btn btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;"><i class="fa fa-times"></i></a>--}}
                    {{--</td>--}}
                </tr>
                @endforeach

                </tbody>
            </table>
            <form id="deleteUserForm" action="#" method="post">
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
                        <div class="modal-body">آیا می خواهید کاربر را حذف کنید؟</div>
                        <div class="modal-footer">
                            <button onclick="document.getElementById('deleteUserForm').submit();" type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">بله</button>
                            <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">خیر</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Row Styles Content -->
    </div>
    <!-- END Row Styles Block -->
    @else

        <div class="block full">
            <!-- Get Started Content -->
            دیدگاهی وجود ندارد
            <!-- END Get Started Content -->
        </div>

    @endif
    @include('admin.layouts.messages')
</div>

@endsection