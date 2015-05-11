<?php unset($rc['_id']);?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title">用户 ： <?=$row['user_login']?></h4>
</div>

<div class="modal-body">

<a class="deo_user btn btn-default <?php if($row['category']=='SUPERMANAGER'){?>btn-primary<?php }?> " uid="<?=$ulogin?>" up="SUPERMANAGER" <?php if($row['category']=='SUPERMANAGER'){?>disabled<?php }?>>超级管理员</a>
<br>
<br>
<a class="deo_user btn btn-default <?php if($row['category']=='MANAGER'){?>btn-primary<?php }?>" uid="<?=$ulogin?>" up="MANAGER" <?php if($row['category']=='MANAGER'){?>disabled<?php }?>>管理员权根</a>
<br>
<br>
<a class="deo_user btn btn-default <?php if($row['category']=='SAMPLEPERSON'){?>btn-primary<?php }?>" uid="<?=$ulogin?>" up="SAMPLEPERSON"  <?php if($row['category']=='SAMPLEPERSON'){?>disabled<?php }?>>抽样人权限</a>
   
      
      
      
      
</div>

<div class="modal-footer">
    <!--button type="button" class="btn btn-white" data-dismiss="modal">Close</button -->
    <button type="button" class="btn btn-info"  data-dismiss="modal">关闭</button>
</div>



<script type="text/dialog">



$(".deo_user").click(function(){
	
	$(".deo_user").removeClass("btn-primary");
	$(this).addClass("btn-primary");

	$('.deo_user').attr("disabled",false); 
	$(this).attr("disabled",true); 



	var res = $.ajax({
			url : '/DEO/edit_do',
			type: 'post',
			data: {
				uid 		: $(this).attr('uid'),
				up 			: $(this).attr('up'),
				
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
			// window.location.href="/DEO/index"; 
			//return true;
		}		






});


</script>


