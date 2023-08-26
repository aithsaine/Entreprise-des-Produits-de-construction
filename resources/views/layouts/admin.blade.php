<!DOCTYPE html>
<html lang="en" class="">

<head>
    @vite('resources/css/app.css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content={{csrf_token()}}>
    <title>{{env("APP_NAME","rab sal")}} - Administration</title>
    <!-- Tailwind is included -->
    <link rel="stylesheet" href="{{ asset('./assets/css/main.css?v=1628755089081') }}">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
    <meta name="description" content="Admin One - free Tailwind dashboard">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&family=Merriweather:wght@700&family=Roboto+Mono:ital@1&display=swap"
        rel="stylesheet">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-130795909-1');
    </script>
    <style>
        * {
            font-family: 'Bricolage Grotesque', sans-serif;
            font-family: 'Merriweather', serif;
            font-family: 'Roboto Mono', monospace;
        }
        aside,#navbar-main{
            background-color: black !important;
            color: white
        }
    </style>
</head>

<body>
    <div id="app">

         <nav id="navbar-main" class="navbar is-fixed-top">
            <div class="navbar-brand">
                <a class="navbar-item mobile-aside-button" href="">
                    <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
                </a>
                
            </div>
<form action="{{route('logout')}}" id="lg-form" method="post">@csrf</form>
            <div class="-menu" id="navbar-menu">
                <a class="navbar-item cursor-pointer" onclick="document.getElementById('lg-form').submit()">
                    <span class="icon"><i class="mdi mdi-logout"></i></span>
                </a>
            </div>
        </nav> 

        <aside class="aside is-placed-left is-expanded">
            <div class="p-4">
                <div class="flex items-center p-4">
                    <img width="50" class="mt-2" src={{ asset('assets/imgs/logo.png') }} alt=""> <b
                        class="font-black flex text-center text-sky-200 p-4 ">RAB SAL</b>
                </div>
            </div>
            <div class="menu is-menu-main ">
                <p class="menu-label">General</p>
                <ul class="menu-list">
                    <li class="">
                        <a href={{route('admin.dashboard')}}>
                            <span class="icon"><i class="mdi mdi-chart-bar"></i>
                            </span>
                            <span class="menu-item-label">Tableau de bord</span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label">Client</p>
                <ul class="menu-list">
                    <li class="">
                        <a href={{ route('admin.clients.index') }}>
                            <span class="icon"><i class="mdi mdi-account"></i></span>
                            <span class="menu-item-label">List des Client</span>
                        </a>
                    </li>
                    <li class="">
                        <a href={{ route('admin.client.create') }}>
                            <span class="icon"><i class="mdi mdi-account-multiple-plus"></i>
                            </span>
                            <span class="menu-item-label">Ajouter Client</span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label">Produits</p>
                <ul class="menu-list">
                    <li class="">
                        <a href={{ route('admin.products.index') }}>
                            <span class="icon"><i class="mdi mdi-basket"></i></span>
                            <span class="menu-item-label">Les Produits</span>
                        </a>
                    </li>
                    <li class="">
                        <a href={{ route('admin.products.create') }}>
                            <span class="icon"><i class="mdi mdi-plus-circle"></i></span>
                            <span class="menu-item-label">Ajouter Produits</span>
                        </a>
                    </li>
                </ul>
                <p class="menu-label">Commande</p>
                <ul class="menu-list">
                    <li class="">
                        <a href={{ route('admin.commande.index') }}>
                            <span class="icon"><i class="mdi mdi-table"></i></span>
                            <span class="menu-item-label">Les Commande</span>
                        </a>
                    </li>

                </ul>
                <p class="menu-label">Payments</p>
                <ul class="menu-list">
                    <li class="">
                        <a href={{ route('admin.payments.index') }}>
                            <span class="icon"><i class="mdi mdi-cash"></i>                            </span>
                            <span class="menu-item-label">Les Payment</span>
                        </a>
                    </li>

                </ul>

            </div>
        </aside>
    @yield('content')
    </div>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src={{ asset('assets/js/main.min.js?v=1628755089081') }}></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript" src={{ asset('assets/js/chart.sample.min.js') }}></script>


    <script>
        // Open the modal when the trigger button is clicked
        const modalTrigger = document.querySelector('[data-modal-target="#modal"]');
        const modal = document.querySelector('#modal');
        const close = document.getElementById("close")
        if (modalTrigger) {

            modalTrigger.addEventListener('click', () => {
                modal.classList.remove('hidden');
            });
        }

        // Close the modal when the user clicks outside of it
        if (close) {

            close.addEventListener('click', event => {
                modal.classList.add('hidden');
            });
        }
        let closeBtn = document.getElementById("close-alert");
        let success_alert = document.getElementById("success-alert")
        let fail_alert = document.getElementById("fail-alert")
        if (closeBtn) {
            if (success_alert) {

                closeBtn.addEventListener("click", function() {
                    success_alert.style.display = "none";
                });
            } else {

                closeBtn.addEventListener("click", function() {
                    fail_alert.style.display = "none";
                });
            }
        }
    </script>
    @yield('script')

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->

</body>

</html>
