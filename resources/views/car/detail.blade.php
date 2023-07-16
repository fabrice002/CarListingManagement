@extends('body')
@section('main')
    <div class="gallery_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-3"><a href="{{ url()->previous() }}" role="button" class="btn btn-primary">Revenir En
                            Arriere</a></div>
                </div>
                <div class="col-md-12">
                    <h1 class="gallery_taital">Details</h1>
                </div>
            </div>
            <div class="gallery_section_2 mt-4">
                <div class="row">
                    <div class="col-6">
                        <div class="gallery_box details_page border border-top-0 border-left-0 border-bottom-0">
                            <div class="gallery_img"><img src="{{ Storage::url($car->image_url) }}"></div>
                            <h3 class="types_text mb-5">{{ $car->title }}</h3>
                            <div class="container">
                                <div class="row">
                                    @auth
                                        @if (Auth::user()->id == $car->user_id)
                                            <div class="col-3"><a href="{{ route('Car.edit', $car->id) }}" role="button"
                                                    class="btn btn-primary"> <i class="fa fa-edit" aria-hidden="true"></i> </a>
                                            </div>

                                            <div class="col-3">
                                                <form action="{{ route('Car.destroy', $car->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Voulez vous supprimer cet annonce ?')"><i
                                                            class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        @endif

                                        <div class="col-3 text-center">
                                            @if (Auth::user()->id != $car->user_id)
                                                <form action="{{ route('Order.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                                                    <button type="submit" class="  btn btn-success"
                                                        onclick="return confirm('Voulez vous ajouter cet annonce à votre panier ?')"><i
                                                            class="fa-solid fa-cart-plus"></i></button>
                                                </form>
                                                @if (session('status') === 'order-create')
                                                    <p x-data="{ show: true }" x-show="show" x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-lg text-gray-600 dark:text-gray-400">
                                                        {{ __('Enregistrer.') }}
                                                    </p>
                                                @elseif (session('status') === 'order-refuse')
                                                    <p x-data="{ show: true }" x-show="show" x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-lg text-danger-600 dark:text-gray-400">{{ __('Refuser.') }}
                                                    </p>
                                                @elseif (session('status') === 'order-exist')
                                                    <p x-data="{ show: true }" x-show="show" x-transition
                                                        x-init="setTimeout(() => show = false, 2000)"
                                                        class="text-lg text-danger-600 dark:text-gray-400">{{ __('Existe.') }}
                                                    </p>
                                                @endif
                                            @endif
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 bg-primary text-white">
                        <div class="gallery_box bg-primary details_page">
                            <div class="row">
                                <div class="col font-weight-bold text-right price">$ <span class="value">
                                        {{ $car->price }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Nom Voiture</div>
                                <div class="col">{{ $car->title }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Marque</div>
                                <div class="col">{{ $car->brand->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Couleur</div>
                                <div class="col">{{ $car->color->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Transmission</div>
                                <div class="col">
                                    @if ($car->transmission == 'A')
                                        Automatique
                                    @else
                                        Manuelle
                                    @endif
                                </div>
                                {{-- Automatique --}}
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Catégorie</div>
                                <div class="col">{{ $car->category->name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Nombre de place</div>
                                <div class="col">{{ $car->sit_number }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Cylindre</div>
                                <div class="col">{{ $car->cylinder }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Localisation</div>
                                <div class="col">{{ $car->location }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Description</div>
                                <div class="col">{{ $car->description }}</div>
                            </div>
                            <div class="row">
                                <div class="col-4 font-weight-bold">Date de publication</div>
                                <div class="col">{{ $car->created_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
