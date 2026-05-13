@extends('masterlayout.app')

@section('content')

<style>
    .password-page {
        min-height: 70vh;
        background: #f6f8fb;
        padding: 70px 20px;
        display: flex;
        justify-content: center;
        align-items: flex-start;
    }

    .password-card {
        width: 100%;
        max-width: 760px;
        background: #ffffff;
        border-radius: 26px;
        padding: 42px 46px;
        box-shadow: 0 20px 55px rgba(15, 23, 42, 0.08);
        border: 1px solid #eef2f7;
    }

    .password-header {
        margin-bottom: 34px;
    }

    .password-icon {
        width: 78px;
        height: 78px;
        border-radius: 24px;
        background: linear-gradient(135deg, #ffc400, #ff9800);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
        color: #17233c;
        font-weight: 800;
        margin-bottom: 22px;
        box-shadow: 0 12px 24px rgba(255, 166, 0, 0.28);
    }

    .password-header h2 {
        margin: 0;
        color: #17233c;
        font-size: 34px;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .password-header p {
        margin-top: 8px;
        color: #60708a;
        font-size: 17px;
    }

    .alert-box {
        padding: 14px 18px;
        border-radius: 14px;
        margin-bottom: 22px;
        font-weight: 600;
        font-size: 15px;
    }

    .alert-success {
        background: #ecfdf3;
        color: #027a48;
        border: 1px solid #abefc6;
    }

    .alert-error {
        background: #fff1f3;
        color: #c01048;
        border: 1px solid #fecdd6;
    }

    .password-form {
        display: grid;
        gap: 22px;
    }

    .form-group label {
        display: block;
        margin-bottom: 9px;
        color: #52647f;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .input-box {
        position: relative;
    }

    .input-box input {
        width: 100%;
        height: 58px;
        border-radius: 16px;
        border: 1px solid #e4e9f2;
        background: #f8fafc;
        padding: 0 48px 0 18px;
        font-size: 16px;
        color: #17233c;
        outline: none;
        transition: 0.25s ease;
        font-weight: 600;
    }

    .input-box input:focus {
        background: #ffffff;
        border-color: #ffb300;
        box-shadow: 0 0 0 4px rgba(255, 179, 0, 0.14);
    }

    .input-box span {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 18px;
        color: #90a0b8;
    }

    .password-actions {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 12px;
    }

    .btn-update {
        border: none;
        outline: none;
        background: linear-gradient(135deg, #ffc400, #ff9800);
        color: #111827;
        padding: 15px 30px;
        border-radius: 16px;
        font-size: 16px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 10px 24px rgba(255, 166, 0, 0.28);
        transition: 0.25s ease;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 14px 28px rgba(255, 166, 0, 0.36);
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        background: #ffffff;
        color: #17233c;
        padding: 15px 26px;
        border-radius: 16px;
        font-size: 16px;
        font-weight: 800;
        border: 1px solid #d9e2ef;
        transition: 0.25s ease;
    }

    .btn-back:hover {
        background: #f8fafc;
        color: #ff9800;
    }

    @media (max-width: 768px) {
        .password-page {
            padding: 45px 16px;
        }

        .password-card {
            padding: 32px 24px;
            border-radius: 22px;
        }

        .password-header h2 {
            font-size: 28px;
        }

        .password-header p {
            font-size: 15px;
        }

        .password-actions {
            flex-direction: column;
        }

        .btn-update,
        .btn-back {
            width: 100%;
        }
    }
</style>

<section class="password-page">
    <div class="password-card">

        <div class="password-header">
            <div class="password-icon">
                🔒
            </div>
            <h2>Change Password</h2>
            <p>Update your account password securely.</p>
        </div>

        @if(session('success'))
            <div class="alert-box alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert-box alert-error">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-box alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('profile.update.password') }}" method="POST" class="password-form">
            @csrf

            <div class="form-group">
                <label>Current Password</label>
                <div class="input-box">
                    <input 
                        type="password" 
                        name="current_password" 
                        placeholder="Enter current password"
                        required
                    >
                    <span>🔐</span>
                </div>
            </div>

            <div class="form-group">
                <label>New Password</label>
                <div class="input-box">
                    <input 
                        type="password" 
                        name="new_password" 
                        placeholder="Enter new password"
                        required
                    >
                    <span>🔑</span>
                </div>
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <div class="input-box">
                    <input 
                        type="password" 
                        name="confirm_password" 
                        placeholder="Confirm new password"
                        required
                    >
                    <span>✅</span>
                </div>
            </div>

            <div class="password-actions">
                <button type="submit" class="btn-update">
                    Update Password
                </button>

                <a href="{{ route('profile') }}" class="btn-back">
                    Back to Profile
                </a>
            </div>
        </form>

    </div>
</section>

@endsection