var button = document.getElementById('open');
var close = document.getElementById('close');
var modal = document.getElementById('modal');

    button.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'block';
    });

    close.addEventListener('click', function(event) {
        event.preventDefault();
        modal.style.display = 'none';
    });