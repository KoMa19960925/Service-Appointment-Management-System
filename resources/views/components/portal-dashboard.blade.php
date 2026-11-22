@props([
    'role', 'description', 'action', 'actionRoute', 'metrics',
    'heroImage' => 'images/Admin.jpg',
    'bannerImage' => 'images/service-workshop.webp',
    'bannerAlt' => 'Service technician reviewing a tablet at a workshop bench',
])

<div class="sams-dashboard">
    <section class="sams-dashboard-hero mb-4">
        <div>
            <h1 class="display-6 fw-bold mb-2">{{ $role }} Dashboard</h1>
            <p class="fw-semibold mb-1">Welcome back, {{ auth()->user()->name }}</p>
            <p class="mb-4">{{ $description }}</p>
            <a class="btn btn-light" href="{{ route($actionRoute) }}">{{ $action }}</a>
        </div>
        <figure class="sams-dashboard-image mb-0">
            <img src="{{ asset($heroImage) }}" alt="">
        </figure>
    </section>

    <div class="row g-3">
        @foreach ($metrics as [$label, $count, $icon, $route])
            <div class="col-sm-6 col-xl">
                <a class="card sams-metric border-0 h-100" href="{{ route($route) }}">
                    <div class="card-body d-flex align-items-center gap-3 p-3 p-lg-4">
                        <i class="sams-metric-icon bi {{ $icon }}" aria-hidden="true"></i>
                        <div>
                            <div class="text-muted">{{ $label }}</div>
                            <div class="fs-3 fw-bold lh-sm">{{ $count }}</div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <img class="sams-dashboard-banner mt-4" src="{{ asset($bannerImage) }}"
        alt="{{ $bannerAlt }}" width="2172" height="724" loading="lazy">
</div>
