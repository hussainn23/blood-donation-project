<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        
        .container {
            width: 400px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 4px;
            text-align: center;
            position: relative;
            top: -200px;
            opacity: 0;
            animation-name: dropAnimation;
            animation-duration: 0.5s;
            animation-delay: 0.5s;
            animation-fill-mode: forwards;
        }
        
        @keyframes dropAnimation {
            0% {
                top: -200px;
                opacity: 0;
            }
            100% {
                top: 0;
                opacity: 1;
            }
        }
        
        .container input[type="text"],
        .container input[type="email"],
        .container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            animation-name: animateOnce;
            animation-duration: 1s;
            animation-delay: 1s;
            animation-fill-mode: forwards;
        }
        
        @keyframes animateOnce {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .button {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <form action="#" method="post">
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" required><br>
            
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="5" required></textarea><br>
            
            <input type="submit" value="Send message" class="button">
        </form>
    </div>
</body>
</html>
