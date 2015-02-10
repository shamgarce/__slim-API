
<div id="selectbm"><table width="750" border="0" cellspacing="1">
  <tr>
    <td><a relid="89" rel="的方式是打发斯蒂芬">的方式是打发斯蒂芬</a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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