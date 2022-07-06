const addQst = document.getElementById("add-qst");
const showAlert = document.getElementById("showAlert");
const evaluation = document.getElementById("evaluation");



addQst.addEventListener("submit", async (e) => {
    e.preventDefault();
  
    const formData = new FormData(addQst);
    formData.append("add-qst", 1);
  
    if (addQst.checkValidity() === false) {
e.preventDefault();
      e.stopPropagation(); 
      addQst.classList.add("was-validated");
      return false;
    } else {
  
      const data = await fetch("../action.php", {
        method: "POST",
        body: formData,
      });
      const response = await data.text();
    showAlert.innerHTML = response; 
   /*    location.reload(); */
    }
  });

  //fetch evaluation 

  const fetchevaluation = async () => {
    const data = await fetch("../action.php?evaluationNom=1", {
      method: "GET",
    });
    const response = await data.text();
    console.log(response) ;
    evaluation.innerHTML = response;
  };
  fetchevaluation(); 


  const fetchevaluationqst = async () => {
    const data = await fetch("../action.php?readEvaluation=1", {
      method: "GET",
    });
    const response = await data.json();
    console.log(response)
    console.log(response[0].question)
    console.log(response[1].question)
  };
  fetchevaluationqst(); 


