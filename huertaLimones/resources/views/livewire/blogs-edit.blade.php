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
        <form wire:submit.prevent="editBlog" method="POST" enctype='multipart/form-data'>
            @csrf
            @method('PUT')
            <div class="row">
                <div class="input-field">
                    <i class="material-icons prefix">message</i>
                    <input type="text" wire:model="lists.BLOG_TITLE" id="BLOG_TITLE" placeholder="Title..." class="right validate">
                    <label for="BLOG_TITLE">Title</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <i class="material-icons prefix">edit</i>
                    <textarea class="materialize-textarea" id="BLOG_TEXT" wire:model='lists.BLOG_TEXT' placeholder="Description"></textarea>
                    <label for="BLOG_TEXT">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <i class="material-icons prefix">notes</i>
                    <input type="text" id="BLOG_DESC" wire:model='lists.BLOG_DESC' placeholder="give a quick description" class="right">
                    <label for="BLOG_DESC">description</label>
                </div>
            </div>
            <div class="row">
                <button class="btn green white-text" type="submit">
                    <i class="left material-icons">edit</i> Editar
                </button>
            </div>
        </form>
    </div>
</div>
