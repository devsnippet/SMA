<!DOCTYPE html>
<html lang="en" @if (Session::has('user_id')) ng-app="smaApp" @endif >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="">

    <title>@yield('title') - Student Management Administration</title>

    <!-- jQuery -->
    {{ HTML::script('js/jquery-1.11.3.min.js'); }}

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('css/bootstrap.min.css'); }}
    
    <!-- BxSlider CSS -->
    {{ HTML::style('css/jquery.bxslider.css'); }}

    <!-- Custom CSS -->
    {{ HTML::style('css/flat-ui.min.css'); }}

    <!-- Custom Fonts -->
    {{ HTML::style('css/font-awesome.min.css'); }}
    
    <!-- yamm -->
    {{ HTML::style('css/yamm.css'); }}

    {{ HTML::style('css/main.css'); }}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <nav class="navbar navbar-inverse navbar-embossed navbar-static-top yamm">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/'); }}">SMA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ url('/'); }}"><i class="fa fa-home"></i></a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	@if (!Session::has('user_id'))
	            <li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    	Sign in
                    </a>
                    
                	<ul class="dropdown-menu" style="width:400px; min-width:400px;">
                        <li>
                        	<div class="yamm-content" style="color:white;">
                            	<form class="form-horizontal" id="formSignIn">
                                	<div class="row" style="margin-bottom:8px;">
                                        <div class="col-xs-4">
                                            <label class="control-label">User id</label>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <input type="textbox" class="form-control input-sm" name="username"/>
                                        </div>
                                    </div>
                                	<div class="row" style="margin-bottom:8px;">
                                        <div class="col-xs-4">
                                            <label class="control-label">Password</label>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <input type="password" class="form-control input-sm" name="password"/>
                                        </div>
                                    </div>
                                	<div class="row text-right">
                                    	<div class="col-xs-12">
                                        	<button type="submit" class="btn btn-primary">Sign in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            @else
            	<li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    	<i class="fa fa-user"></i>
                    </a>

                	<ul class="dropdown-menu" style="width:300px; min-width:300px;">
                        <li>
                        	<div class="yamm-content" style="color:white;">
                            	<div class="row">
                                    <div class="col-xs-6">
                                        <strong>User id</strong>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        admin
                                    </div>
                                    
                                    <div class="col-xs-6">
                                        <strong>User name</strong>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        administrator
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            	<li><a href="{{ url('account/logout') }}">Sign out <i class="fa fa-sign-out"></i></a></li>
            @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	@yield('content')
   	
    <footer style="background-color:#34495E; width:100%; margin-top:15px; padding:15px 0 30px 0;">
    	<div class="container">
        	<div class="row">
            	<div class="col-xs-6">
                	SMA - Student Management Administration
                </div>
            	<div class="col-xs-6 text-right">
                	<a href="#"><i class="fa fa-home"></i></a> | <a href="#">About</a> | <a href="#">Contact</a>
                </div>
            </div>
        </div>
    </footer>
	
    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('js/bootstrap.min.js'); }}
        
    <!-- BxSlider Javascript  -->
    {{ HTML::script('js/jquery.bxslider.min.js'); }}

    <!-- Custom Theme JavaScript -->
    {{ HTML::script('js/flat-ui.min.js'); }}
    
    <!-- Angular -->
    {{ HTML::script('js/angular.min.js'); }}
    {{ HTML::script('js/angular-route.min.js'); }}
    {{ HTML::script('js/angular-resource.min.js'); }}
    
    <!-- App -->
    {{ HTML::script('js/lib/q.js'); }}
    {{ HTML::script('js/lib/apiroute.js'); }}
    {{ HTML::script('js/app/user.js'); }}
    
    @if (Session::has('user_id'))
    	{{ HTML::script('js/app/apps.js'); }}
    	{{ HTML::script('js/app/controllers.js'); }}
    	{{ HTML::script('js/app/user-services.js'); }}
    	{{ HTML::script('js/app/student-services.js'); }}
    @endif
    
	<script type="text/javascript">
		$(document).ready(function () {
			$('.dropdown-toggle').dropdown();
			
			@if (!Session::has('user_id'))
				$("#formSignIn").submit(function(e){
					e.preventDefault();
					
					sma.user.login($(this));
				});
			@endif
		});
		sma.ApiRoute.endpoint(" {{ url('/api') }} ");
	</script>

    @section('scripts')
    @show
</body>
</html>