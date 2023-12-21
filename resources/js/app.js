// TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com
import { Tooltip, initTE,Ripple,Input,Datatable } from "tw-elements";
import './component/CharJs.js';
import Alpine from 'alpinejs';
import './bootstrap';
initTE({ Tooltip,Ripple,Input,Datatable });
window.Alpine = Alpine;
Alpine.start();
addEventListener('load',() => {
    let iconDark = document.getElementById('iconDark');
    let darkMode = false;
    iconDark.addEventListener('click',() => {
        document.documentElement.classList.toggle('dark');
    });
});
