<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/A/bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/A/UI1/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container" style="padding-top:150px;width:300px">


        <h2 class="form-signin-heading">请登陆</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" id="inputEmail" class="form-control username" placeholder="用户名" required autofocus>
        <div class="checkbox">
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control password" placeholder="密码" required>
        <div class="checkbox">
        </div>
        <button class="btn btn-lg btn-primary btn-block login_submit" type="submit">登陆</button>
   

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/A/jquery-1.11.1.min.js"></script>
    <script src="/A/bootstrap-3.3.4/js/bootstrap.min.js"></script>
    <!-- script src="assets/js/docs.min.js"></script -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    
<script language="javascript"> 
$(document).ready(function(){
	
	$(".login_submit").click(function(){


		var res = $.ajax({
			url : '/DEO/login_exc',
			type: 'post',
			data: {
				username 		: $('.username').val(),
				password 		: $('.password').val(),
				},
			dataType: "json",
			async:false,
			cache:false
		}).responseJSON;
		//console.log(res);
		//==========================1
		if(res.code<0){
			alert(res.msg);
			return false;
		}else{
			//location.reload();
			 window.location.href="/DEO/index"; 
			return true;
		}		
		
	});	
	
}) 
</script> 
   
  </body>
</html>
