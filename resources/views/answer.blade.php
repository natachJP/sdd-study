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
                            

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
