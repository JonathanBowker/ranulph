@extends('layouts.portal')

@section('title', 'Ranulph Portal Support')

@section('content')
    <section class="portal-hero-section">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Support Operations</p>
                <h1>Make request routing and escalation posture obvious before issues turn into email archaeology.</h1>
            </div>
            <p>The support surface should tell clients what is open, what the response commitment is, and where responsibility sits.</p>
        </div>

        <div class="card-grid">
            @foreach ($queues as $queue)
                <article class="portal-card">
                    <span class="pill">{{ $queue['sla'] }}</span>
                    <h3>{{ $queue['name'] }}</h3>
                    <p>{{ $queue['volume'] }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection
