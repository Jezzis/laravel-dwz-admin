<div class="pageContent">
	<form method="post" action="admin/modify.do" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<input type="hidden" name="id" value="{{$user->u_id}}" />
		<input type="hidden" name="target"  value="self" />
		<input type="hidden" name="username" value="{{$user->u_name}}" />
		<div class="pageFormContent nowrap" layoutH="55">
			<div class="unit">
				<label>原密码：</label>
				<input type="password" id="oldPass" class="required" name="oldpassword" value="" size="50" />
			</div>
			<div class="unit">
				<label>新密码：</label>
				<input type="password" id="newPass" class="required" name="password"  value="" size="50" />
			</div>
			<div class="unit">
				<label>确认密码：</label>
				<input type="password" class="required" id="repassword" name="repassword"  equalto="#newPass" size="50" />
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li>
					<div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div>
				</li>
			</ul>
		</div>
	</form>
</div>