// TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com
import { Tooltip, initTE } from "tw-elements";
import Alpine from 'alpinejs';
import './bootstrap';
initTE({ Tooltip });
window.Alpine = Alpine;
Alpine.start();
