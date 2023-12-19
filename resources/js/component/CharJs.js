import {Chart} from "chart.js/auto";
import Visitores from "./Chart/Visitores.js";
import Category from "./Chart/Category.js";
let visitorsChat = document.getElementById('visitors');
if (visitorsChat != undefined) {
    Visitores(visitorsChat);
    Category(document.getElementById('categories'));
}
