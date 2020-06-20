@extends('app')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Refered From</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ action('ReferedFromController@create') }}" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add new</a>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Refered From</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Refered From List</h3>
                    <div class="table">
                        <table id="services" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Refered From</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($refered_from_list as $refered_from)
                                <tr>
                                    <td class="text-center">{{ $refered_from->name}}</td>
                                    <td class="text-center">{{ $refered_from->description}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Actions</button>
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">

                                                <li>
                                                    <a href="{{ action('ReferedFromController@edit',['id' => $refered_from->id]) }}">
                                                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit details
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="#" class="delete-record" data-delete-url="{{ url('refered_from/'.$refered_from->id.'/delete') }}" data-record-id="{{$refered_from->id}}">
                                                        <i class="fa fa-trash-o fa-fw"></i> Delete Refered From
                                                    </a>
                                                </li>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

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