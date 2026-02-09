<!DOCTYPE html>
<html lang="my">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Kwar9 VPN Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* --- Base Design --- */
        * { box-sizing: border-box; margin: 0; padding: 0; -webkit-tap-highlight-color: transparent; }
        body {
            background-color: #050505;
            background-image: linear-gradient(135deg, #0a0a12 0%, #161625 100%);
            height: 100vh; display: flex; flex-direction: column; justify-content: center; align-items: center;
            font-family: 'Poppins', sans-serif; overflow: hidden; color: #fff;
        }
        .cyber-card {
            background: rgba(20, 20, 30, 0.85); backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 20px;
            padding: 30px 25px; width: 90%; max-width: 400px; text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5); position: relative;
        }
        .cyber-card::after {
            content: ''; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px;
            background: linear-gradient(90deg, #00d2ff, #ff0099);
        }
        h2 {
            font-family: 'Orbitron', sans-serif; font-size: 1.6rem; margin-bottom: 5px;
            background: linear-gradient(90deg, #00d2ff, #fff, #ff0099); -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        }
        .input-group { position: relative; margin-bottom: 15px; }
        .input-group i { position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: #00d2ff; }
        .input-group input {
            width: 100%; padding: 12px 15px 12px 45px; background: rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 10px; color: #fff; outline: none;
        }
        #btn {
            width: 100%; padding: 14px; border: none; border-radius: 10px;
            background: linear-gradient(90deg, #00d2ff, #0066ff); color: white; font-family: 'Orbitron', sans-serif;
            font-weight: bold; cursor: pointer; margin-top: 10px;
        }
        .footer-link {
            margin-top: 30px; font-size: 0.85rem; color: rgba(255, 255, 255, 0.6); text-decoration: none;
            display: flex; align-items: center; gap: 8px; background: rgba(255, 255, 255, 0.05);
            padding: 8px 16px; border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.1);
        }
        #msg { margin-top: 15px; font-size: 0.9rem; min-height: 20px; }
        .success { color: #00ff88; } .error { color: #ff3333; }
        
        /* Refresh Button */
        .refresh-btn {
            position: absolute; top: 20px; right: 20px; background: none; border: none;
            color: rgba(255, 255, 255, 0.5); font-size: 1.2rem; cursor: pointer; transition: 0.4s; z-index: 20;
        }
        .refresh-btn:hover { color: #00d2ff; transform: rotate(180deg); }
    </style>
</head>
<body>

    <div class="cyber-card">
        <button class="refresh-btn" onclick="window.location.reload()" title="Refresh Page">
            <i class="fas fa-sync-alt"></i>
        </button>

        <h2>Kwar9 VPN</h2>
        <p style="color:#00d2ff; font-size:0.8rem; margin-bottom:20px; font-weight:bold;">PREMIUM ACCESS</p>

        <div class="input-group">
            <input type="text" id="username" placeholder="Username" autocomplete="off">
            <i class="fas fa-user"></i>
        </div>

        <div class="input-group">
            <input type="text" id="userkey" placeholder="Enter HWID Key" autocomplete="off">
            <i class="fas fa-key"></i>
        </div>

        <button onclick="submitKey()" id="btn">ACTIVATE NOW</button>
        <div id="msg"></div>
    </div>

    <a href="https://m.me/taknds69" target="_blank" class="footer-link">
        <i class="fab fa-facebook-messenger"></i> Contact Admin
    </a>

    <script>
        async function submitKey() {
            const name = document.getElementById('username').value.trim();
            const key = document.getElementById('userkey').value.trim();
            const btn = document.getElementById('btn');
            const msg = document.getElementById('msg');

            if(!name) return alert("Please enter a username");

            btn.disabled = true;
            btn.innerHTML = "<i class='fas fa-circle-notch fa-spin'></i> PROCESSING...";
            msg.innerHTML = "";

            try {
                // api.php ကို လှမ်းခေါ်ခြင်း
                const res = await fetch('api.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ username: name, userkey: key })
                });
                
                const data = await res.json();

                if(data.status === 'success') {
                    msg.innerHTML = `<span class='success'><i class='fas fa-check-circle'></i> ${data.message}</span>`;
                    document.getElementById('username').value = "";
                    document.getElementById('userkey').value = "";
                } else {
                    msg.innerHTML = `<span class='error'><i class='fas fa-times-circle'></i> ${data.message}</span>`;
                }
            } catch (err) {
                msg.innerHTML = "<span class='error'>Connection Error!</span>";
            }

            btn.disabled = false;
            btn.innerHTML = "ACTIVATE NOW";
        }
    </script>
</body>
</html>
