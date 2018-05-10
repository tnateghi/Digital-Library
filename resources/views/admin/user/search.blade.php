@extends('admin.layouts.master')

@section('content')

<!-- Search Results Header -->
<div class="content-header">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="header-section">
                <form action="{{ route('users.search') }}" id="form-validation">
                    <div class="form-group">
                        <input type="text"  name="search" class="form-control" placeholder="نام یا نام خانوادگی" value="{{{ request('search') }}}" >
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">جستجو کن</button>
                    </div>
                </form>
            </div>
            @include('admin.layouts.messages')
        </div>
    </div>
</div>
<!-- END Search Results Header -->

@if(count($users))

    <!-- Tables Row -->
    <div class="col-lg-12">
        <!-- Row Styles Block -->
        <div class="block">
            <!-- Row Styles Content -->
            <div class="table-responsive">
                <table class="table table-borderless table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">ID</th>
                        <th>نام</th>
                        <th>نام خانوادگی</th>
                        <th>کد ملی</th>
                        <th>ایمیل</th>
                        <th>تاریخ عضویت</th>
                        <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="text-center">{{ $user->id }}</td>
                            <td>{{ $user->firstName }}</td>
                            <td>{{ $user->lastName }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td><span class="label label-success">{{ $user->created_at }}</span></td>

                            <td class="text-center">
                                <a href="{{ route('users.show', ['user' => $user->id]) }}"  title="مشاهده پروفایل" data-toggle="tooltip" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-eye"></i></a>
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
@endif

@if(request('search') && !count($users))
<!-- END Tables Row -->
<div class="block full">
    <!-- Get Started Content -->
    نتیجه ای یافت نشد!
    <!-- END Get Started Content -->
</div>
@endif

@endsection