<div class="pageContent">
	<form method="post" action="user/modify" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<input type="hidden" name="uId" value="<%$user->uId%>" />
		<div class="pageFormContent nowrap" layoutH="55">
			<div class="unit">
				<label>账号：</label>
				<input type="hidden" id="uName" name="uName" class="required"  value="<%$user->uName%>" /><%$user->uName%>
			</div>
			<div class="unit">
				<label>密码：</label>
				<input type="password" id="uPassword" name="uPassword" class=""  value="" maxlength="100" minlength="6" size="50" />
			</div>
			<div class="unit">
				<label>确认密码：</label>
				<input type="password" id="repassword" name="repassword" class="" equalto="#uPassword" value="" maxlength="100" size="50" />
			</div>
			<div class="unit">
				<label>角色：</label>
				<select name="uRId" id="uRId" class="select" style="width:60px">
				<%foreach from=$roleList item=role%>
					<option value="<%$role->rId%>" <%if $user->uRId == $role->rId%>selected<%/if%>><%$role->rName%></option>
				<%/foreach%>
				</select>
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