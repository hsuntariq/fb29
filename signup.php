<?php 
    session_start();
 if(isset($_SESSION['logged_in'])){
            header("Location: http://localhost:3000/index.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook · Sign Up</title>
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
    .signup-container {
        max-width: 960px;
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
        flex: 1 1 42%;
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
        max-width: 280px;
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
        flex: 1 1 58%;
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

    /* ── Form ── */
    .signup-form {
        display: flex;
        flex-direction: column;
        gap: 0.9rem;
    }

    .field-row {
        display: flex;
        gap: 0.7rem;
        flex-wrap: wrap;
    }

    .field-row .input-group {
        flex: 1 1 0;
        min-width: 110px;
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

    .input-wrapper input,
    .input-wrapper select {
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

    .input-wrapper select {
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath fill='%238a8d91' d='M0 0l5 5 5-5z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 4px center;
        padding-right: 18px;
    }

    .input-wrapper select option {
        color: #1c1e21;
    }

    /* Date of birth – compact */
    .dob-row {
        display: flex;
        gap: 0.6rem;
        flex-wrap: wrap;
    }

    .dob-row .input-wrapper {
        flex: 1 1 0;
        min-width: 70px;
    }

    .dob-row .input-wrapper select {
        padding: 0 4px;
        padding-right: 16px;
        font-size: 0.82rem;
    }

    /* Gender */
    .gender-group {
        display: flex;
        gap: 0.6rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .gender-option {
        display: flex;
        align-items: center;
        gap: 6px;
        background: #f5f6f7;
        border: 1.5px solid #e4e6eb;
        border-radius: 10px;
        padding: 0 14px;
        height: 42px;
        cursor: pointer;
        transition: border-color 0.18s ease, background 0.18s ease;
        flex: 1 1 0;
        min-width: 72px;
        justify-content: center;
    }

    .gender-option:hover {
        background: #eef0f3;
        border-color: #c8ccd0;
    }

    .gender-option input[type="radio"] {
        appearance: none;
        -webkit-appearance: none;
        width: 16px;
        height: 16px;
        border: 2px solid #bcc0c4;
        border-radius: 50%;
        position: relative;
        cursor: pointer;
        transition: border-color 0.12s ease, background-color 0.12s ease;
        flex-shrink: 0;
    }

    .gender-option input[type="radio"]:checked {
        border-color: #1877f2;
        background-color: #1877f2;
        box-shadow: inset 0 0 0 3px #ffffff;
    }

    .gender-option label {
        font-size: 0.82rem;
        font-weight: 500;
        color: #1c1e21;
        cursor: pointer;
        letter-spacing: -0.005em;
        user-select: none;
    }

    /* Terms */
    .terms-text {
        font-size: 0.68rem;
        color: #65676b;
        line-height: 1.55;
        margin: 0.2rem 0 0.1rem;
        letter-spacing: -0.005em;
    }

    .terms-text a {
        color: #1877f2;
        text-decoration: none;
        font-weight: 500;
    }

    .terms-text a:hover {
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

    /* Login link */
    .login-link {
        text-align: center;
        font-size: 0.8rem;
        color: #4b4f56;
        margin-top: 0.4rem;
        letter-spacing: -0.005em;
    }

    .login-link a {
        color: #1877f2;
        font-weight: 600;
        text-decoration: none;
        margin-left: 3px;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    /* ── Responsive ── */
    @media (max-width: 820px) {
        .signup-container {
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

        .signup-container {
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

        .field-row {
            flex-direction: column;
            gap: 0.7rem;
        }

        .dob-row {
            flex-direction: column;
            gap: 0.7rem;
        }

        .gender-group {
            flex-direction: column;
            gap: 0.5rem;
        }

        .gender-option {
            width: 100%;
            height: 40px;
        }

        .input-wrapper {
            height: 40px;
        }

        .submit-btn {
            height: 44px;
            font-size: 0.88rem;
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




    <div class="signup-container">
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
                <h1>Create a new account</h1>
                <p>It's quick and easy.</p>
            </div>

            <form class="signup-form" action="./register.php" method="post">
                <!-- Name row -->
                <div class="field-row">
                    <div class="input-group">
                        <label for="firstName">First name</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="firstName" name="firstName" placeholder="First name" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <label for="lastName">Last name</label>
                        <div class="input-wrapper">
                            <i class="fas fa-user"></i>
                            <input type="text" id="lastName" name="lastName" placeholder="Last name" required>
                        </div>
                    </div>
                </div>

                <!-- Email / Phone -->
                <div class="input-group">
                    <label for="email">Email or phone</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email or mobile number" required>
                    </div>
                </div>

                <!-- Password -->
                <div class="input-group">
                    <label for="password">New password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Create a strong password"
                            required>
                    </div>
                </div>

                <!-- Date of birth -->
                <div class="input-group">
                    <label>Date of birth</label>
                    <div class="dob-row">
                        <div class="input-wrapper">
                            <select id="day" name="day" required>
                                <option value="" disabled selected>Day</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                        <div class="input-wrapper">
                            <select id="month" name="month" required>
                                <option value="" disabled selected>Month</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                        </div>
                        <div class="input-wrapper">
                            <select id="year" name="year" required>
                                <option value="" disabled selected>Year</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                                <option value="2017">2017</option>
                                <option value="2016">2016</option>
                                <option value="2015">2015</option>
                                <option value="2014">2014</option>
                                <option value="2013">2013</option>
                                <option value="2012">2012</option>
                                <option value="2011">2011</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Gender -->
                <div class="input-group">
                    <label>Gender</label>
                    <div class="gender-group">
                        <div class="gender-option">
                            <input type="radio" id="female" name="gender" value="female" checked>
                            <label for="female">Female</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                        </div>
                        <div class="gender-option">
                            <input type="radio" id="custom" name="gender" value="custom">
                            <label for="custom">Custom</label>
                        </div>
                    </div>
                </div>

                <!-- Terms -->
                <p class="terms-text">
                    By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a href="#">Privacy Policy</a> and <a
                        href="#">Cookies Policy</a>. You may receive SMS notifications from us and can opt out at any
                    time.
                </p>

                <!-- Submit -->
                <button type="submit" class="submit-btn">Sign Up</button>

                <!-- Login link -->
                <div class="login-link">
                    Already have an account? <a href="./login.php">Log in</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>