$(document).ready(function(){
	$("#addKhohang").click(function(){
		$("#khohang").append('<div class="col-md-12 form-group linekhohang" style="margin-bottom: 10px"><div class="col-md-3"><span>Kích cỡ </span><input type="text" class="form-control" name="sizeProduct[]" placeholder="Kích cỡ" required autofocus></div><div class="col-md-3"><span>Số Lượng </span><input type="number" class="form-control" name="quantityProduct[]" placeholder="Số lượng" required autofocus></div><div class="col-md-3"><span>Màu Sắc </span><input type="text" class="form-control" name="colorProduct[]" placeholder="Màu sắc" required autofocus></div><!--<a id="removeKhohang">Xóa dòng</a>--></div>');
	});
});