@extends('article.master', ['title' => 'سوالات متداول'])

@section('content')

    <!-- Intro -->
    <section class="site-section site-section-top site-section-light themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-fadeInQuickInv"><strong>سوالات متداول کاربران.</strong></h1>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Intro Title -->
    <section class="site-content site-section-mini site-section-light themed-background-social">
        <div class="container">
            <h2 class="site-heading h3 site-block">
                <i class="fa fa-fw fa-chevron-left"></i> <strong>معرفی</strong>
            </h2>
        </div>
    </section>
    <!-- END Intro Title -->

    <!-- Intro FAQ -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row site-block">
                <div class="col-md-8 col-md-offset-2">
                    <div id="faq1" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1"><strong>به نرم افزار کتابخانه دیجیتال خوش آمدید</strong></a>
                                </div>
                            </div>
                            <div id="faq1_q1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>توضیحات نرم افزار</p>
                                    <p class="remove-margin">متن دوم از پاراگراف</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2"><strong>سازنده نرم افزار چه کسی هست؟</strong></a>
                                </div>
                            </div>
                            <div id="faq1_q2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>متن آزمایشی</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Intro FAQ -->

    <!-- Functionality Title -->
    <section class="site-content site-section-mini site-section-light themed-background-danger">
        <div class="container">
            <h2 class="site-heading h3 site-block">
                <i class="fa fa-fw fa-code"></i> <strong>عملکرد</strong>
            </h2>
        </div>
    </section>
    <!-- END Functionality Title -->

    <!-- Functionality FAQ -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row site-block">
                <div class="col-md-8 col-md-offset-2">
                    <div id="faq2" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q1"><strong>آیا نرم افزار شما واکنش گرا هست؟</strong></a>
                                </div>
                            </div>
                            <div id="faq2_q1" class="panel-collapse collapse in">
                                <div class="panel-body">متن آزمایشی</div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q2"><strong>آیا داده های من امن هستند؟</strong></a>
                                </div>
                            </div>
                            <div id="faq2_q2" class="panel-collapse collapse">
                                <div class="panel-body">متن آزمایش</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END Functionality FAQ -->

@endsection