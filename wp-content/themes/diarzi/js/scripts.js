var bodyAndHtml = document.querySelector('body, html');
document.querySelector('.header__button').addEventListener('click', function() {
	document.querySelector('.modal').style.display = 'flex';
	bodyAndHtml.style.overflow = 'hidden';
});

document.querySelector('.modal__order-close').addEventListener('click', function() {
	document.querySelector('.modal').style.display = '';
	bodyAndHtml.style.overflow = '';
});

var products = document.querySelectorAll('.product'),
	productsModal = document.querySelectorAll('.modal')[1];
for (let i = 0; i < products.length; i++) {
	products[i].addEventListener('click', function() {
		productsModal.style.display = 'flex';
		bodyAndHtml.style.overflow = 'hidden';
	});
}

document.querySelector('.modal__product-close').addEventListener('click', function() {
	productsModal.style.display = '';
	bodyAndHtml.style.overflow = '';
});	


var productNameField = document.querySelector('.js-field-product_name'),
	productMainImg = document.querySelector('.js-product-main-img'),
	miniImgWrapper = document.querySelector('.js-mini-img-wrapper'),
	modalPrice = document.querySelectorAll('.modal__product-text-wrapper p')[2],
	modalArticle = document.querySelectorAll('.modal__product-text-wrapper p')[1],
	modalDescription = document.querySelector('.modal__product-text-description'),
	modalTitle = document.querySelectorAll('.modal__product-text-wrapper p')[0],
	modalButton = document.querySelector('.modal__button');

var buff = '';

for (let i = 0; i < products.length; i++) {
	products[i].addEventListener('click', function() {
		let name = this.dataset.name,
			mainPhoto = this.dataset.mainPhoto,
			miniPhotos = this.dataset.miniPhotos.split(';'),
			price = this.dataset.price,
			article = this.dataset.article,
			description = this.dataset.description;

			console.log(description);

		productNameField.setAttribute('value', name);
		productMainImg.src = 'img/' + mainPhoto;
		modalPrice.innerHTML = 'от ' + price + ' ₽';
		modalArticle.innerHTML = 'Артикул: ' + article;
		modalDescription.innerHTML = description;
		modalTitle.innerHTML = name;


		if (miniImgWrapper.childNodes[1]) {
			while (miniImgWrapper.childNodes[1]) {
				miniImgWrapper.removeChild(miniImgWrapper.childNodes[1]);
			}
		}

		let	mainImg = document.createElement('img');
			mainImg.src = 'img/' + mainPhoto;
			mainImg.classList.add('modal__product-mini-photo');
			mainImg.addEventListener('click', function() {
						productMainImg.src = this.src;
						buff = productMainImg.src;
						modalButton.innerHTML = 'Показать цвета';
					});
			miniImgWrapper.appendChild(mainImg);

			for (let j = 0; j < miniPhotos.length - 1; j++) {
				let miniPhoto = document.createElement('img');
					miniPhoto.src = 'img/' + miniPhotos[j];
					miniPhoto.classList.add('modal__product-mini-photo');
					miniPhoto.addEventListener('click', function() {
						productMainImg.src = this.src;
						buff = productMainImg.src;
						modalButton.innerHTML = 'Показать цвета';
					});
					miniImgWrapper.appendChild(miniPhoto);
			}

	});
}


modalButton.addEventListener('click', function() {
	if (!buff) {
		buff = productMainImg.src;
	}
	if (modalButton.innerHTML === 'Показать цвета') {
		productMainImg.src = 'details/colorpallete.jpg';
		modalButton.innerHTML = 'Скрыть цвета';
	} else {
		productMainImg.src = buff;
		modalButton.innerHTML = 'Показать цвета';
	}
});

let arrow = document.querySelector('.up-arrow'),
	logo = document.querySelector('.header__logo');

window.addEventListener('scroll', function() {
	if (window.pageYOffset > 0) {
		arrow.style.display = 'block';
	} else {
		arrow.style.display = '';
	}
});

arrow.addEventListener('click', function() {
	window.scrollTo(0, 0);
});

logo.addEventListener('click', function() {
	window.scrollTo(0, 0);
});