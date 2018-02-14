@include('header', ['title' => 'SINGLE'])
<main role="main" class="inner cover">
    <div class="blog-post">
        <h2 class="blog-post-title">{{$single->title}}</h2>
        <p class="blog-post-meta">{{$single->date}}</p>
        <p><span>
                {{$single->content}}
        </span> </p>
        @auth
        <a role="button" class="btn btn-link" href={{Route('all')}}>Back</a>
        @else
        <a role="button" class="btn btn-link" href={{Route('index')}}>Back</a>
        @endauth
    </div>
        <hr class="line">
        <p>Comments:</p>
    @foreach ($comments as $c)

    <p class="comments">
        {{$c->content}}
    </p>
    <p class="comments commentsNameDate">
        {{$c->name}},
        {{$c->date}},
        @auth
        <a href="{{route('comment-delete', $c->id)}}" style="color: red">Delete this comment</a>
        @endauth
    </p>
        @endforeach

    <form method="post" action="{{route('comment-created',$single->id)}}">

        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="Name">Name</label>
            <input name="name" type="text" class="form-control" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Your comment</label>
            <textarea name="content" rows="4" cols="50" class="form-control" placeholder="Enter your comment"></textarea>
        </div>
        <button type="submit" class="btn btn-light">Enter</button>
    </form>
</main>


@include('footer')