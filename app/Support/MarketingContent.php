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
                'slug' => 'how-to-tokenise-your-brand-where-to-start',
                'title' => 'How to tokenise your brand: Where to start',
                'summary' => 'A practical entry point for leaders who need to make brand standards usable by AI.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Readiness', 'Execution'],
                'body' => [
                    'Tokenising a brand does not start with design tokens alone. It starts by deciding which brand rules, definitions, claims, approvals, and exceptions need to become unambiguous enough for systems to use without improvising.',
                    'The first practical step is to separate stable rules from presentation. Voice, category definitions, naming logic, restricted claims, market exceptions, and approval boundaries need to be written in a way that can survive outside a PDF.',
                    'Once that structure exists, teams can turn brand into a governed operating layer for AI-assisted delivery rather than a reference document humans may or may not interpret consistently.',
                ],
            ],
            [
                'slug' => 'measuring-brand-equity-in-the-age-of-ai',
                'title' => 'Measuring brand equity in the age of AI',
                'summary' => 'Why tokenisation turns brand equity from a loose idea into a structured evidence base.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Brand Equity', 'Consideration'],
                'body' => [
                    'Brand equity becomes harder to defend when AI systems produce high volumes of brand-adjacent output without a shared operating definition of what the brand actually is.',
                    'Tokenisation forces explicit structure: what can be said, how value is signalled, which associations matter, and where consistency breaks. That moves brand equity from an abstract score into something teams can inspect and test.',
                    'In practice, that means measuring not just awareness outcomes, but control quality: drift rate, policy coverage, approval burden, and the consistency of machine-mediated brand decisions.',
                ],
            ],
            [
                'slug' => 'brand-tokens-as-governance-infrastructure',
                'title' => 'Brand tokens as governance infrastructure',
                'summary' => 'Why tokenised brand standards should function as a live control layer for AI systems.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Governance', 'Systems'],
                'body' => [
                    'If brand tokens are treated as a design convenience only, they remain too shallow to govern AI behaviour. The more useful frame is to treat them as governance infrastructure.',
                    'That means encoding not just styling primitives, but policy logic, controlled vocabulary, market restrictions, mandatory review points, and relationships between concepts that matter to downstream systems.',
                    'Used properly, brand tokens become one of the control surfaces through which organisations govern generation, approval, and publication at scale.',
                ],
            ],
            [
                'slug' => 'brand-risk-in-agentic-ai-systems',
                'title' => 'Brand risk in agentic AI systems',
                'summary' => 'A guide for leaders who need brand control before agents scale.',
                'series' => 'AI Agents',
                'tags' => ['AI Agents', 'Consideration'],
                'body' => [
                    'Agentic systems change the problem from content quality to delegated action. Once agents can decide, route, publish, or respond, brand risk becomes operational rather than editorial.',
                    'The core issue is not whether an agent can sound on-brand. It is whether the agent knows where authority stops, which claims are prohibited, what escalation path applies, and which context requires a human decision.',
                    'Brand control in agentic systems therefore depends on bounded permissions, machine-readable policy, and traceable decisions rather than tone guidance alone.',
                ],
            ],
            [
                'slug' => 'your-brand-is-invisible-to-ai',
                'title' => 'Your brand is invisible to AI',
                'summary' => 'Why AI-generated brand work drifts when your standards are still written only for humans.',
                'series' => 'The Tokenised Brand',
                'tags' => ['Brand Tokenisation', 'Consideration', 'Governance'],
                'body' => [
                    'Most brand guidelines were built for human interpretation: broad principles, visual examples, and explanatory prose. AI systems do not reliably infer the intent behind that material.',
                    'When the rules remain ambiguous, systems fill the gap with statistical guesses. That is where drift comes from: not malice, but missing structure.',
                    'Making brand visible to AI means expressing rules in forms that can be parsed, queried, validated, and enforced across tools and workflows.',
                ],
            ],
            [
                'slug' => 'brand-knowledge-graphs-for-ai',
                'title' => 'Brand knowledge graphs for AI',
                'summary' => 'How connected brand rules help AI find the right answer.',
                'series' => 'Brand-as-Code',
                'tags' => ['Brand-as-Code', 'Consideration', 'Knowledge Graphs'],
                'body' => [
                    'Brand guidance is relational. Claims depend on market, audience, product, channel, and approval state. A knowledge graph is one practical way to preserve those relationships for machine use.',
                    'Instead of hunting through disconnected assets, systems can query linked brand entities and rules: what this term means, where it is allowed, what evidence supports it, and who owns exceptions.',
                    'That turns brand retrieval from document search into governed reasoning over connected policy and context.',
                ],
            ],
            [
                'slug' => 'mcp-servers-and-brand-control',
                'title' => 'MCP servers and brand control',
                'summary' => 'How MCP can connect AI agents to governed brand policy.',
                'series' => 'AI Agents',
                'tags' => ['AI Agents', 'Consideration', 'MCP'],
                'body' => [
                    'MCP matters because it gives organisations a structured way to expose governed knowledge and tools to models and agents without flattening everything into prompts.',
                    'For brand control, that means agents can reach policy endpoints, definitions, controlled assets, and workflow actions through explicit interfaces rather than hidden operator knowledge.',
                    'The result is not automatic safety. It is better architecture: brand policy becomes callable, inspectable, and easier to constrain.',
                ],
            ],
            [
                'slug' => 'what-is-machine-readable-brand-policy',
                'title' => 'What is machine-readable brand policy?',
                'summary' => 'Learn how brand rules become usable by AI systems.',
                'series' => 'Machine-Readable Brand Policy',
                'tags' => ['Machine-Readable Brand Policy', 'Consideration', 'Policy'],
                'body' => [
                    'Machine-readable brand policy is brand governance expressed in a form software can consume reliably. It is structured enough to be validated, referenced, and enforced in workflows.',
                    'That usually means moving beyond prose into schemas, controlled fields, linked definitions, enumerated rules, decision trees, and auditable metadata.',
                    'The goal is not to eliminate human judgement. It is to ensure systems know the boundaries within which human judgement should operate.',
                ],
            ],
            [
                'slug' => 'why-your-brand-guidelines-do-not-work-for-ai',
                'title' => 'Why your brand guidelines do not work for AI',
                'summary' => 'Most guidelines were written for people. AI needs clearer rules.',
                'series' => 'Machine-Readable Brand Policy',
                'tags' => ['Machine-Readable Brand Policy', 'Awareness', 'Brand Systems'],
                'body' => [
                    'Traditional guidelines explain. AI systems need instruction. That difference matters because explanatory guidance leaves too much room for probabilistic interpretation.',
                    'A human designer can infer that a rule is strict, optional, contextual, or commercially sensitive. A model will not do that consistently without stronger structure.',
                    'The fix is not more pages. It is clearer policy expression: specific rules, explicit exceptions, and systems-ready representations of what counts as compliant output.',
                ],
            ],
            [
                'slug' => 'what-is-brando',
                'title' => 'What is Brando?',
                'summary' => 'A practical definition of the Intelligent Business Operating Model as a brand-first operating model for governed AI systems.',
                'series' => 'Brando',
                'tags' => ['Brando', 'Governance', 'Operating Model'],
                'body' => [
                    'Brando is a practical operating model for turning brand knowledge into governed system behaviour. The point is not branding as decoration, but brand as a structured control layer.',
                    'In that model, policies, definitions, assets, workflows, and approvals are connected so AI-enabled delivery can happen without losing ownership or traceability.',
                    'The useful question is not whether an organisation has AI tools. It is whether those tools operate against controlled knowledge, bounded workflows, and accountable decision paths.',
                ],
            ],
        ];
    }

    public static function opinion(string $slug): ?array
    {
        foreach (static::opinions() as $item) {
            if (($item['slug'] ?? null) === $slug) {
                return $item;
            }
        }

        return null;
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
