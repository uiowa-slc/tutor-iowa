<ul class="button-group stack">
    <% if $currentMemberPage.ID == $ID %>
        <li><a href="{$Link}edit" class="button info radius">Edit Your Profile</a></li>
    <% else %>
        <li><a href="{$getFeedbackLink}" class="button radius" target="_blank">Give Feedback About $FirstName</a></li>
    <% end_if %>
</ul>