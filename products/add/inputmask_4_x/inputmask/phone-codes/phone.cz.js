!function (c) {
    "function" == typeof define && define.amd ? define(["../inputmask"], c) : "object" == typeof exports ? module.exports = c(require("../inputmask")) : c(window.Inputmask)
}(function (c) {
    return c.extendAliases({
        ourphone: {
            alias: "abstractphone",
            phoneCodes: [
                {
                    mask: "+420 #{7,14}",
                    cc: "CZ",
                    cd: "Czech",
                    desc_en: "",
                    name_ru: "Чехия",
                    desc_ru: ""
                }
            ]
        }
    })
});