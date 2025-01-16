@extends('app')

@section('content')
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Post a Car for Rent</h1>
                                    </div>
                                    <form class="user">
                                        <h5 class="text-gray-800">Owner Information</h5>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="ownerName" placeholder="Owner's Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control form-control-user" id="ownerPhone" placeholder="Phone Number" oninput="validatePhoneNumber(this)">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="ownerAddress" placeholder="Address">
                                        </div>

                                        <h5 class="text-gray-800">Car Information</h5>
                                        <div class="form-group">
                                            <label for="carBrand">Car Brand</label>
                                            <select class="form-control form-control-user" id="carBrand">
                                                <option value="Toyota">Toyota</option>
                                                <option value="Honda">Honda</option>
                                                <option value="Ford">Ford</option>
                                                <option value="BMW">BMW</option>
                                                <option value="Mercedes">Mercedes</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="carModel">Car Model</label>
                                            <select class="form-control form-control-user" id="carModel">
                                                <option value="Sedan">Sedan</option>
                                                <option value="SUV">SUV</option>
                                                <option value="Truck">Truck</option>
                                                <option value="Hatchback">Hatchback</option>
                                                <option value="Coupe">Coupe</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="carPlate" placeholder="License Plate">
                                        </div>
                                        <div class="form-group">
                                            <label for="carColor">Car Color</label>
                                            <select class="form-control form-control-user" id="carColor">
                                                <option value="Black">Black</option>
                                                <option value="White">White</option>
                                                <option value="Silver">Silver</option>
                                                <option value="Blue">Blue</option>
                                                <option value="Red">Red</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="carEngineType">Car Engine Type</label>
                                            <select class="form-control form-control-user" id="carEngineType">
                                                <option value="Petrol">Petrol</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Hybrid">Hybrid</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="carBodyStyle">Body Style</label>
                                            <select class="form-control form-control-user" id="carBodyStyle">
                                                <option value="Sedan">Sedan</option>
                                                <option value="SUV">SUV</option>
                                                <option value="Truck">Truck</option>
                                                <option value="Convertible">Convertible</option>
                                                <option value="Van">Van</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="carYear">Year of Manufacture</label>
                                            <input type="number" class="form-control form-control-user" id="carYear"  oninput="this.value = Math.max(this.value, 0)">
                                        </div>
                                        <div class="form-group">
                                            <label for="carPrice">Car Price</label>
                                            <input type="number" class="form-control form-control-user" id="carPrice" placeholder="Million VND" oninput="this.value = Math.max(this.value, 0)">
                                        </div>
                                        <div class="form-group">
                                            <label for="carImage">Car Images</label>
                                            <input type="file" class="form-control form-control-user pb-5" id="carImage" placeholder="Upload Image" multiple>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Submit
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="index.html">Back to Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection