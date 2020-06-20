@extends('app')

@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Job</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Job</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Edit Job</h3>
                    <div class="">
                        <!-- Error Log -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="">

                            {!! Form::model($job, ['method' => 'POST','action' => ['JobController@update',$job->id],'id'=>'jobeditform']) !!}

                            @include('job.form',['submitButtonText' => 'Update'])

                            {!! Form::Close() !!}


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@stop
@section('footer_script_init')
<script>
$(".datepicker-default").datepicker({
                dateFormat: "yy-mm-dd",
				autoclose: true,
				todayHighlight: true,
			});
</script>

<script src="{{ url('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
<script>
    CKEDITOR.replace( 'description' );
</script>

<script>
    $(document).ready(function() {
        // var country_id = $('#country_id').val();
        // if(country_id != null && country_id != undefined && country_id != "" ){
        //     appendStateOptions(country_id);
        // }
        // var state_id = $('#state_id').val();
        // if(state_id != null && state_id != undefined && state_id != "" ){
        //     appendCityOptions(state_id);
        // }
    });

    $(document).on('change', '#country_id', function(e) {
        e.preventDefault();
        var country_id = $(this).find(":selected").val();
        $("#city_id").val("");
        appendStateOptions(country_id);
    });

    function appendStateOptions(country_id) {
        $.ajax({
                url: '{{ url("state/get_state_list")}}',
                type: "POST",
                data: {
                    'country_id': country_id
                }
            })
            .done(function(response_data) {

                var response = response_data['data'];

                $('#state_id').find('option').remove().end();
                var option = $('<option></option>').text("Select State").val("");
                $('#state_id').append(option);
                for (var i = 0; i < response.length; i++) {
                    option = $('<option></option>').text(response[i].name).val(response[i].id);
                    $('#state_id').append(option);
                }
                $('#state_id').show().closest('div').find('.bootstrap-select').hide();

            })
    }

    $(document).on('change', '#state_id', function(e) {
        e.preventDefault();
        var state_id = $(this).find(":selected").val();
        appendCityOptions(state_id);
    });

    function appendCityOptions(state_id) {
        $.ajax({
                url: '{{ url("city/get_city_list")}}',
                type: "POST",
                data: {
                    'state_id': state_id
                }
            })
            .done(function(response_data) {

                var response = response_data['data'];

                $('#city_id').find('option').remove().end();

                var option = $('<option></option>').text("Select City").val("");
                $('#city_id').append(option);

                for (var i = 0; i < response.length; i++) {
                    var option = $('<option></option>').text(response[i].name).val(response[i].id);
                    $('#city_id').append(option);
                }
                $('#city_id').show().closest('div').find('.bootstrap-select').hide();

            })
    }
    </script>

@stop