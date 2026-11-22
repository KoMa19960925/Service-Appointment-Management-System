const portalClock = document.getElementById('portal-clock');
const portalDate = document.getElementById('portal-date');
const timeFormat = new Intl.DateTimeFormat('en-US', {
    timeZone: 'Asia/Colombo',
    hour: 'numeric',
    minute: '2-digit',
    second: '2-digit',
    hour12: true,
});
const dateFormat = new Intl.DateTimeFormat('en-US', {
    timeZone: 'Asia/Colombo',
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
});
const dateValueFormat = new Intl.DateTimeFormat('sv-SE', {
    timeZone: 'Asia/Colombo',
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
});

function updatePortalClock() {
    const now = new Date();
    portalClock.textContent = timeFormat.format(now);
    portalClock.dateTime = now.toISOString();
    portalDate.textContent = dateFormat.format(now);
    portalDate.dateTime = dateValueFormat.format(now);
}

updatePortalClock();
setInterval(updatePortalClock, 1000);

const searchDialog = document.getElementById('portal-search');
const searchInput = document.getElementById('portal-search-input');
const searchResults = document.getElementById('portal-search-results');
const searchEmpty = document.getElementById('portal-search-empty');

const pages = Array.from(document.querySelectorAll('.portal-sidebar .sidebar-menu a'), (link) => ({
    label: link.textContent.trim().replace(/\s+/g, ' '),
    href: link.href,
}));

for (const page of pages) {
    const result = document.createElement('a');
    result.className = 'list-group-item list-group-item-action';
    result.href = page.href;
    result.textContent = page.label;
    searchResults.append(result);
}

function filterPortalPages() {
    const query = searchInput.value.trim().toLowerCase();
    for (const result of searchResults.children) {
        result.hidden = !result.textContent.toLowerCase().includes(query);
    }
    searchEmpty.hidden = Boolean(searchResults.querySelector('a:not([hidden])'));
}

searchInput.addEventListener('input', filterPortalPages);
searchInput.addEventListener('keydown', (event) => {
    const firstMatch = searchResults.querySelector('a:not([hidden])');
    if (event.key === 'Enter' && firstMatch) {
        firstMatch.click();
    }
});
searchDialog.addEventListener('shown.bs.modal', () => searchInput.focus());

document.querySelector('[data-portal-alerts]').addEventListener('click', () => {
    setTimeout(() => document.getElementById('portal-alert-trigger').click(), 0);
});

document.addEventListener('keydown', (event) => {
    if ((event.ctrlKey || event.metaKey) && event.key.toLowerCase() === 'k') {
        event.preventDefault();
        if (!searchDialog.classList.contains('show')) {
            document.getElementById('portal-search-trigger').click();
        }
    }
});

const fullscreenButton = document.getElementById('portal-fullscreen');
if (document.fullscreenEnabled) {
    fullscreenButton.hidden = false;
    fullscreenButton.addEventListener('click', async () => {
        try {
            if (document.fullscreenElement) {
                await document.exitFullscreen();
            } else {
                await document.documentElement.requestFullscreen();
            }
        } catch {
            fullscreenButton.focus();
        }
    });
    document.addEventListener('fullscreenchange', () => {
        const active = Boolean(document.fullscreenElement);
        const label = active ? 'Exit fullscreen' : 'Enter fullscreen';
        fullscreenButton.setAttribute('aria-label', label);
        fullscreenButton.title = label;
        fullscreenButton.firstElementChild.className = active ? 'bi bi-fullscreen-exit' : 'bi bi-fullscreen';
    });
}
