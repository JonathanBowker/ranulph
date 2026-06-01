@extends('layouts.portal')

@section('title', 'Ranulph Portal Billing')

@section('content')
    <section class="section-block">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Billing Control</p>
                <h1>Keep subscription posture, plan design, and exception handling in one visible lane.</h1>
            </div>
            <p>This is where clients should understand what they are on, what they are paying for, and where intervention is required.</p>
        </div>

        <div class="card-grid">
            @foreach ($plans as $plan)
                <article class="portal-card">
                    <span class="pill">{{ $plan['price'] }}</span>
                    <h3>{{ $plan['name'] }}</h3>
                    <p>{{ $plan['detail'] }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="section-block">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Readiness Checklist</p>
                <h2>Operational checks before live billing</h2>
            </div>
        </div>

        <div class="check-grid">
            @foreach ($checkpoints as $checkpoint)
                <article class="check-card">{{ $checkpoint }}</article>
            @endforeach
        </div>
    </section>
@endsection
