
    $('#input1').change(function() {
        var $this = $(this),
            value = $this.val();
        alert(value);
    });
$('#textbox1').change(function () {
    var $this = $(this),
        value = $this.val();
    alert(value);
});
$('[data-name="disable-button"]').click(function() {
    $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', true);
});
$('[data-name="enable-button"]').click(function () {
    $('[data-mddatetimepicker="true"][data-targetselector="#input1"]').MdPersianDateTimePicker('disable', false);
});
