<?php

namespace App\Support;

final class MarketingContent
{
    public static function useCases(): array
    {
        return [
            [
                'title' => 'Product design system alignment',
                'summary' => 'Connect brand semantics to product design systems without duplication.',
                'series' => 'Use Case',
                'tags' => ['Brand', 'Systems', 'Execution'],
            ],
            [
                'title' => 'Brand: Creative approval at enterprise scale',
                'summary' => 'Turn brand guidance and asset rules into a governed knowledge base for faster, more consistent approvals.',
                'series' => 'Use Case',
                'tags' => ['Brand', 'Approvals', 'Governance'],
            ],
            [
                'title' => 'Global brand portfolio control',
                'summary' => 'Keep distributed teams aligned with shared standards and governance.',
                'series' => 'Use Case',
                'tags' => ['Brand', 'Governance', 'Systems'],
            ],
            [
                'title' => 'Professional services: Brand atomisation for AI readiness',
                'summary' => 'Structure brand, policy, and compliance knowledge for governed API and MCP delivery across service workflows.',
                'series' => 'Professional Services',
                'tags' => ['Professional Services', 'Brand', 'MCP'],
            ],
            [
                'title' => 'AI readiness for brand teams',
                'summary' => 'Prepare brand meaning for machine consumption without losing governance.',
                'series' => 'Use Case',
                'tags' => ['Brand', 'Governance', 'Readiness'],
            ],
        ];
    }

    public static function opinions(): array
    {
        return [
            [
                'title' => 'How to tokenise your brand: Where to start',
                'summary' => 'A practical entry point for leaders who need to make brand standards usable by AI.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Readiness', 'Execution'],
            ],
            [
                'title' => 'Measuring brand equity in the age of AI',
                'summary' => 'Why tokenisation turns brand equity from a loose idea into a structured evidence base.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Brand Equity', 'Consideration'],
            ],
            [
                'title' => 'Brand tokens as governance infrastructure',
                'summary' => 'Why tokenised brand standards should function as a live control layer for AI systems.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Governance', 'Systems'],
            ],
            [
                'title' => 'Brand risk in agentic AI systems',
                'summary' => 'A guide for leaders who need brand control before agents scale.',
                'series' => 'AI Agents',
                'tags' => ['AI Agents', 'Consideration'],
            ],
            [
                'title' => 'Your brand is invisible to AI',
                'summary' => 'Why AI-generated brand work drifts when your standards are still written only for humans.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Consideration', 'Governance'],
            ],
            [
                'title' => 'Brand knowledge graphs for AI',
                'summary' => 'How connected brand rules help AI find the right answer.',
                'series' => 'Brand-as-Code',
                'tags' => ['Brand-as-Code', 'Consideration', 'Knowledge Graphs'],
            ],
            [
                'title' => 'MCP servers and brand control',
                'summary' => 'How MCP can connect AI agents to governed brand policy.',
                'series' => 'AI Agents',
                'tags' => ['AI Agents', 'Consideration', 'MCP'],
            ],
            [
                'title' => 'What is machine-readable brand policy?',
                'summary' => 'Learn how brand rules become usable by AI systems.',
                'series' => 'Machine-Readable Brand Policy',
                'tags' => ['Machine-Readable Brand Policy', 'Consideration', 'Policy'],
            ],
            [
                'title' => 'Why your brand guidelines do not work for AI',
                'summary' => 'Most guidelines were written for people. AI needs clearer rules.',
                'series' => 'Machine-Readable Brand Policy',
                'tags' => ['Machine-Readable Brand Policy', 'Awareness', 'Brand Systems'],
            ],
            [
                'title' => 'What is Brando?',
                'summary' => 'A practical definition of the Intelligent Business Operating Model as a brand-first operating model for governed AI systems.',
                'series' => 'Brando',
                'tags' => ['Brando', 'Governance', 'Operating Model'],
            ],
        ];
    }

    public static function resources(): array
    {
        return [
            [
                'title' => 'Agentic AI brand risk checklist',
                'summary' => 'Define agent boundaries before they act for your brand.',
                'series' => 'Guides',
                'tags' => ['AI Agents', 'Guide'],
            ],
            [
                'title' => 'Brand AI governance stack guide',
                'summary' => 'A five-layer model for controlled AI-enabled brand work.',
                'series' => 'Guides',
                'tags' => ['Governance', 'Guide'],
            ],
            [
                'title' => 'Brand AI readiness scorecard',
                'summary' => 'Score your guidance against machine-readability, ambiguity, and AI control level.',
                'series' => 'Guides',
                'tags' => ['Readiness', 'Guide'],
            ],
            [
                'title' => 'Policy release notes template',
                'summary' => 'A simple format for documenting what changed in a policy bundle and why.',
                'series' => 'Template',
                'tags' => ['Policy', 'Governance'],
            ],
            [
                'title' => 'Brand-as-Code field guide',
                'summary' => 'Turn brand guidance into structured, governed policy.',
                'series' => 'Guides',
                'tags' => ['Brand-as-Code', 'Guide'],
            ],
            [
                'title' => 'Brando implementation checklist',
                'summary' => 'A practical checklist for introducing Brando into AI and data operations.',
                'series' => 'Checklist',
                'tags' => ['Brando', 'Governance'],
            ],
        ];
    }

    public static function aboutSections(): array
    {
        return [
            [
                'title' => 'Knowledge',
                'body' => 'Policies, processes, standards, documents, and specialist expertise.',
            ],
            [
                'title' => 'Structure',
                'body' => 'Specifications, schemas, datasets, linked records, and machine-readable logic.',
            ],
            [
                'title' => 'Delivery',
                'body' => 'APIs, MCP servers, internal tools, and governed runtime workflows.',
            ],
            [
                'title' => 'Control',
                'body' => 'Ownership, approvals, traceability, testing, and controlled change over time.',
            ],
        ];
    }

    public static function aboutPrinciples(): array
    {
        return [
            'Knowledge-first' => 'Start with what the organisation actually knows, not with generic tooling.',
            'Executable definition' => 'Specifications should be usable by both experts and systems.',
            'Auditable decisions' => 'Approvals, exceptions, and outputs must be traceable.',
            'Measured assurance' => 'Quality, drift, and policy adherence should become operational signals.',
        ];
    }

    public static function simplePages(): array
    {
        return [
            'security' => [
                'title' => 'Security',
                'kicker' => 'Operational trust',
                'intro' => 'We design governed AI systems with clear access boundaries, review paths, and traceable operational controls.',
                'body' => [
                    'Security here means more than infrastructure. It includes who can access what, how knowledge is exposed, where approvals sit, and how audit visibility is maintained across workflows.',
                    'This local site is a working portal prototype, so production security posture, vendor controls, and formal assurance documents would be tailored to the deployed environment and operating model.',
                ],
            ],
            'contact' => [
                'title' => 'Contact',
                'kicker' => 'Get in touch',
                'intro' => 'If you need to discuss a Ranulph assessment, workflow design, or controlled AI operating model, use the local enquiry route on the homepage.',
                'body' => [
                    'The homepage contact flow is the primary local contact surface in this app: it captures context, preferred next step, and urgency against the path selected.',
                    'For direct operational follow-up, the sign-in flow and authenticated portal routes remain available for internal users.',
                ],
            ],
            'rss-feeds' => [
                'title' => 'RSS Feeds',
                'kicker' => 'Syndication',
                'intro' => 'The live Advanced Analytica site publishes feed endpoints for ongoing content streams. This local app currently exposes the page structure but does not yet generate XML feeds.',
                'body' => [
                    'If you need feeds locally, the clean next step is to add generated RSS endpoints for opinions, resources, and use cases from the same content catalog used by these marketing pages.',
                ],
            ],
            'privacy' => [
                'title' => 'Privacy',
                'kicker' => 'Data handling',
                'intro' => 'Local enquiries in this app are handled within Laravel and currently logged to the application log rather than sent to an external CRM or lead endpoint.',
                'body' => [
                    'That means personal data submitted through the local Ranulph enquiry form is processed by this application instance and should be treated according to your deployment environment, retention policy, and access controls.',
                    'If this moves into production, you should define explicit retention, lawful basis, and operational access rules for submissions, audit traces, and auth-related records.',
                ],
            ],
            'terms' => [
                'title' => 'Terms',
                'kicker' => 'Working prototype',
                'intro' => 'This local portal is a working implementation environment for Ranulph, not a polished public legal surface.',
                'body' => [
                    'Use of the authenticated routes, billing workflows, and operational screens should follow the internal project scope and whatever customer or deployment terms govern the eventual production environment.',
                    'If you want public-facing terms here, the right approach is to define a proper local policy page set and link it into deployment, auth, and enquiry workflows consistently.',
                ],
            ],
        ];
    }
}
