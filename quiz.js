document.addEventListener('DOMContentLoaded', function () {
    const timerElement = document.getElementById('timer');
    const questionElement = document.getElementById('question');
    const optionsElement = document.getElementById('options');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const finishButton = document.getElementById('finish-button');
    const tryAgainButton = document.getElementById('try-again-button');
    const resultElement = document.getElementById('result');
    const congratsMessageElement = document.getElementById('congrats-message');
    const scoreMessageElement = document.getElementById('score-message');
    const quizDiv = document.getElementById('question-container');
    const backgroundMusic = document.getElementById('background-music');
    const muteButton = document.getElementById('mute-button');
    const logoutButton = document.getElementById('logout-button');

    let timer;
    let timeLeft = 10;
    let currentQuestionIndex = 0;
    let score = 0;
    let isMuted = false;

    const questions = [
        {
            question: 'What is the capital of France?',
            options: ['Berlin', 'Paris', 'Madrid', 'Rome'],
            correctIndex: 1
        },
        {
            question: 'Which planet is known as the Red Planet?',
            options: ['Venus', 'Mars', 'Jupiter', 'Saturn'],
            correctIndex: 1
        },
        {
            question: 'What is the largest mammal?',
            options: ['Elephant', 'Blue Whale', 'Giraffe', 'Hippopotamus'],
            correctIndex: 1
        },
        {
            question: 'Which country is known as the Land of the Rising Sun?',
            options: ['China', 'Japan', 'South Korea', 'Vietnam'],
            correctIndex: 1
        },
        {
            question: 'Who wrote the play "Romeo and Juliet"?',
            options: ['William Shakespeare', 'Jane Austen', 'Charles Dickens', 'Leo Tolstoy'],
            correctIndex: 0
        },
        {
            question: 'What is the capital of Australia?',
            options: ['Sydney', 'Melbourne', 'Canberra', 'Brisbane'],
            correctIndex: 2
        },
        {
            question: 'Which element has the chemical symbol "O"?',
            options: ['Oxygen', 'Osmium', 'Oganesson', 'Osmium'],
            correctIndex: 0
        },
        {
            question: 'In which year did the Titanic sink?',
            options: ['1910', '1912', '1915', '1918'],
            correctIndex: 1
        }
        // Add more questions as needed
    ];
    

    function startQuiz() {
        prevButton.style.display = 'none';
        nextButton.style.display = 'block';
        finishButton.style.display = 'none';
        tryAgainButton.style.display = 'none';
        resultElement.style.display = 'none';
        timerElement.style.fontSize = '20px';

        timeLeft = 10;
        score = 0;
        currentQuestionIndex = 0;

        displayQuestion();
        startTimer();
    }

    function startTimer() {
        timer = setInterval(function () {
            if (timeLeft <= 0) {
                clearInterval(timer);
                finishQuiz();
            } else {
                timerElement.textContent = `Timer: ${timeLeft}s`;
                timeLeft--;
            }
        }, 1000);
    }

    function displayQuestion() {
        const currentQuestion = questions[currentQuestionIndex];
        questionElement.textContent = currentQuestion.question;

        optionsElement.innerHTML = '';
        currentQuestion.options.forEach((option, index) => {
            const optionItem = document.createElement('li');
            optionItem.textContent = option;
            optionItem.addEventListener('click', () => checkAnswer(index));
            optionsElement.appendChild(optionItem);
        });
    }

    function checkAnswer(selectedIndex) {
        const correctIndex = questions[currentQuestionIndex].correctIndex;
        if (selectedIndex === correctIndex) {
            score++;
        }
        nextQuestion();
    }

    function nextQuestion() {
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
            displayQuestion();
            prevButton.style.display = 'block';
        } else {
            finishQuiz();
        }
    }

    function prevQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            displayQuestion();
            if (currentQuestionIndex === 0) {
                prevButton.style.display = 'none';
            }
        }
    }

    function finishQuiz() {
        clearInterval(timer);
        nextButton.style.display = 'none';
        finishButton.style.display = 'none';
        tryAgainButton.style.display = 'block';
        resultElement.style.display = 'block';
        timerElement.style.fontSize = '30px';
        questionElement.style.display = 'none';
        optionsElement.style.display = 'none';
        timerElement.style.display = 'none';
        prevButton.style.display = 'none';
        nextButton.style.display = 'none';

        congratsMessageElement.textContent = 'Congratulations!';
        scoreMessageElement.textContent = `Your total score: ${score}/${questions.length}`;
    }

    function tryAgain() {
        resultElement.style.display = 'none';
        quizDiv.style.display = 'block';
        startQuiz();
    }

    function toggleMute() {
        isMuted = !isMuted;
        backgroundMusic.muted = isMuted;
        muteButton.textContent = isMuted ? 'Unmute 🔊' : 'Mute 🔇';
    }

    // Attach event listeners
    prevButton.addEventListener('click', prevQuestion);
    nextButton.addEventListener('click', nextQuestion);
    finishButton.addEventListener('click', finishQuiz);
    tryAgainButton.addEventListener('click', tryAgain);
    muteButton.addEventListener('click', toggleMute);

    startQuiz();
});