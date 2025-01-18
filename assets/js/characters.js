// Author: Raptor_FGC / RedRaptor10

let statsMode = false;
let rendersLoaded = false;
let activeCharacter = '';
let renderUrl = '/images/characters/renders/';
let handlers = [];

document.querySelectorAll('.view-stats-btn, .hide-stats-btn').forEach(b => {
	b.addEventListener('click', toggleStats);
});

addDialogEvents();

function toggleStats() {
	if (!characters) return;

	let header = document.querySelector('.characters-page-header');
	let portraits = document.querySelectorAll('.character-roster .character-roster-portrait:not(.empty)');
	let viewStatsBtnWrapper = document.querySelector('.view-stats-btn-wrapper');

	if (statsMode) {
		statsMode = false;
		header.classList.add('hidden');
		viewStatsBtnWrapper.classList.remove('hidden');

		portraits.forEach((p, i) => {
			p.querySelector('a').classList.remove('hidden');
			p.removeEventListener('click', handlers[i]);
		});
	} else {
		let bars = document.querySelectorAll('.character-stats-chart .character-stats-chart-bar');

		statsMode = true;
		header.classList.remove('hidden');
		viewStatsBtnWrapper.classList.add('hidden');

		if (!rendersLoaded) {
			for (let c in characters) {
				let render = document.createElement('img');
				render.classList.add(characters[c]['slug'] + '-render', 'hidden');
				render.title = characters[c]['name'];
				render.alt = characters[c]['name'] + ' Render';
				render.src = renderUrl + characters[c]['slug'] + '.png';
				document.querySelector('.character-img-wrapper').append(render);
			}
			rendersLoaded = true;
		}

		portraits.forEach((p, i) => {
			p.querySelector('a').classList.add('hidden');

			if (handlers[i] == null) {
				handlers[i] = () => {
					if (p.id == activeCharacter) return;

					let prevRender = document.querySelector('.character-img-wrapper img:not(.hidden)');
					if (prevRender) prevRender.classList.add('hidden');
					document.querySelector('.' + characters[p.id]['slug'] + '-render').classList.remove('hidden');

					activeCharacter = p.id;

					document.querySelector('.character-name').innerHTML = characters[p.id]['name'].toUpperCase();

					bars.forEach(b => {
						b.classList.remove(
							'character-stats-chart-bar-0', 'character-stats-chart-bar-1', 'character-stats-chart-bar-2',
							'character-stats-chart-bar-3', 'character-stats-chart-bar-4', 'character-stats-chart-bar-5'
						);
					});

					bars.forEach(b => {
						let value = characters[p.id]['stats'][b.id];

						if (value == '') {
							value = 0;
						}

						b.classList.add('character-stats-chart-bar-' + value);
					});

					window.scrollTo(0, 0);
				};
			}

			p.addEventListener('click', handlers[i]);
		});
	}
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