@extends('admin.layouts.master', ['title' => 'اطلاعات کاربر'])

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="block">
                <!-- General Elements Title -->
                <div class="block-title">
                    <h2>پروفایل کاربری {{ $user->fullname }}</h2>
                </div>
                <!-- END General Elements Title -->

                <!-- General Elements Content -->
                <form method="post" class="form-horizontal form-bordered">
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">تصویر پروفایل : </label>
                        <div class="col-md-7">
                            <div class="widget">
                                <img src="{{ $user->getImage }}" style="border-radius: 10px;width:100px;height:100px;" alt="avatar" class="img-circle">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">نام : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->firstName }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">نام خانوادگی : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->lastName }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">کد ملی (نام کاربری) : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->username }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">شناسه : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->id }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">تاریخ عضویت : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$user->created_at}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">تلفن : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->tel }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">ایمیل : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">آدرس : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->address }}</p>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-12 col-md-offset-1">
                            @can('lends-admin')
                                <a href="{{ route('users.activeLends', ['user' => $user->id]) }}"><button type="button" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">امنت های جاری</button></a>
                                <a href="{{ route('users.lendsHistory', ['user' => $user->id]) }}"><button type="button" class="btn btn-effect-ripple btn-info" style="overflow: hidden; position: relative;">سابقه امانت</button></a>
                            @endcan

                            <a href="{{ route('users.edit', ['user' => $user->id]) }}"><button type="button" class="btn btn-effect-ripple btn-success" style="overflow: hidden; position: relative;">ویرایش</button></a>
                            <a href="{{ route('users.editImage', ['user' => $user->id]) }}"><button type="button" class="btn btn-effect-ripple btn-warning" style="overflow: hidden; position: relative;">ویرایش تصویر</button></a>

                            @if(can_delete_user($user->id))
                                    <a href="#modal-fade" data-toggle="modal" title="حذف"><button type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;"><i class="fa fa-trash-o"></i> حذف کاربر</button></a>
                            @endif
                        </div>
                    </div>

                </form>
                @if(can_delete_user($user->id))
                    <form id="delete-user-form" action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post">
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
                                    با حذف کاربر تمامی داده های مربوط به آن نیز پاک خواهد شد،
                                    آیا میخواهید کاربر را حذف کنید؟
                                </div>
                                <div class="modal-footer">
                                    <button onclick="document.getElementById('delete-user-form').submit();" type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">به هر حال حذف شود</button>
                                    <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">خیر</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- END General Elements Content -->
            </div>
        </div>
    </div>

@endsection
