@extends('layouts.portal')

@section('title', 'Ranulph Portal Workspaces')

@section('content')
    <section class="portal-hero-section">
        <div class="section-heading">
            <div>
                <p class="eyebrow">Workspace Registry</p>
                <h1>Track each client environment like an operating surface, not a row in a spreadsheet.</h1>
            </div>
            <p>Role readiness, plan tier, and intervention signals should stay visible to the team running the service.</p>
        </div>

        <div class="table-shell">
            <table class="workspace-table">
                <thead>
                    <tr>
                        <th>Workspace</th>
                        <th>Owner</th>
                        <th>Plan</th>
                        <th>Health</th>
                        <th>Signal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workspaces as $workspace)
                        <tr>
                            <td>{{ $workspace['name'] }}</td>
                            <td>{{ $workspace['owner'] }}</td>
                            <td>{{ $workspace['tier'] }}</td>
                            <td><span class="pill">{{ $workspace['health'] }}</span></td>
                            <td>{{ $workspace['usage'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
