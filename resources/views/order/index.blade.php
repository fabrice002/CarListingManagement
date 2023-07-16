@extends('body')
@section('main')
    <div class="contact_section layout_padding">
        @if ($orders->count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="contact_taital">Affichage Annonce Commande</h1>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-hover text-center table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>N°</th>
                                <th>Voiture</th>
                                <th>Etat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="text-center">
                                    <td>{{ $i }}</td>
                                    <td><a href="{{ route('Car.detail', $order->car_id) }}"
                                            class="text-primary">{{ $order->car->title }}</a>
                                    </td>
                                    <td>
                                        @if ($order->state === 0)
                                            {{-- <i class="fa-solid fa-clock"></i> --}}
                                            <button class="btn btn-secondary">attente</button>
                                        @elseif ($order->state === 1)
                                            {{-- <i class="fa-solid fa-check"></i> --}}
                                            <button class="btn btn-success">Accepte</button>
                                        @else
                                            <button class="btn btn-warning">Refuse</button>
                                        @endif
                                    </td>
                                </tr>
                                <div class="d-none">{{ $i++ }}</div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
            </div>
            <hr>
        @endif
        @if ($cars->count() > 0)
        <hr>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="contact_taital">Affichage d'Annonce Créer</h1>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-hover text-center table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>N°</th>
                                <th>Voiture</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="d-none">{{ $i = 1 }}</div>
                            @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td> <a href="{{ route('Car.detail', $car->id) }}"
                                            class="text-primary">{{ $car->title }}</a> </td>
                                    {{-- <td><button class="btn btn-success"><i class="fa-solid fa-check"></i></button></td> --}}
                                </tr>
                                <div class="d-none">{{ $i++ }}</div>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
        @endif
        @if ($orders_user->count() > 0)
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="contact_taital">Affichage Des Demandes </h1>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>N°</th>
                                <th>Nom Acheteur</th>
                                <th>Voiture</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="d-none">{{ $i = 1 }}</div>
                            @foreach ($orders_user as $order_user)
                                <tr class="text-center">
                                    <td>{{ $i }}</td>
                                    <td>{{ $order_user->user->login }}</td>
                                    <td><a href="{{ route('Car.detail', $order_user->car_id) }}"
                                            class="text-primary">{{ $order_user->car->title }}</a></td>
                                    @if ($order_user->state == 0)
                                        <td>
                                            <form action="{{ route('Order.update', $order_user->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $order_user->id }}">
                                                <button
                                                    onclick="return confirm('Voulez-vous accepter cette offre ?')"
                                                    type="submit" name="reponse" value="valid" class="btn btn-success"><i
                                                        class="fa-solid fa-check"></i></button>
                                            </form>
                                            &ensp;
                                            <form action="{{ route('Order.update', $order_user->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{ $order_user->id }}">
                                                <button onclick="return confirm('Voulez-vous refuser cet offre ?')"
                                                    type="submit" name="reponse" value="invalid" class="btn btn-danger"><i
                                                        class="fa-solid fa-xmark"></i></button>
                                            </form>
                                        </td>
                                    @else
                                        <td> - </td>
                                    @endif
                                    {{-- <td><button class="btn btn-success"><i class="fa-solid fa-check"></i></button></td> --}}
                                </tr>
                                <div class="d-none">{{ $i++ }}</div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
