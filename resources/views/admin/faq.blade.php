@extends('admin.layouts.master')

@section('content')

    <!-- Intro Block -->
    <div class="block">
        <!-- Intro Title -->
        <div class="block-title">
            <h2>درباره نرم افزار</h2>
        </div>
        <!-- END Intro Title -->

        <!-- Intro Content -->
        <div id="faq1" class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1"><strong>به سیستم کتابخانه دیجیتال خوش آمدید</strong></a>
                    </div>
                </div>
                <div id="faq1_q1" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <p>در اینجا توضیحات مربوط به نرم افزار قرار میگیرد</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2"><strong>توسعه دهنده نرم افزار چه کسی است؟</strong></a>
                    </div>
                </div>
                <div id="faq1_q2" class="panel-collapse collapse">
                    <div class="panel-body">
                        <p>بلی بلی</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Intro Content -->
    </div>
    <!-- END Intro Block -->

    <!-- Functionality Block -->
    <div class="block">
        <!-- Functionality Title -->
        <div class="block-title">
            <h2>عملکرد</h2>
        </div>
        <!-- END Functionality Title -->

        <!-- Functionality Content -->
        <div id="faq2" class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q1"><strong>آیا نرم افزار شما واکنشگراست؟</strong></a>
                    </div>
                </div>
                <div id="faq2_q1" class="panel-collapse collapse">
                    <div class="panel-body">بدون شک نرم افزار ما در تمامی مرورگرها عملکرد خوبی خواهد داشت!!</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        <i class="fa fa-angle-left"></i> <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq2" href="#faq2_q2"><strong>آیا داده ها در این نرم افزار به صورت امن ارسال و دریافت می شوند؟</strong></a>
                    </div>
                </div>
                <div id="faq2_q2" class="panel-collapse collapse">
                    <div class="panel-body">تا دلت بخواد :)</div>
                </div>
            </div>
        </div>
        <!-- END Functionality Content -->
    </div>
    <!-- END Functionality Block -->

@endsection