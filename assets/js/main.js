/* Renders the home page categories and the dashboard gallery + lightbox. Data lives in data.js. */
(function () {
  const ICON = {
    ext: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17 17 7M8 7h9v9"/></svg>',
    arrow: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>',
    back: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>',
    left: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>',
    right: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>',
    info: '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4M12 8h.01"/></svg>'
  };
  const esc = s => String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
  const CATS = window.CATEGORIES || [];
  const DASH = window.DASHBOARDS || [];

  /* ---------- Home: fan + category grid ---------- */
  // album = Google Photos album, app = live web app, dashboards = gallery page on this site
  const KIND = {
    album: { ext: true, pill: 'Album', label: () => 'Google Photos album', go: `Open album ${ICON.ext}` },
    app: { ext: true, pill: 'Live app', label: () => 'Interactive web app', go: `Open app ${ICON.ext}` },
    dashboards: { ext: false, pill: 'Dashboards', label: c => `${c.count} dashboards`, go: `View gallery ${ICON.arrow}` }
  };
  const kindOf = c => KIND[c.kind] || KIND.dashboards;
  const target = c => kindOf(c).ext ? ' target="_blank" rel="noopener"' : '';

  const fan = document.getElementById('fan');
  if (fan) {
    // spread any number of cards evenly; rotation and lift follow a repeating pattern
    const ROT = [-12, -7, -3, 2, 5, -2, 7, -5, 10], LIFT = [10, -4, 4, -6, 6, -8, 2, -5, 4];
    const HERO = CATS.filter(c => c.hero !== false);
    const n = HERO.length, step = n > 1 ? 79 / (n - 1) : 0, mid = (n - 1) / 2;
    fan.innerHTML = HERO.map((c, i) => {
      const style = `--x:${(1 + i * step).toFixed(2)}%;--r:${ROT[i % ROT.length]}deg;--y:${LIFT[i % LIFT.length]}%;--z:${Math.round(n - Math.abs(i - mid))}`;
      return `<a href="${esc(c.url)}"${target(c)} aria-label="${esc(c.title)}" style="${style}">
        <img src="${esc(c.cover)}" alt="" loading="eager"><span>${esc(c.title)}</span></a>`;
    }).join('');
  }
  const grid = document.getElementById('cat-grid');
  if (grid) {
    grid.innerHTML = CATS.map(c => {
      const k = kindOf(c);
      return `<a class="cat" href="${esc(c.url)}"${target(c)}>
        <div class="thumb"><img src="${esc(c.cover)}" alt="${esc(c.title)} sample" loading="lazy"></div>
        <span class="pill">${k.pill}</span>
        <div class="body"><h3>${esc(c.title)}</h3><p>${esc(c.blurb)}</p>
        <div class="meta"><span>${k.label(c)}</span><span class="go">${k.go}</span></div></div></a>`;
    }).join('');
  }

  /* ---------- Dashboards gallery ---------- */
  const gal = document.getElementById('gallery');
  if (!gal) return;

  const params = new URLSearchParams(location.search);
  const TOOLS = { looker: 'Looker Studio', powerbi: 'Power BI', sheets: 'Google Sheets & Excel' };
  const tool = TOOLS[params.get('tool')] ? params.get('tool') : 'looker';
  const toolName = TOOLS[tool];
  const items = DASH.filter(d => d.tool === tool);
  const hasLive = items.some(d => d.url);
  let filter = 'All';
  let view = items;

  document.title = `${toolName} Dashboards · Shijith Pulikkal`;
  document.getElementById('gal-title').textContent = `${toolName} Dashboards`;
  document.getElementById('gal-sub').textContent = hasLive
    ? `${items.length} dashboards · every one opens a live, clickable report · data is anonymised or sample data`
    : `${items.length} dashboards · click any one to view it full size · data is anonymised or sample data`;
  document.querySelectorAll('.switch a').forEach(a => a.setAttribute('aria-current', a.dataset.tool === tool ? 'true' : 'false'));

  // filter chips, ordered by count
  const counts = items.reduce((m, d) => (m[d.cat] = (m[d.cat] || 0) + 1, m), {});
  const cats = ['All', ...Object.keys(counts).sort((a, b) => counts[b] - counts[a] || a.localeCompare(b))];
  const chips = document.getElementById('chips');
  chips.innerHTML = cats.map(c =>
    `<button class="chip" type="button" data-cat="${esc(c)}" aria-pressed="${c === 'All'}">${esc(c)}<span class="n">${c === 'All' ? items.length : counts[c]}</span></button>`
  ).join('');
  chips.addEventListener('click', e => {
    const b = e.target.closest('.chip'); if (!b) return;
    filter = b.dataset.cat;
    chips.querySelectorAll('.chip').forEach(x => x.setAttribute('aria-pressed', x === b ? 'true' : 'false'));
    render();
  });

  function render() {
    view = filter === 'All' ? items : items.filter(d => d.cat === filter);
    gal.innerHTML = view.map((d, i) =>
      `<button class="tile" type="button" data-i="${i}" aria-label="Open ${esc(d.title)}">
        <img src="${esc(d.img)}" alt="${esc(d.title)} ${toolName} dashboard" loading="lazy" width="${d.w}" height="${d.h}">
        <span class="cap"><small>${esc(d.cat)}</small><b>${esc(d.title)}</b></span></button>`
    ).join('');
  }
  render();

  /* ---------- Lightbox ---------- */
  const lb = document.getElementById('lb');
  const lbImg = lb.querySelector('.lb-stage img');
  let cur = 0, lastFocus = null;

  function show(i) {
    cur = (i + view.length) % view.length;
    const d = view[cur];
    lbImg.src = d.img; lbImg.alt = `${d.title} ${toolName} dashboard`;
    lb.querySelector('[data-f=title]').textContent = d.title;
    lb.querySelector('[data-f=cat]').textContent = d.cat;
    lb.querySelector('[data-f=tool]').textContent = toolName;
    lb.querySelector('[data-f=topic]').textContent = d.cat;
    const link = lb.querySelector('[data-f=link]');
    link.href = d.url || d.img;
    link.querySelector('.lbl').textContent = d.url ? 'Open live dashboard' : 'View full size';
    lb.querySelector('.note').textContent = d.url
      ? 'Opens the interactive report in a new tab. Data is anonymised or sample data.'
      : 'Opens the full-size image in a new tab. Data is anonymised or sample data.';
    lb.querySelector('[data-f=count]').textContent = `${cur + 1} of ${view.length}`;
    // preload neighbours
    [cur + 1, cur - 1].forEach(j => { const n = view[(j + view.length) % view.length]; if (n) new Image().src = n.img; });
  }
  function open(i) {
    lastFocus = document.activeElement;
    show(i); lb.classList.add('open'); document.body.style.overflow = 'hidden';
    lb.querySelector('.lb-close').focus();
  }
  function close() {
    lb.classList.remove('open'); document.body.style.overflow = '';
    if (lastFocus) lastFocus.focus();
  }
  gal.addEventListener('click', e => { const t = e.target.closest('.tile'); if (t) open(+t.dataset.i); });
  lb.querySelector('.lb-close').addEventListener('click', close);
  lb.querySelector('.lb-prev').addEventListener('click', () => show(cur - 1));
  lb.querySelector('.lb-next').addEventListener('click', () => show(cur + 1));
  document.addEventListener('keydown', e => {
    if (!lb.classList.contains('open')) return;
    if (e.key === 'Escape') close();
    if (e.key === 'ArrowLeft') show(cur - 1);
    if (e.key === 'ArrowRight') show(cur + 1);
  });
  // swipe on touch
  let sx = null;
  lb.addEventListener('touchstart', e => { sx = e.touches[0].clientX; }, { passive: true });
  lb.addEventListener('touchend', e => {
    if (sx === null) return; const dx = e.changedTouches[0].clientX - sx; sx = null;
    if (Math.abs(dx) > 50) show(cur + (dx < 0 ? 1 : -1));
  });

  // inject icons
  lb.querySelector('.lb-close').innerHTML = ICON.back;
  lb.querySelector('.lb-prev').innerHTML = ICON.left;
  lb.querySelector('.lb-next').innerHTML = ICON.right;
})();
