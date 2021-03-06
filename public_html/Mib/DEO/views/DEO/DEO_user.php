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
    <link href="/A/bootstrap-3.2.0/css/bootstrap.css" rel="stylesheet">
	<link href="/A/bootstrap-3.2.0/font.css" rel="stylesheet">

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

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">药品抽样单管理系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            <li><a href="/DEO/loginout">退出</a></li>
          </ul>
          <!-- form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form -->
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="/DEO/user/">用户管理</a></li>
            <li><a href="/DEO/danhao/">抽样单号管理</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">用户管理</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>用户id</th>
                  <th>最后登陆时间</th>
                  <th>最后登陆ip</th>
                  <th>注册时间</th>
                  
                  <th>操作</th>
                </tr>
              </thead>

              <tbody>
               <?php foreach($rc as $key=>$value){ ?>
                <tr>
                  <td><?=$value['user_login']?></td>
                  <td><?=date('Y/m/d',$value['f_logintime'])?></td>
                  <td><?=$value['f_loginip']?></td>
                  <td><?=date('Y/m/d',$value['f_regtime'])?></td>
                  
                  <td>
                  <?php
                  if($value['enable']==1){
				  ?>
                  <a href="javascript:void(0)" class="cflag" ulogin="<?=$value['user_login']?>" rel="<?=$value['enable']?>"><span class=" glyphicon glyphicon-ok red"></span></a>
                  <?php
				  }else{
				  ?>
                  <a href="javascript:void(0)" class="cflag" ulogin="<?=$value['user_login']?>" rel="<?=$value['enable']?>"><span class=" glyphicon glyphicon-remove"></span></a>
                  <?php
				  }
				  ?>
                   &nbsp;&nbsp;&nbsp;&nbsp;
<a class="edit_user btn btn-primary " dh="<?=$value['user_login']?>">修改权限</a>                  
                  
                  
                  </td>
                </tr>
               <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/A/jquery-1.11.1.min.js"></script>
    <script src="/A/bootstrap-3.2.0/js/bootstrap.min.js"></script>
    <!-- script src="assets/js/docs.min.js"></script -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/A/artDialog4.1.7/artDialog.js?skin=default"></script>
    <script src="/A/CK_bootstrap.js"></script>

<script language="javascript"> 
$(document).ready(function(){
	


$(".edit_user").click(function(){
		
		var fr = $(this).attr('fr');
		rel = '/DEO/edit_user/'+$(this).attr('dh');
		$.CK({
			width:'50%',
			rel:rel
		});
	});	
	
	
	$(".cflag").click(function(){
		var res = $.ajax({
			url : '/DEO/cflag',
			type: 'post',
			data: {
				ulogin 		: $(this).attr('ulogin'),
				rel 		: $(this).attr('rel'),
				
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
			location.reload();
			// window.location.href="/DEO/index"; 
			//return true;
		}		
		
	});	
	
}) 
</script> 

   
  </body>
</html>
