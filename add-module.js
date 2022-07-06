const addModule = document.getElementById("add-module");
const showAlert = document.getElementById("showAlert");




addModule.addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const formData = new FormData(addModule);
    formData.append("add-module", 1);
  
    if (addModule.checkValidity() === false) {
        e.preventDefault();
      e.stopPropagation();
      addModule.classList.add("was-validated");
      return false;
    } else {
  
      const data = await fetch("../action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
    showAlert.innerHTML = response;
    console.log(response);
    }
  });