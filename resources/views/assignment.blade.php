@extends('layouts.app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Project list</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li class="active">
                    <strong>Assignment</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>All assignment assigned to this account</h5>
                            <!--<div class="ibox-tools">
                                <a href="" class="btn btn-primary btn-xs">Create new project</a>
                            </div>-->
                        </div>
                        <div class="ibox-content">
                            <div class="row m-b-sm m-t-sm">
                                <div class="col-md-1">
                                    <a href="/assignment" type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
                                </div>
                                <div class="col-md-11">
                                    <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                </div>
                            </div>

                            <div class="project-list">

                                <table class="table table-hover">
                                    <tbody>
                                        @foreach ($assign_data as $data)
                                            <tr>
                                                <td class="project-status">
                                                    <span class="label label-primary">Active</span>
                                                </td>
                                                <td class="project-title">
                                                    <a href="project_detail.html">{{ $data->name }}</a>
                                                    <br/>
                                                    <small>Created {{ date_format($data->created_at,"d/m/Y") }}</small>
                                                </td>
                                                <td class="project-completion">
                                                {{ $data->student_answer[0]->name.'' }}
                                                    <small>Completion with: 48%</small>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 48%;" class="progress-bar"></div>
                                                    </div>
                                                </td>
                                                <td class="project-people">
                                                    <a href=""><img alt="image" class="img-circle" src="img/a3.jpg"></a>
                                                    <a href=""><img alt="image" class="img-circle" src="img/a1.jpg"></a>
                                                    <a href=""><img alt="image" class="img-circle" src="img/a2.jpg"></a>
                                                    <a href=""><img alt="image" class="img-circle" src="img/a4.jpg"></a>
                                                    <a href=""><img alt="image" class="img-circle" src="img/a5.jpg"></a>
                                                </td>
                                                <td class="project-actions">
                                                    <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Dashboard</div>

                            <div class="panel-body">
                                @foreach ($assign_data as $data)

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    
@endsection
