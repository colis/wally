"use strict";

const themeJSON = require("./theme.json");
const sass = require("node-sass");

module.exports = {
	"getFromJSON($key)": function(key) {
		key = key.getValue();
		const json = themeJSON;
		const sassVars = json[key];

		const map = new sass.types.Map(Object.keys(sassVars).length);

		Object.entries(sassVars).forEach(([colorName, colorHex], index) => {
			map.setKey(index, new sass.types.String(colorName));
			map.setValue(index, new sass.types.String(colorHex));
		});

		return map;
	}
};