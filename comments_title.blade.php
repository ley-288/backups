<style>

    .panel-post .post-comment .comment-info span.date{
        font-style:normal;
    }

    #comment_margin_left{
        margin-left:10px;
    }

    #loadOverlay{display: none;}

</style>

<p id="comment_margin_left" class="text-muted">
    <small>
        @if($post->getCommentCount() > 0)
            @if($post->getCommentCount() > 1)
            <a class="all_comments" href="{{ url('/post/'.$post->id) }}"><p style="font-size:16px; margin-left:10px;">{{ $post->getCommentCount() }} @lang('applicazione.commenti')</p></a>
            @else
            <a class="all_comments" href="{{ url('/post/'.$post->id) }}"><p style="font-size:16px; margin-left:10px;">{{ $post->getCommentCount() }} @lang('applicazione.commento')</p></a>
            @endif
        @else
            <p style="font-size:16px; margin-left:10px;" class="text-muted">0 @lang('applicazione.commenti')</p>
        @endif
    </small>
</p>


