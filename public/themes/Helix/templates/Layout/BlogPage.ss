<div class="contents">
      <div class="page-header">
        <h1>$Title</h1>
      </div>

      <div class="blog_page_content grid">
          <div class="blog-control-container">
            <% loop $PaginatedArticles %>
                <% include blog_tile blogArticle=$Me %>
            <% end_loop %>
          </div>
      </div>

  <div class="pagination_navigation">
    <% if $PaginatedArticles.MoreThanOnePage %>
        <% if $PaginatedArticles.NotFirstPage %>
            <a class="prev" href="$PaginatedArticles.PrevLink"><p>Prev</p></a>
        <% end_if %>
        <% loop $PaginatedArticles.Pages %>
            <% if $CurrentBool %>
                <p>$PageNum</p>
            <% else %>
                <% if $Link %>
                    <a href="$Link"><p>$PageNum</p></a>
                <% else %>
                    ...
                <% end_if %>
            <% end_if %>
        <% end_loop %>
        <% if $PaginatedArticles.NotLastPage %>
            <a class="next" href="$PaginatedArticles.NextLink"><p>Next</p></a>
        <% end_if %>
    <% end_if %>
  </div>

</div>
<script src="{$ThemeDir}/assets/javascript/masonry.pkgd.min.js"></script>
<script src="{$ThemeDir}/assets/javascript/load-masonry.js"></script>
