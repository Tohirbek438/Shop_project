<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Login</title>
        <meta name="description" content="">
        <meta name="author" content="templatemo">
        <!--
        Visual Admin Template
        https://templatemo.com/tm-455-visual-admin
        -->
		<link rel="stylesheet" href="/admin/plugins/fontawesome-free/css/all.min.css">
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700' rel='stylesheet' type='text/css'>
	    <link href="/visual/css/font-awesome.min.css" rel="stylesheet">
	    <link href="/visual/css/bootstrap.min.css" rel="stylesheet">
	    <link href="/visual/css/templatemo-style.css" rel="stylesheet">

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      {{-- <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> --}}
	    <![endif]-->
	</head>
	<body class="light-gray-bg">
		<div class="templatemo-content-widget templatemo-login-widget white-bg my-2">
			<header class="text-center">
	          <div class="square"></div>
	          <h1>Sign in </h1>
	        </header>
	        <form action="{{route('user.kirish')}}" class="templatemo-login-form" method="POST">
	        	@csrf
                <div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fas fa-user"></i></div>
		              	<input type="text" name="email" class="form-control" placeholder="js@dashboard.com">
		          	 
					</div>
					@error('email')
                     <span style="color:red;">{{$message}}</span>
					 @enderror
	        	</div>
	        	<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fas fa-lock"></i></i></div>
		              	<input type="password" name="password" class="form-control" placeholder="******">
						  
					</div>
					@error('password')
                     <span style="color:red;">{{$message}}</span>
					 @enderror
	        	</div>
	          	<div class="form-group">
		
				</div>
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100">Login</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Not a registered user yet? <strong><a href="{{ route('user.create')}}" class="blue-text">Sign up now!</a></strong></p>
		</div>
	</body>
</html>
