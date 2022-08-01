/*!
* phone-codes/phone.min.js
* https://github.com/RobinHerbots/Inputmask
* Copyright (c) 2010 - 2017 Robin Herbots
* Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
* Version: 4.0.0-52
*/

!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+33 #{7,14}"
                }
            ]
        }
    })
});