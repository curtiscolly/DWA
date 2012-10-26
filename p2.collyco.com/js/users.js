'use strict';

$(document).ready(function () {
	var square_1 = $('.square-1');
	var square_2 = $('.square-2');
	var square_3 = $('.square-3');
	var square_4 = $('.square-4');

	var flag_1 = 1;
	var flag_2 = 1;
	var flag_3 = 1;
	var flag_4 = 1;

	var timer_1, timer_2, timer_3, timer_4;

	var bounce_1 = function () {
		timer_1 = setInterval(function () {
			if (flag_1 == 3) {
				flag_1 = -3;
			} else {
				flag_1 = 3;
			}
			square_1.animate({
				'top': "+=" + (flag_1 * 100)
			}, 30000);
		}, 300);
	};
	var bounce_2 = function () {
		timer_2 = setInterval(function () {
			if (flag_2 ==3) {
				flag_2 = -3;
			} else {
				flag_2 = 3;
			}
			square_2.animate({
				'top': "+=" + (flag_2 * 10)
			}, 3000);
		}, 300);
	};
	var bounce_3 = function () {
		timer_3 = setInterval(function () {
			if (flag_3 == 3) {
				flag_3 = -3;
			} else {
				flag_3 = 3;
			}
			square_3.animate({
				'left': "+=" + (flag_3 * 10)
			}, 30000);
		}, 300);
	};
	var bounce_4 = function () {
		timer_4 = setInterval(function () {
			if (flag_4 == 3) {
				flag_4 = -3;
			} else {
				flag_4 = 3;
			}
			square_4.animate({
				'left': "+=" + (flag_4 * 10)
			}, 30000);
		}, 300);
	};

	bounce_1();
	bounce_2();
	bounce_3();
	bounce_4();

	square_1.hover(function () {
		clearInterval(timer_1);
	}, function () {
		bounce_1();
	});
	square_2.hover(function () {
		clearInterval(timer_2);
	}, function () {
		bounce_2();
	});
	square_3.hover(function () {
		clearInterval(timer_3);
	}, function () {
		bounce_3();
	});
	square_4.hover(function () {
		clearInterval(timer_4);
	}, function () {
		bounce_4();
	});
});