@extends('admin.layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>لیست کاربران مدیر</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>مدیریت مقام ها</li>
                        <li>مدیریت کاربران مدیر</li>
                        <li><a href="">لیست کاربران مدیر</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->


    <div class="row">
        <div class="col-lg-12">
            @if($users->isEmpty())

                <div class="block full">
                    <!-- Get Started Content -->
                    لیست  کاربران مدیر خالی می باشد!
                    <!-- END Get Started Content -->
                </div>

            @else

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
                                    <th>مقام ها</th>
                                    <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td class="text-center"><strong>{{ $user->id }}</strong></td>
                                        <td>{{ $user->firstName }}</td>
                                        <td>{{ $user->lastName }}</td>
                                        <td>
                                            @if($user->roles->isEmpty())
                                                <span class="label label-danger">بدون مقام</span>
                                            @else
                                                @foreach($user->roles as $role)
                                                    <span class="label label-success" data-toggle="tooltip" title="{{ $role->label }}">{{ $role->name }}</span>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('level.show' , ['id' => $user->id]) }}" data-toggle="tooltip" title="" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;" data-original-title="مشاهده و ویرایش"><i class="fa fa-eye"></i></a>
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
    </div>
@endsection