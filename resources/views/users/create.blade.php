@extends('app')

@section('content')


<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row bg-title">
      <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Users</h4>
      </div>
      <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
          <li><a href="#">Dashboard</a></li>
          <li class="active">Users</li>
        </ol>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
      <div class="col-sm-12">
        <div class="white-box">
          <h3 class="box-title">Add User</h3>
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
            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Name:</strong>
                  {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Email:</strong>
                  {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Password:</strong>
                  {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Confirm Password:</strong>
                  {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Role:</strong>
                  {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple','id' => 'roles')) !!}
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
            {!! Form::close() !!}

          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>

@stop
@section('footer_scripts')
<!-- <script src="{{ URL::asset('assets/js/service.js') }}" type="text/javascript"></script> -->

<script>
  $(document).ready(function() {
    $('#roles').select2();
    $('#btn_login_details').click(function() {


      $('#list_login_details').removeClass('active active_tab1');
      $('#list_login_details').removeAttr('href data-toggle');
      $('#login_details').removeClass('active');
      $('#list_login_details').addClass('inactive_tab1');
      $('#list_personal_details').removeClass('inactive_tab1');
      $('#list_personal_details').addClass('active_tab1 active');
      $('#list_personal_details').attr('href', '#personal_details');
      $('#list_personal_details').attr('data-toggle', 'tab');
      $('#personal_details').addClass('active in');

    });

    $('#previous_btn_personal_details').click(function() {
      $('#list_personal_details').removeClass('active active_tab1');
      $('#list_personal_details').removeAttr('href data-toggle');
      $('#personal_details').removeClass('active in');
      $('#list_personal_details').addClass('inactive_tab1');
      $('#list_login_details').removeClass('inactive_tab1');
      $('#list_login_details').addClass('active_tab1 active');
      $('#list_login_details').attr('href', '#login_details');
      $('#list_login_details').attr('data-toggle', 'tab');
      $('#login_details').addClass('active in');
    });

    $('#btn_personal_details').click(function() {

      $('#list_personal_details').removeClass('active active_tab1');
      $('#list_personal_details').removeAttr('href data-toggle');
      $('#personal_details').removeClass('active');
      $('#list_personal_details').addClass('inactive_tab1');
      $('#list_contact_details').removeClass('inactive_tab1');
      $('#list_contact_details').addClass('active_tab1 active');
      $('#list_contact_details').attr('href', '#contact_details');
      $('#list_contact_details').attr('data-toggle', 'tab');
      $('#contact_details').addClass('active in');

    });

    $('#btn_contact_details').click(function() {

      $('#list_contact_details').removeClass('active active_tab1');
      $('#list_contact_details').removeAttr('href data-toggle');
      $('#contact_details').removeClass('active');
      $('#list_contact_details').addClass('inactive_tab1');
      $('#list_sumbmit_details').removeClass('inactive_tab1');
      $('#list_sumbmit_details').addClass('active_tab1 active');
      $('#list_sumbmit_details').attr('href', '#contact_submit_details');
      $('#list_sumbmit_details').attr('data-toggle', 'tab');
      $('#contact_submit_details').addClass('active in');

    });

    $('#previous_btn_contact_details').click(function() {
      $('#list_contact_details').removeClass('active active_tab1');
      $('#list_contact_details').removeAttr('href data-toggle');
      $('#contact_details').removeClass('active in');
      $('#list_contact_details').addClass('inactive_tab1');
      $('#list_personal_details').removeClass('inactive_tab1');
      $('#list_personal_details').addClass('active_tab1 active');
      $('#list_personal_details').attr('href', '#personal_details');
      $('#list_personal_details').attr('data-toggle', 'tab');
      $('#personal_details').addClass('active in');
    });



    $('#previous_btn_contact_sumbmit_details').click(function() {
      $('#list_sumbmit_details').removeClass('active active_tab1');
      $('#list_sumbmit_details').removeAttr('href data-toggle');
      $('#contact_submit_details').removeClass('active in');
      $('#list_sumbmit_details').addClass('inactive_tab1');
      $('#list_contact_details').removeClass('inactive_tab1');
      $('#list_contact_details').addClass('active_tab1 active');
      $('#list_contact_details').attr('href', '#personal_details');
      $('#list_contact_details').attr('data-toggle', 'tab');
      $('#contact_details').addClass('active in');
    });



  });
</script>

@stop