@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/plugins/codemirror/codemirror.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/codemirror/ambiance.css') }}" rel="stylesheet">
@endsection

@section('content')
    
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-sm-4">
            <h2>Answer</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li >
                    <a href="{{ route('assignment') }}">Assignment</a>
                </li>
                <li >
                    <a href="{{ route('assignment-question',['id' => $data->question_id]) }}">Question</a>
                </li>
                <li class="active">
                    <strong>Answer</strong>
                </li>
            </ol>
        </div>
    </div>

        
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    
                    <div class="ibox-content left-side">
                        <textarea id="code1">
                        {{ $data->script }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox">
                    
                    <div class="ibox-content right-side">
                        <div class="code-result">
                        {{ $data->message }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('javascript')
    
    <script src="{{ asset('js/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('js/plugins/codemirror/mode/python/python.js') }}"></script>
    <script>
         $(document).ready(function(){
              var editor_one = CodeMirror.fromTextArea(document.getElementById("code1"), {
                  lineNumbers: true,
                  matchBrackets: true,
                  styleActiveLine: true,
                  readOnly: true,
                  theme:"ambiance"
              });
              $('.right-side').height($('.left-side').height());

              // var editor_one = CodeMirror.fromTextArea(document.getElementById("code2"), {
              //     readOnly: true,
              //     theme:"ambiance"
              // });
        });
    </script>
@endsection
