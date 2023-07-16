$("#fetchForm").submit(function (e) {
    e.preventDefault();
    // console.log("ok");
    let color_id = document.getElementById('color_id').value;
    let category_id = document.getElementById('category_id').value;
    let brand_id = document.getElementById('brand_id').value;
    let route_t = document.getElementById('route_t').innerHTML;
    let _token = $("input[name=_token]").val();
    // console.log(route_t);
    if (brand_id == '') {
        brand_id = 0;
    }
    if (category_id === '') {
        category_id = 0;
    }
    if (color_id === '') {
        color_id = 0;
    }
    let recherche_affiche = document.getElementById('recherche_affiche');
    $.ajax({
        type: "GET",
        url: route_t,
        data: {
            _token: _token,
            brand_id: brand_id,
            category_id: category_id,
            color_id: color_id
        },
        beforeSend: function () {
            var html = '<h1 class="text-danger text-center"> En attente </h1>'
            recherche_affiche.innerHTML=html;
            console.log("en attente");
        },
        success: function (response) {
            console.log(response);
            console.log(response.length);
            recherche_affiche.innerHTML = "";
            let title_image = document.getElementById('title_image');
            title_image.innerHTML = ""
            $('#title_image').append('\
                <h1 class="gallery_taital">Resultat de votre Recherche</h1>');
            // $(recherche_affiche).append('<div class="row">');
            if(response.length === 0){
                var html='<div class="col-12"> <h1 class="text-center "> Aucune Annonce correspondante </h1> </div>';
                $(recherche_affiche).append(html);
            }
            $.each(response, function (key, data) {
                var imagePath = "/storage/" + data.image_url;
                var html = '\
            <div class="col-md-4">\
                <div class="gallery_box">\
                    <div class="gallery_img"><img src="' + imagePath + '"></div>\
                    <h3 class="types_text">' + data.title + '</h3>\
                    <p class="looking_text">$' + data.price + '</p>\
                    <div class="read_bt"><a href="/Car/'+data.id +'"><i class="fa-solid fa-eye"></i></a></div>\
                </div>\
            </div>';
                $(recherche_affiche).append(html);
                // console.log(data.description);


            });
            // $(recherche_affiche).append('</div></div>');
            /* recherche_affiche.innerHTML = "";
            $(recherche_affiche).append('<div class="row">\
            <div class="col-md-12">\
                <h1 class="gallery_taital">Resultat de votre Recherche</h1>\
            </div>\
            </div>');

            $(recherche_affiche).append(

            ); */



        }
    });



});
