<div>
    @guest
    @else
        @if (Auth::user()->admin == 1)
            <a href="/blog/create" class="btn-flat deep-orange white-text">
                Create Blog
            </a>
        @endif
    @endguest
    <div class="container red white-text">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @foreach ($blogs as $blog)
        <div class="row">
            <div class="card small hoverable light-green lighten-5">
                <div class="card-image waves-effect waves-block waves-green">
                    <img class="materialboxed" src="{{asset('images/'.$blog->BLOG_IMG)}}" alt="">
                </div>
                <div class="card-content">
                    <span class="card-title activator deep-orange-text">{{$blog->BLOG_TITLE}}<i class="material-icons right">more_vert</i></span>
                    <p>{{$blog->BLOG_DESC}}</p>
                    @guest
                    @else
                    @endguest
                </div>
                <div class="card-reveal">
                    <span class="card-title deep-orange-text">{{$blog->BLOG_TITLE}}<i class="material-icons right">close</i></span>
                    <span class="green-text">By:
                        @foreach ($users as $user)
                            @if ($user->id == $blog->USER_ID)
                                @if ($user->id == 1)
                                    HUERTA LIMON
                                @else
                                    {{$user->name}}
                                @endif
                            @endif
                        @endforeach
                    </span>
                    <p>{{$blog->BLOG_TEXT}}</p>
                </div>
                <div class="card-action">
                    @guest
                    @else
                        @if (Auth::user()->admin == 1)
                            <a href="/blog/{{$blog->BLOG_SLUG}}/edit" class="btn-flat green white-text right">Edit</a>
                            <form action="/blog/{{$blog->BLOG_SLUG}}" method="POST">
                            @csrf
                            @method('delete')
                                <button class="btn-flat red white-text right">Delete</button>
                            </form>
                        @endif
                    @endguest
                </div>
            </div>

        </div>
    @endforeach
</div>
