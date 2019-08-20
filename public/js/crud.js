$(document).ready(function() {
    $('a[data-action="destroy"]').on('click', function(e) {
        e.preventDefault();
        if (confirm('Are you sure delete this record?')) {
            $('form#destroy-' + $(this).attr('data-id')).submit();
        }
    });
});