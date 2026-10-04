(() => {
	const root = document.documentElement;
	const STORAGE_KEY = 'alexcuar-theme';
	const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	const finePointer = window.matchMedia('(hover: hover) and (pointer: fine)').matches;

	/* Theme toggle */
	document.querySelector('.theme-toggle')?.addEventListener('click', () => {
		const next = root.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
		root.setAttribute('data-theme', next);
		try { localStorage.setItem(STORAGE_KEY, next); } catch (e) { /* storage blocked */ }
	});

	/* Disclosure toggles: mobile menu + search */
	const bindToggle = (selector, onToggle) => {
		const button = document.querySelector(selector);
		if (!button) return null;
		button.addEventListener('click', () => {
			const open = button.getAttribute('aria-expanded') !== 'true';
			button.setAttribute('aria-expanded', String(open));
			onToggle(open);
		});
		return button;
	};

	const nav = document.getElementById('site-navigation');
	const menuButton = bindToggle('.menu-toggle', (open) => {
		nav?.classList.toggle('is-open', open);
		document.body.classList.toggle('menu-open', open);
	});
	nav?.addEventListener('click', (event) => {
		if (event.target.closest('a') && menuButton?.getAttribute('aria-expanded') === 'true') menuButton.click();
	});

	const search = document.getElementById('header-search');
	bindToggle('.search-toggle', (open) => {
		if (!search) return;
		search.hidden = !open;
		if (open) search.querySelector('input[type="search"]')?.focus();
	});

	document.addEventListener('keydown', (event) => {
		if (event.key !== 'Escape') return;
		document.querySelectorAll('.menu-toggle[aria-expanded="true"], .search-toggle[aria-expanded="true"]').forEach((button) => button.click());
	});

	/* Reveal on scroll */
	const revealables = document.querySelectorAll('[data-reveal]');
	if (reduceMotion || !('IntersectionObserver' in window)) {
		revealables.forEach((element) => element.classList.add('is-visible'));
	} else {
		const revealObserver = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting) return;
				const element = entry.target;
				element.classList.add('is-visible');
				element.addEventListener('transitionend', () => element.style.setProperty('--reveal-delay', '0'), { once: true });
				revealObserver.unobserve(element);
			});
		}, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
		revealables.forEach((element) => revealObserver.observe(element));
	}

	/* Typewriter roles */
	const typed = document.querySelector('.typed[data-roles]');
	if (typed && !reduceMotion) {
		let roles = [];
		try { roles = JSON.parse(typed.dataset.roles); } catch (e) { roles = []; }
		if (roles.length > 1) {
			let roleIndex = 0;
			let charIndex = roles[0].length;
			let deleting = true;
			const tick = () => {
				const role = roles[roleIndex];
				charIndex += deleting ? -1 : 1;
				typed.textContent = role.slice(0, charIndex);
				let delay = deleting ? 35 : 70;
				if (!deleting && charIndex === role.length) {
					deleting = true;
					delay = 2200;
				} else if (deleting && charIndex === 0) {
					deleting = false;
					roleIndex = (roleIndex + 1) % roles.length;
					delay = 350;
				}
				window.setTimeout(tick, delay);
			};
			window.setTimeout(tick, 2600);
		}
	}

	/* Animated counters */
	const counters = document.querySelectorAll('[data-count]');
	if (counters.length && !reduceMotion && 'IntersectionObserver' in window) {
		const animateCounter = (element) => {
			const target = parseInt(element.dataset.count, 10) || 0;
			const start = target > 1900 ? target - 40 : 0;
			const duration = 1800;
			const startTime = performance.now();
			const step = (now) => {
				const progress = Math.min(1, (now - startTime) / duration);
				const eased = 1 - Math.pow(1 - progress, 4);
				element.textContent = String(Math.round(start + (target - start) * eased));
				if (progress < 1) requestAnimationFrame(step);
			};
			requestAnimationFrame(step);
		};
		const counterObserver = new IntersectionObserver((entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting) return;
				animateCounter(entry.target);
				counterObserver.unobserve(entry.target);
			});
		}, { threshold: 0.6 });
		counters.forEach((element) => {
			element.textContent = '0';
			counterObserver.observe(element);
		});
	}

	/* Pointer effects: spotlight, tilt, magnetic buttons */
	if (finePointer && !reduceMotion) {
		document.querySelectorAll('[data-spotlight]').forEach((card) => {
			card.addEventListener('pointermove', (event) => {
				const rect = card.getBoundingClientRect();
				card.style.setProperty('--mx', `${event.clientX - rect.left}px`);
				card.style.setProperty('--my', `${event.clientY - rect.top}px`);
			});
		});

		document.querySelectorAll('[data-tilt]').forEach((card) => {
			card.addEventListener('pointermove', (event) => {
				const rect = card.getBoundingClientRect();
				const x = (event.clientX - rect.left) / rect.width - 0.5;
				const y = (event.clientY - rect.top) / rect.height - 0.5;
				card.style.transform = `perspective(900px) rotateX(${(-y * 6).toFixed(2)}deg) rotateY(${(x * 6).toFixed(2)}deg) translateY(-4px)`;
			});
			card.addEventListener('pointerleave', () => { card.style.transform = ''; });
		});

		document.querySelectorAll('[data-magnetic]').forEach((button) => {
			button.addEventListener('pointermove', (event) => {
				const rect = button.getBoundingClientRect();
				const x = event.clientX - rect.left - rect.width / 2;
				const y = event.clientY - rect.top - rect.height / 2;
				button.style.transform = `translate(${x * 0.18}px, ${y * 0.28}px)`;
			});
			button.addEventListener('pointerleave', () => { button.style.transform = ''; });
		});
	}

	/* Hero: pointer parallax + spotlight */
	const hero = document.querySelector('[data-hero]');
	if (hero && finePointer && !reduceMotion) {
		let pointerFrame = 0;
		hero.addEventListener('pointermove', (event) => {
			if (pointerFrame) return;
			pointerFrame = requestAnimationFrame(() => {
				const rect = hero.getBoundingClientRect();
				const x = event.clientX - rect.left;
				const y = event.clientY - rect.top;
				hero.style.setProperty('--px', (x / rect.width - 0.5).toFixed(3));
				hero.style.setProperty('--py', (y / rect.height - 0.5).toFixed(3));
				hero.style.setProperty('--hx', `${x}px`);
				hero.style.setProperty('--hy', `${y}px`);
				hero.classList.add('is-pointer');
				pointerFrame = 0;
			});
		});
		hero.addEventListener('pointerleave', () => {
			hero.style.setProperty('--px', '0');
			hero.style.setProperty('--py', '0');
			hero.classList.remove('is-pointer');
		});
	}

	/* Scroll-driven: header, back-to-top, reading progress, timeline, nav scroll-spy */
	const header = document.querySelector('.site-header');
	const backToTop = document.querySelector('.back-to-top');
	const progress = document.querySelector('.reading-progress');
	const article = document.querySelector('.entry-content');
	const timeline = document.querySelector('[data-timeline]');
	const spyLinks = [...document.querySelectorAll('.main-navigation a[href*="#"]')]
		.map((link) => ({ link, target: document.getElementById(decodeURIComponent(link.hash.slice(1))) }))
		.filter((item) => item.target);

	let ticking = false;
	const onScroll = () => {
		const y = window.scrollY;
		const viewport = window.innerHeight;

		header?.classList.toggle('is-scrolled', y > 24);

		if (hero && !reduceMotion) {
			hero.style.setProperty('--hs', Math.min(1, Math.max(0, y / hero.offsetHeight)).toFixed(3));
		}
		backToTop?.classList.toggle('is-visible', y > viewport);

		if (progress && article) {
			const total = article.offsetHeight - viewport;
			const ratio = total > 0 ? (y - article.offsetTop + viewport * 0.3) / total : 0;
			progress.style.transform = `scaleX(${Math.min(1, Math.max(0, ratio))})`;
		}

		if (timeline) {
			const rect = timeline.getBoundingClientRect();
			const ratio = (viewport * 0.6 - rect.top) / rect.height;
			timeline.style.setProperty('--progress', Math.min(1, Math.max(0, ratio)).toFixed(3));
		}

		if (spyLinks.length) {
			let current = null;
			spyLinks.forEach((item) => {
				if (item.target.getBoundingClientRect().top <= viewport * 0.35) current = item;
			});
			spyLinks.forEach((item) => item.link.classList.toggle('is-active', item === current));
		}

		ticking = false;
	};
	window.addEventListener('scroll', () => {
		if (!ticking) { ticking = true; requestAnimationFrame(onScroll); }
	}, { passive: true });
	window.addEventListener('resize', onScroll, { passive: true });
	onScroll();

	backToTop?.addEventListener('click', () => window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' }));
})();
