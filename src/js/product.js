import intlTelInput from 'intl-tel-input';
import * as utils from "intl-tel-input/build/js/utils";
import {exist} from "./additional";
import $ from "jquery";

async function loadProduct(id) {
    let data = {}
    const response = await fetch('./src/js/products.json');
    const res = await response.json();
    let products = res.products
    products.forEach(el => {
        if(el.id == id) {
            data = {
                _id: el.id,
                name: el.name,
                price: el.price,
                product_id: el.product_id,
                special_price: el.special_price,
                traffic_flowid: el.traffic_flowid
            }
        }
    })
    return data
}

if(exist('#productModal')) {
    const productModal = document.getElementById('productModal')
    productModal.addEventListener('show.bs.modal', event => {
        const button = event.relatedTarget
        const recipient = button.getAttribute('data-bs-whatever')
        const product_id = button.getAttribute('product-id')

        const modalTitle = productModal.querySelector('.modal-title')
        const modalimg = productModal.querySelector('.modal-body img')

        modalTitle.textContent = `${recipient}`
        modalTitle.style.textTransform = 'uppercase'
        modalimg.setAttribute('src', './src/img/products/' + recipient + '.png')

        let special_price = productModal.querySelector('input[name=special_price]'),
            product_omni_id = productModal.querySelector('input[name=product_id]'),
            flow = productModal.querySelector('input[name=flow]'),
            price = productModal.querySelector('input[name=price]'),
            product_name = productModal.querySelector('input[name=product_name]');

            async function setFieldvalue() {
                let product_data = await loadProduct(product_id)
                special_price.value = product_data.special_price
                product_omni_id.value = product_data.product_id
                flow.value = product_data.traffic_flowid
                price.value = product_data.price
                product_name.value = product_data.name
        }
        setFieldvalue()
    })
}



if(exist('form input[type=tel]')) {
    const phone_fields = document.querySelectorAll("form input[type=tel]");
    phone_fields.forEach(input => {
        input.style.width = '100% !important'
        intlTelInput(input, {
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            initialCountry: "auto",
            utilsScript: utils,
        });
    })
}

