@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<div class="jumbotron">
    <h1>Contact</h1>
</div>

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{--                    <button type="button" class="close" data-dismiss="alert">×</button>--}}
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="grid grid-md-2">
        <div class="column-1">
            <h2>Un avis ? Une idée ?<br>Ou simplement envie de nous dire bonjour ?</h2>
            <p>Depuis 2022 <b>RIDE-MAP</b> a pour objectif de proposer la meilleure expérience possible pour référencer les lieux et les événements autour des sports de glisse. C’est grâce aux retours que fait la communauté qu’il est possible de maintenir à jour et d'assurer une qualité optimale des informations que nous fournissons.</p>
            <hr class="spacer">
            <h2>Vous êtes un professionnel ?</h2>
            <p>Chez <b>RIDE-MAP</b> nous pensons que la collaboration entre les différents acteurs dans le milieu urbain est primordiale. Si vous souhaitez nous contacter pour simplement vous renseigner ou pour nous proposer un projet, n’hésitez pas. Notre équipe sera ravie de vous répondre.</p>
            <hr class="spacer">
        </div>
        <div class="column-1">
            <form action="{{url('contact/send')}}" method="post">
                @csrf
                <div class="grid grid-2">
                    <div class="column">
                        <label class="form-label required" for="lastname">Nom</label>
                        <input class="form-input" type="text" name="lastname" id="lastname">
                    </div>
                    <div class="column">
                        <label class="form-label required" for="firstname">Prénom</label>
                        <input class="form-input" type="text" name="firstname" id="firstname">
                    </div>
                </div>
                <label class="form-label required" for="email">Email</label>
                <input class="form-input" type="text" name="email" id="email">
                <label class="form-label required" for="subject">Objet</label>
                <input class="form-input" type="text" name="subject" id="subject">
                <label class="form-label required" for="message">Message</label>
                <textarea class="form-input" name="message" id="message" cols="30" rows="10"></textarea>
                <input class="btn btn-primary float-right" type="submit" value="Envoyer">
            </form>
            <p><span class="color-primary">*</span> champs obligatoires.</p>
        </div>
    </div>
</div>

@endsection
