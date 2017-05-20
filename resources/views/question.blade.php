@extends('layouts.app')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Question</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li >
                    <a href="{{ route('assignment') }}">Assignment</a>
                </li>
                <li class="active">
                    <strong>Question</strong>
                </li>
            </ol>
        </div>
    </div>
    
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="ibox-content m-b-sm border-bottom">
            <div class="text-center p-lg">
                <h2>instruction</h2>
                <span>{!! nl2br($instruction) !!}</span>
                
            </div>
        </div>
         @foreach($question_data as $data)
        <div class="faq-item">
            <div class="row">
                <div class="col-md-7">
                    <a data-toggle="collapse" href="#{{$data->id}}" class="faq-question">{{$data->name}}</a>
                    <small>The last person is <strong>{{ $data->lastperson }}</strong> <i class="fa fa-clock-o"></i> {{ $data->lasttime }}</small>
                </div>
                <div class="col-md-3">
                    <span class="h3">{{ $data->score }} <span class="small font-bold">Score</span></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div id="{{$data->id}}" class="panel-collapse collapse ">
                        <div class="faq-answer">
                            <div class="project-list">
                                <table class="table table-hover">
                                    <tbody>
                                    
                                       @foreach($data->student_answer->sortByDesc('updated_at') as $subdata)
                                            <tr>
                                                <td class="project-title">
                                                    <a>{{$subdata->user->firstname.' '.$subdata->user->lastname}}</a>
                                                    <br/>
                                                </td>
                                                <td class="project-completion">
                                                    <small class="score">Score : {{$subdata->score}}</small>
                                                    <div class="progress progress-mini">
                                                        <div style="width: {{ ($subdata->score/$data->score)*100}}%;" class="progress-bar"></div>
                                                    </div>
                                                </td>
                                                <td class="project-title duedate">
                                                    <small><i class="fa fa-clock-o"></i>  {{ date_format($subdata->updated_at,'g:i a - d.m.Y') }} </small>
                                                </td>
                                                <td class="project-actions">
                                                    <a href="{{ route('assignment-question-answer', ['id' => $subdata->id]) }}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
                
    
@endsection
