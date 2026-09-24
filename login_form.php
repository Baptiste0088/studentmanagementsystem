<?php
declare(strict_types=1);

session_start();

$loginMessage = $_SESSION['loginMessage'] ?? '';
$loginEmail = $_SESSION['loginEmail'] ?? '';
unset($_SESSION['loginMessage'], $_SESSION['loginEmail']);

$loginMessage = is_string($loginMessage) ? $loginMessage : '';
$loginEmail = is_string($loginEmail) ? $loginEmail : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in | G S KIZIGURO TSS</title>
    <meta name="description" content="Sign in to the G S KIZIGURO TSS student management portal.">
    <link rel="stylesheet" href="login.css">
</head>
<body>
<main class="auth-page">
    <div class="auth-shell">
        <section class="brand-panel" aria-label="G S KIZIGURO TSS">
            <div class="brand-top">
                <div class="brand-logo">
                    <img src="school_logo.jpg" alt="" width="64" height="64">
                </div>
                <div class="brand-identity">
                    <span class="brand-name">G S KIZIGURO TSS</span>
                    <span class="brand-subtitle">Student management portal</span>
                </div>
            </div>

            <div class="brand-copy">
                <span class="brand-kicker">WELCOME TO THE PORTAL</span>
                <h2>Your school, one place to connect.</h2>
                <span class="brand-rule" aria-hidden="true"></span>
                <p>Access your school account and continue where you left off.</p>
            </div>

            <div class="brand-location">Kiziguro Sector, Rwanda</div>
        </section>

        <section class="form-panel" aria-labelledby="login-title">
            <div class="form-top">
                <a class="back-link" href="index.php"><span aria-hidden="true">&larr;</span> Back to home</a>
            </div>

            <div class="form-content">
                <span class="form-eyebrow">ACCOUNT ACCESS</span>
                <h1 id="login-title">Welcome back</h1>
                <p class="form-intro">Sign in with the email address and password for your account.</p>

                <?php if ($loginMessage !== ''): ?>
                    <div class="login-alert" role="alert">
                        <span class="alert-icon" aria-hidden="true">!</span>
                        <span><?= htmlspecialchars($loginMessage, ENT_QUOTES, 'UTF-8') ?></span>
                    </div>
                <?php endif; ?>

                <form action="login_check.php" method="post">
                    <div class="form-field">
                        <label for="email">Email address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="<?= htmlspecialchars($loginEmail, ENT_QUOTES, 'UTF-8') ?>"
                            placeholder="you@example.com"
                            autocomplete="username"
                            autocapitalize="none"
                            spellcheck="false"
                            maxlength="191"
                            required
                        >
                    </div>

                    <div class="form-field">
                        <label for="password">Password</label>
                        <div class="password-field">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                            >
                            <button class="password-toggle" type="button" aria-label="Show password" aria-pressed="false">Show</button>
                        </div>
                    </div>

                    <button class="sign-in-button" type="submit">
                        Sign in <span aria-hidden="true">&rarr;</span>
                    </button>
                </form>

                <p class="signup-prompt">New to the portal? <a href="signup.php">Create an account</a></p>
            </div>

            <p class="form-footer">G S KIZIGURO TSS</p>
        </section>
    </div>
</main>
<script>
    const passwordInput = document.getElementById('password');
    const passwordToggle = document.querySelector('.password-toggle');

    passwordToggle.addEventListener('click', () => {
        const isVisible = passwordInput.type === 'password';
        passwordInput.type = isVisible ? 'text' : 'password';
        passwordToggle.textContent = isVisible ? 'Hide' : 'Show';
        passwordToggle.setAttribute('aria-label', isVisible ? 'Hide password' : 'Show password');
        passwordToggle.setAttribute('aria-pressed', String(isVisible));
    });
</script>
</body>
</html>
