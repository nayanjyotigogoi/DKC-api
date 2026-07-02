<x-filament::page class="filament-dashboard-page">

    {{-- Visit Site banner --}}
    <div
        class="flex items-center justify-between rounded-xl px-5 py-4 mb-2"
        style="background: linear-gradient(135deg, #0F2240 0%, #8B1E24 100%);"
    >
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-lg flex items-center justify-center" style="background: rgba(255,255,255,0.12);">
                <x-heroicon-o-globe-alt class="w-5 h-5 text-white" />
            </div>
            <div>
                <p class="text-white font-semibold text-sm leading-tight">Dibrugarh Korean Club</p>
                <p class="text-white/60 text-xs">{{ $frontendUrl }}</p>
            </div>
        </div>

        <a
            href="{{ $frontendUrl }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold transition-all hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-white/40"
            style="background: rgba(255,255,255,0.15); color: #fff; border: 1px solid rgba(255,255,255,0.25);"
        >
            <x-heroicon-o-external-link class="w-4 h-4" />
            Open Website
        </a>
    </div>

    {{-- Quick links row --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-2">
        @foreach ([
            ['label' => 'Member Applications', 'icon' => 'heroicon-o-inbox', 'href' => route('filament.resources.member-applications.index'), 'color' => '#d97706'],
            ['label' => 'Events',              'icon' => 'heroicon-o-calendar', 'href' => route('filament.resources.events.index'), 'color' => '#0F2240'],
            ['label' => 'Magazine',            'icon' => 'heroicon-o-book-open', 'href' => route('filament.resources.magazine-issues.index'), 'color' => '#8B1E24'],
            ['label' => 'Gallery',             'icon' => 'heroicon-o-photograph', 'href' => route('filament.resources.gallery-photos.index'), 'color' => '#1A4731'],
        ] as $link)
        <a
            href="{{ $link['href'] }}"
            class="flex items-center gap-3 rounded-xl px-4 py-3 transition-all hover:shadow-md"
            style="background: #fff; border: 1px solid #e5e7eb;"
        >
            <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0"
                 style="background: {{ $link['color'] }}1a;">
                <x-dynamic-component :component="$link['icon']" class="w-4 h-4" :style="'color: ' . $link['color']" />
            </div>
            <span class="text-sm font-medium text-gray-700">{{ $link['label'] }}</span>
        </a>
        @endforeach
    </div>

    {{-- Widgets --}}
    <x-filament::widgets
        :widgets="$this->getWidgets()"
        :columns="$this->getColumns()"
    />

</x-filament::page>
