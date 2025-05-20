<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecowise - Solar Plant Company</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --eco-pink: #e93e8c;
      --eco-blue: #1eb6e7;
      --eco-green: #4bb543;
    }
    body { font-family: 'Segoe UI', Arial, sans-serif; }
    .top-bar { background: #f8f9fa; font-size: 0.95rem; }
    .top-bar a { color: var(--eco-blue); text-decoration: none; margin-right: 1rem; }
    .top-bar .social-icons a { margin-left: 0.5rem; color: var(--eco-blue); }
    .navbar-brand img { height: 48px; }
    .navbar-nav .nav-link { color: var(--eco-blue) !important; font-weight: 500; }
    .navbar-nav .btn-cta { background: var(--eco-pink); color: #fff !important; border-radius: 20px; padding: 0.5rem 1.5rem; margin-left: 1rem; }
    .navbar-nav .btn-cta:hover { background: var(--eco-green); }
    .carousel-caption { background: rgba(30,182,231,0.7); border-radius: 12px; padding: 2rem; }
    .carousel-caption h1 { color: #fff; font-size: 2.5rem; font-weight: bold; }
    .carousel-caption p { color: #fff; font-size: 1.2rem; }
    .quote-section { background: #f4f8fb; padding: 3rem 0; }
    .quote-form { background: #fff; border-radius: 12px; box-shadow: 0 2px 16px rgba(30,182,231,0.08); padding: 2rem; }
    .results-panel { background: var(--eco-blue); color: #fff; border-radius: 12px; padding: 2rem; }
    .results-panel h5 { color: #fff; }
    .results-panel .btn { margin: 0.5rem 0.5rem 0 0; }
    .stats-section { padding: 3rem 0; }
    .stat-card { border: none; border-radius: 12px; box-shadow: 0 2px 16px rgba(30,182,231,0.08); margin-bottom: 2rem; }
    .stat-card .card-body { padding: 2rem; }
    .stat-card h5 { color: var(--eco-blue); font-weight: 600; }
    .stat-card .stat-value { color: var(--eco-pink); font-size: 1.5rem; font-weight: bold; }
    .footer { background: #222; color: #fff; padding: 2rem 0; }
    .footer a { color: var(--eco-blue); text-decoration: none; }
    .footer .logo-footer img { height: 36px; }
    .footer .social-icons a { color: var(--eco-blue); margin-right: 0.5rem; }
    @media (max-width: 767px) {
      .carousel-caption { padding: 1rem; }
      .quote-section, .stats-section { padding: 1.5rem 0; }
    }
    #resultsPanel .row.g-3 > div > div {
      box-shadow: 0 4px 24px rgba(30,182,231,0.10), 0 1.5px 6px rgba(0,0,0,0.04);
      border-radius: 18px;
      margin-bottom: 1rem;
    }
    #resultsPanel .fw-bold {
      letter-spacing: 0.5px;
    }
    #resultsPanel .fw-semibold {
      font-size: 1.08rem;
      letter-spacing: 0.2px;
    }
    #resultsPanel .btn {
      font-size: 1.08rem;
      box-shadow: 0 2px 8px rgba(30,182,231,0.10);
    }
    #resultsPanel .d-flex.flex-row > div.flex-fill {
      min-width: 0;
      min-height: 100%;
    }
    @media (max-width: 767px) {
      #resultsPanel .d-flex.flex-row {
        flex-direction: column !important;
      }
      #resultsPanel .d-flex.flex-row > div.flex-fill {
        border-radius: 18px !important;
        margin-bottom: 1rem;
      }
      #resultsPanel .d-flex.flex-row > div[style*='width:2px'] {
        display: none !important;
      }
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <div class="top-bar py-2">
    <div class="container d-flex justify-content-between align-items-center">
      <div>
        <a href="mailto:info@ecowise.com"><i class="fa fa-envelope"></i> info@ecowise.com</a>
        <a href="tel:+1234567890"><i class="fa fa-phone"></i> +1 234 567 890</a>
      </div>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </div>
  <!-- Main Header -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand" href="/ecowise/index.html">
        <img src="{{asset('img/rlogo.jpeg')}}" alt="Ecowise Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#products">Products & Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#resources">Resources</a></li>
          <li class="nav-item"><a class="btn btn-cta nav-link" href="#appointment">Book an Appointment</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contact Us</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Hero Section (Banner Slider) -->
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" style="background:url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1500&q=80') center/cover; min-height: 480px;">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <h1>Welcome to Ecowise</h1>
          <p>"We are a eco friendly products and services provider with an ambition to provide GREEN to the Community and PEACE to the Humanity by helping customer make Eco-Logically WISE choices for the sustainable future for all of us"</p>
          <p class="mt-3"><strong>Act Now: Mother Earth Needs us than ever Before</strong><br>We offer the lowest price possible with Best QUALITY to make your decision easier</p>
        </div>
      </div>
      <div class="carousel-item" style="background:url('https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=1500&q=80') center/cover; min-height: 480px;">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <h1>Go Solar, Go Green</h1>
          <p>Join the movement for a sustainable future. Save money, save the planet.</p>
        </div>
      </div>
      <div class="carousel-item" style="background:url('https://images.unsplash.com/photo-1501594907352-04cda38ebc29?auto=format&fit=crop&w=1500&q=80') center/cover; min-height: 480px;">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <h1>Power Your Home with the Sun</h1>
          <p>Reliable, affordable, and eco-friendly solar solutions for everyone.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Quotation Section -->
  <section class="quote-section" id="quote">
    <div class="container">
      <div class="row g-4 align-items-stretch">
        <!-- Left Column: Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center" id="quoteFormCol" style="display: flex !important;">
          <div class="quote-form shadow-lg p-4 bg-white rounded-4 w-100" style="max-width: 420px;">
            <h4 class="mb-4 fw-bold text-center" style="color:var(--eco-blue)">See how much you can save and help the WORLD with Solar</h4>
            <form id="quoteForm" novalidate>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="name" placeholder="Name" required>
                <label for="name">Name <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Please enter your name.</div>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="usage" placeholder="Yearly Usage in kW" required>
                <label for="usage">Yearly Usage in kW <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Please enter a valid number.</div>
              </div>
              <div class="form-floating mb-3">
                <input type="number" class="form-control" id="cost" placeholder="Cost per kW in cents" required>
                <label for="cost">Cost per kW in cents <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Please enter a valid number.</div>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="address" placeholder="Address">
                <label for="address">Address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" placeholder="Email ID" required>
                <label for="email">Email ID <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Please enter a valid email address.</div>
              </div>
              <div class="form-floating mb-4">
                <input type="tel" class="form-control" id="phone" placeholder="Phone Number" required maxlength="10">
                <label for="phone">Phone Number <span class="text-danger">*</span></label>
                <div class="invalid-feedback">Please enter a valid 10-digit phone number.</div>
              </div>
              <button type="submit" class="btn w-100 fw-bold" style="background: linear-gradient(90deg, var(--eco-blue), var(--eco-pink)); color: #fff; border:none; border-radius: 30px; box-shadow: 0 2px 8px rgba(30,182,231,0.10); font-size: 1.1rem;">Get a Free Quick Quote</button>
            </form>
          </div>
        </div>
        <!-- Right Column: Results Panel -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center" id="resultsCol" style="display: flex !important;">
          <div id="resultsPanel" class="position-relative w-100 rounded-4 shadow-lg overflow-hidden" style="background:url('{{asset('img/soalr.jpg')}}') center/cover; min-height: 480px; min-width: 320px; display: flex; align-items: center; justify-content: center;">
            <!-- Overlay -->
            <div class="position-absolute top-0 start-0 w-100 h-100" style="background:rgba(20,40,60,0.45);"></div>
            <!-- Initial State -->
            <div id="resultsInitial" class="position-relative w-100 text-center d-flex flex-column align-items-center justify-content-center" style="z-index:2; padding:3rem 1.5rem;"></div>
            <!-- After Submission State -->
            <div id="resultsAfter" class="position-relative w-100" style="z-index:2; padding:2rem 1.5rem; display:none;">
              <div class="d-flex flex-row justify-content-left align-items-stretch gap-72" style="width:100%; max-width:700px; margin-right: 150px; gap:75px;">
                <div class="flex-fill p-4 bg-dark bg-opacity-75 rounded-start-4 d-flex flex-column justify-content-center" style="min-width:0; min-height:100%;">
                  <h5 class="fw-bold mb-4" style="color: #ffe066; text-shadow: 0 1px 2px #222; text-align:left;">SOLAR Benefits</h5>
                  <div class="fw-semibold text-white mb-3" style="text-align:left;">Monthly Payment:<br><span class="text-white">$13,500.00</span></div>
                  <div class="fw-semibold text-white mb-3" style="text-align:left;">Estimated Savings:<br><span class="text-white">$13,500.00</span></div>
                  <div class="fw-semibold text-white mb-3" style="text-align:left;">Increased Home Value:<br><span class="text-white">$13,500.00</span></div>
                  <div class="fw-semibold text-white" style="text-align:left;">Avg 40yr Savings:<br><span class="text-white">$13,500.00</span></div>
                </div>
                <div style="width:2px; background:rgba(255,255,255,0.18); margin:0 0.5rem;"></div>
                <div class="flex-fill p-4 bg-dark bg-opacity-75 rounded-end-4 d-flex flex-column justify-content-center" style="min-width:0; min-height:100%;">
                  <h5 class="fw-bold mb-4 text-white" style="text-align:left;">No SOLAR Impact</h5>
                  <div class="fw-semibold text-white mb-3" style="text-align:left;">Carbon Emissions per yr:<br><span class="text-white">$13,500.00</span></div>
                  <div class="fw-semibold text-white mb-3" style="text-align:left;">Trees Cut in Lifetime:<br><span class="text-white">$13,500.00</span></div>
                  <div class="fw-semibold text-white" style="text-align:left;">Utility Costs per 40 yr:<br><span class="text-white">$13,500.00</span></div>
                </div>
              </div>
              <div class="mt-4 text-center">
                <a href="#" class="btn btn-outline-light me-2 fw-bold px-4" style="border-radius: 30px;">Reserve Now</a>
                <a href="#" class="btn btn-light fw-bold px-4" style="border-radius: 30px; color: var(--eco-blue);">Book Consultation</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Statistics & Comparison Section -->
  <section class="stats-section" id="stats">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card stat-card h-100" style="background: #e3fcec;">
            <div class="card-body">
              <h5>Total cost after incentives:</h5>
              <div class="stat-value">$11,200</div>
              <div>$72 monthly @8% APR for 20 years</div>
              <div>(14 panels, 14 inverters)</div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card stat-card h-100" style="background: #fffbe6;">
            <div class="card-body">
              <h5>40-Year Comparison:</h5>
              <div>Investing $11,200 in Gold = <span class="stat-value">$90,000</span></div>
              <div>Mortgage principal = <span class="stat-value">$2,600</span></div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card stat-card h-100" style="background: #e6f0ff;">
            <div class="card-body">
              <h5>Market Comparison:</h5>
              <div>You are paying up to <span class="stat-value">$15,000</span> less than market average</div>
              <a href="#" class="d-block mt-2" style="color:var(--eco-blue)">See full comparison with competitors</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card stat-card h-100" style="background: #fce4ec;">
            <div class="card-body">
              <h5>Lifetime Savings:</h5>
              <div class="stat-value">$181,000</div>
              <div>$30,000 with 4% inflation</div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card stat-card h-100" style="background: #e8f5e9;">
            <div class="card-body">
              <h5>Environmental Impact:</h5>
              <div>Save up to <span class="stat-value">11 tons</span> of CO2 emissions</div>
              <div><span class="stat-value">550</span> trees preserved</div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card stat-card h-100" style="background: #f3e5f5;">
            <div class="card-body">
              <h5>Product Quality:</h5>
              <div>Industry Best Quality</div>
              <div>Maxeon Panel, Enphase IQ8 Inverter, 40 yr Warranty</div>
              <a href="#" class="d-block mt-2" style="color:var(--eco-blue)">View Top Panels Rating</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container">
      <div class="row align-items-center mb-3">
        <div class="col-md-3 logo-footer mb-3 mb-md-0">
          <img src="logo.jpeg" alt="Ecowise Logo Small">
        </div>
        <div class="col-md-3 mb-3 mb-md-0">
          <h6>Quick Links</h6>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#products">Services</a></li>
            <li><a href="#resources">Resources</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
        <div class="col-md-3 mb-3 mb-md-0">
          <h6>Contact Info</h6>
          <ul class="list-unstyled">
            <li>123 Solar Street, Green City</li>
            <li><a href="mailto:info@ecowise.com">info@ecowise.com</a></li>
            <li><a href="tel:+1234567890">+1 234 567 890</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>Follow Us</h6>
          <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
      <div class="text-center pt-3 border-top border-secondary">
        &copy; 2024 Ecowise. All rights reserved.
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script>
    function formatUSD(num) {
      return '$' + Number(num).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    }
    $(function() {
      // Add spinner and reset button
      if (!$('#resultsPanel .spinner-border').length) {
        $('#resultsPanel').append('<div id="calcSpinner" class="position-absolute top-50 start-50 translate-middle d-none" style="z-index:10;"><div class="spinner-border text-light" role="status"><span class="visually-hidden">Loading...</span></div></div>');
      }
      if (!$('#quoteForm .btn-reset').length) {
        $('<button type="button" class="btn btn-outline-secondary btn-reset w-100 mt-2">Reset</button>').insertAfter('#quoteForm button[type=submit]');
      }
      function showResults(data) {
        // Only display the required fields (all static for now)
        // Animate swap
        $('#resultsInitial').fadeOut(200, function() {
          $('#resultsAfter').fadeIn(400);
        });
        // No need to update any dynamic fields since all are static for now
      }
      function resetResults() {
        $('#resultsAfter').hide();
        $('#resultsInitial').fadeIn(300);
        $('#quoteForm')[0].reset();
        $('#quoteForm input').removeClass('is-invalid');
        $('#quoteFormCol').css('visibility', 'visible');
        $('#resultsCol').removeClass('col-lg-8 mx-auto').addClass('col-lg-6');
      }
      $('#quoteForm').on('submit', function(e) {
        e.preventDefault();
        var usage = parseFloat($('#usage').val());
        var cost = parseFloat($('#cost').val());
        if (usage && cost) {
            var savings = (usage * cost) * 0.25;
            var co2Reduction = (usage * 0.9); 
        //update result pannel
            $('#savingsAmount').text('$' + savings.toFixed(2));
            $('#co2Reduction').text(co2Reduction.toFixed(1));

            $('#resultsPanel').show();
        } else {
          alert('Please enter valid values for both fields.');
        };

        var valid = true;
        // Name
        if (!$('#name').val().trim()) {
          $('#name').addClass('is-invalid');
          valid = false;
        } else {
          $('#name').removeClass('is-invalid');
        }
        // Usage
        var usage = parseFloat($('#usage').val());
        if (!usage || isNaN(usage)) {
          $('#usage').addClass('is-invalid');
          valid = false;
        } else {
          $('#usage').removeClass('is-invalid');
        }
        // Cost
        var cost = parseFloat($('#cost').val());
        if (!cost || isNaN(cost)) {
          $('#cost').addClass('is-invalid');
          valid = false;
        } else {
          $('#cost').removeClass('is-invalid');
        }
        // Email
        var email = $('#email').val();
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
          $('#email').addClass('is-invalid');
          valid = false;
        } else {
          $('#email').removeClass('is-invalid');
        }
        // Phone
        var phone = $('#phone').val();
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone)) {
          $('#phone').addClass('is-invalid');
          valid = false;
        } else {
          $('#phone').removeClass('is-invalid');
        }
        if (valid) {
          // Show spinner
          $('#calcSpinner').removeClass('d-none');
          // Calculation logic
          setTimeout(function() {
            var total_cost = usage * cost * 1.5;
            var cost_after_tax = total_cost * 70/100;
            var final_cost = cost_after_tax - 3500;
            var current_cost = (usage * (cost / 100)) / 12;
            // Fill results
            showResults({
              total_cost: total_cost,
              cost_after_tax: cost_after_tax,
              final_cost: final_cost,
              current_cost: current_cost
            });
            $('#calcSpinner').addClass('d-none');
          }, 800); // Simulate loading
        }
      });
      // Remove error on input
      $('#quoteForm input').on('input', function() {
        $(this).removeClass('is-invalid');
      });
      // Reset button
      $('.btn-reset').on('click', function() {
        resetResults();
      });
      // On load, ensure only initial is shown
      $('#resultsAfter').hide();
      $('#resultsInitial').show();
    });
  </script>
</body>
</html> 