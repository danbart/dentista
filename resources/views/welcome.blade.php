@extends('layouts.app')

@section('content')

    <!-- Header -->
    <header>
        <div class="container "  style="margin-top:40px">
            <div class="intro-text">
                <div class="intro-lead-in">Tu sonrisa nuestro compromiso</div>
                <div class="intro-heading">Clinica Dental Sarros</div>
                @if (Auth::guest())
                <a href="{{url('/register')}}" class="page-scroll btn btn-xl btn-primary ">Reservar Cita</a>
                @else
                <a href="{{url('crear-cita/'.Auth::user()->id)}}" class="page-scroll btn btn-xl btn-primary ">Reservar Cita</a>
                @endif
            </div>
        </div>
    </header>

    <!-- Services Section -->
    <section id="services">
        <div class="container-row">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Servicios</h2>
                    <h3 class="section-subheading text-muted">En sarros nos comprometemos a brindarte el mejor servicio de calidad eficaz y eficiente sin afectar tu bolsillo</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-thumbs-up"></i>
                    </span>
                    <h3 class="service-heading">Los Mejores servicios</h3>
                    <p class="text-muted">Nos ponemos a sus ordenes en el tema de reconstrucciones bucales, reconstrucciones esteticas, cirugias de extracción, extracciones de muelas, extracciones de dientes, aparatología fija, aparatos dentales, apliques ortodóncicos, frenos correctores, frenillos o brákets</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-usd"></i>
                    </span>
                    <h3 class="service-heading">Los mejores precios</h3>
                    <p class="text-muted">Todos los servicios estan al alcance de tu bolsillo, si no te alcanza pagar un servicio pregunta por nuestro plan de financiamiento que incluye cuotas de acuerdo a tu presupuesto, o por nuestro plan economico en el cual disminuimos los precios de acuerdo a tus necesidades</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="glyphicon glyphicon-user"></i>
                    </span>
                    <h3 class="service-heading">Atención personalizada</h3>
                    <p class="text-muted">Puedes reservar tu cita en linea, por medio de nuestro registro, o puedes hacer tus preguntas por medio de nuestra sección de contacto, en caso de emergencia contamos con atencion las 24 horas del día, si eres cliente frecuente pregunta por nuestra membresia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container-row">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Galeria</h2>
                    <h3 class="section-subheading text-muted">Aqui podras observar algunos de nuestros trabajos más notables, con tecnología de vanguardia a tu disposición</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/instalaciones.jpg')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Nuestras instalaciones</h4>
                        <p class="text-muted">Tecnología de punta</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/brackets2.jpg')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Brackets</h4>
                        <p class="text-muted">Brackets personalizados</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/extraccion.jpg')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Extracciónes</h4>
                        <p class="text-muted">Sin dolor</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/rayosX.jpg')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Rayos x</h4>
                        <p class="text-muted">Sin ningun riesgo</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/resonancia.jpg')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Resonancia Magnetica</h4>
                        <p class="text-muted">Nuevo servicio</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="{{asset('img/rayosX2.jpg')}}" class="img-responsive" alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Rayos x</h4>
                        <p class="text-muted">Alta definición</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about">
        <div class="container-row">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Sobre Nosotros</h2>
                    <h3 class="section-subheading text-muted">Su satisfacción es nuestro más alto interes</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="{{asset('img/about/1.jpg')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Misión</h3>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Hacer que nuestros clientes tengan una sonrisa perfecta, libre de cualquier problema </p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="{{asset('img/about/2.jpg')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Visión</h3>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">La clinica Sarros no solo trata contagiar optimismo, aunque es difícil no esbozar una sonrisa con los dientes perfectos, trata de satisfacer al cien por ciento a sus clientes</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="{{asset('img/about/3.jpg')}}" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h3>Nuestro Origen</h3>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Nacimos como una pequeña clinica en el año de 1980 cuando nuestros fundadores doña Maria Con y don Pedro Sarros pusieron una clinica en la ciudad de Quetzaltenango</p>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container-row">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nuestros doctores</h2>
                    <h3 class="section-subheading text-muted">Altamente profesionales con diferentes especialidades y capacitados en diferenes paises alrededor del mundo</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="{{asset('img/Doctor3.jpg')}}" class="img-responsive img-circle" alt="">
                        <h4>Alfonso Port</h4>
                        <p class="text-muted ">Cirugano Dental</p>
                        <ul class="list-inline">
                           <li><a><img class="redes" src="{{asset('img/facebook-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes" src="{{asset('img/twitter-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes" src="{{asset('img/instagram-4-32.png')}}"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="{{asset('img/Doc2.jpg')}}" class="img-responsive img-circle" alt="">
                        <h4>Mary Jane Watson</h4>
                        <p class="text-muted">Cirugana General</p>
                        <ul class="list-inline social-buttons">
                             <li><a><img class="redes" src="{{asset('img/facebook-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes" src="{{asset('img/twitter-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes" src="{{asset('img/instagram-4-32.png')}}"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="team-member">
                       <img src="{{asset('img/Doc1.jpg')}}" class="img-responsive img-circle" alt="">
                        <h4>Peter Parke</h4>
                        <p class="text-muted">Cirugano Especializado</p>
                        <ul class="list-inline social-buttons">
                             <li><a><img class="redes" src="{{asset('img/facebook-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes" src="{{asset('img/twitter-4-32.png')}}"></a>
                            </li>
                            <li><a><img class="redes" src="{{asset('img/instagram-4-32.pn')}}g"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Los doctores que se pueden observar tienen a su vez a su cargo otros doctores que juntos forman la familia de clinica dental Sarros</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients Aside -->


    <!-- <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contactanos</h2>
                    <h3 class="section-subheading text-muted">Esccribenos sera un gusto resolver tus dudas</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Tu nombre*" id="name" required="" data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Correo Electronico *" id="email" required="" data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" placeholder="Telefono*" id="phone" required="" data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Mensaje*" id="message" required="" data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Enviar mensaje</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> -->


    <!-- <script src="js/bootstrap.js"></script>﻿ -->

    <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/jquery-1.11.0.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/bootstrap.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/classie.js"></script>
        <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/cbpAnimatedHeader.js"></script>

        <!-- Contact Form JavaScript -->
        <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/jqBootstrapValidation.js"></script>
        <script src="https://raw.githubusercontent.com/IronSummitMedia/startbootstrap/gh-pages/templates/agency/js/contact_me.js"></script>


    <span style="height: 20px; width: 40px; min-height: 20px; min-width: 40px; position: absolute; opacity: 0.85; z-index: 8675309; display: none; cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAUCAYAAAD/Rn+7AAADU0lEQVR42s2WXUhTYRjHz0VEVPRFUGmtVEaFUZFhHxBhsotCU5JwBWEf1EWEEVHQx4UfFWYkFa2biPJiXbUta33OXFtuUXMzJ4bK3Nqay7m5NeZq6h/tPQ+xU20zugjOxR/+7/O8539+5znnwMtNTExwJtMb3L/fiLv3botCSmUjeCaejTOb39AiFothfHxcFIrHY8RksZjBsckJcOIRMfFsHD/SsbExUYpnI8DR0dGUGjSb0byhEJp5Uqg5CTSzc2CQleJbMEj9/ywBcGRkJEk9DQqouEVQT1sK444yWI9UonmTjGqauVLEIlHa9x8lAMbj8SSpp0rwKGMVvg8P46vbg0C7na8z8JsMcgHe7jlEa+edRhiLy8n/TUMfu6EvLElk+U0WtGwrTrdfAGQf5J8iiK4LVzDU28t8JtMSocf8E+l68myaNFXm/6rXslLK7ay5TOunuRvZWpJuvwAYjUaTpOIWoquuAZ219RTaxKYp9BbjycoN5FvL9qH9TBX5rvoGdJythvXYSTxdtRnWylO/ZdqrLsGwszzhWQ593z2KlAwCYCQSSZJ6ehZ0W7bD9VBLgN0NCqr3qR7R2rBrL3pu3Sb/7nDlz2uy6cG0OXk0GTbZXzNp8trsPAQdTj6frlWzN2DcXZGKQQAMh8NJ6rpyHe+PnkCr/CAFdZyvpfpjuvkifLF9wIt1Wwlo0OHie1RvWrKa93RjzfzliTzPKz3ltB0/Tevmwp14wGUgHAzSOoUEwFAolFaaBSuhnslPRkJexUJtZ6v5HtUeLswl33n1BgEY5fvhs9sJ3FAiT+QYyyvoAQJuD0KBAFRTJNAuz5/s3gJgMBhMJwrVFRThM5tY5zUF/A4X1f2fvQTRLCuBreoim0YmAbqNJryvPEXeeq46kaNdkQ/1HCncbJKPs9ZSv2VHGfWsZ2hfkhKAfr8/pdxWKx4wwD69PmVfNSOL+lr2w+gYqHpWDtXt1xQ8AMlWU0e1lqLd/APRHoP8AJqWrQG9gYxcPMsvSJUvAA4MDKTUJ7MZLaVy8v+qT21tcDx/OemePr0RTkNrur4A6PP5xCgBsL+/X4wiQDpuuVxOeL1eMYmYeDY6sOp0z+B0OuHxeEQhxkJMFosJiSO/UinOI/8Pc+l7KKArAT8AAAAASUVORK5CYII=);"></span>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
