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
        <div class="ibox-content m-b-sm border-bottom">
            <div class="p-lg code-question">
                <h2 class="code-question-name">{{ $data->question->name }}</h2>
                <h3>Description</h3>
                <span>{!! nl2br($data->question->description) !!}</span>
                <h3>Guideline</h3>
                <span>{!! nl2br($data->question->guideline) !!}</span>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Code</h5>
                    </div>
                    <div class="ibox-content left-side">
                        <textarea id="code1">
                        {{ $data->script }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Result</h5>
                    </div>
                    <div class="ibox-content right-side">
                        <!--<textarea id="code1">{{ $data->message }}</textarea>-->
                        <div class="code-result">
                        {!! nl2br($data->message) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="social-feed-box">
                    <div class="border-bottom">
                    @foreach($data->comments as $comment)
                        <div class="comment-body">
                            <div class="social-avatar">
                                <div class="media-body">
                                    <a>
                                        {{$comment->user->firstname.' '.$comment->user->lastname}}
                                    </a>
                                    <small class="text-muted">{{ date_format($comment->updated_at,'g:i a - d.m.Y') }}</small>
                                </div>
                            </div>
                            <div class="social-body">
                                <p>{!! nl2br($comment->comment) !!}</p>
                                <div class="btn-group" data-id="{{$comment->id}}">
                                    <button class="btn btn-white btn-xs subCommentButton"><i class="fa fa-comments"></i> Comment</button>
                                    @if($currentUserId == $comment->user->id)
                                    <button class="btn btn-white btn-xs edit-comment"><i class="fa fa-pencil"></i> Edit</button>
                                    <a class="btn btn-white btn-xs remove-comment"><i class="fa fa-times"></i> Remove</a>
                                    @endif
                                </div>
                                <div class="social-comment edit-comment-form" data-id="{{$comment->id}}">
                                    <div class="media-body">
                                        <textarea class="form-control" placeholder="Write comment..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="social-footer">
                                @foreach($comment->subcomments as $subcomment)
                                <div class="social-comment social-subcomment">
                                    <div class="media-body" data-id="{{$subcomment->id}}">
                                        <a>
                                            {{$subcomment->user->firstname.' '.$subcomment->user->lastname}}
                                        </a>
                                        <span>{!! nl2br($subcomment->comment) !!}</span>
                                        <br/>
                                        @if($currentUserId == $subcomment->user->id)
                                        <a class="small edit-subcomment"><i class="fa fa-pencil"></i> Edit</a> - <a class="small remove-subcomment"><i class="fa fa-times"></i> Remove</a> -
                                        @endif
                                        <small class="text-muted">{{ date_format($subcomment->updated_at,'g:i a - d.m.Y') }}</small>
                                    </div>
                                </div>
                                <div class="social-comment edit-subcomment-form" data-id="{{$subcomment->id}}">
                                    <div class="media-body">
                                        <textarea class="form-control" placeholder="Write comment..."></textarea>
                                    </div>
                                </div>
                                @endforeach
                                <div class="social-comment sub-comment" data-commentid="{{$comment->id}}" data-id="{{$data->id}}">
                                    <div class="media-body">
                                        <textarea class="form-control" placeholder="Write comment..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="social-body">
                        <div class="social-comment comment" >
                            <div class="media-body">
                                {{ Form::open(array('url' => route('comment', ['id'=>$data->id]) , 'class' => 'm-t' , 'role' => 'form', 'id'=>'comment-form')) }}
                                    {{ Form::textarea('comment', null, array('id'=>'comment', 'rows'=>'2','placeholder' => 'Write comment...' , 'required' => '' , 'class' => 'form-control')) }}
                                {{ Form::close() }}
                            </div>
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

              function checksubcomment(){
                $('.social-footer').each(function(){
                    if($(this).find('.social-subcomment').length == 0){
                        $(this).css('padding','0');
                    }else{
                        $(this).css('padding','10px 15px');
                    }
                });
              }
              
              checksubcomment();
              

              $('#comment').on('keydown', function(e) {
                
                if (e.which == 13 && !event.shiftKey) {
                    if($(this).val() == ""){
                        e.preventDefault();
                        return false;
                    }
                    
                    $('#comment-form').submit();
                    e.preventDefault();
                }
              });


              $('.edit-subcomment').on('click',function(e){
                $('.edit-subcomment-form').css('display','');
                $('.edit-comment-form').css('display','');
                $('.sub-comment').css("display","");
                $(this).parents('.social-comment').next().css('display','block');
                $(this).parents('.social-comment').next().find('textarea').text($(this).prevAll().eq(1).text());
              });

              $('.edit-comment').on('click',function(e){
                $('.edit-subcomment-form').css('display','');
                $('.edit-comment-form').css('display','');
                $('.sub-comment').css("display","");
                $(this).parent().next().css('display','block');
                $(this).parent().next().find('textarea').text($(this).parent().prev().text());
              });

              $('.subCommentButton').on('click',function(e){
                $('.edit-subcomment-form').css('display','');
                $('.edit-comment-form').css('display','');
                $('.sub-comment').css("display","");
                $(this).parents('.comment-body').find('.social-footer').css('padding','10px 15px');
                $(this).parents('.comment-body').find('.sub-comment').css("display","block");
              });

              
              
              $('.sub-comment').on('keydown',function(e){
                  
                  if (e.which == 13 && !event.shiftKey) {
                    if($(this).find('textarea').val() == ""){
                        e.preventDefault();
                        return false;
                    }

                    $commentid = $(this).data('commentid');
                    $id = $(this).data('id');

                    $.ajax({
                        type: "POST",
                        url: '/comment/'+$id+'/'+$commentid,
                        data: {'comment':$(this).find('textarea').val()},
                        success: function() {
                            console.log("data sent");
                            location.reload();
                        },
                        error: function(e){
                            console.log(e);
                        }
                    });
                    e.preventDefault();
                  }
              });

              $('.edit-comment-form').on('keydown',function(e){
                  
                  if (e.which == 13 && !event.shiftKey) {
                    if($(this).find('textarea').val() == ""){
                        e.preventDefault();
                        return false;
                    }

                    
                    $id = $(this).data('id');

                    $.ajax({
                        type: "PUT",
                        url: '/update/comment/'+$id,
                        data: {'comment':$(this).find('textarea').val()},
                        success: function() {
                            console.log("data sent");
                            location.reload();
                        },
                        error: function(e){
                            console.log(e);
                        }
                    });
                    e.preventDefault();
                  }
              });

              $('.edit-subcomment-form').on('keydown',function(e){
                  
                  if (e.which == 13 && !event.shiftKey) {
                    if($(this).find('textarea').val() == ""){
                        e.preventDefault();
                        return false;
                    }

                    
                    $id = $(this).data('id');

                    $.ajax({
                        type: "PUT",
                        url: '/update/subcomment/'+$id,
                        data: {'comment':$(this).find('textarea').val()},
                        success: function() {
                            console.log("data sent");
                            location.reload();
                        },
                        error: function(e){
                            console.log(e);
                        }
                    });
                    e.preventDefault();
                  }
              });

              $('.remove-comment').on('click',function(e){
                    $.ajax({
                        type: "DELETE",
                        url: '/delete/comment/'+$(this).parent().data('id'),
                        data: "",
                        success: function() {
                            console.log("data sent");
                            location.reload();
                        },
                        error: function(e){
                            console.log(e);
                        }
                    });
              });
              $('.remove-subcomment').on('click',function(e){
                    $.ajax({
                        type: "DELETE",
                        url: '/delete/subcomment/'+$(this).parent().data('id'),
                        data: "",
                        success: function() {
                            console.log("data sent");
                            location.reload();
                        },
                        error: function(e){
                            console.log(e);
                        }
                    });
              });
        });
    </script>
@endsection
