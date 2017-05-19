@extends('layouts.app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Assignment</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
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
                                    <a href="{{ route('assignment') }}" type="button" id="loading-example-btn" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Refresh</a>
                                </div>
                                <div class="col-md-11">
                                    <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                                </div>
                            </div>

                            <div class="project-list">

                                <table class="table table-hover">
                                    <tbody>
                                    
                                        @foreach($assign_data as $data)
                                            <tr>
                                                <td class="project-status">
                                                    @if($data->remainingDay < 0)
                                                    <span class="label label-default">Done</span>
                                                    @else
                                                    <span class="label label-primary">Pending</span>
                                                    @endif
                                                </td>
                                                <td class="project-title">
                                                    <a>{{ $data->name }}</a>
                                                    <br/>
                                                    <small>Created {{ date_format($data->created_at,"d-m-Y") }}</small>
                                                </td>
                                                <td class="project-completion">
                                                    <small>Completion with: {{$data->receivePercentage}}%</small>
                                                    <div class="progress progress-mini">
                                                        <div style="width: {{$data->receivePercentage}}%;" class="progress-bar"></div>
                                                    </div>
                                                </td>
                                                <td class="project-title duedate {{ $data->remainingDay < 3 ? "hurry" : ""}}">
                                                
                                                    <a> {{ $data->remainingText }} </a>
                                                    <br/>
                                                    <small><i class="fa fa-clock-o"></i> Due Date {{ $data->duedate }} </small>
                                                    
                                                </td>
                                                <td class="project-actions">
                                                    <a href="{{ route('assignment-question', ['id' => $data->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
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
