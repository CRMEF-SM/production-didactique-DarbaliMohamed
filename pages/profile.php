<?php  
require_once 'header.php'; ?>

    <div class="container-fluid py-4">
      <div class="row min-vh-80">
        <div class="col-12">
          <div class="card mt-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Modifiers les informations personnelles</h6>
                <p class="mb-0 text-white ps-3">xxxxxx xxxx xx xxxxxx
                </p>
              </div>
            </div>
            <div class="card-body px-5">
              <div class="showAlert" id="showAlert">
              </div>
              <div class="p-4">
                <form class="modal-content" id="edit-profile" >
                    <div class="row">
                    <input type="hidden" name="id" id="id" value="<?php echo $_SESSION["id"] ;?>" class="form-control">
                      <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Nom_complet</label>
                            <input type="text" name="nom_complet" id="nom_complet" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="form-control">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Password</label>
                            <input type="text" name="password" id="password" class="form-control" placeholder="********">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Cin_cne</label>
                            <input type="text" name="cin_cne" id="cin_cne" class="form-control">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Date de naissance</label>
                            <input type="text" name="date_naissance" id="date_naissance" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Type</label>
                            <input type="text" name="type" id="type" class="form-control" disabled>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="input-group input-group-static mb-4">
                            <label>Age</label>
                            <input type="text" name="age" id="age" class="form-control">
                          </div>
                      </div>
                      <div class="col-md-6">

                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg w-100">Enregistrer</button>
                </form>
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
  <script src="../profile.js" ></script>
</body>

</html>