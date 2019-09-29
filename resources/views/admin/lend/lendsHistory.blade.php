@extends('admin.layouts.master')

@section('content')

    <div class="row">
    <!-- Tables Row -->

        <div class="col-lg-12">

            @if ($lends->isEmpty())

                <div class="block full">
                    <!-- Get Started Content -->
                    سابقه امانت های کاربر خالی می باشد.
                    <!-- END Get Started Content -->
                </div>

            @else
                <!-- Row Styles Block -->
                <div class="block">
                    <div class="block-title">
                        <h2>سابقه امانت های  {{ $user->fullname }}</h2>
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

            <a href="{{ route('users.activeLends', ['user' => $user->id]) }}"><button class="btn btn-primary">امانت های جاری کاربر</button></a>
            @can('users-admin') <a href="{{ route('users.show', ['user' => $user->id]) }}"><button class="btn btn-toolbar"><i class="gi gi-redo"></i> بازگشت به صفحه پروفایل </button></a> @endcan
        </div>
    <!-- END Tables Row -->
    </div>

@endsection