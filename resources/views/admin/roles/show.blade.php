@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <!-- Form Validation Block -->
            <div class="block">
                <!-- Form Validation Title -->
                <div class="block-title">
                    <h2>اطلاعات مقام {{ $role->name}}</h2>
                </div>
                <!-- END Form Validation Title -->

                <!-- Form Validation Form -->
                <form id="form-validation" class="form-horizontal form-bordered">

                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">عنوان مقام : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $role->name }}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">دسترسی ها : </label>
                        <div class="col-md-6">
                            <div class="block-section">
                                @foreach($role->permissions->all() as $permission)
                                    <span class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="" style="overflow: hidden; position: relative;" data-original-title="{{ $permission->name }}">{{ $permission->label }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 col-md-offset-1">توضیحات : </label>
                        <div class="col-md-6">
                            <p class="form-control-static">{{ $role->label }}</p>
                        </div>
                    </div>


                    <div class="form-group form-actions">
                        <div class="col-md-12 col-md-offset-1">
                            <a href="{{ route('roles.edit', ['roles' => $role->id]) }}"><button type="button" class="btn btn-effect-ripple btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-edit"></i> ویرایش</button></a>
                            <a href="#modal-fade" data-toggle="modal" title="حذف"><button type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;"><i class="fa fa-trash"></i> حذف مقام</button></a>
                        </div>
                    </div>
                </form>

                <!-- END Form Validation Form -->

                <form id="delete-roles-form" action="{{ route('roles.destroy', ['roles' => $role->id]) }}" method="post">
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
                                با حذف مقام تمامی داده های مربوط به آن نیز پاک خواهد شد،آیا میخواهید مقام را حذف کنید؟
                            </div>
                            <div class="modal-footer">
                                <button onclick="document.getElementById('delete-roles-form').submit();" type="button" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">به هر حال حذف شود</button></a>
                                <button type="button" class="btn btn-effect-ripple btn-success" data-dismiss="modal" style="overflow: hidden; position: relative;">خیر</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- END Form Validation Block -->
        </div>
    </div>

@endsection