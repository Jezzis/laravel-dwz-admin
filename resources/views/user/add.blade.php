<div class="pageContent">
	<form method="post" action="user/add" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
		<div class="pageFormContent nowrap" layoutH="55">
			<div class="unit">
				<label>账号：</label>
				<input type="text" id="uName" name="uName" class="required"  value="" />
			</div>
			<div class="unit">
				<label>密码：</label>
				<input type="password" id="uPassword" name="uPassword" class="required"  value="" maxlength="100" minlength="6" size="50" />
			</div>
			<div class="unit">
				<label>确认密码：</label>
				<input type="password" id="repassword" name="repassword" class="required" equalto="#uPassword" value="" maxlength="100" size="50" />
			</div>
			<div class="unit">
				<label>角色：</label>
				<select name="uRId" id="type" class="select" style="width:60px">
				<%foreach from=$roleList item=role%>
					<option value="<%$role->rId%>"><%$role->rName%></option>
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