@extends('layouts.portal')

@section('title', 'Ranulph Portal Overview')

@section('content')
    <section class="hero-panel">
        <div>
            <p class="eyebrow">Operations Hub</p>
            <h1>Give clients a controlled self-service surface instead of another support inbox.</h1>
            <p class="hero-copy">
                This portal prototype is designed around account operations: workspace health, billing readiness,
                access management, and support coordination from one deliberate interface.
            </p>

            <div class="hero-actions">
                <a class="primary-link" href="{{ route('portal.workspaces') }}">View workspaces</a>
                <a class="secondary-link" href="{{ route('portal.support') }}">Open support queues</a>
            </div>
        </div>

        <div class="hero-sidecard">
            <p class="eyebrow">This week</p>
            <ul class="compact-list">
                <li>3 onboarding runs completed without manual intervention</li>
                <li>1 billing exception awaiting commercial approval</li>
                <li>97% of support requests routed automatically</li>
            </ul>
        </div>
    </section>

    <section class="section-block">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Action Grid</p>
                <h2>Carry over the source site’s simple two-column decision pattern</h2>
            </div>
            <p>The original site emphasized a small set of strong choices. The portal overview now does the same for its highest-frequency actions.</p>
        </div>

        <div class="aa-cta-grid">
            <a class="aa-panel-link aa-panel-link--light" href="{{ route('portal.workspaces') }}">
                <strong>Workspace registry</strong>
                <span>Inspect client workspace state, usage signals, and provisioning issues.</span>
            </a>
            <a class="aa-panel-link aa-panel-link--light" href="{{ route('portal.support') }}">
                <strong>Support operations</strong>
                <span>Move straight into the live support queue and escalation handling path.</span>
            </a>
        </div>
    </section>

    <section class="stat-grid">
        @foreach ($stats as $stat)
            <article class="stat-card">
                <strong>{{ $stat['value'] }}</strong>
                <span>{{ $stat['label'] }}</span>
            </article>
        @endforeach
    </section>

    <section class="section-block">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Core Workstreams</p>
                <h2>Portal modules anchored in operational reality</h2>
            </div>
            <p>Every module is designed to reduce back-and-forth and make the client state legible at a glance.</p>
        </div>

        <div class="card-grid">
            @foreach ($workstreams as $workstream)
                <article class="portal-card">
                    <span class="pill">{{ $workstream['status'] }}</span>
                    <h3>{{ $workstream['title'] }}</h3>
                    <p>{{ $workstream['detail'] }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection
