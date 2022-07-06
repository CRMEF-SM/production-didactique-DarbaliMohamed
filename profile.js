const profile = document.getElementById("edit-profile");
const showAlert = document.getElementById("showAlert");



profile.addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const formData = new FormData(profile);
    formData.append("edit-profile", 1);
  
    if (profile.checkValidity() === false) {
 e.preventDefault();
 e.stopPropagation(); 
profile.classList.add("was-validated"); 
      return false;
    } else {
  
      const data = await fetch("../action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
showAlert.innerHTML = response; 
console.log(response) ;
      location.reload();
   
    }
  });

let id = document.getElementById('id').value ;

const editUser = async (id) => {
    const data = await fetch(`../action.php?userProfile=1&id=${id}`, {
      method: "GET",
    });
    const response = await data.json();
    document.getElementById("nom_complet").value = response.nom_complet;
    document.getElementById("email").value = response.email;
    document.getElementById("age").value = response.age;
    document.getElementById("cin_cne").value = response.cin_cne;
    document.getElementById("type").value = response.type;
    document.getElementById("date_naissance").value = response.date_naissance;
  }; 
  editUser(id);