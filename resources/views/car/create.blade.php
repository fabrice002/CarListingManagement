@extends('body')
@section('main')
    <div class="contact_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="contact_taital">AJOUTER UNE ANNONCE</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="contact_section_2">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('Car.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mail_section_1">
                                <div class="row">
                                    <div class="col">
                                        <label for="title">Nom Voiture</label>
                                        <input type="text" id="title"
                                            class="mail_text @error('title') is-invalid  @enderror" name="title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="sit_number">Nombre de place</label>
                                        <input type="number" min="1" class="mail_text" name="sit_number"
                                            id="sit_number" value="{{ old('sit_number') }}">
                                        @error('sit_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="brand_id">Marque</label>
                                        <select name="brand_id" id="brand_id"
                                            class="mdb-select md-form md-outline colorful-select dropdown-primary @error('brand_id') is-invalid  @enderror">
                                            <option value="" disabled selected>Sélectionner</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="color_id">Couleur</label>
                                        <select name="color_id" id="color_id"
                                            class=" form-select mdb-select md-form md-outline colorful-select dropdown-primary @error('color_id') is-invalid  @enderror">
                                            <option value="" disabled selected>Sélectionner</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->id }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('color_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="transmission">Transmission</label>
                                        <select required name="transmission" id="transmission"
                                            class="mdb-select md-form md-outline colorful-select dropdown-primary @error('transmission') is-invalid  @enderror">
                                            <option value="" disabled selected>Sélectionner</option>
                                            <option value="A">Automatique</option>
                                            <option value="M">Manuelle</option>
                                        </select>
                                        @error('transmission')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="price">Prix (en $)</label>
                                        <input type="number" required min="0" value="0"
                                            class="mail_text @error('price') is-invalid  @enderror" name="price"
                                            id="price" value="{{ old('price') }}">
                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="category_id">Categorie</label>
                                        <select required name="category_id" id="category_id"
                                            class=" form-select mdb-select md-form md-outline colorful-select dropdown-primary @error('category_id') is-invalid  @enderror">
                                            <option value="" disabled selected>Sélectionner</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="cylinder">Cylindre</label>
                                        <input required type="number" min="0" value="0"
                                            class="mail_text @error('cylinder') is-invalid  @enderror" name="cylinder"
                                            id="cylinder" value="{{ old('cylinder') }}">
                                        @error('cylinder')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="description">Description</label>
                                        <textarea required class="massage-bt @error('description') is-invalid  @enderror" rows="5" id="description"
                                            name="description">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="image_url">Photo</label>
                                        <input required type="file"
                                            class="mail_text @error('image_url') is-invalid  @enderror" name="image_url"
                                            id="image_url" accept="image/x-png,image/jpg,image/jpeg">
                                        @error('image_url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <div class="img-preview">
                                            <img src="" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="location">Localisation</label>
                                        <input type="text" class="mail_text @error('location') is-invalid  @enderror"
                                            required placeholder="Lieu où la voiture se trouve" name="location"
                                            id="location" value="{{ old('location') }}">
                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
