@extends('admin.layouts.master')

@section('content')
<!-- Page Header -->
<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>امانت های جاری</h1>
            </div>
        </div>
        <div class="col-sm-6 hidden-xs">
            <div class="header-section">
                <ul class="breadcrumb breadcrumb-top">
                    <li>امانت های من</li>
                    <li><a href="">امانت های جاری</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Page Header -->

<!-- Tables Row -->

<div class="col-lg-12">
    @if ($lends->isEmpty())

        <div class="block full">
            <!-- Get Started Content -->
            لیست امانت های جاری شما خالی می باشد.
            <!-- END Get Started Content -->
        </div>

    @else
    <!-- Row Styles Block -->
    <div class="block">
        <div class="block-title">
            <h2>امانت های جاری {{ auth()->user()->fullname }}</h2>
        </div>
        <!-- Row Styles Content -->
        <div class="table-responsive">
            <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title"><strong>خطا</strong></h3>
                        </div>
                        <div class="modal-body">
                            تعداد تمدید این امانت به حداکثر رسیده است
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">تایید</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="modal-fade2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title"><strong>خطا</strong></h3>
                        </div>
                        <div class="modal-body">
                            تاریخ بازگشت امانت به پایان رسیده است
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">تایید</button>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-borderless table-vcenter table-hover">
                <thead>
                <tr>
                    <th>نام کتاب</th>
                    <th>نویسنده</th>
                    <th>تاریخ امانت</th>
                    <th>موعد بازگشت</th>
                    <th style="width: 100px;" class="text-center">قابل تمدید</th>
                    <th style="width: 80px;" class="text-center"><i title="عملیات" class="fa fa-flash"></i></th>
                </tr>
                </thead>
                <tbody>
                @foreach($lends as $lend)
                <tr>
                    <td>{{ $lend->book->name }}</td>
                    <td>{{ $lend->book->author }}</td>
                    <td>@jalali($lend->created_at)</td>
                    <td>@jalali(lend_return_date($lend->created_at))</td>
                    <td class="text-center">
                    @if(lend_expired($lend->created_at))
                        <span class="btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;"><i class="hi hi-remove"></i></span>
                    @elseif($lend->extend_count >= option('maxExtendCount', 1))
                        <span class="btn-effect-ripple btn-xs btn-danger" style="overflow: hidden; position: relative;"><i class="hi hi-remove"></i></span>
                    @else
                        <span class="btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;"><i class="hi hi-ok"></i></span>
                    @endif
                    </td>
                    <td class="text-center">
                        @if(lend_expired($lend->created_at))
                            <a href="#modal-fade2" title="تمدید" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-primary" style="overflow: hidden; position: relative;"><i class="gi gi-refresh"></i></a>
                        @elseif($lend->extend_count >= option('maxExtendCount', 1))
                            <a href="#modal-fade" title="تمدید" data-toggle="modal" class="btn btn-effect-ripple btn-xs btn-primary" style="overflow: hidden; position: relative;"><i class="gi gi-refresh"></i></a>
                        @else
                            <a href="{{ route('lends.extendMyLend', ['lend' => $lend->id]) }}" title="تمدید" class="btn btn-effect-ripple btn-xs btn-primary" style="overflow: hidden; position: relative;"><i class="gi gi-refresh"></i></a>
                        @endif
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
        <!-- END Row Styles Content -->
    </div>
    <!-- END Row Styles Block -->
    @endif
    @include('admin.layouts.messages')
</div>

<!-- END Tables Row -->
@endsection