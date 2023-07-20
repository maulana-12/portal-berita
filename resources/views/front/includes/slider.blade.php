<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            @foreach ($slide as $key => $row)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key==0?'active':'' }}" aria-label="Slide {{ $key+1 }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner" style="background-color: black">
            @foreach ($slide as $key => $row)
                <div class="carousel-item {{ $key==0?'active':'' }}">
                    <img src="{{ asset('uploads/'.$row->image) }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
