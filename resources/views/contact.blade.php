@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<div class="jumbotron">
    <h1>Contact</h1>
</div>

<div class="container">
    <div class="grid grid-md-2">
        <div class="column-1">
            <h2>Un avis ? Une idée ?<br>Ou simple retrouver sur nos réseaux sociaux ?</h2>
            <p>Depuis 2022 <b>RIDE-MAP</b> a pour objectif de proposer la meilleure expérience possible pour référencer les lieux et les événements autour des sports de glisse. C’est grâce aux retours que fait la communauté qu’il est possible de maintenir à jour et assurer la qualité des informations que nous fournissons.</p>
            <hr class="spacer">
            <h2>Vous êtes un professionnel ?</h2>
            <p>Chez <b>RIDE-MAP</b> nous pensons que la collaboration entre les différents acteurs dans le milieu ubrain est primordiale. Si vous souhaitez simplement vous renseigner ou nous proposer un projet, n’hésitez pas à prendre contact. Notre equipe sera ravis de vous répondre.</p>
            <hr class="spacer">
        </div>
        <div class="column-1">
            <form action="" method="post">
                <div class="grid grid-2">
                    <div class="column">
                        <label class="form-label required" for="surname">Nom</label>
                        <input class="form-input" type="text" id="surname">
                    </div>
                    <div class="column">
                        <label class="form-label required" for="name">Prénom</label>
                        <input class="form-input" type="text" id="name">
                    </div>
                </div>
                <label class="form-label required" for="email">Email</label>
                <input class="form-input" type="text" id="email">
                <label class="form-label required" for="object">Objet</label>
                <input class="form-input" type="text" id="object">
                <label class="form-label required" for="message">Message</label>
                <textarea class="form-input" name="" id="" cols="30" rows="10"></textarea>
                <input class="btn btn-primary float-right" type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>

@endsection
