module.exports = function baseUrl() {
	var url;
	if ( ! window.location.origin)
		window.location.origin = window.location.protocol + "//" + window.location.host;
	url = window.location.origin + '/';
	return url;
};