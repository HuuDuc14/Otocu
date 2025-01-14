<style>
    .bg-yellow {
        background: #FFC107;
    }

    .yellow {
        color: #FFC107;
    }

    nav a {
        max-width: 120px;
        margin: 2px;
    }

    .navbar-brand {
        font-weight: 500;
    }

    .navbar-transparent {
        background-color: rgba(255, 255, 255, 0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.6);
        border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        position: fixed;
        width: 100%;
        z-index: 1000;
        backdrop-filter: blur(3px);
    }

    .banner {
        position: relative;
        height: 500px;
        background-image: url('../images/banner.jpg');
        background-size: cover;
        background-position: center;
        margin: 0;
        padding: 0;
    }

    .banner-content {
        position: absolute;
        top: 50%;
        left: 25%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
    }

    .banner-content h3 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .banner-content p {
        font-size: 1.2rem;
        margin: 15px 0;
    }

    .banner-content .btn {
        padding: 10px 20px;
        font-size: 1rem;
        border: none;
        border-radius: 5px;
        background-color: #FFC107;
        color: #000;
        cursor: pointer;
    }

    .banner-content .btn:hover {
        background-color: #ffca28;
    }

    .top-content i {
        color: #FFC107;
        font-size: 50px;
    }

    body {
        overflow-x: hidden;
        /* Loại bỏ thanh cuộn ngang */
        
    }
</style>

<div class="container-fluid  m-0 p-0">
    <div class="container-fluid banner">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-transparent px-5">
            <div class="container-fluid d-flex align-items-center">
                <a class="navbar-brand me-auto" href="#"><span class="yellow">Zoom</span> Car Rental</a>
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ms-5" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FIND A CAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                    <div class="d-flex me-5">
                        <a href="#" class="btn bg-yellow me-2">Login</a>
                        <a href="#" class="btn bg-yellow">Post</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Nội dung giữa banner -->
        <div class="banner-content text-dark">
            <h3>Find Your Best Car</h3>
            <p>Select your favourite type of car you like</p>
            <button class="btn text-light">Find Car</button>
        </div>
    </div>
    <div class="top-content">
        <div class="row">
            <h2 class="m-4 text-center">Awesome Features</h2>
            <div class="col-2">
            </div>
            <div class="col-2 text-center">
                <i class="fas fa-map-marked-alt"></i>
                <h6 class="m-2">Simple Booking</h6>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
            <div class="col-2 text-center">
                <i class="fa-solid fa-car-side"></i>
                <h6 class="m-2">Insurance Included</h6>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
            <div class="col-2 text-center">
                <i class="fas fa-credit-card"></i>
                <h6 class="m-2">Secure Payment</h6>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
            <div class="col-2 text-center">
                <i class="fas fa-headset"></i>
                <h6 class="m-2">Customer Support</h6>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
            </div>
            <div class="col-2">
            </div>
        </div>
    </div>
</div>