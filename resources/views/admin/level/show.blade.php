@extends('admin.layouts.master')

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
                <form method="post" class="form-horizontal form-bordered ">
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
                        <label class="col-md-4 col-md-offset-1">تاریخ عضویت : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{$user->created_at}}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">ایمیل : </label>
                        <div class="col-md-7">
                            <p class="form-control-static">{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">مقام ها : </label>
                        <div class="col-md-6">
                            <div class="block-section">
                                @foreach($user->roles->all() as $role)
                                    <span class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="{{ $role->label }}">{{ $role->name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-12 col-md-offset-1">
                            <a href="{{ route('level.edit', ['user' => $user->id]) }}"><button type="button" class="btn btn-effect-ripple btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-edit"></i> ویرایش مقام ها</button></a>
                            <a href="#modal-fade" data-toggle="modal" title="حذف"><button type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;"><i class="fa fa-trash"></i> حذف از مدیریت</button></a>
                        </div>
                    </div>

                </form>
                <form id="delete-user-form" action="{{ route('level.destroy', ['book' => $user->id]) }}" method="post">
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
                                با حذف کاربر از مدیریت تمامی دسترسی های کابر قطع می شود،آیا مطمئن هستید؟
                            </div>
                            <div class="modal-footer">
                                <button onclick="document.getElementById('delete-user-form').submit();" type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">به هر حال حذف شود</button>
                                <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">خیر</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END General Elements Content -->
            </div>
        </div>
    </div>
@endsection