$('#display1').hide();

$("#submit").click((e) => {
    let query = $('#search').val();
    e.preventDefault();
    $.get(`https://restcountries.eu/rest/v2/name/${query}`)
    .done((response) => {
        $('#display1').show();
        let result = response[0];
        $('#errorMessage').empty();
        $('#display').show();
        $('#flag').attr('src', result['flag']);
        $('#name').text(result['name'])
        $('#capital').text('Capital: '+ result['capital'])
        $('#population').text('Population: '+ result['population'])
        $('#language').text('Language: '+ result['languages'][0].name)
        $('#timezone').text('Timezone: '+ result['timezones'][0])
            
        $('#latitude').text('Latitude: '+ result['latlng'][0])
        $('#longitude').text('Longitude: '+ result['latlng'][1])
        $('#currency').text('Currency: '+ result['currencies'][0].name)
        $('#callingcode').text('Area Code: '+ result['callingCodes'][0])
        
    })
    
    .fail(() => {
         $('#errorMessage').text('Country Not Found');
         $('#display1').hide();
         $('#display2').hide();
         $('h2').hide();
    })
    
})