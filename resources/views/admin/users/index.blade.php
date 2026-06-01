@extends('layouts.portal')

@section('title', 'Superadmin User Management')

@section('content')
    <section class="hero-panel">
        <div>
            <p class="eyebrow">Superadmin</p>
            <h1>Manage account access before support tickets pile up.</h1>
            <p class="hero-copy">
                Review who can sign in, who can administer the portal, and which accounts are verified.
                This is intentionally small and server-driven so the control surface stays auditable.
            </p>
        </div>

        <div class="hero-sidecard">
            <p class="eyebrow">Current State</p>
            <ul class="compact-list">
                <li>{{ $userStats['total'] }} total portal users</li>
                <li>{{ $userStats['super_admins'] }} superadmins</li>
                <li>{{ $userStats['disabled'] }} disabled accounts</li>
                <li>{{ $userStats['verified'] }} verified email addresses</li>
            </ul>
        </div>
    </section>

    <section class="section-block">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Add User</p>
                <h2>Create portal access deliberately</h2>
            </div>
            <p>New users are created with a real password now. If you want invites later, add email delivery separately.</p>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}" class="admin-form">
            @csrf

            <label class="field">
                <span>Name</span>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </label>

            <label class="field">
                <span>Email</span>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>

            <label class="field">
                <span>Password</span>
                <input type="password" name="password" required>
            </label>

            <label class="field">
                <span>Confirm password</span>
                <input type="password" name="password_confirmation" required>
            </label>

            <label class="checkbox-field">
                <input type="checkbox" name="email_verified" value="1" @checked(old('email_verified'))>
                <span>Mark as email verified</span>
            </label>

            <label class="checkbox-field">
                <input type="checkbox" name="is_super_admin" value="1" @checked(old('is_super_admin'))>
                <span>Grant superadmin access</span>
            </label>

            <div class="form-actions">
                <button type="submit" class="primary-button">Create user</button>
            </div>
        </form>
    </section>

    <section class="table-shell">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Directory</p>
                <h2>User access and verification</h2>
            </div>
            <p>Promote carefully. Superadmins can reach this screen and change other users.</p>
        </div>

        <div class="table-wrap">
            <table class="workspace-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Account</th>
                        <th>Verified</th>
                        <th>Access</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <strong>{{ $user->name }}</strong>
                                @if (auth()->id() === $user->id)
                                    <div class="row-note">Current session</div>
                                @endif
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="pill {{ $user->isDisabled() ? 'pill--danger' : 'pill--success' }}">
                                    {{ $user->isDisabled() ? 'Disabled' : 'Active' }}
                                </span>
                            </td>
                            <td>
                                <span class="pill {{ $user->email_verified_at ? 'pill--success' : 'pill--muted' }}">
                                    {{ $user->email_verified_at ? 'Verified' : 'Unverified' }}
                                </span>
                            </td>
                            <td>
                                <span class="pill {{ $user->isSuperAdmin() ? 'pill--success' : 'pill--muted' }}">
                                    {{ $user->isSuperAdmin() ? 'Superadmin' : 'Standard' }}
                                </span>
                            </td>
                            <td class="action-cell">
                                <form method="POST" action="{{ route('admin.users.super-admin', $user) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="secondary-button">
                                        {{ $user->is_super_admin ? 'Remove admin' : 'Make admin' }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.users.verification', $user) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="secondary-button">
                                        {{ $user->email_verified_at ? 'Mark unverified' : 'Mark verified' }}
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.users.disabled', $user) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="secondary-button">
                                        {{ $user->isDisabled() ? 'Enable account' : 'Disable account' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
