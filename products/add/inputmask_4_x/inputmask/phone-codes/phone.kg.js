!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+996 #########",
                    cc: "KG",
                    cd: "Kyrgyzstan",
                    desc_en: "",
                    name_ru: "Киргизия",
                    desc_ru: ""
                }
            ]
        }
    })
});