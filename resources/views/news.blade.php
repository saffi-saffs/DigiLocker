@extends('dashboard')
@section('content')

<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <h5 class="card-title fw-semibold mb-4">Card</h5>
                  <div class="card">
                    <img src="{{asset('img/products/s4.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Today new Product</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <h5 class="card-title fw-semibold mb-4">Ads Section</h5>
                  <div class="card">
                    <div class="card-header">
                      Featured Ads
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">News Section </h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                     
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <h5 class="card-title fw-semibold mb-4">Titles, text, and links</h5>
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the
                        card's content.</p>
                      <a href="#" class="card-link">Card link</a>
                      <a href="#" class="card-link">Another link</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>

@endsection
