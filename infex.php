<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Kwar9 VPN Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- Base Setup --- */
        * { box-sizing: border-box; margin: 0; padding: 0; -webkit-tap-highlight-color: transparent; }
        
        body {
            background-color: #050505;
            background-image: linear-gradient(135deg, #0a0a12 0%, #161625 100%);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            color: #fff;
        }

        /* --- Main Card --- */
        .cyber-card {
            background: rgba(20, 20, 30, 0.85);
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px 25px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
            position: relative;
        }

        .cyber-card::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; width: 100%; height: 2px;
            background: linear-gradient(90deg, #00d2ff, #ff0099);
        }

        /* --- Refresh Button Style --- */
        .refresh-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.5);
            font-size: 1.2rem;
            cursor: pointer;
            transition: 0.4s;
            z-index: 20;
        }

        .refresh-btn:hover {
            color: #00d2ff;
            transform: rotate(180deg); /* Mouse တင်ရင် လည်သွားမယ် */
        }

        /* --- Typography --- */
        h2 {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.6rem;
            margin-bottom: 5px;
            background: linear-gradient(90deg, #00d2ff, #fff, #ff0099);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* --- Inputs --- */
        .input-group { position: relative; margin-bottom: 15px; }
        .input-group i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #00d2ff; }
        .input-group input {
            width: 100%; padding: 12px 15px 12px 45px;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            outline: none;
        }

        /* --- Action Button --- */
        #btn {
            width: 100%; padding: 14px; border: none; border-radius: 10px;
            background: linear-gradient(90deg, #00d2ff, #0066ff);
            color: white; font-family: 'Orbitron', sans-serif;
            font-weight: bold; cursor: pointer; margin-top: 10px;
        }

        /* --- Footer Link --- */
        .footer-link {
            margin-top: 30px;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.05);
            padding: 8px 16px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* --- Alerts --- */
        .alert { margin-top: 15px; padding: 10px; border-radius: 5px; font-size: 0.9rem; }
        .alert-success { color: #00ff88; background: rgba(0, 255, 136, 0.1); border: 1px solid #00ff88; }
        .alert-error { color: #ff3333; background: rgba(255, 51, 51, 0.1); border: 1px solid #ff3333; }

    </style>
</head>
<body>

    <div class="cyber-card">
        <button class="refresh-btn" onclick="window.location.href=window.location.href" title="Refresh Page">
            <i class="fas fa-sync-alt"></i>
        </button>

        <h2>Kwar9 VPN</h2>
        <p style="color:#00d2ff; font-size:0.8rem; margin-bottom:20px; font-weight:bold;">PREMIUM ACCESS</p>
        <p style="color:#; font-size:8px;">သင့်ရဲ့ အခမဲ့ ၂ရက်သက်တမ်း Premium ကို HWID Key ထည့်၍ ချက်ချင်းရယူပါ </p><br>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['username']);
            $key = htmlspecialchars($_POST['userkey']);
            
            // Auto generate key if empty
            if(empty($key)) {
                $key = substr(md5(time()), 0, 10); 
            }

            $file = 'user.json';
            
            // Read Data
            $current_data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
            if (!is_array($current_data)) $current_data = [];

            // Check Duplicate
            $isDuplicate = false;
            foreach ($current_data as $item) {
                if (($item['Key'] ?? '') === $key) {
                    $isDuplicate = true;
                    break;
                }
            }

            if ($isDuplicate) {
                echo "<div class='alert alert-error'>❌ Key already exists!</div>";
            } else {
                // Add New User
                $new_user = [
                    "Name" => $name,
                    "Key" => $key,
                    "Valid" => "1",
                    "InfoMessage" => "2 Days Premium",
                    "Expiration" => date('Y-m-d', strtotime('+2 days'))
                ];

                $current_data[] = $new_user;

                // Save
                if(file_put_contents($file, json_encode($current_data, JSON_PRETTY_PRINT))) {
                    echo "<div class='alert alert-success'>✅ Activated: $name</div>";
                } else {
                    echo "<div class='alert alert-error'>⚠️ Write Permission Error!</div>";
                }
            }
        }
        ?>

        <form method="POST">
            <br>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required autocomplete="off">
                <i class="fas fa-user"></i>
            </div>

            <div class="input-group">
                <input type="text" name="userkey" placeholder="Enter HWID Key" autocomplete="off">
                <i class="fas fa-key"></i>
            </div>

            <button type="submit" id="btn">ACTIVATE NOW</button>
        </form>
    </div>

    <a href="https://m.me/taknds69" target="_blank" class="footer-link">
        <i class="fab fa-facebook-messenger"></i> Contact Admin
    </a>

</body>
</html>
,
