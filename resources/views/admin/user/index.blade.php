@extends('admin.layouts.master', ['title' => 'لیست کاربران'])

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
                        <li>لیست کاربران</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    @if(! $users->count())

        <div class="block full">
            <!-- Get Started Content -->
            لیست کاربران خالی است.
            <!-- END Get Started Content -->
        </div>

    @else

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
                    </div>
                    <!-- END Row Styles Content -->
                </div>
                <!-- END Row Styles Block -->
                @include('admin.layouts.messages')
            </div>
        </div>
    @endif

@endsection