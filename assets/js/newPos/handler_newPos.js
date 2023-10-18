/*
    handlerJS collect the functions that relates to the eventlistener
*/
*/

// default handler loaded the functions for displaying initial data

function categoryHandler() {
	const categoryUrl = `${baseurl}clientPos/fetchCategoryList`;
	asyncgetVendor(categoryUrl, cb_categoryListVedor, errCallback);
}

function handler_selectedCate(element) {
	const itemUrl = `${baseurl}clientPos/fetchCategoryItems`;
	const category = $(element).data("id");
	asyncPostVendor(
		itemUrl,
		{ category: category },
		cb_itemListVendor,
		errCallback
	);
}
