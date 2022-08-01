!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+998 #{7,14}",
                    cc: "UZ",
                    cd: "Uzbekistan",
                    desc_en: "",
                    name_ru: "Узбекистан",
                    desc_ru: ""
                }
            ]
        }
    })
});