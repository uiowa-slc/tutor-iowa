<%--<li>
	<a href="$Link" class="profile-image"><img src="http://lorempixel.com/500/500/" /></a>
	<h3><a href="$Link">$Title</a></h3>
	$Content.Summary(10)
</li>--%>
<li>
<div class="row">
	<div class="small-3 columns push-9">
		<a href="$Link" class="profile-image">
		<%--<img src="{$ThemeDir}/images/placeholder.jpg" /> --%>
		<img src="http://lorempixel.com/g/300/300/" />
		
		</a>
	</div>
	<div class="small-9 columns pull-3">
		<h4><a href="$Link">$Title</a></h4>$Content.Summary(10)
	</div>
</div>
</li>