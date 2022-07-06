<?php   require_once 'header.php'; 

$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=production_didactique", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$sql5 = 'SELECT * FROM notes';
$stmt5 = $conn->prepare($sql5);
$stmt5->execute();
$notes = $stmt5->fetchAll();


 
?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Notes</h6>
                    </div>
                    <div class="col-6 text-end">
                   
                    </div>
                  </div>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Note</th>
                    </tr>
                  </thead>
                  <tbody id="examen">
<?php   foreach ($notes as $row) {
$sql1 = 'SELECT * FROM test WHERE id = ?';
$stmt1 = $conn->prepare($sql1);
$stmt1->execute([$row['id_examen']]);
$evaluation = $stmt1->fetch();

        echo '
      <tr>
        <td>
          <span class="text-sm font-weight-bold px-3">' . $evaluation['nom'] . '</span>
        </td>
        <td>
          <span class="text-sm font-weight-bold">' . $evaluation['module'] . '</span>
        </td>
        <td>
          <span class="text-xs font-weight-bold">' . $evaluation['auteur']. '</span>
        </td>
        <td >
          <div class="my-auto">
            <span class="me-2 text-xs font-weight-bold">' . $row['note_examen'] . '</span>
          </div>
        </td>
      </tr>
        ';
   
      }
                ?>  </tbody>
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

</body>

</html>

