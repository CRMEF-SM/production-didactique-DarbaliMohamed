<?php

  require_once 'config.php';

  class Database extends Config {
    // Insert User Into Database
    public function insert($nom_complet, $email, $password, $cin_cne, $date_naissance,$type,$age,$online,$module ) {
      $sql = 'INSERT INTO users (nom_complet, email, password, cin_cne, date_naissance,type,age,online,module) 
      VALUES (:nom_complet, :email, :password, :cin_cne, :date_naissance, :type, :age, :online, :module)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'nom_complet' => $nom_complet,
        'email' => $email,
        'password' => $password,
        'cin_cne' => $cin_cne,
        'date_naissance' => $date_naissance,
        'type' => $type,
        'age' => $age,
        'online' => $online,
        'module' => $module
      ]);
      return true;
    }

    //edit profile 
    public function updateProfile($id,$nom_complet, $email, $cin_cne, $date_naissance,$age) {
      $sql = "UPDATE users SET nom_complet=?, email=?, cin_cne=? , date_naissance=? , age=? WHERE id=?";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
      $nom_complet, $email, $cin_cne, $date_naissance,$age,$id
      ]);
      return true;
    }

    //insert qustion 
    public function insertQst($question, $choix1, $choix2, $choix3, $choix4,$reponse,$evaluation ) {
      $sql = 'INSERT INTO question (question, choix1, choix2, choix3, choix4,reponse,evaluation) 
      VALUES (?,?,?,?,?,?,?)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        $question, $choix1, $choix2, $choix3, $choix4,$reponse,$evaluation 
      ]);
      return true;
    }


        //insert note 
    public function insertNote($id_examen, $id_user, $note_examen ) {
      $is_pass = 'yes' ;
      $sql = 'INSERT INTO notes (id_examen, id_user, is_pass, note_examen) 
      VALUES (?,?,?,?)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        $id_examen, $id_user,$is_pass, $note_examen
      ]);
      return true;
    }

    //insert examen into database 
    public function insertExamen($nom, $module, $auteur, $duree,$date,$etat ) {
      $sql = 'INSERT INTO test (nom, module, auteur, duree, date,etat) 
      VALUES (:nom, :module, :auteur, :duree, :date, :etat)';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'nom' => $nom,
        'module' => $module,
        'auteur' => $auteur,
        'duree' => $duree,
        'date' => $date,
        'etat' => $etat
      ]);
      return true;
    }

        // Insert module Into Database
        public function insertModule($module, $responsable, $semestre ) {
          $sql = 'INSERT INTO module (module, responsable, semestre) 
          VALUES (?,?,?)';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
            $module, $responsable, $semestre
          ]);
          return true;
        }


    // Fetch login dans la Database
    public function login($email,$password) {
      $sql = 'SELECT * FROM users WHERE email = :email AND password = :password ';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute([
        'email' => $email,
        'password' => $password,
      ]);
      $result = $stmt->fetchAll();
      return $result;
  }



    // Fetch tous les utilisateur de la Database
    public function read() {
      $sql = 'SELECT * FROM users ORDER BY id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } 

      // Fetch tous les evaluation de la Database
    public function readEvaluation() {
      $sql = 'SELECT * FROM question JOIN test ON test.id = question.evaluation';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    public function readNomTime($id) {
      $sql = 'SELECT * FROM test WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetchAll();
      return $result;
    }
      // Fetch tous les evaluation de la Database with id
    public function readEvaluations($id) {
      $sql = 'SELECT * FROM question WHERE evaluation = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetchAll();
      return $result;
    }

    public function utilisateur() {
      $sql = 'SELECT * FROM users ORDER BY id DESC';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    // Fetch tous les examens de la Database

    public function examen() {
      $sql = 'SELECT * FROM test';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    public function module() {
      $sql = 'SELECT * FROM module';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }

    public function moduleReadOne($id) {
      $sql = 'SELECT * FROM module WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }
    

    public function examenNormal() {
      $sql = 'SELECT * FROM test';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    }


        // Fcheck if examen pass 
        public function checkIsPass($id) {
          $sql = 'SELECT * FROM notes WHERE id_examen = :id';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(['id' => $id]);
          $result = $stmt->fetch();
          return $result;
        }


    // Fetch un examen dans la Database
    public function readOne($id) {
      $sql = 'SELECT * FROM test WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      $result = $stmt->fetch();
      return $result;
    }

       // Fetch un utilisateur dans la Database
       public function readOneUser($id) {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result;
      }
  

    // supprimer un examen dans la Database
    public function delete($id) {
      $sql = 'DELETE FROM test WHERE id = :id';
      $stmt = $this->conn->prepare($sql);
      $stmt->execute(['id' => $id]);
      return true;
    }

        // supprimer un utilisateur dans la Database
        public function deleteuser($id) {
          $sql = 'DELETE FROM users WHERE id = :id';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute(['id' => $id]);
          return true;
        }

        
    // changer la disponibilié du parent non
    public function updateDisponibleNon($id) {
        $disponible = "non";
        $sql = 'UPDATE parents SET disponible = :disponible WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
          'disponible' =>  $disponible,
          'id' => $id
        ]);
        return true;
    }

 

  }

?>