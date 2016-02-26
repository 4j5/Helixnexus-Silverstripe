<header class="header" role="banner">
	<div id="header-inner-container">

			<a href="$BaseHref" class="brand" rel="home">
				<h1 id="header-title">$SiteConfig.Title</h1>
				<% if $SiteConfig.Tagline %>
				<p id="tag-line">$SiteConfig.Tagline</p>
				<% end_if %>
			</a>

			<% if $SearchForm %>
				<span id="search-dropdown-icon">L</span>
				<div id="search-bar">
					$SearchForm
				</div>
			<% end_if %>

			<% include Navigation %>
	</div>
</header>
