
@if($menus)
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ $activeMGroup ? 'show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <i class="{{ $menus->icon ?? 'ki-outline ki-double-right-arrow' }} fs-2"></i>
                                </span>
                                <span class="menu-title">{{ $menus->name ?? $menus->title }}</span>
                                <span class="menu-arrow"></span>
                            </span>
        <div class="menu-sub menu-sub-accordion">
            @forelse($menus->menus as $menu)

                @if($menu->menus->count() > 0)
                    @include('layouts.blocks.menu-sub', ['menus' => $menu])
                @else
                    @php
                        $href = match ($menu->menuType) {
                            \Winata\Menu\Enums\MenuType::ROUTE => route($menu->routeName),
                            \Winata\Menu\Enums\MenuType::URL => $menu->routeName,
                            default => '#',
                        };
                    @endphp
                    <div class="menu-item">
                        <a class="menu-link {{ $menu->isActive() ? 'active' : '' }}"
                           href="{{ $href }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                            <span
                                class="menu-title {{ $menu->isActive() ? 'active' : 'text-muted' }}">{{ $menu->title }}</span>
                        </a>
                    </div>

                @endif

            @empty
            @endforelse
        </div>
    </div>
@endif
