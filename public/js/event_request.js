$(document).ready(function() {
    $('form#event_request').on('submit', function(e) {
        $('#event_request_submit span[role="status"]').show();
        $('#event_request_submit span.label').text('Sending...');
        e.preventDefault();
        $.ajax({
            url:     $(this).attr('action'), //url страницы (action_ajax_form.php)
            type:     "POST", //метод отправки
            dataType: "json", //формат данных
            data: $(this).serialize(),  // Сеарилизуем объект
            success: function(response) { //Данные отправлены успешно
                $result = $('#result');
                switch(response.type) {
                    case 'success':
                        $result.attr('class', 'alert alert-success');
                        break;
                    default:
                        $result.attr('class', 'alert alert-primary');
                        break;
                }
                $result.text(response.msg);
            },
            error: function(response) { // Данные не отправлены
                $('#result').attr('class', 'alert alert-danger').text('Something went wrong');
            },
            complete: function(response) {
                $('#event_request_submit span[role="status"]').hide();
                $('#event_request_submit span.label').text('Submit');
            }
        });
    });
});
