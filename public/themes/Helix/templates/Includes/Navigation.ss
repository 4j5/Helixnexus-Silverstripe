<div  id="navigation-container">
	<nav class="primary">
		<span class="nav-open-button"></span>
		<ul>
			<% loop $Menu(1) %>
				<li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
			<% end_loop %>
		</ul>
	</nav>
</div>
