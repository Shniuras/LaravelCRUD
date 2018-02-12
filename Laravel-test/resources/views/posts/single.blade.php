@include('header', ['title' => 'SINGLE'])
<main role="main" class="inner cover">
    @foreach ($single as $s)
    <div class="blog-post">
        <h2 class="blog-post-title">{{$s->title}}</h2>
        <p class="blog-post-meta">{{$s->date}}</p>
        <p><span>
                {{$s->content}}
        </span> </p>
        <a role="button" class="btn btn-link" href={{Route('all')}}>Back</a>
    </div>
    @endforeach
        <p>Comments:</p>
    @foreach ($comments as $c)
    <hr class="line">
    <p class="comments">
        {{$c->content}}
    </p>
    <p class="comments commentsNameDate">
        {{$c->name}},
        {{$c->date}}
    </p>
        @endforeach
        @foreach ($single as $s)
    <form method="post" action="{{route('comment-created',$s->id)}}">
        @endforeach
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="Name">Name</label>
            <input name="commentName"type="text" class="form-control" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Your comment</label>
            <textarea name="comment" rows="4" cols="50" class="form-control" placeholder="Enter your comment"></textarea>
        </div>
        <button type="submit" class="btn btn-light">Enter</button>
    </form>
</main>


@include('footer')