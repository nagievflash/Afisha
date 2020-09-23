
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
      format: 'DD MMMM',
      monthNames: moment.months()
    },
    "alwaysShowCalendars": true,
    "showCustomRangeLabel": false,
    "minDate" : moment(),
    setEndDate: function(endDate) {
        console.log('fsdf')
        if (typeof endDate === 'string')
            this.endDate = moment(endDate, this.locale.format);

        if (typeof endDate === 'object')
            this.endDate = moment(endDate);

        if (!this.timePicker)
            this.endDate = this.endDate.endOf('day');

        if (this.timePicker && this.timePickerIncrement)
            this.endDate.minute(Math.round(this.endDate.minute() / this.timePickerIncrement) * this.timePickerIncrement);

        if (this.endDate.isBefore(this.startDate))
            this.endDate = this.startDate.clone();

        if (this.maxDate && this.endDate.isAfter(this.maxDate))
            this.endDate = this.maxDate.clone();

        if (this.maxSpan && this.startDate.clone().add(this.maxSpan).isBefore(this.endDate))
            this.endDate = this.startDate.clone().add(this.maxSpan);

        this.previousRightTime = this.endDate.clone();

        this.container.find('.drp-selected').html(this.startDate.format(this.locale.format) + this.locale.separator + this.endDate.format(this.locale.format));

        if (!this.isShowing)
            this.updateElement();

        this.updateMonthsInView();
    }

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
