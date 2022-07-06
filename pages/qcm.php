<?php  
require_once 'header.php'; ?>
      <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id'] ; ?>">
    <div class="container-fluid py-4">
      <div class="row min-vh-80">
        <div class="col-12">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Evaluation : </h5>
              </div>
            </div>
            <div class="card-body text-center">      
                    <div class="container">
                    <div id="quiz">
                        <h2><span id="nomExamen" > </span> <i class="far fa-question-circle"></i></h2>
                        <h3>L'examen se terminera dans <span id="time"></span> minutes</h3>
                        <h2 id="question"></h2>
                        
                        <h3 id="score"></h3>

                        <div class="choices">
                        <button id="guess0" class="btn">        
                            <p id="choice0"></p>
                        </button>

                        <button id="guess1" class="btn">
                            <p id="choice1"></p>
                        </button>
                            
                        <button id="guess2" class="btn">
                            <p id="choice2"></p>
                        </button>
                            
                        <button id="guess3" class="btn">
                            <p id="choice3"></p>
                        </button>
                        </div>

                        <p id="progress"></p>

                    </div>
                    </div>

            </div>
          </div>
        </div>
      </div>
      <?php require_once 'footer.php'; ?>
    </div>
  </main>
  <?php require_once 'settings.php'; ?>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/world.js"></script>
  <script>
    // Initialize the vector map
    var map = new jsVectorMap({
      selector: "#vector-map",
      map: "world_merc",
      zoomOnScroll: false,
      zoomButtons: false,
      selectedMarkers: [1, 3],
      markersSelectable: true,
      markers: [{
          name: "USA",
          coords: [40.71296415909766, -74.00437720027804]
        },
        {
          name: "Germany",
          coords: [51.17661451970939, 10.97947735117339]
        },
        {
          name: "Brazil",
          coords: [-7.596735421549542, -54.781694323779185]
        },
        {
          name: "Russia",
          coords: [62.318222797104276, 89.81564777631716]
        },
        {
          name: "China",
          coords: [22.320178999475512, 114.17161225541399],
          style: {
            fill: '#E91E63'
          }
        }
      ],
      markerStyle: {
        initial: {
          fill: "#e91e63"
        },
        hover: {
          fill: "E91E63"
        },
        selected: {
          fill: "E91E63"
        }
      },


    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.3"></script>
  <script src="../qcm2.js" ></script>  
</body>

</html>