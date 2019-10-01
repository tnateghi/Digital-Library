@extends('admin.layouts.master', ['title' => 'دیدگاه ها'])

@section('content')

    <!-- Page Header -->
    <div class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <div class="header-section">
                    <h1>دیدگاه ها</h1>
                </div>
            </div>
            <div class="col-sm-6 hidden-xs">
                <div class="header-section">
                    <ul class="breadcrumb breadcrumb-top">
                        <li>مدیریت نوشته ها</li>
                        <li>دیدگاه ها</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Header -->

        <div class="row">
        @if($comments->count())
        <div class="col-lg-12">

            <!-- Timeline Block -->
            <div class="block">
                <!-- Timeline Title -->
                <div class="block-title">
                    <h2>دیدگاه ها</h2>
                </div>
                <!-- END Timeline Title -->

                <!-- Timeline Content -->
                <div class="timeline block-content-full">
                    <ul class="timeline-list">
                        @foreach($comments as $comment)
                            <li>
                                <div class="timeline-time">{{ jDate::forge($comment->created_at)->ago() }}</div>
                                <img class="img-thumbnail-transparent timeline-icon" src="{{ $comment->user->getImage }}" />
                                <div class="timeline-content">
                                    <p class="push-bit small"><a target="_blank" @can('users-admin') href="{{ route('users.show', ['user' => $comment->user->id]) }}" @endcan>{{ $comment->user->fullname }}</a> در <a target="_blank" href="{{ route('article.show', ['article' => $comment->article->slug]) }}">{{ $comment->article->title }}</a></p>
                                    <p>{{ $comment->body }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- END Timeline Content -->
            </div>
            <!-- END Timeline Block -->
            @else

                <div class="block full">
                    <!-- Get Started Content -->
                    دیدگاهی وجود ندارد
                    <!-- END Get Started Content -->
                </div>

            @endif
            @include('admin.layouts.messages')
        </div>
    </div>

@endsection