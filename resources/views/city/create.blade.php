
@extends('app')

@section('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">City</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">City</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Add City</h3>
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

                            {!! Form::Open(['url' => 'city','id'=>'cityform']) !!}

                            @include('city.form',['submitButtonText' => 'Add'])

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



// $('#level_id').on('change', function(e) {
//                 e.preventDefault();
//                 var level_id=$(this).find(":selected").val();
//                 appendOptions(level_id);
// 			});
//             function appendOptions(level_id){
//                 $.ajax({    
// 							url: '{{ url("members/get_trainer_by_level")}}',
//                             type: "POST",
//                             data: {'level_id':level_id}
// 						})
// 							.done(function (data) {
                                
//                                 var response=JSON.parse(data);
//                                 $('#trainer_id').find('option').remove().end();
//                                 for(var i=0;i<response.length;i++){
//                                     var option = $('<option></option>').text(response[i].name).val(response[i].id);
//                                     $('#trainer_id').append(option);
//                                 }
//                                 $('#trainer_id').show().closest('div').find('.bootstrap-select').hide();
							
//                             })
//             }

</script>

@stop


