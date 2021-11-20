<div>
    @guest
    @else
            @if (Auth::user()->id == 1 && Auth::user()->admin == True)
                <a class="btn-flat deep-orange darken-3 white-text" href="{{route('make')}}">Make Blog</a>
            @endif
    @endguest
    <div class="container red white-text">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
                <li>{{$messages}}</li>
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
                            @if(Auth::user()->id == 1 && Auth::user()->admin == True)
                                <form method="GET" action="{{route('blogs-edit')}}">
                                    <input type="hidden" value="{{$blog->id}}" id="ids" name="ids" />
                                    <button class="btn-flat deep-orange white-text right" type="submit">Edit</button>
                                </form>
                                <button class="btn-flat red white-text right" wire:click="delBlogs({{$blog->id}})">delete</button>
                            @endif
                    @endguest
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
