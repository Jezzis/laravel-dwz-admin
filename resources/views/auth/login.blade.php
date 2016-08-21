<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>Laravel - DWZ - Admin</title>
<link rel="stylesheet" href="{{$paths['css']}}/style.css" />
<!--[if IE 6]>
    <script src="{{$paths['js']}}/DD_belatedPNG.js"></script>
    <script type="text/javascript">
      DD_belatedPNG.fix('#login');
    </script>
  <![endif]-->

<script type="text/javascript" src="{{$paths['js']}}/jquery.min.js"></script>
</head>
<body style="background: #fff;"
	onload="document.getElementById('email').focus();">
	<div class="loginmain">
		<div id="login">
			<div class="logbox">
				<form action="javascript:void(0);" method="post" onsubmit="return false;">
					{!! csrf_field() !!}
					<p class="logh">
						<span>账号：</span> <input id="email" class="required" type="text"
							size="38" name="email" />
						<p id="tip_email" class="cue"></p>
					</p>
					<p class="logh">
						<span>密码：</span> <input id="password" class="required"
							type="password" size="38" name="password" />
						<p id="tip_password" class="cue"></p>
					</p>
					<p class="logh">
						<input type="submit" class="dlbtn" name="button"
							id="submit_button" value="" />
					</p>
				</form>
			</div>
			<div id="login_footer" style="margin-top: 100px;"></div>
		</div>
	</div>
	<div class="login_logo">
		<div class="logobg"></div>
	</div>
	</div>
	<div class="banner"></div>
	</div>
	<script type="text/javascript">
		function autoHeight() {
			if (window.innerHeight) {//FF
				nowHeight = window.innerHeight;
			} else {
				nowHeight = document.documentElement.clientHeight;
			}
			var jianHeight = 0;
			if (nowHeight > jianHeight) {
				document.getElementById('login').style.height = nowHeight
						- jianHeight + 'px';
			} else {
				document.getElementById('login').style.height = jianHeight
						+ 'px';
			}
		}
		autoHeight();
		window.onresize = autoHeight;

		$(document).ready(function() {
			$("#email").blur(function() {
				if ($("#tip_email").val() == '') {
					checkEmail(true);
				}
			});
			$("#password").blur(function() {
				if ($("#tip_password").val() == '') {
					checkPassword(true);
				}
			});
			$("#submit_button").click(function() {
				if ($("#email").val() == '') {
					$("#tip_email").html("<img src='{{$paths['pic']}}/i1.gif' align='absmiddle'/>请输入登录账号");
					$("#tip_email").show();
					return;
				}
				if ($("#password").val() == '') {
					$("#password").html("<img src='{{$paths['pic']}}/i1.gif' align='absmiddle'/>请输入登录密码");
					$("#password").show();
					return;
				}

				$.ajax({
					async : false,
					url : "{{$paths['root']}}/auth/login",
					type : "POST",
					dataType : "json",
					data : { email : $("#email").val(), password : $("#password").val(), _token : $("input[name='_token']").val()},
					timeout : 15000,
					success : function(json) {
						if (json.statusCode != "200") {
							if (json.message == "账户名不存在") {
								$("#tip_email").html("<img src='{{$paths['pic']}}/i1.gif' align='absmiddle'/>" + json.message);
								$("#tip_email").show();
								return;
							}

							if (json.message == "账户名或密码错误") {
								$("#tip_password").html("<img src='{{$paths['pic']}}/i1.gif' align='absmiddle'/>" + json.message);
								$("#tip_password").show();
								return;
							}
						}
						window.location.href = "{{$paths['root']}}/";
					},
					error : function(xhr) {
						$( "#submit_button").show();
						alert("访问出错（请检查您的网络环境）。");
					}
				});
			});
		});

		function checkEmail(isAsync) {
			$("#tip_email").html("");
			$("#tip_email").hide();
			var email = $.trim($("#email").val());
			var result = true;
			if (email.length == 0) {
				$("#tip_email").html("<img src='{{$paths['pic']}}/i1.gif' align='absmiddle'/>请输入登录账号");
				$("#tip_email").show();
				return false;
			}
		}

		function checkPassword(isAsync) {
			$("#tip_password").html("");
			$("#tip_password").hide();
			var password = $.trim($("#password").val());
			var result = true;
			if (password.length == 0) {
				$("#tip_password")
						.html(
								"<img src='{{$paths['pic']}}/i1.gif' align='absmiddle'/>请输入登录密码");
				$("#tip_password").show();
				return false;
			}
			return result;
		}
	</script>
</body>
</html>