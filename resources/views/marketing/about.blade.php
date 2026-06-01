@extends('layouts.marketing')

@section('content')
    <section class="border-b border-white/10 bg-[radial-gradient(circle_at_top,rgba(20,184,166,0.12),transparent_24%),linear-gradient(180deg,#070b12_0%,#090d14_100%)] py-20 md:py-24">
        <div class="container-wide">
            <div class="max-w-[60rem]">
                <div class="text-[0.9rem] font-semibold uppercase tracking-[0.28em] text-white/58">About</div>
                <h1 class="mt-5 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(3rem,6vw,5rem)] font-semibold leading-[0.98] tracking-tight text-white">
                    AI governance you can operate
                </h1>
                <p class="mt-6 max-w-[44rem] text-[clamp(1rem,1.8vw,1.35rem)] leading-relaxed text-white/70">
                    We work where organisations need expert knowledge, business rules, and governance controls to become operational inputs for AI systems.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-[#f3f5f8] text-[#101827]">
        <div class="container-wide py-14 md:py-16">
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach ($sections as $section)
                    <article class="rounded-[2rem] border border-[#e4e9f0] bg-white p-6 shadow-[0_10px_30px_rgba(15,23,36,0.04)]">
                        <div class="text-[0.72rem] font-semibold uppercase tracking-[0.24em] text-[#14B8A6]">{{ $section['title'] }}</div>
                        <p class="mt-4 text-base leading-relaxed text-[#475569]">{{ $section['body'] }}</p>
                    </article>
                @endforeach
            </div>

            <div class="mt-14 grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]">
                <div>
                    <div class="text-[0.9rem] font-semibold uppercase tracking-[0.28em] text-[#5b6980]">How we work</div>
                    <h2 class="mt-4 font-['Archivo','Segoe_UI',sans-serif] text-[clamp(2.2rem,4vw,3.5rem)] font-semibold leading-[1.02] tracking-tight text-[#101827]">
                        From intent to operation
                    </h2>
                    <p class="mt-5 text-lg leading-relaxed text-[#475569]">
                        We treat organisational knowledge as an operational asset: defined clearly, structured properly, connected to systems, and governed in use.
                    </p>
                    <div class="mt-8 grid gap-4 sm:grid-cols-2">
                        @foreach (['Assessment', 'Definition', 'Codification', 'Deployment', 'Operation', 'Assurance'] as $step)
                            <div class="rounded-[1.5rem] border border-[#e4e9f0] bg-white px-5 py-4 text-base font-semibold text-[#101827] shadow-[0_10px_30px_rgba(15,23,36,0.04)]">
                                {{ $step }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div>
                    <div class="text-[0.9rem] font-semibold uppercase tracking-[0.28em] text-[#5b6980]">Principles</div>
                    <div class="mt-4 grid gap-4">
                        @foreach ($principles as $title => $body)
                            <article class="rounded-[1.5rem] border border-[#e4e9f0] bg-white p-5 shadow-[0_10px_30px_rgba(15,23,36,0.04)]">
                                <h3 class="font-['Archivo','Segoe_UI',sans-serif] text-2xl font-semibold tracking-tight text-[#101827]">{{ $title }}</h3>
                                <p class="mt-3 text-base leading-relaxed text-[#475569]">{{ $body }}</p>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
