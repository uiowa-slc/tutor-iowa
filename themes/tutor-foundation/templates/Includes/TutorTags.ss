<strong>Tags:</strong>

<% loop $SplitKeywords %>
	<a class="tag" href="{$BaseHref}home/SearchForm?Search={$Keyword}&action_results=Find+Tutors">$Keyword</a>
<% end_loop %>