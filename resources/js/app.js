// TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com
import { Tooltip, initTE,Ripple,Input,Datatable,Modal } from "tw-elements";
import './component/CharJs.js';
import Alpine from 'alpinejs';
import './bootstrap';
initTE({ Tooltip,Ripple,Input,Datatable,Modal });
window.Alpine = Alpine;
Alpine.start();
addEventListener('load',() => {
    (localStorage.getItem('darkMode') == "true") ? document.documentElement.classList.add('dark') :null;
    let iconDark = document.getElementById('iconDark');
    let darkMode = localStorage.getItem('darkMode') ?? "true";
    iconDark.addEventListener('click',() => {
        document.documentElement.classList.toggle('dark');
        darkMode = (darkMode == "true") ? "false" : "true";
        localStorage.setItem("darkMode", darkMode);
    });
});
