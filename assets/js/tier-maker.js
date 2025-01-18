// Author: Raptor_FGC / RedRaptor10

// Defaults
const title = 'Mortal Kombat 1 Tier List';
const description = '';
const author = '';
const background = 'rgb(26, 26, 23)';//'rgba(128, 128, 128, 0.25)';
const version = ver;
const date = getDate();
const tiers = [];

const poolItems = characters;
const poolAssistsItems = assists;

const defaultTierCount = 4;
const tierLetters = ['S', 'A', 'B', 'C', 'D', 'F'];
const tierColorsA = [ // Original Tier Colors
	'rgba(255, 0, 0, 0.25)', // Red
	'rgba(255, 128, 0, 0.25)', // Orange
	'rgba(255, 255, 0, 0.25)', // Yellow
	'rgba(128, 255, 0, 0.25)', // Spring Green
	'rgba(0, 255, 0, 0.25)', // Green
	'rgba(0, 255, 128, 0.25)', // Turquoise
	'rgba(0, 255, 255, 0.25)', // Cyan
	'rgba(0, 128, 255, 0.25)', // Ocean
	'rgba(0, 0, 255, 0.25)', // Blue
	'rgba(128, 0, 255, 0.25)', // Violet
	'rgba(255, 0, 255, 0.25)', // Magenta
	'rgba(255, 0, 128, 0.25)', // Raspberry
	'rgba(255, 255, 255, 0.25)', // White
	'rgba(128, 128, 128, 0.25)', // Gray
	'rgba(0, 0, 0, 0.25)' // Black
];
const tierColorsB = [ // Alternate Tier Colors
	'rgb(255, 127, 127)', // Red
	'rgb(255, 191, 127)', // Orange
	'rgb(255, 223, 127)', // Light Orange
	'rgb(255, 255, 127)', // Yellow
	'rgb(191, 255, 127)', // Green
	'rgb(127, 255, 127)', // Light Green
	'rgb(127, 255, 255)', // Light Blue
	'rgb(127, 191, 255)', // Blue
	'rgb(127, 127, 255)', // Purple
	'rgb(255, 127, 255)', // Pink
	'rgb(191, 127, 191)', // Purple
	'rgb(26, 26, 23)', // Dark Black
	//'rgb(59, 59, 59)', // Black (Excluded to match tierColorsA count)
	'rgb(133, 133, 133)', // Gray
	'rgb(207, 207, 207)', // Light Gray
	'rgb(247, 247, 247)' // White
];
let tierColors = tierColorsB; // Default Tier Colors

const backgrounds = {
	'Mortal Kombat 1': '/images/backgrounds/mortal-kombat-1.jpg',
	'Story A': '/images/backgrounds/story-a.jpg',
	'Story B': '/images/backgrounds/story-b.jpg',
	'Fire': '/images/backgrounds/fire.jpg',
	'Night': '/images/backgrounds/night.jpg'
};

const fallbackBackgroundColor = 'rgb(16, 16, 16)'; // Fallback Background Color if Background Image Fails to Load

const dirCharacters = '/images/characters/portraits/';
const dirAssists = '/images/kameos/portraits/';
const tierItemExt = 'jpg';
const tierAssistExt = 'png';
const characterClass = 'character';
const assistClass = 'assist';
const animation = 150; // ms, animation speed moving items when sorting, `0` — without animation

let sortablePool;
let sortablePoolAssists;
let sortableCharacters = [];
let tierFormTargetTier; // Track Tier Form target tier
let darkenBackground = true;
let enableAssistBackground = true;
let showHeaderOnGenerate = false;
let showDate = false;

const storageKey = 'KA_MK1_TIER_LIST';
let storageValue = null;

let tierList = {
	title,
	description,
	author,
	background,
	version,
	date,
	tiers
}

function getDate() {
	const d = new Date();
	const year = d.getFullYear();
	const month = d.getMonth() + 1;
	const day = d.getDate();

	return year + '-' + month.toString().padStart(2, '0') + '-' + day.toString().padStart(2, '0');
}

function getDisplayDate() {
	const d = new Date();
	const year = d.getFullYear();
	const month = d.getMonth() + 1;
	const day = d.getDate();

	return month.toString().padStart(2, '0') + '/' + day.toString().padStart(2, '0') + '/' + year;
}

initTierMaker();





// BEGIN CODE

// Initialize
function initTierMaker() {
	const tierMaker = document.querySelector('.tier-maker');

	// Load Tier List
	loadTierList();

	// Set Up Tier List
	setTierList();

	// Unset storageValue
	storageValue = null;

	// Create Static Sortables
	createTierListBodySortable();
	createPoolSortable();
	createPoolAssistsSortable();

	// Tier Maker Generate Buttons
	const tierMakerGeneratedOverlay = tierMaker.querySelector('.tier-maker-generated-overlay');
	tierMaker.querySelector('.tier-maker-generated-close-btn').addEventListener('click', () => { tierMakerGeneratedOverlay.classList.add('hidden'); });

	// Tier Maker Options Buttons
	tierMaker.querySelector('.tier-maker-save-btn').addEventListener('click', saveTierList);
	tierMaker.querySelector('.tier-maker-options input[type="file"]').addEventListener('change', importTierList);
	tierMaker.querySelector('.tier-maker-import-btn').addEventListener('click', inputFileChange);
	tierMaker.querySelector('.tier-maker-export-btn').addEventListener('click', exportTierList);
	tierMaker.querySelector('.tier-maker-generate-btn').addEventListener('click', generateTierListImage);

	// Tier List Form
	const tierListFormOverlay = tierMaker.querySelector('.tier-list-form-overlay');
	const tierListFormColorsContainer = tierListFormOverlay.querySelector('.tier-list-form-colors');
	const tierListFormBackgroundImagesContainer = tierListFormOverlay.querySelector('.tier-list-form-background-images');
	tierMaker.querySelector('.tier-list-edit-btn').addEventListener('click', editTierList);
	tierListFormOverlay.querySelector('.tier-list-form-close-btn').addEventListener('click', () => { tierListFormOverlay.classList.add('hidden'); });
	tierListFormOverlay.querySelector('.tier-list-form-reset-btn').addEventListener('click', () => {
		resetTierList();
		tierListFormOverlay.classList.add('hidden');
	});
	tierListFormOverlay.querySelector('.tier-list-form-cancel-btn').addEventListener('click', () => { tierListFormOverlay.classList.add('hidden'); });
	tierListFormOverlay.querySelector('.tier-list-form-save-btn').addEventListener('click', saveTierListForm);

	// Create Tier List Colors
	for (let i = 0; i < tierColors.length; i++) {
		let color = document.createElement('div');
		color.classList.add('tier-list-form-color');
		color.style.background = tierColors[i];

		color.addEventListener('click', () => {
			const formBackgrounds = tierListFormOverlay.querySelectorAll('.tier-list-form-color, .tier-list-background-image-thumb');

			// Remove active color
			formBackgrounds.forEach(b => {
				b.classList.remove('tier-list-background-active');
			});

			// Add active color
			color.classList.add('tier-list-background-active');
		});

		tierListFormColorsContainer.append(color);
	}

	// Create Background Thumbnails
	for (key in backgrounds) {
		const background = document.createElement('div');
		background.classList.add('tier-list-background-image-thumb');
		background.dataset.id = key;

		// Add "-thumb" to Background URLs before file extension
		const url = backgrounds[key];
		const substr1 = url.slice(0, url.length - 4);
		const substr2 = url.slice(url.length - 4, url.length);
		const thumbUrl = substr1 + '-thumb' + substr2;

		background.style.backgroundImage = 'url(' + thumbUrl + ')';
		//background.innerHTML = key; // Hide text as it can be difficult to read on white background

		background.addEventListener('click', () => {
			const formBackgrounds = tierListFormOverlay.querySelectorAll('.tier-list-form-color, .tier-list-background-image-thumb');

			// Remove Active Background
			formBackgrounds.forEach(b => {
				b.classList.remove('tier-list-background-active');
			});

			// Add active background
			background.classList.add('tier-list-background-active');
		});

		tierListFormBackgroundImagesContainer.append(background);
	}

	// Tier Form
	const tierFormOverlay = tierMaker.querySelector('.tier-form-overlay');
	const tierFormColorsContainer = tierFormOverlay.querySelector('.tier-form-colors');
	tierFormOverlay.querySelector('.tier-form-close-btn').addEventListener('click', () => { tierFormOverlay.classList.add('hidden'); });
	tierFormOverlay.querySelector('.tier-form-cancel-btn').addEventListener('click', () => { tierFormOverlay.classList.add('hidden'); });
	tierFormOverlay.querySelector('.tier-form-save-btn').addEventListener('click', saveTierForm);

	// Create Tier Colors
	for (let i = 0; i < tierColors.length; i++) {
		let color = document.createElement('div');
		color.classList.add('tier-form-color');
		color.style.background = tierColors[i];

		color.addEventListener('click', () => {
			let colors = tierFormOverlay.querySelectorAll('.tier-form-color');

			// Remove active color
			colors.forEach(c => {
				c.classList.remove('tier-form-color-active');
			});

			// Add active color
			color.classList.add('tier-form-color-active');
		});

		tierFormColorsContainer.append(color);
	}
}

function loadTierList() {
	storageValue = localStorage.getItem(storageKey);

	if (storageValue) {
		try {
			tierList = JSON.parse(storageValue);
		} catch {
			localStorage.removeItem(storageKey);
			storageValue = null;
		}
	}
}

// Set up Tier List
function setTierList(imported) {
	const tierMaker = document.querySelector('.tier-maker');

	// Set Background
	setBackground();
	
	// Set Tier List Information
	tierMaker.querySelector('.tier-list-title').innerHTML = tierList.title;
	tierMaker.querySelector('.tier-list-description').innerHTML = tierList.description;
	tierMaker.querySelector('.tier-list-author').innerHTML = tierList.author;
	tierMaker.querySelector('.tier-list-date').innerHTML = getDisplayDate();

	// Keep date as current
	tierList.date = getDate();

	if (storageValue || imported) {
		// Create loaded/imported Tier List Tiers
		tierList.tiers.forEach(tier => {
			addTier(tier);
		});
	} else {
		for (let i = 0; i < defaultTierCount; i++) {
			const newTier = {
				title: tierLetters[i],
				description: '',
				color: tierColors[i],
				items: []
			};

			tierList.tiers[i] = newTier;
			addTier(newTier);
		}
	}

	// Create Pool
	poolItems.forEach(item => {
		// Check if Tier List already has item
		let hasItem = false;

		tierList.tiers.forEach(tier => {
			tier.items.forEach(tierItem => {
				if (tierItem.name == item && tierItem.type == 'character') {
					hasItem = true;
					return; // Exit loop
				}
			});

			if (hasItem) return; // Exit loop
		});

		// Add item to Pool
		if (!hasItem) {
			const element = document.createElement('div');

			element.classList.add('character', 'draggable');
			element.style.backgroundImage = "url('" + dirCharacters + item + '.' + tierItemExt + "')";
			element.dataset.id = item;

			document.querySelector('.tier-pool').append(element);
		}
	});

	poolAssistsItems.forEach(item => {
		// Check if Tier List already has item
		let hasItem = false;

		tierList.tiers.forEach(tier => {
			tier.items.forEach(tierItem => {
				if (tierItem.name == item && tierItem.type == 'assist') {
					hasItem = true;
					return; // Exit loop
				}
			});

			if (hasItem) return; // Exit loop
		});

		// Add item to Pool
		if (!hasItem) {
			const element = document.createElement('div');

			element.classList.add('assist', 'draggable');
			if (enableAssistBackground) element.classList.add('assist-background');
			element.style.backgroundImage = "url('" + dirAssists + item + '.' + tierAssistExt + "')";
			element.dataset.id = item;

			document.querySelector('.tier-pool-assists').append(element);
		}
	});

	// Create Dynamic Sortables
	// Note: If resetTierList() is called, Sortables attached to deleted elements will not work anymore so they must be recreated here.
	createTierSortables();
	createCharacterSortables();

	// Set Tier List Colors (Default / Alt)
	tierColors = tierColorsA.includes(tierList.tiers[0].color) ? tierColorsA : tierColorsB;
	if (tierColors == tierColorsB) {
		tierMaker.querySelector('.tier-list').classList.add('tier-colors-light');
	} else {
		tierMaker.querySelector('.tier-list').classList.remove('tier-colors-light');
	}
}

function resetTierList() {
	// Clear Tier List & Pools
	document.querySelector('.tier-list-body').innerHTML = '';
	document.querySelector('.tier-pool').innerHTML = '';
	document.querySelector('.tier-pool-assists').innerHTML = '';

	// Reset tierList to Defaults
	tierList = {
		title,
		description,
		author,
		background,
		version,
		date,
		tiers
	};

	// TODO: Improve handling of resetting background color
	if (tierColors == tierColorsA) {
		tierList.background = 'rgba(128, 128, 128, 0.25)';
	} else if (tierColors == tierColorsB) {
		tierList.background = 'rgb(26, 26, 23)';
	}

	setTierList();
}

function setBackground() {
	const tierListElement = document.querySelector('.tier-list');

	// Set Background
	if (backgrounds.hasOwnProperty(tierList.background)) {
		// Background Image
		if (darkenBackground) {
			tierListElement.style.backgroundImage = 'linear-gradient(to right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9) var(--base-width), rgba(0, 0, 0, 0.25) var(--base-width), rgba(0, 0, 0, 0.25)), url(' + backgrounds[tierList.background] + ')';
		} else {
			tierListElement.style.backgroundImage = 'linear-gradient(to right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9) var(--base-width), transparent var(--base-width), transparent), url(' + backgrounds[tierList.background] + ')';
		}

		// Fallback Background Color
		tierListElement.style.backgroundColor = fallbackBackgroundColor;
	} else {
		// Background Color
		if (darkenBackground) {
			tierListElement.style.backgroundImage = 'linear-gradient(rgba(0, 0, 0, 0.25), rgba(0, 0, 0, 0.25)), linear-gradient(' + tierList.background + ', ' + tierList.background + '), linear-gradient(#000, #000)';
		} else {
			tierListElement.style.backgroundImage = 'linear-gradient(' + tierList.background + ', ' + tierList.background + '), linear-gradient(#000, #000)';
		}
	}
}

function saveTierList() {
	const saveBtn = document.querySelector('.tier-maker-save-btn');

	// Disable repeated clicks
	if (saveBtn.classList.contains('tier-maker-save-btn-saved')) return;

	// Add items to tierList.items
	processTierList();

	// Save Tier List to Local Storage
	localStorage.setItem('KA_MK1_TIER_LIST', JSON.stringify(tierList));

	// Saved Message
	const saveText = saveBtn.innerHTML;
	saveBtn.classList.add('tier-maker-save-btn-saved');
	saveBtn.innerHTML = 'Saved!';

	setTimeout(() => {
		saveBtn.classList.remove('tier-maker-save-btn-saved');
		saveBtn.innerHTML = saveText;
	}, 5000);
}

function processTierList() {
	const tierBodies = document.querySelectorAll('.tier-body');

	for (let i = 0; i < tierBodies.length; i++) {
		// Clear Tier items
		tierList.tiers[i].items = [];

		const items = tierBodies[i].childNodes;
		if (items.length == 0) continue; // If Tier has no items

		// Add items to Tier List
		items.forEach(item => {
			const obj = {
				name: item.dataset.id,
				type: null,
				assist: null
			};

			if (item.classList.contains('character')) {
				obj.type = 'character';

				if (item.children.length > 0) {
					obj.assist = item.querySelector('.assist').dataset.id;
				}
			} else if (item.classList.contains('assist')) {
				obj.type = 'assist';
			}

			tierList.tiers[i].items.push(obj);
		});
	}
}

function inputFileChange() {
	// Click Hidden File Input
	document.querySelector('.tier-maker-options input[type="file"]').click();
}

function importTierList() {
	const files = this.files;
	const reader = new FileReader();

	reader.onload = e => {
		try {
			tierList = JSON.parse(e.target.result);
		} catch {}

		// Clear Tier List & Pools
		document.querySelector('.tier-list-body').innerHTML = '';
		document.querySelector('.tier-pool').innerHTML = '';
		document.querySelector('.tier-pool-assists').innerHTML = '';

		setTierList(true);
	};

	reader.readAsText(files[0]);
}

function exportTierList() {
	const fileName = document.querySelector('.tier-list-title').innerHTML;

	// Add items to tierList.items
	processTierList();

	const a = document.createElement('a');
	a.href = URL.createObjectURL(new Blob([JSON.stringify(tierList, null, 4)], { type: 'application/json' }));
	a.download = fileName + '.json';
	a.click();
	a.remove();
}

// Sortable Lists
// Group Options:
// name: The name of the sortable group
// pull: An array of group names that the list can send elements to | 'clone' | function (to, from)
// put: An array of group names that the list can receive elements from | function (to, from)

function createTierListBodySortable() {
	const tierListBody = document.querySelector('.tier-list-body');

	Sortable.create(tierListBody, {
		group: 'tier-list-body',
		animation,
		handle: '.tier-handle'
	});
}


function createTierSortables() {
	const tierBodies = document.querySelectorAll('.tier-body');

	tierBodies.forEach(tierBody => {
		createTierSortable(tierBody);
	});
}

function createTierSortable(tierBody) {
	Sortable.create(tierBody, {
		group: {
			name: 'tiers',
			pull: (to, from) => {
				if (to.el.classList.contains(characterClass)) {
					return 'clone';
				} else {
					return ['tiers', 'pool', 'pool-assists'];
				}
			},
			put: ['tiers', 'pool', 'pool-assists']
		},
		animation,
		onChoose: evt => {
			// Prevent items from being added to other sortable lists
			if (evt.item.classList.contains(characterClass)) {
				sortablePoolAssists.option('disabled', true);
				sortableCharacters.forEach(s => s.option('disabled', true));
			} else if (evt.item.classList.contains(assistClass)) {
				sortablePool.option('disabled', true);
			}
		},
		onUnchoose: evt => {
			// Re-enable other sortable lists
			if (evt.item.classList.contains(characterClass)) {
				sortablePoolAssists.option('disabled', false);
				sortableCharacters.forEach(s => s.option('disabled', false));
			} else if (evt.item.classList.contains(assistClass)) {
				sortablePool.option('disabled', false);
				sortableCharacters.forEach(s => s.option('disabled', false));
			}
		}
	});
}

function createPoolSortable() {
	const tierPool = document.querySelector('.tier-pool');

	sortablePool = Sortable.create(tierPool, {
		group: {
			name: 'pool',
			pull: ['tiers'],
			put: ['tiers']
		},
		animation
	});
}

function createPoolAssistsSortable() {
	const tierPoolAssists = document.querySelector('.tier-pool-assists');

	sortablePoolAssists = Sortable.create(tierPoolAssists, {
		group: {
			name: 'pool-assists',
			pull: (to, from) => {
				if (to.el.classList.contains(characterClass)) {
					return 'clone';
				} else {
					return ['tiers'];
				}
			},
			put: ['tiers']
		},
		animation
	});
}

function createCharacterSortables() {
	const characterElements = document.querySelectorAll('.' + characterClass);

	characterElements.forEach(c => {
		const s = Sortable.create(c, {
			group: {
				name: 'characters',
				put: ['tiers', 'pool-assists']
			},
			animation,
			onChoose: evt => {
				evt.item.draggable = false; // Disable dragging
			},
			onAdd: evt => {
				// If character already contains a Assist, then replace
				if (evt.to.children.length > 1) {
					// Must loop since cloned element is inserted before or after existing element depending on where it's dragged to
					for (let i = 0; i < evt.to.children.length; i++) {
						// Remove if element IS NOT the same as new clone
						if (evt.to.children[i] != evt.item) {
							evt.to.children[i].remove();
							break; // Exit loop
						}
					}
				}

				// Add click event to remove item
				//evt.item.addEventListener('click', () => {
					//evt.item.remove();
				//});
			},
			onUnchoose: evt => {
				// Add click event to remove item
				if (evt.item == evt.originalEvent.target) {
					evt.item.remove();
				}
			}
		});

		sortableCharacters.push(s);
	});
}

// Rearrange Tiers Array if Tier is Drag and Dropped
function rearrangeTiersArray(targetTier, tierElement) {
	const tierListBody = document.querySelector('.tier-list-body');
	const oldIndex = tierList.tiers.indexOf(targetTier);
	const newIndex = Array.prototype.indexOf.call(tierListBody.children, tierElement);

	if (oldIndex != newIndex) {
		tierList.tiers.splice(oldIndex, 1); // Remove tier from Tiers array at old index
		tierList.tiers.splice(newIndex, 0, targetTier); // Re-add tier to Tiers array at new index
	}
}

// Edit Tier List
function editTierList() {
	// Get Form
	const formOverlay = document.querySelector('.tier-list-form-overlay');
	const form = formOverlay.querySelector('.tier-list-form-wrapper');

	formOverlay.classList.remove('hidden');

	// Handle newline, replace <br> with \n
	//const title = tierList.title.innerHTML.replace(/<br\s*\/?>/mg, "\n");

	// Set Form Fields
	form.querySelector('.tier-list-form-title').value = tierList.title;
	form.querySelector('.tier-list-form-description').value = tierList.description;
	form.querySelector('.tier-list-form-author').value = tierList.author;

	// Set Form Active Background
	const formBackgrounds = form.querySelectorAll('.tier-list-form-color, .tier-list-background-image-thumb');
	formBackgrounds.forEach((background, i) => {
		background.classList.remove('tier-list-background-active');

		if (background.style.background == tierList.background || background.dataset.id == tierList.background) {
			background.classList.add('tier-list-background-active');
		}
	});

	// Set Form Options
	const formOptions = form.querySelectorAll('.tier-list-form-options input[type="checkbox"]');
	formOptions.forEach(checkbox => {
		if (checkbox.name == 'alt-colors') {
			checkbox.checked = tierColors == tierColorsA;
		} else if (checkbox.name == 'darken-background') {
			checkbox.checked = darkenBackground;
		} else if (checkbox.name == 'show-header-on-generate') {
			checkbox.checked = showHeaderOnGenerate;
		} else if (checkbox.name == 'show-date') {
			checkbox.checked = showDate;
		}
	});
}

function saveTierListForm() {
	const tierListElement = document.querySelector('.tier-list');
	const tierListFormOverlay = document.querySelector('.tier-list-form-overlay');
	const formTitle = tierListFormOverlay.querySelector('.tier-list-form-title').value;
	const formDescription = tierListFormOverlay.querySelector('.tier-list-form-description').value;
	const formAuthor = tierListFormOverlay.querySelector('.tier-list-form-author').value;
	const formBackgroundElement = tierListFormOverlay.querySelector('.tier-list-background-active');
	let formBackground;

	if (formBackgroundElement.classList.contains('tier-list-form-color')) {
		formBackground = formBackgroundElement.style.background;
	} else if (formBackgroundElement.classList.contains('tier-list-background-image-thumb')) {
		formBackground = formBackgroundElement.dataset.id;
	}

	// Update tierList
	tierList.title = formTitle;
	tierList.description = formDescription;
	tierList.author = formAuthor;
	tierList.background = formBackground;

	// Update tierList Element
	tierListElement.querySelector('.tier-list-title').innerHTML = formTitle;
	tierListElement.querySelector('.tier-list-description').innerHTML = formDescription;
	tierListElement.querySelector('.tier-list-author').innerHTML = formAuthor;

	// Update Background
	setBackground();

	// Update Options
	const formOptions = tierListFormOverlay.querySelectorAll('.tier-list-form-options input[type="checkbox"]');
	formOptions.forEach(checkbox => {
		if (checkbox.name == 'alt-colors') {
			// TODO: Improve hardcoded background color & logic
			const changed = (!checkbox.checked && tierColors == tierColorsA) || (checkbox.checked && tierColors == tierColorsB);
			if (changed && tierColors.includes(tierList.background)) {
				if (tierColorsA.includes(tierList.background)) {
					tierList.background = 'rgb(26, 26, 23)';
				} else if (tierColorsB.includes(tierList.background)) {
					tierList.background = 'rgba(128, 128, 128, 0.25)';
				}
				setBackground();
			}

			tierColors = checkbox.checked ? tierColorsA : tierColorsB;
			if (tierColors == tierColorsB) {
				tierListElement.classList.add('tier-colors-light');
			} else {
				tierListElement.classList.remove('tier-colors-light');
			}

			// Update Tier Header Colors
			const tierHeaders = tierListElement.querySelectorAll('.tier-header');
			tierHeaders.forEach((x, i) => {
				const tierColor = tierList.tiers[i].color;
				let colorIndex = tierColorsA.includes(tierColor) ? tierColorsA.indexOf(tierColor) : tierColorsB.indexOf(tierColor);
				if (colorIndex == -1) colorIndex = tierColors[0];

				tierList.tiers[i].color = tierColors[colorIndex];
				x.style.background = tierColors[colorIndex];
			});

			// Update Tier List Form Colors
			const tierListFormColors = tierListFormOverlay.querySelectorAll('.tier-list-form-color');
			tierListFormColors.forEach((x, i) => {
				x.style.background = tierColors[i];
			});

			// Update Tier Form Colors
			const tierFormColors = document.querySelectorAll('.tier-form-color');
			tierFormColors.forEach((x, i) => {
				x.style.background = tierColors[i];
			});
		} else if (checkbox.name == 'darken-background') {
			if (darkenBackground != checkbox.checked) {
				darkenBackground = checkbox.checked;
				setBackground();
			}
		} else if (checkbox.name == 'show-header-on-generate') {
			showHeaderOnGenerate = checkbox.checked;
		} else if (checkbox.name == 'show-date') {
			showDate = checkbox.checked;
			if (showDate) {
				tierListElement.querySelector('.tier-list-date').classList.remove('tier-list-date-hidden');
			} else {
				tierListElement.querySelector('.tier-list-date').classList.add('tier-list-date-hidden');
			}
		}
	});

	tierListFormOverlay.classList.add('hidden');
}

// Edit Tier
function editTier(targetTier) {
	// Set Tier Form Target Tier
	tierFormTargetTier = targetTier;

	// Get Form
	const formOverlay = document.querySelector('.tier-form-overlay');
	const form = formOverlay.querySelector('.tier-form-wrapper');

	formOverlay.classList.remove('hidden');

	// Set Form Fields
	form.querySelector('.tier-form-title').value = targetTier.title;
	form.querySelector('.tier-form-description').value = targetTier.description;

	// Set Form Active Color
	const formColors = form.querySelectorAll('.tier-form-color');
	formColors.forEach((color, i) => {
		color.classList.remove('tier-form-color-active');

		if (tierColors[i] == targetTier.color) {
			color.classList.add('tier-form-color-active');
		}
	});
}

function saveTierForm() {
	const targetTier = tierFormTargetTier;
	const tierListBody = document.querySelector('.tier-list-body');
	const targetTierIndex = tierList.tiers.indexOf(targetTier);
	const tierElement = tierListBody.children[targetTierIndex];
	const tierFormOverlay = document.querySelector('.tier-form-overlay');
	const formTitle = tierFormOverlay.querySelector('.tier-form-title').value;
	const formDescription = tierFormOverlay.querySelector('.tier-form-description').value;
	const formColor = tierFormOverlay.querySelector('.tier-form-color-active').style.background;

	// Update targetTier
	targetTier.title = formTitle;
	targetTier.description = formDescription;
	targetTier.color = formColor;

	// Update targetTier Element
	tierElement.querySelector('.tier-title').innerHTML = formTitle;
	tierElement.querySelector('.tier-description').innerHTML = formDescription;
	tierElement.querySelector('.tier-header').style.background = formColor;

	tierFormOverlay.classList.add('hidden');
}

// Add Tier | targetTier == Tier to Add Under
function addTier(loadedTier, targetTier = null) {
	let newTier;
	let targetTierIndex;

	if (!targetTier) {
		// Default Tier
		newTier = loadedTier;
	} else {
		// Set newTier Properties and Position Based on targetTier
		targetTierIndex = tierList.tiers.indexOf(targetTier);
		const targetColorIndex = tierColors.indexOf(targetTier.color);
		const color = targetColorIndex == tierColors.length - 1 ? tierColors[0] : tierColors[targetColorIndex + 1];

		// Create newTier Object
		newTier = {
			title: '',
			description: '',
			color,
			items: []
		}

		// Add newTier Under targetTier
		tierList.tiers.splice(targetTierIndex + 1, 0, newTier);
	}

	createTierElement(newTier, targetTierIndex);
}

function createTierElement(tier, targetTierIndex) {
	const tierListBodyElement = document.querySelector('.tier-list-body');
	const tierElement = document.createElement('div');
	tierElement.classList.add('tier');

	// Rearrange Tiers Array if Tier is Drag and Dropped
	tierElement.addEventListener('drop', () => {
		rearrangeTiersArray(tier, tierElement);
	});

	// Create Tier Header
	const tierHeader = document.createElement('div');
	tierHeader.classList.add('tier-header');
	tierHeader.style.background = tier.color;

	// Create Tier Handle | Note: This is needed to prevent drag/click conflicts on certain mobile devices
	const tierHandle = document.createElement('div');
	tierHandle.classList.add('tier-handle');

	// Create Tier Header Text
	const tierHeaderText = document.createElement('div');
	tierHeaderText.classList.add('tier-header-text');

	// Create Tier Title
	const tierTitle = document.createElement('div');
	tierTitle.classList.add('tier-title');
	tierTitle.innerHTML = tier.title;

	// Create Tier Description
	const tierDescription = document.createElement('div');
	tierDescription.classList.add('tier-description');
	tierDescription.innerHTML = tier.description;

	// Create Tier Options
	const tierOptions = document.createElement('div');
	tierOptions.classList.add('tier-options');
	tierOptions.dataset.html2canvasIgnore = ''; // Add 'html2canvas-ignore' to ignore during image generation

	// Remove Button
	const removeTierBtn = document.createElement('div');
	const removeTierIcon = document.createElement('i');
	removeTierBtn.classList.add('remove-tier-btn');
	removeTierIcon.classList.add('fa-solid', 'fa-circle-minus');
	//removeTierBtn.innerHTML = '&#x1f5d1&#xfe0e'; // Add &#xfe0e to prevent replacing unicode with emoji
	removeTierBtn.addEventListener('click', () => {
		removeTier(tier, tierElement);
	});

	// Edit Button
	const editTierBtn = document.createElement('div');
	const editTierIcon = document.createElement('i');
	editTierBtn.classList.add('edit-tier-btn');
	editTierIcon.classList.add('fa-solid', 'fa-pen');
	//editTierBtn.innerHTML = '&#x270e';
	editTierBtn.addEventListener('click', () => {
		editTier(tier);
	});

	// Add Button
	const addTierBtn = document.createElement('div');
	const addTierIcon = document.createElement('i');
	addTierBtn.classList.add('add-tier-btn');
	addTierIcon.classList.add('fa-solid', 'fa-circle-plus');
	//addTierBtn.innerHTML = '&#43';
	addTierBtn.addEventListener('click', () => {
		addTier(null, tier);
	});

	// Create Tier Body
	const tierBody = document.createElement('div');
	tierBody.classList.add('tier-body');

	// Add existing tier items
	tier.items.forEach(item => {
		const element = document.createElement('div');

		element.classList.add('draggable');
		element.dataset.id = item.name;

		if (item.type == 'character') {
			element.classList.add('character');
			element.style.backgroundImage = "url('" + dirCharacters + item.name + '.' + tierItemExt + "')";
		} else if (item.type == 'assist') {
			element.classList.add('assist');
			if (enableAssistBackground) element.classList.add('assist-background');
			element.style.backgroundImage = "url('" + dirAssists + item.name + '.' + tierItemExt + "')";
		}

		if (item.assist) {
			const elementAssist = document.createElement('div');

			elementAssist.classList.add('assist');
			if (enableAssistBackground) elementAssist.classList.add('assist-background');
			elementAssist.style.backgroundImage = "url('" + dirAssists + item.assist + '.' + tierItemExt + "')";
			elementAssist.dataset.id = item.assist;
			elementAssist.addEventListener('click', () => {
				elementAssist.remove();
			});

			element.append(elementAssist);
		}

		tierBody.append(element);
	});

	// Append
	tierHeaderText.append(tierTitle, tierDescription);
	removeTierBtn.append(removeTierIcon);
	editTierBtn.append(editTierIcon);
	addTierBtn.append(addTierIcon);
	tierOptions.append(removeTierBtn, editTierBtn, addTierBtn);
	tierHeader.append(tierHandle, tierHeaderText, tierOptions);
	tierElement.append(tierHeader, tierBody);

	// Create Sortable Tier
	createTierSortable(tierBody);

	// Add Tier to Tier List after targetTier position
	tierListBodyElement.insertBefore(tierElement, tierListBodyElement.children[targetTierIndex + 1]);
}

// Remove Tier
function removeTier(targetTier, tierElement) {
	if (tierList.tiers.length <= 1) return;

	const items = tierElement.querySelector('.tier-body').children;
	const pool = document.querySelector('.tier-pool');
	const poolAssists = document.querySelector('.tier-pool-assists');
	const frag = document.createDocumentFragment();
	const fragAssists = document.createDocumentFragment();

	// Add all elements in tier to pool
	while (items.length) {
		if (items[0].classList.contains(characterClass)) {
			// Remove attached Assists
			if (items[0].children.length > 0) {
				for (let i = 0; i < items[0].children.length; i++) {
					items[0].children[i].remove();
				}
			}

			frag.append(items[0]);
		} else if (items[0].classList.contains(assistClass)) {
			fragAssists.append(items[0]);
		}
	}

	pool.append(frag);
	poolAssists.append(fragAssists);

	// Remove Tier
	const targetTierIndex = tierList.tiers.indexOf(targetTier);
	tierList.tiers.splice(targetTierIndex, 1);
	tierElement.parentNode.removeChild(tierElement);
}





// Generate Image
function generateTierListImage() {
	const tierListElement = document.querySelector('.tier-list');

	// Hide Scrollbar
	//document.documentElement.classList.add('hide-scrollbar');

	// Hide Header
	if (!showHeaderOnGenerate) {
		tierListElement.querySelector('.tier-list-header').classList.add('tier-list-header-hidden');
	}

	// Hide Tier List Before Resizing
	tierListElement.classList.add('tier-list-hidden');

	// Resize items to original size to prevent poorly upscaled images
	const root = document.querySelector(':root');
	const rootStyles = getComputedStyle(root);
	const prevItemSize = {
		'height': rootStyles.getPropertyValue('--item-height'),
		'width': rootStyles.getPropertyValue('--item-width')
	};
	root.style.setProperty('--item-height', rootStyles.getPropertyValue('--initial-item-height'));
	root.style.setProperty('--item-width', rootStyles.getPropertyValue('--initial-item-width'));

	// Resize to fixed width | Note: If height > 75% of 1080px, resize width to 1920px, otherwise resize width to 1440px
	// BUG: On Mobile, still resizes width to 1920px
	if (tierListElement.offsetHeight > 810) {
		tierListElement.classList.add('tier-list-large');
	} else {
		tierListElement.classList.add('tier-list-medium');
	}

	generateImage(tierListElement, prevItemSize);
}

// html2canvas | Documentation: https://html2canvas.hertzen.com/
function generateImage(target, prevItemSize) {
	// Set Element
	let e = target;
	let e_scale = 1;//1.5;
	let e_width = e.offsetWidth * 1; // Set Width greater than Element to crop later
	let e_height = e.offsetHeight * 1; // Set Height greater than Element to crop later
	let e_PosX = 0;//window.scrollX + e.getBoundingClientRect().left;
	let e_PosY = 0;//window.scrollY + e.getBoundingClientRect().top;

	html2canvas(e, {
		scale: e_scale,
		width: e_width,
		height: e_height,
		x: e_PosX,
		y: e_PosY,
		backgroundColor: null,
		ignoreElements: e => {
			return e.classList.contains('html2canvas-ignore');
		}
	}).then(canvas => {
		onGenerate(canvas, prevItemSize);
	});
}

function onGenerate(canvas, prevItemSize) {
	const fileExt = 'png';
	const tierMaker = document.querySelector('.tier-maker');
	const generatedOverlay = tierMaker.querySelector('.tier-maker-generated-overlay');
	const link = tierMaker.querySelector('.tier-maker-download-wrapper a');
	const imageContainer = tierMaker.querySelector('.tier-maker-image-wrapper');
	const tierListElement = document.querySelector('.tier-list');

	// Reset Item Styling
	const root = document.querySelector(':root');
	root.style.setProperty('--item-height', prevItemSize.height);
	root.style.setProperty('--item-width', prevItemSize.width);

	// Reset Tier List Styling
	tierListElement.classList.remove('tier-list-hidden', 'tier-list-medium', 'tier-list-large');

	// Create File Name
	const fileName = document.querySelector('.tier-list-title').innerHTML;
	//const fileName = title.innerHTML.replace(/<br\s*\/?>/mg, " - "); // Handle Newline

	// Show Generated
	generatedOverlay.classList.remove('hidden');

	// Crop Image
	const ctx = canvas.getContext('2d');
	canvas = cropImageFromCanvas(ctx, canvas);

	// Create Image URL
	const base64image = canvas.toDataURL('image/' + fileExt);
	
	// Testing
	//const win = window.open('', '_blank');
	//win.document.write('<img src="' + base64image + '"/>');
	//win.document.close();

	// Re-add Scrollbar
	//document.documentElement.classList.remove('hide-scrollbar');

	// Show Header
	if (!showHeaderOnGenerate) {
		tierListElement.querySelector('.tier-list-header').classList.remove('tier-list-header-hidden');
	}

	// Append Image
	imageContainer.innerHTML = '';
	imageContainer.append(canvas);

	// Create Download Link
	link.href = base64image;
	link.download = fileName + '.' + fileExt;
}

// Crop Image
function cropImageFromCanvas(ctx, canvas) {
	let w = canvas.width;
	let h = canvas.height;
	let pix = { x:[], y:[] };
	let imageData = ctx.getImageData(0, 0, canvas.width, canvas.height), x, y, index;

	for (y = 0; y < h; y++) {
		for (x = 0; x < w; x++) {
			index = (y * w + x) * 4;

			if (imageData.data[index + 3] > 0) {
				pix.x.push(x);
				pix.y.push(y);
			}
		}
	}

	pix.x.sort(function(a,b) { return a-b });
	pix.y.sort(function(a,b) { return a-b });

	const n = pix.x.length - 1;
	w = pix.x[n] - pix.x[0];
	h = pix.y[n] - pix.y[0];

	const cut = ctx.getImageData(pix.x[0], pix.y[0], w + 1, h + 1);
	canvas.width = w + 1;
	canvas.height = h + 1;
	ctx.putImageData(cut, 0, 0);

	return canvas;
}