<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control', 'id' => 'name','placeholder' => 'Enter Name']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('description','Referral Description') !!}
            {!! Form::textarea('description',null,['class'=>'form-control', 'id' => 'description']) !!}
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