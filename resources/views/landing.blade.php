@extends("layouts.home")
@section("content")
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Connectez-vous maintenant pour voir votre tableau de bord </h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Suivez vos absences et congés très simplement vous devez
                        seulement connecter</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{route('login')}}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            @guest
                                <span>Se connecter</span>
                                @else
                                <span>acceder a tableau de board</span>
                                @endguest

                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/imgs/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

@endsection