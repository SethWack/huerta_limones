<div>
    @guest
    @else
        @foreach ($users as $user)
            @if ($user->id == 1 && $user->admin == True)
                <a class="btn-flat deep-orange darken-3 white-text" href="{{route('make')}}">Make Blog</a>
            @endif

        @endforeach
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
                    <img class="activator" src="{{Storage::disk('blogs')->url($blog->BLOG_IMG)}}" alt="">
                </div>
                <div class="card-content">
                    <span class="card-title activator deep-orange-text">{{$blog->BLOG_TITLE}}<i class="material-icons right">more_vert</i></span>
                    <span>{{$blog->BLOG_DESC}}</span>
                    <a class="btn-flat white deep-orange-text" href="">See More</a>
                </div>
                <div class="card-reveal">
                    <span class="card-title deep-orange-text">{{$blog->BLOG_TITLE}}<i class="material-icons right">close</i></span>
                    <span class="green-text">By:
                        @foreach ($users as $user)
                            @if ($user->id == $blog->USER_ID)
                                @if ($user->name == 'ADMIN1')
                                    Huerta Limones
                                @else
                                    {{$user->name}}
                                @endif
                            @endif
                        @endforeach
                    </span>
                    <p>{{$blog->BLOG_TEXT}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
