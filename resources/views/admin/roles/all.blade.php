@extends('admin.layouts.master')

@section('content')
    <!-- Blank Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>لیست مقام ها</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>مدیریت مقام ها</li>
                        <li><a href="">لیست مقام ها</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->

    <div class="col-lg-12">

    @if(count($roles))

        <!-- Form Validation Content -->

        <!-- Row Styles Block -->
        <div class="block">


            <!-- Row Styles Content -->
            <div class="table-responsive">

                <table class="table table-borderless table-vcenter table-hover">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 50px;">ID</th>
                        <th>عنوان مقام</th>
                        <th>توضیحات</th>
                        <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td class="text-center">{{ $role->id }}</td>
                            <td><strong>{{ $role->name }}</strong></td>
                            <td>{{ $role->label }}</td>
                            <td class="text-center">
                                <a href="{{ route('roles.show', ['id' => $role->id]) }}" title="مشاهده و ویرایش" data-toggle="tooltip" class="btn btn-effect-ripple btn-xs btn-success" style="overflow: hidden; position: relative;"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
            <!-- END Row Styles Content -->
        </div>			<!-- END Row Styles Block -->

        <!-- END Form Validation Content -->
    @else

        <div class="block full">
            <!-- Get Started Content -->
            لیست مقام ها خالی می باشد!
            <!-- END Get Started Content -->
        </div>
    @endif

    @include('admin.layouts.messages')

    </div>
@endsection