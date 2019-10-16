function tampilkan(halaman){
	$.ajax({
		//Alamat url harap disesuaikan dengan lokasi script pada komputer anda
		url	     : 'http://localhost/AdminLTE-2.4.18/pages/ajax/content.php',
		type     : 'POST',
		dataType : 'html',
		data     : 'content='+halaman,
		success  : function(jawaban){
			$('#content').html(jawaban);
		},
	})
}