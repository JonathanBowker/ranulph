@extends('layouts.portal')

@section('title', 'Profile')

@section('content')
    <section class="portal-hero-section">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Account</p>
                <h2>Profile and security controls</h2>
            </div>
            <p>Manage your identity, password, and account lifecycle with the same black, white, teal, and orange system used at sign in.</p>
        </div>
    </section>

    <section class="portal-section-card">
        @include('profile.partials.update-profile-information-form')
    </section>

    <section class="portal-section-card">
        @include('profile.partials.update-password-form')
    </section>

    <section class="portal-section-card">
        @include('profile.partials.delete-user-form')
    </section>
@endsection
