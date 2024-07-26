const tags = document.querySelectorAll('.tag');

tags.forEach(tag => {
	let phaseY = Math.random() * 2 * Math.PI;
	let phaseX = Math.random() * 2 * Math.PI;

	tag.addEventListener('mouseover', () => {
		phaseY += Math.PI; // Shift the phase to create an "escaping" effect
		phaseX += Math.PI;
	});

	tag.addEventListener('mouseout', () => {
		phaseY -= Math.PI; // Reset the phase back to original
		phaseX -= Math.PI;
	});

	let offsetYY = 20;
	let offsetXX = 10;
	if (tag.id === 'children')
	{
		offsetYY = 5;
		offsetXX = 50;
	}
	
	setInterval(() => {
		const offsetY = offsetYY * Math.sin(phaseY);
		const offsetX = offsetXX * Math.cos(phaseX);
		tag.style.transform = `translateY(${offsetY}px) translateX(${offsetX}px)`;
		phaseY += 0.1;
		phaseX += 0.05;
	}, 50);
});

const numberElements = document.querySelectorAll('[id^="number"]');
const targetNumbers = Array.from(numberElements, (el) => parseInt(el.textContent));
const maxCount = Math.max(...targetNumbers);

let currentNumbers = new Array(targetNumbers.length).fill(1);

const observer = new IntersectionObserver((entries, observer) => {
	entries.forEach(entry => {
		if (entry.isIntersecting) {
			const targetIndex = Array.from(numberElements).indexOf(entry.target);
			const targetNumber = targetNumbers[targetIndex];

			const interval = setInterval(() => {
				if (currentNumbers[targetIndex] <= targetNumber) {
					entry.target.textContent = currentNumbers[targetIndex];
					currentNumbers[targetIndex]++;
				} else {
					clearInterval(interval);
				}
			}, 200);

			observer.unobserve(entry.target);
		}
	});
});

numberElements.forEach(element => {
	observer.observe(element);
});