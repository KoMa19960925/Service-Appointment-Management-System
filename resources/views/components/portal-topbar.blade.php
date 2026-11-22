@php
    [$quickLabel, $quickRoute, $quickIcon] = match ($role) {
        'Admin' => ['New service', 'Admin.services.index', 'bi-plus-lg'],
        'Customer' => ['New request', 'Customer.request.create', 'bi-plus-lg'],
        'Technician' => ['Assigned work', 'Technician.Assignedwork', 'bi-clipboard-check'],
    };
    $localTime = now('Asia/Colombo');
    $account = auth()->user();
    $initial = mb_strtoupper(mb_substr($account->name, 0, 1));
@endphp

<header class="sams-topbar">
    <div class="sams-topbar-start">
        <button type="button" class="sams-topbar-control sams-topbar-search" id="portal-search-trigger" data-bs-toggle="modal"
            data-bs-target="#portal-search" aria-label="Search portal pages">
            <i class="bi bi-search" aria-hidden="true"></i>
            <span class="sams-search-label">Search pages…</span>
            <kbd aria-hidden="true">Ctrl K</kbd>
        </button>
        <div class="sams-topbar-datetime" title="Sri Lanka time">
            <span class="sams-topbar-date">
                <i class="bi bi-calendar4-week" aria-hidden="true"></i>
                <time id="portal-date" datetime="{{ $localTime->toDateString() }}">{{ $localTime->format('l, F j, Y') }}</time>
            </span>
            <span class="sams-topbar-clock">
                <i class="bi bi-clock" aria-hidden="true"></i>
                <time id="portal-clock" datetime="{{ $localTime->toAtomString() }}">{{ $localTime->format('g:i:s A') }}</time>
            </span>
        </div>
    </div>
    <div class="sams-topbar-actions">
        <a class="btn btn-primary btn-sm sams-topbar-quick" href="{{ route($quickRoute) }}" aria-label="{{ $quickLabel }}">
            <i class="bi {{ $quickIcon }}" aria-hidden="true"></i><span>{{ $quickLabel }}</span>
        </a>
        <a class="sams-topbar-control sams-topbar-desktop" href="{{ route($role . '.dashboard') }}" aria-label="Dashboard" title="Dashboard">
            <i class="bi bi-display" aria-hidden="true"></i>
        </a>
        <button type="button" class="sams-topbar-control sams-topbar-desktop" id="portal-fullscreen"
            aria-label="Enter fullscreen" title="Enter fullscreen" hidden>
            <i class="bi bi-fullscreen" aria-hidden="true"></i>
        </button>
        <div class="dropdown">
            <button type="button" class="sams-topbar-control position-relative" data-bs-toggle="dropdown"
                aria-expanded="false" aria-label="Alerts" id="portal-alert-trigger">
                <i class="bi bi-bell" aria-hidden="true"></i>
                @if ($count || session('success') || session('error'))
                    <span class="sams-alert-badge">{{ $count ? ($count > 9 ? '9+' : $count) : '!' }}</span>
                @endif
            </button>
            <div class="dropdown-menu dropdown-menu-end sams-alert-menu">
                <h2 class="dropdown-header">Alerts</h2>
                @foreach (['success', 'error'] as $message)
                    @if (session($message))
                        <p class="px-3 mb-2 small">{{ session($message) }}</p>
                    @endif
                @endforeach
                @if ($count)
                    <a class="dropdown-item text-wrap" href="{{ route($route) }}">{{ $label }} <strong>({{ $count }})</strong></a>
                @elseif (!session('success') && !session('error'))
                    <p class="px-3 mb-1 small text-muted">No current alerts.</p>
                @endif
            </div>
        </div>
        <div class="dropdown">
            <button type="button" class="sams-topbar-control sams-topbar-profile" data-bs-toggle="dropdown"
                aria-expanded="false" aria-label="Account menu">
                <span class="sams-topbar-avatar" aria-hidden="true">{{ $initial }}</span>
                <span class="sams-profile-text">
                    <strong>{{ $account->name }}</strong>
                    <small>{{ $role }}</small>
                </span>
                <i class="bi bi-chevron-down sams-profile-text" aria-hidden="true"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end sams-account-menu">
                <div class="sams-account-header">
                    <span class="sams-account-avatar" aria-hidden="true">{{ $initial }}</span>
                    <div class="text-break">
                        <strong>{{ $account->name }}</strong>
                        <small class="d-block text-muted">{{ $account->email }}</small>
                    </div>
                </div>
                <div class="sams-account-options">
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#portal-profile">
                        <i class="bi bi-person" aria-hidden="true"></i>My Profile
                    </button>
                    <button type="button" class="dropdown-item" data-portal-alerts>
                        <i class="bi bi-bell" aria-hidden="true"></i>Notifications
                    </button>
                    @if ($role === 'Admin')
                        <a class="dropdown-item" href="{{ route('Admin.homeedit') }}">
                            <i class="bi bi-gear" aria-hidden="true"></i>Homepage Settings
                        </a>
                    @endif
                    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#portal-search">
                        <i class="bi bi-keyboard" aria-hidden="true"></i>Search <kbd class="ms-auto">Ctrl K</kbd>
                    </button>
                </div>
                <form action="{{ route('logoutpage') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item sams-account-logout">
                        <i class="bi bi-box-arrow-right" aria-hidden="true"></i>Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<div class="modal fade" id="portal-profile" tabindex="-1" aria-labelledby="portal-profile-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title h5" id="portal-profile-title">My Profile</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <dl class="row mb-0">
                    <dt class="col-sm-4">Name</dt>
                    <dd class="col-sm-8 text-break">{{ $account->name }}</dd>
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8 text-break">{{ $account->email }}</dd>
                    <dt class="col-sm-4">Role</dt>
                    <dd class="col-sm-8 mb-0">{{ $role }}</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="portal-search" tabindex="-1" aria-labelledby="portal-search-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title h5" id="portal-search-title">Search portal pages</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="search" id="portal-search-input" class="form-control mb-3" placeholder="Type a page name"
                    aria-label="Page name" aria-controls="portal-search-results">
                <div class="list-group" id="portal-search-results"></div>
                <p class="text-muted mb-0" id="portal-search-empty" role="status" hidden>No matching pages.</p>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('portal-topbar.js') }}" defer></script>
