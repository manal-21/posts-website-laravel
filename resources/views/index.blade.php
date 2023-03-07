@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col s8 offset-s2">
            <div class="container">
                <div class="card-panel grey lighten-4">
                    <div class="row">
                        <form class="col s12" action="{{ route('post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    
                                    <label>Textarea</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="body" name="body" class="materialize-textarea"></textarea>
                                    
                                </div>
                            </div>
                            <div class="row center">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Post</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="divider grey lighten-1"></div>
                    </div>
                    <div class="row">
                        <h5>Posts</h5>
                    </div>
                    @if ($posts->count())
                        @foreach ($posts as $post)
                            <x-post-component :post="$post"/>
                        @endforeach

                        <ul class="pagination">
                            <!-- {{-- Previous Page Link --}} -->
                            @if ($posts->onFirstPage()) 
                                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                            @else
                                <li class="waves-effect"><a href="{{ $posts->previousPageUrl() }}"><i class="material-icons">chevron_left</i></a></li>
                            @endif

                            <!-- {{-- Page Number Links --}} -->
                            @for($i=1; $i<=$posts->lastPage(); $i++)
                                @if($i==$posts->currentPage())
                                    <li class="active"><a href="?page={{$i}}">{{$i}}</a></li>
                                @else
                                    <li class="waves-effect"><a href="?page={{$i}}">{{$i}}</a></li>
                                @endif
                            @endfor

                            <!-- {{-- Next Page Link --}} -->
                            @if ($posts->hasMorePages())
                                <li class="waves-effect"><a href="{{ $posts->nextPageUrl() }}"><i class="material-icons">chevron_right</i></a></li>
                            @else
                                <li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                            @endif
                        </ul>
                    @else
                        <div class="row">
                            <p>There are no posts yet. <br> Be the frist to post!</p>
                        </div>
                    @endif
                </div>
            </div> 
        </div>
    </div>
    
@endsection