const hideShowEleDom = () => {
	if (showEleArr != null) {
		$.each(showEleArr, (i, d) => {
			d.fadeIn(800).removeClass("d-none").show();
		});
	}

	if (hideEleArr != null) {
		$.each(hideEleArr, (i, d) => {
			d.hide().addClass("d-none");
		});
	}
};

const basicHideShowEleDom = () => {
	if (showEleArr != null) {
		$.each(showEleArr, (i, d) => {
			d.removeClass("d-none").show();
		});
	}

	if (hideEleArr != null) {
		$.each(hideEleArr, (i, d) => {
			d.hide().addClass("d-none");
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

const categoryList = () => {};

const showItemsSelection = () => {};

const searchItemSelection = () => {};

const showCartItem = () => {};

function touchScroll(scrollableDiv) {
	let isScrolling = false;
	let startX, startY, scrollLeft, scrollTop;

	scrollableDiv.addEventListener("mousedown", (e) => {
		isScrolling = true;
		startX = e.pageX - scrollableDiv.offsetLeft;
		startY = e.pageY - scrollableDiv.offsetTop;
		scrollLeft = scrollableDiv.scrollLeft;
		scrollTop = scrollableDiv.scrollTop;

		scrollableDiv.style.cursor = "grabbing";
		e.preventDefault();
	});

	document.addEventListener("mousemove", (e) => {
		if (!isScrolling) return;
		const x = e.pageX - scrollableDiv.offsetLeft;
		const y = e.pageY - scrollableDiv.offsetTop;
		const deltaX = x - startX;
		const deltaY = y - startY;

		scrollableDiv.scrollLeft = scrollLeft - deltaX;
		scrollableDiv.scrollTop = scrollTop - deltaY;
	});

	document.addEventListener("mouseup", () => {
		isScrolling = false;
		scrollableDiv.style.cursor = "grab";
	});

	scrollableDiv.addEventListener("mouseleave", () => {
		isScrolling = false;
		scrollableDiv.style.cursor = "grab";
	});
}
