// Clear input after an HTMX request
document.body.addEventListener('htmx:afterRequest', function() {
    document.getElementById('todo').value = '';
})