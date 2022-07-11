const addExamen = document.getElementById("add-examen");
const examen = document.getElementById("examen");
const module = document.getElementById("module");



addExamen.addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const formData = new FormData(addExamen);
    formData.append("add-examen", 1);
  
    if (addExamen.checkValidity() === false) {
/*       e.preventDefault();
      e.stopPropagation(); */
      addExamen.classList.add("was-validated");
      return false;
    } else {
  
      const data = await fetch("../action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
     /*  showAlert.innerHTML = response; */
      location.reload();
    }
  });

  // Fetch tous les examens Ajax Request
const fetchTest = async () => {
  const data = await fetch("../action.php?examen=1", {
    method: "GET",
  });
  const response = await data.text();
  examen.innerHTML = response;
};
fetchTest(); 

const fetchModule = async () => {
  const data = await fetch("../action.php?ModuleNom=1", {
    method: "GET",
  });
  const response = await data.text();
  module.innerHTML = response;
};
fetchModule(); 

 
// Modifier examen Ajax Request
examen.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.editLink")) {
      e.preventDefault();
      let id = e.target.getAttribute("id");
      editUser(id);
    }
  });
  
  const editUser = async (id) => {
    const data = await fetch(`../action.php?editexamen=1&id=${id}`, {
      method: "GET",
    });
    const response = await data.json();
    document.getElementById("nom").value = response.nom;
    document.getElementById("duree").value = response.duree;
    document.getElementById("date").value = response.date;

  };

  // supprimer user Ajax Request
  examen.addEventListener("click", (e) => {
    if (e.target && e.target.matches("a.deleteLink")) {
      e.preventDefault();
      let id = e.target.getAttribute("id");
      deleteExamen(id);
    }
  });
  
  const deleteExamen = async (id) => {
    const data = await fetch(`../action.php?deleteexamen=1&id=${id}`, {
      method: "GET",
    });
    const response = await data.text();
   /*  showAlert.innerHTML = response; */
    fetchTest(); 
  
  };


