@extends('ura.layouts.base')

@section('mainContent')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-8 col">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <h4 class="pill-welcome">Dashboard di {{ $user->name }} {{ $user->surname }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8 col">
            <h4 class="accent">Novità</h4>
            <p class="p-margin">Da oggi è possibile visualizzare le statistiche! Visualizza il tuo appartamento e vedi
                l’andamento generale del tuo appartamento. Sei a corto di views? Scegli uno dei nostri pacchetti
                sponsor. Puoi scegliere tra 3 tariffe diverse, tutte economiche ma estremamente efficienti per vivere
                un’estate senza pensieri. Pensa a tutto BoolBnB!</p>
        </div>
    </div>
</div>
@endsection
