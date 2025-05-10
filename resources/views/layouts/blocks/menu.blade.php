@forelse(menus()->get() as $mGroup => $groups)

    @php
        $activeMGroup = $groups->menus->filter(fn($m) => $m->isActive() === true)->count() > 0;

        $singleMenu = null;
        if (count($groups->menus) == 1) {
            $singleMenu = $groups->menus->first();
        }
    @endphp

    @if (!empty($singleMenu))
        @php
            $href = match ($singleMenu->menuType) {
                \Winata\Menu\Enums\MenuType::ROUTE => route($singleMenu->routeName),
                \Winata\Menu\Enums\MenuType::URL => $singleMenu->routeName,
                default => '#',
            };
        @endphp
            <!--begin:Menu item-->
        <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link {{ $singleMenu->isActive() ? 'active' : '' }}"
               href="{{ $href }}">
                                <span class="menu-icon"><i class="{{ $singleMenu->icon ?? 'ki-outline ki-filter' }} fs-2"></i>
                                </span>
                <span
                    class="menu-title {{ $singleMenu->isActive() ? 'active' : '' }}">{{ $singleMenu->title }}</span>
                <span class="menu-arrow"></span>
            </a>

            <!--end:Menu link-->
        </div>
        <!--end:Menu item-->
    @else
        @include('layouts.blocks.menu-sub', ['menus' => $groups])
    @endif
@empty
@endforelse
