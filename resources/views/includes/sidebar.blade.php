<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                @foreach ($sidebarItems as $item)
                    <li class="nav-item {{ str_starts_with(request()->url(), $item['url']) ? ' active' : '' }}">
                        <a href="{{ $item['url'] }}">
                            <i class="{{ $item['icon'] }}"></i>
                            <p>{{ $item['title'] }}</p>
                            {{-- <span class="caret"></span> --}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>