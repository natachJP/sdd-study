<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-modified.css') }}" rel="stylesheet">
    <style>
    *::-webkit-media-controls{
        display: none !important;
    }
    </style>
</head>

<body class="gray-bg">

<div style="position: fixed; z-index: -99; width: 100%; height: 100%">
<!--<div id="muteYouTubeVideoPlayer"></div>
<iframe width="100%" height="100%" src="http://www.youtube.com/embed/CDjkkE_7ntM?version=3&loop=1&autoplay=1&rel=0&showinfo=0&controls=0&autohide=1&modestbranding=1" frameborder="0" allowfullscreen></iframe>-->
  
  <video wmode="transparent" controls="false" autoplay="" loop="" preload="" muted="" style="object-fit: fill; height: 100% !important" name="media"><source src="{{ asset('img/DarkStageFlare.mp4')}}" type="video/mp4"></video>
</div>
    <div class="middle-box text-center loginscreen">
        <div>
            <div class="login-header">

                <h1 class="logo-name ">SE</h1>

            </div>
            <div class="login-content">
                <h3>Welcome to Code Review</h3>
                <p>Perfectly code reviews and comments with web app views.
                    <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
                </p>
                <p>Login in. To see it in action.</p>
            </div>
            <div class="login-form">
			    {{ Form::open(array('url' => 'auth/login' , 'class' => 'm-t' , 'role' => 'form')) }}
                
                    <div class="form-group">
			    		{{ Form::text('user', Input::old('user'), array('placeholder' => 'Username' , 'required' => '' , 'class' => 'form-control')) }}
                        
                    </div>
                    <div class="form-group">
			    	{{ Form::password('password', array('placeholder' => 'Password' , 'required' => '' , 'class' => 'form-control')) }}
                    {{ Form::hidden('remember', true) }}
                    </div>
			    	{{ Form::submit('Login',array('class' => 'btn btn-primary block full-width m-b')) }}
			    {{ Form::close() }}
            </div>
                <!--<a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
            
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>-->
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!--<script async src="https://www.youtube.com/iframe_api"></script>
<script>

 var player;

function onYouTubePlayerAPIReady() {
    player = new YT.Player('muteYouTubeVideoPlayer', {
        playerVars: {
            'autoplay': 1,
            'controls': 0,
            'autohide': 1,
            'wmode': 'opaque',
			'modestbranding':0,
            'showinfo': 0,
            'loop': 1,
            'mute': 1,
            //'start': 15,
            //'end': 110,
            'playlist': 'vUeZ4TKz1Sk'
			
        },
        videoId: 'vUeZ4TKz1Sk',
		height: '100%',
    	width: '100%',
        events: {
            'onReady': onPlayerReady
        }
    });

}

function onPlayerReady(event) {
    event.target.mute();
    $('#text').fadeIn(400);
}

</script>-->

</body>

</html>

	
	<!--<form class="m-t" role="form" action="index.html">
	<input type="email" class="form-control" placeholder="Username" required="">
	<input type="password" class="form-control" placeholder="Password" required="">
	{{ Form::open(array('url' => 'auth/login')) }}
	<h1>Login</h1>

	<p>
	    {{ $errors->first('user') }}
	    {{ $errors->first('password') }}
	</p>

	<p>
	    {{ Form::label('user', 'Username') }}
	    {{ Form::text('user', Input::old('user'), array('placeholder' => 'awesome')) }}
	</p>

	<p>
	    {{ Form::label('password', 'Password') }}
	    {{ Form::password('password') }}
	</p>

	 </p>
	 	{{ Form::hidden('remember', true) }}
    </p>

	<p>{{ Form::submit('Submit!') }}</p>
	
	{{ Form::close() }}-->

