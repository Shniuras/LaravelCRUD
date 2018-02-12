@include('header', ['title' => 'CREATE'])
<form method="post" action="{{route('store')}}">
    {{--{!! csrf_field() !!}--}}
    {{--Tas pats kas csrf_field--}}
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label>Title</label>
        <input type="text" class="form-control" name="title" placeholder="Enter your name" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label>Your content</label>
            <textarea rows="4" cols="50" class="form-control" name="content" placeholder="Enter your comment">{{old('content')}}</textarea>
    </div>
    <button type="submit" class="btn btn-light">Submit</button>
    <a role="button" class="btn btn-link" href={{Route('all')}}>Back</a>
    @if ($errors->any())
        <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
        </div>
    @endif
</form>
@include('footer')