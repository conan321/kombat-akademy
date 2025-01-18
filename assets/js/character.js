// Author: Raptor_FGC / RedRaptor10

let characterNavTop = document.querySelector('.character-nav-top');
let characterNav = document.querySelector('.character-nav');
let characterSections = [...document.querySelectorAll('.character-page section:not(#character-header)')];
let navTopBtns = [...document.querySelectorAll('.character-nav-top div')];
let statsChart = document.querySelector('.character-stats-chart');

window.addEventListener('scroll', () => {
	// If nav's bottom is <= viewport top, show top nav
	if (characterNav.getBoundingClientRect().bottom <= 0) {
		if (!characterNavTop.classList.contains('character-nav-top-visible')) {
			characterNavTop.classList.add('character-nav-top-visible');
		}
	} else {
		if (characterNavTop.classList.contains('character-nav-top-visible')) {
			characterNavTop.classList.remove('character-nav-top-visible');
		}
	}

	for (let i = 0; i < characterSections.length; i++) {
		// If a section's top is <= 25% of viewport height AND bottom is > 25% of viewport height, set as active
		if (characterSections[i].getBoundingClientRect().top <= window.innerHeight / 4
			&& characterSections[i].getBoundingClientRect().bottom > window.innerHeight / 4) {
				if (!navTopBtns[i].classList.contains('character-nav-top-active')) {
					navTopBtns.forEach(b => {
						b.classList.remove('character-nav-top-active')
					});
					navTopBtns[i].classList.add('character-nav-top-active');
				}
		}
	}

	if (statsChart.getBoundingClientRect().top < window.innerHeight && statsChart.classList.contains('empty')) {
		statsChart.classList.remove('empty');
	}
});

addDialogEvents();
addNavTopEvents();

function addNavTopEvents() {
	const navBtns = document.querySelectorAll('.character-nav-top > div, .character-nav > div');

	navBtns.forEach(b => {
		const targetData = b.getAttribute('data-target');
		const target = document.getElementById(targetData);
		const offset = 48 - 8;

		b.addEventListener('click', () => {
			window.scrollTo({
				behavior: 'smooth',
				top: target.getBoundingClientRect().top + window.pageYOffset - offset
			});
		});
	});
}

function addDialogEvents() {
	let overlay = document.querySelector('.overlay');
	let dialogBoxTitle = document.querySelector('.dialog-box-title');
	let dialogBoxMessage = document.querySelector('.dialog-box-body');
	let statsBtn = document.querySelector('.character-stats-btn');

	if (!overlay || !statsBtn) return;

	overlay.addEventListener('click', () => {
		overlay.classList.add('hidden');
	});

	document.querySelector('.dialog-box-close-btn').addEventListener('click', () => {
		overlay.classList.add('hidden');
	});

	statsBtn.addEventListener('click', () => {
		overlay.classList.remove('hidden');
		dialogBoxTitle.innerHTML = 'CHARACTER STATS';
		dialogBoxMessage.innerHTML = "A character's viability can be measured by looking at how strong or weak they are in certain areas. The categories chosen here are as follows:<br /><br /><strong>Offense</strong> - The character's strength at close-range and applying pressure or mix-ups<br /><strong>Defense</strong> - How effective the character's anti-airs and wake-up attacks are<br /><strong>Damage</strong> - The amount of damage the character can deal consistently<br /><strong>Range</strong> - The amount of space covered by the character's physical attacks<br /><strong>Mobility</strong> - How mobile the character is when moving around the screen<br /><strong>Zoning</strong> - The character's ability to control different areas of the screen, most commonly using projectiles<br /><br /><strong>Note</strong>: These stats are solely based on the character and may vary depending on the paired Kameo. They take into account multiple high-level players' opinions as well as my own subjective opinion on the character and should not be considered as factual. As the game evolves and more knowledge is uncovered, these stats will be revised accordingly.";
	});
}