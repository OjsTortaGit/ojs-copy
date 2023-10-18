const hideShowEleDom = () => {
	if (showEleArr != null) {
		$.each(showEleArr, (i, d) => {
			$(d).fadeIn(800).removeClass("d-none").show();
		});
	}

	if (hideEleArr != null) {
		$.each(hideEleArr, (i, d) => {
			$(d).hide().addClass("d-none");
		});
	}
};

const basicHideShowEleDom = (showEleArr, hideEleArr) => {
	if (showEleArr != null) {
		$.each(showEleArr, (i, d) => {
			$(d).removeClass("d-none").show();
		});
	}

	if (hideEleArr != null) {
		$.each(hideEleArr, (i, d) => {
			$(d).hide().addClass("d-none");
		});
	}
};
// refresh table data everytime new data is added on the table
function dtDestroy(table, tbody) {
	$("#" + table)
		.DataTable()
		.destroy();
	$("#" + tbody).empty();
}
// mustache function
const renderTemp = (container, template, data) => {
	const $container = container;
	const $template = template.html();

	$container.append(Mustache.render($template, data));
};
// call the basic overlay modal
const globalmodal = (title, modalname) => {
	modalname.modal("show");
	modalname.find(".modaltitle").text(title);
};
const dom_showtoast = (data) => {
	$("#toastform1").toast("show");
	$("#toastform1").empty();
	renderTemp($("#toastform1"), $("#toastTemp"), data);
};

const fadedmodal = (title, modalname) => {
	// show modal the fade out
	modalname.modal("show");
	modalname.find(".modaltitle").text(title);

	// Hide the modal using fadeOut after 5 seconds
	setTimeout(function () {
		$("#myModal").modal("hide");
	}, 2000);
};

function showToast(message, type = "info") {
	const toastContainer = $("#toast-container");
	const toast = $('<div class="toast"></div>');

	// Add the appropriate class based on the type
	toast.addClass(`toast-${type}`);

	// Set the message content
	toast.text(message);

	// Append the toast to the container
	toastContainer.append(toast);

	// Automatically close the toast after a few seconds
	setTimeout(function () {
		toast.fadeOut(300, function () {
			$(this).remove();
		});
	}, 3000); // 3000 milliseconds (3 seconds) in this example
}

function scrollDiv(scrollableDiv) {
	// const scrollableDiv = document.getElementsByClassName("scrollable");
	let isDragging = false;
	let startY = 0;
	let scrollTop = 0;

	scrollableDiv.addEventListener("mousedown", (e) => {
		isDragging = true;
		startY = e.clientY;
		scrollTop = scrollableDiv.scrollTop;
	});

	scrollableDiv.addEventListener("mousemove", (e) => {
		if (!isDragging) return;

		const deltaY = e.clientY - startY;
		scrollableDiv.scrollTop = scrollTop - deltaY;
	});

	document.addEventListener("mouseup", () => {
		isDragging = false;
	});

	scrollableDiv.addEventListener("touchstart", (e) => {
		isDragging = true;
		startY = e.touches[0].clientY;
		scrollTop = scrollableDiv.scrollTop;
	});

	scrollableDiv.addEventListener("touchmove", (e) => {
		if (!isDragging) return;

		const deltaY = e.touches[0].clientY - startY;
		scrollableDiv.scrollTop = scrollTop - deltaY;
	});

	document.addEventListener("touchend", () => {
		isDragging = false;
	});
}
