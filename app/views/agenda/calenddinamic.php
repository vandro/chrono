<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calenddinamic
 *
 * @author Emanuel Lucena <elucena94@gmail.com>
 */
?>

class calenddinamic {

<HEAD>
        <meta charset="utf-8"/>
<SCRIPT LANGUAGE="JavaScript">


    var dDate = new Date();
    var dCurMonth = dDate.getMonth();
    var dCurDayOfMonth = dDate.getDate();
    var dCurYear = dDate.getFullYear();
    var objPrevElement = new Object();

        function fToggleColor(myElement) {
        var toggleColor = "#ff0000";
        if (myElement.id == "calDateText") {
        if (myElement.color == toggleColor) {
        myElement.color = "";
        } else {
        myElement.color = toggleColor;
   }
        } else if (myElement.id == "calCell") {
        for (var i in myElement.children) {
        if (myElement.children[i].id == "calDateText") {
        if (myElement.children[i].color == toggleColor) {
        myElement.children[i].color = "";
        } else {
        myElement.children[i].color = toggleColor;
            }
         }
      }
   }
}
    function fSetSelectedDay(myElement){
    if (myElement.id == "calCell") {
    if (!isNaN(parseInt(myElement.children["calDateText"].innerText))) {
    myElement.bgColor = "#c0c0c0";
    objPrevElement.bgColor = "";
    document.all.calSelectedDate.value = parseInt(myElement.children["calDateText"].innerText);
    objPrevElement = myElement;
          }
       }
    }
        function fGetDaysInMonth(iMonth, iYear) {
        var dPrevDate = new Date(iYear, iMonth, 0);
        return dPrevDate.getDate();
        }
        function fBuildCal(iYear, iMonth, iDayStyle) {
    var aMonth = new Array();
    aMonth[0] = new Array(7);
    aMonth[1] = new Array(7);
    aMonth[2] = new Array(7);
    aMonth[3] = new Array(7);
    aMonth[4] = new Array(7);
    aMonth[5] = new Array(7);
    aMonth[6] = new Array(7);
            var dCalDate = new Date(iYear, iMonth-1, 1);
            var iDayOfFirst = dCalDate.getDay();
            var iDaysInMonth = fGetDaysInMonth(iMonth, iYear);
            var iVarDate = 1;
            var i, d, w;
if (iDayStyle == 2) {
aMonth[0][0] = "Domingo";
aMonth[0][1] = "Segunda-Feira";
aMonth[0][2] = "Terça-Feira";
aMonth[0][3] = "Quarta-Feira";
aMonth[0][4] = "Quinta-Feira";
aMonth[0][5] = "Sexta-Feira";
aMonth[0][6] = "Sábado";
    } else if (iDayStyle == 1) {
    aMonth[0][0] = "Dom";
    aMonth[0][1] = "Seg";
    aMonth[0][2] = "Ter";
    aMonth[0][3] = "Qua";
    aMonth[0][4] = "Qui";
    aMonth[0][5] = "Sex";
    aMonth[0][6] = "Sáb";
        } else {
        aMonth[0][0] = "Do";
        aMonth[0][1] = "Sg";
        aMonth[0][2] = "Te";
        aMonth[0][3] = "Qu";
        aMonth[0][4] = "Qt";
        aMonth[0][5] = "Sx";
        aMonth[0][6] = "Sa";
}
    for (d = iDayOfFirst; d < 7; d++) {
    aMonth[1][d] = iVarDate;
    iVarDate++;
}
        for (w = 2; w < 7; w++) {
        for (d = 0; d < 7; d++) {
        if (iVarDate <= iDaysInMonth) {
        aMonth[w][d] = iVarDate;
        iVarDate++;
              }
           }
        }
        return aMonth;
        }
        function fDrawCal(iYear, iMonth, iCellWidth, iCellHeight, sDateTextSize, sDateTextWeight, iDayStyle) {
        var myMonth;
        myMonth = fBuildCal(iYear, iMonth, iDayStyle);
    document.write("<table border='1'>")
    document.write("<tr>");
    document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][0] + "</td>");
    document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][1] + "</td>");
    document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][2] + "</td>");
    document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][3] + "</td>");
    document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][4] + "</td>");
    document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][5] + "</td>");
    document.write("<td align='center' style='FONT-FAMILY:Arial;FONT-SIZE:12px;FONT-WEIGHT: bold'>" + myMonth[0][6] + "</td>");
    document.write("</tr>");
    for (w = 1; w < 7; w++) {
        document.write("<tr>")
    for (d = 0; d < 7; d++) {
        document.write("<td align='left' valign='top' width='" + iCellWidth + "' height='" + iCellHeight + "' id=calCell style='CURSOR:Hand' onMouseOver='fToggleColor(this)' onMouseOut='fToggleColor(this)' onclick=fSetSelectedDay(this)>");
    if (!isNaN(myMonth[w][d])) {
        document.write("<font id=calDateText onMouseOver='fToggleColor(this)' style='CURSOR:Hand;FONT-FAMILY:Arial;FONT-SIZE:" + sDateTextSize + ";FONT-WEIGHT:" + sDateTextWeight + "' onMouseOut='fToggleColor(this)' onclick=fSetSelectedDay(this)>" + myMonth[w][d] + "</font>");
    } else {
        document.write("<font id=calDateText onMouseOver='fToggleColor(this)' style='CURSOR:Hand;FONT-FAMILY:Arial;FONT-SIZE:" + sDateTextSize + ";FONT-WEIGHT:" + sDateTextWeight + "' onMouseOut='fToggleColor(this)' onclick=fSetSelectedDay(this)> </font>");
            }
        document.write("</td>")
                            }
        document.write("</tr>");
                            }
        document.write("</table>")
            }
            function fUpdateCal(iYear, iMonth) {
            myMonth = fBuildCal(iYear, iMonth);
            objPrevElement.bgColor = "";
            document.all.calSelectedDate.value = "";
            for (w = 1; w < 7; w++) {
            for (d = 0; d < 7; d++) {
            if (!isNaN(myMonth[w][d])) {
            calDateText[((7*w)+d)-7].innerText = myMonth[w][d];
            } else {
            calDateText[((7*w)+d)-7].innerText = " ";
         }
      }
   }
}

</script>
</head>
</HEAD>



<BODY>

    <script language="JavaScript" for=window event=onload>

var dCurDate = new Date();
frmCalendarSample.tbSelMonth.options[dCurDate.getMonth()].selected = true;
for (i = 0; i < frmCalendarSample.tbSelYear.length; i++)
if (frmCalendarSample.tbSelYear.options[i].value == dCurDate.getFullYear())
frmCalendarSample.tbSelYear.options[i].selected = true;

    </script>

<form name="frmCalendarSample" method="post" action="">
<input type="hidden" name="calSelectedDate" value="">

<table border="1">
<tr>
<td>
    <select name="tbSelMonth" onchange='fUpdateCal(frmCalendarSample.tbSelYear.value, frmCalendarSample.tbSelMonth.value)'>
        <option value="1">Janeiro</option>
        <option value="2">Fevereiro</option>
        <option value="3">Março</option>
        <option value="4">Abril</option>
        <option value="5">Maio</option>
        <option value="6">Junho</option>
        <option value="7">Julho</option>
        <option value="8">Agosto</option>
        <option value="9">Setembro</option>
        <option value="10">Outubro</option>
        <option value="11">Novembro</option>
        <option value="12">Dezembro</option>
    </select>
  
    <select name="tbSelYear" onchange='fUpdateCal(frmCalendarSample.tbSelYear.value, frmCalendarSample.tbSelMonth.value)'>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
    </select>
</td>
</tr>
    <tr>
        <td>
            <script language="JavaScript">
                var dCurDate = new Date();
                fDrawCal(dCurDate.getFullYear(), dCurDate.getMonth()+1, 30, 30, "12px", "bold", 1);
            </script>
        </td>
    </tr>
</table>
</form>

<p><center>
<font face="arial, helvetica" size="-2">Free JavaScripts provided<br>
by <a href="http://javascriptsource.com">The JavaScript Source</a></font>
</center><p>

}
