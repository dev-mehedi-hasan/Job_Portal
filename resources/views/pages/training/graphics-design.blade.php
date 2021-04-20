@extends('layouts.apps')
@section('title', 'Training-Graphics Desgin')
@section('preloader')
    @parent
@endsection
@section('navbar')
    @parent
@endsection
@section('content')
    <div class="page-title text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h2>Job Circular</h2>
                    <p>All kind of government and non government job circular</p>
                </div>
            </div>
        </div>
    </div>
    <section class="blog-posts-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 post-list blog-post-list">
                    <div class="single-post">
                        <img class="img-fluid" src="/../Job_Portal/public/assets/images/training/graphics-design-banner.jpg" alt="">
                        <ul class="tags">
                            <li><a href="#">Training</a></li>
                        </ul>
                        <a href="#">
                            <h2>
                                Graphics Design
                            </h2>
                        </a>
                        <div class="content-wrap">
                            <p style="text-align:justify;">
                               Graphic designers create visual concepts, using computer software or by hand, to communicate ideas that inspire, inform, and captivate consumers. They develop the overall layout and production design for applications such as advertisements, brochures, magazines, and reports.
                            </p>
                            <blockquote style="text-align:justify;" class="generic-blockquote">
                                “Coming from someone with such vast experience in design, it’s a valuable piece of advice that should be heeded. Scher started her career as a layout artist for Random House and gradually worked her way up to become the first female principal of Pentagram”
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 sidebar mt-5 mt-lg-0">
                        <div class="single-widget protfolio-widget">
                            <div class="single-table text-center">
                                <div class="table-top">
                                    <h3>summary</h3>
                                    <i class="fa fa-building-o"></i>
                                </div>
                                <ul class="my-5">
                                    <li class="mb-2">Line</li>
                                    <li class="mb-2">Color</li>
                                    <li class="mb-2">Shape</li>
                                    <li class="mb-2">Texture</li>
                                    <li class="mb-2">Typography</li>
                                    <li class="mb-2">Harmony</li>
                                </ul>
                                <a href="#" class="template-btn" data-toggle="modal" data-target=".bd-example-modal-lg">Enroll now</a>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="card ">
                                    <div class="card-header">
                                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                            <!-- Credit card form tabs -->
                                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                                <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                                            </ul>
                                        </div> <!-- End -->
                                        <!-- Credit card form content -->
                                        <div class="tab-content">
                                            <!-- credit card info-->
                                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                                <form role="form">
                                                    <div class="form-group"> <label for="username">
                                                            <h6>Card Owner</h6>
                                                        </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                                    <div class="form-group"> <label for="cardNumber">
                                                            <h6>Card number</h6>
                                                        </label>
                                                        <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                            <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group"> <label><span class="hidden-xs">
                                                                        <h6>Expiration Date</h6>
                                                                    </span></label>
                                                                <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                                </label> <input type="text" required class="form-control"> </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer"> <button type="button" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                                </form>
                                            </div>
                                        </div> <!-- End -->
                                        <!-- Paypal info -->
                                        <div id="paypal" class="tab-pane fade pt-3">
                                            <h6 class="pb-2">Select your paypal account type</h6>
                                            <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                                            <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                            <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                        </div> <!-- End -->
                                        <!-- bank transfer info -->
                                        <div id="net-banking" class="tab-pane fade pt-3">
                                            <div class="form-group "> <label for="Select Your Bank">
                                                    <h6>Select your Bank</h6>
                                                </label> <select class="form-control" id="ccmonth">
                                                    <option value="" selected disabled>--Please select your Bank--</option>
                                                    <option>DBBL</option>
                                                    <option>Trust Bank</option>
                                                    <option>City Bank</option>
                                                </select> </div>
                                            <div class="form-group">
                                                <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Pyment</button> </p>
                                            </div>
                                            <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                        </div> <!-- End -->
                                        <!-- End -->
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
            </div>
    </div>
        </div>
    </section>
@endsection
@section('footer')
    @parent
@endsection
@section('script')
    @parent
@endsection
