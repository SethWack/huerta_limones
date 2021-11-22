<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col s12 center">
                <h1 class="green-text center-align">Crear Blog</h1>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row orange lighten-5 hoverable">
            @if ($errors->any())
                <div class="container red white-text">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row container">
                <form action="/blog" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">message</i>
                            <input type="text" name="BLOG_TITLE" id="BLOG_TITLE" placeholder="Title" class="right">
                            <label for="BLOG_TITLE">Title</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">edit</i>
                            <textarea class="materialize-textarea" id="BLOG_TEXT" name='BLOG_TEXT' placeholder="Description"></textarea>
                            <label for="BLOG_TEXT">Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <i class="material-icons prefix">notes</i>
                            <input type="text" id="BLOG_DESC" name='BLOG_DESC' placeholder="give a quick description" class="right">
                            <label for="BLOG_DESC">description</label>
                        </div>
                    </div>
                    <input type="hidden" value="1" name="USER_ID">
                    <input type="hidden" value="1" name="BLOG_SLUG">
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn-flat orange white-text">
                                <span><i class="left material-icons">folder_open</i>File</span>
                                <input type="file" name="BLOG_IMG">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" text="text" name="BLOG_IMG">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn green white-text" type="submit">
                            <i class="left material-icons">send</i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>

