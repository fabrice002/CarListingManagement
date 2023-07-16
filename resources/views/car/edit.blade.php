@extends('body')
@section('main')
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">MODIFIER UNE ANNONCE</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('Car.update', $car->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="mail_section_1">
                                <div class="row">
                                    <div class="col">
                                        <label for="title">Nom Voiture</label>
                                        <input type="text" id="title" class="mail_text" name="title"
                                            value="{{ $car->title }}">
                                    </div>
                                    <div class="col">
                                        <label for="sit_number">Nombre de place</label>
                                        <input type="number" min="1" value="{{ $car->sit_number }}"
                                            class="mail_text" name="sit_number" id="sit_number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="brand_id">Marque</label>
                                        <select name="brand_id" id="brand_id"
                                            class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option value="" disabled>Sélectionner</option>
                                            @foreach ($brands as $brand)
                                                @if ($car->brand_id == $brand->id)
                                                    <option value="{{ $brand->id }}" selected>{{ $brand->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                            {{-- <option value="Maserati">Maserati</option>
                                            <option value="Mazda">Mazda</option>
                                            <option value="Toyota">Toyota</option>
                                            <option value="Volkswagen">Volkswagen</option>
                                            <option value="Porsche">Porsche</option>
                                            <option value="Mitsubishi">Mitsubishi</option> --}}
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="color_id">Couleur</label>
                                        <select name="color_id" id="color_id"
                                            class=" form-select mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option value="" disabled>Sélectionner</option>
                                            @foreach ($colors as $color)
                                                @if ($car->color_id == $color->id)
                                                    <option value="{{ $color->id }}" selected>{{ $color->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                @endif
                                            @endforeach
                                            {{-- <option value="Bleu">Bleu</option>
                                            <option value="Gris">Gris</option>
                                            <option value="Noir">Noir</option>
                                            <option value="Rose">Rose</option> --}}
                                        </select>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="transmission">Transmission</label>
                                        <select name="transmission" id="transmission"
                                            class="mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option value="" disabled>Sélectionner</option>
                                            @if ($car->transmission == 'A')
                                                <option value="A" selected>Automatique</option>
                                                <option value="M">Manuelle</option>
                                            @else
                                                <option value="A">Automatique</option>
                                                <option value="M" selected>Manuelle</option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="price">Prix (en $)</label>
                                        <input type="number" min="0" value="{{ $car->price }}" class="mail_text"
                                            name="price" id="price">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="category_id">Categorie</label>
                                        <select name="category_id" id="category_id"
                                            class=" form-select mdb-select md-form md-outline colorful-select dropdown-primary">
                                            <option value="" disabled>Sélectionner</option>
                                            @foreach ($categories as $category)
                                                @if ($car->category_id == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="cylinder">Cylindre</label>
                                        <input type="number" min="0" value="{{ $car->cylinder }}" class="mail_text"
                                            name="cylinder" id="cylinder">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="description">Description</label>
                                        <textarea class="massage-bt" rows="5" id="description" name="description">{{ $car->description }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="image_url">Photo</label>
                                        <input type="file" class="mail_text" name="image_url" id="image_url"
                                            accept="image/x-png,image/jpg,image/jpeg"
                                            value="{{ Storage::url($car->image_url) }}">
                                    </div>
                                    <div class="col">
                                        <div class="img-preview">
                                            <img src=" {{ Storage::url($car->image_url) }} " alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="location">Localisation</label>
                                        <input type="text" class="mail_text"
                                            placeholder="Lieu où la voiture se trouve" name="location" id="location"
                                            value="{{ $car->location }}">
                                    </div>
                                </div>
                                <p class="send_bt"><button type="submit" class="btn btn-primary btn-lg"
                                        href="#">Enregistrer</button></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
