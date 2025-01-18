// Author: Raptor_FGC / RedRaptor10

getMoveListView();
setParentClasses();
addAdvancedEvent();
addViewEvents();
addCategoryEvents();
addCategoryEvents(true);
addMoveEvents();

function getMoveListView() {
	let viewBtns = document.querySelectorAll('.move-list-select-view .move-list-view-btn');

	if (viewBtns.length == 0) return;

	if (localStorage.getItem('KA_MOVE_LIST_VIEW')) {
		let view = localStorage.getItem('KA_MOVE_LIST_VIEW');

		if (view == 'table') {
			viewBtns.item(0).classList.remove('active');
			viewBtns.item(1).classList.add('active');

			document.querySelector('.move-list').classList.add('hidden');
			document.querySelector('.move-list-table').classList.remove('hidden');
		}
	}
}

function addAdvancedEvent() {
	let selectAdvanced = document.querySelector('.move-list-select-advanced');
	let advancedBtn = document.querySelector('.move-list-select-advanced-btn');
	let submitBtn = document.querySelector('.move-list-select form > div:first-child input[type="submit"]');
	let advancedInputs = document.querySelectorAll('.move-list-select-advanced input, .move-list-select-advanced select');

	advancedBtn.addEventListener('click', () => {
		selectAdvanced.classList.toggle('hidden');
		submitBtn.classList.toggle('hidden');

		if (selectAdvanced.classList.contains('hidden')) {
			advancedBtn.innerHTML = 'Show Advanced';

			advancedInputs.forEach(i => {
				i.disabled = true;
			});
		} else {
			advancedBtn.innerHTML = 'Hide Advanced';

			advancedInputs.forEach(i => {
				i.disabled = false;
			});
		}
	});
}

function addViewEvents() {
	let viewBtns = document.querySelectorAll('.move-list-select-view .move-list-view-btn');
	let viewContent = document.querySelectorAll('.move-list-wrapper > div');
	let targetView;

	viewBtns.forEach((b, i) => {
		b.addEventListener('click', () => {
			if (b.classList.contains('active')) {
				return;
			}

			targetView = i == 0 ? 'move-list' : 'move-list-table';

			viewBtns.forEach(b2 => {
				b2.classList.remove('active');
			});

			b.classList.add('active');

			viewContent.forEach(v => {
				v.classList.add('hidden');

				if (v.classList.contains(targetView)) {
					v.classList.remove('hidden');
				}
			});

			if (targetView == 'move-list') {
				localStorage.removeItem('KA_MOVE_LIST_VIEW');
			} else if (targetView == 'move-list-table') {
				localStorage.setItem('KA_MOVE_LIST_VIEW', 'table');
			}
		});
	});
}

function addCategoryEvents(isTable) {
	let categoryBtns = !isTable ? document.querySelectorAll('.move-list nav div') : document.querySelectorAll('.move-list-table nav div');
	let categoryBtns2 = !isTable ? document.querySelectorAll('.move-list-table nav div') : document.querySelectorAll('.move-list nav div');
	let moveListContent = !isTable ? document.querySelectorAll('.move-list-body > div') : document.querySelectorAll('.move-list-table > div > div');
	let moveListContent2 = !isTable ? document.querySelectorAll('.move-list-table > div > div') : document.querySelectorAll('.move-list-body > div');

	let advancedColCharacter = document.querySelector('.move-list-col-header-character');
	let advancedColKameo = document.querySelector('.move-list-col-header-kameo');
	let advancedTableColsCharacter = document.querySelectorAll('.move-list-table-col-header-character');
	let advancedTableColsKameo = document.querySelectorAll('.move-list-table-col-header-kameo');
	

	categoryBtns.forEach((b, i) => {
		b.addEventListener('click', () => {
			if (b.classList.contains('active')) {
				return;
			}

			categoryBtns.forEach((b2, j) => {
				b2.classList.remove('active');
				categoryBtns2.item(j).classList.remove('active');
			});

			b.classList.add('active');
			categoryBtns2.item(i).classList.add('active');

			moveListContent.forEach((c, j) => {
				c.classList.add('hidden');
				moveListContent2.item(j).classList.add('hidden');
			});

			moveListContent.item(i).classList.remove('hidden');
			moveListContent2.item(i).classList.remove('hidden');

			// Advanced Character/Kameo Column
			if (advancedColCharacter && advancedColKameo && advancedTableColsCharacter && advancedTableColsKameo) {
				if (i != 3) {
					advancedColCharacter.classList.remove('hidden');
					advancedColKameo.classList.add('hidden');

					advancedTableColsCharacter.forEach((c, j) => {
						c.classList.remove('hidden');
						advancedTableColsKameo.item(j).classList.add('hidden');
					});
				} else {
					advancedColCharacter.classList.add('hidden');
					advancedColKameo.classList.remove('hidden');

					advancedTableColsCharacter.forEach((c, j) => {
						c.classList.add('hidden');
						advancedTableColsKameo.item(j).classList.remove('hidden');
					});
				}
			}
		});
	});
}

function addMoveEvents() {
	if (!document.querySelector('.move-list')) return;

	let categoryClasses = [];
	let moveDataIds = [
			'move-name', 'command', 'hit-damage', 'block-damage', 'fblock-damage', 'block-type', 'start-up',
			'active', 'recovery', 'cancel', 'hit-advantage', 'block-advantage', 'fblock-advantage', 'notes'
	];
	let moveDataCols = [
			'move_name', 'command', 'hit_damage', 'block_damage', 'fblock_damage', 'block_type', 'startup',
			'active', 'recovery', 'cancel', 'hit_advantage', 'block_advantage', 'fblock_advantage', 'notes'
	];
	let activeMoveData = [];
	let activeMove;

	if (basicAttacks) categoryClasses.push('basic-attacks');
	if (specialMoves) categoryClasses.push('special-moves');
	if (finishers) categoryClasses.push('finishers');
	if (kameoMoves) categoryClasses.push('kameo-moves');

	categoryClasses.forEach(c => {
		let moveElements = document.querySelectorAll('.' + c + ' .move-list-move');
		let moves;

		if (c == 'basic-attacks') {
			if (basicAttacks) {
				moves = basicAttacks;
			}
		} else if (c == 'special-moves') {
			if (specialMoves) {
				moves = specialMoves;
			}
		} else if (c == 'finishers') {
			if (finishers) {
				moves = finishers;
			}
		} else if (c == 'kameo-moves') {
			if (kameoMoves) {
				moves = kameoMoves;
			}
		}

		moveElements.forEach((e, i) => {
			e.addEventListener('mouseover', () => {
				for (let j = 0; j < moveDataIds.length; j++) {
					if (moves[i][moveDataCols[j]] != '') {
						if (moveDataIds[j] == 'command') {
							// Clone command
							const clone = e.querySelector('.move-list-move-command').firstElementChild.cloneNode(true);

							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = '';
							document.querySelector('.' + c + ' #' + moveDataIds[j]).append(clone);
						} else if (moveDataIds[j] == 'notes') {
							// Handle line breaks
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = moves[i][moveDataCols[j]].replace(/\r?\n/g, '<br>');
						} else {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = moves[i][moveDataCols[j]];
						}
					} else {
						if (moveDataIds[j] == 'command' || moveDataIds[j] == 'notes') {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = '';
						} else {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = 'N/A';
						}
					}
				}
			});

			e.addEventListener('mouseout', () => {
				if (activeMoveData.length == 0) {
					document.querySelectorAll('.' + c + ' .move-list-data-value').forEach(v => {
						v.innerHTML = 'N/A';
					});

					document.querySelector('.' + c + ' .move-list-data-move-name').innerHTML = 'N/A';
					document.querySelector('.' + c + ' .move-list-data-command').innerHTML = '';
					document.querySelector('.' + c + ' .move-list-data-notes').innerHTML = '';
				} else {
					for (let j = 0; j < moveDataIds.length; j++) {
						if (moveDataIds[j] == 'command') {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = '';
							document.querySelector('.' + c + ' #' + moveDataIds[j]).append(activeMoveData[j]);
						} else if (moveDataIds[j] == 'notes') {
							// Handle line breaks
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = activeMoveData[j].replace(/\r?\n/g, '<br>');
						} else {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = activeMoveData[j];
						}
					}
				}
			});

			e.addEventListener('click', () => {
				document.querySelectorAll('.move-list-move').forEach(e2 => {
					e2.classList.remove('active');
				});

				if (activeMove != e) {
					activeMove = e;
					e.classList.add('active');

					for (let j = 0; j < moveDataIds.length; j++) {
						if (moveDataIds[j] == 'command') {
							// Clone command
							const clone = e.querySelector('.move-list-move-command').firstElementChild.cloneNode(true);

							activeMoveData[j] = clone;
						} else {
							activeMoveData[j] = moves[i][moveDataCols[j]];
						}
					}

					for (let j = 0; j < moveDataIds.length; j++) {
						if (moves[i][moveDataCols[j]] != '') {
							categoryClasses.forEach((k, l) => {
								if (moveDataIds[j] == 'command') {
									// Clone command
									const clone = e.querySelector('.move-list-move-command').firstElementChild.cloneNode(true);

									document.querySelector('.' + categoryClasses[l] + ' #' + moveDataIds[j]).innerHTML = '';
									document.querySelector('.' + categoryClasses[l] + ' #' + moveDataIds[j]).append(clone);
								} else if (moveDataIds[j] == 'notes') {
									// Handle line breaks
									document.querySelector('.' + categoryClasses[l] + ' #' + moveDataIds[j]).innerHTML = moves[i][moveDataCols[j]].replace(/\r?\n/g, '<br>');
								} else {
									document.querySelector('.' + categoryClasses[l] + ' #' + moveDataIds[j]).innerHTML = moves[i][moveDataCols[j]];
								}
							});
						} else {
							if (moveDataIds[j] == 'command' || moveDataIds[j] == 'notes') {
								categoryClasses.forEach((k, l) => {
									document.querySelector('.' + categoryClasses[l] + ' #' + moveDataIds[j]).innerHTML = '';
								});
							} else {
								categoryClasses.forEach((k, l) => {
									document.querySelector('.' + categoryClasses[l] + ' #' + moveDataIds[j]).innerHTML = 'N/A';
								});
							}
						}
					}
				} else {
					activeMoveData = [];
					activeMove = null;

					document.querySelectorAll('.move-list-data-value').forEach(v => {
						v.innerHTML = 'N/A';
					});

					document.querySelector('.move-list-data-move-name').innerHTML = 'N/A';
					document.querySelector('.move-list-data-command').innerHTML = '';
					document.querySelector('.move-list-data-notes').innerHTML = '';
				}
			});

			// Mobile
			let startY;
			e.addEventListener('touchstart', event => {
				startY = event.touches[0].clientY;
				setTimeout(() => {
					e.classList.remove('active'); // Prevent adding 'active' class on touchstart
				});
			});

			e.addEventListener('touchend', event => {
				let deltaY = event.changedTouches[0].clientY - startY;

				// If scrolling, do nothing
				if (deltaY > 10 || deltaY < -10) return;

				document.querySelector('.overlay').classList.remove('hidden');
				document.querySelector('.' + c + ' .move-list-data').classList.add('visible-mobile');
				document.querySelector('.' + c + ' .move-list-data').scrollTop = 0;

				for (let j = 0; j < moveDataIds.length; j++) {
					if (moves[i][moveDataCols[j]] != '') {
						if (moveDataIds[j] == 'command') {
							// Clone command
							const clone = e.querySelector('.move-list-move-command').firstElementChild.cloneNode(true);

							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = '';
							document.querySelector('.' + c + ' #' + moveDataIds[j]).append(clone);
						} else if (moveDataIds[j] == 'notes') {
							// Handle line breaks
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = moves[i][moveDataCols[j]].replace(/\r?\n/g, '<br>');
						} else {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = moves[i][moveDataCols[j]];
						}
					} else {
						if (moveDataIds[j] == 'command' || moveDataIds[j] == 'notes') {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = '';
						} else {
							document.querySelector('.' + c + ' #' + moveDataIds[j]).innerHTML = 'N/A';
						}
					}
				}
			});
		});
	});

	// Mobile
	let overlay = document.querySelector('.overlay');

	document.querySelectorAll('.move-list-data').forEach(d => {
		let startY;

		d.addEventListener('touchstart', event => {
			startY = event.touches[0].clientY;
		});

		d.addEventListener('touchend', () => {
			let deltaY = event.changedTouches[0].clientY - startY;

			// If scrolling, do nothing
			if (deltaY > 10 || deltaY < -10) return;

			overlay.classList.add('hidden');
			d.classList.remove('visible-mobile');
		});
	});

	overlay.addEventListener('touchend', () => {
		overlay.classList.add('hidden');
		document.querySelectorAll('.move-list-data').forEach(d => {
			d.classList.remove('visible-mobile');
		});
	});

	overlay.addEventListener('touchmove', event => {
		event.preventDefault(); // Prevent scrolling
	});
}

function setParentClasses() {
	let moves = document.querySelectorAll('.move-list-move');
	let prevIsChild;

	for (let i = moves.length - 1; i >= 0; i--) {
		if (moves[i].classList.contains('move-list-move-child')) {
			prevIsChild = true;
		} else {
			if (prevIsChild) {
				moves[i].classList.add('move-list-move-parent');
			}

			prevIsChild = false;
		}
	}
}

// Disable to remove empty url parameters for mobile
function disableEmpty(form) {
	let controls = form.elements;

	for (let i = 0; i < controls.length; i++) {
		if (controls[i].value == '') controls[i].disabled = true;
	}
}