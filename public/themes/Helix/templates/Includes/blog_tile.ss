<% with $blogArticle %>

<% if $summarySize=1 %>
<div class="blog-tile grid-item">
<% else %>
<div class="blog-tile grid-item grid-item--width{$summarySize}">
<% end_if %>
    <div class="grid-sizer"></div>
        <div class="image-container">
            <a href="$Link" alt="$Title">
                <div class="image-holder" alt="$Title">
                        $SummaryImage.SetWidth(200)
                </div>
            </a>
        </div>
    <div class="note-container">
        <i class="pin"></i>
        <blockquote class="note yellow">
            $Content.Summary
            <cite class="author">$Author</cite>
        </blockquote>
    </div>

</div>
<% end_with %>
