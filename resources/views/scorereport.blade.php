@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Score Report</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="active">
                    <strong>score report</strong>
                </li>
            </ol>
        </div>
    </div>

        
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Score Report</h5>
                        <!--<div class="ibox-tools">
                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                        </div>-->
                    </div>
                    <div class="ibox-content ">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr class="gradeX">
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->firstname }}
                                            </td>
                                            <td>{{ $item->lastname }}
                                            </td>
                                            <td>{{ $item->score }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Score</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')
    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                "searching": false,
                "bInfo" : false,
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        });
    </script>
@endsection