categoryHandler();
// $(function () {
// 	var startY, startScrollTop;

// 	$(".scrollable")
// 		.on("touchstart", function (e) {
// 			startY = e.originalEvent.touches[0].pageY;
// 			startScrollTop = $(this).scrollTop();
// 		})
// 		.on("touchmove", function (e) {
// 			var currentY = e.originalEvent.touches[0].pageY;
// 			var distance = startY - currentY;
// 			$(this).scrollTop(startScrollTop + distance);
// 		});
// });
const itemCont = document.getElementById("itemCont");
scrollDiv(itemCont);

const cartCont = document.getElementById("cartCont");
scrollDiv(cartCont);
