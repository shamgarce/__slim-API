<table class="table table-hover table-condensed table-striped table-bordered" >
<tr>
  <td>接口名称：<?php echo $row['name']?>
    <input class="rowv" type="hidden" id="textfield" value="<?php echo $row['name']?>" />
    </td>
</tr>
<tr>
	<td>接口地址：
  <input type="text" class="baseurl" id="textfield7" value="<?php echo $row['v']?>/<?php echo $row['api']?>" size="60" />
  <input class="basever" type="hidden" id="textfield7" value="<?php echo $row['v']?>" />
  <input class="baseid" type="hidden" id="textfield7" value="<?php echo $id?>" />
	</td>
</tr>

<tr>
  <td valign="top">请求参数：<br />    <textarea cols="60" rows="6" class="rowrequest" id="textfield6"><?php echo $row['request']?></textarea></td>
</tr>
<tr>
<td><input type="submit" name="button" id="button" value="提交" class="submitviewtest btn btn-primary" /></td>
</tr>
<tr>
  <td valign="top"><p>
<p class="resultte">
<pre><?php echo $row['dis']?></pre></p>
<hr>
校验工具 : <a href="http://www.bejson.com/" target="_blank">http://www.bejson.com/</a></td>
</tr>
<!-- tr>
  <td>默认 ：
    <input type="radio" name="radio" id="radio7" value="radio" />
    关闭
    <input type="radio" name="radio" id="radio5" value="radio" />
   200
    <input type="radio" name="radio" id="radio6" value="radio" />
 500</td>
</tr -->

</table>


<script type="text/dialog">
	$('.submitviewtest').click(function(){

		var co = $('.rowrequest').val();
		if(co == '')co = '{}';
		co=co.replace(/\ +/g,"");//去掉空格
		//co=co.replace(/[ ]/g,"");    //去掉空格
		co=co.replace(/[\r\n]/g,"");//去掉回车换行			
		var vs = JSON.parse(co)
		vs.type_cv1 = 'javascript_debug';
		var vvt = $('.apitype:checked').val();

		//console.log(vs);

//提交的地址url
var url = '/'+$('.baseurl').val();

		var res = $.ajax({
//			url :  '/'+$('.baseurl').val(),
			url :  url,
			type: 'post',
			data: vs,
			dataType: "json",
			async:false,
			cache:false
		}).responseText;
		console.log(res);
		$('.resultte').text(res)
	});

</script>