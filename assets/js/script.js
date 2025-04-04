setTheme();
getPlatform();

function getPlatform() {
	if (localStorage.getItem('KA_PLATFORM')) {
		let currentPlatform = localStorage.getItem('KA_PLATFORM');
		setPlatform(currentPlatform);

		document.querySelectorAll('.platform-selector option').forEach(o => {
			if (o.value == currentPlatform) {
				o.selected = 'selected';
			}
		});
	} else {
		document.querySelectorAll('.platform-selector option:first-child').forEach(o => {
			o.selected = 'selected';
		});
	}
}

function selectPlatform(platform) {
	if (platform != '') {
		setPlatform(platform);

		if (platform == 'plain-text') {
			localStorage.removeItem('KA_PLATFORM');
		} else {
			localStorage.setItem('KA_PLATFORM', platform);
		}
	}
}

function setPlatform(platform, targetContainers) {
	let containers = document.querySelectorAll('.inputs');
	let sizes = ['btn-inputs-xs', 'btn-inputs-s', 'btn-inputs-m', 'btn-inputs-l', 'btn-inputs-xl'];
	let directions = ['up-back', 'up-forward', 'down-back', 'down-forward', 'back', 'up', 'down', 'forward'];
	let faces = ['1', '2', '3', '4'];
	let shoulders = ['l1', 'r1', 'l2', 'r2'];

	// If targetContainers argument (optional), set containers to targetContainers
	if (targetContainers) containers = document.querySelectorAll(targetContainers);

	if (containers.length == 0) return;

	if (platform == 'plain-text') {
		containers.forEach(c => {
			c.classList.remove('btn-inputs');
		});

		containers.forEach(c => {
			let inputs = c.querySelectorAll('.input, .btn-inputs-separator');

			// If container does not contain child elements with 'input' class, avoid conversion
			if (inputs.length == 0) {
				return; // Skip to next iteration
			}

			inputs.forEach(i => {
				let name = i.getAttribute('name');
				let text = '';

				if (i.classList.contains('btn-inputs-separator')) {
					text = ' ';
				} else if (name == 'up-back') {
					text = 'U+B';
				} else if (name == 'up-forward') {
					text = 'U+F';
				} else if (name == 'down-back') {
					text = 'D+B';
				} else if (name == 'down-forward') {
					text = 'D+F';
				} else if (name == 'back') {
					text = 'B';
				} else if (name == 'up') {
					text = 'U';
				} else if (name == 'down') {
					text = 'D';
				} else if (name == 'forward') {
					text = 'F';
				} else if (name == '1') {
					text = '1';
				} else if (name == '2') {
					text = '2';
				} else if (name == '3') {
					text = '3';
				} else if (name == '4') {
					text = '4';
				} else if (name == 'l1') {
					text = 'THROW';
				} else if (name == 'r1') {
					text = 'KAMEO';
				} else if (name == 'l2') {
					text = 'SS';
				} else if (name == 'r2') {
					text = 'EX';
				}

				i.parentNode.replaceChild(document.createTextNode(text), i);
			});
		});

		return;
	}

	containers.forEach(c => {
		c.classList.add('btn-inputs');
	});

	containers.forEach(c => {
		let inputs = c.querySelectorAll('.input');
		let isPlainText = false;

		let inputMap = {
			'THROW': 'l1',
			'KAMEO': 'r1',
			'SS': 'l2',
			'EX': 'r2',

			'U+B': 'up-back',
			'U+F': 'up-forward',
			'D+B': 'down-back',
			'D+F': 'down-forward',

			'B': 'back',
			'U': 'up',
			'D': 'down',
			'F': 'forward',

			'1': '1',
			'2': '2',
			'3': '3',
			'4': '4'
		};

		// If container doesn't contain any size class, add default size
		if (!sizes.some(size => c.classList.contains(size))) {
			c.classList.add(sizes[1]); // Default
		}

		// If container does not contain child elements with 'input' class, convert from plain-text
		if (inputs.length == 0) {
			isPlainText = true;
			inputs = c.textContent.match(/ |,|\+|HOLD|DELAY|RELEASE|OR|\(AIR\)|DURING CERTAIN MOVES|DURING ENHANCED MOVES|DURING START-UP|DURING SUPERFLUID MATTER|DURING AMORPHOUS STEP|DURING ENHANCED AMORPHOUS STEP|DURING SLIDE|DURING BOMBS|DURING RUSH|DURING ENHANCED RUSH|DURING DELAY KNIFE TOSS|DURING TEAHOUSE TUMBLE|DURING|AFTER SERVER SLIDE HIT|END OF MOVE|NEAR CORNER|NEAR DRINK TRAY|WHILE PRONE|WHILE IN AIR|1\/2\/3\4 x5|THROW|KAMEO|SS|EX|U\+B|U\+F|D\+B|D\+F|B|U|D|F|1|2|3|4/gi);
			c.innerHTML = '';
		}

		inputs.forEach(i => {
			let name = '';

			if (isPlainText) {
				// Separator
				if (i == ' ') {
					let span = document.createElement('span');
					span.classList.add('btn-inputs-separator');
					span.innerHTML = ' ';
					c.append(span);
					return; // Skip to next iteration
				}

				if (i.toUpperCase() in inputMap) name = inputMap[i.toUpperCase()];
			} else {
				name = i.getAttribute('name');
			}

			let svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
			let title = document.createElementNS('http://www.w3.org/2000/svg', 'title');
			let use = document.createElementNS('http://www.w3.org/2000/svg', 'use');

			svg.setAttribute('width', '128');
			svg.setAttribute('height', '128');
			svg.classList.add('input', 'btn-icon');

			if (directions.includes(name)) {
				svg.classList.add('direction-btn');

				if (name == 'up-back') {
					svg.setAttribute('viewBox', '512 0 128 128');
					svg.setAttribute('name', 'up-back');
					title.innerHTML = 'Up+Back';
					use.setAttribute('href', '#up-back');
				} else if (name == 'up-forward') {
					svg.setAttribute('viewBox', '640 0 128 128');
					svg.setAttribute('name', 'up-forward');
					title.innerHTML = 'Up+Forward';
					use.setAttribute('href', '#up-forward');
				} else if (name == 'down-back') {
					svg.setAttribute('viewBox', '768 0 128 128');
					svg.setAttribute('name', 'down-back');
					title.innerHTML = 'Down+Back';
					use.setAttribute('href', '#down-back');
				} else if (name == 'down-forward') {
					svg.setAttribute('viewBox', '896 0 128 128');
					svg.setAttribute('name', 'down-forward');
					title.innerHTML = 'Down+Forward';
					use.setAttribute('href', '#down-forward');
				} else if (name == 'back') {
					svg.setAttribute('viewBox', '0 0 128 128');
					svg.setAttribute('name', 'back');
					title.innerHTML = 'Back';
					use.setAttribute('href', '#back');
				} else if (name == 'up') {
					svg.setAttribute('viewBox', '128 0 128 128');
					svg.setAttribute('name', 'up');
					title.innerHTML = 'Up';
					use.setAttribute('href', '#up');
				} else if (name == 'down') {
					svg.setAttribute('viewBox', '256 0 128 128');
					svg.setAttribute('name', 'down');
					title.innerHTML = 'Down';
					use.setAttribute('href', '#down');
				} else if (name == 'forward') {
					svg.setAttribute('viewBox', '384 0 128 128');
					svg.setAttribute('name', 'forward');
					title.innerHTML = 'Forward';
					use.setAttribute('href', '#forward');
				}
			} else if (faces.includes(name) || shoulders.includes(name)) {
				if (platform == 'playstation') {
					if (name == '1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '1');
						svg.classList.add('playstation-face', 'playstation-square');
						title.innerHTML = 'Square';
						use.setAttribute('href', '#playstation-square');
					} else if (name == '2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '2');
						svg.classList.add('playstation-face', 'playstation-triangle');
						title.innerHTML = 'Triangle';
						use.setAttribute('href', '#playstation-triangle');
					} else if (name == '3') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '3');
						svg.classList.add('playstation-face', 'playstation-cross');
						title.innerHTML = 'Cross';
						use.setAttribute('href', '#playstation-cross');
					} else if (name == '4') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '4');
						svg.classList.add('playstation-face', 'playstation-circle');
						title.innerHTML = 'Circle';
						use.setAttribute('href', '#playstation-circle');
					} else if (name == 'l1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l1');
						svg.classList.add('playstation-l1');
						title.innerHTML = 'L1';
						use.setAttribute('href', '#playstation-l1');
					} else if (name == 'r1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r1');
						svg.classList.add('playstation-r1');
						title.innerHTML = 'R1';
						use.setAttribute('href', '#playstation-r1');
					} else if (name == 'l2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l2');
						svg.classList.add('playstation-l2');
						title.innerHTML = 'L2';
						use.setAttribute('href', '#playstation-l2');
					} else if (name == 'r2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r2');
						svg.classList.add('playstation-r2');
						title.innerHTML = 'R2';
						use.setAttribute('href', '#playstation-r2');
					}
				} else if (platform == 'xbox') {
					if (name == '1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '1');
						svg.classList.add('xbox-face', 'xbox-x');
						title.innerHTML = 'X';
						use.setAttribute('href', '#xbox-x');
					} else if (name == '2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '2');
						svg.classList.add('xbox-face', 'xbox-y');
						title.innerHTML = 'Y';
						use.setAttribute('href', '#xbox-y');
					} else if (name == '3') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '3');
						svg.classList.add('xbox-face', 'xbox-a');
						title.innerHTML = 'A';
						use.setAttribute('href', '#xbox-a');
					} else if (name == '4') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '4');
						svg.classList.add('xbox-face', 'xbox-b');
						title.innerHTML = 'B';
						use.setAttribute('href', '#xbox-b');
					} else if (name == 'l1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l1');
						svg.classList.add('xbox-lb');
						title.innerHTML = 'LB';
						use.setAttribute('href', '#xbox-lb');
					} else if (name == 'r1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r1');
						svg.classList.add('xbox-rb');
						title.innerHTML = 'RB';
						use.setAttribute('href', '#xbox-rb');
					} else if (name == 'l2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l2');
						svg.classList.add('xbox-lt');
						title.innerHTML = 'LT';
						use.setAttribute('href', '#xbox-lt');
					} else if (name == 'r2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r2');
						svg.classList.add('xbox-rt');
						title.innerHTML = 'RT';
						use.setAttribute('href', '#xbox-rt');
					}
				} else if (platform == 'switch') {
					if (name == '1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '1');
						svg.classList.add('switch-face', 'switch-y');
						title.innerHTML = 'Y';
						use.setAttribute('href', '#switch-y');
					} else if (name == '2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '2');
						svg.classList.add('switch-face', 'switch-x');
						title.innerHTML = 'X';
						use.setAttribute('href', '#switch-x');
					} else if (name == '3') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '3');
						svg.classList.add('switch-face', 'switch-b');
						title.innerHTML = 'B';
						use.setAttribute('href', '#switch-b');
					} else if (name == '4') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', '4');
						svg.classList.add('switch-face', 'switch-a');
						title.innerHTML = 'A';
						use.setAttribute('href', '#switch-a');
					} else if (name == 'l1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l1');
						svg.classList.add('switch-l');
						title.innerHTML = 'L';
						use.setAttribute('href', '#switch-l');
					} else if (name == 'r1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r1');
						svg.classList.add('switch-r');
						title.innerHTML = 'R';
						use.setAttribute('href', '#switch-r');
					} else if (name == 'l2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l2');
						svg.classList.add('switch-zl');
						title.innerHTML = 'ZL';
						use.setAttribute('href', '#switch-zl');
					} else if (name == 'r2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r2');
						svg.classList.add('switch-zr');
						title.innerHTML = 'ZR';
						use.setAttribute('href', '#switch-zr');
					}
				} else if (platform == 'universal') {
					if (name == '1') {
						svg.setAttribute('viewBox', '0 512 128 128');
						svg.setAttribute('name', '1');
						svg.classList.add('universal-face', 'universal-1');
						title.innerHTML = '1';
						use.setAttribute('href', '#universal-1');
					} else if (name == '2') {
						svg.setAttribute('viewBox', '128 512 128 128');
						svg.setAttribute('name', '2');
						svg.classList.add('universal-face', 'universal-2');
						title.innerHTML = '2';
						use.setAttribute('href', '#universal-2');
					} else if (name == '3') {
						svg.setAttribute('viewBox', '256 512 128 128');
						svg.setAttribute('name', '3');
						svg.classList.add('universal-face', 'universal-3');
						title.innerHTML = '3';
						use.setAttribute('href', '#universal-3');
					} else if (name == '4') {
						svg.setAttribute('viewBox', '384 512 128 128');
						svg.setAttribute('name', '4');
						svg.classList.add('universal-face', 'universal-4');
						title.innerHTML = '4';
						use.setAttribute('href', '#universal-4');
					} else if (name == 'l1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l1');
						svg.classList.add('playstation-l1');
						title.innerHTML = 'L1';
						use.setAttribute('href', '#playstation-l1');
					} else if (name == 'r1') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r1');
						svg.classList.add('playstation-r1');
						title.innerHTML = 'R1';
						use.setAttribute('href', '#playstation-r1');
					} else if (name == 'l2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'l2');
						svg.classList.add('playstation-l2');
						title.innerHTML = 'L2';
						use.setAttribute('href', '#playstation-l2');
					} else if (name == 'r2') {
						svg.setAttribute('viewBox', '0 0 128 128');
						svg.setAttribute('name', 'r2');
						svg.classList.add('playstation-r2');
						title.innerHTML = 'R2';
						use.setAttribute('href', '#playstation-r2');
					}
				}
			}

			svg.append(title, use);

			if (isPlainText) {
				if (name == '') {
					c.append(i);
				} else {
					c.append(svg);
				}
			} else {
				i.parentNode.replaceChild(svg, i);
			}
		});
	});
}

function toggleTheme() {
	document.querySelector('body').classList.toggle('light-theme');

	if (document.querySelector('body').classList.contains('light-theme')) {
		localStorage.setItem('KA_THEME', 'light');
	} else {
		localStorage.removeItem('KA_THEME');
	}
}

function setTheme() {
	if (localStorage.getItem('KA_THEME')) {
		document.querySelector('body').classList.add('light-theme');
	}
}

function onHoverFrameDataOption(item, color) {
	const table = item.closest('.table-container').querySelector('table');

	if (!color) {
		table.classList.add('hover-green', 'hover-red', 'hover-yellow');
	} else if (color == 'green') {
		table.classList.add('hover-green');
	} else if (color == 'red') {
		table.classList.add('hover-red');
	} else if (color == 'yellow') {
		table.classList.add('hover-yellow');
	}
}

function offHoverFrameDataOption(item) {
	const table = item.closest('.table-container').querySelector('table');
	table.classList.remove('hover-green', 'hover-red', 'hover-yellow');
}

function highlightFrameData(item, color) {
	const container = item.closest('.table-container');
	const table = container.querySelector('table');
	const checkbox = item.querySelector('input[type="checkbox"]');
	const checkboxes = container.querySelectorAll('input[type="checkbox"]');

	if (!color) {
		if (table.classList.contains('highlight-green') && table.classList.contains('highlight-red') && table.classList.contains('highlight-yellow')) {
			table.classList.add('highlight-none');
			table.classList.remove('highlight-green', 'highlight-red', 'highlight-yellow');

			checkboxes.forEach(c => c.checked = false);
		} else {
			table.classList.add('highlight-green', 'highlight-red', 'highlight-yellow');
			table.classList.remove('highlight-none');

			checkboxes.forEach(c => c.checked = true);
		}
	} else if (color == 'green') {
		if (table.classList.contains('highlight-green')) {
			table.classList.remove('highlight-green');

			if (!table.classList.contains('highlight-red') && !table.classList.contains('highlight-yellow')) {
				table.classList.add('highlight-none');
			}

			checkbox.checked = false;
		} else {
			table.classList.add('highlight-green');
			table.classList.remove('highlight-none');
			checkbox.checked = true;
		}
	} else if (color == 'red') {
		if (table.classList.contains('highlight-red')) {
			table.classList.remove('highlight-red');

			if (!table.classList.contains('highlight-green') && !table.classList.contains('highlight-yellow')) {
				table.classList.remove('highlight-none');
			}

			checkbox.checked = false;
		} else {
			table.classList.add('highlight-red');
			table.classList.remove('highlight-none');
			checkbox.checked = true;
		}
	} else if (color == 'yellow') {
		if (table.classList.contains('highlight-yellow')) {
			table.classList.remove('highlight-yellow');

			if (!table.classList.contains('highlight-green') && !table.classList.contains('highlight-red')) {
				table.classList.remove('highlight-none');
			}

			checkbox.checked = false;
		} else {
			table.classList.add('highlight-yellow');
			table.classList.remove('highlight-none');
			checkbox.checked = true;
		}
	}
}