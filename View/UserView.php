<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
        function showReferralCode(referralCode) {
            if (referralCode) {
                alert('Your referral code is: ' + referralCode);
            }
        }

        function showError(message) {
            if (message) {
                alert('Error: ' + message);
            }
        }
    </script>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Register User</h4>
                    </div>
                    <div class="card-body">
                        <form id="registrationForm" action="index.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="referral_code" class="form-label">Referral Code (optional)</label>
                                <input type="text" class="form-control" id="referral_code" name="referral_code">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($error): ?>
        <script>
            // Display the error message if it's set
            showError('<?php echo htmlspecialchars($error); ?>');
        </script>
    <?php endif; ?>

    <?php if (!$error && $newReferralCode): ?>
        <script>
            // Display the referral code if there's no error
            showReferralCode('<?php echo htmlspecialchars($newReferralCode); ?>');
        </script>
    <?php endif; ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
