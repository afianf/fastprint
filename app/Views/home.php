<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
      .card a::after {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 100%;
  z-index: 2;
}
  </style>
  </head>
  <body>
    <h1 class="visually-hidden">Tokoku</h1>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand d-flex gap-2" href=".">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                  <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                </svg>
                Tokoku
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse gap-2" id="navbarSupportedContent">
                <a href="./admin" class="btn btn-outline-light ms-auto">
                    Halaman Admin
                </a>
                <form data-bs-theme="light" class="d-flex" role="search" action="/fastprint/home/search">
                    <input class="form-control me-2" type="search" name="q" placeholder="Cari sesuatu"
                        aria-label="Search">
                    <button class="btn btn-light" type="submit">
                        Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <div id="carouselExample" data-bs-theme="dark" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2024/7/22/6d79d227-67fe-497a-a904-af990882e2ee.jpg"
                    class="d-block w-100" alt="slide 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.tokopedia.net/img/cache/1208/NsjrJu/2025/1/8/9d652b24-1fa0-4e7b-a921-b70787506e1d.jpg.webp"
                    class="d-block w-100" alt="slide 2">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mx-auto p-4">
        <h2>Produk Baru</h2>
        <p>menampilkan <?= count($products) ?> barang</p>
        <div class="row">
            <?php foreach ($products as $product) :?>
            <div class="col-12 col-md-6 col-lg-4 p-2">
                <div class="card">
                    <img class="card-img-top" src="https://d33wubrfki0l68.cloudfront.net/30a27d8c-b0ff-4653-863a-7578253acaf1/no.jpg" alt="<?= $product->nama_produk ?>">
                    <div class="card-body">
                        <a class="text-decoration-none card-title"
                                href="./product/<?= $product->id_produk ?>"><?= $product->nama_produk ?></a>
                        <p class="card-text fw-bold"><?= 'Rp'.number_format($product->harga, 0, ',', '.') ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>