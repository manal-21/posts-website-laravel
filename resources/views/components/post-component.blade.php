@props(['post' => $post])

<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    <div class="row">
        <a href="{{ route('user.posts', $post->user) }}" class="black-text text-bold">{{ $post->user->username }}</a>
        <span>{{ $post->created_at->diffForHumans() }}</span>
    </div>
    <div class="row">
        <p>{{ $post->body }}</p>
    </div>
    @can('delete', $post)
        <div class="row">
            <form action="{{ route('posts', $post) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="row">
                    <button class="btn-flat btn-small waves-effect waves-light" type="submit" name="action">Delete</button>
                </div>
            </form>
        </div>
    @endcan
    <div class="row">
        @auth
            @if (!$post->likedBy(auth()->user()))
                <div class="col s1">
                    <form action="{{ route('posts.like', $post) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-floating btn-small"><i class="material-icons">thumb_up</i></button>
                        <label for="">Like</label>
                    </form>
                </div>
            @else
                <div class="col s1">
                    <form action="{{ route('posts.like', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-floating btn-small"><i class="material-icons">thumb_down</i></button>
                        <label for="">Unlike</label>
                    </form>
                </div>
            @endif
        @endauth
    </div>
    <div class="row">
        <span>
            {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count() )}}
        </span>
    </div>
</div>