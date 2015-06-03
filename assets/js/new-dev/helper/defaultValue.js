module.exports = function (variable, value) {
	"use strict";
	return typeof variable !== 'undefined' ? variable : value;
};
