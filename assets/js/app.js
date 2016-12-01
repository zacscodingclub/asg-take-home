$(document).ready(function () {
    $.ajax({
        'url': '/service.php',
        'dataType': 'json',
    }).done(function (response) {
        $('#team-name').html(response.data.teamCity + " " + response.data.teamName);
        $.each(response.data.categories, function (k, v) {
            $('#arrest-body').append(
                '<tr>' +
                    '<td>' + v.Category + '</td>' +
                    '<td>' + v.arrest_count + '</td>' +
                '</tr>'
            );
        });
        $('.loading').addClass('hide');
        $('.body-content').removeClass('hide');
    });
});
