const addUserAdmin = document.getElementById("add-user-admin");
const utilisateur = document.getElementById("utilisateur");


addUserAdmin.addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const formData = new FormData(addUserAdmin);
    formData.append("add-user", 1);
  
    if (addUserAdmin.checkValidity() === false) {
/*       e.preventDefault();
      e.stopPropagation(); */
      addUserAdmin.classList.add("was-validated");
      return false;
    } else {
  
      const data = await fetch("../action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
      showAlert.innerHTML = response;
      location.reload();
    }
  });

  // Fetch tous les utilisateur Ajax Request
const fetchAllUsers = async () => {
  const data = await fetch("../action.php?utilisateur=1", {
    method: "GET",
  });
  const response = await data.text();
  utilisateur.innerHTML = response;
};
fetchAllUsers();

  // supprimer user Ajax Request
  utilisateur.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.deleteLink")) {
      e.preventDefault();
      let id = e.target.getAttribute("id");
      deleteUser(id);
    }
  });
  
  const deleteUser = async (id) => {
    const data = await fetch(`../action.php?deleteuser=1&id=${id}`, {
      method: "GET",
    });
    const response = await data.text();
   /*  showAlert.innerHTML = response; */
   fetchAllUsers(); 
  };

  utilisateur.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.editLink")) {
      e.preventDefault();
      let id = e.target.getAttribute("id");
      editUser(id);
    }
  });
  
  const editUser = async (id) => {
    const data = await fetch(`../action.php?edituser=1&id=${id}`, {
      method: "GET",
    });
    const response = await data.json();
    document.getElementById("nom_complet").value = response.nom_complet;
    document.getElementById("email").value = response.email;
    document.getElementById("age").value = response.age;
    document.getElementById("cin_cne").value = response.cin_cne;
    document.getElementById("age").value = response.age;

  };
