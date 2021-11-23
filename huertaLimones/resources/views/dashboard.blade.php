<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col s12 hide-on-small-and-down green darken-4">
                <div class="row">
                    <h1 class="white-text center-align">Comprar Limones</h1>
                    <div class="col s12 deep-orange carousel carousel-slider z-depth-3 center">
                        <div class="carousel-fixed-item center">
                            <button class="btn-flat light-green black-text waves-effect waves-green" href="/store">Comprar</button>
                        </div>
                        <div class="carousel-item green">
                            <img class="responsive-img" src="https://cdn.pixabay.com/photo/2021/05/05/18/06/lemon-6231697_960_720.jpg" alt="">
                        </div>
                        <div class="carousel-item orange">
                            <img class="responsive-img" src="https://cdn.pixabay.com/photo/2017/03/10/15/15/lime-2133091_960_720.jpg" alt="">
                        </div>
                        <div class="carousel-item light-green">
                            <img class="responsive-img" src="https://cdn.pixabay.com/photo/2017/12/15/15/39/food-3021263_960_720.jpg" alt="">
                        </div>
                        <div class="carousel-item deep-orange">
                            <img class="responsive-img" src="https://cdn.pixabay.com/photo/2018/09/22/01/03/tangerine-3694369_960_720.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 hide-on-med-and-up">
                <div class="row light-green lighten-5">
                    <div class="col s12 carousel carousel-slider z-depth-3 center">
                        <div class="carousel-fixed-item center">
                            <a class="btn-flat light-green black-text waves-effect waves-green" href="/store">Comprar</a>
                        </div>
                        <div class="carousel-item">
                            <img class="" height="600px" src="https://cdn.pixabay.com/photo/2021/05/05/18/06/lemon-6231697_960_720.jpg" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="" height="600px" src="https://cdn.pixabay.com/photo/2017/03/10/15/15/lime-2133091_960_720.jpg" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="" height="600px" src="https://cdn.pixabay.com/photo/2017/12/15/15/39/food-3021263_960_720.jpg" alt="">
                        </div>
                        <div class="carousel-item">
                            <img class="" height="600px" src="https://cdn.pixabay.com/photo/2018/09/22/01/03/tangerine-3694369_960_720.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <x-slot name="slot">
        <div class="row container">
            <div class="col m6 hide-on-small-and-down z-depth-3 blue white-text">
                @livewire('twitter')
            </div>
            <div class="col s12 m6 z-depth-3">
                @if (session()->has('message'))
                    <div class="container row yellow grey-text darken-3">
                        <p class="center-align white-text">
                            {{session()->get('message')}}
                        </p>
                    </div>
                @endif
                @livewire('blogs')
            </div>
            <div class="col"></div>
        </div>
        <div class="row container">
            <div class="col s12 hide-on-med-and-up blue center">
                @livewire('twitter')
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