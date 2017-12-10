$(document).ready(function(){
	$("#insertKhohang").click(function(){
		$("#khohang").append('<div class="col-md-12 form-group linekho" style="margin-bottom: 10px"><div class="col-md-3"><span>Kích cỡ </span><input type="text" class="form-control" name="sizeProduct[]" placeholder="Kích cỡ"></div><div class="col-md-3"><span>Số Lượng </span><input type="number" class="form-control" name="quantityProduct[]" placeholder="Số lượng"></div><div class="col-md-3"><span>Màu Sắc </span><input type="number" class="form-control" name="colorProduct[]" placeholder="Màu sắc"></div><a class="remove">Xóa dòng</a></div>');
	});
	$("remove").click(function(){
		$(this).closest("div.linekho").remove();
	});
});
	