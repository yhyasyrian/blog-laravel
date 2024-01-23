/**
 * I create this file for fix bugs tw-elements@1.1.0
*/
addEventListener('load',() => { // after create element by tw-element
    let direction = document.querySelector('html').getAttribute('dir'); // check if the page is arabic
    if (direction === "rtl") {
        let convertInputsToRight = document.querySelectorAll('[data-te-input-notch-ref]'); // get all div that have border but isn't response in arabic
        // Fix border and box-shadow in input
        convertInputsToRight.forEach((divChildInGroupInput) => {
            // first div
            divChildInGroupInput.children[0].style.borderRightWidth = "1px";
            divChildInGroupInput.children[0].style.borderLeftWidth = "0px";
            divChildInGroupInput.children[0].style.borderRadius = "0px";
            divChildInGroupInput.children[0].style.borderTopRightRadius = "0.25rem";
            divChildInGroupInput.children[0].style.borderBottomRightRadius = "0.25rem";
            /**
             * please add this class: "rtl:right-3 peer-focus:rtl:translate-x-[20%] peer-data-[te-input-state-active]:rtl:translate-x-[20%]"
             * in label for fix all problem
             */
            // last div
            divChildInGroupInput.children[2].style.borderRightWidth = "0px";
            divChildInGroupInput.children[2].style.borderLeftWidth = "1px";
            divChildInGroupInput.children[2].style.borderRadius = "0px";
            divChildInGroupInput.children[2].style.borderTopLeftRadius = "0.25rem";
            divChildInGroupInput.children[2].style.borderBottomLeftRadius = "0.25rem";
        });
        // Fix position arrow in input select
        let inputsSelect = document.querySelectorAll('[data-te-select-form-outline-ref]');
        inputsSelect.forEach((inputSelect) => {
            inputSelect.querySelector('span').style.right = "unset";
            inputSelect.querySelector('span').style.left = "0.75rem";
        })
        // Fix view data in database (table)
        let databases = document.querySelectorAll('[data-te-datatable-init]');
        databases.forEach((database) => {
            database.querySelector('table').style.textAlign = "right";
            let paragraph = database.querySelector('p')
            paragraph.innerText = "عدد الصفوف في الصفحة";
            paragraph.style.marginLeft = "1rem";
            let paginationNav = database.querySelector('div[data-te-datatable-pagination-nav-ref]');
            let translateToArabic = () => paginationNav.innerText = paginationNav.innerText.replace('of','من').toString();
            translateToArabic();
            let arrowPaginationNav = database.querySelector('[data-te-datatable-pagination-nav-ref] + div.order-1');
            arrowPaginationNav.style.display = "flex";
            arrowPaginationNav.style.flexDirection = "row-reverse";
            database.parentElement.addEventListener('change',translateToArabic)
            arrowPaginationNav.parentElement.addEventListener('click',translateToArabic)
        });
        // fix direction editor
        if (/post\/create/.test(window.location.href))
            var setIntervalTime = setInterval(() => {
                let iframe = document.querySelector("iframe");
                if (iframe) {
                    iframe.contentWindow.document.documentElement.style.direction = "rtl";
                    clearInterval(setIntervalTime);
                }
            },500);
    }
});
