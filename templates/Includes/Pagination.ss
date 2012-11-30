<% if Products.MoreThanOnePage %>
	<div class="pagination">
	  <ul>
	  
	    <% if Products.NotFirstPage %>
	      <li>
	        <a href="$Products.PrevLink"><% _t('Pagination.PREVIOUS','Prev') %></a>
	      </li>
	    <% end_if %>

	    <% control Products.PaginationSummary %>
	  		<% if CurrentBool %>
	  			<li class="active"><a href="$Link">$PageNum</a></li>
	  		<% else %>
	  			<% if Link %>
	  				<li><a href="$Link">$PageNum</a></li>
	  			<% else %>
	  				<li class="disabled"><span>...</span></li>
	  			<% end_if %>
	  		<% end_if %>
	    <% end_control %>
	    
	    <% if Products.NotLastPage %>
	      <li>
	        <a href="$Products.NextLink"><% _t('Pagination.NEXT','Next') %></a>
	      </li>
	    <% end_if %>
	  </ul>
	</div>
<% end_if %>
