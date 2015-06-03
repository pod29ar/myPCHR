var value = require('./defaultValue.js');

module.exports = function keyChecker(json, keys, array) {
	"use strict";
	var splitKey, testArray, test, x;
	var newArray = [];
	var newKey   = [];
	json  = value(json, '');
	keys  = value(keys, []);
	array = value(array, []);

	splitKey  = (keys !== '' && typeof keys === 'string') ? splitKey = keys.split('.') : splitKey = keys;
	testArray = (array.length > 0) ? array : splitKey;
	test = testArray[1];

	if (json.hasOwnProperty(test) && ! $.isEmptyObject(json[test])) {
		if (testArray.length === 2) {
			return true;
		} else {
			for (x = 1; x < testArray.length; x++) {
				newKey.push(splitKey[x]);
				newArray.push(testArray[x]);
			}
			return keyChecker(json[test], newKey, newArray);
		}
	} else {
		return false;
	}
};