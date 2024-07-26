//window.onload = function() {hideObject([]);}

function getValidValue(value)
{
	return !(value == '' || value == null || value == undefined);
}

function changeTextCount(count)
{
	let elem = document.getElementById('change-part');
	elem.innerHTML = count + " " + getCorText(count);

	elem = document.getElementById('show-link');
	elem.classList.remove('disabled-link');
	elem = document.getElementById('show-btn');
	elem.classList.remove('bg-disable');
	elem.classList.add('bg-pink');

	getTextResultFilter(count);
}

function removeBtn()
{
	let elem = document.getElementById('change-part');
	elem.innerHTML = "";

	elem = document.getElementById('show-link');
	elem.classList.add('disabled-link');
	elem = document.getElementById('show-btn');
	elem.classList.remove('bg-pink');
	elem.classList.add('bg-disable');
}

function getTextResultFilter(count)
{
	document.getElementById('filter-nothing').style.display = 'none';
	document.getElementById('filter-anchor').style.display = 'block';
	document.getElementById('filter-available').style.display = 'none';

	if (count === 0)
	{
		document.getElementById('filter-nothing').style.display = 'block';

	}
	if (count > 0)
	{
		document.getElementById('filter-available').style.display = 'block';
		document.getElementById('filter-anchor').style.display = 'none';
	}
}

function getCorText(count)
{
	if (count === 1) return "вариант";
	else if (count === 2 || count === 3 || count === 4 || 
			 count % 10 === 2 && count > 20 ||
			 count % 10 === 3 && count > 20 ||
			 count % 10 === 4 && count > 20)
		return "варианта";
	else return "вариантов";
}

function hideObject(data)
{
	/*var cardBlocks = document.querySelectorAll('.card-block');

	cardBlocks.forEach(function(cardBlock) {
		var blockId = cardBlock.id;

		if (data.includes(blockId)) {
			cardBlock.style.display = 'block';
		} else {
			cardBlock.style.display = 'none';
		}
	});*/
	
	let index = data.indexOf('null');
	document.getElementById('anchor-card').innerHTML = data.substring(0, index);
}

const observerGalery = new MutationObserver(function() {
    visableGalery();
});

const cardElement = document.getElementById('anchor-card');

const observerConfigGalery = {
    subtree: true,
    childList: true,
};

observerGalery.observe(cardElement, observerConfigGalery);

function visableGalery()
{
	const card = document.getElementById('anchor-card');

	if (card)
	{
		const screenWidth = window.innerWidth;
        const desiredHeight = screenWidth < 768 ? '10em' : '20em';

		const galeryLoadsElements = card.querySelectorAll('.wds_loading');

		galeryLoadsElements.forEach(function(element) {
			element.style.display = 'none';
			const container = element.nextElementSibling;
			container.style.visibility = 'visible';
			const slide = container.firstElementChild;
			slide.style.height = desiredHeight;
		});
	}
}

function clearFilters()
{
	const inputElements = document.querySelectorAll('.select__input');

	inputElements.forEach(function(element) {
		element.value = '';
	});

	const headElements = document.querySelectorAll('.select__head');

	headElements.forEach(function(element) {
		element.textContent = '--';
	});

	getTextResultFilter(-1);
	hideObject([]);
	removeBtn();
}

function showFull(e)
{
	$(e).parent().find('.short-content').toggle();
	$(e).parent().find('.full-content').toggle();
	$(e).html($(e).html() == "Показать больше" ? "Скрыть" : "Показать больше")
}