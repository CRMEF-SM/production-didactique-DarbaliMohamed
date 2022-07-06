
class Question {
    constructor(text, choices, answer) {
      this.text = text;
      this.choices = choices;
      this.answer = answer;
    }
    isCorrectAnswer(choice) {
      return this.answer === choice;
    }
  }




  const fetchevaluationqst = async () => {
    var url_id = window.location.search;
    url_id = url_id.replace("?", ''); 
    const data = await fetch(`../action.php?readEvaluations=1&id=${url_id}`, {
      method: "GET",
    });
    const response = await data.json();

    const quizData = response ;
    const id_examen =quizData[0].evaluation ;
    const id_user = document.getElementById("id_user").value;

    
    

  let questions = [];
  for (var i = 0; i < quizData.length; i++) {
    questions.push(new Question(quizData[i].question, [quizData[i].choix1,quizData[i].choix2, quizData[i].choix3, quizData[i].choix3],quizData[i].reponse)); 
}
    
  class Quiz {
    constructor(questions) {
      this.score = 0;
      this.questions = questions;
      this.currentQuestionIndex = 0;
    }
    getCurrentQuestion() {
      return this.questions[this.currentQuestionIndex];
    }
    guess(answer) {
      if (this.getCurrentQuestion().isCorrectAnswer(answer)) {
        this.score++;
      }
      this.currentQuestionIndex++;
    }
    hasEnded() {
      return this.currentQuestionIndex >= this.questions.length;
    }
  }
  
  // Regroup all  functions relative to the App Display
  const display = {
    elementShown: function(id, text) {
      let element = document.getElementById(id);
      element.innerHTML = text;
    },
    endQuiz: function() {
      endQuizHTML = `
    <form id="add-note">
        <div class="showAlert"></div>
        <input type="hidden" id="id_examen" name="id_examen" value="${id_examen}">
        <input type="hidden" id="id_user" name="id_user" value="${id_user}">
        <h1>Quiz terminé !</h1>
        <h3> Votre score est de : ${quiz.score} / ${quiz.questions.length}</h3>
        <input type="hidden" id="note_final" name="note_examen" value="${quiz.score}">
        <button type="submit" id="terminer-examen" class="btn btn-primary">Terminer</button>
        <a href="evaluation.php" id="endExamen" class="btn btn-primary d-none">page d'acceuil</a>
    </form>`;      
      this.elementShown("quiz", endQuizHTML);

      const addNote = document.getElementById("add-note");
        const showAlert = document.querySelector(".showAlert");

        addNote.addEventListener("submit", async (e) => {
        e.preventDefault();
      
        const formData = new FormData(addNote);
        formData.append("add-note", 1);
      
      
        if (addNote.checkValidity() === false) {
    /*       e.preventDefault();
          e.stopPropagation(); */
          addNote.classList.add("was-validated");
          return false;
        } else {
      
          const data = await fetch("../action.php", {
            method: "POST",
            body: formData,
          });
          const response = await data.text();
          showAlert.innerHTML = response ;
          document.getElementById('terminer-examen').style.display = 'none' ;
          var element = document.getElementById("endExamen");
          element.classList.remove("d-none");

        }
      });
    },
    question: function() {
      this.elementShown("question", quiz.getCurrentQuestion().text);
    },
    choices: function() {
      let choices = quiz.getCurrentQuestion().choices;
  
      guessHandler = (id, guess) => {
        document.getElementById(id).onclick = function() {
          quiz.guess(guess);
          quizApp();
        }
      }
      // display choices and handle guess
      for(let i = 0; i < choices.length; i++) {
        this.elementShown("choice" + i, choices[i]);
        guessHandler("guess" + i, choices[i]);
      }
    },
    progress: function() {
      let currentQuestionNumber = quiz.currentQuestionIndex + 1;
      this.elementShown("progress", "Question " + currentQuestionNumber + " sur " + quiz.questions.length);
    },
  };
  
  // Game logic
  quizApp = () => {
    if (quiz.hasEnded()) {
      display.endQuiz();
    } else {
      display.question();
      display.choices();
      display.progress();
    } 
  }
  // Create Quiz
  let quiz = new Quiz(questions);
  quizApp();
  
  console.log(quiz);


  }
  fetchevaluationqst() ;





  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var end =setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            window.location = "http://www.google.com";
            clearInterval(end);
        }
    }, 1000);
}


const fetchevaluatiodnqst = async () => {
  var url_id = window.location.search;
  url_id = url_id.replace("?", ''); 
  const data = await fetch(`../action.php?readNomTime=1&id=${url_id}`, {
    method: "GET",
  });
  const response = await data.json();
  document.getElementById('nomExamen').innerHTML = response[0].nom;


  var duree = 60 * response[0].duree ;
  window.onload = countDonwn(duree) ;
  
  function countDonwn(duree) {
    var fiveMinutes = duree,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};

}; 
fetchevaluatiodnqst();


