!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+370 #{7,14}",
                    cc: "LT",
                    cd: "Lithuania",
                    desc_en: "",
                    name_ru: "Литва",
                    desc_ru: ""
                }
            ]
        }
    })
});