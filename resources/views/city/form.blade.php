<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <?php $country = App\Country::where('status', 1)->pluck('name', 'id'); ?>
            {!! Form::label('Country') !!}
            {!! Form::select('country_id',$country,null,['class'=>'form-control show-tick', 'id' => 'country_id']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <?php 
            if(isset($country_id) && !empty($country_id)){

                $state = App\State::where('country_id', $country_id)->pluck('name', 'id');
            }else{
                $state = [];
            }
            ?>

            {!! Form::label('State') !!}
            {!! Form::select('state_id',$state,null,['class'=>'form-control show-tick', 'id' => 'state_id']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class'=>'form-control', 'id' => 'name','placeholder' => 'Enter Name']) !!}
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