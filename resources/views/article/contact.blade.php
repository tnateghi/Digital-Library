@extends('article.master', ['title' => 'تماس با ما'])

@section('content')

    <!-- Intro -->
    <section class="site-section site-section-top site-section-light themed-background-dark">
        <div class="container">
            <h1 class="text-center animation-fadeInQuickInv"><strong>با ما در تماس باشید.</strong></h1>
        </div>
    </section>
    <!-- END Intro -->

    <!-- Contact -->
    <section class="site-content site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 site-block">
                    <form method="post" id="form-contact" novalidate="novalidate">
                        <div class="form-group">
                            <label for="contact-name">نام</label>
                            <input type="text" id="contact-name" name="contact-name" class="form-control input-lg">
                        </div>
                        <div class="form-group">
                            <label for="contact-email">ایمیل</label>
                            <input type="text" id="contact-email" name="contact-email" class="form-control input-lg">
                        </div>
                        <div class="form-group">
                            <label for="contact-message">پیام</label>
                            <textarea id="contact-message" name="contact-message" rows="10" class="form-control input-lg"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">ارسال</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END Contact -->

@endsection