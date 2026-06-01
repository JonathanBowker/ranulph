<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ranulph | Advanced Analytica</title>
        <meta name="description" content="A forward-looking integrity risk tool for growth-stage investors, portfolio teams, and businesses facing real operating-context risk.">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="ranulph-home-body">
        <main
            class="min-h-screen pt-20"
            x-data="{
                branch: @js($initialState['branch']),
                leaf: @js($initialState['leaf']),
                contactVisible: @js($initialState['leaf'] !== ''),
                freebieRequested: @js($initialState['freebie_requested']),
                urgencyFlag: @js($initialState['urgency_flag']),
                submitLabel: @js($initialState['submit_label']),
                selectedTitle: @js($initialState['selected_title']),
                chooseBranch(branchKey) {
                    this.branch = branchKey;
                    this.leaf = '';
                    this.contactVisible = false;
                    this.freebieRequested = '';
                    this.submitLabel = 'Send';
                    this.selectedTitle = '';
                    this.$nextTick(() => {
                        const targetId = branchKey === 'own' ? 'branch-own' : 'branch-other';
                        document.getElementById(targetId)?.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    });
                },
                chooseLeaf(branchKey, leafKey, freebie, submitLabel, title) {
                    this.branch = branchKey;
                    this.leaf = leafKey;
                    this.contactVisible = true;
                    this.freebieRequested = freebie;
                    this.submitLabel = submitLabel;
                    this.selectedTitle = title;
                    this.$nextTick(() => document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth', block: 'start' }));
                },
                openContact() {
                    this.contactVisible = true;
                    this.$nextTick(() => document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth', block: 'start' }));
                }
            }"
        >
            <header data-site-header class="marketing-header fixed top-0 z-50 w-full">
                <div class="container-nav flex items-center justify-between py-5 md:py-7">
                    <a href="{{ route('home') }}" class="flex items-center gap-3 text-white justify-self-start">
                        <img src="https://advancedanalytica.co.uk/images/infrastructure/logo.svg" alt="Advanced Analytica" class="h-7 w-auto md:h-9" decoding="async">
                        <span class="sr-only">Advanced Analytica: iBOM</span>
                    </a>

                    <div class="flex items-center gap-3 md:hidden">
                        @auth
                            <a href="{{ route('dashboard') }}" class="marketing-ghost-button px-3 py-2 text-xs">
                                Open portal
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="marketing-ghost-button px-3 py-2 text-xs">
                                Sign in
                            </a>
                        @endauth

                        <a href="#contact" @click.prevent="openContact()" class="marketing-primary-button px-3 py-2 text-xs">
                            Get in touch
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                <path d="M4 10h12"></path>
                                <path d="M12 6l4 4-4 4"></path>
                            </svg>
                        </a>

                        <button type="button" data-mobile-menu-toggle aria-label="Open menu" aria-expanded="false" aria-controls="mobile-nav-panel" class="marketing-icon-button">
                            <svg data-mobile-menu-icon-open class="h-5 w-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                                <path d="M3 6h14"></path>
                                <path d="M3 10h14"></path>
                                <path d="M3 14h14"></path>
                            </svg>
                            <svg data-mobile-menu-icon-close class="hidden h-5 w-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true">
                                <path d="M5 5l10 10"></path>
                                <path d="M15 5L5 15"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="hidden md:flex md:flex-1 md:items-center md:justify-end md:gap-6">
                        <div class="relative flex flex-1 items-center justify-end gap-6">
                            <nav data-main-nav class="marketing-nav transition-opacity duration-200">
                                <a href="{{ route('home') }}" class="inline-flex items-center transition-colors hover:text-white">Home</a>
                                <a href="{{ route('use-cases') }}" class="inline-flex items-center transition-colors hover:text-white">Use Cases</a>
                                <a href="{{ route('opinions') }}" class="inline-flex items-center transition-colors hover:text-white">Opinions</a>
                                <a href="{{ route('resources') }}" class="inline-flex items-center transition-colors hover:text-white">Resources</a>
                                <a href="{{ route('about') }}" class="inline-flex items-center transition-colors hover:text-white">About</a>
                            </nav>

                            <button type="button" data-search-toggle aria-label="Open search" aria-expanded="false" aria-controls="site-search-panel" class="marketing-icon-button">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                    <circle cx="9" cy="9" r="5"></circle>
                                    <path d="M13 13l4 4"></path>
                                </svg>
                            </button>

                            <div id="site-search-panel" data-search-panel class="pointer-events-none absolute inset-y-[-0.35rem] right-0 flex w-full max-w-[48rem] -translate-x-8 items-center opacity-0 transition-all duration-300 ease-out">
                                <form action="{{ route('search') }}" method="get" class="w-full">
                                    <label class="sr-only" for="site-search-input">Search</label>
                                    <div class="relative">
                                        <input id="site-search-input" name="q" type="search" placeholder="Search the site..." class="w-full rounded-md border border-white/15 bg-[#12161d] px-4 py-3 pr-24 text-base text-white placeholder:text-white/45 focus:outline-none focus:ring-2 focus:ring-[#14B8A6]/40">
                                        <button type="submit" aria-label="Submit search" class="absolute right-11 top-1/2 inline-flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-md text-white/70 transition-colors hover:text-white">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <circle cx="9" cy="9" r="5"></circle>
                                                <path d="M13 13l4 4"></path>
                                            </svg>
                                        </button>
                                        <button type="button" data-search-close aria-label="Close search" class="absolute right-3 top-1/2 inline-flex h-8 w-8 -translate-y-1/2 items-center justify-center rounded-md text-white/70 transition-colors hover:text-white">
                                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M5 5l10 10"></path>
                                                <path d="M15 5L5 15"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        @auth
                            <a href="{{ route('dashboard') }}" class="marketing-ghost-button px-4 py-2 text-sm">
                                Open portal
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="marketing-ghost-button px-4 py-2 text-sm">
                                Sign in
                            </a>
                        @endauth

                        <a href="#contact" @click.prevent="openContact()" class="marketing-primary-button px-4 py-2 text-sm">
                            Get in touch
                        </a>
                    </div>
                </div>

                <div id="mobile-nav-panel" data-mobile-menu-panel class="hidden border-t border-white/10 bg-[#050505]/98 md:hidden">
                    <nav class="marketing-mobile-nav container-nav grid gap-1 py-4 text-base font-medium" aria-label="Mobile navigation">
                        <a href="{{ route('home') }}" class="rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white">Home</a>
                        <a href="{{ route('use-cases') }}" class="rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white">Use Cases</a>
                        <a href="{{ route('opinions') }}" class="rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white">Opinions</a>
                        <a href="{{ route('resources') }}" class="rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white">Resources</a>
                        <a href="{{ route('about') }}" class="rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white">About</a>
                        <a href="{{ route('search') }}" class="rounded-md px-3 py-3 transition-colors hover:bg-white/5 hover:text-white">Search</a>
                    </nav>
                </div>
            </header>

            <section class="border-b border-white/10 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.08),transparent_28%),linear-gradient(180deg,#050505_0%,#0b0b0b_52%,#050505_100%)] py-24 text-white">
                <div class="container-wide text-center">
                    <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-white/58">
                        Ranulph
                    </div>
                    <h1 class="mx-auto mt-6 max-w-[54rem] font-['Archivo','Segoe_UI',sans-serif] text-[clamp(3rem,8vw,6.25rem)] font-semibold leading-[0.97] tracking-tight text-white">
                        The risks you'll actually face don't show up in compliance checklists.
                    </h1>
                    <p class="mx-auto mt-8 max-w-[48rem] text-[clamp(1.05rem,2.2vw,1.55rem)] leading-relaxed text-white/74">
                        Ranulph replaces box-ticking assessments with forward-looking risk intelligence for growth-stage investors.
                    </p>
                    <p class="mt-6 text-[clamp(1.2rem,2.8vw,1.9rem)] font-semibold uppercase tracking-[0.22em] text-white">
                        Expert judgement. AI-accelerated.
                    </p>
                    <p class="mt-6 text-[clamp(1.2rem,2.8vw,1.9rem)] font-semibold uppercase tracking-[0.22em] text-white">
                        Your risk. Your context. Your scope.
                    </p>
                </div>
            </section>

            <section id="start" class="border-b border-[#050505]/10 bg-[#f3f0e8] py-24 text-[#050505]">
                <div class="container-wide flex flex-col items-center text-center">
                    <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-[#050505]/58">
                        Where to start
                    </div>
                    <h2 class="mt-6 max-w-[60rem] font-['Archivo','Segoe_UI',sans-serif] text-[clamp(2.2rem,5vw,4.4rem)] font-semibold leading-[1.02] tracking-tight text-[#050505] md:max-w-[64rem]">
                        Whose risk are you trying to understand?
                    </h2>

                    <div class="mt-12 flex w-full flex-col items-center gap-4">
                        <button type="button" class="ranulph-option ranulph-option-light rounded-[2rem] px-8 py-5 text-center text-xl leading-relaxed" @click="chooseBranch('own')">
                            My own organisation
                        </button>
                        <button type="button" class="ranulph-option ranulph-option-light rounded-[2rem] px-8 py-5 text-center text-xl leading-relaxed" @click="chooseBranch('other')">
                            Another business
                        </button>
                    </div>
                </div>
            </section>

            <section id="branch-own" x-show="branch === 'own'" x-cloak class="border-b border-white/10 bg-[#14B8A6] py-24 text-white">
                <div class="container-wide">
                    <div class="mx-auto max-w-[980px] text-center">
                        <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-white/70">What you need</div>
                        <h2 class="mt-6 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(2.2rem,5vw,4rem)] font-semibold leading-[1.03] tracking-tight text-white">
                            Where are you right now?
                        </h2>
                    </div>

                    <div class="mt-12 grid gap-5 lg:grid-cols-2">
                        @foreach ($ownOptions as $option)
                            <article class="rounded-[2rem] border border-white/24 bg-transparent p-6 text-white">
                                <div class="flex flex-wrap items-start justify-between gap-4">
                                    <div>
                                        <h3 class="font-['Archivo','Segoe_UI',sans-serif] text-3xl font-semibold tracking-tight text-white">{{ $option['title'] }}</h3>
                                        <p class="mt-3 text-sm font-semibold uppercase tracking-[0.14em] text-white/70">{{ $option['eyebrow'] }}</p>
                                    </div>

                                    @if ($option['urgent'])
                                        <span class="rounded-[2rem] border border-white/60 px-3 py-1 text-xs font-semibold uppercase tracking-[0.14em] text-white">
                                            Urgent
                                        </span>
                                    @endif
                                </div>

                                <p class="mt-5 text-base leading-relaxed text-white/82">{{ $option['body'] }}</p>

                                <div class="mt-5 rounded-[1.5rem] border border-white/24 bg-white/8 p-4 text-sm leading-relaxed text-white/78">
                                    <span class="font-semibold text-white">Free asset: </span>{{ $option['freebie'] }}
                                </div>

                                <button
                                    type="button"
                                    class="ranulph-option mt-6 rounded-[2rem] px-8 py-4 text-base font-semibold"
                                    @click="chooseLeaf('own', @js($option['leaf']), @js($option['freebie']), @js($option['submit_label']), @js($option['title']))"
                                >
                                    {{ $option['cta'] }}
                                </button>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="branch-other" x-show="branch === 'other'" x-cloak class="border-b border-[#050505]/10 bg-[#ff8c69] py-24 text-[#050505]">
                <div class="container-wide">
                    <div class="mx-auto max-w-[980px] text-center">
                        <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-[#050505]/58">What you need to understand</div>
                        <h2 class="mt-6 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(2.2rem,5vw,4rem)] font-semibold leading-[1.03] tracking-tight text-[#050505]">
                            What do you need to understand?
                        </h2>
                    </div>

                    <div class="mt-12 grid gap-5 lg:grid-cols-2">
                        @foreach ($otherOptions as $option)
                            <article class="rounded-[2rem] border border-[#050505]/16 bg-transparent p-6 text-[#050505]">
                                <h3 class="font-['Archivo','Segoe_UI',sans-serif] text-3xl font-semibold tracking-tight text-[#050505]">{{ $option['title'] }}</h3>
                                <p class="mt-3 text-sm font-semibold uppercase tracking-[0.14em] text-[#050505]/62">{{ $option['eyebrow'] }}</p>
                                <p class="mt-5 text-base leading-relaxed text-[#050505]/78">{{ $option['body'] }}</p>

                                <div class="mt-5 rounded-[1.5rem] border border-[#050505]/16 bg-[#050505]/5 p-4 text-sm leading-relaxed text-[#050505]/74">
                                    <span class="font-semibold text-[#050505]">Free asset: </span>{{ $option['freebie'] }}
                                </div>

                                <button
                                    type="button"
                                    class="ranulph-option ranulph-option-light mt-6 rounded-[2rem] px-8 py-4 text-base font-semibold"
                                    @click="chooseLeaf('other', @js($option['leaf']), @js($option['freebie']), @js($option['submit_label']), @js($option['title']))"
                                >
                                    {{ $option['cta'] }}
                                </button>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section id="how-it-works" class="border-b border-[#050505]/10 bg-[#f3f0e8] py-24 text-[#050505]">
                <div class="container-wide">
                    <div class="mx-auto max-w-[980px] text-center">
                        <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-[#050505]/58">How it works</div>
                        <h2 class="mt-6 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(2.2rem,5vw,4rem)] font-semibold leading-[1.03] tracking-tight text-[#050505]">
                            Context-first. Expert-led. AI-assisted.
                        </h2>
                    </div>

                    <div class="mt-12 grid gap-4 md:grid-cols-3">
                        <div class="rounded-[2rem] border border-[#050505]/16 bg-transparent p-6">
                            <div class="font-['Archivo','Segoe_UI',sans-serif] text-3xl font-semibold tracking-tight text-[#050505]">Step 1</div>
                            <p class="mt-4 text-base leading-relaxed text-[#2b3445]">
                                Ranulph starts with the operating context: market, counterparty, incentives, controls, and the point where risk becomes real before a policy or checklist can see it.
                            </p>
                        </div>
                        <div class="rounded-[2rem] border border-[#050505]/16 bg-transparent p-6">
                            <div class="font-['Archivo','Segoe_UI',sans-serif] text-3xl font-semibold tracking-tight text-[#050505]">Step 2</div>
                            <p class="mt-4 text-base leading-relaxed text-[#2b3445]">
                                Human-in-the-loop brings expert judgement into the process, so AI can accelerate integrity analysis without replacing accountability.
                            </p>
                        </div>
                        <div class="rounded-[2rem] border border-[#050505]/16 bg-transparent p-6">
                            <div class="font-['Archivo','Segoe_UI',sans-serif] text-3xl font-semibold tracking-tight text-[#050505]">Step 3</div>
                            <p class="mt-4 text-base leading-relaxed text-[#2b3445]">
                                You leave with a next step: a practical asset, a diagnostic, a scoping call, or a deeper assessment path linked to what you are actually trying to decide.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact" x-show="contactVisible" x-cloak class="border-b border-white/10 bg-[radial-gradient(circle_at_top,rgba(255,255,255,0.08),transparent_28%),linear-gradient(180deg,#050505_0%,#0b0b0b_52%,#050505_100%)] py-24 text-white">
                <div class="container-wide">
                    <div class="mx-auto grid max-w-[1080px] gap-8">
                        <div class="max-w-[52rem]">
                            <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-white/58">Next step</div>
                            <h2 class="mt-6 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(2.2rem,5vw,4rem)] font-semibold leading-[1.03] tracking-tight text-white">
                                <span x-show="selectedTitle">Tell us where to send <span x-text="selectedTitle"></span></span>
                                <span x-show="!selectedTitle">Tell us where to send it</span>
                            </h2>
                            <p class="mt-6 text-lg leading-relaxed text-white/72">
                                We will tag your enquiry with the path you selected and come back with the right next step.
                            </p>
                        </div>

                        <form action="{{ route('ranulph.enquiry') }}" method="POST" class="grid gap-5 rounded-[2rem] border border-white/15 bg-white/96 p-6 text-[#050505] shadow-[0_10px_30px_rgba(2,8,23,0.06)]" novalidate>
                            @csrf

                            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off" aria-hidden="true">
                            <input type="hidden" name="branch" x-model="branch">
                            <input type="hidden" name="leaf" x-model="leaf">
                            <input type="hidden" name="freebie_requested" x-model="freebieRequested">
                            <input type="hidden" name="urgency_flag" :value="urgencyFlag ? 'true' : 'false'">

                            @if (session('ranulph_status'))
                                <div class="rounded-[1.25rem] border border-[#14B8A6]/28 bg-[#14B8A6]/10 px-4 py-3 text-sm leading-relaxed text-[#0f766e]">
                                    {{ session('ranulph_status') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="rounded-[1.25rem] border border-[#ff8c69]/30 bg-[#ff8c69]/10 px-4 py-3 text-sm leading-relaxed text-[#7c2d12]">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            <div class="grid gap-5 md:grid-cols-2">
                                <div class="grid gap-2">
                                    <label for="ranulph-name" class="text-sm font-semibold uppercase tracking-[0.08em] text-[#050505]">Name*</label>
                                    <input id="ranulph-name" name="name" type="text" required autocomplete="name" value="{{ old('name') }}" placeholder="Your name" class="w-full rounded-xl border border-[#e3e6eb] bg-white px-4 py-3 text-base text-[#050505] outline-none transition-colors placeholder:text-[#2b3445]/55 focus:border-[#14B8A6] focus:ring-2 focus:ring-[#14B8A6]/20">
                                </div>
                                <div class="grid gap-2">
                                    <label for="ranulph-email" class="text-sm font-semibold uppercase tracking-[0.08em] text-[#050505]">Email*</label>
                                    <input id="ranulph-email" name="email" type="email" required autocomplete="email" inputmode="email" value="{{ old('email') }}" placeholder="you@example.com" class="w-full rounded-xl border border-[#e3e6eb] bg-white px-4 py-3 text-base text-[#050505] outline-none transition-colors placeholder:text-[#2b3445]/55 focus:border-[#14B8A6] focus:ring-2 focus:ring-[#14B8A6]/20">
                                </div>
                            </div>

                            <div class="grid gap-5 md:grid-cols-2">
                                <div class="grid gap-2">
                                    <label for="ranulph-organisation" class="text-sm font-semibold uppercase tracking-[0.08em] text-[#050505]">Organisation*</label>
                                    <input id="ranulph-organisation" name="organisation" type="text" required autocomplete="organization" value="{{ old('organisation') }}" placeholder="Organisation name" class="w-full rounded-xl border border-[#e3e6eb] bg-white px-4 py-3 text-base text-[#050505] outline-none transition-colors placeholder:text-[#2b3445]/55 focus:border-[#14B8A6] focus:ring-2 focus:ring-[#14B8A6]/20">
                                </div>
                                <div class="grid gap-2">
                                    <label for="ranulph-role" class="text-sm font-semibold uppercase tracking-[0.08em] text-[#050505]">Your role</label>
                                    <select id="ranulph-role" name="role" class="w-full rounded-xl border border-[#e3e6eb] bg-white px-4 py-3 text-base text-[#050505] outline-none transition-colors focus:border-[#14B8A6] focus:ring-2 focus:ring-[#14B8A6]/20">
                                        <option value="">Select if relevant</option>
                                        @foreach ($roleOptions as $roleOption)
                                            <option value="{{ $roleOption }}" @selected(old('role') === $roleOption)>{{ $roleOption }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="grid gap-2">
                                <div class="text-sm font-semibold uppercase tracking-[0.08em] text-[#050505]">Preferred next step*</div>
                                <div class="grid gap-3 md:grid-cols-3">
                                    @foreach ($preferredNextSteps as $preferredNextStep)
                                        <label class="flex items-start gap-3 rounded-[2rem] border border-[#e3e6eb] bg-white px-4 py-4 text-sm leading-relaxed text-[#2b3445]">
                                            <input type="radio" name="preferred_next_step" value="{{ $preferredNextStep }}" @checked(old('preferred_next_step') === $preferredNextStep) required class="mt-1 h-4 w-4 accent-[#14B8A6]">
                                            <span>
                                                <span class="block font-semibold text-[#050505]">{{ $preferredNextStep }}</span>
                                                @if ($preferredNextStep === 'Share documents first')
                                                    <span class="mt-1 block text-xs leading-relaxed text-[#2b3445]">
                                                        Secure file-transfer link sent after submission.
                                                    </span>
                                                @endif
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <label class="flex items-start gap-3 rounded-2xl border border-[#e3e6eb] bg-white px-4 py-4 text-sm leading-relaxed text-[#2b3445]">
                                <input type="checkbox" name="time_sensitive" value="yes" @checked(old('time_sensitive')) class="mt-1 h-4 w-4 accent-[#14B8A6]" @change="urgencyFlag = $event.target.checked">
                                <span>
                                    <span class="block font-semibold text-[#050505]">Is this time-sensitive?</span>
                                    <span>Use this only if something needs a fast human response.</span>
                                </span>
                            </label>

                            <div class="grid gap-2">
                                <label for="ranulph-note" class="text-sm font-semibold uppercase tracking-[0.08em] text-[#050505]">Anything we should know?</label>
                                <textarea id="ranulph-note" name="message" rows="4" placeholder="One optional line of context." class="w-full resize-y rounded-xl border border-[#e3e6eb] bg-white px-4 py-3 text-base text-[#050505] outline-none transition-colors placeholder:text-[#2b3445]/55 focus:border-[#14B8A6] focus:ring-2 focus:ring-[#14B8A6]/20">{{ old('message') }}</textarea>
                            </div>

                            <label class="flex items-start gap-3 rounded-2xl border border-[#e3e6eb] bg-white px-4 py-4 text-sm leading-relaxed text-[#2b3445]">
                                <input type="checkbox" name="confidentiality_consent" value="yes" @checked(old('confidentiality_consent')) required class="mt-1 h-4 w-4 accent-[#14B8A6]">
                                <span>I understand Ranulph handles this enquiry under confidentiality.</span>
                            </label>

                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div class="text-sm text-[#2b3445]">
                                    Your selection will be tagged to the path you chose above.
                                </div>
                                <button type="submit" class="inline-flex items-center justify-center rounded-[2rem] bg-[#050505] px-8 py-4 text-base font-semibold text-white transition-colors hover:bg-[#222222]">
                                    <span x-text="submitLabel"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </main>

        @include('partials.marketing-footer')

        <script>
            (() => {
                const header = document.querySelector('[data-site-header]');
                if (!(header instanceof HTMLElement)) return;

                const toggle = header.querySelector('[data-search-toggle]');
                const panel = header.querySelector('[data-search-panel]');
                const input = header.querySelector('#site-search-input');
                const close = header.querySelector('[data-search-close]');
                const nav = header.querySelector('[data-main-nav]');

                if (!(toggle instanceof HTMLButtonElement)) return;
                if (!(panel instanceof HTMLElement)) return;
                if (!(input instanceof HTMLInputElement)) return;
                if (!(close instanceof HTMLButtonElement)) return;

                const setOpen = (open) => {
                    nav?.classList.toggle('opacity-0', open);
                    nav?.classList.toggle('pointer-events-none', open);
                    panel.classList.toggle('opacity-0', !open);
                    panel.classList.toggle('-translate-x-8', !open);
                    panel.classList.toggle('pointer-events-none', !open);
                    panel.classList.toggle('opacity-100', open);
                    panel.classList.toggle('translate-x-0', open);
                    panel.classList.toggle('pointer-events-auto', open);
                    toggle.setAttribute('aria-expanded', String(open));
                    toggle.setAttribute('aria-label', open ? 'Close search' : 'Open search');

                    if (open) {
                        window.requestAnimationFrame(() => input.focus());
                    }
                };

                toggle.addEventListener('click', () => {
                    const open = toggle.getAttribute('aria-expanded') === 'true';
                    setOpen(!open);
                });

                close.addEventListener('click', () => setOpen(false));

                document.addEventListener('click', (event) => {
                    if (!header.contains(event.target)) {
                        setOpen(false);
                    }
                });

                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        setOpen(false);
                    }
                });
            })();

            (() => {
                const header = document.querySelector('[data-site-header]');
                if (!(header instanceof HTMLElement)) return;

                const toggle = header.querySelector('[data-mobile-menu-toggle]');
                const panel = header.querySelector('[data-mobile-menu-panel]');
                const openIcon = header.querySelector('[data-mobile-menu-icon-open]');
                const closeIcon = header.querySelector('[data-mobile-menu-icon-close]');

                if (!(toggle instanceof HTMLButtonElement)) return;
                if (!(panel instanceof HTMLElement)) return;
                if (!(openIcon instanceof SVGElement)) return;
                if (!(closeIcon instanceof SVGElement)) return;

                const setOpen = (open) => {
                    panel.classList.toggle('hidden', !open);
                    openIcon.classList.toggle('hidden', open);
                    closeIcon.classList.toggle('hidden', !open);
                    toggle.setAttribute('aria-expanded', String(open));
                    toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
                };

                toggle.addEventListener('click', () => {
                    const open = toggle.getAttribute('aria-expanded') === 'true';
                    setOpen(!open);
                });

                panel.querySelectorAll('a').forEach((link) => {
                    link.addEventListener('click', () => setOpen(false));
                });

                document.addEventListener('click', (event) => {
                    if (!header.contains(event.target)) {
                        setOpen(false);
                    }
                });

                document.addEventListener('keydown', (event) => {
                    if (event.key === 'Escape') {
                        setOpen(false);
                    }
                });

                window.addEventListener('resize', () => {
                    if (window.matchMedia('(min-width: 768px)').matches) {
                        setOpen(false);
                    }
                });
            })();
        </script>
    </body>
</html>
