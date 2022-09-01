copyToClipboard(document.getElementById("content"));

document.getElementById("clickCopy").onclick = function() {
	copyToClipboard(document.getElementById("goodContent"));
}

document.getElementById("clickCopyString").onclick = function() {
	copyToClipboard("This is a variable string");
}

/**
* This will copy the innerHTML of an element to the clipboard
* @param element reference OR string
*/
function copyToClipboard(e) {
    var tempItem = document.createElement('input');

    tempItem.setAttribute('type','text');
    tempItem.setAttribute('display','none');
    
    let content = e;
    if (e instanceof HTMLElement) {
    		content = e.innerHTML;
    }
    
    tempItem.setAttribute('value',content);
    document.body.appendChild(tempItem);
    
    tempItem.select();
    document.execCommand('Copy');

    tempItem.parentElement.removeChild(tempItem);
} 