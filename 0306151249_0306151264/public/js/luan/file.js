// $('.upload-modal').fadeOut('fast');
$(document).ready(function() {

	var serverFileSizeLimit = 15; // MB
	var googleDriveFileSizeLimit = 100; // MB


	var lastSegment = location.href.match(/([^\/]*)\/*$/)[1];
	$('.last-segment').val(lastSegment);

	// alert(link_host);

	$('a.prevent-reload').click(function(e) {
		e.preventDefault();
		if($(this).attr('href') != document.URL) {
			window.location.href = $(this).attr('href');
		}
	});
	
	$('select').prop('selectedIndex', '0');
	$('.quickadd-box .--file').val('');

	$('.item-action span i.fa').click(function() {
		$(this).next().fadeToggle('fast');
	});


	// Sắp xếp thời gian tệp

	$('select[name=sort]').change(function() {

		// console.log($('#aaa'));
		// console.log($('#bbb'));
		// var dir = $(this).val();

		// // $('#aaa').insertBefore($('#bbb'));
		// return;
		

		// var dateContainer = $('.item-date-created')['length'];
		var dateContainer;
		var dateLsit;
		var dir = $(this).val(); // tùy vào lấy trong cơ sở dữ liệu ra orderby gì. asc (cũ nhất), desc (mới nhất)
		var shouldSort;
		var sort = true;
		var count = 0;
		console.log("dir: "+dir);
		// $(dateContainer[1]).parent().insertBefore($(dateContainer[0]).parent());


		// console.log($(dateContainer));return;
		// dateContainer.each(function(i, dateList) {
		// 	// console.log($(dateList).attr('data-date'));
		// 	// var d = new Date($(dateContainer[i]).attr('data-date'));
		// 	// console.log(d.getTime());
		// 	// console.log(dateList); return false;

		// 	console.log($(dateContainer[i]).parent());

		// });

		// return;

		while(sort) {

			sort = false;
			// console.log($(dateContainer));

			var index;
			dateContainer = $('.item-date-created');

			// Vòng lặp
			dateContainer.each(function(i, dateList) {
				// console.log($(dateList).attr('data-date'));

				index = i;
				shouldSort = false;
				d1 = new Date($(dateContainer[i]).attr('data-date'));
      	d2 = new Date($(dateContainer[i+1]).attr('data-date'));

      	if(dir == "asc") {
      		if (d1.getTime() > d2.getTime()) {
	          /*if next item is alphabetically lower than current item,
	          mark as a switch and break the loop:*/
	          shouldSort = true;
	          return false;
		      }
      	} 
      	else if(dir == "desc") {
      		if (d1.getTime() < d2.getTime()) {
	          shouldSort = true;
	          return false;
	        }
      	}

			});

			if(shouldSort) {

				$(dateContainer[index+1]).parent().insertBefore($(dateContainer[index]).parent());
				sort = true;
				count ++;
			}

		}

	});


	// upload  js


	$('input#upload-modal-files').val('');
	$('.open-upload-modal').click(function() {
		$('.upload-modal').fadeIn('fast');
	});
	$('.cancel-upload').click(function() {
		$('.upload-modal').fadeOut('fast');
	});


	// Xóa tất cả danh sách tệp trước khi upload và xáo val của input type = file 
	$('.remove-all').click(function() {
		$('#upload-list').html('');
		$('#upload-modal-files').val('');

	});

	function showItemBeforeUpload(fileName, fileSize, unit, err) {
		var icon = $("<i class='fa fa-check upload-successs'></i>");
		if(err) {
			icon = "<i class='fa fa-times upload-error' title='"+err+"'></i>";
		}
		var li = $("<li class='upload-item'></li>");
		var itemName = $("<div class='item-name'></div>").text(fileName+ " - "+fileSize+" "+unit);

		var itemMessage = $("<div class='item-message'></div>").append(icon);

		li.append(itemName).append(itemMessage);
		$('#upload-list').append(li);
		// console.log(li);

	}

	formData = new FormData();
	var x = $('<p></p>');
	$('input#upload-modal-files').change(function(event) {
		// alert(this.val());
		
		// alert(1048576/1024/1024);
		
		// console.log(unit[0]);

		// return;

		// Xóa trắng danh sách cũ để thêm danh sách mới
		$('#upload-list').html('');
		

		var i = 0, totalFiles = $(this)[0].files.length, file;
		// alert(totalFiles);

		for (; i < totalFiles; i++) {
			
			file = $(this)[0].files[i];
			err = false;
			// console.log(file);
			limit = serverFileSizeLimit; //15MB
			fileSize = file.size;
			unit = "MB";

			if(fileSize > limit*1024*1024) {
				err = "Vuot qua dung luong "+limit+" MB";
			}

			if(Math.round(fileSize/1024/1024) < 1) {
				fileSize = Math.round(fileSize/1024);
				unit = "KB";
			} else {
				fileSize = Math.round(fileSize/1024/1024);
			}

			showItemBeforeUpload(file.name, fileSize, unit, err);

		}

	});

	
	


	

	// END upload js



	// Action on file (delete, change name, ...)


	// Tắt thông báo : 


	$('.file-message .file-message-close').click(function() {
		$(this).parent().fadeOut('fast');
	});


	// *** Download

	$('.action >ul > li.download').click(function() {
		var a = $(this).parents('li.item').find('a.item-link:first');
		$(a).attr('download', a.html());
		a[0].click();
		$(a).removeAttr('download');

	});



	// Delete
	$('.action >ul > li.delete').click(function() {
		if(!confirm("Bạn muốn xóa tệp này. Xin lưu ý tệp đã xóa không thể khôi phục.")) {
			return;
		}

		var item = $(this);

		var fileID = $(this).parent().attr('data-id');
		var username = $('.sidebar .--title').attr('data-username');
		
		$.ajax({
			url: link_host+"/taikhoan/"+username+"/tep/"+fileID+"/xoa",
			type: 'GET',
			beforeSend: function() {
        item.parents('li.item').children('div').css('display', 'none');
				item.parents('li.item').children('img').css('display', 'block');

      },
      success: function() {
        item.parents('li.item').css('display', 'none');
      }
		})
		.done(function(response) {
			// console.log(response);
			if(response.message) {
				$('.file-message > p').html(response.message);
				$('.file-message').css('display', 'block');
			}
		});


	});

	

	//  Cập nhật chế độ (công khai hoặc riêng tư)
	
	$('.public-or-private').click(function() {
		var fileID = $(this).parent().attr('data-id');
		var username = $('.sidebar .--title').attr('data-username');
		var item = $(this);
		var kind = 'chedo'

		$.ajax({
			url: link_host+'/taikhoan/'+username+'/tep/'+fileID+'/capnhat/'+kind,
			type: 'GET',
			beforeSend: function() {
        item.parents('li.item').children('div').css('display', 'none');
				item.parents('li.item').children('img').css('display', 'block');

      },
      success: function(response) {
      	if(lastSegment != "tep" && lastSegment != "tatca") {
	        item.parents('li.item').css('display', 'none');
	      } else {
	      	item.parents('li.item').children('div').css('display', 'block');
					item.parents('li.item').children('img').css('display', 'none');

					if(response.modeid) {
						item.parents('li.item').find('i.fa-lock').css('display', 'none');
						item.html('Đặt chế độ riêng tư');

			    } else {
			    	item.parents('li.item').find('a.item-link').before('<i class="fa fa-lock"></i> ');
			    	item.html('Đặt chế độ công khai');
			    }
	      }
      }
		})
		.done(function(response) {
			// console.log("success");
			// console.log(response);
			if(response.message) {
				$('.file-message > p').html(response.message);
				$('.file-message').css('display', 'block');
			}
		});
		

	});


	// Cập nhật tên:
	$('.close-change-name-modal').click(function() {
		$('.change-name-modal').fadeOut('fast');
	});
	
	$('.change-name').click(function() {
		
		var fileID = $(this).parent().attr('data-id');
		var username = $('.sidebar .--title').attr('data-username');
		// var item = $(this);
		var kind = 'doiten';

		$('#change-name-form').attr('action', link_host+'/taikhoan/'+username+'/tep/'+fileID+'/capnhat/doiten');


		$('.change-name-modal').fadeIn('fast');
	});




	// End Action on file


	// Google Drive

	$('.googledrive .register-box .--button').click(function(e) {
		e.preventDefault();
		if(confirm('Chúng tôi sẽ cung cấp cho bạn một nơi để lưu trữ dữ liệu (không giới hạn), nhưng chúng tôi có quyền kiểm soát những tệp tin mà bạn tải lên ấy. Để đảm bảo không vi phạm chính sách của chúng tôi và bên thứ 3')) {
			window.location.href= link_host+"/googledrive/dangki/dichvu";
		}
	});

	$('.googledrive .delete-box .--button').click(function(e) {
		e.preventDefault();
		if(confirm('Bạn muốn hủy bỏ dịch vụ này ? Dữ liệu sẽ không khôi phục lại được.')) {
			window.location.href= link_host+"/googledrive/huy/dichvu";
		}
	});

	// $('.quickadd-box .--file').change(function() {
	// 	console.log($(this));
	// });

	$('.quickadd-box .--button').click(function(event) {
		event.preventDefault();
		if($('.quickadd-box input[name=file]').val() == "") {
			return;
		}
		$file = $('.quickadd-box input[name=file]')[0].files[0];
		// console.log($file); return;
		if($file.size/1024/1024 <= googleDriveFileSizeLimit) {
			$(this).parent().submit();
		} else {
			alert('Kích thước tệp vượt quá '+googleDriveFileSizeLimit+' MB');
		}
	});


	// END Google Drive



});