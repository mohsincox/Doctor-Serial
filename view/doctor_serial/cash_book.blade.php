@extends('registration.layout')

@section('content')
    <h1>CashBook Report on All Doctors</h1>
    <hr>
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open([
                        'url'           => 'doctor-serial/cash-book_details',
                        'method'        => 'get',
                        'target'        => '_blank',
                        'class'         => 'form-horizontal'
                    ])
                !!}



                <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
                    {!! Form::label('from', 'Start Date', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('from', date('d/m/Y'), ['class' => 'form-control datetimepicker2', 'id' => 'from', 'data-mask' => '99/99/9999']) !!}
                        <span class="help-block text-danger">
                            {!! $errors->first('from') !!}
                        </span>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
                    {!! Form::label('to', 'End Date', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('to', date('d/m/Y'), ['class' => 'form-control datetimepicker2', 'id' => 'to', 'data-mast' => '99/99/9999']) !!}
                        <span class="help-block text-danger">
                            {!! $errors->first('to') !!}
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-6 text-center">
                        {!! Form::button('Cash Details', ['type' => 'submit', 'class' => 'btn btn-success']) !!}
                        
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
@endsection
