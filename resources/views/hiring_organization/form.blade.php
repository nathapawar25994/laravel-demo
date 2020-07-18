<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('website','Website') !!}
            {!! Form::text('website',null,['class'=>'form-control', 'id' => 'website']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('logo','Logo') !!}
            {!! Form::file('logo',['class'=>'form-control', 'id' => 'logo']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="form-group ">
            <div class="fix-button">
                {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}
            </div>
        </div>
    </div>
</div>