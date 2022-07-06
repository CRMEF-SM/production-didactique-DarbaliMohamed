<?php   require_once 'header.php'; ?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="text-white text-capitalize ps-3">utilisateurs</h6>
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
                <form class="modal-content" id="add-user-admin">
                    <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Ajouter utilisateur</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">Nom Complet</label>
                            <input name="nom_complet" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">Email</label>
                            <input name="email" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">Age</label>
                            <input name="age" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <label class="form-label">CIN/CNE</label>
                            <input name="cin_cne" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                        <input class="form-control" type="date" value="2018-11-23" id="example-date-input" name="date_naissance">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="module" class="form-control" id="exampleFormControlSelect1">
                                <option selected>Module</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="semestre" class="form-control" id="exampleFormControlSelect1">
                                <option selected>Semestre</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="type" class="form-control" id="exampleFormControlSelect1">
                                <option selected>Type</option>
                                <option value="Enseignant">Enseignant</option>
                                <option value="Administrateur">Administrateur</option>
                                <option value="Apprenant">Apprenant</option>
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
            <!-- edit modal-->
          <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
                <form class="modal-content" id="add-user-admin">
                    <div class="modal-header">
                    <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Ajouter utilisateur</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3 input-group-outline">
                           <!--  <label class="form-label">Nom Complet</label> -->
                            <input name="nom_complet" id="nom_complet" type="text" class="form-control" placholder="Nom Complet">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                           <!--  <label class="form-label">Email</label> -->
                            <input name="email" id="email" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                           <!--  <label class="form-label">Age</label> -->
                            <input name="age" id="age" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <!-- <label class="form-label">CIN/CNE</label> -->
                            <input name="cin_cne" id="cin_cne" type="text" class="form-control">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                        <input class="form-control" type="date" value="2018-11-23" id="date_naissance" name="date_naissance">
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="module" class="form-control" id="module">
                                <option selected>Module</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="input-group mb-3 input-group-outline">
                            <select name="semestre" class="form-control" id="semestre">
                                <option selected>Semestre</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="input-group mb-3 input-group-outline">
                            <select name="type" class="form-control" id="type">
                                <option selected>Type</option>
                                <option value="Enseignant">Enseignant</option>
                                <option value="Administrateur">Administrateur</option>
                                <option value="Apprenant">Apprenant</option>
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
              <div id="showAlert"></div>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Utilisateurs</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Module/Semestre</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">type</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Age</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">cin/cne</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">date de naissance </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody id="utilisateur"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="page-counter d-flex justify-content-center my-3">
            <nav aria-label="Page navigation example">
                <ul class="pagination pagination-info justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link" href="javascript:;" tabindex="-1">
                      <span class="material-icons">
                        keyboard_arrow_left
                      </span>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item  active"><a class="page-link" href="javascript:;">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:;">
                      <span class="material-icons">
                        keyboard_arrow_right
                      </span>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
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
  <script src="../add-user.js" ></script>
</body>

</html>
