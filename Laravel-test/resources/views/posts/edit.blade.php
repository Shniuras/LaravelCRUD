@include('header', ['title' => 'EDIT'])
<main role="main" class="inner cover">
    @foreach ($edit as $e)
        <div class="blog-post">
            <h2 class="blog-post-title">{{$e->title}}</h2>
            <p class="blog-post-meta">{{$e->date}}</p>
            <p><span>
                {{$e->content}}
        </span> </p>
            <hr class="line">
        </div>

<form method="post" action="{{route('update',$e->id)}}">
    @endforeach
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="Name">Title</label>
        <input type="text" name="title" class="form-control" placeholder="Edit your title" value="{{$e->title}}">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="text" class="form-control" type="text" name="date" value="{{$e->date}}">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Your content</label>
        <textarea rows="4" cols="50" name="content" class="form-control" placeholder="Edit your content">{{$e->content}}</textarea>
    </div>
    <button type="submit" class="btn btn-light">Update</button>
    <a role="button" class="btn btn-link" href={{Route('all')}}>Back</a>
</form>
</main>
@include('footer')