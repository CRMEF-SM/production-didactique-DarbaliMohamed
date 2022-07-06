<?php  
require_once 'header.php'; ?>
    <div class="container-fluid py-4">
      <div class="row min-vh-80">
        <div class="col-12">
          <div class="card h-100">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h5 class="text-white text-capitalize ps-3">Ajouter Question</h5>
              </div>
            </div>
            <div class="card-body">
        <div id="showAlert" ></div>
        <form class="modal-content" id="add-qst" >
            <div class="row">
                <input type="hidden" name="id" id="id" value="<?php echo $_SESSION["id"] ;?>" class="form-control">
                <div class="col-md-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Question :</label>
                            <input type="text" name="question" id="question" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Choix 1 :</label>
                            <input type="text" name="choix1" id="choix1" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Choix 2 :</label>
                            <input type="text" name="choix2" id="choix2" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Choix 3 :</label>
                            <input type="text" name="choix3" id="choix3" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Choix 4 :</label>
                            <input type="text" name="choix4" id="choix4" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Reponse :</label>
                            <select name="reponse" id="reponse" class="form-control" >
                                <option selected value="choix1">choix 1</option>
                                <option value="choix2">choix 2</option>
                                <option value="choix3">choix 3</option>
                                <option value="choix4">choix 4</option>
                            </select>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="input-group input-group-static mb-4">
                            <label>Evaluation :</label>
                            <select name="evaluation" id="evaluation" class="form-control" >
                                <option selected>Evaluation</option>
                                <option value="1">Evaluation</option>
                                <option value="2">Evaluation</option>
                                <option value="3">Evaluation</option>
                            </select>
                          </div>
                      </div>
                </div>
            </div>
            <div class="m-3">
                <button type="submit" class="btn btn-primary btn-lg w-100">Enregistrer</button> 
            </div>
        </form>
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
  <script src="../add-qst.js" ></script>  
</body>

</html>