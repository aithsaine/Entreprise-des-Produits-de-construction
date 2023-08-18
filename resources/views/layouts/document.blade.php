<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <header>
        <div class="aside-tools">
            <div class="flex items-center">
                <img width="50" class="mt-2" src={{asset("assets/imgs/logo.png")}} alt=""> <b class="font-black flex text-center text-sky-200">EL AZZOUZI FER SARL</b>
            </div>
        </div>
    </header>
    <section>
        @yield("content")
    </section>
</body>
</html>