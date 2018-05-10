@if(count($errors))

    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <p><b>خطاهای زیر را رفع کنید : </b></p>

        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    </div>
@endif
