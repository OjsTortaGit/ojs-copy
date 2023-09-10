import { inputs, containerEl, templateEl } from "./input_newPos";

const { category, search } = inputs;

const { categoryList, selectedProdCont } = containerEl;

const { categoryTemplate, selectedProdTemplate } = templateEl;

console.log(categoryList, categoryTemplate);

defaultHandler();
const scrollableDiv = document.getElementById("itemCont");
touchScroll(scrollableDiv);
