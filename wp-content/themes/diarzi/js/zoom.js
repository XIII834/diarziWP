var  wrapper = document.querySelector('.js-product-main-img-wrapper'),
		 mainImg = wrapper.querySelector('img');


function getCursorCoords(event) {
	let coords = {};
			coords.left = event.clientX;
			coords.top = event.clientY;

	return coords;
}

function createZoom() {
	let zoom = document.createElement('div');
	zoom.className = 'zoom';
	zoom.style.backgroundImage = 'url(' + mainImg.src + ')';

	wrapper.appendChild(zoom);
}

function removeZoom() {
	let zoom = wrapper.querySelector('.zoom');
	wrapper.removeChild(zoom);
}

function moveZoom(event) {
	let zoom = wrapper.querySelector('.zoom'),
			currentCoords = getCursorCoords(event),
			mainImgCoords = mainImg.getBoundingClientRect(),
			diffX = currentCoords.left - mainImgCoords.left,
			diffY = currentCoords.top - mainImgCoords.top,
			dimensions = {
				width: parseInt(getComputedStyle(zoom).width),
				height: parseInt(getComputedStyle(zoom).height),
			},
			mainImgWidth = parseInt(getComputedStyle(mainImg).width),
			mainImgHeight = parseInt(getComputedStyle(mainImg).height),
			backPosX = diffX / (mainImgWidth / 100),
			backPosY = diffY / (mainImgWidth / 100);

			zoom.style.top = (currentCoords.top - (dimensions.height / 2)) + 'px';
			zoom.style.left = (currentCoords.left - (dimensions.width / 2)) + 'px';
			zoom.style.backgroundPosition = backPosX + '% ' + backPosY + '%';
}

mainImg.addEventListener('mouseenter', createZoom);
mainImg.addEventListener('mouseleave', removeZoom);
mainImg.addEventListener('mousemove', moveZoom);