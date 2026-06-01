<section class="bg-[#f3f5f8] text-[#101827]">
    <div class="container-wide py-14 md:py-16">
        <div class="grid gap-10 rounded-[2rem] bg-[#111927] px-8 py-10 text-white md:grid-cols-[minmax(0,1fr)_auto] md:items-center">
            <div>
                <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-white/58">Next step</div>
                <h2 class="mt-4 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(2rem,4vw,3rem)] font-semibold leading-[1.02] tracking-tight text-white">
                    Ready to see if your risk posture is AI-ready?
                </h2>
                <p class="mt-4 max-w-[42rem] text-lg leading-relaxed text-white/72">
                    Tell us where AI touches your risk process and what needs to be governed. We will help you clarify the problem and define the right first move.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('home') }}#contact" class="inline-flex items-center justify-center rounded-[1rem] bg-[#14B8A6] px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-[#0F766E]">
                    Start a Ranulph enquiry
                </a>
                <a href="{{ route('use-cases') }}" class="inline-flex items-center justify-center rounded-[1rem] border border-white/15 px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/6">
                    View use cases
                </a>
            </div>
        </div>
    </div>
</section>

<footer class="bg-[#0b1018] text-white">
    <div class="container-wide py-12">
        <div class="grid gap-8 border-b border-white/10 pb-10 lg:grid-cols-[minmax(0,1.35fr)_minmax(0,1fr)] lg:items-start">
            <div>
                <img src="https://advancedanalytica.co.uk/images/infrastructure/logo.svg" alt="Advanced Analytica" class="h-8 w-auto" decoding="async">
                <p class="mt-6 max-w-[52rem] text-base leading-relaxed text-white/70">
                    To succeed in a data-driven environment, organisations need more than traditional approaches. They need solutions that connect decision makers with the right information, expert judgement, and operational control when it matters most.
                </p>
                <p class="mt-4 max-w-[52rem] text-base leading-relaxed text-white/62">
                    Advanced Analytica works with organisations to protect and capitalise on AI and data, manage risk, improve transparency, control cost, and strengthen performance. Drawing on enterprise-level expertise and more than two decades of data management experience, we turn data, AI, and organisational knowledge into governed strategic assets.
                </p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <div class="text-sm font-semibold uppercase tracking-[0.18em] text-white/56">Advanced Analytica</div>
                    <div class="mt-4 grid gap-3 text-sm text-white/72">
                        <a href="{{ route('about') }}" class="transition-colors hover:text-white">About</a>
                        <a href="{{ route('security') }}" class="transition-colors hover:text-white">Security</a>
                        <a href="{{ route('contact') }}" class="transition-colors hover:text-white">Contact</a>
                    </div>
                </div>

                <div>
                    <div class="text-sm font-semibold uppercase tracking-[0.18em] text-white/56">Policies</div>
                    <div class="mt-4 grid gap-3 text-sm text-white/72">
                        <a href="{{ route('rss-feeds') }}" class="transition-colors hover:text-white">RSS Feeds</a>
                        <a href="{{ route('privacy') }}" class="transition-colors hover:text-white">Privacy</a>
                        <a href="{{ route('terms') }}" class="transition-colors hover:text-white">Terms</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 grid gap-6 lg:grid-cols-[auto_minmax(0,1fr)] lg:items-start">
            <div class="text-sm text-white/58">
                &copy; {{ now()->year }} Advanced Analytica.
            </div>
        </div>
    </div>
</footer>
