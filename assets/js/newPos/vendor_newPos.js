// define main functions, call back functions and fetch function here

// ********************** reusable functions **********************
const asyncgetVendor = (url, callback, errcallback) => {
	$.get(url)
		.done((response) => callback(response))
		.fail((error) => errcallback(error));
};

const asyncGetVendor = (url, data, callback, errCallback) => {
	$.get(url, data)
		// .done((response) => callback(JSON.parse(response)))
		.done((response) => callback(response))
		.fail((error) => errCallback(error));
};

const asyncPostVendor = (url, data, callback, errCallback) => {
	$.post(url, data)
		.done((response) => callback(response)) // No need to parse JSON here as it's handled automatically
		.fail((error) => errCallback(error));
};

const getPromise = (url) => {
	return new Promise((resolve, reject) => {
		// const encodedUrl = encodeURIComponent(url);
		$.ajax({
			url: url,
			dataType: "json",
			contentType: "application/json",
			success: function (response) {
				resolve(response);
			},
			error: function (xhr, textStatus, errorThrown) {
				reject(xhr.responseText);
			},
		});
	});
};
const postDataVendor = (data, url) => {
	return new Promise((resolve, reject) => {
		$.ajax({
			url: url,
			method: "POST",
			type: "POST",
			contentType: "application/json",
			timeout: 0,
			data: data,
			success: function (response) {
				resolve(response.message);
			},
			error: function (xhr, status, error) {
				console.log("error:", error);
				console.log("status:", status);
				console.log("xhr:", xhr);
				reject(error);
			},
		});
	});
};
const putDataVendor = (data, url) => {
	return new Promise((resolve, reject) => {
		$.ajax({
			url: url,
			method: "PUT",
			type: "PUT",
			contentType: "application/json",
			timeout: 0,
			// data: JSON.stringify(data),
			data: data,
			success: function (response) {
				resolve(response);
			},
			error: function (xhr, status, error) {
				console.log("error:", error);
				console.log("status:", status);
				console.log("xhr:", xhr);
				reject(error);
			},
		});
	});
};
const deleteDataVendor = (data, url) => {
	return new Promise((resolve, reject) => {
		$.ajax({
			url: url,
			method: "DELETE",
			type: "DELETE",
			contentType: "application/json",
			data: JSON.stringify(data),
			success: function (response) {
				resolve(response.message);
			},
			error: function (xhr, status, error) {
				reject(error);
			},
		});
	});
};
const ajaxpostImgVendor = (data, url) => {
	return new Promise((resolve, reject) => {
		$.ajax({
			url: url,
			method: "POST",
			processData: false,
			mimeType: "multipart/form-data",
			contentType: false,
			data: data,
			success: function (response) {
				resolve(response);
			},
			error: function (xhr, status, error) {
				console.log("error:", error);
				console.log("status:", status);
				console.log("xhr:", xhr);
				reject(error);
			},
		});
	});
};
