// Author: Raptor_FGC / RedRaptor10

let kameoFilter = false;
let difficultyFilter = false;
let tagFilter = false;
let difficulties = {
	'Easy': false,
	'Medium': false,
	'Hard': false,
};
let tags = {
	'Buff' : false,
	'Restand' : false,
	'Setup' : false,
	'Sideswitch' : false,
	'Fatal Blow' : false
};

addOverlayEvent();
addToggleFiltersEvent();
addToggleGroupsEvent();
addCategoryEvents();
addToggleGroupEvents();
addVideoEvents();
addKameoEvents();
addDifficultyEvents();
addTagEvents();

function addOverlayEvent() {
	let overlay = document.querySelector('.overlay');
	let videoContainer = document.querySelector('.combos-video');
	let text = document.querySelector('.combos-video-combo');

	overlay.addEventListener('click', () => {
		overlay.classList.add('hidden');
		videoContainer.innerHTML = '';
		text.innerHTML = '';
	});

	text.addEventListener('click', e => {
		e.stopPropagation(); // Prevent overlay click event
	});
}

function addToggleFiltersEvent() {
	let toggleFiltersBtn = document.querySelector('.combos-header-toggle-filters-btn');
	let filters = document.querySelector('.combos-filters');

	toggleFiltersBtn.addEventListener('click', () => {
		if (filters.classList.contains('hidden')) {
			filters.classList.remove('hidden');
			toggleFiltersBtn.innerHTML = 'Hide Filters';
		} else {
			filters.classList.add('hidden');
			toggleFiltersBtn.innerHTML = 'Show Filters';
		}
	});
}

function addToggleGroupsEvent() {
	let toggleGroupsBtn = document.querySelector('.combos-header-toggle-groups-btn');
	let groups = document.querySelectorAll('.combos-list-group');

	toggleGroupsBtn.addEventListener('click', () => {
		if (toggleGroupsBtn.innerHTML == 'Collapse All') {
			groups.forEach(g => {
				let icon = g.querySelector('.combos-list-group-toggle-icon > i');
				let body = g.querySelector('.combos-list-group-body');

				icon.classList.remove('fa-minus');
				icon.classList.add('fa-plus');
				body.classList.add('hidden');
			});

			toggleGroupsBtn.innerHTML = 'Expand All';
		} else {
			groups.forEach(g => {
				let icon = g.querySelector('.combos-list-group-toggle-icon > i');
				let body = g.querySelector('.combos-list-group-body');

				icon.classList.remove('fa-plus');
				icon.classList.add('fa-minus');
				body.classList.remove('hidden');
			});

			toggleGroupsBtn.innerHTML = 'Collapse All';
		}
	});
}

function addCategoryEvents() {
	let categoryBtns = document.querySelectorAll('.combos nav div');
	let combosContent = document.querySelectorAll('.combos-body > div');

	categoryBtns.forEach(b => {
		b.addEventListener('click', () => {
			if (b.classList.contains('active')) {
				return;
			}

			categoryBtns.forEach(b2 => {
				b2.classList.toggle('active');
			});

			combosContent.forEach(c => {
				c.classList.toggle('hidden');
			});
		});
	});
}

function addToggleGroupEvents() {
	let groupHeaders = document.querySelectorAll('.combos-list-group-header');

	groupHeaders.forEach(h => {
		h.addEventListener('click', () => {
			let groupToggleIcon = h.querySelector('.combos-list-group-toggle-icon > *');
			let groupBody = h.closest('.combos-list-group').querySelector('.combos-list-group-body');

			if (groupBody.classList.contains('hidden')) {
				groupToggleIcon.classList.remove('fa-plus');
				groupToggleIcon.classList.add('fa-minus');
				groupBody.classList.remove('hidden');
			} else {
				groupToggleIcon.classList.remove('fa-minus');
				groupToggleIcon.classList.add('fa-plus');
				groupBody.classList.add('hidden');
			}
		});
	});
}

function getYouTubeId(url) {
	let regExp = /^.*(youtu\.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
	let match = url.match(regExp);

	if (match && match[2].length == 11) {
		return match[2];
	}
}

function loadPlaylist(ids) {
	let video = document.querySelector('.combos-playlist iframe');
	let origin = 'https://mk1.kombatakademy.com';

	video.src = 'https://www.youtube.com/embed/' + ids[0] + '?playlist=' + ids[0];
	video.frameBorder = '0';
	video.allowFullscreen = true;

	if (ids.length > 1) {
		for (let i = 1; i < ids.length; i++) {
			video.src += ',' + ids[i];
		}
	}

	video.src += '&origin=' + origin;
	// video.src += '&loop=1'; // loop + playlist params when used together randomly causes YouTube embed to show as unavailable
}

function loadVideo(url, combo) {
	let id = getYouTubeId(url);
	let origin = 'https://mk1.kombatakademy.com';

	let playlist = document.querySelector('.combos-playlist iframe');
	let videoContainer = document.querySelector('.combos-video');
	let video = document.createElement('iframe');
	let text = document.querySelector('.combos-video-combo');

	playlist.src = playlist.src; // Stop playlist video by refreshing its src

	// YouTube embed video needs 'playlist' parameter to loop, but loop + playlist params when used together randomly causes YouTube embed to show as unavailable
	video.src = 'https://www.youtube.com/embed/' + id + '?playlist=' + id + '&autoplay=1&origin=' + origin;
	video.frameBorder = '0';
	video.allowFullscreen = true;

	videoContainer.innerHTML = '';
	videoContainer.append(video);
	text.innerHTML = combo;

	if (localStorage.getItem('KA_PLATFORM')) {
		let currentPlatform = localStorage.getItem('KA_PLATFORM');
		setPlatform(currentPlatform, '.combos-video-combo .inputs');

		console.log(currentPlatform);
		console.log(document.querySelectorAll('.combos-video-combo .inputs'));
	}
}

function addVideoEvents() {
	if (!videos) {
		return;
	}

	let overlay = document.querySelector('.overlay');
	let playBtns = document.querySelectorAll('.combo-play-btn');
	let ids = [];

	playBtns.forEach((p, i) => {
		ids.push(getYouTubeId(videos[i]["url"])); // Add YouTube ids to array and create a custom playlist

		p.addEventListener('click', () => {
			loadVideo(videos[i]["url"], videos[i]["combo"]);
			overlay.classList.remove('hidden');
		});
	});

	if (ids.length > 0) {
		loadPlaylist(ids);
	}
}

function addKameoEvents() {
	let kameoElements = document.querySelectorAll('.combo-kameo');

	kameoElements.forEach(k => {
		let targetKameo = k.innerHTML;

		k.addEventListener('click', () => {
			// If initial click, set kameo tag to active
			if (!kameoFilter) {
				kameoFilter = true;
				kameoElements = document.querySelectorAll('.combo-kameo');

				kameoElements.forEach(k => {
					k.classList.add('active');
				});

				toggleCombos('kameo', true);
			} else {
				kameoFilter = false;

				kameoElements.forEach(k2 => {
					k2.classList.remove('active');
				});

				toggleCombos('kameo');
			}
		});
	});
}

function addDifficultyEvents() {
	let difficultyElements = document.querySelectorAll('.combo-difficulty');
	let combos = document.querySelectorAll('.combos-list-combo');

	difficultyElements.forEach(d => {
		let targetDifficulty = d.innerHTML;

		d.addEventListener('click', () => {
			// If initial click, set all difficulty tags to inactive then set target difficulty tag to active
			if (!difficultyFilter) {
				difficultyElements.forEach(d2 => {
					d2.classList.add('inactive');
				});
				toggleDifficulty(targetDifficulty);
				difficultyFilter = true;
				toggleCombos('difficulty', true);
			} else {
				toggleDifficulty(targetDifficulty);
				setDifficultyFilter();

				// If filter is turned off after click, reset difficulties
				if (!difficultyFilter) {
					difficultyElements.forEach(d2 => {
						d2.classList.remove('active', 'inactive');
					});

					toggleCombos('difficulty');
				} else {
					toggleCombos('difficulty', true);
				}
			}
		});
	});
}

function addTagEvents() {
	let tagElements = document.querySelectorAll('.combo-tag');
	let combos = document.querySelectorAll('.combos-list-combo');

	tagElements.forEach(t => {
		let targetTag = t.innerHTML;

		t.addEventListener('click', () => {
			// If initial click, set all tags to inactive then set target tag to active
			if (!tagFilter) {
				tagElements.forEach(t2 => {
					t2.classList.add('inactive');
				});
				toggleTag(targetTag);
				tagFilter = true;
				toggleCombos('tag', true);
			} else {
				toggleTag(targetTag);
				setTagFilter();

				// If filter is turned off after click, reset tags
				if (!tagFilter) {
					tagElements.forEach(t2 => {
						t2.classList.remove('active', 'inactive');
					});

					toggleCombos('tag');
				} else {
					toggleCombos('tag', true);
				}
			}
		});
	});
}

// Loop through combos & subcategory titles and hide/unhide based on filters
function toggleCombos(filterType, filterActive) {
	let groups = document.querySelectorAll('.combos-list-group');

	groups.forEach(group => {
		combos = group.querySelectorAll('.combos-list-combo');
		let hideGroup = true;

		combos.forEach(combo => {
			let hasKameo = combo.querySelector('.combo-kameo');
			let hasDifficulty = difficulties[combo.querySelector('.combo-difficulty').innerHTML];
			let hasTag = false;
			let currentTags = combo.querySelectorAll('.combo-tag');

			currentTags.forEach(ct => {
				if (tags[ct.innerHTML]) {
					hasTag = true;
				}
			});

			if (filterType == 'kameo') {
				if (filterActive && !hasKameo) {
					combo.classList.add('hidden');
				} else if (
					(difficultyFilter && hasDifficulty && !tagFilter) ||
					(difficultyFilter && hasDifficulty && tagFilter && hasTag) ||
					(!difficultyFilter && tagFilter && hasTag) ||
					(!difficultyFilter && !tagFilter)) {
						combo.classList.remove('hidden');
						group.classList.remove('hidden');
						hideGroup = false;
				}
			} else if (filterType == 'difficulty') {
				if (filterActive && !hasDifficulty) {
					combo.classList.add('hidden');
				} else if (
					(kameoFilter && hasKameo && !tagFilter) ||
					(kameoFilter && hasKameo && tagFilter && hasTag) ||
					(!kameoFilter && tagFilter && hasTag) ||
					(!kameoFilter && !tagFilter)) {
						combo.classList.remove('hidden');
						group.classList.remove('hidden');
						hideGroup = false;
				}
			} else if (filterType == 'tag') {
				if (filterActive && !hasTag) {
					combo.classList.add('hidden');
				} else if ((kameoFilter && hasKameo && !difficultyFilter) ||
					(kameoFilter && hasKameo && hasDifficulty) ||
					(!kameoFilter && difficultyFilter && hasDifficulty) ||
					(!kameoFilter && !difficultyFilter)) {
						combo.classList.remove('hidden');
						group.classList.remove('hidden');
						hideGroup = false;
				}
			}
		});

		// Hide group if all group's combos are hidden
		if (hideGroup) {
			group.classList.add('hidden');
		}
	});
}

// If any difficulty is active set filter to true
function setDifficultyFilter() {
	difficultyFilter = false;

	for (let d in difficulties) {
		if (difficulties[d]) {
			difficultyFilter = true;
		}
	}
}

// If any tag is active set filter to true
function setTagFilter() {
	tagFilter = false;

	for (let t in tags) {
		if (tags[t]) {
			tagFilter = true;
		}
	}
}

function toggleDifficulty(difficulty) {
	let difficultyClasses = {
		'EASY': 'combo-difficulty-easy',
		'MEDIUM': 'combo-difficulty-medium',
		'HARD': 'combo-difficulty-hard'
	}

	difficulties[difficulty] = !difficulties[difficulty];
	let difficultyElements = document.querySelectorAll('.' + difficultyClasses[difficulty]);

	document.querySelectorAll('.' + difficultyClasses[difficulty]).forEach(d => {
		if (difficulties[difficulty]) {
			d.classList.add('active');
			d.classList.remove('inactive');
		} else {
			d.classList.add('inactive');
			d.classList.remove('active');
		}
	});
}

function toggleTag(tag) {
	let tagClasses = {
		'Buff': 'combo-tag-buff',
		'Restand': 'combo-tag-restand',
		'Setup': 'combo-tag-setup',
		'Sideswitch': 'combo-tag-sideswitch',
		'Unbreakable': 'combo-tag-unbreakable',
		'Fatal Blow': 'combo-tag-fatal-blow'
	}

	tags[tag] = !tags[tag];
	let tagElements = document.querySelectorAll('.' + tagClasses[tag]);

	tagElements.forEach(t => {
		if (tags[tag]) {
			t.classList.add('active');
			t.classList.remove('inactive');
		} else {
			t.classList.add('inactive');
			t.classList.remove('active');
		}
	});
}

// Disable to remove empty url parameters for mobile
function disableEmpty(form) {
	let controls = form.elements;

	for (let i = 0; i < controls.length; i++) {
		if (controls[i].value == '') controls[i].disabled = true;
	}
}