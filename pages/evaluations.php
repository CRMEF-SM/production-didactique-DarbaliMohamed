<?php   require_once 'header.php'; ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Evaluations</h6>
                    </div>
                    <div class="col-6 text-end">
                    <button class="btn bg-gradient-dark mb-0 mx-3"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Ajouter</button>
                    </div>
                  </div>
              </div>
            </div>
                        <!-- Ajouter modal-->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" id="add-examen">
                    <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Ajouter évaluation</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">Nom d'évaluation</label>
                            <input name="nom" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="module" class="form-control" id="module">
<!--                                 <option selected>Module</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option> -->
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                        <label class="form-label">Auteur</label>
                            <input name="auteur" id="auteur" type="text" class="form-control" value="<?php echo $_SESSION["name"];?>">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">durée</label>
                            <input name="duree" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <input class="form-control" type="date" value="2018-11-23" id="example-date-input" name="date">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="etat" class="form-control" id="exampleFormControlSelect1">
                                <option selected>Etat</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
            <!-- edit examen -->
            <div class="modal fade" id="editExamen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" id="add-examen">
                    <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Ajouter évaluation</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">Nom d'évaluation</label>
                            <input name="nom" id="nom" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="module" id="module" class="form-control" >
                                <option selected>Module</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="auteur" id="auteur" class="form-control" >
                                <option selected>auteur</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">durée</label>
                            <input name="duree" id="duree" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <input class="form-control" type="date" value="2018-11-23" id="date" name="date">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="etat" id="etat" class="form-control">
                                <option selected>Etat</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                </form>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom d'évaluation</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Module</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Auteur</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Durée (minutes)</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Etat</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody id="examen">

                  </tbody>
                </table>
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
  <script src="../add-test.js"></script>
</body>

</html>

