const input = document.getElementById('progress-input');

input.addEventListener('input', function() {
    const value = input.value;
    const progressBar = document.querySelector('.progress-bar');
    progressBar.style.width = value + '%';
});