var thousand_separator = ".";
function format_number(number = false) {
  if(number){
    number = number.toString().split(".");
    number[0] = number[0].toString().replace(/\B(?=(\d{3})+(?!\d))/g, thousand_separator);
    return number.join(","); //pecah perseribu
  }
  return "";
}
function reformat_number(number) {
  number = number.split(".").join("");
  return number.split(",").join(".");
}
function init_nf() {
  var input_element = document.querySelectorAll(".nf-input");
  for (var a = 0; a < input_element.length; a++) {

    /*begin oninput init_nf*/
    input_element[a].onchange = function () {
      var text = this.value;
      var result = formatting_func(text);
      this.value = result;
    }
    input_element[a].oninput = function () {
      var text = this.value;
      var result = formatting_func(text);
      this.value = result;
    }
  }
}
function formatting_func(text_in) {
  text_in += '';
  var text = "";

  var space_detect = text_in.split(" ");
  if (space_detect.length > 1) {
    for (var a = 0; a < space_detect.length; a++) {
      space_detect[a] = reformat_number(space_detect[a]);
      space_detect[a] = format_number(space_detect[a]);
    }
    text = space_detect.join(" ");
  }
  else {
    text = reformat_number(text_in);
    text = format_number(text);
  }
  return text;
}
function deformatting_func(text_in) {
  text_in += '';
  var text = "";
  var space_detect = text_in.split(" ");
  if (space_detect.length > 1) {
    for (var a = 0; a < space_detect.length; a++) {
      space_detect[a] = reformat_number(space_detect[a]);
    }
    text = space_detect.join(" ");
  }
  else {
    text = reformat_number(text_in);
  }
  return text;
}
function nf_reformat_all() {
  var input_element = document.querySelectorAll(".nf-input");
  for (var a = 0; a < input_element.length; a++) {
    var text = input_element[a].value;
    var result = deformatting_func(text);
    input_element[a].value = result;
  }
}
init_nf();