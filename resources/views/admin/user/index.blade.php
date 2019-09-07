@extends('admin.layouts.master')

@section('content')

<!-- Page Header -->
<div class="content-header">
    <div class="row">
        <div class="col-sm-6">
            <div class="header-section">
                <h1>لیست کاربران</h1>
            </div>
        </div>
        <div class="col-sm-6 hidden-xs">
            <div class="header-section">
                <ul class="breadcrumb breadcrumb-top">
                    <li>مدیریت کاربران</li>
                    <li><a href="">لیست کاربران</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END Page Header -->

<div class="row">
    <!-- Tables Row -->
    <div class="col-lg-12">
        <!-- Row Styles Block -->
        <div class="block">


            <!-- Row Styles Content -->
            <div class="table-responsive">

                <table class="table table-borderless table-vcenter table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">ID</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>کد ملی</th>
                        <th>تاریخ عضویت</th>
                        <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="text-center"><strong>{{ $user->id }}</strong></td>
                        <td>{{ $user->firstName }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.show', ['user' => $user->id]) }}" data-toggle="tooltip" title="مشاهده" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                <div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 class="modal-title"><strong>هشدار</strong></h3>
                            </div>
                            <div class="modal-body">
                                با حذف کاربر تمامی داده های مربوط به آن نیز پاک خواهد شد،
                                آیا میخواهید کاربر را حذف کنید؟
                            </div>
                            <div class="modal-footer">
                               <button type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">به هر حال حذف شود</button>
                                <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">خیر</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Row Styles Content -->
        </div>
        <!-- END Row Styles Block -->
        @include('admin.layouts.messages')
    </div>
</div>

@endsection