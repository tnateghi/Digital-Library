@extends('admin.layouts.master')

@section('content')

    <div class="block">
        <!-- Color Pickers Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default toggle-bordered enable-tooltip" data-toggle="button" title="" style="overflow: hidden; position: relative;" data-original-title="Toggles .form-bordered class">Borderless</a>
            </div>
            <h2>Color Pickers</h2>
        </div>
        <!-- END Color Pickers Title -->

        <!-- Color Pickers Content -->
        <form action="page_forms_components.html" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
            <!-- Bootstrap Colorpicker (classes are initialized in js/app.js -> uiInit()), for extra usage examples you can check out http://mjolnic.github.io/bootstrap-colorpicker/ -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="example-colorpicker">Select a Color (hex)</label>
                <div class="col-md-5">
                    <input type="text" id="example-colorpicker" name="example-colorpicker" class="form-control input-colorpicker colorpicker-element" value="#5ccdde">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="example-colorpicker2">As a component (hex)</label>
                <div class="col-md-5">
                    <div class="input-group input-colorpicker colorpicker-element">
                        <input type="text" id="example-colorpicker2" name="example-colorpicker2" class="form-control" value="#5ccdde">
                        <span class="input-group-addon"><i style="background-color: rgb(92, 205, 222);"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="example-colorpicker3">Select a Color (rgba)</label>
                <div class="col-md-5">
                    <input type="text" id="example-colorpicker3" name="example-colorpicker3" class="form-control input-colorpicker-rgba colorpicker-element" value="rgba(92, 205, 222, 1)">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label" for="example-colorpicker4">As a component (rgba)</label>
                <div class="col-md-5">
                    <div class="input-group input-colorpicker-rgba colorpicker-element">
                        <input type="text" id="example-colorpicker4" name="example-colorpicker4" class="form-control" value="rgba(92, 205, 222, 1)">
                        <span class="input-group-addon"><i style="background-color: rgb(92, 205, 222);"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Submit</button>
                    <button type="reset" class="btn btn-effect-ripple btn-danger" style="overflow: hidden; position: relative;">Reset</button>
                </div>
            </div>
        </form>
        <!-- END Color Pickers Content -->
    </div>

@endsection

@section('scripts')

@endsection