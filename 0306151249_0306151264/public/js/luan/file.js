$(document).ready(function() {
	
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
		var b;
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


		/*
		*
		*/

		







	});

});