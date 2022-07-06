const signUp = document.getElementById("sign-up");
const signIn = document.getElementById("sign-in");



signUp.addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const formData = new FormData(signUp);
    formData.append("add", 1);
  
    if (signUp.checkValidity() === false) {
/*       e.preventDefault();
      e.stopPropagation(); */
      signUp.classList.add("was-validated");
      return false;
    } else {
      document.getElementById("sign-up-btn").value = "en progression ...";
  
      const data = await fetch("action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
      showAlert.innerHTML = response;
      document.getElementById("sign-up-btn").value = "Ajouter";
      signUp.reset();
      signUp.classList.remove("was-validated");
      window.location.href = "index.php";
    }
  });

  /* login */
 signIn.addEventListener("submit", async (e) => {
    alert("test")
    e.preventDefault();
    e.stopPropagation();
    const formData = new FormData(signIn);
    formData.append("login", 1);
    const login = async () => {
      const data = await fetch("action.php?login=1", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
      if(response == 'login_yes'){
        window.location.href = "http://www.w3schools.com";
      }
    };
    login();
    return false ;
  });

 
