@extends('layouts.app')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div id="myCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block" src="{{asset('img/pets.jpg')}}" />
            <div class="container">
                <div class="carousel-caption">
                    <h1>{{__("La importancia de nuestras mascotas")}}</h1>
                    <p>{{__("No hay nada más importante que el bienestar de tus mascotas. Con nuestra aplicación, podrás tener un registro completo de sus necesidades y cuidados.")}}</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block" src="{{asset('img/vaccines.jpg')}}" />
            <div class="container">
                <div class="carousel-caption">
                    <h1>{{__("La salud importa")}}</h1>
                    <p>{{__("¿Sabías que la mayoría de las enfermedades en mascotas se pueden prevenir con un buen seguimiento de su salud? Nuestra aplicación te ayuda a hacer precisamente eso.")}}</p>
                    <!--<p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>-->
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block" src="{{asset('img/food.jpg')}}" />
            <div class="container">
                <div class="carousel-caption">
                    <h1>{{__("Seguimiento de rutinas")}}</h1>
                    <p>{{__("Desde la hora de la comida hasta los paseos diarios, nuestra aplicación de seguimiento de mascotas hace que sea fácil mantener a tus mascotas felices y saludables.")}}</p>
                    <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{__("Anterior")}}</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">{{__("Siguiente")}}</span>
    </button>
</div>

<div class="points bg-light">
    <div class="row">
        <div class="col-lg-4 exposition">
            <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#61C791" class="bi bi-phone" viewBox="0 0 16 16">
                <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
            <h2 class="fw-normal m-4">{{__("Comodidad y facilidad de uso")}}</h2>
            <p class="text-center">{{__("La aplicación permite a los usuarios registrar fácilmente los datos de sus mascotas, incluyendo su historial médico, rutina de comidas y paseos. Además, se pueden establecer recordatorios para citas veterinarias, vacunas y otros eventos importantes.")}}</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 exposition">
            <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#61C791" class="bi bi-capsule" viewBox="0 0 16 16">
                <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
            </svg>
            <h2 class="fw-normal m-4">{{__("Seguimiento de la salud")}}</h2>
            <p class="text-center">{{__("La aplicación permite a los usuarios hacer un seguimiento completo de la salud de sus mascotas, incluyendo registro de enfermedades, medicamentos y otros cuidados médicos. También se pueden ver gráficos de tendencias de salud para ayudar a detectar problemas potenciales.")}}</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4 exposition">
            <svg xmlns="http://www.w3.org/2000/svg" width="140" height="140" fill="#61C791" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
            </svg>
            <h2 class="fw-normal m-4">{{__("Personalización")}}</h2>
            <p class="text-center">{{__("La aplicación permite a los usuarios personalizar la información de sus mascotas y establecer preferencias de recordatorios. Además, se pueden agregar varias mascotas a la aplicación para hacer un seguimiento de todas ellas en un solo lugar.")}}</p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div>
<!--<div class="container marketing">
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
            <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
        </div>
        <div class="col-md-5">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
            <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
        </div>
        <div class="col-md-5 order-md-1">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
        </div>
    </div>
    <hr class="featurette-divider">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
        </div>
        <div class="col-md-5">
            <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/><text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text></svg>
        </div>
    </div>
    <hr class="featurette-divider">
</div>-->
@endsection

@section('javascript')
<script>
    const myCarouselElement = document.querySelector('#myCarousel')

const carousel = new bootstrap.Carousel(myCarouselElement, {
  interval: 2000,
  touch: false
})
</script>
@endsection
