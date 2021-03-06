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
          <a class="navbar-brand" href="#">Easy manage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="./index.html">首页</a></li>
            <li><a href="#">设置</a></li>
            <li><a href="#">帮助</a></li>
            <li><a href="#">退出</a></li>
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
            <li class="active"><a href="index.html">菜单 <span class="sr-only">(current)</span></a></li>
            <li><a href="/DEO/user/">用户管理</a></li>
            <li><a href="/DEO/danhao/">抽样单号查看</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">抽样单号查看</h1>
          <div class="table-responsive">
           <a class="btn btn-primary <?php if($fic=='A'){?>active<?php }?>" href="/DEO/danhao/A/1">全部</a>
           <a class="btn btn-primary <?php if($fic=='J'){?>active<?php }?>" href="/DEO/danhao/J/1">国外</a>
           <a class="btn btn-primary <?php if($fic=='G'){?>active<?php }?>" href="/DEO/danhao/G/1">国内</a>
-->FLIT : 
启用 <input name="" type="checkbox" onClick="setc('deo_qiyong')" value="" <?php if($_COOKIE['deo_qiyong'] ==1 ){?>checked="CHECKED"<?php }?>>
　| 　
上传 <input name="" type="checkbox" onClick="setc('deo_shangchuan')" value="" <?php if($_COOKIE['deo_shangchuan'] ==1 ){?>checked="CHECKED"<?php }?>>


            <table class="table table-striped">
              <thead>
                <tr>
                  <th>单号</th>
                  <th>国内外</th>
                  <th>是否启用</th>
                  <th>是否上传</th>
                  <th>是否有效</th>
                  <th>所属用户</th>
                </tr>
              </thead>
                <tr>
                  <th colspan="6"><nav>
  <ul class="pagination">
    <li><a href="/DEO/danhao/<?=$fic?>/1">首页</a></li>
    <li><a href="/DEO/danhao/<?=$fic?>/<?=$pre?>">上一页</a></li>
    <li><a href="/DEO/danhao/<?=$fic?>/<?=$next?>">下一页</a></li>
    <li><a>第 <?=$page?> 页</a></li>
  </ul>
</nav></th>
                </tr>

              <tbody>
               <?php foreach($rc as $key=>$value){ ?>
                <tr>
                  <td>
                  <?php if($value['up']==0){?>
                  <?=$value['odd_id']?>
				  <?php }else{?>
                  <a class="view_danhao white b_red" fr="<?=$value['f']?>" dh="<?=$value['odd_id']?>"><?=$value['odd_id']?></a>
                  <?php }?>
                  
                  </td>
                  <td><?=$value['f']?></td>
                  <td><?=$value['used']?></td>
                  <td><?=$value['up']?></td>
                  <td><?=$value['enable']?></td>
                  <td><?=$value['user']?></td>
                 
                </tr>
               <?php } ?>
              </tbody>
                <tr>
                  <th colspan="6"><nav>
  <ul class="pagination">
    <li><a href="/DEO/danhao/<?=$fic?>/1">首页</a></li>
    <li><a href="/DEO/danhao/<?=$fic?>/<?=$pre?>">上一页</a></li>
    <li><a href="/DEO/danhao/<?=$fic?>/<?=$next?>">下一页</a></li>
    <li><a>第 <?=$page?> 页</a></li>
  </ul>
</nav></th>
                </tr>
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
    <script src="/A/CommonIni.js"></script>

    <script src="/A/artDialog4.1.7/artDialog.js?skin=default"></script>
    <script src="/A/CK_bootstrap.js"></script>
    
    <script language="javascript">
	$(".view_danhao").click(function(){
		
		var fr = $(this).attr('fr');
		if(fr=='J'){
			rel = '/DEO/guowai/'+$(this).attr('dh');
		}else{
			rel = '/DEO/guonei/'+$(this).attr('dh');
		}
		
		$.CK({
			width:'60%',
			rel:rel
		});
	});	


</script>
    
    <!-- script src="assets/js/docs.min.js"></script -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   
  </body>
</html>

