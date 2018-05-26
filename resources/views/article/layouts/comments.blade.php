<!-- Comments -->
<section class="site-content site-section">
    <div class="container">
        <div class="row row-items">
            <div class="col-md-8 col-md-offset-2">
            @if($comments->count())
                <!-- All Comments -->
                    <h2 class="site-heading h3"><i class="fa fa-comments"></i> <strong>دیدگاه ها</strong> ({{ $article->comments->count() }})</h2>

                    @foreach($comments as $comment)
                        <ul class="media-list site-block">
                            <li class="media">
                                <a href="javascript:void(0)" class="pull-right">
                                    <img style="width: 64px;height: 64px;" src="{{ $comment->user->getImage }}" alt="{{ $comment->user->fullname }}" class="img-circle">
                                </a>
                                <div class="media-body">
                                    <strong>{{ $comment->user->fullname }}</strong>
                                    <span class="text-muted"><small><em>{{ jDate::forge($comment->created_at)->ago() }}</em></small></span>
                                    {{--<a href="#" class="pull-left btn btn-xs btn-primary">پاسخ به دیدگاه</a>--}}
                                    <p>{{ $comment->body }}</p>
                                </div>
                            </li>
                        </ul>
                @endforeach

                <!-- END All Comments -->
            @endif

                @if(auth()->check())
                <!-- Add Comment -->
                <h2 class="site-heading h3"><i class="fa fa-plus"></i>@if(! $comments->count())  <strong>اولین نفری باشید که دیدگاه ثبت می کنید</strong> @else <strong>دیدگاه خود را ثبت کنید</strong>@endif</h2>
                <form action="{{ route('comment.store', ['article' => $article->slug]) }}" method="post" class="form-horizontal">

                    {!! csrf_field() !!}
                    <div class="form-group">
                        <div class="col-xs-12">
                            <textarea id="blog-post-comment" name="body" class="form-control input-lg" rows="5" placeholder="دیدگاه.."></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">ثبت</button>
                        </div>
                    </div>
                </form>
                @include('article.layouts.messages')
                @include('article.layouts.errors')
                <!-- END Add Comment -->
                @else

                <div class="alert alert-warning site-block">
                    <p>برای ثبت دیدگاه ابتدا باید وارد شوید <a href="{{ route('login') }}" class="alert-link">ورود به سیستم </a></p>
                </div>

                @endif
            </div>
        </div>
    </div>
</section>
<!-- END Comments -->