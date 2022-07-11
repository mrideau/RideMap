@extends('layouts.app')

@section('content')

    <!-- <section class="jumbotron">
    <span>Ride Map</span>
    <h1>Bienvenue</h1>
</section> -->

    <div class="container-full">
        <div class="grid grid-lg-2">
            <a href="" class="column-1">
                <div class="card" style="background-image: url('/images/placeholder.jpg');">
                    <span>Carte des</span>
                    <h3>Skate Parcs</h3>
                    <span class="btn btn-outline">Voir</span>
                </div>
            </a>
            <div class="column-1">
                <div class="card" style="background-image: url('/images/placeholder.jpg');">
                    <span>Carte des</span>
                    <h3>Skate Parcs</h3>
                    <a href="" class="btn btn-outline">Voir</a>
                </div>
            </div>
        </div>

        <section>
            @if($events->count() > 0)
                <h2 class="section-title">Prochains Évènements</h2>
                <p class="section-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, quod
                    suscipit. Sint voluptate ad sequi blanditiis porro dolore? Quia quo consectetur provident optio ab!
                    Dicta est non sapiente a autem?</p>
                <div class="grid grid-md-2 grid-lg-4">
                    <div class="column-md-2">
                        <a href="" class="card text-right justify-content-end"
                           style="background-image: url('/images/placeholder.jpg');">
                            <span>{{ $events[0]->city }}</span>
                            <h3>{{ $events[0]->title }}</h3>
                        </a>
                    </div>
                    @if($events->count() > 1)
                        <div class="column-1">
                            <a href="" class="card-small" style="background-image: url('/images/placeholder.jpg');">
                            </a>
                        </div>
                    @endif
                    @if($events->count() > 2)
                        <div class="column-1">
                            <a href="" class="card-small" style="background-image: url('/images/placeholder.jpg');">
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <p>No events</p>
            @endif
        </section>

        <section>
            <h2 class="section-title">Partenaires</h2>
            <p class="section-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex debitis
                necessitatibus, sapiente obcaecati qui nostrum iure, cum vero molestiae cumque odit quae mollitia hic.
                Tempora deserunt non sapiente iste doloremque!</p>
            <div class="grid grid-lg-2">
                <div class="column-1">
                    <div class="card">
                        <div class="card-header" style="background-image: url('/images/placeholder.jpg');"></div>
                        <div class="card-body text-center">
                            <h3 class="card-title">Lorem Ipsum</h3>
                            <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perspiciatis
                                reiciendis consequuntur ipsum accusamus quo, autem a enim animi porro dignissimos
                                inventore corrupti doloribus! Culpa illum quo sit quam quod cupiditate.</p>
                            <a href="" class="btn btn-primary">Voir</a>
                        </div>
                    </div>
                </div>
                <div class="column-1">
                    <div class="card" style="background-image: url('/images/placeholder.jpg');">
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
