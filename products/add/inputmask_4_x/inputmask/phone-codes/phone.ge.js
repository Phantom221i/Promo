!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+995 #{8,10}",
                    cc: "GE",
                    cd: "Georgia",
                    desc_en: "",
                    name_ru: "Грузия",
                    desc_ru: ""
                }
            ]
        }
    })
});