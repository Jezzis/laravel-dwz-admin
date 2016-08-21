{{-- 菜单树 --}}
<div id="leftside">
	<div id="sidebar_s">
		<div class="collapse">
			<div class="toggleCollapse">
				<div></div>
			</div>
		</div>
	</div>
	<div id="sidebar">
		<div class="toggleCollapse">
			<h2>主菜单</h2>
			<div>收缩</div>
		</div>
		<div class="accordion" fillSpace="sidebar">

			<div class="accordionHeader">
				<h2 class="collapsable">
					<span>Folder</span>资源相关
				</h2>
			</div>
			<div class="accordionContent">
				<ul class="tree treeFolder">
					<li><a>资源管理</a>
						<ul>
							<li><a href="{{$paths['root']}}/game/list" target="navTab"
								rel="game_list">游戏列表</a></li>
							<li><a href="{{$paths['root']}}/file/list" target="navTab"
								rel="file_list">配置列表</a></li>
							<li><a href="{{$paths['root']}}/task/list" target="navTab"
								rel="sync_list">任务列表</a></li>
							<li><a href="{{$paths['root']}}/sync/list" target="navTab"
								rel="sync_list">同步列表</a></li>
						</ul>
						</li>
				</ul>
			</div>

			<div class="accordionHeader">
				<h2 class="collapsable">
					<span>Folder</span>日志相关
				</h2>
			</div>
			<div class="accordionContent">
				<ul class="tree treeFolder">
					<li><a>日志管理</a>
						<ul>
							<li><a href="{{$paths['root']}}/log/list" target="navTab"
								rel="game_list">日志列表</a></li>
						</ul>
						</li>
				</ul>
			</div>
		</div>
	</div>
</div>
{{-- 菜单树 end --}}