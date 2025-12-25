<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0">Welcome! Let's set up your profile</h4>
                    <p class="mb-0 small opacity-75">Please complete your details to continue.</p>
                </div>
                <div class="card-body p-4">
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('account.setup.store') }}" method="POST">
                        @csrf
                        
                        <h6 class="fw-bold text-primary mb-3">Login Details</h6>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" id="password" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirmation">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h6 class="fw-bold text-primary mb-3">Personal Information</h6>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Age</label>
                                <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Sex</label>
                                <select name="sex" class="form-select" required>
                                    <option value="" disabled selected>Select...</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                        </div>

                        <hr class="my-4">

                        <h6 class="fw-bold text-primary mb-3">Social Media Links</h6>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-facebook"></i> Facebook URL</label>
                            <input type="url" name="social_media[facebook]" class="form-control" placeholder="https://facebook.com/..." value="{{ old('social_media.facebook') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-twitter"></i> Twitter URL</label>
                            <input type="url" name="social_media[twitter]" class="form-control" placeholder="https://twitter.com/..." value="{{ old('social_media.twitter') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-instagram"></i> Instagram URL</label>
                            <input type="url" name="social_media[instagram]" class="form-control" placeholder="https://instagram.com/..." value="{{ old('social_media.instagram') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-github"></i> GitHub URL</label>
                            <input type="url" name="social_media[github]" class="form-control" placeholder="https://github.com/..." value="{{ old('social_media.github') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-linkedin"></i> LinkedIn URL</label>
                            <input type="url" name="social_media[linkedin]" class="form-control" placeholder="https://linkedin.com/..." value="{{ old('social_media.linkedin') }}">
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Complete Setup</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link text-muted">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this.querySelector('i');
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });

        document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
            const passwordConfirmation = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            if (passwordConfirmation.type === 'password') {
                passwordConfirmation.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                passwordConfirmation.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
</script>


</body>
</html>