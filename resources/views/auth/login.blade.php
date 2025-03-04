<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login</title>
    <style>
        /* Mode Gelap & Terang */
        :root {
            --bg-color: #0A0F24;
            --text-color: #00FFC6;
            --button-bg: #00FFC6;
            --button-hover: #00CC99;
            --input-bg: #1A233A;
            --border-color: #00FFC6;
        }

        body {
            background: var(--bg-color);
            color: var(--text-color);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
            text-align: center;
            overflow: hidden;
        }

        /* Latar belakang Globe */
        .globe-container {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 300px;
            height: 300px;
            background: url('https://upload.wikimedia.org/wikipedia/commons/8/8d/Earth_Western_Hemisphere_transparent_background.png') no-repeat center center;
            background-size: cover;
            border-radius: 50%;
            box-shadow: 0 0 40px rgba(0, 255, 198, 0.5);
            animation: rotateGlobe 10s linear infinite;
        }

        @keyframes rotateGlobe {
            from { transform: translate(-50%, -50%) rotate(0deg); }
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Teks Welcome */
        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            animation: glitch 1s infinite alternate;
        }

        @keyframes glitch {
            0% { text-shadow: 2px 2px #00FFC6; }
            100% { text-shadow: -2px -2px #00FFC6; }
        }

        /* Satelit */
        .orbit-container {
            position: relative;
            width: 150px;
            height: 150px;
            margin-bottom: 1rem;
        }

        .satellite {
            width: 30px;
            height: 30px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: orbit 4s linear infinite;
        }

        @keyframes orbit {
            0% { transform: rotate(0deg) translateX(60px) rotate(0deg); }
            100% { transform: rotate(360deg) translateX(60px) rotate(-360deg); }
        }

        /* Kotak Login */
        .login-container {
            position: relative;
            background: rgba(0, 0, 0, 0.9);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px var(--text-color);
            width: 90%;
            max-width: 400px;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s forwards 1.5s;
        }

        .input-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        label {
            display: block;
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 10px;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            color: var(--text-color);
            border-radius: 5px;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: var(--button-bg);
            color: #0A0F24;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .btn-login:hover {
            background: var(--button-hover);
            transform: scale(1.05);
        }

        .footer {
            margin-top: 1rem;
            font-size: 0.8rem;
            opacity: 0.7;
        }

        /* Efek Fade In */
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <!-- Latar Belakang Globe -->
    <div class="globe-container"></div>

    <!-- Welcome Screen -->
    <h1 id="welcome-text">🚀 Welcome to Satellite Calculator</h1>

    <!-- Satelit Orbit -->
    <div class="orbit-container">
        <svg class="satellite" viewBox="0 0 64 64" fill="var(--text-color)">
            <rect x="25" y="25" width="14" height="14"></rect>
            <rect x="10" y="28" width="10" height="8"></rect>
            <rect x="44" y="28" width="10" height="8"></rect>
            <rect x="30" y="10" width="4" height="10"></rect>
            <rect x="30" y="44" width="4" height="10"></rect>
        </svg>
    </div>

    <!-- Kotak Login -->
    <div class="login-container">
        <h2>🔒 Secure Login</h2>
        
        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
        
        <p class="footer">© 2025 Satellite Calculator Team</p>
    </div>

</body>
</html>
