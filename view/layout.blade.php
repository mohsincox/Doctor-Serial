@extends('layout.master', ['module'=>'registration'])

@section('style')
{{--    {!! Html::style('plugin/jquery_datepicker/jquery.datetimepicker.css') !!}--}}
{{--    {!! Html::style('plugin/jquery_ui/jquery-ui-1.10.2.custom.css') !!}--}}
    {!! Html::style('plugin/pnotify-1.2.0/oxygen/icons.css') !!}
    {!! Html::style('plugin/pnotify-1.2.0/jquery.pnotify.default.css') !!}
    {!! Html::style('plugin/pnotify-1.2.0/jquery.pnotify.default.icons.css') !!}
    {!! Html::style('plugin/colorbox/colorbox.css') !!}
    {!! Html::style('css/jquery.dataTables.min.css') !!}
    {!! Html::style('css/bootstrap-datetimepicker.min.css') !!}
    {!! Html::style('css/jasny-bootstrap.css') !!}

    {!! Html::style('css/hospital.css') !!}
@endsection

@section('script')
    {!! Html::script('js/inventory/jquery.form-validator.min.js') !!}
    {!! Html::script('plugin/pnotify-1.2.0/jquery.pnotify.js') !!}
    {!! Html::script('plugin/colorbox/jquery.colorbox.js') !!}
    {!! Html::script('plugin/ckeditor/ckeditor.js') !!}
    {!! Html::script('js/moment.min.js') !!}
    {!! Html::script('js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('js/jasny-bootstrap.js') !!}
    {!! Html::script('js/sadik.js') !!}
    {!! Html::script('js/mohsin.js') !!}
    {!! Html::script('js/script.js') !!}
@endsection
