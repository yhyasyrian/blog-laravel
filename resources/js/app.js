// TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com
import { Tooltip, initTE,Ripple,Input,Datatable,Modal,Select } from "tw-elements";
import './component/CharJs.js';
import './component/Post.js';
import './component/Rtl.js';
import Alpine from 'alpinejs';
import './bootstrap';
// import 'tinymce/tinymce.min.js';
initTE({ Tooltip,Ripple,Input,Datatable,Modal,Select });
window.Alpine = Alpine;
Alpine.start();
(localStorage.getItem('darkMode') == "true") ? document.documentElement.classList.add('dark') :null;
let iconDark = document.getElementById('iconDark');
let darkMode = localStorage.getItem('darkMode') ?? "true";
iconDark.addEventListener('click',() => {
    document.documentElement.classList.toggle('dark');
    darkMode = (darkMode == "true") ? "false" : "true";
    localStorage.setItem("darkMode", darkMode);
});
addEventListener('load',() => {
    let bodyPost = document.getElementById('body');
    if (bodyPost != undefined) {
        tinymce.init({
            target: bodyPost,
            plugins: 'mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table advtemplate advtable advcode typography inlinecss',
            // plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            // toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            // if you use primary plan
        });
    }
});
