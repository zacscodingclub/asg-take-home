$(document).ready(function () {
    $.ajax({
        'url': '/service.php',
        'dataType': 'json',
    }).done(function (response) {
        $('#team-name').html(response.data.team_city + " " + response.data.team_name);
        $.each(response.data.categories, function (k, v) {
            $('.arrest-body').append(
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
