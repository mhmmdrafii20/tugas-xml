import { bindListener } from "./events.js";
import { getXMLData } from "./fetch.js";
import { renderXML } from "./render.js";

let xmlData;

function init () {
    getXMLData().then((xml) => {
        xmlData = xml;
        renderXML(xmlData);
        bindListener(xmlData);
    })
}

init();