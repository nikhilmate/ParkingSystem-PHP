const navi = document.querySelector('.navbar');
const topi = navi.offsetTop;

function stick(e) {
	if (window.scrollY >= topi) {
		document.body.style.paddingTop = navi.offsetHeight + 'px';
		document.body.classList.add('hide-nav');

	} else {
		document.body.classList.remove('hide-nav');
	}
}

window.addEventListener('scroll', stick);