@include('header', ['title' => 'BLOG'])
@include('navbar')
    <main role="main" class="inner cover">
        @foreach($posts as $post)
            <h2 class="blog-post-title"> {{ $post->title }} </h2>
            <p class="blog-post-meta"> {{$post->date}} </p>
            <div class="hiddentext">{{$post->content}}</div>
            <a role="button" class="btn btn-link" href={{Route('single')}}>Read More</a>
            <a role="button" class="btn btn-link" href={{Route('edit')}}>Edit</a>
            <a role="button" class="btn btn-link" href={{Route('delete')}}>Delete</a>
            <hr class="line">
        @endforeach
    </main>
@include('footer')
