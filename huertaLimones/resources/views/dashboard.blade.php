<x-app-layout>
    <x-slot name="header">
        <div class="background-image grey">
            <div class="row valign-wrapper">
                <div class="col s12 hide-on-med-and-up center-align">
                    <h3 class="">
                        <a href="{{ route('dashboard') }}" class="white-text">
                            <i class="material-icons">grass</i>
                            Huerta Limones
                        </a>
                    </h3>
                    <h4 class="white-text center-align">
                        {{__('Bienvenidos!')}}
                    </h4>
                </div>
                <div class="col s12 center-align hide-on-small-and-down">
                    <h2 class="white-text center-align ">
                        {{ __('Bienvenidos!') }}
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row">
            <div class="col m4 l4 hide-on-small-and-down z-depth-3 blue white-text">
                twitter
            </div>
            <div class="col s12 m8 l6 z-depth-3">
                mainpage
            </div>
            <div class="col l2 hide-on-med-and-down">

            </div>
        </div>
        <div class="row">
            <div class="col s12 hide-on-med-and-up center">
                twitter
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="fixed-action-btn toolbar">
                    <a class="btn-floating btn-large green right">
                        <i class="material-icons large">message</i>
                    </a>
                    <ul>
                        <li><a class="green darken-1"><i class="material-icons">bird</i></a></li>
                        <li><a class="green darken-2"><i class="material-icons">whatsapp</i></a></li>
                        <li><a class="green darken-3"><i class="material-icons">facebook</i></a></li>
                        <li><a class="green darken-4"><i class="material-icons">email</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, {
            toolbarEnabled: true
        });
    });
</script>