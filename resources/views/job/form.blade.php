<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('job_code','Job Code') !!}
            {!! Form::text('job_code',null,['class'=>'form-control', 'id' => 'job_code','placeholder' => 'Enter Job Code']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('title','Title') !!}
            {!! Form::text('title',null,['class'=>'form-control', 'id' => 'title','placeholder' => 'Enter Title']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <?php $job_category = App\JobCategory::where('status', 1)->pluck('name', 'id'); ?>
            {!! Form::label('Job Category') !!}
            {!! Form::select('job_category_id',$job_category,null,['class'=>'form-control show-tick', 'id' => 'job_category_id']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <?php $job_type = App\JobType::where('status', 1)->pluck('name', 'id'); ?>
            {!! Form::label('Job Type') !!}
            {!! Form::select('job_type_id',$job_type,null,['class'=>'form-control show-tick', 'id' => 'job_type_id']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group datepicker">
            {!! Form::label('last_date_to_submit','Last Date To Submit') !!}
            {!! Form::text('last_date_to_submit',null,['class'=>'form-control datepicker-default', 'id' => 'last_date_to_submit']) !!}
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group datepicker">
            {!! Form::label('total_vacancy','Total Vacancy Available') !!}
            {!! Form::text('total_vacancy',null,['class'=>'form-control', 'id' => 'total_vacancy']) !!}
        </div>
    </div>

</div>

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

                $state = App\State::where('status', 1)->where('country_id', $country_id)->pluck('name', 'id');
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
        <?php 
            if(isset($state_id) && !empty($state_id)){

                $city = App\City::where('status', 1)->where('state_id', $state_id)->pluck('name', 'id');
            }else{
                $city = [];
            }
            ?>

            {!! Form::label('City') !!}
            {!! Form::select('city_id',$city,null,['class'=>'form-control show-tick', 'id' => 'city_id']) !!}
        </div>
    </div>

</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('sub_title','Sub Title') !!}
            {!! Form::textarea('sub_title',null,['class'=>'form-control', 'id' => 'sub_title']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('description','Job Description') !!}
            {!! Form::textarea('description',null,['class'=>'form-control ckeditor', 'id' => 'description']) !!}
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