
<div id="selectbm"><table width="750" border="0" cellspacing="1">
  <tr>
    <td><a relid="0" rel="根">根</a></td>
  </tr>
  <tr>
    <td><a relid="1" rel="根1">根1</a></td>
  </tr>
  <tr>
    <td><a relid="2" rel="根2">根2</a></td>
  </tr>
  <tr>
    <td><a relid="3" rel="根3">根3</a></td>
  </tr>
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