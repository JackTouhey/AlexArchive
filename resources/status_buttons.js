const finishedButton = document.getElementById('finishedButton');
const inProgressButton = document.getElementById('inProgressButton');
const DNFButton = document.getElementById('DNFButton');
const statusInput = document.getElementById('statusInput');

const finishedId = 1;
const inProgressId = 2;
const DNFId = 3;


finishedButton.addEventListener("click", e => {
    statusInput.value = finishedId;
    document.querySelectorAll('.status-button').forEach(statusButton => {
        if (statusInput.value == statusButton.dataset.value) {
            statusButton.classList.remove('btn-secondary');
            statusButton.classList.add('btn-primary');
        } else {
            statusButton.classList.remove('btn-primary');
            statusButton.classList.add('btn-secondary');
        };
    });
    console.log('Status updated to:', statusInput.value);
});

inProgressButton.addEventListener("click", e => {
    statusInput.value = inProgressId;
    document.querySelectorAll('.status-button').forEach(statusButton => {
        if (statusInput.value == statusButton.dataset.value) {
            statusButton.classList.remove('btn-secondary');
            statusButton.classList.add('btn-primary');
        } else {
            statusButton.classList.remove('btn-primary');
            statusButton.classList.add('btn-secondary');
        };
    });
    console.log('Status updated to:', statusInput.value);
});

DNFButton.addEventListener("click", e => {
    statusInput.value = DNFId;
    document.querySelectorAll('.status-button').forEach(statusButton => {
        if (statusInput.value == statusButton.dataset.value) {
            statusButton.classList.remove('btn-secondary');
            statusButton.classList.add('btn-primary');
        } else {
            statusButton.classList.remove('btn-primary');
            statusButton.classList.add('btn-secondary');
        };
    });
    console.log('Status updated to:', statusInput.value);
});