<div id="selectbm"><table width="750" border="0" cellspacing="1">
  <tr>
    <td><a relid="0" rel="根">-> 根</a> <div style="float:right;"> 
<input name="_selfroot" type="checkbox" id="_selfroot" value="1" <?php if(get_cookie('_msort') ==1) : ?>checked="checked"<?php endif;?>/> 开始屏

<button class="button primary">刷新</button></div></td>
  </tr>
  <?php foreach($list as $key=>$value){ ?>
  <tr>
    <td><?php echo $value['_vchr']; ?>
    
    <a relid="<?php echo $value['id']; ?>" rel="<?php echo $value['title'] ?>"><?php echo $value['title']; ?></a>
    
    </td>
  </tr>
  <?php	  }?>    
</table>
</a>
<script type="text/dialog">

ob = this;

$('#selectbm a').click(function(){					//关闭
	//=====================================================		//重写确定按钮方法
	//thisobjselect.attr('result',$(this).attr("rel"));
	$(_option.rel).val($(this).attr("rel"));
	$(_option.rel).attr("rel",$(this).attr("relid"));
	ob.close();
});
</script>