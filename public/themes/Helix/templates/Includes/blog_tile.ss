<% with $blogArticle %>
<div class="blog-tile">
    <a href="$Link" >
        <div class="image_holder">
            $SummaryImage.SetSize(200,150)
        </div>
    </a>
    <h3>$Title</h3>
    <p>
        $Content.Summary
    </p>
</div>
<% end_with %>
