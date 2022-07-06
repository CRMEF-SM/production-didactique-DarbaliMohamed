const signUp = document.getElementById("sign-up");
const signIn = document.getElementById("sign-in");


  /* login */
 signIn.addEventListener("submit", async (e) => {
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
        window.location.href = "pages/dashboard.php";
      }
      else{
        window.location.href = "index.php";
        document.getElementById('sign-in-error').style.display="block" ; 
      }
    };
    login();
    return false ;
  });

 
