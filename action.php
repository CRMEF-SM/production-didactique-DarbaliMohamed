<?php

session_start() ; 

  require_once 'db.php';
  require_once 'util.php';

  $db = new Database;
  $util = new Util;
  // Handle ajouter utilisateur Ajax Request
  if (isset($_POST['add'])) {

    $nom_complet = $util->testInput($_POST['nom_complet']);
    $email = $util->testInput($_POST['email']);
    $password = $util->testInput($_POST['password']);
    $cin_cne = 12 ;/* $util->testInput($_POST['cin_cne']); */
    $date_naissance = $util->testInput($_POST['date_naissance']);
    $type = $util->testInput($_POST['type']);
    $age = $util->testInput($_POST['age']);
    $online ='yes'/*  $util->testInput($_POST['online']) */;
    $module = 'sed' /* $util->testInput($_POST['module']) */;
   
  //inserer les informations dans la database
  if ($db->insert($nom_complet, $email, $password, $cin_cne,$date_naissance, $type,$age, $online,$module)) {
    echo $util->showMessage('info', 'Operation validée');
  } else {
    echo $util->showMessage('danger', 'Opération échoué');
  }
 }

   // Handle ajouter question Ajax Request
   if (isset($_POST['add-qst'])) {

    $question = $util->testInput($_POST['question']);
    $choix1 = $util->testInput($_POST['choix1']);
    $choix2 = $util->testInput($_POST['choix2']);
    $choix3 = $util->testInput($_POST['choix3']); 
    $choix4 = $util->testInput($_POST['choix4']); 
    $reponseTemp = $util->testInput($_POST['reponse']);
    if($reponseTemp == 'choix1'){
      $reponse = $util->testInput($_POST['choix1']);
    }
    if($reponseTemp == 'choix2'){
      $reponse = $util->testInput($_POST['choix2']);
    }
    if($reponseTemp == 'choix3'){
      $reponse = $util->testInput($_POST['choix3']);
    }
    if($reponseTemp == 'choix4'){
      $reponse = $util->testInput($_POST['choix4']);
    }
    $evaluation = $util->testInput($_POST['evaluation']);

   
  //inserer les informations dans la database
  if ($db->insertQst($question, $choix1, $choix2, $choix3, $choix4,$reponse,$evaluation)) {
    echo $util->showMessage('info', 'Operation validée');
  } else {
    echo $util->showMessage('danger', 'Opération échoué');
  }
 }



    // Handle ajouter note Ajax Request
    if (isset($_POST['add-note'])) {

      $id_examen = $util->testInput($_POST['id_examen']);
      $id_user = $util->testInput($_POST['id_user']);
      $note_examen = $util->testInput($_POST['note_examen']); 

    //inserer les informations dans la database
    if ($db->insertNote($id_examen, $id_user,$note_examen)) {
      echo $util->showMessage('info', 'Operation validée');
    } else {
      echo $util->showMessage('danger', 'Opération échoué');
    }
   }



    // Handle ajouter module Ajax Request
if (isset($_POST['add-module'])) {

      $module = $util->testInput($_POST['module']);
      $responsable = $util->testInput($_POST['responsable']);
      $semestre = $util->testInput($_POST['semestre']);  
     
    //inserer les informations dans la database
    if ($db->insertModule($module, $responsable, $semestre )) {
      echo $util->showMessage('info', 'Operation validée');
    } else {
      echo $util->showMessage('danger', 'Opération échoué');
    }
}

 //edit profile 
 if (isset($_POST['edit-profile'])) {
  $id = $util->testInput($_POST['id']);
  $nom_complet = $util->testInput($_POST['nom_complet']);
  $email = $util->testInput($_POST['email']);
  $cin_cne = $util->testInput($_POST['cin_cne']); 
  $date_naissance = $util->testInput($_POST['date_naissance']);
  $age = $util->testInput($_POST['age']);
  $online ='yes'/*  $util->testInput($_POST['online']) */;
  $module = 'sed' /* $util->testInput($_POST['module']) */;

 
//update les informations dans la database
if ($db->updateProfile($id,$nom_complet, $email, $cin_cne, $date_naissance,$age)) {
  echo $util->showMessage('info', 'Operation validée');
} else {
  echo $util->showMessage('danger', 'Opération échoué');
}
}



// Handle ajouter utilisateur Ajax Request from admin 
 if (isset($_POST['add-user'])) {

  $nom_complet = $util->testInput($_POST['nom_complet']);
  $email = $util->testInput($_POST['email']);
  $password = $util->testInput($_POST['password']);
  $cin_cne =  $util->testInput($_POST['cin_cne']); 
  $date_naissance = $util->testInput($_POST['date_naissance']);
  $type = $util->testInput($_POST['type']);
  $age = $util->testInput($_POST['age']);
  $online ='yes'/*  $util->testInput($_POST['online']) */;
  $module =$util->testInput($_POST['module']);
 
//inserer les informations dans la database
if ($db->insert($nom_complet, $email, $password, $cin_cne,$date_naissance, $type,$age, $online,$module)) {
  echo $util->showMessage('info', 'Operation validée');
} else {
  echo $util->showMessage('danger', 'Opération échoué');
}
}

  // Handle ajouter examen Ajax Request

  if (isset($_POST['add-examen'])) {

    $nom = $util->testInput($_POST['nom']);
    $module = $util->testInput($_POST['module']);
    $auteur = $util->testInput($_POST['auteur']);
    $duree = $util->testInput($_POST['duree']);
    $date = $util->testInput($_POST['date']);
    $etat = $util->testInput($_POST['etat']);
   
  //inserer les informations dans la database
  if ($db->insertExamen($nom, $module, $auteur, $duree,$date,$etat )) {
    echo $util->showMessage('info', 'Operation validée');
  } else {
    echo $util->showMessage('danger', 'Opération échoué');
  }
 }




  // Handle supprimer examen Request
  if (isset($_GET['deleteexamen'])) {
    $id = $_GET['id'];
    if ($db->delete($id)) {
      echo $util->showMessage('info', 'Parent supprimé avec succès!');
    } else {
      echo $util->showMessage('danger', 'Opération échoué');
    }
  }
  
    // Handle supprimer utilisateur Request
    if (isset($_GET['deleteuser'])) {
      $id = $_GET['id'];
      if ($db->deleteuser($id)) {
        echo $util->showMessage('info', 'Parent supprimé avec succès!');
      } else {
        echo $util->showMessage('danger', 'Opération échoué');
      }
    }

  // Handle login Ajax Request 
  if (isset($_POST['login'])) {
    session_start() ; 

    $email = $util->testInput($_POST['email']);
    $password = $util->testInput($_POST['password']);
    $user = $db->login($email,$password)[0];
    $output = '';
    if ($email == $user['email'] && $password == $user['password']) {
      $output = 'login_yes'; 
      $_SESSION["id"] = $user["id"] ;
      $_SESSION["name"] = $user["nom_complet"] ;
      $_SESSION["email"] = $user["email"] ;
      $_SESSION["cin_cne"] = $user["cin_cne"] ;
      $_SESSION["date_naissance"] = $user["date_naissance"] ;
      $_SESSION["age"] = $user["age"] ;
      $_SESSION["type"] = $user["type"] ;

      echo $output;
    } else {
      $output = 'login_non'; 
    
    }
  }


    // Handle tous les parents RFID
    if (isset($_GET['utilisateur'])) {
        $user = $db->utilisateur();
        $output = '';
        $i = 1; 
        if ($user) {
          foreach ($user as $row) {
            $output .= '

                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                              <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">' . $row['nom_complet'] . '</h6>
                              <p class="text-xs text-secondary mb-0">' . $row['email'] . '</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Didactique</p>
                          <p class="text-xs text-secondary mb-0">Semestre 2</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">' . $row['type'] . '</span>
                        </td>
                        <td class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold">' . $row['age'] . '</span>
                        </td>
                        <td class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold">' . $row['cin_cne'] . '</span>
                        </td>
                        <td class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold">' . $row['date_naissance'] . '</span>
                        </td>
                        <td class="align-middle text-sm">
                            <a href="#" id="' . $row['id'] . '" class="badge badge-sm bg-gradient-info editLink" data-bs-toggle="modal" data-bs-target="#editUser">Edit</a>
                            <a href="#" id="' . $row['id'] . '" class="badge badge-sm bg-gradient-danger deleteLink">Delete</a>
                          </td>
                        </tr>



            ';
            $i++ ; 
          }
          echo $output; 
        } else {
          echo '<tr>
                  <td colspan="6">Aucun enregistrement trouvé dans la base de données!</td>
                </tr>';
        }
    }

//fetch examen de la databse 
if (isset($_GET['examen'])) {
  $examen = $db->examen();
  $output = '';
  $i = 1; 
  if ($examen) {
    if  ($_SESSION["type"] == "Administrateur" ){
      foreach ($examen as $row) {
        $output .= '
      <tr>
        <td>
          <span class="text-sm font-weight-bold px-3">' . $row['nom'] . '</span>
        </td>
        <td>
          <span class="text-sm font-weight-bold">' . $row['module'] . '</span>
        </td>
        <td>
          <span class="text-xs font-weight-bold">' . $row['auteur'] . '</span>
        </td>
        <td >
          <div class="my-auto">
            <span class="me-2 text-xs font-weight-bold">' . $row['duree'] . '</span>
          </div>
        </td>
        <td class="align-middle">
          <span class="text-xs font-weight-bold">' . $row['date'] . '</span>
        </td>
        <td class="align-middle text-sm">
          <span class="badge badge-sm bg-gradient-success">' . $row['etat'] . '</span>
        </td>
        <td class="align-middle text-sm">
          <a href="#" id="' . $row['id'] . '" class="badge badge-sm bg-gradient-info editLink" data-bs-toggle="modal" data-bs-target="#editExamen">Edit</a>
          <a href="#" id="' . $row['id'] . '" class="badge badge-sm bg-gradient-danger deleteLink">Delete</a>
        </td>
      </tr>
        ';
        $i++ ; 
      }
    }
    if  ($_SESSION["type"] == "Apprenant" ){
      foreach ($examen as $row) {
        $action = '' ; 

        if($examenCheck = $db->checkIsPass($row['id'])) {
          if($examenCheck['is_pass'] = 'yes' && $examenCheck['id_user'] == $_SESSION["id"] && $examenCheck['id_examen'] == $row['id']){
            $action = '<button type="button" class="badge badge-sm bg-gradient-info">Complet</button>' ; 
          } else{

          } 
        }else {
          $action = '<a href="qcm.php?' . $row['id'] . '" id="' . $row['id'] . '" class="passButton badge badge-sm bg-gradient-primary">Pass</a>' ;
        }

        if($moduleNome = $db->moduleReadOne($row['module'])) {
            $module = $moduleNome['module']  ; 
            $semestre =  $moduleNome['semestre']  ; 
          }
          else {
            $module = 'aucun module trouvé';
            $semestre = 'aucun module trouvé';
          }

      

        $output .= '
      <tr>
        <td>
          <span class="text-sm font-weight-bold px-3">' . $row['nom'] . '</span>
        </td>
        <td>
          <span class="text-sm font-weight-bold">' . $module . '</span>
        </td>
        <td>
          <span class="text-xs font-weight-bold">' . $row['auteur'] . '</span>
        </td>
        <td >
          <div class="my-auto">
            <span class="me-2 text-xs font-weight-bold">' . $row['duree'] . '</span>
          </div>
        </td>
        <td class="align-middle">
          <span class="text-xs font-weight-bold">' . $row['date'] . '</span>
        </td>
        <td class="align-middle text-sm">
          <span class="badge badge-sm bg-gradient-success">' . $semestre . '</span>
        </td>
        <td class="align-middle text-sm">
          '.$action.'
        </td>
      </tr>
        ';
        $i++ ; 
      }
    }
    echo $output;
  } else {
    echo '<tr>
            <td colspan="6">Aucun enregistrement trouvé dans la base de données!</td>
          </tr>';
  }
}


//fetch examen de la databse question page 
if (isset($_GET['evaluationNom'])) {
  $examen = $db->examen();
  $output = '';
  $i = 1; 
  if ($examen) {
    foreach ($examen as $row) {
      $output .= '
        <option value="' . $row['id'] . '">' . $row['nom'] . '</option>
      ';
      $i++ ; 
    }
    echo $output;
  } else {
    echo '<tr>
            <td colspan="6">Aucun enregistrement trouvé dans la base de données!</td>
          </tr>';
  }
}

if (isset($_GET['ModuleNom'])) {
  $module = $db->module();
  $output = '';
  $i = 1; 
  if ($module) {
    foreach ($module as $row) {
      $output .= '
        <option value="' . $row['id'] . '">' . $row['module'] . '</option>
      ';
      $i++ ; 
    }
    echo $output;
  } else {
    echo '<tr>
            <td colspan="6">Aucun enregistrement trouvé dans la base de données!</td>
          </tr>';
  }
}


  // Handle modifier examen Ajax Request
  if (isset($_GET['editexamen'])) {
    $id = $_GET['id'];

    $user = $db->readOne($id);
    echo json_encode($user);
  }

    //fetch time and nom evaluation
    if (isset($_GET['readNomTime'])) {
      $id = $_GET['id'];
  
      $user = $db->readNomTime($id);
      echo json_encode($user);
    }

    // Handle modifier user Ajax Request
  if (isset($_GET['edituser'])) {
    $id = $_GET['id'];

    $user = $db->readOneUser($id);
    echo json_encode($user);
  }

  //fetch user profile info 
  if (isset($_GET['userProfile'])) {
    $id = $_GET['id'];

    $user = $db->readOneUser($id);
    echo json_encode($user);
  }


    // Handle evaluation Ajax Request

  if (isset($_GET['readEvaluation'])) {
    $user = $db->readEvaluation();
    echo json_encode($user);
  }

  if (isset($_GET['readEvaluations'])) {
    $id = $_GET['id'];
    $user = $db->readEvaluations($id);
    echo json_encode($user);
  }




