const container = document.getElementById('starRating');
const input = document.getElementById('ratingInput');
let currentRating = +document.getElementById('ratingInput').value || 0;

container.addEventListener('mouseleave', () => {
    document.querySelectorAll('.star-half-wrap').forEach(s => {
        s.classList.toggle('lit', +s.dataset.value <= currentRating);
    });
});

container.addEventListener('mouseover', e => {
    const star = e.target.closest('.star-half-wrap');
    if (!star) return;
    const v = +star.dataset.value;
    document.querySelectorAll('.star-half-wrap').forEach(s => {
        s.classList.toggle('lit', +s.dataset.value <= v);
    });
});

container.addEventListener('click', e => {
    const star = e.target.closest('.star-half-wrap');
    if (!star) return;
    currentRating = +star.dataset.value;
    input.value = currentRating;
    console.log('Clicked, rating set to:', currentRating);
});