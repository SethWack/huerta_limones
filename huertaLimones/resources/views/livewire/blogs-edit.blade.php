<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col s12 center">
                <h1 class="green-text center-align">Editar Blog</h1>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row orange lighten-5 hoverable">
            <div class="row container">
                <form action="/blog/{{$blog->BLOG_SLUG}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">message</i>
                            <input type="text" name="BLOG_TITLE" id="BLOG_TITLE" placeholder="Title..." value="{{$blog->BLOG_TITLE}}" class="right validate">
                            <label for="BLOG_TITLE">Title</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">edit</i>
                            <textarea class="materialize-textarea" name="BLOG_TEXT" id="BLOG_TEXT" placeholder="Description">{{$blog->BLOG_TEXT}}</textarea>
                            <label for="BLOG_TEXT">Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">notes</i>
                            <input type="text" name="BLOG_DESC" id="BLOG_DESC" placeholder="give a quick description" value="{{$blog->BLOG_DESC}}" class="right validate">
                            <label for="BLOG_DESC">description</label>
                        </div>
                    </div>
                    <input type="hidden" name="BLOG_IMG" id="BLOG_IMG" value="{{$blog->BLOG_IMG}}">
                    <input type="hidden" name="BLOG_SLUG" id="BLOG_SLUG" value="{{$blog->BLOG_SLUG}}">
                    <input type="hidden" name="USER_ID" id="USER_ID" value="{{$blog->USER_ID}}">
                    <div class="row">
                        <button class="btn green white-text" type="submit">
                            <i class="left material-icons">edit</i> Editar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>

