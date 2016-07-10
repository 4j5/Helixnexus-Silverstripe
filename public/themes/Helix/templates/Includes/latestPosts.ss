<div class="post-container">
    <% loop $posts %>
        <% include blog_tile blogArticle=$Me %>
    <% end_loop %>
</div>
