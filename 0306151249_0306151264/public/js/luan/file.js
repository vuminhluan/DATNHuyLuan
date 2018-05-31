// $('.upload-modal').fadeOut('fast');
$(document).ready(function() {

	// alert(link_host);

	
	$('select').prop('selectedIndex', '0');

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


	// upload file js


	$('input#upload-modal-files').val('');
	$('.open-upload-modal').click(function() {
		$('.upload-modal').fadeIn('fast');
	});
	$('.cancel-upload').click(function() {
		$('.upload-modal').fadeOut('fast');
	});

	function showItemBeforeUplaod(fileName, fileSize, unit, err) {
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
		

		var i = 0, totalFiles = $(this)[0].files.length, file;
		// alert(totalFiles);

		for (; i < totalFiles; i++) {
			
			file = $(this)[0].files[i];
			err = false;
			// console.log(file);
			limit = 26000;
			fileSize = file.size;
			unit = "MB";

			if(fileSize > limit) {
				err = "Vuot qua dung luong "+limit+" bytes";
			}

			if(Math.round(fileSize/1024/1024) < 1) {
				fileSize = Math.round(fileSize/1024);
				unit = "KB";
			} else {
				fileSize = Math.round(fileSize/1024/1024);
			}

			showItemBeforeUplaod(file.name, fileSize, unit, err);

		}

	});

	
	


	

	// END upload file js



});