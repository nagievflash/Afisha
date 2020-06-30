var today = new Date();

var daterangepicker = $('input[name="range"]').daterangepicker({
    "timePickerSeconds": true,
    "autoApply": false,
    ranges: {
        'Сегодня': [moment(), moment()],
        'Завтра': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'На это неделе': [moment().subtract(6, 'days'), moment()],
        'В этом месяце': [moment().startOf('month'), moment().endOf('month')],
    },
    locale: {
        'customRangeLabel' : 'Выбрать дату'
    },
    "alwaysShowCalendars": true,
    "showCustomRangeLabel": false,
    "minDate" : today,
}, function(start, end, label) {
  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});
$('input[name="range"]').val('')
