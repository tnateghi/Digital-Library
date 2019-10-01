@extends('admin.layouts.master', ['title' => 'داشبورد'])

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
            <a href="{{ route('articles.comments') }}" class="widget">
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
                        <div class="block-options pull-right">
                            <a href="{{ route('articles.index') }}" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="مشاهده همه"><i class="hi hi-circle-arrow-left"></i></a>
                        </div>
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
                                        <td><a href="{{ route('article.show', ['article' => $article->slug]) }}" target="_blank"><strong>{{ $article->title }}</strong></a></td>

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

        @if(count($comments))
            <div class="col-sm-12 col-lg-6">
                <!-- latest comments Block -->
                <div class="block">
                    <div class="block-title">
                        <h2>آخرین دیدگاه ها</h2>
                        <div class="block-options pull-right">
                            <a href="{{ route('articles.comments') }}" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="مشاهده همه"><i class="hi hi-circle-arrow-left"></i></a>
                        </div>
                    </div>
                    <div class="widget-content">
                        <ul class="media-list">
                            @foreach($comments as $comment)
                                <li class="media">
                                    <a target="_blank" @can('users-admin') href="{{ route('users.show', ['user' => $comment->user->id]) }}" @endcan class="pull-left">
                                        <img style="width: 40px;height: 40px;" src="{{ asset('user-img/'.$comment->user->image) }}" alt="{{ $comment->user->fullName }}" class="img-circle">
                                    </a>
                                    <div class="media-body">
                                        <span class="text-muted pull-right"><small><em>{{ jDate::forge($comment->created_at)->ago() }}</em></small></span>
                                        <small><a target="_blank" @can('users-admin') href="{{ route('users.show', ['user' => $comment->user->id]) }}" @endcan>{{ $comment->user->fullname }}</a> در <a target="_blank" href="{{ route('article.show', ['article' => $comment->article->slug]) }}">{{ $comment->article->title }}</a></small>

                                        @php

                                            $string = $comment->body;
                                            $string = strip_tags($string);
                                            if (strlen($string) > 300) {
                                                // truncate string
                                                $stringCut = substr($string, 0, 250);
                                                $endPoint = strrpos($stringCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                                $string .= '...';
                                            }

                                        @endphp

                                        <p>{{ $string }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END latest comments block -->
            </div>
        @endif

    </div>

@endsection

@section('scripts')
    <script src="/js/pages/readyDashboard.js"></script>
    <script>$(function(){ ReadyDashboard.init(); });</script>
@endsection