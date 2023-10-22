function expandCard(cardNumber) {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        if (index === cardNumber - 1) {
            card.classList.add('fullscreen');
            card.querySelector('.card-button').style.display = 'none';
            document.getElementById('reset-button').style.display = '';
            const contentElements = card.querySelectorAll('[class^="card-content"]');
            contentElements.forEach(element => {
                element.removeAttribute('hidden');
            });
        } else {
            card.style.display = 'none';
        }
    });
}

function resetCards() {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card) => {
        card.classList.remove('fullscreen');
        card.style.display = '';
        card.querySelector('.card-button').style.display = '';
        const contentElements = card.querySelectorAll('[class^="card-content"]');

        contentElements.forEach(element => {
            element.setAttribute('hidden', 'hidden');
        });
    });
    document.getElementById('reset-button').style.display = 'none';
}