<x-app-layout>
    <x-slot name="header">
        <div class="container white">
            <h2 class="deep-orange-text center-align">
                {{ __('Welcome!') }}
            </h2>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="container row">
            <div class="col m4 l4 hide-on-small-and-down z-depth-3 blue white-text">
                twitter
            </div>
            <div class="col s12 m8 l6 z-depth-3">
                mainpage
            </div>
            <div class="col l2 hide-on-med-and-down">

            </div>
        </div>
        <div class="container row">
            <div class="col s12 hide-on-med-and-up center">
                twitter
            </div>
        </div>
        <div class="container row">
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