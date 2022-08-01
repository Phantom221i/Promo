!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+371 #{7,14}",
                    cc: "LV",
                    cd: "Latvia",
                    desc_en: "",
                    name_ru: "Латвия",
                    desc_ru: ""
                }
            ]
        }
    })
});