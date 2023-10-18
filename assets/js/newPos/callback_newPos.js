// ***************************** end *********************************
const errCallback = (error) => {
	$("#modalContainer").empty();
	renderTemp($("#modalContainer"), $("#notificationTemp"), {
		message: error,
	});
};

const cb_categoryListVedor = (response) => {
	const { success, data, error } = response;
	const template = $("#categoryTemplate");
	const container = $("#categoryContainer");
	data.forEach((d) => {
		const newData = { name: d.categoryName, id: d.categoryId };
		renderTemp(container, template, newData);
	});
};

const cb_itemListVendor = (response) => {
	const { success, data, error } = response;
	$("#itemCont").empty();
	data.forEach((d) => {
		const newData = { prodID: d.stock_id, prodName: d.stock_name };
		renderTemp($("#itemCont"), $("#itemTemp"), newData);
	});
};
