<tr>
	<td><%= obj.book_id %></td>
	<td><%= obj.title %></td>
	<td><%= obj.author %></td>
	<td><%= obj.category %></td>
	<td>
	  <img src="/image/photo/<%= obj.photo %>" alt="Book Photo" width="70" height="70">
    </td>
	<td>
	 <a href="/image/attachment/<%= obj.attachment %>" target="_blank">Download Book</a>
	</td>
	<td><a class="btn btn-success"><%= obj.avaliable %></a></td>
	<td><a class="btn btn-inverse"><%= obj.total_books %></a></td>
</tr>