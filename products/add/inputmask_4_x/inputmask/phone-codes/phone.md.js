!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+373 #{7,9}",
                    cc: "MD",
                    cd: "Moldavia",
                    desc_en: "",
                    name_ru: "Молдавия",
                    desc_ru: ""
                }
            ]
        }
    })
});