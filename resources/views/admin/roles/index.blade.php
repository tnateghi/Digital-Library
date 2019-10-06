@extends('admin.layouts.master', ['title' => 'لیست مقام ها'])

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
                        <li>لیست مقام ها</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Blank Header -->

    @if($roles->isEmpty())
        <div class="block full">
            <!-- Get Started Content -->
            لیست مقام ها خالی است.
            <!-- END Get Started Content -->
        </div>
    @else

        <div class="col-lg-12">
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
            </div>			
            <!-- END Row Styles Block -->

            @include('admin.layouts.messages')
        </div>
        
    @endif
@endsection