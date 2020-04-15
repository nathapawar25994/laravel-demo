@extends('app')
@section('footer_script_init')
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900" rel="stylesheet">


@stop
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div id="notfound">
                        <div class="notfound">
                            <div class="notfound-404 ">
                                <img src="{{ URL::asset('assets/img/oops.png') }}" class="hhhh" ></img>
                            </div>
                            <h2>403 - access forbidden!</h2>
                            <!-- <p>The page you are looking for might have been removed had its name changed or is temporarily unavailable.</p> -->
                            <a href="{{ route('dashboard') }}">Go To Homepage</a>
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
<script type="text/javascript">
    $(document).ready(function() {
        gymie.deleterecord();
        $('#delete').click(function() {
            console.log('Hello');
        });
    });
</script>
@stop