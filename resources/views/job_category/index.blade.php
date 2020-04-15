@extends('app')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Job Category</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <a href="{{ action('JobCategoryController@create') }}" class="btn btn-success pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Add new</a>
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Job Category</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title">Job Category List</h3>
                    <div class="table">
                        <table id="services" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Job Category</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($job_category_list as $job_category)
                                <tr>
                                    <td class="text-center">{{ $job_category->name}}</td>
                                    <td class="text-center">{{ $job_category->description}}</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info">Actions</button>
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">

                                                <li>
                                                    <a href="{{ action('JobCategoryController@edit',['id' => $job_category->id]) }}">
                                                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>Edit details
                                                    </a>
                                                </li>


                                                <li>
                                                    <a href="#" class="delete-record" data-delete-url="{{ url('job_category/'.$job_category->id.'/delete') }}" data-record-id="{{$job_category->id}}">
                                                        <i class="fa fa-trash-o fa-fw"></i> Delete Job Category
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