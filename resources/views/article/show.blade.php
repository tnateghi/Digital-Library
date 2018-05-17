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


@include('article.layouts.comments')

@endsection