
<html lang="en">
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Create User</title>
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
	          <h1>Create User </h1>
	        </header>
	        <form action="{{route('createUser')}}" class="templatemo-login-form" method="POST">
	        	@csrf
                <div class="form-group">
	        	<label for="">First name</label>	
                <div class="input-group">
                        
		        		<div class="input-group-addon"><i class="fas fa-user "></i></div>
		              	<input type="text" name="firstname" class="form-control" placeholder="">
		          	 
					</div>
					@error('firstname')
                     <span style="color:red;">{{$message}}</span>
					 @enderror
	        	</div>
                <div class="form-group">
	        	<label for="">Last name</label>	
                <div class="input-group">
                        
		        		<div class="input-group-addon"><i class="fas fa-user"></i></div>
		              	<input type="text" name="lastname" class="form-control" placeholder="">
		          	 
					</div>
					@error('lastname')
                     <span style="color:red;">{{$message}}</span>
					 @enderror
	        	</div>
                <div class="form-group">
	        	<label for="">Email</label>	
                <div class="input-group">
                        
		        		<div class="input-group-addon"><i class="fas fa-envelope"></i></div>
		              	<input type="email" name="email" class="form-control" placeholder="">
		          	 
					</div>
					@error('email')
                     <span style="color:red;">{{$message}}</span>
					 @enderror
	        	</div>
                <div class="form-group">
                <label for="">Phone</label>	
                <div class="input-group">
                       
		        		<div class="input-group-addon"><i class="fas fa-phone"></i></div>
		              	<input type="tel" name="phone" class="form-control" placeholder="">
		          	 
					</div>
					@error('phone')
                     <span style="color:red;">{{$message}}</span>
					 @enderror
	        	</div>
                <input type="hidden" name="role" value="1">
	        	<div class="form-group">
	        	<label for="">Password</label>	
                <div class="input-group">
                        
		        		<div class="input-group-addon"><i class="fas fa-key"></i></div>
		              	<input type="password" name="password" class="form-control" placeholder="******">
						  
					</div>
					@error('password')
                     <span style="color:red;">{{$message}}</span>
					 @enderror
	        	</div>
	          	<div class="form-group">
		
				</div>
				<div class="form-group">
					<button type="submit" class="templatemo-blue-button width-100">Sign in</button>
				</div>
	        </form>
		</div>
		<div class="templatemo-content-widget templatemo-login-widget templatemo-register-widget white-bg">
			<p>Have you registered already? <strong><a href="/user/login" class="blue-text">Sign in now!</a></strong></p>
		</div>
	</body>
</html>
