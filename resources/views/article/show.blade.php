@extends('article.master')

@section('content')

<!-- Intro -->
<div class="media-container">
    <section class="site-section site-section-top site-section-light">
        <div class="container">
            <h1><strong>{{ $article->title }}</strong></h1>
            <!--<h2 class="text-light-op hidden-xs"><strong></strong></h2>-->
        </div>
    </section>

    <!-- For best results use an image with a resolution of 1260x280 pixels -->
    <img src="/blog/img/placeholders/headers/blog_post.jpg" alt="" class="media-image">
</div>

<!-- END Intro -->

<section class="site-content site-section border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <article class="site-block">
                    {!! $article->body !!}
                </article>
            </div>
        </div>
    </div>
</section>

<!-- END Post -->
<!-- Author -->
<section class="site-content site-section border-bottom themed-background-muted">
    <div class="container">
        <div class="row row-items">
            <div class="col-md-2 col-md-offset-2 text-center">
                <img src="{{ $article->user->getImage }}" alt="{{ $article->user->fullname }}" class="img-circle img-thumbnail img-thumbnail-avatar-2x">
            </div>
            <div class="col-md-6">
                <h4>
                    <small class="pull-left"><strong>{{ $article->created_at }}</strong></small>
                    <strong>{{ $article->user->fullname }}</strong>
                </h4>
                <b><p>{{ $article->user->status }}</p></b>
            </div>
        </div>
    </div>
</section>
<!-- END Author -->

@include('article.layouts.comments')

@endsection