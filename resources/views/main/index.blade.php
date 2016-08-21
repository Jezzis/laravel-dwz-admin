<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=7" />
		<title>游戏配置管理平台</title>
		<!-- css -->
		<link href="{{$paths['cpn']}}/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="{{$paths['cpn']}}/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="{{$paths['cpn']}}/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
		<link href="{{$paths['cpn']}}/dwz/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
		<link rel="shortcut icon" href="${$paths.root}/favicon.ico" type="image/x-icon" />
		<!--[if IE]>
		<link href="{{$paths['cpn']}}/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
		<![endif]-->

		<!-- javascript -->
		<!--[if lte IE 9]>
		<script src="{{$paths['cpn']}}/dwz/js/speedup.js" type="text/javascript"></script>
		<![endif]-->
		<script src="{{$paths['cpn']}}/dwz/js/jquery-1.7.2.min.js" type="text/javascript"></script>
		<script src="{{$paths['cpn']}}/dwz/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="{{$paths['cpn']}}/dwz/js/jquery.validate.js" type="text/javascript"></script>
		<script src="{{$paths['cpn']}}/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>
		<script src="{{$paths['cpn']}}/dwz/xheditor/xheditor-1.2.1.min.js" type="text/javascript"></script>
		<script src="{{$paths['cpn']}}/dwz/xheditor/xheditor_lang/zh-cn.js" type="text/javascript"></script>
		<script src="{{$paths['cpn']}}/dwz/uploadify/scripts/jquery.uploadify.min.js" type="text/javascript"></script>

		<script src="{{$paths['cpn']}}/dwz/bin/dwz.min.js" type="text/javascript"></script>
		<script src="{{$paths['cpn']}}/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(function(){
			DWZ.init("{{$paths['cpn']}}/dwz.frag.xml", {
				loginUrl:"user/goLoginDialog", loginTitle:"登录",	// 弹出登录对话框
		//		loginUrl:"login.html",	// 跳到登录页面
				statusCode:{ok:200, error:300, timeout:301}, //【可选】
				keys: {statusCode:"statusCode", message:"message"}, //【可选】
				pageInfo:{pageNum:"pageNum", numPerPage:"numPerPage", orderField:"orderField", orderDirection:"orderDirection"}, //【可选】
				debug:false,	// 调试模式 【true|false】
				ui:{hideMode:'offsets'},
				callback:function(){
					initEnv();
					$("#themeList").theme({themeBase:"{{$paths['cpn']}}/dwz/themes"});
				}
			});
		});
		</script>
	</head>

	<body scroll="no">
		<div id="layout">
			<div id="header">
				<div class="headerNav">
					<!-- <img class="logo" src="" style="width:200px; height:50px;" /> -->
					<ul class="nav">
						<li> <a href="javascript:void(0);">当前账户： {{-- $logined.userName --}}</a></li>
						<li> <a href="user/modify/{{-- $logined.userId --}}" target="dialog">修改密码</a></li>
						<li> <a href="user/logout">退出</a></li>
					</ul>
					<ul class="themeList" id="themeList">
						<li theme="default"><div class="selected">蓝色</div></li>
						<li theme="green"><div>绿色</div></li>
						<li theme="red"><div>红色</div></li>
						<li theme="purple"><div>紫色</div></li>
						<li theme="silver"><div>银色</div></li>
						<li theme="azure"><div>天蓝</div></li>
					</ul>
				</div>
			</div>

			{{-- 菜单 start --}}
			@include('main.menu')
			{{-- 菜单 end --}}

			<div id="container">
				<div id="navTab" class="tabsPage">
					<div class="tabsPageHeader">
						<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
							<ul class="navTab-tab">
								<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
							</ul>
						</div>
						<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
						<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
						<div class="tabsMore">more</div>
					</div>
					<ul class="tabsMoreList">
						<li><a href="javascript:;">我的主页</a></li>
					</ul>
					<div class="navTab-panel tabsPageContent layoutBox">
						<div class="page unitBox">
							<div class="accountInfo">
								<p><span>Egret游戏配置转换工具</span></p>
								<p>开发者: songzj &nbsp;&nbsp;(有问题，欢迎吐槽至songzj@egret-labs.org)</p>
							</div>
							<div class="pageFormContent" layout="80">
								<h2>游戏配置转换工具:</h2>
								<div class="unit">多种Excel文档导入支持(Excel2003, 2007, 2010+)</div>
								<div class="unit">Excel文档导入多标签页支持</div>
								<div class="unit">Excel公式计算支持</div>
								<div class="unit">多种导出格式支持(json, php, plist)</div>
								<div class="unit">文档内多种数据类型支持(int, float, string, json)</div>
								<div class="unit">导出结构自定义(对象，索引，数组，排序)</div>
								<div class="unit">数据版本控制</div>
								<div class="unit">角色权限管理以及操作日志</div>
								<div class="divider"></div>
								<h2><span style='color:red'>[新增]</span>自定义数据类型:</h2>
								<pre style="margin:5px;line-height:1.4em">
a. [carr]一维数组:			"d,e,f" => {"d","e","f"}
b. [carr2]二维数组:			"d1,d2:e1,e2:f1,f2" => [["d1","d2"],["e1","e2"],["f1","f2"]]
c. [cobj]对象:				"d:1,e:2,f:3" => {"d":1,"e":2,"f":3}
d. [carr_obj]一维对象数组:		"d:1;e:2;f:3" => [{"d":1},{"e":2},{"f":3}]
								</pre>
								<h2>常见问题以及解决方案：</h2>
								<pre style="margin:5px;line-height:1.4em">
一、一键上传或者上传报错
a. 请注意excel文档格式：第一行字段名，第二行字段类型定义，第三行字段说明，第四行开始数据
b. 字段类型定义：目前仅支持int, float, string, boolean, json五种
c. 数据：请严格按照该列所定义的数据类型填写数据，比如json列有非json格式数据都会导致上传失败

二、导出数据结构不对
 请注意导出格式：需要选择字段，结构，对于多标签页的excel文档一定需要选择【带标签页】
								</pre>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div id="footer">Copyright &copy; 2015 <a href="http://www.egret-labs.org">Egret</a></div>

	</body>
</html>