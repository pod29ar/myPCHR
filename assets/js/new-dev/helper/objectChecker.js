module.exports = function checkContainer(object) {
	"use strict";
	return (object instanceof jQuery && object.children().length > 0);
};