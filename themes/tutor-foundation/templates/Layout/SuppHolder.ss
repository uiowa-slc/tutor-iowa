
<!--<div class="page-bg"></div>-->
<div class="gradient">

	<div class="main typography" role="main">
	
		<div class="row" data-equalizer>
			<div class="large-8 columns content" data-equalizer-watch>
				<div class="white-cover"></div>
				<div class="row">
					<article class="large-10 large-centered columns end">
						$Breadcrumbs
						<h1>$Title</h1>
						<% include FindHelpSearch %>
						$Content
						$Form
					</article>
				</div>
				<div class="row">
					<div class="large-12 columns">
						<ul class="resource-card-list">
						<% loop $Children.Sort("Title") %>
							<% include ResourceCard %>
						<% end_loop %>
						</ul>
					</div>
				</div>
			</div>
			<div class="large-4 columns end" data-equalizer-watch>
					<% include SideNav %>
			</div>
		
		</div>
	</div>
</div>