$(document).ready(function () {
    var team = new Object();

    getTopTeam(team)
});

function getTopTeam(team) {
    $.ajax({
        'url': 'http://nflarrest.com/api/v1/team?limit=1',
        'dataType': 'json'
    }).done(function(response) {
        team.teamId   = response[0].Team
        team.teamCity = response[0].Team_city
        team.teamName = response[0].Team_name
        getTeamCrimes(team)
    }).fail(handleError)
}

function getTeamCrimes(team) {
    $.ajax({
        'url': 'http://nflarrest.com/api/v1/team/topCrimes/' + team.teamId,
        'dataType': 'json'
    }).done(function(response) {
        team.crimes = response;
        presentData(team);
    }).fail(handleError)
}

function presentData(team) {
    $('#team-name').html(team.teamCity + " " + team.teamName);
    $.each(team.crimes, function (k, v) {
        $('#arrest-body').append(
            '<tr>' +
                '<td>' + v.Category + '</td>' +
                '<td>' + v.arrest_count + '</td>' +
            '</tr>'
        );
    });
    $('.loading').addClass('hide');
    $('.body-content').removeClass('hide');
}

function handleError(jqXHR, textStatus, errorThrown) {
    console.log(textStatus + " Error: " + errorThrown)
}
