<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PortalController extends Controller
{
    public function overview(): View
    {
        return view('portal.overview', [
            'stats' => [
                ['value' => '18', 'label' => 'Active client workspaces'],
                ['value' => '97.4%', 'label' => 'Automated request resolution'],
                ['value' => '4m', 'label' => 'Median response time'],
            ],
            'workstreams' => [
                [
                    'title' => 'Onboarding and access',
                    'detail' => 'Provision new client operators, manage verification, and track readiness in one queue.',
                    'status' => 'Ready',
                ],
                [
                    'title' => 'Billing operations',
                    'detail' => 'Review invoices, subscription health, contract milestones, and intervention alerts.',
                    'status' => 'Stable',
                ],
                [
                    'title' => 'Support coordination',
                    'detail' => 'Route tickets to the right owner with context attached to the client workspace.',
                    'status' => '2 escalations',
                ],
            ],
        ]);
    }

    public function workspaces(): View
    {
        return view('portal.workspaces', [
            'workspaces' => [
                [
                    'name' => 'Advanced Analytica',
                    'owner' => 'Commercial operations',
                    'tier' => 'Scale',
                    'health' => 'Healthy',
                    'usage' => '84% seat utilization',
                ],
                [
                    'name' => 'EthicsInsight',
                    'owner' => 'Platform team',
                    'tier' => 'Growth',
                    'health' => 'Needs review',
                    'usage' => '2 stale invites',
                ],
                [
                    'name' => 'Ranulph Internal',
                    'owner' => 'Founder office',
                    'tier' => 'Enterprise pilot',
                    'health' => 'Healthy',
                    'usage' => '1 billing checkpoint due',
                ],
            ],
        ]);
    }

    public function billing(): View
    {
        return view('portal.billing', [
            'plans' => [
                [
                    'name' => 'Growth Monthly',
                    'price' => 'GBP 490',
                    'detail' => 'Self-serve onboarding, baseline governance, standard support.',
                ],
                [
                    'name' => 'Scale Monthly',
                    'price' => 'GBP 1,250',
                    'detail' => 'Role-based controls, escalation handling, reporting exports.',
                ],
                [
                    'name' => 'Enterprise',
                    'price' => 'Custom',
                    'detail' => 'Contracted support, bespoke workflows, integration oversight.',
                ],
            ],
            'checkpoints' => [
                'Stripe webhook health verified',
                'Invoice reminders aligned to billing cycle',
                'Manual review queue limited to exception cases',
            ],
        ]);
    }

    public function support(): View
    {
        return view('portal.support', [
            'queues' => [
                [
                    'name' => 'Access requests',
                    'volume' => '11 open',
                    'sla' => 'Same day',
                ],
                [
                    'name' => 'Billing exceptions',
                    'volume' => '3 open',
                    'sla' => '4 hours',
                ],
                [
                    'name' => 'Technical escalations',
                    'volume' => '1 open',
                    'sla' => 'Immediate',
                ],
            ],
        ]);
    }
}
