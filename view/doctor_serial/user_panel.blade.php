@extends('registration.layout')

@section('content')

    <div class="row">
        <div class="col-md-6">

            {!! Form::open(['url' => 'user-panel-talha/permission-update','id'=>'foo', 'role' => 'form', 'data-toggle' => 'form-aja', 'data-url' => 'Yes']) !!}

            {!!Form::label('permission','Select Permission') !!}
            <div class="form-group">
                <select class="form-control" name="permission[]" id="permission" multiple="multiple">
                    <?php $permission_block=''; ?>
                    @foreach($permission as $key=>$value)
                        <optgroup  label="{{$key}}">
                            @foreach($value as $val)

                            @if($val['status'])
                                <option value="{{$val['id']}}" selected>{{$val['total_url']['url_link_name']}}</option>
                            @else
                                <?php
                                $permission_block.=$val['total_url']['url_id_name'].',';
                                ?>
                                <option value="{{$val['id']}}">{{$val['total_url']['url_link_name']}}</option>
                            @endif
                            @endforeach
                        </optgroup>
                    @endforeach

                    <?php
                     if($permission_block){
                     $permission_block[strlen($permission_block)-1]='';
                     }
                    ?>
                </select>
                {!! Form::submit('Update',['class' => 'btn btn-info','id'=>'submit'])!!}
            </div>

            {!! Form::close() !!}

        </div>

        <!--Design End-->
    </div>
    <div class="user-permission">
            {{$permission_block}}
    </div>
    <div id="ajax_loader"></div>


@stop