@extends('layouts.default')

<div class="card">
            <div class="card-body">
              <h5 class="card-title">Floating labels Form</h5>

              <!-- Floating Labels Form -->
              <form action="{{ route('order.store') }}" method="POST" class="row g-3">
                @csrf
                
                
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" placeholder="Address" id="floatingTextarea" name="address" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Address</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="col-md-12">
                    <div class="form-floating">
                      <input type="text" class="form-control" id="floatingCity" name="city" placeholder="City">
                      <label for="floatingCity">City</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating mb-3">
                    <input class="form-select" id="floatingSelect" name="state" aria-label="State">
                    <label for="floatingSelect">State</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingZip" name="pin_code" placeholder="Zip">
                    <label for="floatingZip">Zip</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>