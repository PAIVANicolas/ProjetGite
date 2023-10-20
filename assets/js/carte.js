function expandCard(cardNumber) {
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, index) => {
        if (index === cardNumber - 1) {
            card.classList.add('fullscreen');
            card.querySelector('.card-button').style.display = 'none';
            document.getElementById('reset-button').style.display = '';
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
    });
    document.getElementById('reset-button').style.display = 'none';
}