/**
 * A collection of extension for the native JavaScript
 * extended using the prototype
 */

String.prototype.ucfirst = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
};

String.prototype.ucwords = function () {
	var words = this.split(' ');
	for (var i = 0; i < words.length; i++)
		words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
	return words.join(' ');
};

module.exports = function () {
	// 
};