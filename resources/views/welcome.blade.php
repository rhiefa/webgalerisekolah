<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK Al Hafidz Leuwiliang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/assets/images/smk-logo.png" alt="Logo" height="74"
                    class="d-inline-block align-text-top me-3">
                <div class="profile">
                    <h4 class="my-0">SMK AL HAFIDZ LEUWILIANG</h4>
                    <p class="my-0">Maju seiring perkembangan digital</p>
                </div>
            </a>
        </div>
    </nav>
    {{-- side bar --}}

    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
           @foreach ($sliders as $slider )
           <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $loop->index }} @if ($loop->iteration == 1)" class="active" @endif aria-current="true" aria-label="Slide {{ $loop->iteration }}"></button>
           @endforeach
        </div>
        <div class="carousel-inner">
            @forelse($sliders as $slider)
                <div class="carousel-item @if($loop->iteration == 1) active @endif">
                    <img src="/images/{{ $slider->file }}" class="d-block w-100" alt="{{ $slider->title }}" style="height: 30rem; object-fit:cover;">
                    <div class="carousel-caption d-none d-md-block" style="background-color: #00000088; border-radius: 5px;">
                        <h5>{{ $slider->title }}</h5>
                    </div>
                </div>
            @empty
            <h4>TIdak ada gambar di gallery.</h4>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

        {{-- galeri kegiatan --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
