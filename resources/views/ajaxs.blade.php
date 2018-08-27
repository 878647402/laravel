<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<title>Ajax post</title>
	<script type="text/javascript" src="/static/js/jquery-1.8.3.min.js"></script>
</head>
<body>
	<button>post获取Ajax响应数据</button>

</body>
<script type="text/javascript">
	//用jquery类库将token字符串写入到请求的标头里
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
	});
	// alert($);
	//获取按钮 表单单击事件
	$("button").click(function(){
		//普通post请求
		$.post("/doajaxs",{},function(data){
			alert(data);
		});
	});
</script>	
</html>