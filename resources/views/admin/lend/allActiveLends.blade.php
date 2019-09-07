@extends('admin.layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>لیست کامل امانت های جاری</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>امانت</li>
                        <li><a href="">لیست کامل امانت های جاری</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    @if($lends->count())
        <!-- Tables Row -->
        <div class="col-lg-12">
            <!-- Row Styles Block -->
            <div class="block">
                <!-- Row Styles Content -->
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-vcenter">
                        <thead>
                        <tr>
                            <th>نام کتاب</th>
                            <th>نویسنده</th>
                            <th>امانت گیرنده</th>
                            <th>تاریخ امانت</th>
                            @can('users-admin') <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th> @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lends as $lend)
                            <tr>
                                <td>{{ $lend->book->name }}</td>
                                <td>{{ $lend->book->author }}</td>
                                <td>{{ $lend->user->fullName }}</td>
                                <td><span class="label label-success">@jalali($lend->created_at)</span></td>
                                @can('users-admin')
                                <td class="text-center">
                                    <a href="{{ route('users.activeLends', ['user' => $lend->user_id]) }}" data-toggle="tooltip" data-placement="top" title="امانت های جاری" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-eye"></i></a>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END Row Styles Content -->
            </div>
            <!-- END Row Styles Block -->
        </div>
        <!-- END Tables Row -->
    @else
        <div class="block full">
            <!-- Get Started Content -->
            لیست امانت های جاری خالی می باشد.
            <!-- END Get Started Content -->
        </div>
    @endif
@endsection