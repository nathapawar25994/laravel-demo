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
          <h3 class="box-title">Edit User</h3>
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
            <form method="put" action="{{ action('UserController@update',$user->id) }}" id="register_form">
              <ul class="nav nav-tabs">
                <li class="nav-item ">
                  <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Business Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">License Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Notes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link inactive_tab1" id="list_sumbmit_details" style="border:1px solid #ccc">Contact Details</a>
                </li>
              </ul>
              <div class="tab-content" style="margin-top:16px;">
                <div class="tab-pane active" id="login_details">
                  <div class="panel panel-default">
                    <div class="panel-heading">Business Details</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" required autocomplete="email" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <strong>Role:</strong>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple','id' => 'roles')) !!}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Password confirmation</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required autocomplete="new-password" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_number" id="mobile_number" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Office Number</label>
                            <input type="text" name="last_name" id="office_number" class="form-control" />

                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" name="address_line_1" id="address_line_1" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" name="address_line_2" id="address_line_2" class="form-control" />

                          </div>
                        </div>
                        <br />
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" id="city" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" id="state" class="form-control" />

                          </div>
                        </div>
                        <br />
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" id="country" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Zip Code</label>
                            <input type="text" name="zip_code" id="zip_code" class="form-control" />

                          </div>
                        </div>
                        <br />
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>User Type</label>
                            <input type="text" name="user_type" id="user_type" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control" />

                          </div>
                        </div>
                        <br />
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" id="status" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div align="center">
                        <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
                      </div>
                      <br />
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="personal_details">
                  <div class="panel panel-default">
                    <div class="panel-heading">License Details</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>License Type</label>
                            <input type="text" name="license_type" id="license_type" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" name="start_date" id="start_date" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>End Date</label>
                            <input type="text" name="end_date" id="end_date" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <?php
                            if (isset($users->auto_renew) && !empty($users->auto_renew)) {
                              $title_flag2 = "checked";
                            } else {
                              $title_flag2 = "";
                            }
                            ?>
                            {!! Form::checkbox('auto_renew',1,$title_flag2, ['id'=>'auto_renew']) !!}
                            {!! Form::label('auto_renew','Auto Renew') !!}

                          </div>
                        </div>
                      </div>
                      <div align="center">
                        <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
                        <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
                      </div>
                      <br />
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="contact_details">
                  <div class="panel panel-default">
                    <div class="panel-heading">Notes</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label>Note</label>
                            <input type="textarea" name="note" id="note" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div align="center">
                        <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
                        <button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-info btn-lg">Next</button>

                      </div>
                      <br />
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="contact_submit_details">
                  <div class="panel panel-default">
                    <div class="panel-heading">Contact Details</div>
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Contact Person</label>
                            <input type="text" name="contact_person" id="note" class="form-control" />
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Extension</label>
                            <input type="text" name="extension" id="note" class="form-control" />
                          </div>
                        </div>
                      </div>
                      <div align="center">
                        <button type="button" name="previous_btn_contact_sumbmit_details" id="previous_btn_contact_sumbmit_details" class="btn btn-default btn-lg">Previous</button>
                        <button type="submit" name="previous_btn_contct_sumbmit_details" id="previous_btn_contact_sumbmit_details" class="btn btn-success btn-lg">Register</button>
                      </div>
                      <br />
                    </div>
                  </div>
                </div>

              </div>
            </form>

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

      $('#list_contact_detail').removeClass('active active_tab1');
      $('#list_contact_detail').removeAttr('href data-toggle');
      $('#contact_details').removeClass('active');
      $('#list_contact_detail').addClass('inactive_tab1');
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