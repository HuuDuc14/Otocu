@extends('app')

@section('content')
<style>
    select {
        margin: 10px;
    }
    .card-title{
        color: #FFC107;
    }
    .card button{
        background-color: #FFC107;
        border: none;
        border-radius: 5px;
        color: #f7f7f7;
        margin-left: auto;
        padding: 10px
    }
</style>
<div class="container-fluid" style="background-color:#f7f7f7">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-5 col-sm-6 d-flex">
            <img src="../images/car1.png" class="w-75 align-content-center" style="height: 100%;" alt="">
        </div>
        <div class="col-lg-4 col-sm-5">
            <div class="p-3 bg-white m-5">
                <h5 class="text-center p-2">BOOK YOUR CAR</h5>
                <select class="form-select badge-light w-75 w-sm-100 mx-auto" aria-label="Default select example">
                    <option selected hidden>Choose Your Car</option>
                    <option value="Audi">Audi</option>
                    <option value="Honda">Honda</option>
                    <option value="Toyota">Toyota</option>
                    <option value="Mercedes">Mercedes</option>
                </select>
                <select class="form-select badge-light w-75 mx-auto" aria-label="Default select example">
                    <option selected hidden>Choose Fuel</option>
                    <option value="Petrol">Petrol (Gasoline)</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Electric">Electric</option>
                    <option value="Hybrid ">Hybrid (Petrol/Electric or Diesel/Electric)</option>
                </select>
                <select class="form-select badge-light w-75 mx-auto" aria-label="Default select example">
                    <option selected hidden>Choose Body Style</option>
                    <option value="Sedan">Sedan</option>
                    <option value="SUV ">SUV </option>
                    <option value="Hatchback">Hatchback</option>
                    <option value="Coupe">Coupe</option>
                    <option value="Pickup Truck">Pickup Truck</option>
                </select>
                <select class="form-select badge-light w-75 mx-auto" aria-label="Default select example">
                    <option selected hidden>Choose Transmission Type</option>
                    <option value="Manual">Manual</option>
                    <option value="Automatic">Automatic</option>
                    <option value="CVT">CVT (Continuously Variable Transmission)</option>
                    <option value="Semi-Automatic">Semi-Automatic</option>
                </select>
                <select class="form-select badge-light w-75 mx-auto" aria-label="Default select example">
                    <option selected hidden>Choose your Adress</option>
                    <option value="Audi">Ho Chi Minh</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center m-3">Choose Awesome Car</h2>
    <div class="container-fluid" style="margin-left:80px; width:1400px">
    <div class="row">
        <!-- Sản phẩm 1 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Sản phẩm 2 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Sản phẩm 3 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Sản phẩm 4 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Sản phẩm 5 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- Sản phẩm 6 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sản phẩm 7 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sản phẩm 8 -->
        <div class="col-12 col-sm-6 col-md-3 mb-4">
            <div class="card" style="width: 90%;">
                <img src="./images/car1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-text">Audi A8 <span>- 2Y OLD</span></h5>
                    <h4 class="card-title">2.970.000.000d</h4>
                    <p>Petrol- Sedan- Automatic</p>
                </div>
                <ul class="list-group list-group-flush">
                    Owner
                    <li class="list-group-item">
                        <div class="d-flex">
                            <i class="fas fa-user-circle" style="font-size:40px"></i>
                            <div class="px-3">
                                <a>Name owner</a><br>
                                <a>0123 678</a>
                            </div>
                            <button>Save</button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    const buttons = document.querySelectorAll('button');
    buttons.forEach(button => {
        let flag = true;

        button.addEventListener('click', function() {
            if (flag) {
                this.style.backgroundColor = '#ffd800'; // Màu vàng
                this.style.color = '#ffffff'; // Chữ trắng
                this.innerText='Saved';
                flag = false;
            } else {
                this.style.backgroundColor = '#FFC107'; // Màu vàng
                this.style.color = '#ffffff'; // Chữ trắng
                this.innerText='Save';

                flag=true;
            }

        });
    });
</script>

@endsection