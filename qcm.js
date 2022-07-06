


const fetchevaluationqst = async () => {
    const data = await fetch("../action.php?readEvaluation=1", {
      method: "GET",
    });
    const response = await data.json();

    const quizData = response ;
    
    console.log(quizData);
    
    const quiz= document.getElementById('quiz')
    const answerEls = document.querySelectorAll('.answer')
    const questionEl = document.getElementById('question')
    const a_text = document.getElementById('a_text')
    const b_text = document.getElementById('b_text')
    const c_text = document.getElementById('c_text')
    const d_text = document.getElementById('d_text')
    const submitBtn = document.getElementById('submit')

    
    
    let currentQuiz = 0
    let score = 0
    
    loadQuiz()
    
    function loadQuiz() {
    
        deselectAnswers()
    
        const currentQuizData = quizData[currentQuiz]
    
        questionEl.innerText = currentQuizData.question
        a_text.innerText = currentQuizData.choix1
        b_text.innerText = currentQuizData.choix2
        c_text.innerText = currentQuizData.choix3
        d_text.innerText = currentQuizData.reponse
    }
    
    function deselectAnswers() {
        answerEls.forEach(answerEl => answerEl.checked = false)
    }
    
    function getSelected() {
        let answer
        answerEls.forEach(answerEl => {
            if(answerEl.checked) {
                answer = answerEl.id
            }
        })
        return answer
    }
    
    
    submitBtn.addEventListener('click', () => {
        const answer = getSelected()
        if(answer) {
           if(answer === quizData[currentQuiz].reponse) {
               score++
           }
    
           currentQuiz++
    
           if(currentQuiz < quizData.length) {
               loadQuiz()
           } else {
               quiz.innerHTML = `
                <div class="text-center">
                <div class="text-center">
                <img src="logo.png" class="img-fluid my-1" alt="">
            </div>
                <h2>Vous avez répondu correctement à ${score}/${quizData.length} questions</h2>
                <button class="btn btn-primary w-100 my-1" onclick="location.reload()">Lancer à nouveau</button>
                <a href="index.html" class="btn btn-primary w-100 my-1" >Page d'accuiel</a>
                <div class="text-center my-3 text-break">
                    Développé par : Darbali Mohamed
                </div>
                </div>
               `
           }
        }
    })
    

  };
  fetchevaluationqst(); 



