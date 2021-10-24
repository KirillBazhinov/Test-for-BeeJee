$('#sorting').on('change', function() {
	$(this.form).submit();
});
$('#page').on('change', function() {
	$(this.form).submit();
});
function show() {
	if($('#addForm').css('display') == 'none'){
		$('#addForm').fadeIn(1000);
	}else{
		$('#addForm').fadeOut(1000);
	}
}