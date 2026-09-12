<?php 
    session_start();

    // Redirect if already logged in — MUST be before any HTML output
    if (isset($_SESSION['logged_in'])) {
        header("Location: http://localhost:3000/index.php");
        exit();
    }

    // Optional: display error message from failed login attempt
    $error = $_SESSION['login_error'] ?? '';
    unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook · Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
        rel="stylesheet">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background: linear-gradient(145deg, #f0f2f5 0%, #e6e9ef 100%);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.5rem;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    /* Main card */
    .login-container {
        max-width: 920px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        background-color: #ffffff;
        border-radius: 20px;
        box-shadow: 0 24px 48px -16px rgba(0, 0, 0, 0.18), 0 8px 20px -8px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }

    /* ── Left panel ── */
    .brand-panel {
        flex: 1 1 48%;
        background: linear-gradient(145deg, #1877f2 0%, #0a5ad6 100%);
        padding: 2.6rem 2.2rem;
        color: white;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .brand-panel::after {
        content: '';
        position: absolute;
        bottom: -60px;
        right: -60px;
        width: 220px;
        height: 220px;
        background: rgba(255, 255, 255, 0.06);
        border-radius: 50%;
    }

    .brand-panel::before {
        content: '';
        position: absolute;
        top: -50px;
        left: -50px;
        width: 160px;
        height: 160px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    .fb-logo {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 2.4rem;
        font-weight: 700;
        letter-spacing: -0.03em;
        line-height: 1;
        margin-bottom: 0.9rem;
        position: relative;
        z-index: 1;
    }

    .fb-logo i {
        font-size: 2.2rem;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.12));
    }

    .brand-tagline {
        font-size: 1.05rem;
        font-weight: 400;
        line-height: 1.45;
        opacity: 0.92;
        max-width: 300px;
        margin-bottom: 2.4rem;
        position: relative;
        z-index: 1;
        letter-spacing: -0.01em;
    }

    .feature-list {
        list-style: none;
        position: relative;
        z-index: 1;
        margin-top: auto;
    }

    .feature-list li {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 0.95rem;
        font-size: 0.85rem;
        font-weight: 400;
        opacity: 0.9;
        letter-spacing: -0.005em;
    }

    .feature-list li i {
        width: 20px;
        font-size: 1rem;
        color: #b8d4ff;
        flex-shrink: 0;
        text-align: center;
    }

    /* ── Right panel – form ── */
    .form-panel {
        flex: 1 1 52%;
        padding: 2.6rem 2.4rem;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-header {
        margin-bottom: 1.5rem;
    }

    .form-header h1 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1c1e21;
        letter-spacing: -0.025em;
        line-height: 1.2;
        margin-bottom: 0.25rem;
    }

    .form-header p {
        font-size: 0.82rem;
        color: #65676b;
        font-weight: 400;
        letter-spacing: -0.005em;
    }

    /* Error alert */
    .error-alert {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #ffebe8;
        border: 1px solid #ffb8b3;
        color: #c0392b;
        font-size: 0.78rem;
        font-weight: 500;
        padding: 10px 14px;
        border-radius: 10px;
        margin-bottom: 1rem;
        letter-spacing: -0.005em;
    }

    .error-alert i {
        font-size: 0.9rem;
        flex-shrink: 0;
    }

    /* ── Form ── */
    .login-form {
        display: flex;
        flex-direction: column;
        gap: 0.9rem;
    }

    .input-group {
        display: flex;
        flex-direction: column;
        gap: 0.3rem;
    }

    .input-group label {
        font-size: 0.72rem;
        font-weight: 500;
        color: #4b4f56;
        letter-spacing: 0.01em;
        text-transform: uppercase;
        padding-left: 2px;
    }

    .input-wrapper {
        display: flex;
        align-items: center;
        background: #f5f6f7;
        border: 1.5px solid #e4e6eb;
        border-radius: 10px;
        padding: 0 12px;
        height: 42px;
        transition: border-color 0.18s ease, background 0.18s ease, box-shadow 0.18s ease;
    }

    .input-wrapper:hover {
        border-color: #c8ccd0;
        background: #fafbfc;
    }

    .input-wrapper:focus-within {
        border-color: #1877f2;
        background: #ffffff;
        box-shadow: 0 0 0 3px rgba(24, 119, 242, 0.12);
    }

    .input-wrapper i {
        color: #8a8d91;
        font-size: 0.82rem;
        width: 18px;
        flex-shrink: 0;
        text-align: center;
        transition: color 0.18s ease;
    }

    .input-wrapper:focus-within i {
        color: #1877f2;
    }

    .input-wrapper input {
        width: 100%;
        height: 100%;
        border: none;
        outline: none;
        background: transparent;
        padding: 0 8px;
        font-family: 'Inter', sans-serif;
        font-size: 0.85rem;
        font-weight: 400;
        color: #1c1e21;
        letter-spacing: -0.005em;
    }

    .input-wrapper input::placeholder {
        color: #a0a4a8;
        font-weight: 400;
        font-size: 0.82rem;
    }

    /* Toggle password visibility */
    .toggle-password {
        background: none;
        border: none;
        cursor: pointer;
        color: #8a8d91;
        font-size: 0.82rem;
        padding: 4px;
        margin-left: 2px;
        flex-shrink: 0;
        transition: color 0.18s ease;
    }

    .toggle-password:hover {
        color: #1877f2;
    }

    /* Options row (remember + forgot) */
    .options-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.1rem;
    }

    .remember-me {
        display: flex;
        align-items: center;
        gap: 7px;
        cursor: pointer;
        user-select: none;
    }

    .remember-me input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        width: 15px;
        height: 15px;
        border: 1.5px solid #bcc0c4;
        border-radius: 4px;
        cursor: pointer;
        position: relative;
        transition: all 0.12s ease;
        flex-shrink: 0;
    }

    .remember-me input[type="checkbox"]:checked {
        background-color: #1877f2;
        border-color: #1877f2;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='8' viewBox='0 0 10 8'%3E%3Cpath fill='white' d='M3.5 7.5L0 4l1.4-1.4L3.5 4.7 8.6.5 10 1.9z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center;
        background-size: 9px;
    }

    .remember-me span {
        font-size: 0.78rem;
        color: #4b4f56;
        font-weight: 400;
        letter-spacing: -0.005em;
    }

    .forgot-link {
        font-size: 0.78rem;
        color: #1877f2;
        text-decoration: none;
        font-weight: 500;
        letter-spacing: -0.005em;
    }

    .forgot-link:hover {
        text-decoration: underline;
    }

    /* Submit */
    .submit-btn {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(145deg, #1877f2, #0a5ad6);
        border: none;
        border-radius: 10px;
        padding: 0 24px;
        height: 46px;
        font-size: 0.92rem;
        font-weight: 600;
        color: white;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 6px 14px -6px rgba(24, 119, 242, 0.45);
        letter-spacing: -0.01em;
        margin-top: 0.2rem;
    }

    .submit-btn:hover {
        background: linear-gradient(145deg, #166fe5, #094cb0);
        transform: translateY(-1px);
        box-shadow: 0 10px 20px -8px rgba(24, 119, 242, 0.55);
    }

    .submit-btn:active {
        transform: translateY(0);
        box-shadow: 0 4px 8px -4px rgba(24, 119, 242, 0.4);
    }

    /* Divider */
    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 0.4rem 0;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e4e6eb;
    }

    .divider span {
        font-size: 0.7rem;
        color: #8a8d91;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Create account button */
    .create-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Inter', sans-serif;
        background: #ffffff;
        border: 1.5px solid #1877f2;
        border-radius: 10px;
        padding: 0 24px;
        height: 46px;
        font-size: 0.9rem;
        font-weight: 600;
        color: #1877f2;
        text-decoration: none;
        cursor: pointer;
        transition: all 0.2s ease;
        letter-spacing: -0.01em;
        margin-top: 0.2rem;
    }

    .create-btn:hover {
        background: #f0f6ff;
        border-color: #166fe5;
        color: #166fe5;
    }

    .create-btn i {
        margin-right: 8px;
        font-size: 0.9rem;
    }

    /* Footer text */
    .footer-text {
        text-align: center;
        font-size: 0.72rem;
        color: #8a8d91;
        margin-top: 1.4rem;
        letter-spacing: -0.005em;
        line-height: 1.5;
    }

    .footer-text a {
        color: #1877f2;
        text-decoration: none;
        font-weight: 500;
    }

    .footer-text a:hover {
        text-decoration: underline;
    }

    /* ── Responsive ── */
    @media (max-width: 820px) {
        .login-container {
            flex-direction: column;
            border-radius: 16px;
        }

        .brand-panel {
            padding: 2rem 1.6rem;
        }

        .fb-logo {
            font-size: 2rem;
        }

        .fb-logo i {
            font-size: 1.8rem;
        }

        .brand-tagline {
            font-size: 0.95rem;
            margin-bottom: 1.6rem;
        }

        .feature-list li {
            font-size: 0.8rem;
            margin-bottom: 0.7rem;
        }

        .form-panel {
            padding: 2rem 1.5rem;
        }

        .form-header h1 {
            font-size: 1.35rem;
        }
    }

    @media (max-width: 520px) {
        body {
            padding: 1rem;
        }

        .login-container {
            border-radius: 14px;
        }

        .brand-panel {
            padding: 1.6rem 1.2rem;
        }

        .fb-logo {
            font-size: 1.7rem;
        }

        .fb-logo i {
            font-size: 1.5rem;
        }

        .brand-tagline {
            font-size: 0.85rem;
            max-width: 220px;
        }

        .feature-list li {
            font-size: 0.75rem;
        }

        .form-panel {
            padding: 1.6rem 1.2rem;
        }

        .form-header h1 {
            font-size: 1.2rem;
        }

        .input-wrapper {
            height: 40px;
        }

        .submit-btn,
        .create-btn {
            height: 44px;
            font-size: 0.88rem;
        }

        .options-row {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.6rem;
        }
    }

    /* Polished scrollbar */
    ::-webkit-scrollbar {
        width: 6px;
    }

    ::-webkit-scrollbar-track {
        background: #f0f2f5;
    }

    ::-webkit-scrollbar-thumb {
        background: #bcc0c4;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #8a8d91;
    }
    </style>
</head>

<body>


    <?php 
    if(isset($_SESSION['invalid'])){
      
?>

    <style>
    @keyframes slideInRight {
        0% {
            opacity: 0;
            transform: translateX(120%) scale(0.96);
        }

        60% {
            opacity: 1;
            transform: translateX(-6%) scale(1.01);
        }

        100% {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    .toast-alert {
        position: fixed;
        top: 1.2rem;
        right: 1.2rem;
        z-index: 1080;
        min-width: 320px;
        max-width: 380px;
        animation: slideInRight 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    </style>

    <div class="alert alert-danger  toast-alert d-flex align-items-center gap-3 border-0 shadow-lg rounded-4 p-3 mb-0 rounded-pill"
        role="alert"
        style="background:linear-gradient(145deg,#fff5f7,#ffe9ee);border-left:4px solid #e41e3f!important;padding:10px;border-radius:50px;">
        <i class="bi bi-exclamation-triangle-fill fs-4 text-danger"></i>
        <div>
            <strong class="d-block text-danger-emphasis p-3" style="font-size:0.9rem;">Oops! Something went
                wrong</strong>
            <small class="text-secondary" style="font-size:0.8rem;"><?= htmlspecialchars($error) ?></small>
        </div>
    </div>

    <?php 
    }
?>


    <div class="login-container">
        <!-- Left branding panel -->
        <div class="brand-panel">
            <div class="fb-logo">
                <i class="fab fa-facebook"></i> facebook
            </div>
            <p class="brand-tagline">
                Connect with friends and the world around you.
            </p>
            <ul class="feature-list">
                <li><i class="fas fa-users"></i> See photos and updates from friends.</li>
                <li><i class="fas fa-comment-dots"></i> Chat and share moments instantly.</li>
                <li><i class="fas fa-globe"></i> Discover communities that matter to you.</li>
            </ul>
        </div>

        <!-- Right form panel -->
        <div class="form-panel">
            <div class="form-header">
                <h1>Welcome back</h1>
                <p>Log in to continue to Facebook.</p>
            </div>

            <?php if (!empty($error)): ?>
            <div class="error-alert">
                <i class="fas fa-exclamation-circle"></i>
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <form class="login-form" action="./authenticate.php" method="post">
                <!-- Email / Phone -->
                <div class="input-group">
                    <label for="email">Email or phone</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="text" id="email" name="email" placeholder="Email or mobile number" required
                            autocomplete="username">
                    </div>
                </div>

                <!-- Password -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required
                            autocomplete="current-password">
                        <button type="button" class="toggle-password" id="togglePassword" aria-label="Show password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Options row -->
                <div class="options-row">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" value="1">
                        <span>Remember me</span>
                    </label>
                    <a href="./forgot-password.php" class="forgot-link">Forgot password?</a>
                </div>

                <!-- Submit -->
                <button type="submit" class="submit-btn">Log In</button>

                <!-- Divider -->
                <div class="divider">
                    <span>or</span>
                </div>

                <!-- Create account -->
                <a href="./signup.php" class="create-btn">
                    <i class="fas fa-user-plus"></i> Create new account
                </a>
            </form>

            <p class="footer-text">
                <a href="#">Privacy Policy</a> &nbsp;·&nbsp; <a href="#">Terms</a> &nbsp;·&nbsp; <a href="#">Cookies</a>
            </p>
        </div>
    </div>

    <script>
    // Toggle password visibility
    (function() {
        const toggleBtn = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        if (toggleBtn && passwordInput) {
            toggleBtn.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                const icon = this.querySelector('i');
                if (type === 'text') {
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        }
    })();
    </script>
</body>

</html>