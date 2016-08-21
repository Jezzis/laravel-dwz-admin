<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="user/getAdd" target="dialog" rel="add_user"><span>添加</span></a></li>
			<li><a class="delete" href="user/del/{sid_user}" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="user/modify/{sid_user}" target="dialog" rel="modify_user"><span>编辑</span></a></li>
		</ul>
	</div>
	<table class="list" width="100%" layoutH="75">
		<thead>
			<tr>
				<th width="80">编号</th>
				<th width="120">账号</th>
				<th width="100">上次登录时间</th>
				<th width="150">注册时间</th>
			</tr>
		</thead>
		<tbody>
		@if (!empty($list))
		@foreach ($list as $user)
			<tr target="sid_user" rel="{{$user->u_id}}">
				<td>{{$user->id}}</td>
				<td>{{$user->name}}</td>
				<td>{{date('Y-m-d H:i:s', $user->created_at)}}</td>
				<td>{{date('Y-m-d H:i:s', $user->updated_at)}}</td>
			</tr>
		@endforeach
		@endif
		</tbody>
	</table>
</div>