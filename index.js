const btn = document.getElementById('btn');

btn.addEventListener('click', () => {
    const form = document.getElementById('propForm');

    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
})
