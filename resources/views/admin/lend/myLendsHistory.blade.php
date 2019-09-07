@extends('admin.layouts.master')

@section('content')
    <!-- Page Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>سابقه امانت</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>امانت های من</li>
                        <li><a href="">سابقه امانت</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

    <div class="row">

        <!-- Tables Row -->
        <div class="col-lg-12">
            @if ($lends->isEmpty())

                <div class="block full">
                    <!-- Get Started Content -->
                    سابقه امانت های شما خالی می باشد.
                    <!-- END Get Started Content -->
                </div>

             @else
            <!-- Row Styles Block -->
            <div class="block">
                <div class="block-title">
                    <h2>سابقه امانت های  {{ auth()->user()->fullname }}</h2>
                </div>

                <!-- Row Styles Content -->
                <div class="table-responsive">
                    <table class="table table-borderless table-vcenter table-hover">
                        <thead>
                        <tr>
                            <th>نام کتاب</th>
                            <th>نویسنده</th>
                            <th class="text-center">تاریخ امانت</th>
                            <th class="text-center">تاریخ بازگشت</th>
                            <th class="text-center">روزهای تاخیر</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($lends as $lend)
                            <tr>
                                <td>{{ $lend->book->name }}</td>
                                <td>{{ $lend->book->author }}</td>
                                <td class="text-center">@jalali($lend->created_at)</td>
                                <td class="text-center">@jalali($lend->updated_at)</td>
                                <td class="text-center">{{ $lend->delay }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- END Row Styles Content -->
            </div>
            <!-- END Row Styles Block -->
            @endif
        </div>

    </div>

    <!-- END Tables Row -->
@endsection