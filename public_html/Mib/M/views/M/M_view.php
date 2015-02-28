<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="product" content="Metro UI CSS Framework">

    <link href="/A/Metro/css/metro-bootstrap.css" rel="stylesheet">
    <link href="/A/Metro/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="/A/Metro/css/iconFont.css" rel="stylesheet">
    <link href="/A/Metro/css/docs.css" rel="stylesheet">
    <link href="/A/Metro/js/prettify/prettify.css" rel="stylesheet">

    <link href="/A/CSS/color.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="/A/Metro/js/jquery/jquery.min.js"></script>
    <script src="/A/Metro/js/jquery/jquery.widget.min.js"></script>
    <script src="/A/Metro/js/jquery/jquery.mousewheel.js"></script>
    <script src="/A/Metro/js/prettify/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="/A/Metro/js/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="/A/Metro/js/docs.js"></script>
    <!-- script src="/A/Metro/js/github.info.js"></script -->
   
    <title>Metro UI CSS : Metro Bootstrap CSS Library</title>

<style type="text/css"> 
.wrapper {width: 100%; } 
.left {width:300px;  position:absolute; left:0 ;z-index:1 } 
.right {width:100%;; background:#000;position:absolute; left:0} 
.content {margin-left:300px; background:#ffc; left:0;top:0px;width:auto;;} 
</style> 

</head>
<body class="metro">
 
<div class="wrapper"> 
   
    <div class="left bg-darkRed" style="height:100%">
    <div class="menu ">
      
      
<a href="/M/" class="button primary">首页</a>
<?php if(get_cookie('_madd') ==1) : ?><a class="button info listadd">添加</a><?php endif;?> 
<?php if(get_cookie('_msort') ==1) : ?><a class="button success listsort">排序</a><?php endif;?> 
<a href="/M/setup" class="button warning">设置</a>
<a href="/M/tree" class="button warning">TREE</a>

<a href="/M/tnode/" class="button warning">list</a>
<a href="/M/show/" class="button warning">show</a>

        
   <h2 class="fg-white  text-right">设置</h2>
   <hr>
    <ul class="unstyled fg-white">
    
<?php foreach($leaf['child'] as $key=>$value):?>
        <li><i class="icon-record on-right fg-white"></i> <a href="#<?=$value['id']?>" class="fg-white fg-hover-cyan"><?=$value['title']?></a></li>
<?php endforeach;?>
    </ul>  


<a class="button success " href="/M/" style="width: 100%; margin-bottom: 5px">首页</a>

    </div>
    </div> 
    <div class="right bg-darkRed"> 
        <div class="content">
            <div class="right-head bg-darker  fg-white" style="padding-left:5pt;">
                <h1 class="fg-white">
                    <?php if($mcmain['preid']==0):?>
                    <a href="/M/" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 
                    <?php else:?>
                    <a href="/M/tnode/<?=$mcmain['preid']?>" class="fg-hover-darkOrange"><i class="icon-arrow-left-3 smaller fg-white"></i></a> 
                    <?php endif;?>
                     返回<small class="on-right">上一级
                    <a href="#" class="fg-hover-darkOrange vpath_show"><i class="icon-arrow-down-5 smaller fg-white"></i></a>
                    <a href="#" class="fg-hover-darkOrange vpath_hide" style="display:none;"><i class="icon-arrow-up-5 smaller fg-white"></i></a>
                    </small>
                </h1>
                
<!-- 隐藏的路径 -->                
<div class="notice bg-orange fg-white notice_path" style="padding:10px;display:none;">
    <nav class="breadcrumbs small">
    <ul>
    <li>
     <a href="/M/">
    <i class="icon-home"></i>
    </a>
    </li>
<?php foreach($nav as $key=>$value):?>
    <li>
    <a href="/M/tnode/<?=$value['id']?>"><?=$value['title']?></a>
    </li>
<?php endforeach;?>
    </ul>
    </nav>
    
</div>            
<!-- /隐藏的路径 -->              
                
                
            </div> 
            
<H2 class="padding15">




<strong><?=$mcmain['title']?></strong>  <button class="button info small">编辑</button> 
<small>
<i class="icon-tag"
style="background: red;
color: white;
padding: 5px;
border-radius: 50%"></i>
</small>
</H2>           
            
<div class="right-body" style="padding-left:15pt;padding-right:20pt;height:auto;">
             
<?php if(!empty($mcmain['content'])):?>
<div class="panel bg-cyan">
<div class="panel-content">
<?=$mcmain['content']?>
</div>
</div>
<?php endif;?>

   <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架 <button class="button info small">编辑</button></h2>            

<h1>h1. Header 1</h1>
<h2>h2. Header 2</h2>
<h3>h3. Header 3</h3>
<h4>h4. Header 4</h4>
<h5>h5. Header 5</h5>
<h6>h6. Header 6</h6>
<br>
<p class="header">Header</p>
<p class="subheader">Class Subheader</p>
<p class="subheader-secondary">Sub secondary</p>
<p class="item-title">Item title</p>
<p class="item-title-secondary">Title sec</p>


   <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
<p>

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus lectus sit amet odio ullamcorper malesuada dignissim justo gravida. Pellentesque sagittis, tellus id sagittis accumsan, augue velit pretium urna, ac interdum dui nibh et orci. Quisque dapibus elit ut metus varius ac bibendum sem luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis sagittis lorem. Praesent ac eros quam.

Praesent molestie bibendum consequat. Suspendisse a felis eu augue venenatis egestas nec ac lectus. Nam nec felis lorem. Maecenas luctus est et nulla cursus vestibulum. Curabitur suscipit adipiscing dui eget sollicitudin. Sed accumsan tincidunt enim, in feugiat ligula ornare et.

Nullam libero odio, lacinia vel dignissim sed, consequat ac nisi. Ut at mauris sit amet sem dapibus pretium sit amet sed orci. Quisque tincidunt sodales sollicitudin. Ut purus odio, imperdiet ut laoreet ac, placerat vel ante. Nulla tincidunt sapien in metus tincidunt imperdiet. Vestibulum a dui nisi. Morbi vestibulum nulla lacinia enim tempus ullamcorper.
</p>  

  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
<p class="readable-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus lectus sit amet odio ullamcorper malesuada dignissim justo gravida. Pellentesque sagittis, tellus id sagittis accumsan, augue velit pretium urna, ac interdum dui nibh et orci. Quisque dapibus elit ut metus varius ac bibendum sem luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis sagittis lorem. Praesent ac eros quam.</p>
<p class="readable-text">Praesent molestie bibendum consequat. Suspendisse a felis eu augue venenatis egestas nec ac lectus. Nam nec felis lorem. Maecenas luctus est et nulla cursus vestibulum. Curabitur suscipit adipiscing dui eget sollicitudin. Sed accumsan tincidunt enim, in feugiat ligula ornare et.</p>
<p class="readable-text">Nullam libero odio, lacinia vel dignissim sed, consequat ac nisi. Ut at mauris sit amet sem dapibus pretium sit amet sed orci. Quisque tincidunt sodales sollicitudin. Ut purus odio, imperdiet ut laoreet ac, placerat vel ante. Nulla tincidunt sapien in metus tincidunt imperdiet. Vestibulum a dui nisi. Morbi vestibulum nulla lacinia enim tempus ullamcorper.</p>

  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
<p class="tertiary-text">Tertiary text: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus lectus sit amet odio ullamcorper malesuada dignissim justo gravida. Pellentesque sagittis, tellus id sagittis accumsan, augue velit pretium urna, ac interdum dui nibh et orci. Quisque dapibus elit ut metus varius ac bibendum sem luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis sagittis lorem. Praesent ac eros quam.</p>
<p class="tertiary-text-secondary">Tertiary secondary text: Praesent molestie bibendum consequat. Suspendisse a felis eu augue venenatis egestas nec ac lectus. Nam nec felis lorem. Maecenas luctus est et nulla cursus vestibulum. Curabitur suscipit adipiscing dui eget sollicitudin. Sed accumsan tincidunt enim, in feugiat ligula ornare et.</p>

  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
<p class="code-text">Code text: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus lectus sit amet odio ullamcorper malesuada dignissim justo gravida. Pellentesque sagittis, tellus id sagittis accumsan, augue velit pretium urna, ac interdum dui nibh et orci. Quisque dapibus elit ut metus varius ac bibendum sem luctus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis sagittis lorem. Praesent ac eros quam.</p>



  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
   <dl class="horizontal">
    <dt>Description lists</dt>
<dd>A description list is perfect for defining terms.</dd>
<dt>Euismod</dt>
<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
<dd>Donec id elit non mi porta gravida at eget metus.</dd>
<dt>Malesuada porta</dt>
<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
<dt>Felis euismod semper eget lacinia</dt>
<dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
</dl>

  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            

<dl>
<dt>Description lists</dt>
<dd>A description list is perfect for defining terms.</dd>
<dt>Euismod</dt>
<dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
<dd>Donec id elit non mi porta gravida at eget metus.</dd>
<dt>Malesuada porta</dt>
<dd>Etiam porta sem malesuada magna mollis euismod.</dd>
</dl>


  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            

    <ul class="inline">
    <li>1</li>
    <li>1</li>
    <li>1</li>
    <li>1</li>
    
    </ul>
    
    
    
    
    
    
    
    
  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架4</h2>            
    <ul class="unstyled">
<li>Lorem ipsum dolor sit amet</li>
<li>Consectetur adipiscing elit</li>
<li>Integer molestie lorem at massa</li>
<li>Facilisis in pretium nisl aliquet</li>
<li>
Nulla volutpat aliquam velit
<ul>
<li>Phasellus iaculis neque</li>
<li>Purus sodales ultricies</li>
<li>Vestibulum laoreet porttitor sem</li>
<li>
Ac tristique libero volutpat at
<ul>
<li>Phasellus iaculis neque</li>
<li>Purus sodales ultricies</li>
<li>Vestibulum laoreet porttitor sem</li>
<li>Ac tristique libero volutpat at</li>
</ul>
</li>
</ul>
</li>
<li>Faucibus porta lacus fringilla vel</li>
<li>Aenean sit amet erat nunc</li>
<li>Eget porttitor lorem</li>
</ul>
    
    
  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
    <ol>
<li>Lorem ipsum dolor sit amet</li>
<li>Consectetur adipiscing elit</li>
<li>Integer molestie lorem at massa</li>
<li>Facilisis in pretium nisl aliquet</li>
<li>Nulla volutpat aliquam velit</li>
<li>Faucibus porta lacus fringilla vel</li>
<li>Aenean sit amet erat nunc</li>
<li>Eget porttitor lorem</li>
</ol>
    
    
  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架6</h2>    
          
<ul>
<li>Lorem ipsum dolor sit amet</li>
<li>Consectetur adipiscing elit</li>
<li>Integer molestie lorem at massa</li>
<li>Facilisis in pretium nisl aliquet</li>
<li>
Nulla volutpat aliquam velit
<ul>
<li>Phasellus iaculis neque</li>
<li>Purus sodales ultricies</li>
<li>Vestibulum laoreet porttitor sem</li>
<li>
Ac tristique libero volutpat at
<ul>
<li>Phasellus iaculis neque</li>
<li>Purus sodales ultricies</li>
<li>Vestibulum laoreet porttitor sem</li>
<li>Ac tristique libero volutpat at</li>
</ul>
</li>
</ul>
</li>
<li>Faucibus porta lacus fringilla vel</li>
<li>Aenean sit amet erat nunc</li>
<li>Eget porttitor lorem</li>
</ul>          
          
          
          
  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>  
            
<blockquote class="place-right">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
<small>
Someone famous
<cite title="Source Title">Source Title</cite>
</small>
</blockquote>            
            <br>
<br>

            
            
  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
    <blockquote>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
<small>
Someone famous
<cite title="Source Title">Source Title</cite>
</small>
</blockquote>



  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            

    <blockquote>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </blockquote>

  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
    <address>
    <strong>Metro UI CSS</strong><br />
    Khreschatyk str, Suite 1<br>
    Kiev, Ukraine 01001<br>
    <abbr title="Phone">P:</abbr> (123) 456-7890
    </address>
     
    <address>
    <strong>Full Name</strong><br>
    <a href="mailto:#">first.last@example.com</a>
    </address>



  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
An abbreviation of the word attribute is <abbr title="attribute description">attr</abbr>

  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            

    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p class="text-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p class="text-alert">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p class="text-warning">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <p class="text-success">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>


  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
<p>This is a normal text, and the <em>text is italics</em>.</p>


  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
<p>This is a normal text, and the <strong>text is strong</strong>.</p>


  <h2 class="fg-darkCobalt fg-hover-lightBlue" style="padding-top:10px;padding-bottom:5px;border-bottom: 1px solid #777777;">结构框架</h2>            
<p>This is a normal text, and the <small>text is reduced</small>.</p>











<br>
<br>

            </div> 
             
        </div>  
    </div> 
</div>     
    
    
    
    
    
 <script src="/A/artDialog4.1.7/artDialog.js?skin=default"></script>
<script src="/A/CK.js"></script>
<script language="javascript">
$(document).ready(function(e) {	 
    if ($('.menu').length > 0) {
        var side_menu = $('.menu');
        var fixblock_pos = side_menu.position().top;
        $(window).scroll(function(){
            if ($(window).scrollTop() > fixblock_pos){
                side_menu.css({'position': 'fixed','width':'300' ,'top':'0px', 'z-index':'1000'});
            } else {
                side_menu.css({'position': 'static'});
            }
        })
    }
	
	$(".vpath_show").click(function(){
		$(".notice_path").show();
		$(".vpath_hide").show();
		$(".vpath_show").hide();
	});
	
	$(".vpath_hide").click(function(){
		$(".notice_path").hide();
		$(".vpath_show").show();
		$(".vpath_hide").hide();
	});
	
	$('.listsort').click(function(){
		$.CK({
			rel:'节点排序',
			url:'',
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});

	$('.listadd').click(function(){
		$.CK({
			rel:'添加数据',
			url:'',
			_this:$(this),
			buttonok	: true,
			buttoncancel: true,
			});
	});
	
<?php if(get_cookie('_mpath') ==1) : ?>
	$(".notice_path").show();
	$(".vpath_hide").show();
	$(".vpath_show").hide();
<?php endif;?>
	
});
</script>
    

</body>
</html>