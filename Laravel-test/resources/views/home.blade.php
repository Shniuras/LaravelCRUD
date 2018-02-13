@include('header', ['title' => 'BLOG'])
@include('navbar')

@foreach($postai as $d)
    <main role="main" class="inner cover">
        <div class="blog-post">
            <h2 class="blog-post-title">{{$d->title}}</h2>
            <p class="blog-post-meta">{{$d->date}}</p>
            <p>{{$d->content}}</p>
            <a role="button" class="btn btn-link" href={{Route('single',$d->id)}}>Read More</a>
            @auth
            <a role="button" class="btn btn-link" href={{Route('edit',$d->id)}}>Edit</a>
            <a role="button" class="btn btn-link" href={{Route('delete',$d->id)}}>Delete</a>
            @endauth
            <hr class="line">
        </div>
    </main>
@endforeach
<div>
    @for($i=1; $i<$postai->count(); $i++)
        <a role="button" class="btn btn-outline-light" href="{{Route('index','page=' . $i)}}">{{$i}}</a>
    @endfor
</div>
@include('footer')
