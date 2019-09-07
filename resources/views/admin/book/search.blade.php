@extends('admin.layouts.master')

@section('content')

    <!-- Search Results Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="header-section">
                    <form id="form-validation">
                        <div class="form-group">
                            <input id="search" type="text"  name="search" class="form-control" placeholder="عبارت جستجو" value="{{{ request('search') }}}" >
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-effect-ripple btn-effect-ripple btn-primary">جستجو کن</button> <i id="wait" class="fa fa-spinner fa-1x fa-spin text-primary hidden"></i>
                        </div>
                    </form>

                </div>
                @include('admin.layouts.messages')
            </div>
        </div>
    </div>
    <!-- END Search Results Header -->

        <!-- Tables Row -->
        <div id="results" class="col-lg-12 hidden">
            <!-- Row Styles Block -->
            <div class="block">
                <!-- Row Styles Content -->
                <div class="table-responsive">
                    <table id="results_table" class="table table-borderless table-vcenter table-hover">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">ID</th>
                            <th>نام کتاب</th>
                            <th>نویسنده</th>
                            <th>دسته بندی</th>
                            <th>ناشر</th>
                            <th>سال چاپ</th>
                            <th class="text-center">وضعیت</th>

                            @can('books-admin') <script>var admin = 1;</script> <th style="width: 80px;" class="text-center"><i class="fa fa-flash"></i></th> @endcan
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- END Row Styles Content -->
            </div>
            <!-- END Row Styles Block -->
        </div>
    <!-- END Tables Row -->

    <div id="noResult" class="block full hidden">
        <!-- Get Started Content -->
        نتیجه ای یافت نشد!
        <!-- END Get Started Content -->
    </div>

@endsection

@section('scripts')
    <script src="/js/pages/book-search.js"></script>
@endsection