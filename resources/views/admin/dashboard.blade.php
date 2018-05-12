@extends('admin.layouts.master')

@section('content')

<div class="row">

    <div class="col-sm-6 col-lg-3">
        <a class="widget" href="{{ route('users.index') }}">
            <div class="widget-content widget-content-mini text-right clearfix">
                <div class="widget-icon pull-left themed-background-info">
                    <i class="gi gi-user text-light-op"></i>
                </div>
                <h2 class="widget-heading h3 text-info">
                    <strong><span data-toggle="counter" data-to="{{ \App\User::where('level', '!=', 'new')->get()->count() }}"></span></strong>
                </h2>
                <span class="text-muted">کاربران</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a class="widget" href="{{ route('books.index') }}">
            <div class="widget-content widget-content-mini text-right clearfix">
                <div class="widget-icon pull-left themed-background-success">
                    <i class="gi gi-book text-light-op"></i>
                </div>
                <h2 class="widget-heading h3 text-success">
                    <strong><span data-toggle="counter" data-to="{{ \App\Book::all()->count() }}"></span></strong>
                </h2>
                <span class="text-muted">کتاب ها</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a class="widget" href="{{ route('lends.allActiveLends') }}">
            <div class="widget-content widget-content-mini text-right clearfix">
                <div class="widget-icon pull-left themed-background-warning">
                    <i class="hi hi-log_out text-light-op"></i>
                </div>
                <h2 class="widget-heading h3 text-warning">
                    <strong><span data-toggle="counter" data-to="{{ \App\Lend::where('state', 'lend')->get()->count() }}"></span></strong>
                </h2>
                <span class="text-muted">امانت های جاری</span>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a class="widget">
            <div class="widget-content widget-content-mini text-right clearfix">
                <div class="widget-icon pull-left themed-background-danger">
                    <i class="gi gi-conversation text-light-op"></i>
                </div>
                <h2 class="widget-heading h3 text-danger">
                    <strong><span data-toggle="counter" data-to="{{ \App\Comment::all()->count() }}"></span></strong>
                </h2>
                <span class="text-muted">مجموع نظرات ها</span>
            </div>
        </a>
    </div>

    @if(count($articles))
        <div class="col-sm-12 col-lg-6">
            <!-- Tickets Block -->
            <div class="block">
                <div class="block-title">
                    <h2>آخرین نوشته های وبلاگ</h2>
                </div>

                <div class="table-responsive">
                    <table class="table table-borderless table-vcenter table-hover">
                        <thead>
                        <tr>
                            <th>عنوان</th>
                            <th class="text-center">وضعیت</th>
                            <th class="text-center">تاریخ انتشار</th>
                            <th class="text-center"><i class="fa fa-comments"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td><a href="{{ route('article.show', ['article' => $article->slug]) }}" ><strong>{{ $article->title }}</strong></a></td>

                                @if($article->state == 'publish')
                                    <td class="text-center"><span class="label label-success">منتشر شده</span></td>
                                @else
                                    <td class="text-center"><span class="label label-danger">پیش نویس</span></td>
                                @endif

                                <td class="text-center">{{ $article->created_at }}</td>

                                <td class="text-center"><span class="badge">{{ $article->comments->count() }}</span></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Tickets List -->
        </div>
    @endif

    <div class="col-sm-12 col-lg-6">
        <script>
            var dataSales           = [ @foreach($lendCount as $key => $value)[{{ $key+1 }},"{{ $value }}"] @if(!$loop->last),@endif @endforeach];


            var dataMonths          = [ @foreach($lendDays as $key => $value)[{{ $key+1 }},"{{ $value }}"] @if(!$loop->last),@endif @endforeach];
        </script>
        <!-- Chart Widget -->
        <div class="widget">
            <div class="widget-content border-bottom">امانت های هفت روز گذشته</div>
            <div class="widget-content border-bottom themed-background-muted">
                <!-- Flot Charts (initialized in js/pages/readyDashboard.js), for more examples you can check out http://www.flotcharts.org/ -->
                <div id="chart-classic-dash" style="height: 290px; padding: 0; position: relative;"></div>
            </div>
        </div>
        <!-- END Chart Widget -->
    </div>


    <div class="col-sm-12 col-lg-6">


        <!-- Twitter Widget -->
        <div class="widget">
            <div class="widget-content widget-content-mini border-bottom">
                آخرین دیدگاه ها
            </div>
            <div class="widget-content">
                <ul class="media-list">
                    @foreach($comments as $comment)
                        <li class="media">
                            <a href="javascript:void(0)" class="pull-left">
                                <img style="width: 64px;height: 64px;" src="{{ asset('user-img/'.$comment->user->image) }}" alt="{{ $comment->user->fullName }}" class="img-circle">
                            </a>
                            <div class="media-body">
                                <span class="text-muted pull-right"><small><em>{{ jDate::forge($comment->created_at)->ago() }}</em></small></span>
                                <small><a target="_blank" @can('users-admin') href="{{ route('users.show', ['user' => $comment->user->id]) }}" @endcan>{{ $comment->user->fullname }}</a> در <a target="_blank" href="{{ route('article.show', ['article' => $comment->article->slug]) }}">{{ $comment->article->title }}</a></small>
                                <p>{{ $comment->body }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- END Twitter Widget -->

    </div>

</div>

@endsection

@section('scripts')

<script src="/js/pages/readyDashboard.js"></script>
<script>$(function(){ ReadyDashboard.init(); });</script>

@endsection