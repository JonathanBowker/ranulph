<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ranulph Portal</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="portal-body">
        <div class="portal-frame">
            <main class="portal-shell">
                <section class="aa-surface">
                    <div class="aa-stack">
                        <div class="aa-motif">
                            <div class="aa-motif__item"><x-application-logo /></div>
                            <div class="aa-motif__item aa-motif__item--center"><x-application-logo /></div>
                            <div class="aa-motif__item"><x-application-logo /></div>
                            <div class="aa-motif__item"><x-application-logo /></div>
                            <div class="aa-motif__item"><x-application-logo /></div>
                        </div>

                        <h1 class="aa-headline aa-headline--dark">
                            Welcome to your client operations portal
                            <span>on DigitalOcean</span>
                        </h1>

                        <p class="aa-copy-block aa-copy-block--dark">
                            Ranulph gives clients a focused self-service surface for workspace visibility, billing,
                            support coordination, and controlled access. The structure here now mirrors the source app:
                            centered motif first, headline second, decisions third.
                        </p>

                        <div class="aa-cta-grid mt-8 w-full">
                            @auth
                                <a class="aa-panel-link aa-panel-link--light" href="{{ route('dashboard') }}">
                                    <strong>Open portal</strong>
                                    <span>Move directly into the authenticated overview and client operations workspace.</span>
                                </a>
                            @else
                                <a class="aa-panel-link aa-panel-link--light" href="{{ route('login') }}">
                                    <strong>Sign in</strong>
                                    <span>Use password or magic-link access from the themed login surface.</span>
                                </a>
                            @endauth

                            @auth
                                <a class="aa-panel-link aa-panel-link--light" href="{{ route('portal.workspaces') }}">
                                    <strong>View workspaces</strong>
                                    <span>Inspect client workspace state, usage signals, and provisioning issues.</span>
                                </a>
                            @else
                                <a class="aa-panel-link aa-panel-link--light" href="{{ route('register') }}">
                                    <strong>Create account</strong>
                                    <span>Provision a new user path with verification and superadmin control.</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </section>

                <section class="section-block">
                    <div class="section-heading">
                        <div>
                            <p class="eyebrow">Source Structure</p>
                            <h2>Ported from the original site’s live page pattern</h2>
                        </div>
                        <p>The source app had one simple page: a logo field, a strong headline, and a two-action grid. Those motifs are now first-class here.</p>
                    </div>

                    <div class="aa-cta-grid">
                        <a class="aa-panel-link aa-panel-link--light" href="https://www.digitalocean.com/docs/app-platform">
                            <strong>DigitalOcean Docs</strong>
                            <span>Keep the original starter’s first CTA, but make it relevant to the deployment path behind this portal.</span>
                        </a>

                        <a class="aa-panel-link aa-panel-link--light" href="{{ route('admin.users.index') }}">
                            <strong>DigitalOcean Dashboard</strong>
                            <span>Use the second CTA slot for operational control, mapped here to portal user management and access administration.</span>
                        </a>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
