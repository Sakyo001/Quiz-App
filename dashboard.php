<?php
    include('config.php');

    if(isset($_SESSION['user_id'])){
        header('Location: dashboard.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Dashboard</title>
    <link rel="stylesheet" href="quiz.css">
    <!-- Add this line to include Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script defer src="quiz.js"></script>
</head>
<body>

<div class="container">
    <h1 class="title">Quiz App</h1>
    <audio id="background-music" loop>
        <source src="background_music.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
    <div id="quiz-content">
        <div id="timer" class="zoom-effect">Timer: 10s</div>
        <div id="question-container">
            <p id="question"></p>
            <ul id="options" class="options"></ul>
        </div>
        <button id="prev-button" onclick="prevQuestion()">Previous</button>
        <button id="next-button" onclick="nextQuestion()">Next</button>
        <button id="finish-button" onclick="finishQuiz()">Finish Quiz</button>
        <div id="result" class="neon-effect" style="display: none;">
            <div id="neon-message">
                <p id="congrats-message"></p>
                <p id="score-message"></p>
                <button id="try-again-button" onclick="startQuiz()">Try Again</button>
            </div>
        </div>
    </div>
    <!-- Add the mute/unmute button with the Font Awesome icon -->
    <button id="mute-button" onclick="toggleMute()">
        <i class="fas fa-volume-up"></i>
    </button>
    <a href="index.php" id="logout-button">Logout</a>
</div>



<script src="quiz.js"></script>


</body>
</html>
