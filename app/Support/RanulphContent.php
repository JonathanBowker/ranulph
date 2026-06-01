<?php

namespace App\Support;

final class RanulphContent
{
    public static function ownOptions(): array
    {
        return [
            [
                'leaf' => 'risk_assessment',
                'title' => "Where's my real exposure?",
                'eyebrow' => 'Entering a new market, weighing an opportunity, or refreshing your assessment.',
                'body' => 'Most risk registers describe the world as it was. Ranulph builds a forward-looking picture of where your exposure actually sits, by market, by counterparty, by control. You see the hotspots before they cost you.',
                'freebie' => 'Risk Assessment, Document Review, Gap Analysis, and Action Plan template.',
                'cta' => 'Get the template',
                'submit_label' => 'Get my template',
                'urgent' => false,
            ],
            [
                'leaf' => 'benchmark_gap',
                'title' => 'Benchmark and Gap Analysis',
                'eyebrow' => 'You have a framework, policy, or control set and want to know if it holds up against best practice.',
                'body' => 'A policy that reads well and a framework that works are different things. Ranulph benchmarks what you have, and how you do it, against what good looks like, then shows you the gaps that matter and the ones that do not.',
                'freebie' => 'Benchmark and Gap Analysis template.',
                'cta' => 'Get the template',
                'submit_label' => 'Get my template',
                'urgent' => false,
            ],
            [
                'leaf' => 'implementation_support',
                'title' => 'Implementation Support',
                'eyebrow' => 'You know the gap and need content, training, or hands to close it.',
                'body' => 'Sixty-seven percent of integrity failures come from implementation, not policy. Ranulph turns an action plan into something your people actually do, backed by a 93% implementation rate against an industry norm nearer 25%.',
                'freebie' => 'Making risk relevant whitepaper or a direct scoping call.',
                'cta' => 'Discuss the implementation gap',
                'submit_label' => 'Book the call',
                'urgent' => false,
            ],
            [
                'leaf' => 'fraud_controls',
                'title' => 'Fraud Controls Diagnostic',
                'eyebrow' => 'You have a nagging worry, a board question, or a near miss.',
                'body' => 'A short, structured diagnostic that blends ACCA fraud prevention work, the ACFE Report to the Nations, and Business Fraud Alliance tools into one quick assessment. Answer a handful of questions and see where fraud is most likely to hide in a business like yours.',
                'freebie' => 'Blended fraud self-assessment.',
                'cta' => 'Start the diagnostic',
                'submit_label' => 'Start the diagnostic',
                'urgent' => false,
            ],
            [
                'leaf' => 'triage_response',
                'title' => 'Triage and Response',
                'eyebrow' => 'You have a whistleblower report, an adverse finding, or a problem that has already landed.',
                'body' => 'When something has already gone wrong, the first decisions are critical. Ranulph helps you triage what you are facing, decide what needs a human, and respond without making it worse.',
                'freebie' => 'Investigation essentials pack.',
                'cta' => 'Get fast response',
                'submit_label' => 'Send',
                'urgent' => true,
            ],
        ];
    }

    public static function otherOptions(): array
    {
        return [
            [
                'leaf' => 'pipeline_screen',
                'title' => 'Screen the pipeline',
                'eyebrow' => 'High deal volume, and you need to know fast which opportunities make sense to pursue.',
                'body' => 'Before you spend real diligence money, Ranulph gives you a fast, consistent read on each opportunity, so you put your effort where the risk and the upside actually are.',
                'freebie' => 'Sample one-page screen output.',
                'cta' => 'See the sample',
                'submit_label' => 'Get the sample',
            ],
            [
                'leaf' => 'deal_deep_dive',
                'title' => 'Deal deep-dive',
                'eyebrow' => 'One target, and you want the gaps and a usable action plan, not a 90-page PDF nobody reads.',
                'body' => 'A forward-looking analysis of a potential deal, partner, or counterparty: where the integrity risk sits, what the existing material misses, and a clear action plan you can attach to the deal. Built to inform an IC decision and post-transaction security.',
                'freebie' => 'Risk Assessment and Action Plan template plus redacted deal example.',
                'cta' => 'Request the deep-dive',
                'submit_label' => 'Request assessment',
            ],
            [
                'leaf' => 'portfolio_benchmark',
                'title' => 'Benchmark the portfolio',
                'eyebrow' => 'Existing holdings, and you want a consistent integrity read across them.',
                'body' => 'One company or the whole book, benchmarked the same way, so you can identify potential risks, share best practice, implement across multiple holdings, and prepare for profitable exits.',
                'freebie' => 'Gap Analysis and Benchmark template.',
                'cta' => 'Benchmark the portfolio',
                'submit_label' => 'Request assessment',
            ],
            [
                'leaf' => 'specific_concern',
                'title' => "Something's not quite right",
                'eyebrow' => 'A particular worry on a target or holding: fraud, reporting, or a whistleblower signal.',
                'body' => 'Sometimes it is one thing keeping you up. Ranulph helps you test the specific concern quickly and quietly, before it becomes a bigger issue.',
                'freebie' => 'Fraud self-assessment or investigation report template.',
                'cta' => 'Test the concern',
                'submit_label' => 'Start the diagnostic',
            ],
            [
                'leaf' => 'harmoniser',
                'title' => 'Reconciling multiple asks',
                'eyebrow' => 'An investee or co-investor has multiple action plans, policies, or compliance asks that overlap or conflict.',
                'body' => 'When three investors have even more different action plans, complying with all of them is a full-time job. Ranulph reconciles overlapping and conflicting obligations into one coherent plan, so you do the work once.',
                'freebie' => 'Harmoniser GPT MVP.',
                'cta' => 'Try the Harmoniser',
                'submit_label' => 'Try the Harmoniser',
            ],
        ];
    }

    public static function preferredNextSteps(): array
    {
        return [
            'Book a scoping call',
            'Request a deep-dive assessment',
            'Share documents first',
        ];
    }

    public static function roleOptions(): array
    {
        return [
            'Deal manager',
            'Direct investor',
            'Advisor vetting a target',
            'Internal integrity, ESG or risk',
            'Investee or co-investor',
        ];
    }

    public static function leafCatalog(): array
    {
        return collect(static::ownOptions())
            ->merge(static::otherOptions())
            ->mapWithKeys(fn (array $option) => [
                $option['leaf'] => [
                    'title' => $option['title'],
                    'submit_label' => $option['submit_label'],
                ],
            ])
            ->all();
    }

    public static function searchIndex(): array
    {
        $items = [
            [
                'title' => 'Use Cases',
                'description' => 'Practical use cases showing how teams deploy governed operating models across AI systems, operations, and policy workflows.',
                'url' => route('use-cases'),
                'keywords' => ['use cases', 'governed ai', 'workflows'],
                'section' => 'Navigation',
                'type' => 'Page',
                'tags' => ['Use Cases', 'Navigation'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Opinions',
                'description' => 'Working views on brand governance, machine-readable policy, controlled AI, and deployable assurance.',
                'url' => route('opinions'),
                'keywords' => ['opinions', 'policy', 'governance'],
                'section' => 'Navigation',
                'type' => 'Page',
                'tags' => ['Opinions', 'Navigation'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Resources',
                'description' => 'Practical resources for teams building policy-aware AI and risk systems.',
                'url' => route('resources'),
                'keywords' => ['resources', 'guides', 'checklists', 'templates'],
                'section' => 'Navigation',
                'type' => 'Page',
                'tags' => ['Resources', 'Navigation'],
                'requires_auth' => false,
            ],
            [
                'title' => 'About',
                'description' => 'AI governance you can operate.',
                'url' => route('about'),
                'keywords' => ['about', 'operating model', 'governance'],
                'section' => 'Navigation',
                'type' => 'Page',
                'tags' => ['About', 'Navigation'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Ranulph',
                'description' => "The risks you'll actually face don't show up in compliance checklists.",
                'url' => url('/'),
                'keywords' => ['risk', 'investors', 'integrity', 'ranulph', 'homepage'],
                'section' => 'Landing page',
                'type' => 'Page',
                'tags' => ['Risk', 'Investors', 'Integrity'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Where to start',
                'description' => 'Whose risk are you trying to understand?',
                'url' => url('/#start'),
                'keywords' => ['start', 'own organisation', 'another business'],
                'section' => 'Landing page',
                'type' => 'Page',
                'tags' => ['Decision', 'Triage'],
                'requires_auth' => false,
            ],
            [
                'title' => 'How it works',
                'description' => 'Context-first. Expert-led. AI-assisted.',
                'url' => url('/#how-it-works'),
                'keywords' => ['steps', 'workflow', 'context', 'expert', 'ai'],
                'section' => 'Landing page',
                'type' => 'Page',
                'tags' => ['Workflow', 'AI', 'Expert Review'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Contact Ranulph',
                'description' => 'Tell us where to send it and request the right next step.',
                'url' => url('/#contact'),
                'keywords' => ['contact', 'enquiry', 'send', 'get in touch'],
                'section' => 'Landing page',
                'type' => 'Form',
                'tags' => ['Contact', 'Enquiry'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Sign in',
                'description' => 'Use password, magic link, or LinkedIn sign-in to access the portal.',
                'url' => route('login'),
                'keywords' => ['login', 'auth', 'magic link', 'linkedin'],
                'section' => 'Authentication',
                'type' => 'Page',
                'tags' => ['Authentication', 'Magic Link', 'LinkedIn'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Register',
                'description' => 'Create a local account for the Ranulph portal.',
                'url' => route('register'),
                'keywords' => ['signup', 'register', 'account'],
                'section' => 'Authentication',
                'type' => 'Page',
                'tags' => ['Authentication', 'Account'],
                'requires_auth' => false,
            ],
            [
                'title' => 'Dashboard',
                'description' => 'Operations Hub for authenticated users.',
                'url' => route('dashboard'),
                'keywords' => ['portal', 'overview', 'operations', 'hub'],
                'section' => 'Portal',
                'type' => 'Page',
                'tags' => ['Portal', 'Operations'],
                'requires_auth' => true,
            ],
            [
                'title' => 'Workspaces',
                'description' => 'Workspace Registry for client environments and health.',
                'url' => route('portal.workspaces'),
                'keywords' => ['workspace', 'clients', 'registry'],
                'section' => 'Portal',
                'type' => 'Page',
                'tags' => ['Portal', 'Workspaces'],
                'requires_auth' => true,
            ],
            [
                'title' => 'Billing',
                'description' => 'Billing Control for plans, checkpoints, and subscription operations.',
                'url' => route('portal.billing'),
                'keywords' => ['billing', 'plans', 'subscription', 'stripe'],
                'section' => 'Portal',
                'type' => 'Page',
                'tags' => ['Portal', 'Billing'],
                'requires_auth' => true,
            ],
            [
                'title' => 'Support',
                'description' => 'Support Operations queues and escalation handling.',
                'url' => route('portal.support'),
                'keywords' => ['support', 'queues', 'escalations'],
                'section' => 'Portal',
                'type' => 'Page',
                'tags' => ['Portal', 'Support'],
                'requires_auth' => true,
            ],
        ];

        foreach (static::ownOptions() as $option) {
            $items[] = [
                'title' => $option['title'],
                'description' => $option['body'],
                'url' => url('/#branch-own'),
                'keywords' => [$option['eyebrow'], $option['freebie'], 'my own organisation', 'own organisation'],
                'section' => 'My own organisation',
                'type' => 'Use Case',
                'tags' => static::tagsForOption($option, 'My own organisation'),
                'requires_auth' => false,
            ];
        }

        foreach (static::otherOptions() as $option) {
            $items[] = [
                'title' => $option['title'],
                'description' => $option['body'],
                'url' => url('/#branch-other'),
                'keywords' => [$option['eyebrow'], $option['freebie'], 'another business', 'target', 'portfolio'],
                'section' => 'Another business',
                'type' => 'Use Case',
                'tags' => static::tagsForOption($option, 'Another business'),
                'requires_auth' => false,
            ];
        }

        foreach (MarketingContent::useCases() as $item) {
            $items[] = [
                'title' => $item['title'],
                'description' => $item['summary'],
                'url' => route('use-cases'),
                'keywords' => $item['tags'],
                'section' => 'Use Cases',
                'type' => 'Use Case',
                'tags' => $item['tags'],
                'requires_auth' => false,
            ];
        }

        foreach (MarketingContent::opinions() as $item) {
            $items[] = [
                'title' => $item['title'],
                'description' => $item['summary'],
                'url' => route('opinions.show', $item['slug']),
                'keywords' => $item['tags'],
                'section' => 'Opinions',
                'type' => 'Opinion',
                'tags' => $item['tags'],
                'requires_auth' => false,
            ];
        }

        foreach (MarketingContent::resources() as $item) {
            $items[] = [
                'title' => $item['title'],
                'description' => $item['summary'],
                'url' => route('resources'),
                'keywords' => $item['tags'],
                'section' => 'Resources',
                'type' => 'Resource',
                'tags' => $item['tags'],
                'requires_auth' => false,
            ];
        }

        return $items;
    }

    protected static function tagsForOption(array $option, string $branch): array
    {
        return collect([$branch, $option['leaf'], $option['title'], $option['freebie']])
            ->flatMap(function (string $value) {
                return preg_split('/[^a-z0-9]+/i', $value, -1, PREG_SPLIT_NO_EMPTY);
            })
            ->filter(fn (string $tag) => strlen($tag) > 3)
            ->map(fn (string $tag) => str($tag)->headline()->value())
            ->unique()
            ->take(5)
            ->values()
            ->all();
    }
}
