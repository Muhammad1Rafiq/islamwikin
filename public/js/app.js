$(document).ready(function () {

    $("#toggle").click(function () {
        $("#sidebar").slideToggle();
    });

    $("#sidebar").css("border-color", "red");

    var lfonts = localStorage.getItem("font-size");
    lfonts = parseInt(lfonts, 10);
    $("#bodytext").css("font-size", lfonts)
    $("#inc").click(function () {
        var osize = $("#bodytext").css("font-size");
        osize = parseInt(osize, 10);
        osize += 1;
        //alert(osize)
        $("#bodytext").css("font-size", osize)
        localStorage.setItem("font-size", osize);
    });
    $("#dec").click(function () {
        var osize = $("#bodytext").css("font-size");
        osize = parseInt(osize, 10);
        osize -= 1;
        //alert(osize)
        $("#bodytext").css("font-size", osize)
        localStorage.setItem("font-size", osize);
    });

    var resp = $("#fontselector").val();
    $("#fontselector").change(function(){
        var responce = $("#fontselector").val();
        fontSelect(responce);
    });
    var savedfont = localStorage.getItem("body-font-family");
    savedfont = parseInt(savedfont, 10);
    fontSelect(savedfont);

    
});



function fontSelect(responce) {
    var fname = "Rabar_033";
    if(responce == 2){
     var fname = "Rabar_015";}
     else if(responce == 3){
     var fname = "Rabar_008";}
      else if(responce == 4){
        var fname = "Rabar_004";}
        else if(responce == 5){
            var fname = "Rabar_006";}
      else{}
      localStorage.setItem("body-font-family", responce);
      $("#bodytext").css("font-family",fname);
}
