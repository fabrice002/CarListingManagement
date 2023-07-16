 @extends('body')
 @section('main')
     <div class="banner_section layout_padding">
         <div class="container">
             <div class="row">
                 <div class="col-md-6">
                     <div id="banner_slider" class="carousel slide" data-ride="carousel">
                         <div class="carousel-inner">
                             <div class="carousel-item active">
                                 <div class="banner_taital_main">
                                     <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span>
                                     </h1>
                                     <p class="banner_text">There are many variations of passages of Lorem Ipsum
                                         available, but the majority</p>
                                     <div class="btn_main">
                                         <div class="contact_bt"><a href="#">Read More</a></div>
                                         <div class="contact_bt active"><a href="#">Contact Us</a></div>
                                     </div>
                                 </div>
                             </div>
                             <div class="carousel-item">
                                 <div class="banner_taital_main">
                                     <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For You</span>
                                     </h1>
                                     <p class="banner_text">There are many variations of passages of Lorem Ipsum
                                         available, but the majority</p>
                                     <div class="btn_main">
                                         <div class="contact_bt"><a href="#">Read More</a></div>
                                         <div class="contact_bt active"><a href="#">Contact Us</a></div>
                                     </div>
                                 </div>
                             </div>
                             <div class="carousel-item">
                                 <div class="banner_taital_main">
                                     <h1 class="banner_taital">Car Rent <br><span style="color: #fe5b29;">For
                                             You</span></h1>
                                     <p class="banner_text">There are many variations of passages of Lorem Ipsum
                                         available, but the majority</p>
                                     <div class="btn_main">
                                         <div class="contact_bt"><a href="#">Read More</a></div>
                                         <div class="contact_bt active"><a href="#">Contact Us</a></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
                             <i class="fa fa-angle-left"></i>
                         </a>
                         <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
                             <i class="fa fa-angle-right"></i>
                         </a>
                     </div>
                 </div>
                 <div class="col-md-6">
                     <div class="banner_img"><img src="{{ asset('assets/image/banner-img.png') }}"></div>
                 </div>
             </div>
         </div>
     </div>
     <!-- banner section end -->
     <div class="search_section">

         <div class="container">
             <span id="route_t" class="d-none route_t">{{ route('Car.show') }}</span>
             <form action="{{ route('Car.show') }}" id="fetchForm" method="get">
                 @csrf
                 <div class="row">
                     <div class="col-md-12">
                         <h1 class="search_taital">Cherchez votre meilleur voiture</h1>
                         <!-- select box section start -->
                         <div class="container">
                             <div class="select_box_section">
                                 <div class="select_box_main">
                                     <div class="row">
                                         <div class="col-md-3 select-outline">
                                             <select class="mdb-select md-form md-outline colorful-select dropdown-primary"
                                                 name="category_id" id="category_id">
                                                 <option value="" disabled selected>catégorie</option>
                                                 @foreach ($categories as $category)
                                                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="col-md-3 select-outline">
                                             <select class="mdb-select md-form md-outline colorful-select dropdown-primary"
                                                 name="brand_id" id="brand_id">
                                                 <option value="" disabled selected> marque</option>
                                                 @foreach ($brands as $brand)
                                                     <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="col-md-3 select-outline">
                                             <select class="mdb-select md-form md-outline colorful-select dropdown-primary"
                                                 name="color_id" id="color_id">
                                                 <option value="" disabled selected> couleur</option>
                                                 @foreach ($colors as $color)
                                                     <option value="{{ $color->id }}">{{ $color->name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                         <div class="col-md-3">
                                             <div class="search_btn"><button type="submit"
                                                     class="btn btn-primary">Recherche</button></div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- select box section end -->
                     </div>
                 </div>
             </form>
         </div>
     </div>
     {{-- <form action="{{ route('Car.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="file" name="file" id="file">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> --}}
     <!-- gallery section start -->
     <div class="gallery_section layout_padding">
         <div class="container">
             <div class="row">
                 <div class="col-md-12" id="title_image">
                     <h1 class="gallery_taital">Nos Voitures</h1>
                 </div>
             </div>
             <div class="gallery_section_2">
                 <div class="row" id="recherche_affiche">
                     @foreach ($cars as $car)
                         <div class="col-md-4">
                             <div class="gallery_box">
                                 <div class="gallery_img"><img src="{{ Storage::url($car->image_url) }}"></div>
                                 <h3 class="types_text">{{ $car->title }}</h3>
                                 <p class="looking_text">$ {{ $car->price }} </p>
                                 <div class="read_bt"><a href="{{ route('Car.detail', $car->id) }}"><i class="fa-solid fa-eye"></i></a></div>

                             </div>
                         </div>
                     @endforeach
                     {{-- <div class="col-md-4">
                         <div class="gallery_box">
                             <div class="gallery_img"><img src="{{ asset('assets/image/img-2.png') }}"></div>
                             <h3 class="types_text">Toyota car</h3>
                             <p class="looking_text">Start per day $4500</p>
                             <div class="read_bt"><a href="#">Book Now</a></div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="gallery_box">
                             <div class="gallery_img"><img src="{{ asset('assets/image/img-3.png') }}"></div>
                             <h3 class="types_text">Toyota car</h3>
                             <p class="looking_text">Start per day $4500</p>
                             <div class="read_bt"><a href="#">Book Now</a></div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="gallery_box">
                             <div class="gallery_img"><img src="{{ Storage::url('dossier/1687500296.png') }}"></div>
                             <h3 class="types_text">Toyota car</h3>
                             <p class="looking_text">Start per day $4500</p>
                             <div class="read_bt"><a href="#">Book Now</a></div>
                         </div>
                     </div> --}}

                 </div>
             </div>
             {{-- <div class="gallery_section_2">
                 <div class="row">
                     <div class="col-md-4">
                         <div class="gallery_box">
                             <div class="gallery_img"><img src="{{ asset('assets/image/img-1.png') }}"></div>
                             <h3 class="types_text">Toyota car</h3>
                             <p class="looking_text">Start per day $4500</p>
                             <div class="read_bt"><a href="#">Book Now</a></div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="gallery_box">
                             <div class="gallery_img"><img src="{{ asset('assets/image/img-2.png') }}"></div>
                             <h3 class="types_text">Toyota car</h3>
                             <p class="looking_text">Start per day $4500</p>
                             <div class="read_bt"><a href="#">Book Now</a></div>
                         </div>
                     </div>
                     <div class="col-md-4">
                         <div class="gallery_box">
                             <div class="gallery_img"><img src="{{ asset('assets/image/img-3.png') }}"></div>
                             <h3 class="types_text">Toyota car</h3>
                             <p class="looking_text">Start per day $4500</p>
                             <div class="read_bt"><a href="#">Book Now</a></div>
                         </div>
                     </div>
                 </div>
             </div> --}}
         </div>
     </div>
     <!-- gallery section end -->
     <!-- footer section start -->
     <div class="footer_section layout_padding">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="footeer_logo"><img src="{{ asset('assets/image/logo.png') }}"></div>
                 </div>
             </div>
             <div class="footer_section_2">
                 <div class="row">
                     <div class="col">
                         <h4 class="footer_taital">Nous Contactez</h4>
                         <div class="location_text"><a href="#"><i class="fa fa-map-marker"
                                     aria-hidden="true"></i><span class="padding_left_15">Yaoundé</span></a></div>
                         <div class="location_text"><a href="#"><i class="fa fa-phone"
                                     aria-hidden="true"></i><span class="padding_left_15">(+237) 675223694</span></a>
                         </div>
                         <div class="location_text"><a href="#"><i class="fa fa-envelope"
                                     aria-hidden="true"></i><span class="padding_left_15">demo@gmail.com</span></a>
                         </div>
                         <div class="social_icon">
                             <ul>
                                 <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                 <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     {{-- <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                     <span id="route_t" class="d-none route_t">{{ route('Car.show') }}</span>
                     <form action="{{ route('Car.show') }}" id="fetchForm" method="get" class="row">
                         @csrf
                         <div class="col-lg-3 col-md-6 col-sm-6">
                             <label for="" class="form-label">Catégories</label>
                             <select name="category_id" id="category_id" class="form-select">
                                 <option value="">Sélectionner un champ</option>
                                 @foreach ($categories as $category)
                                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-lg-3 col-md-6 col-sm-6">
                             <label for="" class="form-label">Marque</label>
                             <select name="brand_id" id="brand_id" class="form-select">
                                 <option value="">Sélectionner un champ</option>
                                 @foreach ($brands as $brand)
                                     <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-lg-3 col-md-6 col-sm-6">
                             <label for="" class="form-label">Couleur</label>
                             <select name="color_id" id="color_id" class="form-select">
                                 <option value="">Sélectionner un champ</option>
                                 @foreach ($colors as $color)
                                     <option value="{{ $color->id }}">{{ $color->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                         <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                             <button type="submit" class="btn btn-primary">Recherche</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                     <div class="card shadow" style="width: 18rem;">
                         <div class="card-body">
                             <h5 class="card-title">Card title</h5>
                             <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                             <p class="card-text">Some quick example text to build on the card title and make up
                                 the bulk of the card's content.</p>
                             <br>
                             <a href="#" class="card-link">Card link</a>
                             <a href="#" class="card-link">Another link</a>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div> --}}
 @endsection
 @section('script')
     <script src="{{ asset('assets/js/recherche.js') }}"></script>
 @endsection
