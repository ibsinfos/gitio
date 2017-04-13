window.onload = function()
{
  initCheckBoxes('table1');
  initCheckBoxes('table2');
};
/* Click-n-Drag Checkboxes */
var gCheckedValue = null;
var status = null;
var checkboxes = null;
var eraser = false;
function initCheckBoxes(sTblId)
{
  setCursor('url(greenpencil_icon.png)');
  xTableIterate(sTblId,
    function(td, isRow) {
      if (!isRow) {
        var cb = td.getElementsByTagName('input');
        if (cb && cb[0].type.toLowerCase() == 'checkbox') {
          td.checkBoxObj = cb[0];
          td.onmousedown = tdOnMouseDown;
          td.onmouseover = tdOnMouseOver;
          td.onclick = tdOnClick;
        }
      }
    }
  );
}
function eraserOn()
{
    eraser = true;
    setCursor('url(eraser_icon.png)');
}
function redOn()
{
    eraser = false;
    showlayer('wakker-in-bed');
    setCursor('url(orangepencil_icon.png)');
}
function greenOn()
{
    eraser = false;
    showlayer('slapend');
    setCursor('url(greenpencil_icon.png)');
}
function tdOnMouseDown(ev)
{
  if (this.checkBoxObj) {
    if (!eraser) {
        gCheckedValue = this.checkBoxObj.checked = true;
    } else {
        gCheckedValue = this.checkBoxObj.checked = false;
    }
    document.onmouseup = docOnMouseUp;
    document.onselectstart = docOnSelectStart; // for IE
    xPreventDefault(ev); // cancel text selection
    checkboxes=document.getElementsByName(this.checkBoxObj.name);
    for (i=0;i<2;i++) {
        if (checkboxes[i] != this.checkBoxObj) {
            checkboxes[i].checked = false;
        }
    }
  }
}
function tdOnMouseOver(ev)
{
  if (gCheckedValue != null && this.checkBoxObj) {
    this.checkBoxObj.checked = gCheckedValue;
    checkboxes=document.getElementsByName(this.checkBoxObj.name);
    for (i=0;i<2;i++) {
        if (checkboxes[i] != this.checkBoxObj) {
            checkboxes[i].checked = false;
        }
    }
  }
}
function docOnMouseUp()
{
  document.onmouseup = null;
  document.onselectstart = null;
  gCheckedValue = null;
}
function tdOnClick()
{
  // Cancel a click on the checkbox itself. Let it bubble up to the TD
  return false;
}
function docOnSelectStart(ev)
{
  return false; // cancel text selection
}

// Layers verbergen of naar voren halen
function showlayer(layer){
document.getElementById('wakker-in-bed').style.zIndex = 1;
document.getElementById('slapend').style.zIndex = 1;
document.getElementById(layer).style.zIndex = 2;
}
function setCursor(cursorString){
var boxes = document.getElementsByClassName("checkbox");
    for (var i = 0; i<boxes.length; i++){
        boxes[i].style.cursor = cursorString;
    }
}