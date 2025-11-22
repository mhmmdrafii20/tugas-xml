export function getXMLData () {
    return fetch("data.xml")
    .then(res => res.text())
    .then(text => {
        const parser = new DOMParser();
        return parser.parseFromString(text, "application/xml");
    });
}