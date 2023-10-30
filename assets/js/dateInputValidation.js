document.addEventListener('DOMContentLoaded', function() {
    const startDateInput = document.getElementById('startDate');
    const endDateInput = document.getElementById('endDate');


    endDateInput.disabled = true;

    const today = new Date().toISOString().split('T')[0];
    startDateInput.setAttribute('min', today);


    startDateInput.addEventListener('change', function() {
        if (startDateInput.value) {

            endDateInput.disabled = false;
            endDateInput.setAttribute('min', startDateInput.value);
        } else {

            endDateInput.disabled = true;
            endDateInput.value = '';
        }
    });
});