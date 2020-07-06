


function isoWeekdayCalc() {
    isoWeekday = moment().isoWeekday();
    var a = [];
    if (isoWeekday < 6) {
        a = [moment().add((6 - isoWeekday), 'days'), moment().add((7 - isoWeekday), 'days')]
    }
    else if (isoWeekday == 6) {
        a = [moment(), moment().add(1, 'days')]
    }
    else {
        a = [moment(), moment()]
    }
    return a;
}

var daterangepicker = $('input[name="range"]').daterangepicker({
    "timePickerSeconds": true,
    "autoApply": false,
    "autoUpdateInput": true,
    ranges: {
        'Сегодня': [moment(), moment()],
        'Завтра': [moment().add(1, 'days'), moment().add(1, 'days')],
        'В выходные': isoWeekdayCalc(),
    },
    locale: {
      format: 'DD MMMM'
    },
    "alwaysShowCalendars": true,
    "showCustomRangeLabel": false,
    "minDate" : moment(),
}, function(start, end, label) {
    $('.drp-selected').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
    location.href = '/filter?from=' + start.format('YYYY-MM-DD') + '&to=' + end.format('YYYY-MM-DD');
});
$('input[name="range"]').on('apply.daterangepicker', function(ev, picker) {
      if (picker.startDate.format('MMMM') == picker.endDate.format('MMMM')) {
          if (picker.startDate.format('DD') != picker.endDate.format('DD')) {
              $(this).val(picker.startDate.format('DD') + ' - ' + picker.endDate.format('DD MMMM'));

          }
          else {
              $(this).val(picker.endDate.format('DD MMMM'));
          }
      }
      else {
          $(this).val(picker.startDate.format('DD MMMM') + ' - ' + picker.endDate.format('DD MMMM'));
      }
      $('.daterangepicker').hide();

});

$('input[name="range"]').on('show.daterangepicker', function(ev, picker) {
      $('.daterangepicker .drp-selected').click(function(){
          $('.applyBtn').click();
      });
});
