@extends('masterLayout.app')

@section('content')
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #f59e0b;
            --primary-soft: #fffbeb;
            --secondary: #1e293b;
            --text-muted: #64748b;
            --card-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        body {
            background-color: #f8fafc;
            font-family: 'Outfit', sans-serif;
        }

        .profile-container {
            padding: 60px 0;
            max-width: 1000px;
            margin: 0 auto;
        }

        .profile-card {
            background: white;
            border-radius: 30px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .profile-header {
            height: 200px;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            position: relative;
        }

        .profile-avatar-wrapper {
            position: absolute;
            bottom: -60px;
            left: 50px;
            padding: 5px;
            background: white;
            border-radius: 30px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .profile-avatar-large {
            width: 130px;
            height: 130px;
            border-radius: 25px;
            background: linear-gradient(135deg, #facc15, #f59e0b);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            font-weight: 700;
            color: #1e293b;
            text-transform: uppercase;
        }

        .profile-body {
            padding: 80px 50px 50px;
        }

        .user-meta h1 {
            font-weight: 700;
            margin-bottom: 5px;
            color: var(--secondary);
        }

        .user-meta p {
            color: var(--text-muted);
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .info-item {
            background: #f8fafc;
            padding: 20px;
            border-radius: 20px;
            border: 1px solid #f1f5f9;
            transition: 0.3s;
        }

        .info-item:hover {
            transform: translateY(-5px);
            background: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            border-color: var(--primary);
        }

        .info-item label {
            display: block;
            font-size: 0.85rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .info-item span {
            font-weight: 600;
            color: var(--secondary);
            font-size: 1.05rem;
        }

        .profile-actions {
            margin-top: 50px;
            display: flex;
            gap: 15px;
        }

        .btn-premium {
            padding: 14px 30px;
            border-radius: 15px;
            font-weight: 700;
            transition: 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-edit {
            background: var(--primary);
            color: #000;
            box-shadow: 0 10px 15px -3px rgba(245, 158, 11, 0.3);
        }

        .btn-edit:hover {
            background: #d97706;
            transform: scale(1.05);
        }

        .btn-outline {
            border: 2px solid #e2e8f0;
            color: var(--secondary);
        }

        .btn-outline:hover {
            background: #f1f5f9;
            border-color: #cbd5e1;
        }

        /* Tabs Styling */
        .profile-tabs {
            margin-top: 50px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            gap: 40px;
        }

        .tab-item {
            padding: 15px 5px;
            font-weight: 600;
            color: var(--text-muted);
            cursor: pointer;
            position: relative;
            transition: 0.3s;
        }

        .tab-item.active {
            color: var(--primary);
        }

        .tab-item.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--primary);
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .profile-avatar-wrapper {
                left: 50%;
                transform: translateX(-50%);
            }

            .profile-body {
                text-align: center;
                padding: 80px 20px 40px;
            }

            .profile-actions {
                justify-content: center;
            }
        }
    </style>
    {{-- {{dd($data)}} --}}
    <div class="container profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="profile-avatar-wrapper">
                    <div class="profile-avatar-large">
                        M
                    </div>
                </div>
            </div>

            <div class="profile-body">
                <div class="user-meta">
                    <h1>{{$data->name}}</h1>
                    <p>Member since May 2026</p>
                </div>

                <div class="profile-tabs">
                    <div class="tab-item active">Account Overview</div>
                </div>

                <form method="POST" action={{route('profile.update')}}>
                    @csrf
                    <div class="info-grid">
                        <div class="info-item">
                            <label>Full Name</label>
                            <input type="text" value="{{$data->name}}" name="name" class="form-control">
                        </div>
                        <div class="info-item">
                            <label>Email Address</label>
                            <input type="email" value="{{$data->email}}" name="email" class="form-control">
                        </div>
                        <div class="info-item">
                            <label>Phone Number</label>
                            <input type="text" value="{{$data->phone_number}}" name="phone_number" class="form-control">
                        </div>
                        <div class="info-item">
                            <label>Default Address</label>
                            <input type="text" value="{{$data->address}}" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="profile-actions">
                        <button class="btn-premium btn-edit" type="submit">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                            Update Profile
                        </button>
                        <a href="#" class="btn-premium btn-outline">
                            Change Password
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection